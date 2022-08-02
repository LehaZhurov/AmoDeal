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
            $table->integer('original_id');
            $table->string('name');
            $table->integer('responsibleUserId');
            $table->integer('groupId')->nullable(true);
            $table->integer('createdBy');
            $table->integer('updatedBy');
            $table->integer('createdAt');
            $table->integer('updatedAt');
            $table->integer('accountId');
            $table->integer('pipelineId');
            $table->integer('statusId');
            $table->integer('closedAt')->nullable(true);
            $table->integer('closestTaskAt')->nullable(true);
            $table->integer('price');   
            $table->integer('lossReasonId')->nullable(true);
            $table->string('lossReason')->nullable(true);
            $table->boolean('isDeleted')->nullable(true);
            $table->string('tags')->nullable(true);
            $table->integer('sourceId')->nullable(true);
            $table->integer('sourceExternalId')->nullable(true);
            $table->integer('score')->nullable(true);
            $table->boolean('isPriceModifiedByRobot')->nullable(true);
            $table->string('contacts')->nullable(true);
            $table->string('catalogElementsLinks')->nullable(true);
            $table->integer('visitorUid')->nullable(true);
            $table->string('metadata')->nullable(true);
            $table->integer('complexRequestIds')->nullable(true);
            $table->boolean('isMerged')->nullable(true);
            $table->integer('requestId')->nullable(true);        
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
