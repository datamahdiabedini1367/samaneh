<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonsTable extends Migration
{
    public function up()
    {
        Schema::create('persons', function (Blueprint $table) {
            $table->id();
            $table->string('firstName',70)->comment('نام');
            $table->string('nikeName',70)->nullable()->comment('نام دیگر');
            $table->string('lastName',70)->comment('نام خانوادگی');
            $table->string('fatherName',70)->nullable()->comment('نام پدر');
            $table->string('motherName',70)->nullable()->comment('نام مادر');
            $table->boolean('married')->nullable()->comment('وضعیت تاهل');
            $table->string('birthdate',10)->nullable()->comment('تاریخ تولد');
            $table->string('birthdatePlace',200)->nullable()->comment('محل تولد');
            $table->tinyInteger('gender')->comment('جنسیت');
            $table->string('nationalCode',10)->nullable()->comment('کد ملی');
            $table->text('address')->nullable()->comment('ادرس محل زندگی');
            $table->text('bio')->nullable()->comment('بیوگرافی');
            $table->text('entertainments')->nullable()->comment('سرگرمی ها');
            $table->text('personalFavorites')->nullable()->comment('علایق شخصی');
            $table->text('politicalOrientation')->nullable()->comment('گرایش سیاسی');
            $table->string('languageUse')->nullable()->comment('زبان های مورد استفاده');



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
        Schema::dropIfExists('persons');
    }
}
