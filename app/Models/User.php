<?php

namespace App\Models;

use App\Models\Habit;
use App\Models\HabitLog;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    // Um usuário pode ter muitos hábitos
    public function habits(): HasMany
    {
        return $this->hasMany(Habit::class);
    }

    // Um usuário pode ter muitos registros de hábitos
    public function habitLogs(): HasMany
    {
        return $this->hasMany(HabitLog::class);
    }
}
