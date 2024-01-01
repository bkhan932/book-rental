<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookReturnReminder;
use App\Models\Rental;

class CheckBookReturn extends Command
{
    protected $signature = 'app:check-book-return';
    protected $description = 'Check book return status and send reminders';

    public function handle()
    {
        // Get all book rentals that are still active
        $activeRentals = Rental::whereNotNull('user_id')->get();

        foreach ($activeRentals as $rental) {
            $returnDate = Carbon::parse($rental->return_date);

            // Check if today is the third day from rental
            if (now()->isSameDay($returnDate)) {
                // Send email reminder to the user
                $user = $rental->user;
                Mail::to($user->email)->send(new BookReturnReminder($rental));
            }
        }
    }
}
