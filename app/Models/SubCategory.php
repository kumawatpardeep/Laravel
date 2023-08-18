<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    public function getCategory(){
        return $this->belongsTo('App\Models\Category','categorie_id','id');
    }
}
