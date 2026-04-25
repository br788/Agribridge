@extends('layouts.app')

@section('content')
<div class="py-6 px-4 sm:px-6 lg:px-8">

    <!-- ===== 1. BANNIÈRE + RECHERCHE + NOTIFICATIONS (MÊME LIGNE) ===== -->
    <div class="flex items-center gap-10 mb-8">
        
        <!-- Bannière de bienvenue (plus petite) -->
        <div class="py-20 px-10 border-4 border-green-700 bg-green-700 rounded-[20px] shadow-[0_5px_15px_rgba(0,0,0,0.5)] flex-1 max-w-[1000px]">
            <h1 class="text-2xl font-semibold text-white">
                BIENVENUE, {{ strtoupper(auth()->user()->name) }}
            </h1>
            <p class="text-white mt-2 text-sm font-bold">
                Nous transformons le monde agricole <br> en solution numérique.
            </p>
        </div>

        <!-- Barre de recherche + Icône (à droite avec plus d'espace) -->
        <div class="flex items-center gap-8 ml-auto -mt-4">
            <div class="relative w-96">
                <input type="text" 
                    placeholder="Rechercher..." 
                    class="w-full h-16 pl-14 pr-4 bg-white border-2 border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition duration-300 text-lg">
                <div class="absolute left-4 top-4 text-gray-400">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
            </div>

            <!-- Icône notification (plus grande) -->
            <div class="text-green-700 -mt-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-12 h-12">
                    <path fill-rule="evenodd" d="M5.25 9a6.75 6.75 0 0 1 13.5 0v.75c0 2.123.8 4.057 2.118 5.52a.75.75 0 0 1-.297 1.206c-1.544.57-3.16.99-4.831 1.243a3.75 3.75 0 1 1-7.48 0 24.585 24.585 0 0 1-4.831-1.244.75.75 0 0 1-.298-1.205A8.217 8.217 0 0 0 5.25 9.75V9Zm4.502 8.9a2.25 2.25 0 1 0 4.496 0 25.057 25.057 0 0 1-4.496 0Z" clip-rule="evenodd" />
                </svg>
            </div>
        </div>
    </div>


    <!-- ===== 5. SERVICES CARDS (EN BAS) ===== -->
    <div class="mt-30">
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10">
            
            <!-- Carte 1 : Produits agricoles -->
            <a href="#" class="block bg-white rounded-2xl shadow-md hover:shadow-xl transition-shadow overflow-hidden border border-gray-100 cursor-pointer hover:scale-105 duration-200">
                <div class="h-80 bg-white flex items-center justify-center">
                    <img src="{{'image/backgrounds/1.jpg'}}" alt="produits agricoles" class="w-full h-full object-cover">
                </div>
                <p class="text-sm font-semibold text-gray-700 text-center p-4 mt-auto">Avez-vous besoin des produits agricoles ?</p>
            </a>

            <!-- Carte 2 : Agronome -->
            <a href="#" class="block bg-white rounded-2xl shadow-md hover:shadow-xl transition-shadow overflow-hidden border border-gray-100 cursor-pointer hover:scale-105 duration-200">
                <div class="h-80 bg-white flex items-center justify-center">
                    <img src="{{'image/backgrounds/2.jpg'}}" alt="agronome" class="w-full h-full object-cover">
                </div>
                <p class="text-sm font-semibold text-gray-700 text-center p-4 mt-auto">Êtes-vous à la recherche d'un agronome ?</p>
            </a>

            <!-- Carte 3 : Produits agroalimentaires -->
            <a href="#" class="block bg-white rounded-2xl shadow-md hover:shadow-xl transition-shadow overflow-hidden border border-gray-100 cursor-pointer hover:scale-105 duration-200">
                <div class="h-80 bg-white flex items-center justify-center">
                    <img src="{{'image/backgrounds/3.jpg'}}" alt="agroalimentaire" class="w-full h-full object-cover">
                </div>
                <p class="text-sm font-semibold text-gray-700 text-center p-4 mt-auto">Recherchez-vous des produits agroalimentaires ?</p>
            </a>

            <!-- Carte 4 : Produits recyclés -->
            <a href="#" class="block bg-white rounded-2xl shadow-md hover:shadow-xl transition-shadow overflow-hidden border border-gray-100 cursor-pointer hover:scale-105 duration-200">
                <div class="h-80 bg-white flex items-center justify-center">
                    <img src="{{'image/backgrounds/4.jpg'}}" alt="produits recyclés" class="w-full h-full object-cover">
                </div>
                <p class="text-sm font-semibold text-gray-700 text-center p-4 mt-auto">Aimeriez-vous avoir des produits recyclés ?</p>
            </a>

            <!-- Carte 5 : Intrants agricoles -->
            <a href="#" class="block bg-white rounded-2xl shadow-md hover:shadow-xl transition-shadow overflow-hidden border border-gray-100 cursor-pointer hover:scale-105 duration-200">
                <div class="h-80 bg-white flex items-center justify-center">
                    <img src="{{'image/backgrounds/5.jpg'}}" alt="intrants agricoles" class="w-full h-full object-cover">
                </div>
                <p class="text-sm font-semibold text-gray-700 text-center p-4 mt-auto">Avez-vous besoin des intrants agricoles ?</p>
            </a>

            <!-- Carte 6 : Technicien réparateur -->
            <a href="#" class="block bg-white rounded-2xl shadow-md hover:shadow-xl transition-shadow overflow-hidden border border-gray-100 cursor-pointer hover:scale-105 duration-200">
                <div class="h-80 bg-white flex items-center justify-center">
                    <img src="{{'image/backgrounds/6.jpg'}}" alt="technicien réparateur" class="w-full h-full object-cover">
                </div>
                <p class="text-sm font-semibold text-gray-700 text-center p-4 mt-auto">Êtes-vous à la recherche d'un technicien réparateur ou maintenance ?</p>
            </a>

            <!-- Carte 7 : Marché -->
            <a href="#" class="block bg-white rounded-2xl shadow-md hover:shadow-xl transition-shadow overflow-hidden border border-gray-100 cursor-pointer hover:scale-105 duration-200">
                <div class="h-80 bg-white flex items-center justify-center">
                    <img src="{{'image/backgrounds/7.jpg'}}" alt="marché" class="w-full h-full object-cover">
                </div>
                <p class="text-sm font-semibold text-gray-700 text-center p-4 mt-auto">Le marché</p>
            </a>

            <!-- Carte 8 : Gouvernement / Organisations -->
            <a href="#" class="block bg-white rounded-2xl shadow-md hover:shadow-xl transition-shadow overflow-hidden border border-gray-100 cursor-pointer hover:scale-105 duration-200">
                <div class="h-80 bg-white flex items-center justify-center">
                    <img src="{{'image/backgrounds/8.jpg'}}" alt="gouvernement / organisations" class="w-full h-full object-cover">
                </div>
                <p class="text-sm font-semibold text-gray-700 text-center p-4 mt-auto">Gouvernement / Organisations</p>
            </a>

        </div>
    </div>

</div>
@endsection