<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Models\User;

class HomeController extends Controller
{
    //
    public function index(){
        return Inertia::render('Welcome', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
        ]);
    }

    public function dashboard(){
        if( auth()->user()->role ==  User::Roles['Admin'] ) {
            return redirect()->route('admin.dashboard');
        }
        return Inertia::render('Dashboard');
    }
}
