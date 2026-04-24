<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();
        $role = $user->role;

        $viewPath = "dashboard.{$role}"; // verifier que la vue  correspondante

        if (view()->exists($viewPath)) {
            return view($viewPath); // si la vue existe , l'afficher 
        }

        return view("logout"); // sinon rediriger vers deconnexion    
    }
}
