<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use Validator;

class ServicesEditController extends Controller
{
    public function execute(Service $service, Request $request){
     	if($request->isMethod('delete')){
    		$service->delete();
    		return redirect('admin')->with('status', 'Сервис удален');
    	}
    	if($request->isMethod('post')){
    		$input = $request->except('_token');
    		$input['id'] = $service->id;
    		$validator = Validator::make($input, [
    			'name'=>'required|unique:services,name,'.$service->id,
    			'text'=>'required',
    		]);
    		if($validator->fails()){
    			return redirect()->route('servicesEdit', ['service'=>$service->id])->withErrors($validator);
    		}
    		$service->fill($input);
    		if($service->update()){
    			return redirect('admin')->with('status', 'Страница обновлена');
    		}
    	}
    	$old = $service->toArray();
    	if(view()->exists('admin.services_edit')){
    		$data = [
    					'title'=>"Редактирование сервиса $old[name]",
    					'data'=>$old
    				];
    		return view('admin.services_edit', $data);
    	}
    }
}
