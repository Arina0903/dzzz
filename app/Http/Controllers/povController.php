<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Str;

use App\Pov;

class povController extends Controller
{
	public function getPov()
	{
		$Pov = Pov::get();
		return response()->json($Pov);
	}

	public function postPov(Request $req)
	{
		$Pov = new Pov();

		$Pov->name=$req->name;
		$Pov->age=$req->age;
		$Pov->password=$req->password;

		$asd=$Pov->save();

		if($asd)
			return "Все акей";
		return"Не акей";
	}

	public function delPov(Request $req)
	{
		$Pov = Pov::where("password", $req->password)->first();
		$Pov->delete();
		return response()->json("Пользователь удален с сервера");
	}

	public function regPov(Request $req)
	{
		$validator = Validator::make($req->all(),
			[
				"name" => "required",
				"age" => "required",
				"password" => "required",

			]);
		if($validator->fails())
			return response()->json($validator->errors);

		Pov::create($req->all());
		return response()->json('Регистрация прошла успешно');
	}

	public function authPov(Request $req)
	{
		$validator = Validator::make($req->all(),
			[
				"name" => "required",
				"password" => "required",

			]);
		
		if($validator->fails())
			return response()->json($validator->errors);

		if($Pov = Pov::where('name', $req->name)->first())
		{
			if ($req->password == $Pov->password)
			{
				$Pov->api_token=str_random(10);
				$Pov->save();
				return response()->json('Авторизация прошла успешно');
			}
		}
		return response()->json('Логин или пароль введены неверно');
	}
	public function logPov(Request $req)
    {
     	$Pov = Pov::where("name", $req->name)->first();

     	if($Pov)
     	{
     		$Pov->api_token = NULL;
     		$Pov->save();
     		return response()->json('Разлогирование прошло успешно');
     	}
    } 
}
