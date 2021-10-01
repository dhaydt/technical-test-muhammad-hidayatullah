<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest('id', 'DESC')->paginate(10);

        return view('admin.users.index', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function category()
    {
        $cats = Category::latest('id', 'DESC')->paginate(10);

        return view('admin.category.index', compact('cats'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function product()
    {
        $prods = Product::latest('id', 'DESC')->paginate(10);

        return view('admin.product.index', compact('prods'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function transaction()
    {
        return view('admin.transaction.index');
    }

    public function history()
    {
        return view('admin.history.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_depan' => ['required', 'string', 'max:255'],
            'nama_belakang' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        /// insert setiap request dari form ke dalam database via model
        /// jika menggunakan metode ini, maka nama field dan nama form harus sama
        User::create([
            'nama_depan' => $request['nama_depan'],
            'nama_belakang' => $request['nama_belakang'],
            'email' => $request['email'],
            'tgl_lahir' => $request['tgl_lahir'],
            'kelamin' => $request['kelamin'],
            'password' => Hash::make($request['password']),
        ]);

        /// redirect jika sukses menyimpan data
        return redirect()->route('user')
                        ->with('success', 'User berhasil ditambahkan!');
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
        $user = User::find($id);

        return view('admin.users.edit', compact('user'));
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

        $user = User::find($id);
        $user->update($input);
        // DB::table('users')->where('id', $id)->delete();

        // $user->assignRole($request->input('users'));

        return redirect('/home/user')
                        ->with('success', 'User berhasil di update!');
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
        User::find($id)->delete();

        return redirect('/home')
                        ->with('success', 'User berhasil dihapus');
    }
}
