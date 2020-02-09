<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Stevebauman\Purify\Facades\Purify;

class Method extends Model
{
    protected $fillable = ['type', 'english_type'];

    /**
     * @return array
     */
    public function getAttributes(): array
    {
        return Purify::clean($this->attributes);
    }

}
