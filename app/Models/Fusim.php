<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fusim extends Model
{
    use HasFactory;
    protected $table="fusims";
    protected $fillable=['name',];

}
