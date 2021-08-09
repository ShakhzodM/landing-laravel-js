<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use App\Service;
use App\Portfolio;
use App\People;
use DB;
use Mail;

class IndexController extends Controller
{
    public function execute(Request $request){

        if($request->isMethod('post')){
            $rules = [
                'name'=>'required|max:255',
                'email'=>'required|email',
                'text'=>'required'
            ];
            $messages = [
                'required'=>'Поле :attribute не может быть пустым',
                'email'=>'В поле :attribute введен неккоректный e-mail',
            ];
            $this->validate($request, $rules, $messages);
            $data = $request->all();
            $result = Mail::send('site.email', ['data'=>$data], function($message) use ($data){
                $mail_admin = env('MAIL_ADMIN');
                $message->from($mail_admin, 'hk');
                $message->to('smirzasharifov@mail.ru')->subject('Question');

            });
           
            return redirect()->route('home')->with('status', 'Email is send');


        }
    	$pages = Page::all();
    	$services = Service::all();
    	$portfolios = Portfolio::all();
    	$people = People::all();
        $filters = DB::table('portfolios')->distinct()->pluck('filter');
       
    	$menu = array();

    	foreach($pages as $page){
    		$list = ['title'=>$page->name, 'alias'=>$page->alias];
    		array_push($menu, $list);
    	}
    	$list = ['title'=>'Services', 'alias'=>'service'];
    	array_push($menu, $list);
    	$list = ['title'=>'Portfolio', 'alias'=>'Portfolio'];
    	array_push($menu, $list);
    	$list = ['title'=>'Team', 'alias'=>'team'];
    	array_push($menu, $list);
    	$list = ['title'=>'Contact', 'alias'=>'contact'];
    	array_push($menu, $list);


    	return view('site.index', [
	    							  'menu'=>$menu,
	    							  'pages'=>$pages,
	    							  'portfolios'=>$portfolios,
	    							  'people'=>$people,
	    							  'services'=>$services,
                                      'filters'=>$filters,
    							  ]);
    }
}
