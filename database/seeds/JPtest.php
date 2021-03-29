<?php

use Illuminate\Database\Seeder;

class JPtest extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $newtime=time()+(random_int(1,24)*random_int(1,60)*random_int(1,60)*random_int(1,7)); //小時,分,秒,天
        DB::table('mainmenujp')->insert([
            'id' => '1',
            'table' => 'アカウント管理',
            'url' => '',
            'mainpage' => '1',
            'icon1' => 'fas fa-user',
            'icon2' => '',
            'icon3' => 'el-icon-s-custom',
            'subid' => '0',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s', $newtime),
            ]);
            DB::table('mainmenujp')->insert([
            'id' => '2',
            'table' => '設定管理',
            'url' => '',
            'mainpage' => '2',
            'icon1' => 'fas fa-cog',
            'icon2' => '',
            'icon3' => 'el-icon-setting',
            'subid' => '0',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s', $newtime),
            ]);
            DB::table('mainmenujp')->insert([
            'id' => '3',
            'table' => 'レポート管理',
            'url' => '',
            'mainpage' => '3',
            'icon1' => 'fas fa-file-csv',
            'icon2' => '',
            'icon3' => 'el-icon-s-marketing',
            'subid' => '0',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s', $newtime),
            ]);
            DB::table('mainmenujp')->insert([
            'id' => '4',
            'table' => '操作レコード',
            'url' => '',
            'mainpage' => '4',
            'icon1' => 'fas fa-clipboard-check',
            'icon2' => '',
            'icon3' => 'el-icon-files',
            'subid' => '0',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s', $newtime),
            ]);
            DB::table('mainmenujp')->insert([
            'id' =>'6',
            'table'=>'会員管理',
            'url'=>'/member',
            'mainpage'=>'0',
            'icon1'=>'fas fa-users-cog',
            'icon2'=>'users',
            'icon3'=>'',
            'subid'=>'1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
            ]);
            DB::table('mainmenujp')->insert([
            'id' =>'7',
            'table'=>'アカウント設定',
            'url'=>'/account',
            'mainpage'=>'0',
            'icon1'=>'fas fa-user-circle',
            'icon2'=>'user-cog',
            'icon3'=>'',
            'subid'=>'2',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
            ]);
            DB::table('mainmenujp')->insert([
            'id' =>'8',
            'table'=>'キャラクタ設定',
            'url'=>'/role',
            'mainpage'=>'0',
            'icon1'=>'fas fa-user-tag',
            'icon2'=>'user-edit',
            'icon3'=>'',
            'subid'=>'2',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
            ]);
            DB::table('mainmenujp')->insert([
            'id' =>'10',
            'table'=>'勝敗レポート',
            'url'=>'/win_lose',
            'mainpage'=>'0',
            'icon1'=>'fas fa-trophy',
            'icon2'=>'trophy',
            'icon3'=>'',
            'subid'=>'3',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
            ]);
            DB::table('mainmenujp')->insert([
            'id' =>'11',
            'table'=>'ベットレコード',
            'url'=>'/history',
            'mainpage'=>'0',
            'icon1'=>'fas fa-funnel-dollar',
            'icon2'=>'money-bill-alt',
            'icon3'=>'',
            'subid'=>'3',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
            ]);
            DB::table('mainmenujp')->insert([
                'id' =>'14',
                'table'=>'ユーザ登録レコード',
                'url'=>'/login_log',
                'mainpage'=>'0',
                'icon1'=>'fas fa-sign-in-alt',
                'icon2'=>'file-import',
                'icon3'=>'',
                'subid'=>'4',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s',$newtime),
                ]);
                DB::table('mainmenujp')->insert([
                'id' =>'15',
                'table'=>'旅記録',
                'url'=>'/course_log',
                'mainpage'=>'0',
                'icon1'=>'fas fa-history',
                'icon2'=>'file-medical-alt',
                'icon3'=>'',
                'subid'=>'4',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s',$newtime),
                ]);
                DB::table('mainmenujp')->insert([
                'id' =>'16',
                'table'=>'ゲーム管理',
                'url'=>'',
                'mainpage'=>'5',
                'icon1'=>'fas fa-cogs',
                'icon2'=>'',
                'icon3'=>'el-icon-s-check',
                'subid'=>'0',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s',$newtime),
                ]);
                DB::table('mainmenujp')->insert([
                'id' =>'19',
                'table'=>'サーバ設定値',
                'url'=>'/server_config',
                'mainpage'=>'0',
                'icon1'=>'fas fa-server',
                'icon2'=>'server',
                'icon3'=>'',
                'subid'=>'5',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s',$newtime),
                ]);
                DB::table('mainmenujp')->insert([
                'id' =>'20',
                'table'=>'ゲーム総テーブル',
                'url'=>'/game_detail',
                'mainpage'=>'0',
                'icon1'=>'fas fa-server',
                'icon2'=>'server',
                'icon3'=>'',
                'subid'=>'5',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s',$newtime),
                ]);
                DB::table('mainmenujp')->insert([
                'id' =>'21',
                'table'=>'サプライヤー管理',
                'url'=>'/provider',
                'mainpage'=>'0',
                'icon1'=>'fas fa-server',
                'icon2'=>'server',
                'icon3'=>'',
                'subid'=>'1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s',$newtime),
                ]);
                }
                
}