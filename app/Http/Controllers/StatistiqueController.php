<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class StatistiqueController extends Controller
{
    public function index()
    {
        // Compter les utilisateurs par rôle
        $stats = [
            'agriculteurs' => User::where('role', 'agriculteur')->count(),
            'agronomes' => User::where('role', 'agronome')->count(),
            'transformateurs' => User::where('role', 'transformateur')->count(),
            'recycleurs' => User::where('role', 'recycleur')->count(),
            'fournisseurs' => User::where('role', 'fournisseur')->count(),
            'assistances' => User::where('role', 'assistance')->count(),
            'commercants' => User::where('role', 'commercant')->count(),
            'organisations' => User::where('role', 'organisation')->count(),
        ];

        // Total des utilisateurs
        $totalUsers = User::count();

        // Nouveaux inscrits cette semaine (7 derniers jours)
        $newUsersThisWeek = User::where('created_at', '>=', now()->subDays(7))->count();

        // Nouveaux inscrits le mois dernier (pour calculer la croissance)
        $newUsersLastMonth = User::whereBetween('created_at', [now()->subDays(60), now()->subDays(30)])->count();
        
        // Croissance en pourcentage (par rapport au mois précédent)
        if ($newUsersLastMonth > 0) {
            $growthPercentage = round((($newUsersThisWeek * 4) - $newUsersLastMonth) / $newUsersLastMonth * 100);
        } else {
            $growthPercentage = 0;
        }

        // Nombre de provinces actives (avec au moins un utilisateur)
        $activeProvinces = 0;

        // Objectif pour l'année prochaine (basé sur la croissance actuelle)
        $nextYearGoal = $growthPercentage > 0 ? $growthPercentage + rand(10, 20) : 25;

        // Pourcentages pour chaque rôle
        $rolePercentages = [];
        foreach ($stats as $key => $count) {
            $rolePercentages[$key] = $totalUsers > 0 ? round(($count / $totalUsers) * 100, 1) : 0;
        }

        // Labels et données pour le graphique
        $chartLabels = ['Agriculteurs', 'Agronomes', 'Transformation', 'Recyclage', 'Fournisseurs', 'Assistance', 'Marché', 'Organisations'];
        $chartData = [
            $stats['agriculteurs'],
            $stats['agronomes'],
            $stats['transformateurs'],
            $stats['recycleurs'],
            $stats['fournisseurs'],
            $stats['assistances'],
            $stats['commercants'],
            $stats['organisations'],
        ];

        // Récupérer tous les utilisateurs pour la liste
        $users = User::orderBy('created_at', 'desc')->paginate(15);

        return view('statistiques.index', compact(
            'stats', 
            'totalUsers', 
            'newUsersThisWeek',
            'growthPercentage',
            'activeProvinces',
            'nextYearGoal',
            'rolePercentages',
            'chartLabels', 
            'chartData', 
            'users'
        ));
    }

    // API pour la recherche AJAX
    public function search(Request $request)
    {
        $query = User::query();

        if ($request->filled('role') && $request->role != 'tous') {
            $query->where('role', $request->role);
        }

        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%')
                  ->orWhere('phone', 'like', '%' . $request->search . '%');
            });
        }

        $users = $query->orderBy('created_at', 'desc')->paginate(15);

        if ($request->ajax()) {
            return view('statistiques._users_table', compact('users'))->render();
        }

        return back();
    }
}
