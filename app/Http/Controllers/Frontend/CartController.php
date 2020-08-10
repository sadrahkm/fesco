<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Food;
use App\Utility\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $foodItems = Cart::foodCartCollections();
            $totalPrice = Cart::calculatePriceCartItems($foodItems);
            session()->put('discount', 0);
            $discount = 0;
            session()->put('finalPrice', $totalPrice);
            $finalPrice = $totalPrice;
            return view('frontend.payment.cart', compact('foodItems', 'totalPrice', 'discount', 'finalPrice'));
        }
        return redirect()->route('homepage');
    }

    public function add(Request $request)
    {
        if (!session()->has('cart_lock')) {
            if (Auth::check()) {
                $food_id = $request->input('food_id');
                $isCartExists = session()->has('cart');
                if ($isCartExists) {
                    $cart = session()->get('cart');
                    if (array_key_exists($food_id, $cart)) {
                        $cart[$food_id]++;
                    } else {
                        $cart[$food_id] = 1;
                    }
                    session()->put('cart', $cart);
                } else {
                    session()->put('cart', [$food_id => 1]);
                }
                session()->save();
                return sizeof(session()->get('cart'));
                /*            $food_id = $request->input('food_id');
                            $request->session()->push('cart', $food_id);
                            $sessionSize = sizeof(array_unique($request->session()->get('cart')));
                            return $sessionSize;*/
            }
        }
        return 'false';
    }

    public function delete($food_id)
    {
        $cart = session()->get('cart');
        if (array_key_exists($food_id, $cart)) {
            $foodItem = Food::find($food_id);
            if ($foodItem && $foodItem instanceof Food) {
                unset($cart[$food_id]);
                session()->put('cart', $cart);
            }
        }
        return redirect('cart');
    }

    public function increaseCartItem(Request $request)
    {
        $food_id = (int)$request->input('food_id');
        $newValue = (int)$request->input('value');
        $code = $request->input('code');
        if (is_int($food_id) && is_int($newValue)) {
            $cart = session()->get('cart');
            if (array_key_exists($food_id, $cart)) {
                $cart[$food_id] = $newValue;
            }
            session()->put('cart', $cart);
            $foodItems = Cart::foodCartCollections();
            $totalPrice = Cart::calculatePriceCartItems($foodItems);
            Cart::calculateCouponPrice($code, $discount, $final_price);
            return array($totalPrice, $discount, $final_price);
        }
    }

    public function checkout(Request $request)
    {
        session()->put('cart_lock', false);
        session()->save();
        $user = Auth::user();
        $prices['totalPrice'] = session()->get('cart_price');
        if (session()->has('discount') && session()->has('finalPrice')) {
            $prices['discount'] = session()->get('discount');
            $prices['finalPrice'] = session()->get('finalPrice');
        } else {
            $prices['discount'] = 0;
            $prices['finalPrice'] = $prices['totalPrice'];
        }
        $userFoods = Cart::foodCartCollections();
        return view('frontend.payment.checkout', compact('user', 'prices', 'userFoods'));
    }

    public function clearCart()
    {
        Cart::clearCart();
        return redirect()->route('homepage');
    }
}
