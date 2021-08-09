<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use Validator;

class PagesEditController extends Controller
{
    public function execute(Page $page, Request $request){
    	if($request->isMethod('delete')){
    		$page->delete();
    		return redirect('admin')->with('status', 'Страница удалена');
    	}
    	if($request->isMethod('post')){
    		$input = $request->except('_token');
    		$input['id'] = $page->id;
    		$validator = Validator::make($input, [
    			'name'=>'required|max:100',
    			'alias'=>'required|unique:pages,alias,'.$page->id,
    			'text'=>'required'
    		]);
    		if($validator->fails()){
    			return redirect()->route('pagesEdit', ['page'=>$page->id])->withErrors($validator);
    		}
    		if($request->hasFile('images')){
    			$file = $request->file('images');
    			$input['icon'] = $file->getClientOriginalName();
    			$file->move(public_path().'/assets/img/', $input['icon']);
    		}else{
    			$input['icon'] = $input['old_images'];
    		}
    		unset($input['old_images']);
    		$page->fill($input);
    		if($page->update()){
    			return redirect('admin')->with('status', 'Страница обновлена');
    		}
    	}
    	$old = $page->toArray();
    	if(view()->exists('admin.page_edit')){
    		$data = [
    					'title'=>"Редактирование страницы $old[name]",
    					'data'=>$old
    				];
    		return view('admin.page_edit', $data);
    	}
    }
}
