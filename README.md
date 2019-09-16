
# Codegor/laravel-vuex-resapi

[![Laravel](https://img.shields.io/badge/Laravel-~5.6-orange.svg?style=flat-square)](http://laravel.com)
[![Source](http://img.shields.io/badge/source-codegor/laravel--vuex--resapi-blue.svg?style=flat-square)](https://github.com/codegor/laravel-vuex-resapi/)
[![Build Status](http://img.shields.io/travis/codegor/laravel--vuex--resapi/l/master.svg?style=flat-square)](https://travis-ci.org/codegor/laravel-vuex-resapi/)
[![License](http://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](https://tldrlegal.com/license/mit-license)
[![Total Downloads](http://img.shields.io/packagist/dt/codegor/laravel--vuex--resapi.svg?style=flat-square)](https://packagist.org/packages/codegor/laravel-vuex-resapi/)

This is a laravel event part of Vuex API library for Laravel REST Controller, with model example.
When you want to use Laravel Echo with [vuex-laravel-resource-api](https://www.npmjs.com/package/vuex-laravel-resource-api) this is a backend for broadcasting event of Laravel Echo.

# How to use?

In a model at the boot section you can emmit WS event for [Resapi](https://www.npmjs.com/package/vuex-laravel-resource-api).

Like this:
```php
//...
use Codegor\Resapi\Events\UpdateData;

class Manager extends Model {
    protected static function boot() {
      // ...
      static::saved(function($m){broadcast(new UpdateData('manager', $m->user_id))->toOthers();});  
    }
    
    // ...
}
```
 
See example/Manager.php for fool example.