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
    protected $user;
    /**
     * SendSubscriptionEmail constructor.
     * @param $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::send('emails.reminder', ['user' => $this->user], function ($m) use ($user) {
            $m->from('no-reply@myapp.com', 'My SaaS');
            $m->to($this->user->email)->subject('Welcome!');
        });
    }
}