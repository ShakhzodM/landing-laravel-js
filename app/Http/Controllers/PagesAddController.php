<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Page;

class PagesAddController extends Controller
{
    public function execute(Request $request){
    	if($request->isMethod('post')){
    		$input = $request->except('_token');
    		$messages = ['required'=>'Поле :attribute обязательно к заполнению',
    					 'unique'=>'Поле :attribute должно быть уникальным'
    					];
    		$validator = Validator::make($input, [
    			'name'=>'required|max:100',
    			'alias'=>'required|unique:pages|max:100',
    			'text'=>'required'
    		], $messages);
    		if($validator->fails()){
    			return redirect()->route('pagesAdd')->withErrors($validator)->withInput();
    		}
    		if($request->hasFile('images')){
    			$file = $request->file('images');
    			$input['icon'] = $file->getClientOriginalName();
    			$file->move(public_path().'/assets/img', $input['images']);
    		}

    		$page = new Page();
    		$page->fill($input);
    		if($page->save()){
    			return redirect('admin')->with('status', 'Страница добавлена');
    		}

    	}

    	if(view()->exists('admin.page_add')){
    		$data = [
    			'title' => 'Добавление страницы'
    		        ];
    		return view('admin.page_add', $data);
    	}

    	abort(404);
    }
}
