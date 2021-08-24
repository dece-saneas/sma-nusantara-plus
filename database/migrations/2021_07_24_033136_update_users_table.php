<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('no_registration')->after('remember_token')->nullable();
            $table->unsignedBigInteger('gelombang_id')->after('no_registration')->nullable();
            $table->string('status')->after('gelombang_id')->nullable();
            
            $table->foreign('gelombang_id')->references('id')->on('gelombang')->onDelete('cascade');
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
            $table->dropForeign('users_gelombang_id_foreign');
            $table->dropColumn(['no_registration']);
            $table->dropColumn(['gelombang_id']);
            $table->dropColumn(['status']);
        });
    }
}
