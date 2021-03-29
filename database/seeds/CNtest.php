<?php

use Illuminate\Database\Seeder;

class CNtest extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $newtime=time()+(random_int(1,24)*random_int(1,60)*random_int(1,60)*random_int(1,7)); //小时,分,秒,天
        DB::table('mainmenucn')->insert([
            'id' => '1',
            'table' => '账户管理',
            'url' => '',
            'mainpage' => '1',
            'icon1' => 'fas fa-user',
            'icon2' => '',
            'icon3' => 'el-icon-s-custom',
            'subid' => '0',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s', $newtime),
        ]);
        DB::table('mainmenucn')->insert([
            'id' => '2',
            'table' => '设定管理',
            'url' => '',
            'mainpage' => '2',
            'icon1' => 'fas fa-cog',
            'icon2' => '',
            'icon3' => 'el-icon-setting',
            'subid' => '0',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s', $newtime),
        ]);
        DB::table('mainmenucn')->insert([
            'id' => '3',
            'table' => '报表管理',
            'url' => '',
            'mainpage' => '3',
            'icon1' => 'fas fa-file-csv',
            'icon2' => '',
            'icon3' => 'el-icon-s-marketing',
            'subid' => '0',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s', $newtime),
        ]);
        DB::table('mainmenucn')->insert([
            'id' => '4',
            'table' => '操作纪录',
            'url' => '',
            'mainpage' => '4',
            'icon1' => 'fas fa-clipboard-check',
            'icon2' => '',
            'icon3' => 'el-icon-files',
            'subid' => '0',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s', $newtime),
        ]);
        // DB::table('mainmenucn')->insert([
        //     'id' =>'5',
        //     'table'=>'代理商管理',
        //     'url'=>'/agent',
        //     'mainpage'=>'0',
        //     'icon1'=>'fas fa-user-friends',
        //     'icon2'=>'user-shield',
        //     'icon3'=>'',
        //     'subid'=>'1',
        //     'created_at' => date('Y-m-d H:i:s'),
        //     'updated_at' => date('Y-m-d H:i:s',$newtime),
        // ]);
            DB::table('mainmenucn')->insert([
            // 'id' =>'6',
            'table'=>'会员管理',
            'url'=>'/member',
            'mainpage'=>'0',
            'icon1'=>'fas fa-users-cog',
            'icon2'=>'users',
            'icon3'=>'',
            'subid'=>'1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('mainmenucn')->insert([
            // 'id' =>'7',
            'table'=>'账户设定',
            'url'=>'/account',
            'mainpage'=>'0',
            'icon1'=>'fas fa-user-circle',
            'icon2'=>'user-cog',
            'icon3'=>'',
            'subid'=>'2',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('mainmenucn')->insert([
            'id' =>'8',
            'table'=>'角色设定',
            'url'=>'/role',
            'mainpage'=>'0',
            'icon1'=>'fas fa-user-tag',
            'icon2'=>'user-edit',
            'icon3'=>'',
            'subid'=>'2',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        // DB::table('mainmenucn')->insert([
        //     'id' =>'9',
        //     'table'=>'权限设定',
        //     'url'=>'/access',
        //     'mainpage'=>'0',
        //     'icon1'=>'fas fa-user-shield',
        //     'icon2'=>'id-card',
        //     'icon3'=>'',
        //     'subid'=>'2',
        //     'created_at' => date('Y-m-d H:i:s'),
        //     'updated_at' => date('Y-m-d H:i:s',$newtime),
        // ]);
        DB::table('mainmenucn')->insert([
            // 'id' =>'10',
            'table'=>'胜负报表',
            'url'=>'/win_lose',
            'mainpage'=>'0',
            'icon1'=>'fas fa-trophy',
            'icon2'=>'trophy',
            'icon3'=>'',
            'subid'=>'3',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('mainmenucn')->insert([
            // 'id' =>'11',
            'table'=>'下注纪录',
            'url'=>'/history',
            'mainpage'=>'0',
            'icon1'=>'fas fa-funnel-dollar',
            'icon2'=>'money-bill-alt',
            'icon3'=>'',
            'subid'=>'3',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        // DB::table('mainmenucn')->insert([
        //     'id' =>'12',
        //     'table'=>'总报表',
        //     'url'=>'/report',
        //     'mainpage'=>'0',
        //     'icon1'=>'fas fa-book-open',
        //     'icon2'=>'table',
        //     'icon3'=>'',
        //     'subid'=>'3',
        //     'created_at' => date('Y-m-d H:i:s'),
        //     'updated_at' => date('Y-m-d H:i:s',$newtime),
        // ]);
        // DB::table('mainmenucn')->insert([
        //     'id' =>'13',
        //     'table'=>'钱包',
        //     'url'=>'/wallet',
        //     'mainpage'=>'0',
        //     'icon1'=>'fas fa-wallet',
        //     'icon2'=>'wallet',
        //     'icon3'=>'',
        //     'subid'=>'3',
        //     'created_at' => date('Y-m-d H:i:s'),
        //     'updated_at' => date('Y-m-d H:i:s',$newtime),
        // ]);
        DB::table('mainmenucn')->insert([
            // 'id' =>'14',
            'table'=>'用户登入纪录',
            'url'=>'/login_log',
            'mainpage'=>'0',
            'icon1'=>'fas fa-sign-in-alt',
            'icon2'=>'file-import',
            'icon3'=>'',
            'subid'=>'4',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('mainmenucn')->insert([
            // 'id' =>'15',
            'table'=>'历程纪录',
            'url'=>'/course_log',
            'mainpage'=>'0',
            'icon1'=>'fas fa-history',
            'icon2'=>'file-medical-alt',
            'icon3'=>'',
            'subid'=>'4',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('mainmenucn')->insert([
            // 'id' =>'16',
            'table'=>'游戏管理',
            'url'=>'',
            'mainpage'=>'5',
            'icon1'=>'fas fa-cogs',
            'icon2'=>'',
            'icon3'=>'el-icon-s-check',
            'subid'=>'0',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        // DB::table('mainmenucn')->insert([
        //     'id' =>'17',
        //     'table'=>'游戏清单',
        //     'url'=>'/game_list',
        //     'mainpage'=>'0',
        //     'icon1'=>'fas fa-list-ul',
        //     'icon2'=>'gamepad',
        //     'icon3'=>'',
        //     'subid'=>'5',
        //     'created_at' => date('Y-m-d H:i:s'),
        //     'updated_at' => date('Y-m-d H:i:s',$newtime),
        // ]);
        // DB::table('mainmenucn')->insert([
        //     'id' =>'18',
        //     'table'=>'游戏信息',
        //     'url'=>'/game_info',
        //     'mainpage'=>'0',
        //     'icon1'=>'fas fa-info-circle',
        //     'icon2'=>'scroll',
        //     'icon3'=>'',
        //     'subid'=>'5',
        //     'created_at' => date('Y-m-d H:i:s'),
        //     'updated_at' => date('Y-m-d H:i:s',$newtime),
        // ]);
        DB::table('mainmenucn')->insert([
            // 'id' =>'19',
            'table'=>'服务器设定值',
            'url'=>'/server_config',
            'mainpage'=>'0',
            'icon1'=>'fas fa-server',
            'icon2'=>'server',
            'icon3'=>'',
            'subid'=>'5',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('mainmenucn')->insert([
            // 'id' =>'20',
            'table'=>'游戏总表',
            'url'=>'/game_detail',
            'mainpage'=>'0',
            'icon1'=>'fas fa-server',
            'icon2'=>'server',
            'icon3'=>'',
            'subid'=>'5',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('mainmenucn')->insert([
            // 'id' =>'21',
            'table'=>'供货商管理',
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

