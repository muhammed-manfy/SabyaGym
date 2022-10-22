<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Admin;
use App\Course;


class Coach extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'image',
        'full_name',
        'phone',
        'birthday',
        'salary',
        'certificate',
        'hours_work',
        'hours_cost',
        'admin_id',
        'user_id',
    ];

    public function getImageAttribute($image)
    {
        return asset($image);
    }

    public function admin()
    {
        return $this->belongsTo('App\Admin');
    }

    public function courses()
    {
        return $this->hasMany('App\Course');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
