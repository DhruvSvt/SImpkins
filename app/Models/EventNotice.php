<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventNotice extends Model
{
    use HasFactory, SoftDeletes;

    protected static function booted()
    {
        parent::boot();

        static::addGlobalScope('ordering', function (Builder $builder) {
            $builder->orderBy('event_notices.order');
        });
    }
}
