<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;
    protected $fillable = [
        'VOT_DATE',
        'created_at',
        'updated_at',
        'selection_id',
        'user_id',
    ];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
        'selection_id',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function selection()
    {
        return $this->belongsTo(Selection::class);
    }
}
