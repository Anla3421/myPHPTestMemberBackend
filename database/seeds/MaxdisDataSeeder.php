<?php

use Illuminate\Database\Seeder;

class MaxdisDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $newtime=time()+(random_int(1,24)*random_int(1,60)*random_int(1,60)*random_int(1,7)); //小時,分,秒,天
        DB::table('player_save')->insert([
            'gid' =>'1',
            'token'=>'99999',
            'name'=>'tim',
            'profile'=>'1',
            'value'=>'fadsad',
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('player_save')->insert([
            'gid' =>'2',
            'token'=>'65999',
            'name'=>'Sam',
            'profile'=>'44444',
            'value'=>'faddfdsf',
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('game')->insert([
            'id'=>'1',
            'gid' =>'1',
            'info_id'=>'123',
            'provider_id'=>'123',
            'status'=>'1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('game')->insert([
            'id'=>'2',
            'gid' =>'2',
            'info_id'=>'321',
            'provider_id'=>'321',
            'status'=>'0',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('game_info')->insert([
            'info_id'=>'1',
            'name' =>'維尼推車車',
            'name_cn' =>'维尼推车车',
            'name_en' =>'Winnie the Pooh',
            'name_jp' =>'くまのプーさん',
            'server_host'=>'127.0.0.1',
            'server_path'=>'555',
            'server_port'=>8000,
            'server_demo_port'=>8000,
            'client_dir_name'=>'qqqqq',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('game_info')->insert([
            'info_id'=>'2',
            'name' =>'他的手可以穿過我的88',
            'name_cn' =>'他的手可以穿过我的88',
            'name_en' =>'His hand can pass through my 88',
            'name_jp' =>'彼の手は私の88を通過することができます',
            'server_host'=>'192.168.0.50',
            'server_path'=>'666',
            'server_port'=>8080,
            'server_demo_port'=>8002,
            'client_dir_name'=>'ssssss',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('provider')->insert([
            'id'=>'1',
            'username' =>'kkkkk',
            'private_key'=>'54562',
            'game_url'=>'192.168.1.111',
            'name'=>'321',
            'enabled'=>'1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('provider')->insert([
            'id'=>'2',
            'username' =>'lllll',
            'private_key'=>'54562',
            'game_url'=>'192.168.1.111',
            'name'=>'999',
            'enabled'=>'0',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('report')->insert([
            'id'=>'1',
            'token'=>'654879',
            'gid'=>'3',
            'in'=>'123.333',
            'out'=>'321.666',
            'wage'=>'99999.456',
            'surplus'=>'11.001',
            'goods'=>'0',
            'profile'=>'0',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('report')->insert([
            'id'=>'2',
            'token'=>'roeutsds',
            'gid'=>'4',
            'in'=>'999.333',
            'out'=>'321.777',
            'wage'=>'985529.456',
            'surplus'=>'1195845.001',
            'goods'=>'0',
            'profile'=>'0',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('report_dtl')->insert([
            'id'=>'1',
            'seq'=>'1',
            'tid'=>'1',
            'in'=>'999.333',
            'out'=>'321.777',
            'surplus'=>'1195845.001',
            'round'=>'5555.44444',
            'result'=>'11111',
            'remark'=>'99999',
        ]);
        DB::table('report_dtl')->insert([
            'id'=>'2',
            'seq'=>'2',
            'tid'=>'2',
            'in'=>'95454.333',
            'out'=>'35461.777',
            'surplus'=>'1195845.001',
            'round'=>'5555.44444',
            'result'=>'11111',
            'remark'=>'99999',
        ]);
        DB::table('server_config')->insert([
            'gid'=>'1',
            'name'=>'arth2',
            'profile'=>'2',
            'value'=>'95454.333',
            'updated_at'=>date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('server_config')->insert([
            'gid'=>'2',
            'name'=>'arth44',
            'profile'=>'233',
            'value'=>'9124874.333',
            'updated_at'=>date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('player')->insert([
            'id'=>'1',
            'provider_id'=>'2',
            'name'=>'fdsddf',
            'uniq_id'=>'444',
            'last_at'=>date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('player')->insert([
            'id'=>'2',
            'provider_id'=>'3',
            'name'=>'fqewfra',
            'uniq_id'=>'499',
            'last_at'=>date('Y-m-d H:i:s',$newtime),
        ]);
    }
}