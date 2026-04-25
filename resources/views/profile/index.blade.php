@extends('layouts.app')

@section('content')
<div class="py-6 px-4 sm:px-6 lg:px-8 max-w-4xl mx-auto">

    <!-- En-tête -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Mon profil</h1>
        <p class="text-gray-500 mt-1">Gérez vos informations personnelles</p>
    </div>

    <!-- Message de succès -->
    @if(session('success'))
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded" role="alert">
        <p>{{ session('success') }}</p>
    </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <!-- ===== COLONNE DE GAUCHE : PHOTO + STATUT ===== -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-2xl shadow-xl p-6 text-center">
                
                <!-- Photo de profil -->
                <div class="relative inline-block">
                    <div class="w-32 h-32 mx-auto rounded-full overflow-hidden bg-gradient-to-br from-green-400 to-green-600 flex items-center justify-center">
                        @if(isset($user->profile_photo) && $user->profile_photo)
                            <img src="{{ asset('storage/' . $user->profile_photo) }}" alt="Photo de profil" class="w-full h-full object-cover">
                        @else
                            <svg class="w-16 h-16 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                            </svg>
                        @endif
                    </div>
                    <label for="profile_photo_input" class="absolute bottom-0 right-2 w-8 h-8 bg-green-600 rounded-full flex items-center justify-center cursor-pointer hover:bg-green-700 transition">
                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/>
                        </svg>
                    </label>
                    <form action="{{ route('profile.photo') }}" method="POST" enctype="multipart/form-data" id="photoForm" class="hidden">
                        @csrf
                        <input type="file" name="profile_photo" id="profile_photo_input" accept="image/*" onchange="this.form.submit()">
                    </form>
                </div>

                <h2 class="text-xl font-bold text-gray-800 mt-4">{{ $user->name }}</h2>
                <p class="text-gray-500 text-sm">{{ $user->email }}</p>
                
                <div class="mt-4 pt-4 border-t border-gray-100">
                    <div class="flex items-center justify-center gap-2 text-sm">
                        <span class="px-2 py-1 bg-green-100 text-green-700 text-xs font-semibold rounded-full">
                            {{ ucfirst($user->role) }}
                        </span>
                        <span class="text-gray-400">•</span>
                        <span class="text-gray-500">Membre depuis {{ $user->created_at->format('M Y') }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- ===== COLONNE DE DROITE : FORMULAIRES ===== -->
        <div class="lg:col-span-2 space-y-6">

            <!-- Formulaire Informations personnelles -->
            <div class="bg-white rounded-2xl shadow-xl p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-4">Informations personnelles</h2>
                
                <form action="{{ route('profile.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nom complet</label>
                            <input type="text" name="name" value="{{ old('name', $user->name) }}" 
                                class="w-full border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500 @error('name') border-red-500 @enderror">
                            @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input type="email" name="email" value="{{ old('email', $user->email) }}" 
                                class="w-full border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500 @error('email') border-red-500 @enderror">
                            @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Téléphone</label>
                            <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" 
                                class="w-full border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Province</label>
                            <input type="text" name="province" value="{{ old('province', $user->province) }}" 
                                class="w-full border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Commune</label>
                        <input type="text" name="commune" value="{{ old('commune', $user->commune) }}" 
                            class="w-full border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500">
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg transition">
                            Enregistrer les modifications
                        </button>
                    </div>
                </form>
            </div>

            <!-- Formulaire Changer mot de passe -->
            <div class="bg-white rounded-2xl shadow-xl p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-4">Changer le mot de passe</h2>
                
                <form action="{{ route('profile.password') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Mot de passe actuel</label>
                        <input type="password" name="current_password" 
                            class="w-full border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500 @error('current_password') border-red-500 @enderror">
                        @error('current_password') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nouveau mot de passe</label>
                            <input type="password" name="password" 
                                class="w-full border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500 @error('password') border-red-500 @enderror">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Confirmer le mot de passe</label>
                            <input type="password" name="password_confirmation" 
                                class="w-full border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500">
                        </div>
                    </div>
                    @error('password') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror

                    <div class="flex justify-end">
                        <button type="submit" class="bg-yellow-600 hover:bg-yellow-700 text-white px-6 py-2 rounded-lg transition">
                            Changer le mot de passe
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>

</div>

<script>
    // Auto-submit du formulaire de photo
    document.getElementById('profile_photo_input')?.addEventListener('change', function() {
        this.form.submit();
    });
</script>
@endsection