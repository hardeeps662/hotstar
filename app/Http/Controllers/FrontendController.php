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
