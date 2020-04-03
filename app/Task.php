<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Mews\Purifier\Facades\Purifier;

class Task extends Model
{
    protected $guarded = [];

    /**
     * @return array
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }

}
