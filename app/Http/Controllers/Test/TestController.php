<?php

namespace App\Http\Controllers\Test;

use App\Test;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;

class TestController extends ApiController
{
	public function index()
	{	
		$users = Test::all();

		return $this->showAll($users);

	}

    public function store(Request $request)
    {
    	$rules = [
            'name' => 'required',
            'surname' => 'required',
            'telephone' => 'required'
        ];

        $this->validate($request, $rules);

        $data = $request->all();

        $user = Test::create($data);

        return $this->showOne($user, 201);
    }
}
