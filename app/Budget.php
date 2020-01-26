<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Stevebauman\Purify\Facades\Purify;

class Budget extends Model
{
    protected $fillable = ['budget', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    /**
     * @return array
     */
    public function getAttributes(): array
    {
        return Purify::clean($this->attributes);
    }

}
