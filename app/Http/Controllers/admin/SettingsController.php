<?php 
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        // Your logic to show settings
        return view('admin.settings.index'); // Adjust view path as needed
    }
}
