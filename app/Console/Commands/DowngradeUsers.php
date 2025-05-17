<?php

namespace App\Console\Commands;

use App\Services\UserService;
use Carbon\Carbon;
use Illuminate\Console\Command;

class DowngradeUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:downgrade';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    public function __construct(protected UserService $userService)
    {
        parent::__construct();
    }
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $now = Carbon::now();
        $expiredUsers = $this->userService->downgradeExpiredUsers();

        if ($expiredUsers->isEmpty()) {
            $message = 'Tidak ada user yang perlu diturunkan pada ' . now()->format('d-m-Y H:i:s');
        } else {
            $userDetails = $expiredUsers->map(function ($user) {
                return "ID: {$user->id}, Nama: {$user->name}";
            })->implode("\n");

            $message = sprintf(
                "%d user diturunkan menjadi basic pada %s:\n%s",
                $expiredUsers->count(),
                now()->format('d-m-Y H:i:s'),
                $userDetails
            );
        }

        $this->info($message);
        info($message);
    }
}
