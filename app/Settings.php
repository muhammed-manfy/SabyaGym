<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Settings extends Model
{
      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'site_name', 'email', 'phone_number', 'address','open_days'
    ];
    
}
