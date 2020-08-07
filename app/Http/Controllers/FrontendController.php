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
        return view('frontend.premium');
    }
    
    public function subscribe($plan){

        $user=Auth::user();
        
        $intent = $user->createSetupIntent();
        return view('frontend.subscribe',compact('intent','plan'));
    }

    public function payment(Request $request){

        $user = Auth::user();
        $requestData = $request->all();
      //  dd($requestData);

        $stripeCustomer = $user->updateStripeCustomer([
                                   'name'=>'harry',
                                    'address'=>[
                                      'line1' => '510 Townsend St',
                                          'postal_code' => '98140',
                                          'city' => 'San Francisco',
                                          'state' => 'CA',
                                          'country' => 'US',
                                    ],]);



          $payment_methods = $requestData['paymentMethod']['payment_method'];
          //dd($payment_methods);

          $user->newSubscription('Hd channels', 'price_1HBpCJH1fI2EIRYNK5uPdvQ1')->create($payment_methods,[
              'description'=>'a testing mode'
          ]);
          return back()->with('success','Subscription is completed.');
    }

}
