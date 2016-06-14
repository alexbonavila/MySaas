<?php
namespace App\Events;
use App\Events\Event;
use App\Shotout;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
class ShotoutAdded extends Event implements ShouldBroadcast
{
    use SerializesModels;
    /**
     * @var Shotout
     */
    public $shotout;
    /**
     * ShotoutAdded constructor.
     * @param Shotout $shotout
     */
    public function __construct(Shotout $shotout)
    {
        //
        $this->shotout = $shotout;
    }
    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return ['shotout-added'];
    }
}