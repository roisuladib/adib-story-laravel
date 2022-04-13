<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Banner;
use App\Http\Requests\Admin\BannerRequest;

use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = Banner::query();
            return Datatables::of($query)
                ->addColumn('action', function($item) {
                    return '
                        <div class="row justify-content-center">                                                    
                            <form action="'. route('banners.destroy', $item->id) .'" method="POST">
                                '. method_field('delete') . csrf_field() .'
                                <button type="submite" class="btn btn-danger btn-circle btn-sm mt-2 ml-1" onclick="return confirm(`Apakah data akan dihapus ?`)">
                                    <ion-icon name="trash-outline"></ion-icon>
                                </button>
                            </form>                      
                        </div>                        
                    ';
                })->addColumn('banner', function($item) {
                    return $item->banner ? '<img src="' . Storage::url($item->banner) . '" style="max-height: 200px;" />' : '';
                })->rawColumns([
                    'action','banner'
                ])->make();
        }
        return view('pages.admin.banners.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.banners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannerRequest $request)
    {
        $data = $request->all();
        $data['banner'] = $request->file('banner')->store('assets/banners', 'public');
        Banner::create($data);
        return redirect()->route('banners.index');
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
    public function update(BannerRequest $request, $id)
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
        //
    }
}
