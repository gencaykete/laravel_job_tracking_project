<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_developers', function (Blueprint $table) {
            $table->id();
            $table->integer('project_id');
            $table->integer('developer_id');
            $table->double('price');
            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();
            $table->longText('notes')->nullable();
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
        Schema::dropIfExists('project_developers');
    }
};
