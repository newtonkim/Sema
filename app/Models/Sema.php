<?php

namespace App\Models;

use App\Events\SemaCreated;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sema extends Model
{
    use HasFactory;

    protected $fillable = ['message'];

    protected $dispatchesEvents = [
        'created' => SemaCreated::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
