<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    protected $fillable = [
        'about','phone','social_networks'
    ];

    public function user(){
        return $this->belongsTo(User::class) ;
    }

    public function getSocialNetworksAttribute(){

        return $this->attributes['social_networks'] ? json_decode($this->attributes['social_networks'], true) : [];


    }
}
