<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDataPersonalToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('user_role')->nullable()->after('name');
            $table->string('gender')->nullable()->after('user_role');
            $table->char('telepon')->nullable()->after('gender');
            $table->text('adddress')->nullable()->after('telepon');
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
            $table->dropColumn('user_role');
            $table->dropColumn('gender');
            $table->dropColumn('telepon');
            $table->dropColumn('address');
        });
    }
}
