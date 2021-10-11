<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonRelatedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person_related', function (Blueprint $table) {
//            $table->id();
//            $table->foreignId('person_id')->constrained('persons','id');
//            $table->integer('id',true);

            $table->foreignId('related_id')->constrained('persons','id');

            $table->foreignId('individual_id')->constrained('individuals','id')->comment('نسبت با فرد');

            $table->foreignId('person_id')->constrained('persons','id')->onDelete('cascade');

            $table->text('description')->nullable()->comment('توضیحات');

            $table->primary(['person_id','related_id']);


//            $table->primary([ 'related_id']);
//            $table->index(['person_id', 'related_id']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('person_related');
    }
}
