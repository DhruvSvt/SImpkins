<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StdMonthlyJourney extends Model
{
    use HasFactory;

    protected $fillable = ([
        'teacher_id',
        'std_id',
        'classroom_conduct',
        'uniform',
        'punctuality',
        'intelligence',
        'creativity',
        'handwriting',
        'reading',
        'speaking',
        'participation',
    ]);

    public function teacher() {
        return $this->belongsTo(User::class, 'teacher_id');
    }
}
