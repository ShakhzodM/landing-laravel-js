<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class ServicesAddController extends Controller
{
    public function execute(Request $request){
    	if($request->isMethod('post')){
    		$input = $request->except('_token');
    		$messages = [
    			'required'=>'Поле :attribute не может оставаться пустым',
    			'unique'=>'Значение поля :attribute уже существует',

    		];
    		$validator = Validator::make($input,[
    			'name'=>'required|max:100|unique:services',
    			'text'=>'required'

    		], $messages);
    		if($validator->fails()){
    			return redirect()->route('servicesAdd')->withErrors($validator)->withInput();
    		}

    		$service = new \App\Service;
    		$service->fill($input);
    		if($service->save()){
    			return redirect('admin')->with('status', 'Сервис добавлен');
    		}
    	}
    	if(view()->exists('admin.services_add')){
    		$data = [
    			'title'=>'Добавление сервиса'
    		];
    		return view('admin.services_add', $data);
    	}

    }
}
