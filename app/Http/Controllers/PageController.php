<?php

namespace App\Http\Controllers;
use App\Page;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function execute($aliases){
    	if(view()->exists('site.page')){
    		$page = Page::where('alias', $aliases)->first();
    		return view('site.page', ['page'=>$page]);
    	}

    	abort(404);


    }
}
