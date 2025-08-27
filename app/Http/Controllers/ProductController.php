<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
     public function index()
    {
        $products = session()->get('products', []);
        return view('products.index', compact('products'));
    }

    // Form tạo sản phẩm
    public function create()
    {
        return view('products.create');
    }

    // Lưu sản phẩm vào session
    public function store(Request $request)
    {
        $products = session()->get('products', []);

        // upload ảnh
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads', 'public');
        }

        $products[] = [
            'id' => uniqid(),
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imagePath,
        ];

        session()->put('products', $products);

        return redirect()->route('products.index');
    }

    // Form chỉnh sửa sản phẩm
    public function edit($id)
    {
        $products = session()->get('products', []);
        $product = collect($products)->firstWhere('id', $id);
        return view('products.edit', compact('product'));
    }

    // Cập nhật sản phẩm
    public function update(Request $request, $id)
    {
        $products = session()->get('products', []);

        foreach ($products as &$product) {
            if ($product['id'] === $id) {
                $product['name'] = $request->name;
                $product['description'] = $request->description;
                $product['price'] = $request->price;

                if ($request->hasFile('image')) {
                    $product['image'] = $request->file('image')->store('uploads', 'public');
                }
            }
        }

        session()->put('products', $products);

        return redirect()->route('products.index');
    }

    // Xóa sản phẩm
    public function destroy($id)
    {
        $products = session()->get('products', []);
        $products = array_filter($products, fn($p) => $p['id'] !== $id);
        session()->put('products', $products);

        return redirect()->route('products.index');
    }
}