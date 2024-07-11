<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Landmark extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resordlmark', function (Blueprint $table) {
            $table->bigIncrements('ResOrdID');
            $table->string('ResOrdNum')->nullable();
            $table->string('RecType')->nullable();
            $table->string('Title', 8000)->nullable();
            $table->string('CouncilNo')->nullable();
            $table->string('SessionNo')->nullable();
            $table->tinyInteger('Suspended')->nullable();
            $table->dateTime('DateFrstRdng')->nullable();
            $table->string('RemFrstRdng')->nullable();
            $table->dateTime('DateSndRdng')->nullable();
            $table->string('RemSndRdng')->nullable();
            $table->dateTime('DateEnacted')->nullable();
            $table->string('RemEnacted')->nullable();
            $table->tinyInteger('ThirdReading')->nullable();
            $table->dateTime('DateDeferred')->nullable();
            $table->string('RemDefered')->nullable();
            $table->dateTime('DateDisaprov')->nullable();
            $table->string('RemDisaprov')->nullable();
            $table->dateTime('DateVetoed')->nullable();
            $table->dateTime('DateApproved')->nullable();
            $table->string('SubjCode')->nullable();
            $table->string('ClassCode')->nullable();
            $table->string('CodifyCode')->nullable();
            $table->string('AmendTo')->nullable();
            $table->string('AmendNum')->nullable();
            $table->dateTime('DateLaid')->nullable();
            $table->dateTime('DateRetrieve')->nullable();
            $table->string('ReasonLaid')->nullable();
            $table->string('ItemNo')->nullable();
            $table->string('LocatorCode')->nullable();
            $table->string('CouncilCode')->nullable();
            $table->string('OfcRefer')->nullable();
            $table->string('ComitCode')->nullable();
            $table->string('CrossRefNum')->nullable();
            $table->dateTime('DatePublish')->nullable();
            $table->dateTime('DatePassed')->nullable();
            $table->dateTime('DateOveriden')->nullable();
            $table->dateTime('DateRepealed')->nullable();
            $table->string('ImgFile')->nullable();
            $table->string('ImgName')->nullable();
            $table->string('ImgContentType')->nullable();
            $table->string('RefType')->nullable();
            $table->integer('SessionType')->nullable();
            $table->dateTime('DatePublish2')->nullable();
            $table->dateTime('DatePublish3')->nullable();
            $table->integer('Motion')->nullable();
            $table->dateTime('LastUpdate')->nullable();
            $table->dateTime('DatePosted')->nullable();
            $table->dateTime('DatePosted2')->nullable();
            $table->dateTime('DatePosted3')->nullable();
            $table->string('Newspaper')->nullable();
            $table->tinyInteger('landmark')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resordlmark');
    }
}
