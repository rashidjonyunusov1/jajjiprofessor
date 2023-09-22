<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class AuditEventListener
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
    public function handle(AuditEvent $event)
    {
        DB::table('audits')->insert([
            'user_name'=>$event->user,
            'table_name'=>$event->table_name,
            'event_type'=>$event->event_type,
            'data'=>$event->data,
            'date'=>$event->date('Y-m-d H:i:s'),
        ]);
    }
}
