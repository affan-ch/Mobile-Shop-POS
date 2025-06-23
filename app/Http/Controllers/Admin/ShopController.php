<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\ShopAdmin;

class ShopController extends Controller
{
    public function index()
    {
        $rec = Auth::guard('admin')->user();
        $Shops = auth()->guard('admin')->user()->shops;



        return view('admin.shops', ['rec' => $rec, 'shops' => $Shops]);

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
        $admin->blocked_by_admin = $request->status;
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
        $admin->password = Hash::make($request->new_password);
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

}
