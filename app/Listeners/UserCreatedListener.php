<?php

namespace App\Listeners;

use App\Events\UserCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Mahasiswa;

class UserCreatedListener
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
    public function handle(UserCreated $event)
    {
        if ($event->user->role_name === 'Student') {
            Mahasiswa::create([
                'user_id' => $event->user->id,
                // Tambahkan kolom-kolom lain sesuai kebutuhan
            ]);
        }
    }
}
