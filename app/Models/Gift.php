<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gift extends Model
{
    use HasFactory;
protected $filable = [
'name',
'price',
'description',
'status',
'cover',
'rating',
];

}
