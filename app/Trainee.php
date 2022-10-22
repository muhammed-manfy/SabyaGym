<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Medical;
use App\User;
use App\Course;


class Trainee extends Model
{
    use SoftDeletes;
    protected $dates = [
        'deleted_at'
    ];

    protected $fillable = [
        'image', 'full_name', 'phone', 'work_place', 'birthday', 'user_id',
    ];

    public function getImageAttribute($image)
    {
        return asset($image);
    }

    public function medical()
    {
        return $this->hasOne('App\Medical');
    }

    public function courses()
    {
        return $this->belongsToMany('App\Course');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
