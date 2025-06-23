<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\ShopAdmin;

class ShopController extends Controller
{
    public function index()
    {



        $rec = Auth::guard('superadmin')->user();
        $Shops = User::get()->all();
        $Admins = Admin::get()->all();



        return view('superadmin.shops', ['rec' => $rec, 'shops' => $Shops, 'admins' => $Admins]);

    }
    public function store(Request $request)
    {
        // Define custom validation rules
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ];

        // Define custom error messages
        $messages = [
            'name.required' => 'The Name field is required.',
            'email.required' => 'The Email field is required.',
            'email.email' => 'The Email must be a valid email address.',
            'email.unique' => 'The Email is already registered.',
            'password.required' => 'The Password field is required.',
            'password.min' => 'The Password must be at least 8 characters.',
            'password.confirmed' => 'The Password confirmation does not match.',
        ];

        // Create a validator instance
        $validator = Validator::make($request->all(), $rules, $messages);

        // Check if validation fails
        if ($validator->fails()) {
            // Redirect back with error messages
            return redirect()->back()->with('error', $validator->errors()->first());
        }

        // Create a new admin
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Shop added successfully!');
    }

    public function edit(Request $request)
    {
        // Define validation rules for editing user details
        $rules = [
            'id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $request->input('id'),
            'status' => 'required',
        ];

        // Define custom error messages
        $messages = [
            'id.required' => 'The ID field is required.',
            'id.exists' => 'The specified ID does not exist.',
            'name.required' => 'The Name field is required.',
            'email.required' => 'The Email field is required.',
            'email.email' => 'The Email must be a valid email address.',
            'email.unique' => 'The Email is already registered.',
            'status.required' => 'The Status field is required.',
        ];

        // Create a validator instance
        $validator = Validator::make($request->all(), $rules, $messages);

        // Check if validation fails
        if ($validator->fails()) {
            // Redirect back with error messages
            return redirect()->back()->with('error', $validator->errors()->first());
        }

        $id = $request->input('id');
        // Find the admin and update details
        $admin = User::find($id);
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->status = $request->status;
        $admin->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'User details updated successfully!');
    }
    public function updatePassword(Request $request)
    {
        // Define validation rules for updating the password
        $rules = [
            'id' => 'required|exists:users,id',
            'password' => 'required|string|min:8|confirmed',
        ];

        // Define custom error messages
        $messages = [
            'id.required' => 'The ID field is required.',
            'id.exists' => 'The specified ID does not exist.',
            'password.required' => 'The New Password field is required.',
            'password.min' => 'The New Password must be at least 8 characters.',
            'password.confirmed' => 'The New Password confirmation does not match.',
        ];

        // Create a validator instance
        $validator = Validator::make($request->all(), $rules, $messages);

        // Check if validation fails
        if ($validator->fails()) {
            // Redirect back with error messages
            return redirect()->back()->with('error', $validator->errors()->first());
        }

        $id = $request->input('id');

        // Find the admin
        $admin = User::find($id);

        // Update the password
        $admin->password = $request->new_password;
        $admin->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Password updated successfully!');
    }

    public function delete(Request $request)
    {
        // Define validation rules for updating the password
        $rules = [
            'id' => 'required|exists:users,id',
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

        $admin = User::find($id);

        if ($admin) {
            // Delete the record
            $admin->delete();

            // Return a response (you can customize this response as needed)
            return redirect()->back()->with('success', 'Shop deleted successfully.');
        } else {
            // Record not found
            return redirect()->back()->with('error', 'Shop dont found');
        }
    }



    // Add a shop admin
    public function addShopAdmin(Request $request)
    {
        $rules = [
            'shop_id' => 'required|exists:users,id',
            'admin_id' => 'required|exists:admins,id',
        ];

        // Define custom error messages
        $messages = [
            'shop_id.required' => 'The ID field is required.',
            'shop_id.exists' => 'The specified shop ID does not exist.',
            'admin_id.required' => 'The ID field is required.',
            'admin_id.exists' => 'The specified admin ID does not exist.',
        ];

        // Create a validator instance
        $validator = Validator::make($request->all(), $rules, $messages);

        // Check if validation fails
        if ($validator->fails()) {
            // Redirect back with error messages
            return redirect()->back()->with('error', $validator->errors()->first());
        }

        // Check if the ShopAdmin already exists
        $existingShopAdmin = ShopAdmin::where('shop_id', $request->input('shop_id'))
            ->where('admin_id', $request->input('admin_id'))
            ->first();

        if ($existingShopAdmin) {
            // Redirect back with an error message if it already exists
            return redirect()->back()->with('error', 'The shop admin already exists.');
        }

        // Create a new ShopAdmin
        ShopAdmin::create([
            'shop_id' => $request->input('shop_id'),
            'admin_id' => $request->input('admin_id'),
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Shop admin added successfully.');
    }


    // Delete a shop admin
    public function deleteShopAdmin(Request $request)
    {
        $rules = [
            'shop_id' => 'required|exists:users,id',
            'admin_id' => 'required|exists:admins,id',
        ];

        // Define custom error messages
        $messages = [
            'shop_id.required' => 'The ID field is required.',
            'shop_id.exists' => 'The specified ID does not exist.',
            'admin_id.required' => 'The ID field is required.',
            'admin_id.exists' => 'The specified ID does not exist.',
        ];

        // Create a validator instance
        $validator = Validator::make($request->all(), $rules, $messages);

        // Check if validation fails
        if ($validator->fails()) {
            // Redirect back with error messages
            return redirect()->back()->with('error', $validator->errors()->first());
        }

        // Find and delete the ShopAdmin record
        $shopAdmin = ShopAdmin::where('shop_id', $request->input('shop_id'))
            ->where('admin_id', $request->input('admin_id'))
            ->first();

        if ($shopAdmin) {
            $shopAdmin->delete();

            return redirect()->back()->with('success', 'shop admin deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Shop admin not found.');
        }
    }

    public function viewAdmins($shopId)
    {
        $admins = ShopAdmin::where('shop_id', $shopId)
            ->with('admin') // Assuming 'admin' is the relationship name in ShopAdmin
            ->get()
            ->map(function ($shopAdmin) {
                return [
                    'id' => $shopAdmin->admin->id,
                    'email' => $shopAdmin->admin->email,
                ];
            });

        return response()->json(['admins' => $admins]);
    }
}
