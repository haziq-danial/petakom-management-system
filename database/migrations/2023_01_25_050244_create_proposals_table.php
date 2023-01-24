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
        Schema::create('proposals', function (Blueprint $table) {
            $table->id('ProposalID');
            $table->unsignedBigInteger('OwnerID');
            $table->text('title');
            $table->longText('proposal_content');
            $table->boolean('hosd_approval');
            $table->boolean('coodinator_approval');
            $table->boolean('dean_approval');
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
        Schema::dropIfExists('proposals');
    }
};
