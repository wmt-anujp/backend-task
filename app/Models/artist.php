<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class artist extends Model
{
    use HasFactory;
    public function setNameAttributes($value)
    {
        $this->attributes["name"] = "Mr. " . $value;
    }
    public function setEmailAttributes($value)
    {
        $this->attributes["email"] = $value . "@gmail.com";
    }
}
