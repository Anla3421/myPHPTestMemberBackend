<?php

use Illuminate\Database\Seeder;

class MaxdisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $newtime=time()+(random_int(1,24)*random_int(1,60)*random_int(1,60)*random_int(1,7)); //小時,分,秒,天
        DB::table('mainmenu')->insert([
            'id' =>'1',
            'table'=>'帳戶管理',
            'url'=>'',
            'mainpage'=>'1',
            'icon1'=>'fas fa-user',
            'icon2'=>'',
            'icon3'=>'',
            'subid'=>'0',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('mainmenu')->insert([
            'id' =>'2',
            'table'=>'設定管理',
            'url'=>'',
            'mainpage'=>'2',
            'icon1'=>'fas fa-cog',
            'icon2'=>'',
            'icon3'=>'',
            'subid'=>'0',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('mainmenu')->insert([
            'id' =>'3',
            'table'=>'報表管理',
            'url'=>'',
            'mainpage'=>'3',
            'icon1'=>'fas fa-file-csv',
            'icon2'=>'',
            'icon3'=>'',
            'subid'=>'0',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('mainmenu')->insert([
            'id' =>'4',
            'table'=>'操作紀錄',
            'url'=>'',
            'mainpage'=>'4',
            'icon1'=>'fas fa-clipboard-check',
            'icon2'=>'',
            'icon3'=>'',
            'subid'=>'0',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('mainmenu')->insert([
            'id' =>'5',
            'table'=>'代理商管理',
            'url'=>'/agent',
            'mainpage'=>'0',
            'icon1'=>'fas fa-user-friends',
            'icon2'=>'user-shield',
            'icon3'=>'',
            'subid'=>'1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
            DB::table('mainmenu')->insert([
            'id' =>'6',
            'table'=>'會員管理',
            'url'=>'/member',
            'mainpage'=>'0',
            'icon1'=>'fas fa-users-cog',
            'icon2'=>'users',
            'icon3'=>'',
            'subid'=>'1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('mainmenu')->insert([
            'id' =>'7',
            'table'=>'帳戶設定',
            'url'=>'/account',
            'mainpage'=>'0',
            'icon1'=>'fas fa-user-circle',
            'icon2'=>'user-cog',
            'icon3'=>'',
            'subid'=>'2',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('mainmenu')->insert([
            'id' =>'8',
            'table'=>'角色設定',
            'url'=>'/role',
            'mainpage'=>'0',
            'icon1'=>'fas fa-user-tag',
            'icon2'=>'user-edit',
            'icon3'=>'',
            'subid'=>'2',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('mainmenu')->insert([
            'id' =>'9',
            'table'=>'權限設定',
            'url'=>'/access',
            'mainpage'=>'0',
            'icon1'=>'fas fa-user-shield',
            'icon2'=>'id-card',
            'icon3'=>'',
            'subid'=>'2',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('mainmenu')->insert([
            'id' =>'10',
            'table'=>'Win/Lose',
            'url'=>'/win_lose',
            'mainpage'=>'0',
            'icon1'=>'fas fa-trophy',
            'icon2'=>'trophy',
            'icon3'=>'',
            'subid'=>'3',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('mainmenu')->insert([
            'id' =>'11',
            'table'=>'Bet History',
            'url'=>'/history',
            'mainpage'=>'0',
            'icon1'=>'fas fa-funnel-dollar',
            'icon2'=>'money-bill-alt',
            'icon3'=>'',
            'subid'=>'3',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('mainmenu')->insert([
            'id' =>'12',
            'table'=>'All Report',
            'url'=>'/report',
            'mainpage'=>'0',
            'icon1'=>'fas fa-book-open',
            'icon2'=>'table',
            'icon3'=>'',
            'subid'=>'3',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('mainmenu')->insert([
            'id' =>'13',
            'table'=>'Wallet',
            'url'=>'/wallet',
            'mainpage'=>'0',
            'icon1'=>'fas fa-wallet',
            'icon2'=>'wallet',
            'icon3'=>'',
            'subid'=>'3',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('mainmenu')->insert([
            'id' =>'14',
            'table'=>'使用者登入log',
            'url'=>'/login_log',
            'mainpage'=>'0',
            'icon1'=>'fas fa-sign-in-alt',
            'icon2'=>'file-import',
            'icon3'=>'',
            'subid'=>'4',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('mainmenu')->insert([
            'id' =>'15',
            'table'=>'歷程log',
            'url'=>'/course_log',
            'mainpage'=>'0',
            'icon1'=>'fas fa-history',
            'icon2'=>'file-medical-alt',
            'icon3'=>'',
            'subid'=>'4',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('mainmenu')->insert([
            'id' =>'16',
            'table'=>'遊戲管理',
            'url'=>'',
            'mainpage'=>'5',
            'icon1'=>'',
            'icon2'=>'',
            'icon3'=>'',
            'subid'=>'0',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('mainmenu')->insert([
            'id' =>'17',
            'table'=>'遊戲清單',
            'url'=>'',
            'mainpage'=>'0',
            'icon1'=>'',
            'icon2'=>'',
            'icon3'=>'',
            'subid'=>'5',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('mainmenu')->insert([
            'id' =>'18',
            'table'=>'遊戲資訊',
            'url'=>'',
            'mainpage'=>'0',
            'icon1'=>'',
            'icon2'=>'',
            'icon3'=>'',
            'subid'=>'5',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('mainmenu')->insert([
            'id' =>'19',
            'table'=>'伺服器設定值',
            'url'=>'',
            'mainpage'=>'0',
            'icon1'=>'',
            'icon2'=>'',
            'icon3'=>'',
            'subid'=>'5',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        
    }
}
