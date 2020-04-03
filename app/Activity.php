<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Mews\Purifier\Facades\Purifier;


class Activity extends Model
{
    protected $guarded = [];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function method()
    {
        return $this->belongsTo(Method::class);
    }


    /**
     * @return array
     *This  will purify all of the model attributes from scripts tags etc.
     *
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }

}
