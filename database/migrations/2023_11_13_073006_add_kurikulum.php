<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddKurikulum extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_kurikulum', function (Blueprint $table) {
            $table->increments('id_kurikulum');

            $table->string('kode_kurikulum', 20)->nullable();
            $table->string('nama_kurikulum', 20)->nullable();
            $table->string('tahun', 15)->nullable();
            $table->string('periode', 15)->nullable();
            $table->string('profil_lulusan', 15)->nullable();

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
        Schema::dropIfExists('m_kurikulum');
    }
}
