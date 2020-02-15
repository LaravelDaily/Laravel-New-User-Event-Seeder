<?php

namespace App\Listeners;

use App\Task;
use Carbon\CarbonPeriod;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SeedTestDataForNewUser
{
    /**
     * Handle the event.
     *
     * @param  Registered  $event
     * @return void
     */
    public function handle(Registered $event)
    {
        $period = CarbonPeriod::create(now(), now()->addDays(5));

        foreach($period as $date)
        {
            factory(Task::class, 2)->create([
                'due_date'      => $date->format('Y-m-d'),
                'created_by_id' => $event->user->id,
            ]);
        }
    }
}
