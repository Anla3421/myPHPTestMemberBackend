<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewMallController extends Controller {

	public function Index(Request $request) {

		return view('mall.newaddgoods');
	}
}
