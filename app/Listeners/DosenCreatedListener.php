<?php

namespace App\Listeners;

use App\Events\DosenCreated;
use App\Models\Dosen;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class DosenCreatedListener
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
    public function handle(DosenCreated $event): void
    {
        if ($event->user->role_name === 'Dosen') {
            Dosen::create([
                'user_id' => $event->user->id,
                'name_full' => $event->user->name,
                // Tambahkan kolom-kolom lain sesuai kebutuhan
            ]);
        }
    }
}
