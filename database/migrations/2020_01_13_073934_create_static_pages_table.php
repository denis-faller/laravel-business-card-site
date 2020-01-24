<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaticPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('static_pages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('site_id');
            $table->foreign('site_id')->references('id')->on('sites');
            $table->string('name', 255);
            $table->string('description', 255);
            $table->string('url', 255);
            $table->index('url');
            $table->unique('url');
            $table->text('html');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
        $date = Carbon\Carbon::now();
        DB::table('static_pages')->insert(
            ['site_id' => 1, 'name' => 'Главная', 'description' => 'Описание компании', 'url' => '', 'html' => '<p>Главная страница</p>', 'created_at' => $date, 'updated_at' => $date]
        );
        DB::table('static_pages')->insert(
            ['site_id' => 1, 'name' => 'О компании', 'description' => 'Информация о компании', 'url' => 'about', 'html' => '<p>Информация о компании</p>', 'created_at' => $date, 'updated_at' => $date]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('static_pages');
    }
}
