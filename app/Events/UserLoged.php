<?php

namespace App\Events;

use App\Events\Event;
use App\User;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

/**
 * Class UserLoged
 * @package App\Events
 */
class UserLoged extends Event
{
    use SerializesModels;
    /**
     * @var User
     */
    public $user;
    /**
     * Create a new event instance.
     *
     * @return $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}