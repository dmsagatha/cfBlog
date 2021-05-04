<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
  public function up()
  {
    Schema::create('posts', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->string('slug');
      $table->text('extract')->nullable();
      $table->longText('body')->nullable();
      $table->enum('status', [1, 2])->default(1);   // 1 Borrador 2 Publicado

      $table->foreignId('user_id')->constrained()->onDelete('cascade');
      $table->foreignId('category_id')->constrained()->onDelete('cascade');

      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::dropIfExists('posts');
  }
}