<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RouteEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        DB::table('route_events')
            ->delete();

        $insertArray = [];
        $setArray = [
            ['set' => '取得','en'=>'index'],
            ['set' => '新增','en'=>'store'],
            ['set' => '取得單一','en'=>'show'],
            ['set' => '編輯','en'=>'update'],
            ['set' => '刪除','en'=>'destroy']
        ];
        $resApi = [
            ['name'=>'user','Cname'=>'user'],
            ['name'=>'vendor','Cname'=>'廠商'],
            ['name'=>'vendorType','Cname'=>'廠商類別']
        ];

        foreach($resApi as $i){
            for($j = 0;$j<=4;$j++){
                array_push($insertArray,[
                    'name'=>$setArray[$j]['set'].$i['Cname'],
                    'url'=>$i['name'].'.'.$setArray[$j]['en']
                ]);
            }
        }

        DB::table('route_events')
            ->insert($insertArray);
    }
}
