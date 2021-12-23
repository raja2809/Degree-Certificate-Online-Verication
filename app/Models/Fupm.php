<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fupm extends Model
{
    use HasFactory;
    protected $table="fupms";
    protected $fillable=['name',];

}
