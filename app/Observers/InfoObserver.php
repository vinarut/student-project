<?php

namespace App\Observers;

use App\Info;
use App\Events\InfoCreated;

class InfoObserver
{
    /**
     * Handle the info "created" event.
     *
     * @param  \App\Info  $info
     * @return void
     */
    public function created(Info $info)
    {
        event(new InfoCreated($info));
    }

    /**
     * Handle the info "updated" event.
     *
     * @param  \App\Info  $info
     * @return void
     */
    public function updated(Info $info)
    {
        //
    }

    /**
     * Handle the info "deleted" event.
     *
     * @param  \App\Info  $info
     * @return void
     */
    public function deleted(Info $info)
    {
        //
    }

    /**
     * Handle the info "restored" event.
     *
     * @param  \App\Info  $info
     * @return void
     */
    public function restored(Info $info)
    {
        //
    }

    /**
     * Handle the info "force deleted" event.
     *
     * @param  \App\Info  $info
     * @return void
     */
    public function forceDeleted(Info $info)
    {
        //
    }
}
