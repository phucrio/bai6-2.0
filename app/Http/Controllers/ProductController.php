<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all_products = Products::all(); // Lấy tất cả dữ liệu từ bảng products
        return view('products',compact('all_products'));
    }

    public function quanli()
    {
        $products = Products::paginate(12); // Lấy tất cả dữ liệu từ bảng products
        return view('products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }


    public function old2new()
    {
        $all_products = Products::orderBy('id', 'asc')->get();
        return view('products',compact('all_products'));
    }

    public function new2old()
    {
        $all_products = Products::orderBy('id', 'desc')->get();
        return view('products',compact('all_products'));
    }

    public function low2high()
    {
        $all_products = Products::orderBy('price', 'asc')->get();
        return view('products',compact('all_products'));
    }

    public function high2low()
    {
        $all_products = Products::orderBy('price', 'desc')->get();
        return view('products',compact('all_products'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'category' => 'required',
            'don_vi' => 'required',
            'kich_thuoc' => 'required',
            'mau_sac' => 'required',
            'img' => 'image|mimes:jpeg,png,jpg,gif',
            'price' => 'required|numeric',
            'ghi_chu' => 'required',

        ]);

        if ($request->hasFile('img')) {
            $imgPath = $request->file('img')->store('/', 'public');
            $data['img'] = $imgPath;
        }

        Products::create($data);

        return redirect()->route('products.index')->with('success', 'Sản phẩm đã được thêm thành công.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Products::find($id);

    // Chuyển đến trang hiển thị chi tiết sản phẩm và truyền dữ liệu sản phẩm
        return view('full-product', compact('product'));
    }

    public function showcate(string $category)
    {
        $all_products = Products::where('category', $category)->get(); // Lấy sản phẩm theo danh mục

        return view('products', compact('all_products'));
    }

    public function search(Request $request)
    {
        $searchQuery = $request->input('searchQuery');

        $all_products = Products::where('name', 'like', '%' . $searchQuery . '%')->get();

        return view('products', compact('all_products'));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Lấy sản phẩm cần chỉnh sửa từ cơ sở dữ liệu
        $product = Products::find($id);

        if (!$product) {
            return redirect()->route('products.index')->with('error', 'Không tìm thấy sản phẩm để chỉnh sửa.');
        }

        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'don_vi' => 'required',
            'kich_thuoc' => 'required',
            'mau_sac' => 'required',
            'img' => 'image|mimes:jpeg,png,jpg,gif',
            'price' => 'required|numeric',
            'ghi_chu' => 'required',
        ]);

        $product = Products::find($id);

        if (!$product) {
            return redirect()->route('products.index')->with('error', 'Không tìm thấy sản phẩm để cập nhật.');
        }

        $product->name = $request->input('name');
        $product->category = $request->input('category');
        $product->don_vi = $request->input('don_vi');
        $product->kich_thuoc = $request->input('kich_thuoc');
        $product->mau_sac = $request->input('mau_sac');
        $product->price = $request->input('price');
        $product->ghi_chu = $request->input('ghi_chu');

        if ($request->hasFile('img')) {
            $imgPath = $request->file('img')->store('product_images', 'public');
            $product->img = $imgPath;
        }

        $product->save();

        return redirect()->route('products.index')->with('success', 'Sản phẩm đã được cập nhật thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Products::find($id);

        if (!$product) {
            return redirect()->route('products.index')->with('error', 'Không tìm thấy sản phẩm để xóa.');
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Sản phẩm đã được xóa thành công.');
        }
}
