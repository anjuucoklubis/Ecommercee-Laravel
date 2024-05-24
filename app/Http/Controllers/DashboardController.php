<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function getViewDashboard()
    {
        $totalProducts = DB::table('products')->count();
        $product = DB::table('products')->distinct()->get(['name']);
        $user = DB::table('users')->distinct()->get(['name']);
        $role = DB::table('roles')->distinct()->get(['roleName']);
        $catproduct = DB::table('category_products')->distinct()->get(['name']);

        $title = 'Online Shop'; // Set the title here

        return view('modules.back.dashboard.main', compact('title', 'product', 'catproduct', 'user', 'role'));
    }
}
