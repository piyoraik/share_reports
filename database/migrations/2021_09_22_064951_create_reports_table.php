<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->integer('id', true)->comment('レポートID');
            $table->date('rp_date')->comment('作業日');
            $table->time('rp_time_from')->comment('作業開始時間');
            $table->time('rp_time_to')->comment('作業終了時間');
            $table->text('rp_content')->comment('作業内容');
            $table->dateTime('rp_created_at')->comment('登録日時');
            $table->integer('reportcate_id')->index('reportcate_id')->comment('作業種類ID');
            $table->integer('user_id')->index('user_id')->comment('報告者ID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports');
    }
}
