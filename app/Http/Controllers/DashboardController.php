<?php

namespace App\Http\Controllers;

use App\Models\Bonus;
use App\Models\Product;
use App\Models\Sale;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Récupération des utilisateurs avec leurs ventes
        $users = User::with('sales')->get();
        $totalUsers = $users->count();
        $totalProducts = Product::count();
        $totalSales = Sale::sum('total_price');
        $totalBonus = 0;

        foreach ($users as $user) {
            $user->bonus = $user->calculateBonus();
            $totalBonus += $user->bonus;
        }

        // Préparation des données pour le graphique des ventes mensuelles
        $monthlySales = Sale::select(
            DB::raw('SUM(total_price) as total'),
            DB::raw('MONTH(created_at) as month')
        )
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->pluck('total', 'month');

        $monthlySalesData = [];
        for ($i = 1; $i <= 12; $i++) {
            $monthlySalesData[] = $monthlySales->get($i, 0);
        }

// Préparation des données pour le graphique circulaire des bonus utilisateurs
        $userBonuses = $users->map(function ($user) {
            return [
                'name' => $user->first_name . ' ' . $user->last_name,
                'bonus' => $user->bonus,
            ];
        });

        return view('admin.dashboard', compact('totalUsers', 'totalProducts', 'totalSales', 'totalBonus', 'users', 'monthlySalesData', 'userBonuses'));    }
}
