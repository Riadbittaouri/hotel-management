<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminActivitiesTable extends Migration
{
    public function up()
    {
        Schema::create('admin_activities', function (Blueprint $table) {
            $table->id();
            $table->string('activity_description');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('admin_activities');
    }
}
