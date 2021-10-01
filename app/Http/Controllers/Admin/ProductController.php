<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
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
        $cats = Category::all();

        return view('admin.product.create', compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'deskripsi_product' => '',
            'img_product' => 'required',
        ]);

        $nama = $request->nama_product;
        $desk = $request->deskripsi_product;
        $images = $request->img_product;
        $cat = $request->cat_product;
        $stock = $request->stock_product;
        foreach ($images as $image) {
            $image_new_name = time().$image->getClientOriginalName();
            $image->move('images', $image_new_name);
            $post = new Product();
            $post->nama_product = $nama;
            $post->deskripsi_product = $desk;
            $post->img_product = 'images/'.$image_new_name;
            $post->cat_product = $cat;
            $post->stock_product = $stock;
            $post->save();
        }
        Session::flash('success', 'Product disimpan');

        return redirect('/home/product')
                        ->with('success', 'Produk berhasil ditambahkan.');
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
        $prod = Product::find($id);
        $cats = Category::all();

        return view('admin.product.edit', compact('prod', 'cats'));
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
        // $input = $request->all();

        $prod = Product::find($id);
        if ($request->hasFile('img_product')) {
            $image = $request->img_product;
            $image_new_name = time().$image->getClientOriginalName();
            $image->move('images', $image_new_name);
            $prod->update([
                'nama_product' => $request['nama_product'],
                'deskrpsi_product' => $request['deskripsi_product'],
                'img_product' => 'images/'.$image_new_name,
                'cat_product' => $request['cat_product'],
                'stock_product' => $request['stock_product'],
            ]);
        } else {
            $prod->update([
                'nama_product' => $request['nama_product'],
                'deskrpsi_product' => $request['deskripsi_product'],
                'cat_product' => $request['cat_product'],
                'stock_product' => $request['stock_product'],
            ]);
        }

        return redirect('/home/product')
                        ->with('success', 'Produk berhasil di update!');
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
        Product::find($id)->delete();

        return redirect('/home/product')
                        ->with('success', 'Produk berhasil dihapus');
    }
}
