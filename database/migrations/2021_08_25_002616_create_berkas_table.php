<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBerkasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('berkas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            
            $table->string('photo')->nullable();            
            $table->string('photo_status')->nullable();           
            $table->string('photo_notes')->nullable();            
            $table->string('surat_ket_sehat')->nullable();       
            $table->string('surat_ket_sehat_status')->nullable();       
            $table->string('surat_ket_sehat_notes')->nullable();       
            $table->string('payment')->nullable();       
            $table->string('payment_status')->nullable();      
            $table->string('payment_notes')->nullable();
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('berkas');
    }
}
