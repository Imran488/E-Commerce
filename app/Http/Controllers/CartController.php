<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller


{
    public function cart($id)
    {
        $product = Product::find($id);
        session()->forget('cart');
        // dd($product);
        if (!$product) {
            return redirect()->route('home')->with('error', 'there is no product into the cart');
        }
        $cartExist = session()->get('cart');
        // case-1:no cart
        if (!$cartExist) {
            $cartData = [$id => [
                'product_id' => $product->id,
                'product_name' => $product->product_name,
                'price' => $product->price,
                'offer' => $product->offer,
                'product_quantity' => 1,
            ]];
            session()->put('cart', $cartData);
            return redirect()->back()->with('message', 'Product added into Your cart');
        }
        // case-2:already one cart exist
        if (!isset($cartExist[$id])) {
            $cartExist[$id] = [
                'product_id' => $product->id,
                'product_name' => $product->product_name,
                'price' => $product->price,
                'offer' => $product->offer,
                'product_quantity' => 1,
            ];
            session()->put('cart', $cartExist);
            return redirect()->route('home')->with('message', 'Product added into the cart');
        }
        // case-3: same product adding into the cart
        $cartExist[$id]['product_quantity'] = $cartExist[$id]['product_quantity'] + 1;
        session()->put('cart', $cartExist);
        return redirect()->route('home')->with('message', 'Product added into the cart');
    }

    public function clearCart()
    {
        session()->forget('cart');
        return redirect()->route('home')->with('error', 'Cart Cleared');
    }

    public function remove($id)
    {
        $cart = session()->get('cart');
        unset($cart[$id]);
        session()->put('cart', $cart);
        return redirect()->back()->with('error', 'Product deleted from cart');
    }


    public function checkout()
    {
        $carts = session()->get('cart');
        if ($carts) {
            foreach ($carts as $cart)
                Order::create([
                    'customer_id' => auth()->user()->id,
                    'name' => auth()->user()->name,
                    'email' => auth()->user()->email,
                    'phone' => auth()->user()->phone,
                    'product_id' => $cart['product_id'],
                    'product_name' => $cart['product_name'],
                    'offer' => $cart['offer'],
                    'price' => $cart['price'],
                    'quantity' => $cart['product_quantity'],
                    'total' => ($cart['price'] * $cart['product_quantity']) - ($cart['price'] * $cart['product_quantity'] * ($cart['offer'] / 100)),
                ]);
            session()->forget('cart');
            return redirect()->route('user.orders',auth()->user()->id)->with('message', 'Order place successfully ');
        }
        return redirect()->back()->with('error', 'No data found into the cart');
    }



    public function orderForm(Request $request, $id)
    {
        $product = Product::find($id);
        $stock = Stock::where('id',$product->id)->get();
        foreach($stock as $st_qty){
            $st_qty->total_produce;
        }
        if ($st_qty->total_produce <= $request->quantity) {
            return redirect()->back()->with('error', 'Out of stock');
        }
        $cartExist = session()->get('cart');
        // case-1:no cart
        if (!$cartExist) {
            $cartData = [$id => [
                'product_id' => $product->id,
                'product_name' => $product->product_name,
                'price' => $product->price,
                'offer' => $product->offer,
                'product_quantity' => $request->quantity,
            ]];
            session()->put('cart', $cartData);
            return redirect()->back()->with('message', 'Product added into the cart');
        }
        // case-2:already one cart exist
        if (!isset($cartExist[$id])) {
            $cartExist[$id] = [
                'product_id' => $product->id,
                'product_name' => $product->product_name,
                'price' => $product->price,
                'offer' => $product->offer,
                'product_quantity' => $request->quantity,
            ];
            session()->put('cart', $cartExist);
            return redirect()->back()->with('message', 'Product added into the cart');
        }
        // case-3: same product adding into the cart
        $cartExist[$id]['product_quantity'] = $cartExist[$id]['product_quantity'] + 1;
        session()->put('cart', $cartExist);
        return redirect()->back()->with('message', 'Product added into the cart');
    }
}
