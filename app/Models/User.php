<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    public function department(){
        return $this->belongsTo(Department::class);
    }
    public function designation(){
        return $this->belongsTo(Designation::class);
    }
}
