<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Sondage extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'SON_TITRE',
        'SON_DATE',
        'SON_DESCRIPTION',
        'created_at',
        'updated_at',
    ];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
        'user_id'
    ];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function selections(): HasManyThrough
    {
        return $this->through('questions')->has('selections');
    }
}
