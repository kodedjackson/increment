<?php

namespace App\Http\Controllers;

use App\Models\AccountBalance;
use App\Models\BalanceIncrement;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AccountBalanceController extends Controller
{
    public function show()
    {
        $balance = AccountBalance::firstOrCreate(
            ['user_id' => auth()->id()],
            ['balance' => 0]
        );

        return Inertia::render('AccountBalance/Show', [
            'balance' => $balance,
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'balance' => 'required|numeric|min:0',
        ]);

        AccountBalance::updateOrCreate(
            ['user_id' => auth()->id()],
            ['balance' => $request->balance]
        );

        return redirect()->route('dashboard')->with('success', 'Balance updated successfully!');
    }

    public function history()
    {
        $increments = BalanceIncrement::where('user_id', auth()->id())
            ->latest()
            ->get();

        return Inertia::render('AccountBalance/History', [
            'increments' => $increments,
        ]);
    }
}
