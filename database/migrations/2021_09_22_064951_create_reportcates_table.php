<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportcatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reportcates', function (Blueprint $table) {
            $table->integer('id', true)->comment('作業種類ID');
            $table->text('rc_name')->comment('種類名');
            $table->text('rc_note')->nullable()->comment('備考');
            $table->integer('rc_list_flg')->default(1)->comment('リスト表示の有無 : 0=非表示
1=表示');
            $table->integer('rc_order')->default(0)->comment('表示順序');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reportcates');
    }
}
