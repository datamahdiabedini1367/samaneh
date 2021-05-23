<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyPersonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_person', function (Blueprint $table) {
            $table->id();
            $table->foreignId('person_id')->constrained('persons','id');
            $table->foreignId('company_id')->constrained('companies','id');
            $table->text('reasonLeavingJob')->nullable()->comment('دلیل ترک شغل');
            $table->string('startDate',10)->nullable()->comment('تاریخ شروع به کار');
            $table->string('endDate',10)->nullable()->comment('تاریخ خاتمه');
            $table->string('semat',100)->nullable()->comment('سمت');
            $table->string('section',100)->nullable('section')->comment('بخش');



//            $table->primary(['person_id','company_id','id']);

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
        Schema::dropIfExists('company_person');
    }
}
