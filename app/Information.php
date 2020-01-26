<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Stevebauman\Purify\Facades\Purify;

class Information extends Model
{
    protected $guarded = [];
    /**
     * @return array
     */
    public function getAttributes(): array
    {
        return Purify::clean($this->attributes);
    }

}
