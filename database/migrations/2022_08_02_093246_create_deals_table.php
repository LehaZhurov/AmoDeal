<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->int('responsibleUserId');
            $table->int('groupId')->nullable(true);
            $table->int('createdBy');
            $table->int('updatedBy');
            $table->int('createdAt');
            $table->int('updateAt');
            $table->int('accountId');
            $table->int('pipelineId');
            $table->int('statusId');
            $table->int('closestTaskAt')->nullable(true);
            $table->int('');           
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
        Schema::dropIfExists('deals');
    }
};
