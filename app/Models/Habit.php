<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Habit extends Model
{
    use HasFactory;

   protected $fillable = [
    'name',
    'description',
    'user_id'
];

    // Um hábito pertence a um usuário
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Um hábito possui vários registros
    public function habitLogs(): HasMany
    {
        return $this->hasMany(HabitLog::class);
    }
}
