<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Category::create([
            'nama_cat' => $request['nama_cat'],
            'deskripsi_cat' => $request['deskripsi_cat'],
        ]);

        /// redirect jika sukses menyimpan data
        return redirect()->route('category')
                        ->with('success', 'Kategory berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat = Category::find($id);

        return view('admin.category.edit', compact('cat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();

        $cat = Category::find($id);
        $cat->update($input);
        // DB::table('users')->where('id', $id)->delete();

        // $user->assignRole($request->input('users'));

        return redirect('/home/category')
                        ->with('success', 'Kategory berhasil di update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();

        return redirect('/home/category')
                        ->with('success', 'Kategory berhasil dihapus');
    }
}
