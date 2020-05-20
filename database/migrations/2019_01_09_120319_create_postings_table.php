<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postings', function (Blueprint $table) {
            $table->integer('id')->unsigned()->index();
            $table->string('name', 80);
            $table->string('status', 5000)->nullable();
            $table->integer('likes')->nullable()->unsigned()->index();
            $table->binary('image')->nullable();       
            $table->string('token', 50)->index();            
            $table->timestamps();

            $table->primary('token');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('postings');
    }
}
