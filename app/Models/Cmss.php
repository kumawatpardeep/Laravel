<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cmss extends Model
{
    use HasFactory;
    protected $table='cmsses';

    protected $fillable=[
        'title',
        'description'
    ];
}
