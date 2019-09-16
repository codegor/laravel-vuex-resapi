<?php
  
  namespace Codegor\Resapi\Events;
  
  use Illuminate\Broadcasting\Channel;
  use Illuminate\Queue\SerializesModels;
  use Illuminate\Broadcasting\PrivateChannel;
  use Illuminate\Broadcasting\PresenceChannel;
  use Illuminate\Broadcasting\InteractsWithSockets;
  use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
  
  class UpdateData implements ShouldBroadcastNow {
    use InteractsWithSockets, SerializesModels;
    
    private $action;
    private $userId;
    public $data;
    
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($action, $userId, $data = ['empty']) {
      $this->action = $action;
      $this->userId = $userId;
      $this->data = $data;
    }
    
    /**
     * The event's broadcast name.
     *
     * @return string
     */
    public function broadcastAs() {
      return "update.$this->action";
    }
    
    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn() {
      return new PrivateChannel("api.$this->userId");
    }
    
    /**
     * Get the data to broadcast.
     *
     * @author Author
     *
     * @return array
     */
//    public function broadcastWith() {
//      return [
//        'data' => $this->data
//      ];
//    }
  }
