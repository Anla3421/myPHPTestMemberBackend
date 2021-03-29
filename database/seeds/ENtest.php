<?php

use Illuminate\Database\Seeder;

class ENtest extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    $newtime=time()+(random_int(1,24)*random_int(1,60)*random_int(1,60)*random_int(1,7)); //小時,分,秒,天
        DB::table('mainmenuen')->insert([
        'id' => '1',
        'table' =>'Account Management',
        'url' =>'',
        'mainpage' => '1',
        'icon1' =>'fas fa-user',
        'icon2' =>'',
        'icon3' =>'el-icon-s-custom',
        'subid' => '0',
        'created_at' => date ('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s', $newtime),
        ]);
        DB::table('mainmenuen')->insert([
        'id' => '2',
        'table' =>'Settings management',
        'url' =>'',
        'mainpage' => '2',
        'icon1' =>'fas fa-cog',
        'icon2' =>'',
        'icon3' =>'el-icon-setting',
        'subid' => '0',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s', $newtime),
        ]);
        DB::table('mainmenuen')->insert([
        'id' => '3',
        'table' =>'Report management',
        'url' =>'',
        'mainpage' => '3',
        'icon1' =>'fas fa-file-csv',
        'icon2' =>'',
        'icon3' =>'el-icon-s-marketing',
        'subid' => '0',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s', $newtime),
        ]);
        DB::table('mainmenuen')->insert([
        'id' => '4',
        'table' =>'Operation record',
        'url' =>'',
        'mainpage' => '4',
        'icon1' =>'fas fa-clipboard-check',
        'icon2' =>'',
        'icon3' =>'el-icon-files',
        'subid' => '0',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s', $newtime),
        ]);
        DB::table('mainmenuen')->insert([
        // 'id' =>'6',
        'table'=>'member management',
        'url'=>'/member',
        'mainpage'=>'0',
        'icon1'=>'fas fa-users-cog',
        'icon2'=>'users',
        'icon3'=>'',
        'subid'=>'1',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('mainmenuen')->insert([
        //'id' =>'7',
        'table'=>'account settings',
        'url'=>'/account',
        'mainpage'=> '0',
        'icon1'=>'fas fa-user-circle',
        'icon2'=>'user-cog',
        'icon3'=>'',
        'subid'=>'2',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('mainmenuen')->insert([
        'id' =>'8',
        'table'=>'role setting',
        'url'=>'/role',
        'mainpage'=>'0',
        'icon1'=>'fas fa-user-tag',
        'icon2'=>'user-edit',
        'icon3'=>'',
        'subid'=>'2',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('mainmenuen')->insert([
        //'id' =>'10',
        'table'=>'Winning and losing report',
        'url'=>'/win_lose',
        'mainpage'=> '0',
        'icon1'=>'fas fa-trophy',
        'icon2'=>'trophy',
        'icon3'=>'',
        'subid'=>'3',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('mainmenuen')->insert([
        //'id '=>'11',
        'table'=>'betting record',
        'url'=>'/history',
        'mainpage'=>'0',
        'icon1'=>'fas fa-funnel-dollar',
        'icon2'=>'money-bill-alt',
        'icon3'=>'',
        'subid'=>'3',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('mainmenuen')->insert([
        //'id' =>'14',
        'table'=>'User login record',
        'url'=>'/login_log',
        'mainpage' =>'0',
        'icon1'=>'fas fa-sign-in-alt',
        'icon2'=>'file-import',
        'icon3'=>'',
        'subid'=>'4',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('mainmenuen')->insert([
        //'id' =>'15',
        'table'=>'History record',
        'url'=>'/course_log',
        'mainpage'=>'0',
        'icon1'=>'fas fa-history',
        'icon2'=>'file-medical-alt',
        'icon3'=>'',
        'subid'=>'4',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('mainmenuen')->insert([
        //'id' =>'16',
        'table'=>'Game Management',
        'url'=>'',
        'mainpage'=>'5',
        'icon1'=>'fas fa-cogs',
        'icon2'=>'',
        'icon3'=>'el-icon-s-check',
        'subid'=>'0',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('mainmenuen')-> insert([
        //'id' =>'19',
        'table'=>'server settings',
        'url'=>'/server_config',
        'mainpage'=>'0',
        'icon1'=>'fas fa-server',
        'icon2'=>'server',
        'icon3'=>'',
        'subid'=>'5',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('mainmenuen')->insert([
        //'id' =>'20',
        'table'=>'Game summary table',
        'url'=>'/game_detail',
        'mainpage'=>'0',
        'icon1'=>'fas fa-server',
        'icon2'=>'server',
        'icon3'=>'',
        'subid'=>'5',
        ]);
        DB::table('mainmenuen')->insert([
        //'id' =>'21',
        'table'=>'supplier management',
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