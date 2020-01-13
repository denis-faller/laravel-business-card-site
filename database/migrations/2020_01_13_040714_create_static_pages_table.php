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
            $table->string('name', 255);
            $table->string('description', 255);
            $table->string('url', 255);
            $table->text('html');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
            $table->index('url');
            $table->unique('url');
        });
        $date = Carbon\Carbon::now();
        DB::table('static_pages')->insert(
            ['name' => 'Главная', 'description' => 'Описание компании', 'url' => '', 'html' => '<p>Главная страница</p>', 'created_at' => $date, 'updated_at' => $date, 'deleted_at' => $date]
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
