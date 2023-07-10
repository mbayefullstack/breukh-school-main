<?php

namespace App\Console\Commands;

use App\Models\Eleve;
use App\Models\Evenement;
use App\Models\User;
use App\Notifications\EventReminderNotification;
use Illuminate\Console\Command;

class SendEventReminderMessage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-event-reminder-message';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Envoyer des messages de rappel aux eleves la veille de l'evenement";

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // $events = Event::with('attendees.user')
        //             ->whereBetween('start_time',[now(),now()->addDay()])
        //             ->get();
        // $eventCount = $events->count();
        // $eventLabel = str('event')->plural($eventCount);
        // //
        // $events->each(
        //     fn($event) => $event->attendees->each(
        //         fn($attendee) => $this->info("Notifying the user {$attendee->user_id}")
        //     )
        // );
        //Trouver les evenments:
        $events = Evenement::whereBetween('date',[now(), now()->addDay()])->get();
        // $events->each(
        //     fn($event) => $event->participations->each(
        //         fn($participation) => $participation->classe->inscriptions->each(
        //             fn($inscription) => $inscription->eleve->notify(new EventReminderNotification($event)) 
        //         )
        //     )
        // );

        foreach ($events as $event) {
            foreach ($event->participations as $participation) {
                echo "toto-";
                foreach ($participation->classe->inscriptions as $i) {
                    $i->eleve->notify(new EventReminderNotification($event));
                }
            }
        }
        // $user = Eleve::find(1);
        // $user->notify(new EventReminderNotification($ev));
        // $this->info("NOm:{$user->name}");
        $this->info("Found : {$events->count()}");
        $this->info('Reminder Notifications sent successfully!');
    }
}
