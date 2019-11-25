<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleAndAddToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('role');
        });

        DB::table('role')->insert(['role' => 'User']);
        DB::table('role')->insert(['role' => 'Author']);
        DB::table('role')->insert(['role' => 'Moderator']);
        DB::table('role')->insert(['role' => 'Admin']);

        Schema::table('users', function (Blueprint $table) {
            $table->string('username', 50)->unique();
            $table->tinyInteger('role')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role');

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('username');
            $table->dropColumn('role');   
        });
    }
}
