<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pusim extends Model
{
    use HasFactory;
    protected $table="pusims";
    protected $fillable=['name','faculty',];

}
