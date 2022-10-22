<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Device;
use App\Coach;
use App\Trainee;

class Course extends Model
{
    //soft delete
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'image',
        'sport_type',
        'subscribe_type',
        'subscribe_cost',
        'coach_id',
        'published_at',
        'ended_at',
        'time_start',
        'time_end'
    ];
    // OR $guard=[] ;


    public function getImageAttribute($image)
    {
        return asset($image);
    }

    public function devices()
    {
        return $this->hasMany('App\Device');
    }

    public function coach()
    {
        return $this->belongsTo('App\Coach');
    }

    public function trainees()
    {
        return $this->belongsToMany('App\Trainee');
    }

    public function advert()
    {
        return $this->hasOne('App\Advert');
    }

    public function hasTrainee($traineeId)
    {
        return in_array($traineeId, $this->trainees->pluck('id')->toArray());
    }
}
