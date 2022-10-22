<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Course;


class Device extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'image', 'type', 'num_of_devices', 'course_id',
    ];

    public function getImageAttribute($image)
    {
        return asset($image); //asset => public
    }

    public function course()
    {
        return $this->belongsTo('App\Course');
    }
}
