<?php

namespace App\Http\Controllers;

use App\User;
use App\TransactionDetail;
use App\Product;
use App\ProductGallery;
use App\Category;
use App\Http\Requests\Admin\ProductRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard() {
        $transactions = TransactionDetail::with(['transaction.user', 'product.galleries'])
            ->whereHas('product', function($product) {
                $product->where('users_id', Auth::user()->id);
            });
        $revenue = $transactions->get()->reduce(function($carry, $item) {
            return $carry + $item->price;
        });
        $customer = User::count();
        return view('pages.dashboard.dashboard', [
            'transaction_count' => $transactions->count(),
            'transaction_data'  => $transactions->get(),
            'revenue'           => $revenue,
            'customer'          => $customer
        ]);
    }

    // Produk
    public function my_product() {
        $products = Product::with(['galleries', 'category'])
            ->where('users_id', Auth::user()->id)->get();
        return view('pages.dashboard.dashboard-product', [
            'products' => $products
        ]);
    }
    
    public function create() {
        $categories = Category::all();
        return view('pages.dashboard.dashboard-product-create', [
            'categories' => $categories
        ]);
    }

    public function store(ProductRequest $request) {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        $product = Product::create($data);
        $gallery = [ 
            'products_id' => $product->id,
            'photo'       => $request->file('photo')->store('assets/product', 'public'),
        ];
        ProductGallery::create($gallery);
        return redirect()->route('my-product');
    }

    public function detail(Request $request, $id) {
        $product = Product::with(['galleries', 'user', 'category'])->findOrFail($id);
        $categories = Category::all();
        return view('pages.dashboard.dashboard-product-detail', [
            'product' => $product,
            'categories' => $categories
        ]);
    }

    public function upload(Request $request) {
        $data = $request->all();
        $data['photo'] = $request->file('photo')->store('assets/product', 'public');
        ProductGallery::create($data);
        return redirect()->route('product-detail', $request->products_id);
    }    

    public function update(ProductRequest $request, $id) {
        $data = $request->all();
        $item = Product::findOrFail($id);
        $data['slug'] = Str::slug($request->name);
        $item->update($data);
        return redirect()->route('my-product');
    }

    public function delete(Request $request, $id) {
        $item = ProductGallery::findOrFail($id);
        $item->delete();
        return redirect()->route('product-detail', $item->products_id);
    }

    // Transaksi
    public function transaction() {
        $sell_transactions = TransactionDetail::with(['transaction.user', 'product.galleries'])
            ->whereHas('product', function($product) {
                $product->where('users_id', Auth::user()->id);
        })->get();
        $buy_transactions = TransactionDetail::with(['transaction.user', 'product.galleries'])
            ->whereHas('transaction', function($transaction) {
                $transaction->where('users_id', Auth::user()->id);
        })->get();
        return view('pages.dashboard.dashboard-transaction', [
            'sell_transactions' => $sell_transactions,
            'buy_transactions'  => $buy_transactions
        ]);
    }
    public function transaction_detail(Request $request, $id) {
        $transactions = TransactionDetail::with(['transaction.user', 'product.galleries'])->findOrFail($id);        
        return view('pages.dashboard.dashboard-transaction-detail', [
            'transaction' => $transactions
        ]);
    }
    public function transaction_update(Request $request, $id) {
        $data = $request->all();
        $item = TransactionDetail::findOrFail($id);
        $item->update($data);
        return redirect()->route('transaction-detail', $id);
    }

    // Setting Account
    public function account() {
        $user = Auth::user();        
        return view('pages.dashboard.dashboard-account', [
            'user' => $user    
        ]);
    }
    public function setting() {
        $user = Auth::user();
        $categories = Category::all();
        return view('pages.dashboard.dashboard-setting', [
            'user'       => $user,
            'categories' => $categories
        ]);
    }

    public function update_account(Request $request, $redirect) {
        $data = $request->all();
        $item = Auth::user();
        $item->update($data);
        return redirect()->route($redirect);
    }
}
