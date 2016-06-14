<?php

namespace App\Jobs;

use App\User;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;

class SendSubscriptionEmail extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;
    protected $message;

    /**
     * SendSubscriptionEmail constructor.
     * @param $message
     * @internal param $user
     */
    public function __construct($message)
    {
        $this->message = $message;
    }
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::raw('Text to e-mail', function ($message)  {
            $message->from($this->message['email'], 'My SaaS');
            $message->to("adamalvarado@iesebre.com")->subject('Welcome!');
        });
    }
}