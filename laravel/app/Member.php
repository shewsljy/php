<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    public static function getMember ()
    {
        return 'my name is super member!';
    }
}
