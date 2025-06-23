<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

use App\Models\ShopAdmin;
use Illuminate\Support\Facades\Validator;

class InventoryController extends Controller
{
    public function index($shop_id)
    {
        $rec = Auth::guard('admin')->user();
        $isAuthorized = ShopAdmin::where('admin_id', $rec->id)
                             ->where('shop_id', $shop_id)
                             ->exists();

        if (!$isAuthorized) {
            return redirect()->route('admin.shops') // Adjust this route name as needed
                         ->with('error' , 'Unauthorized access or shop does not exist.');
        }
        $products = Product::where('shop_id', $shop_id)->get();

        return view('admin.inventory', ['rec' => $rec, 'products' => $products, 'shop_id' => $shop_id]);

    }
    public function storeProduct(Request $request)
    {
        // Define validation rules for updating the password
        $rules = [
            'id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'nullable|string',
            'warranty_is_monthly' => 'required|boolean',
            'warrenty' => 'nullable|integer|min:0',
            'qty' => 'required|integer|min:0',
            'sold_qty' => 'required|integer|min:0',
        ];

        // Create a validator instance
        $validator = Validator::make($request->all(), $rules);

        // Check if validation fails
        if ($validator->fails()) {
            // Redirect back with error messages
            return redirect()->back()->with('error', $validator->errors()->first());
        }

        $shop_id = $request->id;
        // Handle image upload if available
        $imagePath = null;
        if ($request->hasFile('image')) {
            // Get the original file name without extension
            $originalName = pathinfo($request->file('image')->getClientOriginalName(), PATHINFO_FILENAME);

            // Generate a unique file name by appending a timestamp or uniqid
            $uniqueName = $originalName . '_' . uniqid() . '.' . $request->file('image')->getClientOriginalExtension();

            // Move the file to public/products/ with the unique name
            $imagePath = $request->file('image')->move(public_path('products'), $uniqueName);
        }

        // Create a new product and save it to the database
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->shop_id = $shop_id;
        $product->description = $request->description;
        $product->warranty_is_monthly = $request->warranty_is_monthly;
        $product->warrenty = $request->warrenty;
        $product->qty = $request->qty;
        $product->sold_qty = $request->sold_qty;
        if ($imagePath) {
            $product->image = $uniqueName;
        }
        $product->save();

        $rec = Auth::guard('admin')->user();
        $products = Product::where('shop_id', $shop_id)->get();

        return redirect()->route('inventory.show', ['shop_id' => $shop_id])->with('success', 'Product added successfully.');
    }
    public function delete(Request $request)
    {
        // Define validation rules for deleting the product
        $rules = [
            'id' => 'required|exists:products,id',
        ];

        // Define custom error messages
        $messages = [
            'id.required' => 'The ID field is required.',
            'id.exists' => 'The specified ID does not exist.',
        ];

        // Create a validator instance
        $validator = Validator::make($request->all(), $rules, $messages);

        // Check if validation fails
        if ($validator->fails()) {
            // Redirect back with error messages
            return redirect()->back()->with('error', $validator->errors()->first());
        }

        $id = $request->input('id');

        // Find the product by ID
        $product = Product::find($id);

        if ($product) {
            // Check if the product has an image and delete it if it exists
            if ($product->image) {
                $imagePath = public_path('products/' . $product->image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }

            // Delete the product record
            $product->delete();

            // Return a response (you can customize this response as needed)
            return redirect()->back()->with('success', 'Product deleted successfully.');
        } else {
            // Record not found
            return redirect()->back()->with('error', 'Product not found.');
        }
    }
    public function updateProduct(Request $request)
    {
        // Define validation rules for deleting the product
        $rules = [
            'id' => 'required|exists:products,id',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'nullable|string',
            'warranty_is_monthly' => 'required|boolean',
            'warrenty' => 'nullable|integer|min:0',
            'qty' => 'required|integer|min:0',
            'sold_qty' => 'required|integer|min:0',
        ];

        // Define custom error messages
        $messages = [
            'id.required' => 'The ID field is required.',
            'id.exists' => 'The specified ID does not exist.',
        ];

        // Create a validator instance
        $validator = Validator::make($request->all(), $rules, $messages);

        // Check if validation fails
        if ($validator->fails()) {
            // Redirect back with error messages
            return redirect()->back()->with('error', $validator->errors()->first());
        }
        $product_id = $request->id;
        $product = Product::find($product_id);
        if(!$product){
            return redirect()->back()->with('error', 'Product not found.');
        }

        // Update product attributes
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->warranty_is_monthly = $request->input('warranty_is_monthly');
        $product->warrenty = $request->input('warrenty');
        $product->qty = $request->input('qty');
        $product->sold_qty = $request->input('sold_qty');

        // Handle image upload
        if ($request->hasFile('image')) {
            if ($product->image) {
                $imagePath = public_path('products/' . $product->image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
            $image = $request->file('image');
            $imagePath = $image->store('products', 'public');
            $product->image = $imagePath;
        }

        $product->save();

        return redirect()->back()->with('success', 'Product updated Successfully.');
    }


}
