<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // Create the 'admins' table
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('admin_id');
            $table->string('password');
            $table->string('gender');
            $table->string('rank')->default('admin');
            $table->string('super_user')->nullable();
            $table->timestamps();
        });

        // Create the 'categories' table
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('category_name');
            $table->timestamps();
        });

        // Create the 'departments' table
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('department_name');
            $table->timestamps();
        });


        // Create the 'materials' table
        Schema::create('materials', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subject_id');
            $table->string('pdf_file_name');
            $table->text('pdf_file_link');
            $table->text('pdf_file_download');
            $table->timestamps();
        });

        // Create the 'professors' table
        Schema::create('professors', function (Blueprint $table) {
            $table->id();
            $table->string('professor_name');
            $table->timestamps();
        });

        // Create the 'subjects' table
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('subject_name');
            $table->text('description');
            $table->string('academic_subject_code');
            $table->unsignedBigInteger('department_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('professor_id')->nullable();
            $table->timestamps();
        });

        // Create the 'videos' table
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->string('video_title');
            $table->string('video_url');
            $table->unsignedBigInteger('subject_id');
            $table->unsignedBigInteger('department_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('professor_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Drop all the created tables
        Schema::dropIfExists('admins');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('departments');
        Schema::dropIfExists('materials');
        Schema::dropIfExists('migrations');
        Schema::dropIfExists('professors');
        Schema::dropIfExists('subjects');
        Schema::dropIfExists('videos');
    }
};
