<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'is_admin',
        'identity_reference',
        'registration_number',
        'sponsor_id',
        'email',
        'telephone',
        'password',
        'role_id'
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected function isAdmin(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->role_id == 1,
        );
    }



    // Relations
   /* public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    public function sponsor()
    {
        return $this->belongsTo(User::class, 'sponsor_id');
    }

    public function downlines()
    {
        return $this->hasMany(User::class, 'sponsor_id');
    }

    // Vérifie si l'utilisateur a effectué un achat minimum
    private function hasMadeMinimumPurchase()
    {
        $minimumPurchase = 100;
        return $this->sales()->where('created_at', '>=', now()->startOfMonth())->sum('total_price') >= $minimumPurchase;
    }

    // Calcul des bonus
    public function calculateBonus()
    {
        $bonus = 0;
        if ($this->hasMadeMinimumPurchase()) {
            $bonus += $this->sales()->sum('total_price') * 0.20;
            $bonus += $this->calculateDownlineBonus(1, 5)
                + $this->calculateDownlineBonus(2, 3)
                + $this->calculateDownlineBonus(3, 2);
        }
        return $bonus;
    }

    // Calcul des bonus des filleuls
    private function calculateDownlineBonus($generation, $percentage)
    {
        if ($generation > 3) return 0;
        $bonus = 0;
        foreach ($this->downlines as $downline) {
            if ($downline->hasMadeMinimumPurchase()) {
                $bonus += $downline->sales()->sum('total_price') * ($percentage / 100);
                $bonus += $downline->calculateDownlineBonus($generation + 1, $this->getNextGenerationPercentage($generation));
            }
        }
        return $bonus;
    }

    // Obtenir le pourcentage de bonus pour la génération suivante
    private function getNextGenerationPercentage($generation)
    {
        switch ($generation) {
            case 1:
                return 3;
            case 2:
                return 2;
            default:
                return 0;
        }
    }*/

    /*public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    // Relation avec le parrain
    public function sponsor()
    {
        return $this->belongsTo(User::class, 'sponsor_id');
    }*/

    // Relation avec les filleuls
    /*public function downlines()
    {
        return $this->hasMany(User::class, 'sponsor_id');
    }*/

    // Vérifie si l'utilisateur a effectué un achat minimum
    /*private function hasMadeMinimumPurchase()
    {
        $minimumPurchase = 100;
        return $this->sales()->where('created_at', '>=', now()->startOfMonth())->sum('total_price') >= $minimumPurchase;
    }

    // Calcul des bonus
    public function calculateBonus()
    {
        $bonus = 0;
        if ($this->hasMadeMinimumPurchase()) {
            $bonus += $this->sales()->sum('total_price') * 0.20;
            $bonus += $this->calculateDownlineBonus(1, 5);
        }
        return $bonus;
    }

    // Calcul des bonus des filleuls
    private function calculateDownlineBonus($generation, $percentage)
    {
        if ($generation > 3) return 0;
        $bonus = 0;
        foreach ($this->downlines as $downline) {
            if ($downline->hasMadeMinimumPurchase()) {
                $bonus += $downline->sales()->sum('total_price') * ($percentage / 100);
                $bonus += $downline->calculateDownlineBonus($generation + 1, $this->getNextGenerationPercentage($generation));
            }
        }
        return $bonus;
    }

    // Obtenir le pourcentage de bonus pour la génération suivante
    private function getNextGenerationPercentage($generation)
    {
        switch ($generation) {
            case 1:
                return 3;
            case 2:
                return 2;
            default:
                return 0;
        }
    }*/
    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    // Relation avec le parrain
    public function sponsor()
    {
        return $this->belongsTo(User::class, 'sponsor_id');
    }

    // Relation avec les filleuls
    public function downlines()
    {
        return $this->hasMany(User::class, 'sponsor_id');
    }

    // Vérifie si l'utilisateur a effectué un achat minimum
    private function hasMadeMinimumPurchase()
    {
        $minimumPurchase = 100;
        return $this->sales()->where('created_at', '>=', now()->startOfMonth())->sum('total_price') >= $minimumPurchase;
    }

    // Calcul des bonus
    public function calculateBonus()
    {
        $bonus = 0;

        // Vérifie si l'utilisateur lui-même a fait un achat minimum ce mois-ci
        if ($this->hasMadeMinimumPurchase()) {
            // Calcul du bonus pour l'utilisateur lui-même (20% de ses achats)
            $bonus += $this->sales()->sum('total_price') * 0.20;

            // Calcul des bonus pour les filleuls
            $bonus += $this->calculateDownlineBonus(1, 5);
        }

        return $bonus;
    }

    // Calcul des bonus des filleuls
    private function calculateDownlineBonus($generation, $percentage)
    {
        if ($generation > 3) return 0; // Limite à 3 générations

        $bonus = 0;

        // Pour chaque filleul de cette génération
        foreach ($this->downlines as $downline) {
            // Vérifie si le filleul ou ses descendants ont fait un achat minimum ce mois-ci
            if ($downline->hasMadeMinimumPurchase()) {
                // Calcul du bonus pour ce filleul (5% de ses achats)
                $bonus += $downline->sales()->sum('total_price') * ($percentage / 100);

                // Calcul du bonus pour les générations suivantes
                $bonus += $downline->calculateDownlineBonus($generation + 1, $this->getNextGenerationPercentage($generation));
            }
        }

        return $bonus;
    }

    // Obtenir le pourcentage de bonus pour la génération suivante
    private function getNextGenerationPercentage($generation)
    {
        switch ($generation) {
            case 1:
                return 3; // 3% pour la génération suivante
            case 2:
                return 2; // 2% pour la génération suivante
            default:
                return 0; // Aucun bonus pour les générations supplémentaires
        }
    }
}
