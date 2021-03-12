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
    public function handle($request, Closure $next)
    {
        // Log::channel('actionlog')->info('request',['path'=> $request->path()]);
        // Log::channel('actionlog')->info('request',['item'=> $request->all()]);
        // print_r($request->path());
        var_dump(Str::after(Str::before('api/member/c','/c'),'/')); //member
        Str::after(Str::before('api/member/c','/c'),'/');
        var_dump(json_decode(json_encode(Str::after(Str::before('api/member/c','/c'),'/'))));
        // $test = Str::after($request->path(),'api/');
        // if (Str::endswith($request->path(),'/c') == true or Str::endswith($request->path(),'/u' == true)){
            
            DB::table('system_log')->insert([
                'update_member_id' => $request->id,
                // 'page' => $request->path(),
                'before' => DB::table(json_decode(json_encode(Str::after(Str::before('api/member/c','/c'),'/'))))->where('id'->$request->updated_id)->first(),
                'after' => json_encode($request->all()),
                // 'action' => '',
            ]);

        // }
        
        
        // if(Str::endswith($request->path(),'er')){
        //     // Log::channel('actionlog')->info('request',['item'=> 'true']);
        //     print_r('true');
        //     print_r($request->all());
        //     print_r($request->path());
        //     print_r($request->id);
        //     switch ($request->path()) {
        //         case '*player/u':
        //             // DB::table($table)->where('id',$request->update_id)->update([
        //             //     //有ID
        //             //     'provider_id'=>$request->provider_id,
        //             //     'name'=>$request->name,
        //             //     'uniq_id'=>$request->uniq_id,
        //             //     'last_at'=>$request->last_at,
        //             // ]);
        //             $player = new player;
        //             $player -> playerupdate($request);
        //             break;
    
        //         case '*player/u':
        //             // DB::table($table)->where('gid',$request->gid)->update([
        //             //     //沒ID
        //             //     // 'gid'=>$request->gid,
        //             //     'token'=>$request->token,
        //             //     'name'=>$request->name,
        //             //     'profile'=>$request->profile,
        //             //     'value'=>$request->value,
        //             //     'updated_at'=>$request->updated_at,
        //             // ]);
        //             $playersave = new playersave;
        //             $playersave -> playersaveupdate($request);
        //             break;
    
        //         case 'game':
        //             DB::table($table)->where('id',$request->update_id)->update([
        //                 //有ID
        //                 'gid' =>$request->gid,
        //                 'info_id'=>$request->info_id,
        //                 'provider_id'=>$request->provider_id,
        //                 'status'=>$request->status,
        //                 'created_at' => $request->created_at,
        //                 'updated_at' => $request->updated_at,
        //             ]);
        //             break;
    
        //         case 'game_info':
        //             DB::table($table)->where('info_id',$request->info_id)->update([
        //                 //沒ID
        //                 // 'info_id'=>$request->info_id,
        //                 'name' =>$request->name,
        //                 'name_cn' =>$request->name_cn,
        //                 'name_en' =>$request->name_en,
        //                 'name_jp' =>$request->name_jp,
        //                 'server_host'=>$request->server_host,
        //                 'server_path'=>$request->server_path,
        //                 'server_port'=>$request->server_port,
        //                 'server_demo_port'=>$request->server_demo_port,
        //                 'client_dir_name'=>$request->client_dir_name,
        //                 'created_at' => $request->created_at,
        //                 'updated_at' => $request->updated_at,
        //             ]);
        //             break;
    
        //         case 'provider':
        //             // DB::table($table)->where('id',$request->update_id)->update([
        //             //     //有ID
        //             //     'username'=>$request->username,
        //             //     'private_key'=>$request->private_key,
        //             //     'game_url'=>$request->game_url,
        //             //     'name'=>$request->name,
        //             //     'currency'=>$request->currency,
        //             //     'enabled'=>$request->enabled,
        //             // ]);
        //             $providersave = new providersave;
        //             $providersave -> providerupdate($request);
        //            break;
                
        //         case 'report':
        //             DB::table($table)->where('id',$request->update_id)->update([
        //                 //有ID
        //                 'token'=>$request->token,
        //                 'gid'=>$request->gid,
        //                 'in'=>$request->in,
        //                 'out'=>$request->out,
        //                 'wage'=>$request->wage,
        //                 'surplus'=>$request->surplus,
        //                 'goods'=>$request->goods,
        //                 'profile'=>$request->profile,
        //                 'created_at' =>$request->created_at,
        //             ]);
        //             break;
    
        //         case 'server_config':
        //             DB::table($table)->where('gid',$request->gid)->update([
        //                 //沒ID
        //                 // 'gid'=>$request->gid,
        //                 'name'=>$request->name,
        //                 'profile'=>$request->profile,
        //                 'value'=>$request->value,
        //                 'updated_at'=>date('Y-m-d H:i:s'),
        //             ]);
        //             break;
    
        //         case 'gamenew':
        //             $gamenew = new game;
        //             $gamenew -> gamenewupdate($request);
        //             break;                                             
                
        //         default:
        //             throw new Exception("Bad Request", 400);
        //             break;
        //     }
        // }else{
        //     // Log::channel('actionlog')->info('request',['item'=> 'false']);
        //     print_r('false');
        // }


        return $next($request);
    }
}
