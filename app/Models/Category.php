<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    // public function SubCategory(){
    //     return $this->hasOne('App\Models\SubCategory','categorie_id');
    // }
    public function getSubCategory(){
        return $this->hasMany('App\Models\SubCategory','categorie_id');
    }
}
