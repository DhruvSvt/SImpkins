<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluminai extends Model
{
    protected $fillable = [
        'name',
        'std_title',
        'image',
        'description',  
    ];
    use HasFactory;
}
