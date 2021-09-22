<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->integer('id', true)->comment('ユーザID');
            $table->text('us_mail')->comment('メールアドレス');
            $table->text('us_name')->comment('名前');
            $table->text('us_password')->comment('パスワード');
            $table->integer('us_auth')->default(2)->comment('権限 : 0=終了
1=管理者
2=一般');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
