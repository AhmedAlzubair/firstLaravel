<?php

namespace App\Listeners;

use App\Events\OfferEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class OfferListener
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
     * @param  object  $event
     * @return void
     */
    public function handle(OfferEvent $event)
    {
        //
        $this->updateViwer($event->video);
    }
    public function updateViwer($video)
    {
        //
        $video->viewer = $video->viewer + 1;
        $video->save();
       

    }
}
