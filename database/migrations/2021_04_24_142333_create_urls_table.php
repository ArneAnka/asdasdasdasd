<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUrlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('urls', function (Blueprint $table) {
            $table->id();
            // $table->uuid('uuid')->primary()->unique();
            $table->foreignId('user_id')->constrained()->nullable()->onDelete('cascade');;
            $table->string('topic');
            $table->string('url')->unique();
            $table->string('site');
            $table->boolean('sticky')->default(0);
            $table->boolean('hidden')->default(0);
            $table->ipAddress('ip_address')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('urls');
    }
}
