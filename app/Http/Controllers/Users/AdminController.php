<?php

namespace App\Http\Controllers\Users;

use App\Models\Users\Admin;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{

    private $admin;

    public function __construct(Admin $admin)
    {
        $this->admin = $admin;
    }

    public function showDashboard()
    {
        return view('admin.dashboard');
    }

    public function index()
    {
        $admins = $this->admin->latest()->paginate(5);

        return view('admin.management.managementUser')
                ->with('admins', $admins);
    }

    // create users
    public function create()
    {
        $admins = $this->admin->all();

        return view('admin.management.modal.create')
                ->with('admins', $admins);

    }

    // store() - save admin user on the db
    public function store(Request $request)
    {
        DB::beginTransaction();
        
        $request->validate([
            'first_name'   => 'required|string|max:255',
            'last_name'    => 'required|string|max:255',
            'email'        => 'required|string|max:255|unique:admin',
            'phone_number' => 'required|string|max:255',
            'password'     => 'required|string|max:255',
            'role'         => 'required|string|max:255'
        ]);

        $admin = new Admin();
        $admin->first_name   = $request->input('first_name');
        $admin->last_name    = $request->input('last_name');
        $admin->email        = $request->input('email');
        $admin->phone_number = $request->input('phone_number');
        $admin->password     = Hash::make($request->input('password'));
        $admin->role         = $request->input('role');
        
        try {
            $admin->save();
            DB::commit();
            return redirect()->back()->with('success', 'Admin user created successfully.');

        } catch (\Exception $e) {
            Log::error('Error saving admin user: ' . $e->getMessage());
        }
    }

    // edit() - view the Edit page
    public function edit()
    {
        $admin = $this->admin->findOrFail(Admin::admin()->id);
        return view('admin.management.modal.edit')
                ->with('admins', $admins);
    }

    // update() - edit admin information
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        
        // Validate the incoming request data (optional)
        $request->validate([
            'first_name'   => 'required|string|max:255',
            'last_name'    => 'required|string|max:255',
            'email'        => ['required', 'string','email','max:255',Rule::unique('admin')->ignore($id),],
            'phone_number' => 'required|string|max:255',
            'password'     => 'required|string|max:255',
            'role'         => 'required|string|max:255'
        ]);

        try {
            // Find the admin record by its ID
            $admin = Admin::findOrFail($id);
            
            // Update the admin record with the new data
            $admin->first_name   = $request->input('first_name');
            $admin->last_name    = $request->input('last_name');
            $admin->email        = $request->input('email');
            $admin->phone_number = $request->input('phone_number');
            $admin->password     = Hash::make($request->input('password'));
            $admin->role         = $request->input('role');
            
            // Save the changes
            $admin->save();

            // Commit the transaction
            DB::commit();

            // Redirect back with a success message
            Log::info('Admin user updated successfully.');

            return redirect()->back()->with('success', 'Admin user updated successfully.');
        } catch (\Exception $e) {
            // Rollback the transaction
            // DB::rollback();
            
            // Log the error
            Log::error('Error updating admin user: ' . $e->getMessage());
            
            // Redirect back with an error message
            return back()->withInput()->withErrors(['error' => 'Error updating user. Please try again.']);
        }
    }

    // destroy() - Delete admin user
    public function destroy($id)
    {
        $this->admin->destroy($id);

        return redirect()->back();
    }



}
