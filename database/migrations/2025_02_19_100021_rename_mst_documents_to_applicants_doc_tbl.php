<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mst_documents', function (Blueprint $table) {
            Schema::rename('mst_documents', 'tnelb_applicants_doc');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mst_documents', function (Blueprint $table) {
            Schema::rename('tnelb_applicants_doc', 'mst_documents');
        });
    }
};
