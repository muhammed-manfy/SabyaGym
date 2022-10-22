<?php

namespace App;

use App\Trainee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medical extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'hospital_name', 'previous_operation', 'disases', 'trainee_id'
    ];


    public function trainee()
    {
        return $this->belongsTo('App\Trainee');
    }
}
