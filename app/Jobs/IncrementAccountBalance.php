<?php
namespace App\Jobs;

use App\Models\AccountBalance;
use App\Models\BalanceIncrement;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class IncrementAccountBalance implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle()
    {
        $incrementAmount = 1000;

        AccountBalance::with('user')->chunk(100, function ($balances) use ($incrementAmount) {
            foreach ($balances as $balance) {
                $balance->increment('balance', $incrementAmount);

                BalanceIncrement::create([
                    'user_id' => $balance->user_id,
                    'amount' => $incrementAmount,
                    'new_balance' => $balance->fresh()->balance,
                ]);
            }
        });
    }
}
