<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Mews\Purifier\Facades\Purifier;


class Method extends Model
{
    protected $fillable = ['type', 'english_type'];

    /**
     * @return array
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }

}
