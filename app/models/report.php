<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class report extends Model {
	protected $guarded = [];
	protected $table = 'report';
	public $timestamps = false;

	public function reportcombineupdate($request){
        $data = [
			//有ID
			'token'=>$request->token,
			'gid'=>$request->gid,
			'in'=>$request->in,
			'out'=>$request->out,
			'wage'=>$request->wage,
			'surplus'=>$request->surplus,
			'goods'=>$request->goods,
			'profile'=>$request->profile,
			'created_at' =>date('Y-m-d H:i:s'),
        ];

		$data2 = [
			//有ID
			'seq' => $request->seq,
			'tid' => $request->tid,
			'in' => $request->in,
			'out' => $request->out,
			'surplus' => $request->surplus,
			'round' => $request->round,
			'result' => $request->result,
			'remark' => $request->remark,
        ];

        report::where('id',$request->update_id)->update($data);
		reportdtl::where('id',$request->update_id)->update($data2);
        // ActionLog::pushAfter('player', player::where('id', $request->get('id'))->get());

        // error_reporting(0);
        // ActionLog::save(Route::getCurrentRoute()->action['parent'],0,'remark text',null,$request->get('id'));
    }
    
    public function reportcombinecreate($request){
        $data = [
			//有ID
			'token'=>$request->token,
			'gid'=>$request->gid,
			'in'=>$request->in,
			'out'=>$request->out,
			'wage'=>$request->wage,
			'surplus'=>$request->surplus,
			'goods'=>$request->goods,
			'profile'=>$request->profile,
			'created_at' =>date('Y-m-d H:i:s'),
        ];

		report::create($data);
		
		$data2 = [
			//有ID
			'id' => report::get()->last()->id,
			'seq' => $request->seq,
			'tid' => $request->tid,
			'in' => $request->in,
			'out' => $request->out,
			'surplus' => $request->surplus,
			'round' => $request->round,
			'result' => $request->result,
			'remark' => $request->remark,
        ];
        
		reportdtl::create($data2);

    }

	public function reportupdate($request){
        $data = [
			//有ID
			'token'=>$request->token,
			'gid'=>$request->gid,
			'in'=>$request->in,
			'out'=>$request->out,
			'wage'=>$request->wage,
			'surplus'=>$request->surplus,
			'goods'=>$request->goods,
			'profile'=>$request->profile,
			'created_at' =>date('Y-m-d H:i:s'),
        ];

        report::where('id',$request->update_id)->update($data);
        // ActionLog::pushAfter('player', player::where('id', $request->get('id'))->get());

        // error_reporting(0);
        // ActionLog::save(Route::getCurrentRoute()->action['parent'],0,'remark text',null,$request->get('id'));
    }
    
    public function reportcreate($request){
        $data = [
			//有ID
			'token'=>$request->token,
			'gid'=>$request->gid,
			'in'=>$request->in,
			'out'=>$request->out,
			'wage'=>$request->wage,
			'surplus'=>$request->surplus,
			'goods'=>$request->goods,
			'profile'=>$request->profile,
			'created_at' =>date('Y-m-d H:i:s'),
        ];

        report::create($data);
    }

	public function reportcombine() {
		return $this->hasOne('App\models\reportdtl', 'id', 'id'); //hasOne('App\Phone', 'foreign_key', 'local_key');
	}
	
	public function reportWithGame() {
		return $this->hasone('App\models\game', 'gid', 'gid'); 
	}

	public function reportWithReportdtl() {
		return $this->hasOne('App\models\reportdtl', 'id', 'id');
	}
	public function reportWithPlayer() {
		return $this->hasOne('App\models\player', 'uniq_id', 'token');
	}
	public function reportWithCurrency() {
		return $this->hasOne('App\models\currencyinitial', 'cid', 'profile');
	}
}
