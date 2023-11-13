<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCpl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_cpl', function (Blueprint $table) {
            $table->increments('id_cpl');

            $table->unsignedBigInteger('id_kurikulum_fk')->nullable();
            $table->string('kode_cpl', 20)->nullable();
            $table->string('deskripsi_cpl', 20)->nullable();

            $table->timestamps();
            $table->softDeletes(); // Generate deleted_at
            $table->integer('created_by')->default(0);
            $table->integer('updated_by')->default(0);
            $table->integer('deleted_by')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('c_cpl');
    }
}
