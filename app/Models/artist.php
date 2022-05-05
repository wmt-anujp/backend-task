<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class artist extends Model
{
    use HasFactory;
    public $timestamps = true;
    public function setNameAttribute($value)
    {
        $this->attributes["name"] = "Mr. " . $value;
    }
    public function setEmailAttribute($value)
    {
        $this->attributes["email"] = $value . "@gmail.com";
    }

    // accessor demo
    public function getUsernameAttribute($value)
    {
        return ucfirst($value);
    }
}
