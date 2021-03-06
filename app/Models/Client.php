<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model 
{
 
    protected $fillable = 
    	                   ['name', 'email', 'birth_date', 'city_id', 'phone', 'donation_last_date', 'password', 'blood_type', 'is_active', 'api_token'];
 


    public function city()
    {
    	return $this->belongsTo(City::class);
    }
 

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
 

    public function DonationRequests()
    {
        return $this->hasMany(DonationRequest::class);
    }
 

    public function reports()
    {
        return $this->hasMany(Report::class);
    }  

    public function favorite()
    {
        return $this->belongsToMany(Post::class)->withTimestamps();  
    }
 

    public function notification_blood()
    {
        return $this->belongsToMany(BloodType::class , 'blood_type_client');  
    }
 

    public function notification_city()
    {
        return $this->belongsToMany(City::class , 'city_client');  
    }



    protected $hidden = [
        'password', 'api_token',
    ];
}