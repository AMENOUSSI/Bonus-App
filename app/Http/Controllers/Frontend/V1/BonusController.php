<?php

namespace App\Http\Controllers\Frontend\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBonusRequest;
use App\Http\Requests\UpdateBonusRequest;
use App\Models\Bonus;
use App\Models\User;

class BonusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('sales')->paginate(10);
        foreach ($users as $user) {
            $user->bonus = $user->calculateBonus();
        }

        return view('frontend.bonus.index', compact('users'));
    }


}
