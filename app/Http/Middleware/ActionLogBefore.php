<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\log;
use Str;
use DB;

class ActionLogBefore
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    private function insert($request){
        DB::table('action_log')->insert([
            'user' => $request->id,
            // 'url' => $request->path(),
            'url' => Str::after(Str::before('api/member/c','/c'),'/'),
            'origin_data' => NULL,
            'alter_data' => json_encode($request->all()),
            'action' => 'Create',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
        ]);
    }

    public function handle($request, Closure $next)
    {
        // print_r('我是前中介層'.'|');

        // Log::channel('actionlog')->info('request',['path'=> $request->path()]);
        // Log::channel('actionlog')->info('request',['item'=> $request->all()]);

        // var_dump(Str::after('api/member/c','/')); //第一個"/" member/c
        // var_dump(Str::after('api/member/u','/')); //member/u
        // var_dump(Str::after('api/member','/')); //member
        // var_dump(Str::after(Str::before('api/member/c','/c'),'/')); //去尾去頭
        // var_dump(str::before('api/member/c','/')); //api
        // var_dump(str::after(str::after('api/member/c','/'),'/')); //去頭去頭
        // var_dump(str::after(str::after('api/member','/'),'/')); //去頭去頭
        // var_dump(str::afterlast('api/member/c','/')); //c
        // var_dump(str::afterlast('api/member','/')); //member
        // print_r(str::after(str::after('api/member/c','/'),'/'));

        // 
        $url = Str::afterlast($request->path(),'/');
        if($url == 'c' or $url == 'u'){
            //update & create
            if($url == 'c'){
                switch (Str::after(Str::before($request->path(),'/c'),'/')) {
                    case 'playersave':
                        $this->insert($request);
                        break;

                    case 'game':
                        $this->insert($request);
                        break;

                    case 'gameinfo':
                        $this->insert($request);
                        break;
            
                    case 'provider':
                        $this->insert($request);
                        break;
            
                    case 'report':
                        $this->insert($request);
                        break;
            
                    case 'player':
                        $this->insert($request);
                        break;
            
                    case 'gamenew':
                        $this->insert($request);
                        break;
                        
                    case 'agent':
                        $this->insert($request);
                        break;
                    
                    default:
                        // DB::table('action_log')->insert([
                        //     'user' => $request->id,
                        //     'url' => $request->path(),
                        //     'origin_data' => NULL,
                        //     'alter_data' => json_encode($request->all()),
                        //     'action' => 'Read',
                        // ]);
                        break;
                }

            }else{
                switch (Str::after(Str::before($request->path(),'/u'),'/')) {
                    case 'playersave':
                        DB::table('action_log')->insert([
                            'user' => $request->id,
                            // 'url' => $request->path(),
                            'url' => Str::after(Str::before('api/member/c','/c'),'/'),
                            'origin_data' => json_encode(DB::table('player_save')->where('gid',$request->update_id)->first()),
                            'alter_data' => json_encode($request->all()),
                            'action' => 'Update',
                            'created_at'=>date('Y-m-d H:i:s'),
                            'updated_at'=>date('Y-m-d H:i:s'),
                        ]);
                        break;
          
                    case 'gameinfo':
                        DB::table('action_log')->insert([
                            'user' => $request->id,
                            // 'url' => $request->path(),
                            'url' => Str::after(Str::before('api/member/c','/c'),'/'),
                            'origin_data' => json_encode(DB::table('game_info')->where('info_id',$request->info_id)->first()),
                            'alter_data' => json_encode($request->all()),
                            'action' => 'Update',
                            'created_at'=>date('Y-m-d H:i:s'),
                            'updated_at'=>date('Y-m-d H:i:s'),
                        ]);
                        break;
                    
                    case 'game':
                        DB::table('action_log')->insert([
                            'user' => $request->id,
                            // 'url' => $request->path(),
                            'url' => Str::after(Str::before('api/member/c','/c'),'/'),
                            'origin_data' => json_encode(DB::table('game')->where('id',$request->update_id)->first()),
                            'alter_data' => json_encode($request->all()),
                            'action' => 'Update',
                            'created_at'=>date('Y-m-d H:i:s'),
                            'updated_at'=>date('Y-m-d H:i:s'),
                        ]);
                        break;

                    case 'provider':
                        DB::table('action_log')->insert([
                            'user' => $request->id,
                            // 'url' => $request->path(),
                            'url' => Str::after(Str::before('api/member/c','/c'),'/'),
                            'origin_data' => json_encode(DB::table('provider')->where('id',$request->update_id)->first()),
                            'alter_data' => json_encode($request->all()),
                            'action' => 'Update',
                            'created_at'=>date('Y-m-d H:i:s'),
                            'updated_at'=>date('Y-m-d H:i:s'),
                        ]);
                        break;
            
                    case 'player':
                        DB::table('action_log')->insert([
                            'user' => $request->id,
                            // 'url' => $request->path(),
                            'url' => Str::after(Str::before('api/member/c','/c'),'/'),
                            'origin_data' => json_encode(DB::table('player')->where('id',$request->update_id)->first()),
                            'alter_data' => json_encode($request->all()),
                            'action' => 'Update',
                            'created_at'=>date('Y-m-d H:i:s'),
                            'updated_at'=>date('Y-m-d H:i:s'),
                        ]);
                        break;
            
                    case 'gamenew':
                        DB::table('action_log')->insert([
                            'user' => $request->id,
                            // 'url' => $request->path(),
                            'url' => Str::after(Str::before('api/member/c','/c'),'/'),
                            'origin_data' => json_encode(DB::table('game')->where('id',$request->update_id)->first()).json_encode(DB::table('game')->where('info_id',$request->info_id)->first()),
                            'alter_data' => json_encode($request->all()),
                            'action' => 'Update',
                            'created_at'=>date('Y-m-d H:i:s'),
                            'updated_at'=>date('Y-m-d H:i:s'),
                        ]);
                        break;

                    case 'agent':
                        DB::table('action_log')->insert([
                            'user' => $request->id,
                            // 'url' => $request->path(),
                            'url' => Str::after(Str::before('api/member/c','/c'),'/'),
                            'origin_data' => json_encode(DB::table('agent')->where('id',$request->update_id)->first()),
                            'alter_data' => json_encode($request->all()),
                            'action' => 'Update',
                            'created_at'=>date('Y-m-d H:i:s'),
                            'updated_at'=>date('Y-m-d H:i:s'),
                        ]);
                        break;
            
                    default:
                    print_r('default');
                        // DB::table('action_log')->insert([
                        //     'user' => $request->id,
                        //     'url' => $request->path(),
                        //     'origin_data' => NULL,
                        //     'after' => json_encode($request->all()),
                        //     'action' => 'Read',
                        // ]);
                        break;
                }
            }

        }else{
            if(Str::contains($request->path(),'log') or $url == 'apitokencheck' or $url == 'sidebar'){
                // print_r('idle'.'|');
            }else{
                // read
                DB::table('action_log')->insert([
                    'user' => $request->id,
                    // 'url' => $request->path(),
                    'url' => Str::afterlast($request->path(),'/'),
                    'origin_data' => NULL,
                    'alter_data' => json_encode($request->all()),
                    'action' => 'Read',
                    'created_at'=>date('Y-m-d H:i:s'),
                    'updated_at'=>date('Y-m-d H:i:s'),
                ]);
            }

        }

        return $next($request);
    }
}
