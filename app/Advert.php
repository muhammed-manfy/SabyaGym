<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Admin;
use App\Course;

class Advert extends Model
{
    // Use Soft Deleted
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'context', 'title','discount_rate', 'admin_id', 'course_id'
    ];

    
    public function admin()
    {
        return $this->belongsTo('App\Admin');
    }

    public function course()
    {
        return $this->belongsTo('App\Course');
    }
}
