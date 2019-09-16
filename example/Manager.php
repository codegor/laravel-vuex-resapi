<?php
  
  namespace App;
  
  use Illuminate\Database\Eloquent\{Model, SoftDeletes, Builder};
  use Auth;
  use Codegor\Resapi\Events\UpdateData;
  
  class Manager extends Model {
    use SoftDeletes;
    
    protected $fillable = [/*...*/];
    
    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot() {
      parent::boot();
      static::addGlobalScope('user\'s', function (Builder $builder) {
        if(Auth::check())
          $builder->whereIn('user_id', [0, Auth::user()->id]);
      });
//      static::updated(function($m){broadcast(new UpdateData('manager', $m->user_id))->toOthers();}); //->toOthers();
//      static::created(function($m){broadcast(new UpdateData('manager', $m->user_id))->toOthers();}); //->toOthers();
      static::saved(function($m){broadcast(new UpdateData('manager', $m->user_id))->toOthers();}); //->toOthers();
      static::deleted(function($m){broadcast(new UpdateData('manager', $m->user_id))->toOthers();});//->toOthers();
    }
    
    // ....
  }
