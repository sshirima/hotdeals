<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserManagerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * @return $this
     */
    public function displayUsers()
    {
        $users = DB::table('users')->select('id', 'first_name', 'last_name', 'email', 'created_at')->get();
        return view('users.online.index')->with(['admin' => auth()->user(), 'users' => $users]);
    }

    /**
     * @return $this
     */
    public function displaySellers()
    {
        $sellers = DB::table('sellers')->select('id', 'first_name', 'last_name', 'phonenumber', 'email', 'created_at')->get();
        return view('users.sellers.index')->with(['admin' => auth()->user(), 'sellers' => $sellers]);
    }

    /**
     * @return $this
     */
    public function displayAdmins()
    {
        $admin = auth()->user();
        $admins = DB::table('admins')->select('id', 'first_name', 'last_name', 'email', 'created_at')->where('id', '!=', $admin->id)->get();
        return view('users.admins.index')->with(['admin' => $admin, 'admins' => $admins]);
    }

    public function destroyAdmin($id)
    {

    }

    public function createAdmin()
    {

    }

    public function storeAdmin()
    {

    }
}
