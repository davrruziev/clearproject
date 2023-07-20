<?php

namespace App\Listeners;

use App\Events\PostCrated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class SendEmailToUser
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PostCrated $event): void
    {
        Log::alert("Send Email message to User.Sarlavha:".$event->post->title);
    }
}
