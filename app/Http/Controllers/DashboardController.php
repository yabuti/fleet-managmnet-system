<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function admin()
    {
        return view('dashboard.admin.dashboard');
    }

    public function driver()
    {
        return view('dashboard.driver.dashboard');
    }

    public function property()
    {
        return view('dashboard.property.dashboard');
    }

    public function requester()
    {
        return view('dashboard.requester.dashboard');
    }
}
