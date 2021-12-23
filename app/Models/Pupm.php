<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pupm extends Model
{
    use HasFactory;
    protected $table="pupms";
    protected $fillable=['name','faculty',];

}
