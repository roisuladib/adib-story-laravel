<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
// FormRequest
use App\Http\Requests\Admin\CategoryRequest;
// Model
use App\Category;


use Illuminate\Http\Request;
// Panggil String format buat slug 
use Illuminate\Support\Str;
// Tambah Manual untuk Datatable
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = Category::query();
            return Datatables::of($query)
                ->addColumn('action', function($item) {
                    return '
                        <div class="row justify-content-center">                         
                            <a href="'. route('categories.edit', $item->id) .'" class="btn btn-warning btn-circle btn-sm mt-2 mr-1">
                                <ion-icon name="create-outline"></ion-icon>
                            </a>
                            <form action="'. route('categories.destroy', $item->id) .'" method="POST">
                                '. method_field('delete') . csrf_field() .'
                                <button type="submite" class="btn btn-danger btn-circle btn-sm mt-2 ml-1" onclick="return confirm(`Apakah data akan dihapus ?`)">
                                    <ion-icon name="trash-outline"></ion-icon>
                                </button>
                            </form>                      
                        </div>                        
                    ';
                })->addColumn('icon', function($item) {
                    return $item->icon ? '<img src="' . Storage::url($item->icon) . '" style="max-height: 40px;" />' : '';
                })->rawColumns([
                    'action','icon'
                ])->make();
        }
        return view('pages.admin.categories.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        $data['icon'] = $request->file('icon')->store('assets/category', 'public');

        Category::create($data);

        return redirect()->route('categories.index');
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
        $item = Category::findOrFail($id);
        return view('pages.admin.categories.edit', [
            'item' => $item            
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        $data['icon'] = $request->file('icon')->store('assets/category', 'public');

        $item = Category::findOrFail($id);
        $item->update($data);

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Category::findOrFail($id);
        $item->delete();

        return redirect()->route('categories.index');
    }
}
