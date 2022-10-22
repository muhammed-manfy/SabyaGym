<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Admin;


class Cleaner extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'image',
        'full_name',
        'phone',
        'birthday',
        'salary',
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

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
