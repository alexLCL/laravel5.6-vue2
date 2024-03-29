<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Cafe;

class BrewMethod extends Model
{
    public function cafes(){
        return $this->belongsToMany(Cafe::class, 'cafes_brew_methods', 'brew_method_id', 'cafe_id');
    }


}
