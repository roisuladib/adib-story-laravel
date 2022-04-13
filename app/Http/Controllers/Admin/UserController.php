<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
// FormRequest
use App\Http\Requests\Admin\UserRequest;
// Model
use App\User;


use Illuminate\Http\Request;
// Panggil String format buat slug 
use Illuminate\Support\Str;
// Tambah Manual untuk Datatable
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = User::query();
            return Datatables::of($query)
                ->addColumn('action', function($item) {
                    return '
                        <div class="row justify-content-center">                         
                            <a href="'. route('users.edit', $item->id) .'" class="btn btn-warning btn-circle btn-sm mt-2 mr-1">
                                <ion-icon name="create-outline"></ion-icon>
                            </a>
                            <form action="'. route('users.destroy', $item->id) .'" method="POST">
                                '. method_field('delete') . csrf_field() .'
                                <button type="submite" class="btn btn-danger btn-circle btn-sm mt-2 ml-1" onclick="return confirm(`Apakah data akan dihapus ?`)">
                                    <ion-icon name="trash-outline"></ion-icon>
                                </button>
                            </form>                      
                        </div>                        
                    ';
                })
                ->editColumn('photo', function($item) {
                    return $item->photo ? '<img src="' . Storage::url($item->photo) . '" style="max-height: 45px;" />' : '';
                })
                ->rawColumns(['action'])
                ->make();
        }
        return view('pages.admin.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        User::create($data);

        return redirect()->route('users.index');
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
        $item = User::findOrFail($id);
        return view('pages.admin.users.edit', [
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
    public function update(UserRequest $request, $id)
    {
        $data = $request->all();
        $item = User::findOrFail($id);
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }
        else {
            unset($data['password']);
        }
        $item->update($data);
        
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = User::findOrFail($id);
        $item->delete();

        return redirect()->route('users.index');
    }
}
