<?php
namespace  App\Jobs;
use App\Models\User;
use App\Models\Sale;
use App\Models\Bonus;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class CalculateBonuses implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $period;

    public function __construct($period)
    {
        $this->period = $period;
    }

    public function handle()
    {
        $users = User::all();

        foreach ($users as $user) {
            $bonus = 0;

            // Calculer le bonus pour les propres achats
            $userSales = Sale::where('user_id', $user->id)->where('created_at', 'like', $this->period . '%')->sum('total_price');
            $bonus += $userSales * 0.20;


            // Calculer le bonus pour les achats des filiations
           /* $f1Users = User::where('sponsor_id', $user->id)->get();
            foreach ($f1Users as $f1User) {
                $f1Sales = Sale::where('user_id', $f1User->id)->where('created_at', 'like', $this->period . '%')->sum('total_price');
                $bonus += $f1Sales * 0.05;

                $f2Users = User::where('sponsor_id', $f1User->id)->get();
                foreach ($f2Users as $f2User) {
                    $f2Sales = Sale::where('user_id', $f2User->id)->where('created_at', 'like', $this->period . '%')->sum('total_price');
                    $bonus += $f2Sales * 0.03;

                    $f3Users = User::where('sponsor_id', $f2User->id)->get();
                    foreach ($f3Users as $f3User) {
                        $f3Sales = Sale::where('user_id', $f3User->id)->where('created_at', 'like', $this->period . '%')->sum('total_price');
                        $bonus += $f3Sales * 0.02;
                    }
                }
            }*/

            // Enregistrer le bonus
            Bonus::create([
                'user_id' => $user->id,
                'period' => $this->period,
                'bonus_amount' => $bonus,
            ]);
        }
    }
}

