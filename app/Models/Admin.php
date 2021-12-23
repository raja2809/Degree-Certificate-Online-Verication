<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Admin extends Model
{
    use HasFactory;

    protected $table="admins";
    protected $fillable=['name','secondname','studentno','date','faculty','degree','university','year',];

    public static function getEmployee()

    {
    $records = DB::table('admins') ->select('Id','name','secondname','studentno','date','faculty','degree','university','year',)->get()-toArray();
    return $records;

    }




}