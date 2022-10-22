<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Cleaner;
use App\Coach;
use App\User;
use App\Advert;
use Carbon\Carbon;

class Admin extends Model
{
    //soft delete
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'image', 'full_name', 'phone', 'birthday', 'salary', 'certificate', 'user_id',
    ];

    public function getImageAttribute($image)
    {
        return asset($image);
    }

    public function adverts()
    {
        return $this->hasMany('App\Advert'); //$this refer to Admin
    }

    public function coachs()
    {
        return $this->hasMany('App\Coach');
    }

    public function cleaners()
    {
        return $this->hasMany('App\Cleaner');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getAge()
    {
        $myDate = $this->birthday;
        $years = \Carbon\Carbon::parse($myDate)->age;
        return $years;
    }
}
