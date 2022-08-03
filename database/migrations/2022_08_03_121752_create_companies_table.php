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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->integer('original_id');  
            $table->string('name')->nullable(true);
            $table->integer('responsibleUserId')->nullable(true);   
            $table->integer('groupId')->nullable(true);   
            $table->integer('createdBy')->nullable(true);   
            $table->integer('updatedBy')->nullable(true);   
            $table->integer('createdAt')->nullable(true);   
            $table->integer('updatedAt')->nullable(true);   
            $table->integer('closestTaskAt')->nullable(true);   
            $table->integer('accountId')->nullable(true);   
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
        Schema::dropIfExists('companies');
    }
};
