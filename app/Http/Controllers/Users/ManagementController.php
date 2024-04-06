<?php

namespace App\Http\Controllers\Users;

use App\Models\Users\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class ManagementController extends Controller
{
    private $admin;

    public function __construct(Admin $admin)
    {
        $this->admin = $admin;
    }

    public function index()
    {
        $admins = $this->admin->all();

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
        $admin->password     = $request->input('password');
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
    public function update(Request $request)
    {
        DB::beginTransaction();
        // dd('Store');
        $request->validate([
            'new_first_name'   => 'required|string|max:255',
            'new_last_name'    => 'required|string|max:255',
            'new_email'        => 'required|string|max:255|unique:admin',
            'new_phone_number' => 'required|string|max:255',
            'new_password'     => 'required|string|max:255',
            'new_role'         => 'required|string|max:255'
        ]);

        // $admin = new Admin();
        $admin               = $this->admin->findOrFail($id);
        $admin->first_name   = $request->input('new_first_name');
        $admin->last_name    = $request->input('new_last_name');
        $admin->email        = $request->input('new_email');
        $admin->phone_number = $request->input('new_phone_number');
        $admin->password     = $request->input('new_password');
        $admin->role         = $request->input('new_role');
        // dd($request->all());
        // $admin->save();

        // return redirect()->back()->with('success', 'Admin user created successfully.');
        
        try {
            $admin->save();
            DB::commit();
            return redirect()->back()->with('success', 'Admin user created successfully.');

        } catch (\Exception $e) {
            Log::error('Error saving admin user: ' . $e->getMessage());
            // return back()->withInput()->withErrors(['error' => 'Error saving user. Please try again.']);
        }
    }

}
