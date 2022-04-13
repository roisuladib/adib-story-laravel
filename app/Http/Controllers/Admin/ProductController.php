<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
// FormRequest
use App\Http\Requests\Admin\ProductRequest;
// Model
use App\Product;
use App\User;
use App\Category;

use Illuminate\Http\Request;
// Panggil String format buat slug 
use Illuminate\Support\Str;
// Tambah Manual untuk Datatable
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = Product::with(['user', 'category']);
            return Datatables::of($query)
                ->addColumn('action', function($item) {
                    return '
                        <div class="row justify-content-center">                         
                            <a href="'. route('products.edit', $item->id) .'" class="btn btn-warning btn-circle btn-sm mt-2 mr-1">
                                <ion-icon name="create-outline"></ion-icon>
                            </a>
                            <form action="'. route('products.destroy', $item->id) .'" method="POST">
                                '. method_field('delete') . csrf_field() .'
                                <button type="submite" class="btn btn-danger btn-circle btn-sm mt-2 ml-1" onclick="return confirm(`Apakah data akan dihapus ?`)">
                                    <ion-icon name="trash-outline"></ion-icon>
                                </button>
                            </form>                      
                        </div>                        
                    ';
                })->rawColumns(['action'])->make();
        }
        return view('pages.admin.products.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $categories = Category::all();
        return view('pages.admin.products.create', [
            'users' => $users,
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        Product::create($data);

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Product::findOrFail($id);
        $users = User::all();
        $categories = Category::all();
        return view('pages.admin.products.edit', [
            'item' => $item,     
            'users' => $users,
            'categories' => $categories       
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $data = $request->all();
        $item = Product::findOrFail($id);        
        $data['slug'] = Str::slug($request->name);  
        $item->update($data);
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Product::findOrFail($id);
        $item->delete();

        return redirect()->route('products.index');
    }
}
