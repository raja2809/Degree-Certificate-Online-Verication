<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pum extends Model
{
    use HasFactory;
    protected $table="pums";
    protected $fillable=['name','faculty',];

}
