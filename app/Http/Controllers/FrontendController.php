<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Http\File;

class FrontendController extends Controller
{
    public function index(){
         
    	$videos = \App\Video::get();
      $categories=\App\Category::with('subcategories','videos')->get();

    	return view('index',compact('videos','categories'));
    }

    public function search(Request $request,$name=null){
        if($name==null){
          if ($request->search_data != "") {

             $videos = \App\Video::where('name','LIKE','%'.$request->search_data.'%')
                                 ->orWhere('tag','LIKE','%'.$request->search_data.'%')
                                 ->select('id','name','tag','image')->take(4)->get();
                $output='<ul class="dropdown-menu" style="background-color: #212121; display: block;overflow:hidden;padding:5px;padding-top:1px;border:1px solid black;">';
                foreach ($videos as $key => $video) {
                  $output .='<a href="/watch/'.$video->name.'/'.$video->id.'"><div class="row mt-2 " style="background-color: #25365a;" >';
                  $output .='<div class="col-6">';
                   $output .='<li><img src="/storage/images/'.$video->image.'" width="160px" height="90px"></li>';
                   $output .='</div>';
                   $output .='<div class="col-6 ">';
                   $output .='<li style="color:white">'.$video->name.'<br>'.$video->tag.'</li>';
                   $output .='</div>';
                   $output .='</div></a>';
                }
                $output .='<a class="btn btn-primary btn-block mt-1" href="/search-result/'.$request->search_data.'">More Result</a>';
                $output .='</ul>';
                return response()->json($output);
          }else{
            return response()->json('No Data');
          }
        }else{
            $categories=\App\Category::with('subcategories')->get();                  
            $videos = \App\Video::where('name','LIKE','%'.$name.'%')
                               ->orWhere('tag','LIKE','%'.$name.'%')
                               ->select('id','name','tag','image')->get();

            return view('frontend.searchResult',compact('videos','categories','name'));
        }

    }

     public function show($name,$id){

      	$Subcat = \App\Subcategory::with('videos')->find($id);   
       	$categories=\App\Category::with('subcategories')->get();

      	return view('frontend.show',compact('Subcat','categories'));
    }

     public function watch($name,$id){

        $videos = \App\Video::find($id);    
        $categories=\App\Category::with('subcategories')->get();

        return view('frontend.watch',compact('categories','videos'));
    }

    public function premium(){
      if (Auth::check()) {

        $user=Auth::user();

        $subscriptionItem = $user->subscription('Premium Channels')->items->first();
        $stripePlan = $subscriptionItem->stripe_plan;
        if ($stripePlan == 'price_HJF2CNzKvUqvFW') {
            $plan_expire_date=$subscriptionItem->created_at->addMonth();

            if (now() == $plan_expire_date) {

             $user->subscription('Premium Channels')->cancelNow(); 

            }

        }else{
          $plan_expire_date=$subscriptionItem->created_at->addYear();

            if (now() == $plan_expire_date) {

             $user->subscription('Premium Channels')->cancelNow(); 

            }

        }

        if ($user->subscribed('Premium Channels')) {
          $videos = \App\Video::get();
          $categories=\App\Category::with('subcategories','videos')->get();
          return view('frontend.paid',compact('categories','videos'));

        }else{
          return view('frontend.premium');
        }
      }
      return view('frontend.premium');
    
    }
    
    public function subscribe($plan){

        $user=Auth::user();
       
        $intent = $user->createSetupIntent();
        return view('frontend.subscribe',compact('intent','plan'));
    }

    public function payment(Request $request){

      $validatedData = $request->validate([
        'name' => 'required|min:3|max:50',
        'line1' => 'required',
        'postal_code' => 'required|max:8',
        'city' => 'required|min:3|max:15',
        'state' => 'required|min:3|max:20',
        'country' => 'required|min:3|max:20',
    ]);
        $user = Auth::user();
        $requestData = $request->all();

         $user->createOrGetStripeCustomer();
         $stripeCustomer = $user->updateStripeCustomer([
                                    'name'=>$requestData['name'],
                                    'address'=>[
                                    'line1' => $requestData['line1'],
                                    'postal_code' => $requestData['postal_code'],
                                    'city' => $requestData['city'],
                                    'state' => $requestData['state'],
                                    'country' => $requestData['country'],
                                    ],]);



          $payment_methods = $requestData['paymentMethod']['payment_method'];
          $user->newSubscription('Premium Channels', $requestData['plan'])
               ->create($payment_methods,['description'=>'a testing mode']);
        

            return response()->json(['redirect'=> url('/premium')]);
    }

}
