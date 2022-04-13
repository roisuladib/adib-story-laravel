<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProductGallery;
use App\Http\Requests\Admin\ProductGalleryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ProductGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = ProductGallery::with(['product']);
            return Datatables::of($query)
                ->addColumn('action', function($item) {
                    return '
                        <div class="row justify-content-center">                                                     
                            <form action="'. route('product-galleries.destroy', $item->id) .'" method="POST">
                                '. method_field('delete') . csrf_field() .'
                                <button type="submite" class="btn btn-danger btn-circle btn-sm mt-2 ml-1" onclick="return confirm(`Apakah data akan dihapus ?`)">
                                    <ion-icon name="trash-outline"></ion-icon>
                                </button>
                            </form>                      
                        </div>                        
                    ';
                })->editColumn('photo', function($item) {
                    return $item->photo ? '<img src="' . Storage::url($item->photo) . '" style="max-height: 90px;" />' : '';
                })->rawColumns([
                    'action','photo'
                ])->make();
        }   
        return view('pages.admin.galleries.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        $products = Product::all();
        return view('pages.admin.galleries.create', [            
            'products' => $products
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductGalleryRequest $request)
    {
        $data = $request->all();
        $data['photo'] = $request->file('photo')->store('assets/product', 'public');
        ProductGallery::create($data);
        return redirect()->route('product-galleries.index');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductGalleryRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = ProductGallery::findOrFail($id);        
        $data->delete();
        return redirect()->route('product-galleries.index');
    }
}
