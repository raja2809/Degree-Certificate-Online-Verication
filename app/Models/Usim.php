<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Usim extends Model
{
    use HasFactory;

    

    protected $table="usims";
    protected $fillable=['name','secondname','studentno','date','faculty','degree','level','university','year',];

    public static function getEmployee()

    {
    $records = DB::table('usims') ->select('Id','name','secondname','studentno','date','faculty','degree','university','year',)->get()-toArray();
    return $records;

    }

}
