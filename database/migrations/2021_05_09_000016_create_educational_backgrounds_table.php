<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationalBackgroundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('educational_backgrounds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('person_id')->constrained('persons','id');

            $table->string('grade',50)->comment('مقطع تحصیلی');
            $table->string('major',100)->comment('رشته تحصیلی');
            $table->string('universityName',100)->nullable()->comment('نام دانشگاه محل تحصیلی');
            $table->text('address')->nullable()->comment('ادرس دانشگاه');
            $table->double('average')->nullable()->comment('معدل');





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
        Schema::dropIfExists('educational_backgrounds');
    }
}
