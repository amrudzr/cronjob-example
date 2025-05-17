<?php

namespace App\Services;

use App\Models\Subscription;
use App\Models\User;
use Carbon\Carbon;

class UserService
{
    public function subscribe(User $user)
    {
        $start = Carbon::now();
        $end = $start->copy()->addMinutes(1);

        $user->status = 'premium';
        $user->save();

        Subscription::create([
            'user_id'   => $user->id,
            'starts_at' => $start,
            'ends_at'   => $end,
        ]);
    }

    public function downgradeExpiredUsers()
    {
        $now = Carbon::now();
        $expiredUsers = User::where('status', 'premium')
            ->whereHas('subscriptions', function ($query) use ($now) {
                $query->where('ends_at', '<=', $now);
            })
            ->get(['id', 'name']);

        $expiredUsers->each->update(['status' => 'basic']);

        info('Now: ' . $now->toDateTimeString());
        info('Expired users: ' . $expiredUsers->pluck('id')->join(', '));

        return $expiredUsers;
    }
}
