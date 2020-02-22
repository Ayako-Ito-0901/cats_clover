<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->date('birth');
            $table->integer('family_of');
            $table->integer('post_address');
            $table->string('prefecture');
            $table->string('address');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('birth');
            $table->dropColumn('family_of');
            $table->dropColumn('post_address');
            $table->dropColumn('prefecture');
            $table->dropColumn('address');
            
        });
    }
}
