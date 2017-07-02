<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Add status column to users
        if (!Schema::hasColumn('users', 'status')) {
            Schema::table('users', function(Blueprint $table) {
                $table->integer('status')->default(0);
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
        // Remove status column
        if (Schema::hasColumn('users', 'status')) {
            Schema::table('users', function(Blueprint $table) {
                $table->dropColumn('status');
            });
        }
    }
}
