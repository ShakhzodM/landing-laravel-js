<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Portfolio;

class PortfoliosAddController extends Controller
{
    public function execute(Request $request){
    	if($request->isMethod('post')){
    			$input = $request->except('_token');
    			$messages = [
    				'required'=>'Поле :attribute не может быть пустым',
    			];
    			$validator = Validator::make($input, [
    				'name'=>'required|max:100',
    				'filter'=>'required|max:100',
    			],$messages);
    		
    		if($validator->fails()){
    			return redirect()->route('portfoliosAdd')->withErrors($validator)->withInput();
    		}
    		if($request->hasFile('images')){
    			$file = $request->file('images');
    			$input['images'] = $file->getClientOriginalName();
    			$file->move(public_path().'/assets/img/', $input['images']);
    		}
    		$portfolio = new Portfolio;
    		$portfolio->fill($input);
    		if($portfolio->save()){
    			return redirect('admin')->with('status', 'Портфолио добавлено');
    		}

    	}
    	if(view()->exists('admin.portfolios_add')){
  			$data = [
    			'title'=>'Добавление портфолио',
    		];
    	return view('admin.portfolios_add', $data);
    	}
    	
    }
}
