<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    function index(){
        return view('index');
    }
    function product(){
       $Drinks= DB::table('product')->where('category','Drinks')->get();
       $Snacks=DB::table('product')->where('category','Snacks')->get();
      // dd($product);
        return view('product',['Drinks'=>$Drinks,'Snacks'=>$Snacks]);


    }

    function single_products(Request $request,$id){
        $product_array= DB::table('product')->where('id',$id)->get();
        return view('single_products',['product_array'=>$product_array]);

    }






}
