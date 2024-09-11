<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    public function product()
    {

        $products = Product::simplePaginate(12);

        $total_products = Product::count();

        return view('frontend.pages.product.shop', compact('products', 'total_products'));
    }

    public function productDetails($id)
    {
        $routeName = 'details';
        $url = route($routeName, ['id' => $id]);

        $details = Product::find($id);

        return view('frontend.pages.product.details', compact('details'));
    }

    public function productCheckout($id)
    {
        $products = Product::find($id);

        $cartItems = session()->get('cart', []);
        $subtotal = 0;

        if ($cartItems !== null) {
            foreach ($cartItems as $item) {
                $subtotal += $item['subtotal'];
            }
        }

        return view('frontend.pages.product.checkout', compact('products', 'cartItems', 'subtotal'));

    }
}
