<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlumniRegisteration extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'dob',
        'gender',
        'martial',
        'phn_no',
        'profession',
        'email',
        'batch',
        'last_class',
        'leaving_year',
        'home_town',
        'country',
        'image',
        'docs',
    ];
}
