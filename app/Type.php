<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Stevebauman\Purify\Facades\Purify;


class Type extends Model
{
    protected $fillable = ['name', 'consumer_number', 'user_id'];

    public function activity($month = "01", $year = '2020')
    {
        return $this->hasMany(Activity::class)->where('user_id', auth()->user()->id)->whereMonth('paid_at', $month)->whereYear('paid_at', $year);
    }

    public function task()
    {
        return $this->hasMany(Task::class)->where('done', 0)->where('user_id', auth()->user()->id);
    }

    public function information()
    {
        return $this->belongsTo(Information::class);
    }

    /**
     * @return array
     */
    public function getAttributes(): array
    {
        return Purify::clean($this->attributes);
    }


}
