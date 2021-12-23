<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
	        $table->string('secondname');
            $table->string('studentno')->unique();
            $table->string('certino')->default('USIM-D-');
            $table->date('date');
	        $table->string('faculty');	
            $table->string('degree');
            $table->string('level')->default('Degree');
            $table->string('university');
            $table->string('year');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}

