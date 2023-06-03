<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable = [
        'QUES_LIBELLE',
        'created_at',
        'updated_at',
        'sondage_id',
    ];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
        'sondage_id',
    ];

    public function selections()
    {
        return $this->hasMany(Selection::class);
    }

    public function sondages()
    {
        return $this->belongsTo(Sondage::class);
    }
    
    public $timestamps = false;
}
