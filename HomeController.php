<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;
use DB;

class HomeController extends Controller {
    public function list() {
        $items = ProductModel::join('category', 'category_id', '=', 'Product.Product_cate')->get();
        return view('shop_list', ['items' => $items]);
    }

    public function add_cart(Request $request, $id) {
        if (!$request->session()->has('cart.products')) {
            $request->session()->put('cart.products', [['id' => $id, 'quantity' => 1]]);
        } else {
            $cart = $request->session()->get('cart.products');
            $found = false;

            foreach ($cart as &$product) {
                if ($product['id'] == $id) {
                    $product['quantity']++;
                    $found = true;
                    break;
                }
            }

            if (!$found) {
                $cart[] = ['id' => $id, 'quantity' => 1];
            }

            $request->session()->put('cart.products', $cart);
        }

        // Cập nhật tổng số lượng sản phẩm trong giỏ hàng
        $totalQuantity = array_sum(array_column($cart, 'quantity'));
        $request->session()->put('cart.totalQuantity', $totalQuantity);

        return redirect()->route('products');
    }

    public function remove_cart(Request $request, $id) {
        if ($request->session()->has('cart.products')) {
            $cart = $request->session()->get('cart.products');
    
            foreach ($cart as $key => $product) {
                if ($product['id'] == $id) {
                    unset($cart[$key]);
                }
            }
    
            $request->session()->put('cart.products', array_values($cart));
    
            // Cập nhật tổng số lượng sản phẩm trong giỏ hàng
            $totalQuantity = array_sum(array_column($cart, 'quantity'));
            $request->session()->put('cart.totalQuantity', $totalQuantity);
        }
    
        return redirect()->route('cart');
    }
    

    public function cart(Request $request) {
        $cart = $request->session()->get('cart.products', []);
        $products = [];

        foreach ($cart as $cartItem) {
            $product = ProductModel::where('Product_id', $cartItem['id'])->first();
            if ($product) {
                $products[] = [
                    'id' => $product->Product_id,
                    'name' => $product->Product_name,
                    'image' => $product->Product_img,
                    'price' => $product->Product_price,
                    'quantity' => $cartItem['quantity']
                ];
            }
        }

        return view('cart', ['products' => $products]);
    }

    public function checkout(Request $request) {
        $cart = $request->session()->get('cart.products', []);
        if (empty($cart)) {
            return redirect()->route('cart')->with('error', 'Giỏ hàng trống.');
        }
    
        $userId = 1; // Giả định rằng bạn đã có thông tin User ID
        $totalAmount = 0;
    
        foreach ($cart as $cartItem) {
            $product = ProductModel::where('Product_id', $cartItem['id'])->first();
            if ($product) {
                $totalAmount += $product->Product_price * $cartItem['quantity'];
            }
        }
    
        DB::beginTransaction();
    
        try {
            $transactionId = DB::table('Transaction')->insertGetId([
                'User_id' => $userId,
                'Total_amount' => $totalAmount,
                'Transaction_date' => now()
            ]);
    
            foreach ($cart as $cartItem) {
                $product = ProductModel::where('Product_id', $cartItem['id'])->first();
                DB::table('Transaction_items')->insert([
                    'Transaction_id' => $transactionId,
                    'Product_id' => $cartItem['id'],
                    'Quantity' => $cartItem['quantity'],
                    'Price' => $product->Product_price
                ]);
            }
    
            DB::commit();
            $request->session()->forget('cart.products'); // Xóa giỏ hàng sau khi thanh toán thành công
            return view('checkout_success');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('cart')->with('error', 'Đã xảy ra lỗi trong quá trình thanh toán.');
        }
    }    
}
