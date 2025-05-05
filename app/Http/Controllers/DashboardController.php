<?php
namespace App\Http\Controllers;

use App\Models\AccountBalance;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $balance = AccountBalance::where('user_id', auth()->id())->first();

        return Inertia::render('Dashboard', [
            'balance' => $balance,
        ]);
    }
}
