<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpclsTable extends Migration
{
    
    public function up()
    {
        Schema::create('opcls', function (Blueprint $table) {
            $table->id();
            $table->string('open')->nullable();
            $table->string('close')->nullable();
            $table->timestamps();
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('opcls');
    }
}
