<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;


class Menu extends Model
{
    use HasFactory;

    protected static function booted()
    {
        parent::boot();

        static::addGlobalScope('ordering', function (Builder $builder) {
            $builder->orderBy('menus.order');
        });
    }

    public function pages(){
        return $this->hasMany(Page::class);
    }
}
