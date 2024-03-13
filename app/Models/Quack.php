<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Quack extends Model
{
    use HasFactory;

    protected $fillable = ['content'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
