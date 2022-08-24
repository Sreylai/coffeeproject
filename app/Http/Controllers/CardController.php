<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;


class CardController extends Controller
{
    //
    public function card(){

        return view('card');
    }

    public function add_to_card(Request $request){
        //if we have a card in session
        if($request->session()->has('card')){
            $card=$request->session()->get('card');
            $product_array_ids=array_column($card,'id');
            $id=$request->input('id');

            //add product to card
            if(!in_array($id,$product_array_ids)){
                $name=$request->input('name');
                $image=$request->input('image');
                $price=$request->input('price');
                $quantity=$request->input('quantity');
                $sale_price=$request->input('sale_price');
                if($sale_price !=null){
                    $price_to_charge=$sale_price;
                }else{
                    $price_to_charge=$price;
                }
                $product_array =array(
                    'id'=>$id,
                    'name'=>$name,
                    'image'=>$image,
                    'price'=>$price_to_charge,
                    'quantity'=>$quantity,

                );
                $card[$id]=$product_array;
                $request->session()->put('card',$card);
            }

            //product is already in card
            else{
                echo "<script>alert('Product is already in card');</script>";
            }

            $this->calculateTotalCard($request);
            return view('card');


            //if we don't have a card in session
        }else{
            $card= array();
                $id=$request->input('id');
                $name=$request->input('name');
                $image=$request->input('image');
                $price=$request->input('price');
                $quantity=$request->input('quantity');
                $sale_price=$request->input('sale_price');
                if($sale_price!=null){
                    $price_to_charge=$sale_price;
                }else{
                    $price_to_charge=$price;
                }
                $product_array = array(
                    'id'=>$id,
                    'name'=>$name,
                    'image'=>$image,
                    'price'=>$price_to_charge,
                    'quantity'=>$quantity,

                    );
                $card[$id]=$product_array;
                $request->session()->put('card',$card);

               $this->calculateTotalCard($request);
                return view('card');


        }

    }

    function calculateTotalCard(Request $request){
        $card=$request->session()->get('card');
        $total_price=0;
        $total_quantity=0;

        foreach($card as $id=>$product){
            $product=$card[$id];
            $price=$product['price'];
            $quantity=$product['quantity'];

            $total_price=$total_price + ($price*$quantity);
            $total_quantity=$total_quantity + $quantity;
        }
        $request->session()->put('total',$total_price);
        $request->session()->put('quantity',$total_quantity);
    }

    function remove_from_card(Request $request){
        if($request->session()->has('card')){
            $id=$request->input('id');
            $card=$request->session()->get('card');
            unset($card[$id]);
            $request->session()->put('card',$card);
            $this->calculateTotalCard($request);

        }
        return view('card');
    }
    function edit_product_quantity(Request $request){
        if($request->session()->has('card')){
                $product_id=$request->input('id');
                $product_quantity=$request->input('quantity');

            if($request->has('decrease_product_quantity_btn')){
                $product_quantity=$product_quantity-1;
            }else if($request->has('increase_product_quantity_btn')){
                $product_quantity=$product_quantity+1;
            }else{

            }
            if($product_quantity<=0){
                $this->remove_from_card($request);
            }

                $card=$request->session()->get('card');
            if(array_key_exists($product_id,$card)){
                $card[$product_id]['quantity']=$product_quantity;
                $request->session()->put('card',$card);
                $this->calculateTotalCard($request);
            }
        }
        return view('card');
    }

    function checkout(Request $request){
        return view('checkout');
    }

    function place_order(Request $request){
        if($request->session()->has('card')){
            $name=$request->input('name');
            $email=$request->input('email');
            $phone=$request->input('phone');
            $city=$request->input('city');
            $address=$request->input('address');

            $cost=$request->session()->get('total');
            $status="not paid";
            $date=date('Y-m-d');

            $card=$request->session()->get('card');

            $order_id = DB::table('order')->InsertGetId([
                        'name'=>$name,
                        'email'=>$email,
                        'phone'=>$phone,
                        'city'=>$city,
                        'address'=>$address,
                        'cost'=>$cost,
                        'status'=>$status,
                        'date'=>$date
                    ],'id');
            foreach ($card as $id=>$product){
                $product=$card[$id];
                $product_id=$product['id'];
                $product_name=$product['name'];
                $product_price=$product['price'];
                $product_quantity=$product['quantity'];
                $product_image=$product['image'];

                DB::table('order_item')->Insert([
                    'order_id'=>$order_id,
                    'product_id'=>$product_id,
                    'product_name'=>$product_name,
                    'product_price'=>$product_price,
                    'product_quantity'=>$product_quantity,
                    'product_image'=>$product_image,
                    'order_date'=>$date

                ]);
            }
            $request->session()->put('order_id',$order_id);

            return view('payment');


        }else{
            return redirect('/');
        }

    }










}



