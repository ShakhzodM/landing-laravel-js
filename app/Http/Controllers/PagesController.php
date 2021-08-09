<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class PagesController extends Controller
{
    public function execute(){
    	if(view()->exists('admin.pages')){
    		$pages = \App\Page::all();
    		return view('admin.pages', [
    										'title'=>'Страницы',
    										'pages'=>$pages
    									]);
    	}
    	abort(404);
    }
}
