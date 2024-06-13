<?php

namespace App\Http\Controllers;

use App\Models\CustomerAddress;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CartController extends Controller
{
    public function addToCart(Request $request){
        try {
            // Find the product by ID
            $product = Product::find($request->id);

            // Check if product exists
            if($product == null){
                return response()->json([
                    "status" => "false",
                    "message" => "Product not found",
                ]);
            }

            // Check if cart already has items
            if(Cart::count() > 0){
                $cartContent = Cart::content();

                $productAlreadyExist = false;

                // Check if product already exists in cart
                foreach($cartContent as $item){
                    if($item->id == $product->id){
                        $productAlreadyExist = true;
                        break;
                    }
                }

                // If product doesn't exist in cart, add it
                if(!$productAlreadyExist){
                    Cart::add($product->id, $product->title, 1, $product->price);
                    $status = true;
                    $message = $product->title . ' added to cart';
                } else {
                    // If product already exists in cart, set status to false
                    $status = false;
                    $message = $product->title . ' already added to cart';
                }
            } else {
                // If cart is empty, add product to cart
                Cart::add($product->id, $product->title, 1, $product->price);
                $status = true;
                $message = $product->title . ' added to cart';
            }

            // Return response as JSON
            return response()->json([
                'status' => $status,
                'message' => $message
            ]);
        } catch (\Exception $e) {
            // Handle the exception and return error response
            return response()->json([
                'status' => false,
                'message' => 'An error occurred while adding product to cart.'
            ]);
        }
    }

    public function cart(){
        try {
            // Display cart content for debugging
            // dd(Cart::content());
            $cartContent = Cart::content();
            $data['cartContent'] = $cartContent;
            return view('front.cart', $data);
        } catch (\Exception $e) {
            // Handle the exception and redirect back with an error message
            session()->flash('error', 'An error occurred while processing your request.');
            return redirect()->route('front.cart');
        }
    }

    public function updateCart(Request $request){
        try {
            $rowId = $request->rowId;
            $qty = $request->qty;

            Cart::update($rowId, $qty);

            session()->flash('success', 'Cart Updated successfully');
            return response()->json([
                'status' => true,
                'message' => 'Cart Updated successfully',
            ]);
        } catch (\Exception $e) {
            // Handle the exception and return error response
            return response()->json([
                'status' => false,
                'message' => 'An error occurred while updating cart.'
            ]);
        }
    }

    public function deleteItem(Request $request){
        try {
            $itemInfo = Cart::get($request->rowId);
        
            if($itemInfo == null){
                session()->flash('error', 'Item not found');
                return response()->json([
                    'status' => false,
                    'message' => 'Item not found'
                ]);
            }
            
            Cart::remove($request->rowId);
            
            session()->flash('success', 'Item removed successfully');
            return response()->json([
                'status' => true,
                'message' => 'Item removed successfully'
            ]);
        } catch (\Exception $e) {
            // Handle the exception and return error response
            return response()->json([
                'status' => false,
                'message' => 'An error occurred while deleting item from cart.'
            ]);
        }
    }

    public function checkout(){
        try {
            // cart is empty, redirect to cart page
            if (Cart::count() == 0) {
                return redirect()->route('front.cart');
            }

            // if user is not logged in, redirect to login page
            if (Auth::check() == false) {
                if (!session()->has('url.intended')) {
                    session(['url.intended' => url()->current()]);
                }

                return redirect()->route('account.login');
            }
            
            session()->forget('url.intended');

            return view('front.checkout');
        } catch (\Exception $e) {
            // Handle the exception and redirect back with an error message
            session()->flash('error', 'An error occurred while processing your request.');
            return redirect()->route('front.cart');
        }
    }
    public function processCheckout(Request $request) {
    
        // Validation
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'city' => 'required',
            'address' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'mobile' => 'required',
            'payment_method' => 'required|in:cod',
            'booking_time' => 'required|date_format:H:i|after_or_equal:05:00|before_or_equal:21:00', // Ensure the payment method is provided and valid
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Please fix the errors',
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }

        // Saving Customer Address
        $user = Auth::user();
        CustomerAddress::updateOrCreate(
            ['user_id' => $user->id],
            [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'address' => $request->address,
                'city' => $request->city,
                'state' => $request->state,
                'zip' => $request->zip,
                'notes' => $request->notes,
                'appartment' => $request->appartment,
                'booking_time' => $request->booking_time,
            ]
        );

        if ($request->payment_method == 'cod') {
            $shipping = 0;
            $subTotal = Cart::subtotal(2, '.', '');
            $grandTotal = $subTotal + $shipping;

            $order = new Order;
            $order->subtotal = $subTotal;
            $order->shipping = $shipping;
            $order->grand_total = $grandTotal;
            $order->first_name = $request->first_name;
            $order->last_name = $request->last_name;
            $order->email = $request->email;
            $order->user_id = $user->id;
            $order->mobile = $request->mobile;
            $order->address = $request->address;
            $order->city = $request->city;
            $order->state = $request->state;
            $order->zip = $request->zip;
            $order->notes = $request->notes;
            $order->booking_time = $request->booking_time;
            $order->appartment = $request->appartment;

            $order->save();

            // Storing into OrderItem
            foreach (Cart::content() as $item) {
                $orderItem = new OrderItem; // Create a new instance of OrderItem
                $orderItem->product_id = $item->id;
                $orderItem->order_id = $order->id; // Use $order->id here
                $orderItem->name = $item->name;
                $orderItem->qty = $item->qty;
                $orderItem->price = $item->price;
                $orderItem->total = $item->price * $item->qty;
                $orderItem->save();
            }
            session()->flash('success', 'You have successfully placed your order.');
            Cart::destroy();
            return response()->json([
                'message' => 'Order saved successfully',
                // 'orderId' => $order->id,
                'status' => true,
            ]);
        }
    
    
}

    public function thankyou(){
        return view('front.thanks');
    }
}
