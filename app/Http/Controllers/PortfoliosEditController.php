<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Portfolio;
use Validator;

class PortfoliosEditController extends Controller
{
    public function execute(Portfolio $portfolio, Request $request){
    	if($request->isMethod('delete')){
    		$portfolio->delete();
    		return redirect('admin')->with('status', 'Портфолио удалено');
    	}
    	if($request->isMethod('post')){
    		$input = $request->except('_token');
    		$input['id'] = $portfolio->id;
			$messages = [
			    	'required'=>'Поле :attribute не может быть пустым',
			  ];
    		$validator = Validator::make($input, [
    			'name'=>'required|max:100',
    			'filter'=>'required',
    		], $messages);
    		if($validator->fails()){
    			return redirect()->route('portfoliosEdit', ['portfolio'=>$input['id']])->withErrors($validator)->withInput();
    		}
    		if($request->hasFile('images')){
    			$file = $request->file('images');
    			$input['images'] = $file->getClientOriginalName();
    			$file->move(public_path().'/assets/img/', $input['images']);
    		}else{
    			$input['images'] = $input['old_images'];
    		}

    		unset($input['old_images']);
    		$portfolio->fill($input);
    		if($portfolio->update()){
    			return redirect('admin')->with('status', 'Портфолио отредактировано');
    		}

    	}
    	if(view()->exists('admin.portfolios_edit')){
    		$old = $portfolio->toArray();
    		$data = [
    			'title'=>'Редактирование',
    			'data'=>$old
    		];
    		return view('admin.portfolios_edit', $data);
    	}
    }
}
