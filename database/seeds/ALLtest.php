<?php

use Illuminate\Database\Seeder;

class ALLtest extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $newtime=time()+(random_int(1,24)*random_int(1,60)*random_int(1,60)*random_int(1,7)); //小時,分,秒,天
        DB::table('mainmenuall')->insert([
			'table' => '帳戶管理',
			'url' => '',
			'mainpage' => '101',
			'icon1' => 'fas fa-user',
			'icon2' => '',
			'icon3' => 'el-icon-s-custom',
			'subid' => '0',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s', $newtime),
		]);
		DB::table('mainmenuall')->insert([
			'table' => '設定管理',
			'url' => '',
			'mainpage' => '102',
			'icon1' => 'fas fa-cog',
			'icon2' => '',
			'icon3' => 'el-icon-setting',
			'subid' => '0',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s', $newtime),
		]);
		DB::table('mainmenuall')->insert([
			'table' => '報表管理',
			'url' => '',
			'mainpage' => '103',
			'icon1' => 'fas fa-file-csv',
			'icon2' => '',
			'icon3' => 'el-icon-s-marketing',
			'subid' => '0',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s', $newtime),
		]);
		DB::table('mainmenuall')->insert([
			'table' => '操作紀錄',
			'url' => '',
			'mainpage' => '104',
			'icon1' => 'fas fa-clipboard-check',
			'icon2' => '',
			'icon3' => 'el-icon-files',
			'subid' => '0',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s', $newtime),
		]);
            DB::table('mainmenuall')->insert([
            'table'=>'會員管理',
            'url'=>'/member',
            'mainpage'=>'0',
            'icon1'=>'fas fa-users-cog',
            'icon2'=>'users',
            'icon3'=>'',
            'subid'=>'101',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('mainmenuall')->insert([
            'table'=>'帳戶設定',
            'url'=>'/account',
            'mainpage'=>'0',
            'icon1'=>'fas fa-user-circle',
            'icon2'=>'user-cog',
            'icon3'=>'',
            'subid'=>'102',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('mainmenuall')->insert([
            'table'=>'角色設定',
            'url'=>'/role',
            'mainpage'=>'0',
            'icon1'=>'fas fa-user-tag',
            'icon2'=>'user-edit',
            'icon3'=>'',
            'subid'=>'102',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('mainmenuall')->insert([
            'table'=>'勝負報表',
            'url'=>'/win_lose',
            'mainpage'=>'0',
            'icon1'=>'fas fa-trophy',
            'icon2'=>'trophy',
            'icon3'=>'',
            'subid'=>'103',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('mainmenuall')->insert([
            'table'=>'下注紀錄',
            'url'=>'/history',
            'mainpage'=>'0',
            'icon1'=>'fas fa-funnel-dollar',
            'icon2'=>'money-bill-alt',
            'icon3'=>'',
            'subid'=>'103',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('mainmenuall')->insert([
            'table'=>'使用者登入紀錄',
            'url'=>'/login_log',
            'mainpage'=>'0',
            'icon1'=>'fas fa-sign-in-alt',
            'icon2'=>'file-import',
            'icon3'=>'',
            'subid'=>'104',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('mainmenuall')->insert([
            'table'=>'歷程紀錄',
            'url'=>'/course_log',
            'mainpage'=>'0',
            'icon1'=>'fas fa-history',
            'icon2'=>'file-medical-alt',
            'icon3'=>'',
            'subid'=>'104',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('mainmenuall')->insert([
            'table'=>'遊戲管理',
            'url'=>'',
            'mainpage'=>'5',
            'icon1'=>'fas fa-cogs',
            'icon2'=>'',
            'icon3'=>'el-icon-s-check',
            'subid'=>'0',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('mainmenuall')->insert([
            'table'=>'伺服器設定值',
            'url'=>'/server_config',
            'mainpage'=>'0',
            'icon1'=>'fas fa-server',
            'icon2'=>'server',
            'icon3'=>'',
            'subid'=>'105',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('mainmenuall')->insert([
            'table'=>'遊戲總表',
            'url'=>'/game_detail',
            'mainpage'=>'0',
            'icon1'=>'fas fa-server',
            'icon2'=>'server',
            'icon3'=>'',
            'subid'=>'105',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('mainmenuall')->insert([
            'table'=>'供應商管理',
            'url'=>'/provider',
            'mainpage'=>'0',
            'icon1'=>'fas fa-server',
            'icon2'=>'server',
            'icon3'=>'',
            'subid'=>'101',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('mainmenuall')->insert([
            'table' => '账户管理',
            'url' => '',
            'mainpage' => '111',
            'icon1' => 'fas fa-user',
            'icon2' => '',
            'icon3' => 'el-icon-s-custom',
            'subid' => '0',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s', $newtime),
        ]);
        DB::table('mainmenuall')->insert([
            'table' => '设定管理',
            'url' => '',
            'mainpage' => '112',
            'icon1' => 'fas fa-cog',
            'icon2' => '',
            'icon3' => 'el-icon-setting',
            'subid' => '0',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s', $newtime),
        ]);
        DB::table('mainmenuall')->insert([
            'table' => '报表管理',
            'url' => '',
            'mainpage' => '113',
            'icon1' => 'fas fa-file-csv',
            'icon2' => '',
            'icon3' => 'el-icon-s-marketing',
            'subid' => '0',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s', $newtime),
        ]);
        DB::table('mainmenuall')->insert([
            'table' => '操作纪录',
            'url' => '',
            'mainpage' => '114',
            'icon1' => 'fas fa-clipboard-check',
            'icon2' => '',
            'icon3' => 'el-icon-files',
            'subid' => '0',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s', $newtime),
        ]);
        // DB::table('mainmenuall')->insert([
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
            DB::table('mainmenuall')->insert([
            'table'=>'会员管理',
            'url'=>'/member',
            'mainpage'=>'0',
            'icon1'=>'fas fa-users-cog',
            'icon2'=>'users',
            'icon3'=>'',
            'subid'=>'111',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('mainmenuall')->insert([
            'table'=>'账户设定',
            'url'=>'/account',
            'mainpage'=>'0',
            'icon1'=>'fas fa-user-circle',
            'icon2'=>'user-cog',
            'icon3'=>'',
            'subid'=>'112',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('mainmenuall')->insert([
            'table'=>'角色设定',
            'url'=>'/role',
            'mainpage'=>'0',
            'icon1'=>'fas fa-user-tag',
            'icon2'=>'user-edit',
            'icon3'=>'',
            'subid'=>'112',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        // DB::table('mainmenuall')->insert([
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
        DB::table('mainmenuall')->insert([
            'table'=>'胜负报表',
            'url'=>'/win_lose',
            'mainpage'=>'0',
            'icon1'=>'fas fa-trophy',
            'icon2'=>'trophy',
            'icon3'=>'',
            'subid'=>'113',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('mainmenuall')->insert([
            'table'=>'下注纪录',
            'url'=>'/history',
            'mainpage'=>'0',
            'icon1'=>'fas fa-funnel-dollar',
            'icon2'=>'money-bill-alt',
            'icon3'=>'',
            'subid'=>'113',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        // DB::table('mainmenuall')->insert([
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
        // DB::table('mainmenuall')->insert([
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
        DB::table('mainmenuall')->insert([
            'table'=>'用户登入纪录',
            'url'=>'/login_log',
            'mainpage'=>'0',
            'icon1'=>'fas fa-sign-in-alt',
            'icon2'=>'file-import',
            'icon3'=>'',
            'subid'=>'114',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('mainmenuall')->insert([
            'table'=>'历程纪录',
            'url'=>'/course_log',
            'mainpage'=>'0',
            'icon1'=>'fas fa-history',
            'icon2'=>'file-medical-alt',
            'icon3'=>'',
            'subid'=>'114',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('mainmenuall')->insert([
            'table'=>'游戏管理',
            'url'=>'',
            'mainpage'=>'115',
            'icon1'=>'fas fa-cogs',
            'icon2'=>'',
            'icon3'=>'el-icon-s-check',
            'subid'=>'0',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        // DB::table('mainmenuall')->insert([
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
        // DB::table('mainmenuall')->insert([
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
        DB::table('mainmenuall')->insert([
            'table'=>'服务器设定值',
            'url'=>'/server_config',
            'mainpage'=>'0',
            'icon1'=>'fas fa-server',
            'icon2'=>'server',
            'icon3'=>'',
            'subid'=>'115',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('mainmenuall')->insert([
            'table'=>'游戏总表',
            'url'=>'/game_detail',
            'mainpage'=>'0',
            'icon1'=>'fas fa-server',
            'icon2'=>'server',
            'icon3'=>'',
            'subid'=>'115',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('mainmenuall')->insert([
            'table'=>'供货商管理',
            'url'=>'/provider',
            'mainpage'=>'0',
            'icon1'=>'fas fa-server',
            'icon2'=>'server',
            'icon3'=>'',
            'subid'=>'111',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('mainmenuall')->insert([
            'table' =>'Account Management',
            'url' =>'',
            'mainpage' => '121',
            'icon1' =>'fas fa-user',
            'icon2' =>'',
            'icon3' =>'el-icon-s-custom',
            'subid' => '0',
            'created_at' => date ('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s', $newtime),
        ]);
        DB::table('mainmenuall')->insert([
            'table' =>'Settings management',
            'url' =>'',
            'mainpage' => '122',
            'icon1' =>'fas fa-cog',
            'icon2' =>'',
            'icon3' =>'el-icon-setting',
            'subid' => '0',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s', $newtime),
        ]);
        DB::table('mainmenuall')->insert([
        'table' =>'Report management',
        'url' =>'',
        'mainpage' => '123',
        'icon1' =>'fas fa-file-csv',
        'icon2' =>'',
        'icon3' =>'el-icon-s-marketing',
        'subid' => '0',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s', $newtime),
        ]);
        DB::table('mainmenuall')->insert([
        'table' =>'Operation record',
        'url' =>'',
        'mainpage' => '124',
        'icon1' =>'fas fa-clipboard-check',
        'icon2' =>'',
        'icon3' =>'el-icon-files',
        'subid' => '0',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s', $newtime),
        ]);
        DB::table('mainmenuall')->insert([
        'table'=>'member management',
        'url'=>'/member',
        'mainpage'=>'0',
        'icon1'=>'fas fa-users-cog',
        'icon2'=>'users',
        'icon3'=>'',
        'subid'=>'121',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('mainmenuall')->insert([
        'table'=>'account settings',
        'url'=>'/account',
        'mainpage'=> '0',
        'icon1'=>'fas fa-user-circle',
        'icon2'=>'user-cog',
        'icon3'=>'',
        'subid'=>'122',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('mainmenuall')->insert([
        'table'=>'role setting',
        'url'=>'/role',
        'mainpage'=>'0',
        'icon1'=>'fas fa-user-tag',
        'icon2'=>'user-edit',
        'icon3'=>'',
        'subid'=>'122',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('mainmenuall')->insert([
        'table'=>'Winning and losing report',
        'url'=>'/win_lose',
        'mainpage'=> '0',
        'icon1'=>'fas fa-trophy',
        'icon2'=>'trophy',
        'icon3'=>'',
        'subid'=>'123',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('mainmenuall')->insert([
        //'id '=>'11',
        'table'=>'betting record',
        'url'=>'/history',
        'mainpage'=>'0',
        'icon1'=>'fas fa-funnel-dollar',
        'icon2'=>'money-bill-alt',
        'icon3'=>'',
        'subid'=>'123',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('mainmenuall')->insert([
        'table'=>'User login record',
        'url'=>'/login_log',
        'mainpage' =>'0',
        'icon1'=>'fas fa-sign-in-alt',
        'icon2'=>'file-import',
        'icon3'=>'',
        'subid'=>'124',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('mainmenuall')->insert([
        'table'=>'History record',
        'url'=>'/course_log',
        'mainpage'=>'0',
        'icon1'=>'fas fa-history',
        'icon2'=>'file-medical-alt',
        'icon3'=>'',
        'subid'=>'124',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('mainmenuall')->insert([
        'table'=>'Game Management',
        'url'=>'',
        'mainpage'=>'125',
        'icon1'=>'fas fa-cogs',
        'icon2'=>'',
        'icon3'=>'el-icon-s-check',
        'subid'=>'0',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('mainmenuall')-> insert([
        'table'=>'server settings',
        'url'=>'/server_config',
        'mainpage'=>'0',
        'icon1'=>'fas fa-server',
        'icon2'=>'server',
        'icon3'=>'',
        'subid'=>'125',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('mainmenuall')->insert([
        'table'=>'Game summary table',
        'url'=>'/game_detail',
        'mainpage'=>'0',
        'icon1'=>'fas fa-server',
        'icon2'=>'server',
        'icon3'=>'',
        'subid'=>'125',
        ]);
        DB::table('mainmenuall')->insert([
        'table'=>'supplier management',
        'url'=>'/provider',
        'mainpage'=>'0',
        'icon1'=>'fas fa-server',
        'icon2'=>'server',
        'icon3'=>'',
        'subid'=>'121',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('mainmenuall')->insert([
            'table' => 'アカウント管理',
            'url' => '',
            'mainpage' => '131',
            'icon1' => 'fas fa-user',
            'icon2' => '',
            'icon3' => 'el-icon-s-custom',
            'subid' => '0',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s', $newtime),
            ]);
        DB::table('mainmenuall')->insert([
        'table' => '設定管理',
        'url' => '',
        'mainpage' => '132',
        'icon1' => 'fas fa-cog',
        'icon2' => '',
        'icon3' => 'el-icon-setting',
        'subid' => '0',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s', $newtime),
        ]);
        DB::table('mainmenuall')->insert([
        'table' => 'レポート管理',
        'url' => '',
        'mainpage' => '133',
        'icon1' => 'fas fa-file-csv',
        'icon2' => '',
        'icon3' => 'el-icon-s-marketing',
        'subid' => '0',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s', $newtime),
        ]);
        DB::table('mainmenuall')->insert([
        'table' => '操作レコード',
        'url' => '',
        'mainpage' => '134',
        'icon1' => 'fas fa-clipboard-check',
        'icon2' => '',
        'icon3' => 'el-icon-files',
        'subid' => '0',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s', $newtime),
        ]);
        DB::table('mainmenuall')->insert([
        'table'=>'会員管理',
        'url'=>'/member',
        'mainpage'=>'0',
        'icon1'=>'fas fa-users-cog',
        'icon2'=>'users',
        'icon3'=>'',
        'subid'=>'131',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('mainmenuall')->insert([
        'table'=>'アカウント設定',
        'url'=>'/account',
        'mainpage'=>'0',
        'icon1'=>'fas fa-user-circle',
        'icon2'=>'user-cog',
        'icon3'=>'',
        'subid'=>'132',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('mainmenuall')->insert([
        'table'=>'キャラクタ設定',
        'url'=>'/role',
        'mainpage'=>'0',
        'icon1'=>'fas fa-user-tag',
        'icon2'=>'user-edit',
        'icon3'=>'',
        'subid'=>'132',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('mainmenuall')->insert([
        'table'=>'勝敗レポート',
        'url'=>'/win_lose',
        'mainpage'=>'0',
        'icon1'=>'fas fa-trophy',
        'icon2'=>'trophy',
        'icon3'=>'',
        'subid'=>'133',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('mainmenuall')->insert([
        'table'=>'ベットレコード',
        'url'=>'/history',
        'mainpage'=>'0',
        'icon1'=>'fas fa-funnel-dollar',
        'icon2'=>'money-bill-alt',
        'icon3'=>'',
        'subid'=>'133',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('mainmenuall')->insert([
        'table'=>'ユーザ登録レコード',
        'url'=>'/login_log',
        'mainpage'=>'0',
        'icon1'=>'fas fa-sign-in-alt',
        'icon2'=>'file-import',
        'icon3'=>'',
        'subid'=>'134',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('mainmenuall')->insert([
        'table'=>'旅記録',
        'url'=>'/course_log',
        'mainpage'=>'0',
        'icon1'=>'fas fa-history',
        'icon2'=>'file-medical-alt',
        'icon3'=>'',
        'subid'=>'134',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('mainmenuall')->insert([
        'table'=>'ゲーム管理',
        'url'=>'',
        'mainpage'=>'135',
        'icon1'=>'fas fa-cogs',
        'icon2'=>'',
        'icon3'=>'el-icon-s-check',
        'subid'=>'0',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('mainmenuall')->insert([
        'table'=>'サーバ設定値',
        'url'=>'/server_config',
        'mainpage'=>'0',
        'icon1'=>'fas fa-server',
        'icon2'=>'server',
        'icon3'=>'',
        'subid'=>'135',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('mainmenuall')->insert([
        'table'=>'ゲーム総テーブル',
        'url'=>'/game_detail',
        'mainpage'=>'0',
        'icon1'=>'fas fa-server',
        'icon2'=>'server',
        'icon3'=>'',
        'subid'=>'135',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('mainmenuall')->insert([
        'table'=>'サプライヤー管理',
        'url'=>'/provider',
        'mainpage'=>'0',
        'icon1'=>'fas fa-server',
        'icon2'=>'server',
        'icon3'=>'',
        'subid'=>'131',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
    }

}