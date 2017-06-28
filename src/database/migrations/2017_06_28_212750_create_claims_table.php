<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClaimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create claims table if it doesn't already exist
        if (!Schema::hasTable('claims')) {
            Schema::create('claims', function(Blueprint $table) {
                $table->increments('id');
                $table->timestamps();
                $table->integer('user_id')->unsigned();
                $table->foreign('user_id')->references('id')->on('users');
                $table->integer('status')->default(0);
                $table->string('company')->nullable();
                $table->string('address1')->nullable();
                $table->string('address2')->nullable();
                $table->string('city')->nullable();
                $table->string('county')->nullable();
                $table->string('postcode')->nullable();
                $table->string('country')->nullable();
                $table->string('phone')->nullable();
                $table->string('part_number')->nullable();
                $table->integer('part_quantity')->nullable();
                $table->string('reward_preference')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Drop the claims table
        Schema::dropIfExists('claims');
    }
}
