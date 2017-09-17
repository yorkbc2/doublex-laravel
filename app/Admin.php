<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    public static function checkSession() {
        if(session()->get("admin")) {
            return true;
        }
        else {
            return false;
        }
    }
}
