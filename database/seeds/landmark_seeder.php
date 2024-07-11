<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class landmark_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 25; $i++){
            $resOrdNum = '000'.random_int(100,999).'-'.random_int(10,99);
            $landmark = DB::table('resordlmark')->insert([
                'ResOrdNum' => $resOrdNum,
                'Title'     => Str::random(500),
                'ImgName'   => $resOrdNum,
                'landmark'  => 1
            ]);
        }
    }
}
