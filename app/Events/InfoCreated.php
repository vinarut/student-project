<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use App\Info;

class InfoCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private $info;

    /**
     * InfoCreated constructor.
     *
     * @param Info $info
     */
    public function __construct(Info $info)
    {
        $this->info = $info;
    }

    /**
     * @return mixed
     */
    public function getInfo()
    {
        return $this->info;
    }
}
