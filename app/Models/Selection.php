<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Selection extends Model
{
    use HasFactory;
    protected $fillable = [
        'SELEC_LIBELLE',
        'created_at',
        'updated_at',
        'question_id',
    ];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
        'question_id',
    ];

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

    public function questions()
    {
        return $this->belongsTo(Question::class);
    }
}
