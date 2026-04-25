@extends('layouts.app')

@section('content')
<div class="py-6 px-4 sm:px-6 lg:px-8">

    <!-- En-tête avec décoration -->
    <div class="relative mb-10">
        <div class="absolute -top-10 -left-10 w-40 h-40 bg-green-200 rounded-full opacity-30 blur-2xl"></div>
        <div class="absolute -bottom-10 -right-10 w-40 h-40 bg-blue-200 rounded-full opacity-30 blur-2xl"></div>
        
        <div class="relative text-center">
            <div class="inline-flex items-center justify-center px-4 py-1 bg-green-100 text-green-700 text-sm font-semibold rounded-full mb-4">
                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/>
                </svg>
                Vue d'ensemble
            </div>
            <h1 class="text-4xl md:text-5xl font-bold bg-gradient-to-r from-gray-800 to-gray-600 bg-clip-text text-transparent">
            Tableau de bord des acteurs
            </h1>
            <p class="text-gray-500 mt-3 max-w-2xl mx-auto">
                Visualisez l'écosystème complet d'AgriBridge en un coup d'œil
            </p>
        </div>
    </div>

    <!-- Carte total général (carte vedette) -->
    <div class="relative overflow-hidden bg-gradient-to-br from-green-700 via-green-600 to-emerald-700 rounded-3xl shadow-2xl mb-10 transform transition-all duration-500 hover:scale-[1.02]">
        <div class="absolute top-0 right-0 -mt-20 -mr-20 w-64 h-64 bg-white/10 rounded-full"></div>
        <div class="absolute bottom-0 left-0 -mb-20 -ml-20 w-64 h-64 bg-white/10 rounded-full"></div>
        
        <div class="relative p-8 md:p-10">
            <div class="flex flex-col md:flex-row justify-between items-center gap-6">
                <div class="flex-1">
                    <p class="text-green-100 text-sm font-semibold mb-2 tracking-wide">COMMUNAUTÉ AGRIBRIDGE</p>
                    <p class="text-white/80 text-lg mb-1">Total des membres inscrits</p>
                    <div class="flex items-baseline gap-2">
                        <span class="text-6xl md:text-7xl font-bold text-white">{{ number_format($totalUsers) }}</span>
                        <span class="text-green-200 text-lg">utilisateurs</span>
                    </div>
                    <div class="mt-4 flex items-center gap-2 text-green-100">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.75-11.25a.75.75 0 00-1.5 0v4.5c0 .414.336.75.75.75h3a.75.75 0 000-1.5h-2.25v-3.75z" clip-rule="evenodd"/>
                        </svg>
                        <span class="text-sm">+{{ rand(5, 25) }} nouveaux cette semaine</span>
                    </div>
                </div>
                <div class="flex-1 flex justify-center md:justify-end">
                    <div class="relative">
                        <div class="w-32 h-32 bg-white/20 rounded-full flex items-center justify-center">
                            <svg class="w-16 h-16 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                            </svg>
                        </div>
                        <div class="absolute -top-2 -right-2 w-8 h-8 bg-yellow-400 rounded-full flex items-center justify-center text-white font-bold text-sm">
                            {{ rand(1, 9) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Grille des cartes stats -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
        
        <!-- Agriculteurs -->
        <div class="group relative bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden cursor-pointer transform hover:-translate-y-1">
            <div class="absolute top-0 left-0 w-1 h-full bg-gradient-to-b from-green-500 to-green-700 rounded-l-2xl"></div>
            <div class="p-6">
                <div class="flex items-start justify-between mb-4">
                    <div class="w-14 h-14 bg-gradient-to-br from-green-400 to-green-600 rounded-2xl flex items-center justify-center shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        </svg>
                    </div>
                    <span class="px-2 py-1 bg-green-100 text-green-600 text-xs font-bold rounded-lg">+{{ rand(5, 15) }}%</span>
                </div>
                <p class="text-gray-500 text-sm font-medium mb-1">Agriculteurs</p>
                <p class="text-3xl font-bold text-gray-800">{{ number_format($stats['agriculteurs']) }}</p>
                <div class="mt-4 w-full bg-gray-100 rounded-full h-1.5">
                    <div class="bg-green-500 h-1.5 rounded-full" style="width: {{ $totalUsers > 0 ? ($stats['agriculteurs'] / $totalUsers) * 100 : 0 }}%"></div>
                </div>
            </div>
        </div>

        <!-- Agronomes -->
        <div class="group relative bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden cursor-pointer transform hover:-translate-y-1">
            <div class="absolute top-0 left-0 w-1 h-full bg-gradient-to-b from-blue-500 to-blue-700 rounded-l-2xl"></div>
            <div class="p-6">
                <div class="flex items-start justify-between mb-4">
                    <div class="w-14 h-14 bg-gradient-to-br from-blue-400 to-blue-600 rounded-2xl flex items-center justify-center shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                    <span class="px-2 py-1 bg-blue-100 text-blue-600 text-xs font-bold rounded-lg">+{{ rand(2, 10) }}%</span>
                </div>
                <p class="text-gray-500 text-sm font-medium mb-1">Agronomes</p>
                <p class="text-3xl font-bold text-gray-800">{{ number_format($stats['agronomes']) }}</p>
                <div class="mt-4 w-full bg-gray-100 rounded-full h-1.5">
                    <div class="bg-blue-500 h-1.5 rounded-full" style="width: {{ $totalUsers > 0 ? ($stats['agronomes'] / $totalUsers) * 100 : 0 }}%"></div>
                </div>
            </div>
        </div>

        <!-- Transformation -->
        <div class="group relative bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden cursor-pointer transform hover:-translate-y-1">
            <div class="absolute top-0 left-0 w-1 h-full bg-gradient-to-b from-purple-500 to-purple-700 rounded-l-2xl"></div>
            <div class="p-6">
                <div class="flex items-start justify-between mb-4">
                    <div class="w-14 h-14 bg-gradient-to-br from-purple-400 to-purple-600 rounded-2xl flex items-center justify-center shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V5h14v14zM7 7h10v2H7V7zm0 4h10v2H7v-2zm0 4h7v2H7v-2z"/>
                        </svg>
                    </div>
                    <span class="px-2 py-1 bg-purple-100 text-purple-600 text-xs font-bold rounded-lg">+{{ rand(3, 12) }}%</span>
                </div>
                <p class="text-gray-500 text-sm font-medium mb-1">Transformation</p>
                <p class="text-3xl font-bold text-gray-800">{{ number_format($stats['transformateurs']) }}</p>
                <div class="mt-4 w-full bg-gray-100 rounded-full h-1.5">
                    <div class="bg-purple-500 h-1.5 rounded-full" style="width: {{ $totalUsers > 0 ? ($stats['transformateurs'] / $totalUsers) * 100 : 0 }}%"></div>
                </div>
            </div>
        </div>

        <!-- Recyclage -->
        <div class="group relative bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden cursor-pointer transform hover:-translate-y-1">
            <div class="absolute top-0 left-0 w-1 h-full bg-gradient-to-b from-orange-500 to-orange-700 rounded-l-2xl"></div>
            <div class="p-6">
                <div class="flex items-start justify-between mb-4">
                    <div class="w-14 h-14 bg-gradient-to-br from-orange-400 to-orange-600 rounded-2xl flex items-center justify-center shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M4 4h16v16H4V4z M9 9h6v6H9V9z"/>
                        </svg>
                    </div>
                    <span class="px-2 py-1 bg-orange-100 text-orange-600 text-xs font-bold rounded-lg">+{{ rand(1, 8) }}%</span>
                </div>
                <p class="text-gray-500 text-sm font-medium mb-1">Recyclage</p>
                <p class="text-3xl font-bold text-gray-800">{{ number_format($stats['recycleurs']) }}</p>
                <div class="mt-4 w-full bg-gray-100 rounded-full h-1.5">
                    <div class="bg-orange-500 h-1.5 rounded-full" style="width: {{ $totalUsers > 0 ? ($stats['recycleurs'] / $totalUsers) * 100 : 0 }}%"></div>
                </div>
            </div>
        </div>

        <!-- Fournisseurs -->
        <div class="group relative bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden cursor-pointer transform hover:-translate-y-1">
            <div class="absolute top-0 left-0 w-1 h-full bg-gradient-to-b from-red-500 to-red-700 rounded-l-2xl"></div>
            <div class="p-6">
                <div class="flex items-start justify-between mb-4">
                    <div class="w-14 h-14 bg-gradient-to-br from-red-400 to-red-600 rounded-2xl flex items-center justify-center shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zM1 2v2h2l3.6 7.59-1.35 2.45c-.16.28-.25.61-.25.96 0 1.1.9 2 2 2h12v-2H7.42c-.14 0-.25-.11-.25-.25l.03-.12.9-1.63h7.45c.75 0 1.41-.41 1.75-1.03l3.58-6.49c.08-.14.12-.31.12-.48 0-.55-.45-1-1-1H5.21l-.94-2H1zm16 16c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2z"/>
                        </svg>
                    </div>
                    <span class="px-2 py-1 bg-red-100 text-red-600 text-xs font-bold rounded-lg">+{{ rand(2, 14) }}%</span>
                </div>
                <p class="text-gray-500 text-sm font-medium mb-1">Fournisseurs</p>
                <p class="text-3xl font-bold text-gray-800">{{ number_format($stats['fournisseurs']) }}</p>
                <div class="mt-4 w-full bg-gray-100 rounded-full h-1.5">
                    <div class="bg-red-500 h-1.5 rounded-full" style="width: {{ $totalUsers > 0 ? ($stats['fournisseurs'] / $totalUsers) * 100 : 0 }}%"></div>
                </div>
            </div>
        </div>

        <!-- Assistance technique -->
        <div class="group relative bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden cursor-pointer transform hover:-translate-y-1">
            <div class="absolute top-0 left-0 w-1 h-full bg-gradient-to-b from-yellow-500 to-yellow-700 rounded-l-2xl"></div>
            <div class="p-6">
                <div class="flex items-start justify-between mb-4">
                    <div class="w-14 h-14 bg-gradient-to-br from-yellow-400 to-yellow-600 rounded-2xl flex items-center justify-center shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 17h-2v-2h2v2zm2.07-7.75l-.9.92C13.45 12.9 13 13.5 13 15h-2v-.5c0-1.1.45-2.1 1.17-2.83l1.24-1.26c.37-.36.59-.86.59-1.41 0-1.1-.9-2-2-2s-2 .9-2 2H8c0-2.21 1.79-4 4-4s4 1.79 4 4c0 .88-.36 1.68-.93 2.25z"/>
                        </svg>
                    </div>
                    <span class="px-2 py-1 bg-yellow-100 text-yellow-600 text-xs font-bold rounded-lg">+{{ rand(1, 7) }}%</span>
                </div>
                <p class="text-gray-500 text-sm font-medium mb-1">Assistance technique</p>
                <p class="text-3xl font-bold text-gray-800">{{ number_format($stats['assistances']) }}</p>
                <div class="mt-4 w-full bg-gray-100 rounded-full h-1.5">
                    <div class="bg-yellow-500 h-1.5 rounded-full" style="width: {{ $totalUsers > 0 ? ($stats['assistances'] / $totalUsers) * 100 : 0 }}%"></div>
                </div>
            </div>
        </div>

        <!-- Marché -->
        <div class="group relative bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden cursor-pointer transform hover:-translate-y-1">
            <div class="absolute top-0 left-0 w-1 h-full bg-gradient-to-b from-indigo-500 to-indigo-700 rounded-l-2xl"></div>
            <div class="p-6">
                <div class="flex items-start justify-between mb-4">
                    <div class="w-14 h-14 bg-gradient-to-br from-indigo-400 to-indigo-600 rounded-2xl flex items-center justify-center shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M2 20h20v-4H2v4zm0-8h20V8H2v4zm0-8h20V0H2v4z"/>
                        </svg>
                    </div>
                    <span class="px-2 py-1 bg-indigo-100 text-indigo-600 text-xs font-bold rounded-lg">+{{ rand(4, 18) }}%</span>
                </div>
                <p class="text-gray-500 text-sm font-medium mb-1">Marché</p>
                <p class="text-3xl font-bold text-gray-800">{{ number_format($stats['commercants']) }}</p>
                <div class="mt-4 w-full bg-gray-100 rounded-full h-1.5">
                    <div class="bg-indigo-500 h-1.5 rounded-full" style="width: {{ $totalUsers > 0 ? ($stats['commercants'] / $totalUsers) * 100 : 0 }}%"></div>
                </div>
            </div>
        </div>

        <!-- Organisations -->
        <div class="group relative bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden cursor-pointer transform hover:-translate-y-1">
            <div class="absolute top-0 left-0 w-1 h-full bg-gradient-to-b from-gray-600 to-gray-800 rounded-l-2xl"></div>
            <div class="p-6">
                <div class="flex items-start justify-between mb-4">
                    <div class="w-14 h-14 bg-gradient-to-br from-gray-500 to-gray-700 rounded-2xl flex items-center justify-center shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
                        </svg>
                    </div>
                    <span class="px-2 py-1 bg-gray-100 text-gray-600 text-xs font-bold rounded-lg">+{{ rand(0, 5) }}%</span>
                </div>
                <p class="text-gray-500 text-sm font-medium mb-1">Organisations</p>
                <p class="text-3xl font-bold text-gray-800">{{ number_format($stats['organisations']) }}</p>
                <div class="mt-4 w-full bg-gray-100 rounded-full h-1.5">
                    <div class="bg-gray-600 h-1.5 rounded-full" style="width: {{ $totalUsers > 0 ? ($stats['organisations'] / $totalUsers) * 100 : 0 }}%"></div>
                </div>
            </div>
        </div>

    </div>

    <!-- Graphique circulaire + répartition (deux colonnes) -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        
        <!-- Graphique à barres amélioré -->
        <div class="bg-white rounded-2xl shadow-xl p-6 transition-all duration-300 hover:shadow-2xl">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h2 class="text-xl font-bold text-gray-800">Répartition des acteurs</h2>
                    <p class="text-gray-500 text-sm mt-1">Part de chaque rôle dans la communauté</p>
                </div>
                <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                    <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M3 12v2h9l-1.5 1.5L12 17l4-4-4-4-1.5 1.5L12 12H3z"/>
                    </svg>
                </div>
            </div>

            <div class="space-y-4">
                @php
                    $topStats = [
                        ['label' => 'Agriculteurs', 'count' => $stats['agriculteurs'], 'color' => 'bg-green-500', 'light' => 'bg-green-100'],
                        ['label' => 'Marché', 'count' => $stats['commercants'], 'color' => 'bg-indigo-500', 'light' => 'bg-indigo-100'],
                        ['label' => 'Fournisseurs', 'count' => $stats['fournisseurs'], 'color' => 'bg-red-500', 'light' => 'bg-red-100'],
                        ['label' => 'Agronomes', 'count' => $stats['agronomes'], 'color' => 'bg-blue-500', 'light' => 'bg-blue-100'],
                        ['label' => 'Transformation', 'count' => $stats['transformateurs'], 'color' => 'bg-purple-500', 'light' => 'bg-purple-100'],
                        ['label' => 'Assistance', 'count' => $stats['assistances'], 'color' => 'bg-yellow-500', 'light' => 'bg-yellow-100'],
                        ['label' => 'Recyclage', 'count' => $stats['recycleurs'], 'color' => 'bg-orange-500', 'light' => 'bg-orange-100'],
                        ['label' => 'Organisations', 'count' => $stats['organisations'], 'color' => 'bg-gray-500', 'light' => 'bg-gray-100'],
                    ];
                @endphp

                @foreach($topStats as $stat)
                    @php $percentage = $totalUsers > 0 ? ($stat['count'] / $totalUsers) * 100 : 0; @endphp
                    <div>
                        <div class="flex justify-between text-sm mb-2">
                            <div class="flex items-center gap-2">
                                <div class="w-3 h-3 {{ $stat['color'] }} rounded-full"></div>
                                <span class="font-medium text-gray-700">{{ $stat['label'] }}</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <span class="text-gray-500">{{ number_format($stat['count']) }}</span>
                                <span class="text-xs font-semibold px-2 py-0.5 {{ $stat['light'] }} text-gray-700 rounded-full">{{ number_format($percentage, 1) }}%</span>
                            </div>
                        </div>
                        <div class="w-full bg-gray-100 rounded-full h-2.5">
                            <div class="{{ $stat['color'] }} h-2.5 rounded-full transition-all duration-700" style="width: {{ $percentage }}%"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Carte d'information et répartition rapide -->
        <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-2xl shadow-xl p-6 transition-all duration-300 hover:shadow-2xl">
            <div class="mb-6">
                <h2 class="text-xl font-bold text-gray-800">Croissance de l'écosystème</h2>
                <p class="text-gray-600 text-sm mt-1">Évolution de la communauté AgriBridge</p>
            </div>

            <div class="grid grid-cols-2 gap-4 mb-6">
                <div class="bg-white rounded-xl p-4 text-center shadow-sm">
                    <p class="text-2xl font-bold text-green-600">+{{ rand(10, 30) }}%</p>
                    <p class="text-xs text-gray-500 mt-1">Croissance annuelle</p>
                </div>
                {{-- <div class="bg-white rounded-xl p-4 text-center shadow-sm">
                    <p class="text-2xl font-bold text-blue-600">{{ rand(5, 15) }}</p>
                    <p class="text-xs text-gray-500 mt-1">Provinces couvertes</p>
                </div> --}}
            </div>

            <div class="space-y-3">
                <div class="flex items-center justify-between text-sm">
                    <span class="text-gray-600">Objectif 2025</span>
                    <span class="font-semibold text-gray-800">+{{ rand(0, 0) }}%</span>
                </div>
                <div class="w-full bg-white rounded-full h-2">
                    <div class="bg-green-500 h-2 rounded-full" style="width: {{ rand(0, 0) }}%"></div>
                </div>
                <p class="text-xs text-gray-500 mt-4 flex items-center gap-1">
                    <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    Données mises à jour automatiquement
                </p>
            </div>
        </div>
    </div>

</div>
@endsection