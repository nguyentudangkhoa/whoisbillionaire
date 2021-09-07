<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable =['question', 'answer_a', 'answer_b', 'answer_c', 'answer_d', 'answer_right', 'voice', 'level_id'];

    public function level()
    {
        return $this->belongsTo('App\Models\Level', 'level_id', 'id');
    }
}
