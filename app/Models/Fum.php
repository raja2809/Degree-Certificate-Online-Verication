<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fum extends Model
{
    use HasFactory;
    protected $table="fums";
    protected $fillable=['name',];

}
