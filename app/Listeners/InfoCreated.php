<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;

class InfoCreated
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  InfoCreated  $event
     * @return void
     */
    public function handle(\App\Events\InfoCreated $event)
    {
        $users = User::all();

        $notify = new \App\Notifications\InfoCreated();
        $notify->getMailMessage()
            ->greeting('Hello,')
            ->from(config('mail.from.address'), config('mail.from.name'))
            ->subject("Some Subject")
            ->line("You have a new request");

        $attributes = $event->getInfo()->getAttributes();
        foreach ($attributes as $k => $v) {
            $label = ucwords(str_replace("_", " ", $k));
            $notify->getMailMessage()->line($label .": ".$v);
        }

        $notify->getMailMessage()->action('Check', route('info.export'));

        foreach ($users as $user) {
            $user->notify($notify);
        }
    }
}
