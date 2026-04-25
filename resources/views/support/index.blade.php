@extends('layouts.app')

@section('content')
<div class="py-6 px-4 sm:px-6 lg:px-8 max-w-6xl mx-auto">

    <!-- En-tête -->
    <div class="mb-8 text-center">
        <div class="inline-flex items-center justify-center px-4 py-1 bg-green-100 text-green-700 text-sm font-semibold rounded-full mb-4">
            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                <path d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7z" />
            </svg>
            Aide & Support
        </div>
        <h1 class="text-3xl md:text-4xl font-bold text-gray-800">Centre d'assistance</h1>
        <p class="text-gray-500 mt-2 max-w-2xl mx-auto">Une question ? Un problème ? Notre équipe est là pour vous aider.</p>
    </div>

    <!-- Message de succès -->
    @if(session('success'))
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded shadow-sm">
        <p>{{ session('success') }}</p>
    </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <!-- ===== COLONNE DE GAUCHE : FAQ ===== -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-2xl shadow-xl p-6 sticky top-6">
                <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center gap-2">
                    <svg class="w-6 h-6 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 17h-2v-2h2v2zm2.07-7.75l-.9.92C13.45 12.9 13 13.5 13 15h-2v-.5c0-1.1.45-2.1 1.17-2.83l1.24-1.26c.37-.36.59-.86.59-1.41 0-1.1-.9-2-2-2s-2 .9-2 2H8c0-2.21 1.79-4 4-4s4 1.79 4 4c0 .88-.36 1.68-.93 2.25z"/>
                    </svg>
                    Questions fréquentes
                </h2>
                
                <div class="space-y-4">
                    <div class="border-b border-gray-100 pb-3">
                        <button onclick="toggleFaq(this)" class="w-full text-left font-semibold text-gray-700 hover:text-green-600 transition flex justify-between items-center">
                            Comment publier un produit ?
                            <svg class="w-5 h-5 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div class="faq-answer hidden mt-2 text-gray-500 text-sm">
                            Rendez-vous dans l'onglet "Produits", puis cliquez sur "Publier un produit". Remplissez le formulaire et validez.
                        </div>
                    </div>
                    
                    <div class="border-b border-gray-100 pb-3">
                        <button onclick="toggleFaq(this)" class="w-full text-left font-semibold text-gray-700 hover:text-green-600 transition flex justify-between items-center">
                            Comment modifier mon profil ?
                            <svg class="w-5 h-5 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div class="faq-answer hidden mt-2 text-gray-500 text-sm">
                            Allez dans "Paramètre" puis "Profil". Vous pouvez modifier vos informations personnelles et votre photo.
                        </div>
                    </div>
                    
                    <div class="border-b border-gray-100 pb-3">
                        <button onclick="toggleFaq(this)" class="w-full text-left font-semibold text-gray-700 hover:text-green-600 transition flex justify-between items-center">
                            Comment contacter un agriculteur ?
                            <svg class="w-5 h-5 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div class="faq-answer hidden mt-2 text-gray-500 text-sm">
                            Sur la page d'un produit, cliquez sur "Contacter". Vous pourrez envoyer un message directement au vendeur.
                        </div>
                    </div>
                    
                    <div class="border-b border-gray-100 pb-3">
                        <button onclick="toggleFaq(this)" class="w-full text-left font-semibold text-gray-700 hover:text-green-600 transition flex justify-between items-center">
                            Comment passer une commande ?
                            <svg class="w-5 h-5 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div class="faq-answer hidden mt-2 text-gray-500 text-sm">
                            Sélectionnez un produit, cliquez sur "Commander", puis choisissez la quantité et validez votre commande.
                        </div>
                    </div>
                    
                    <div class="border-b border-gray-100 pb-3">
                        <button onclick="toggleFaq(this)" class="w-full text-left font-semibold text-gray-700 hover:text-green-600 transition flex justify-between items-center">
                            Comment signaler un problème ?
                            <svg class="w-5 h-5 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div class="faq-answer hidden mt-2 text-gray-500 text-sm">
                            Utilisez le formulaire de contact ci-contre. Notre équipe vous répondra dans les 24h.
                        </div>
                    </div>
                </div>
                
                <div class="mt-6 pt-4 border-t border-gray-100">
                    <div class="bg-green-50 rounded-xl p-4 text-center">
                        <svg class="w-8 h-8 text-green-600 mx-auto mb-2" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                        </svg>
                        <p class="text-sm text-gray-600">support@agribridge.com</p>
                        <p class="text-sm text-gray-600 mt-1">Tél: +257 00 00 00 00</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- ===== COLONNE DE DROITE : FORMULAIRE + HISTORIQUE ===== -->
        <div class="lg:col-span-2 space-y-6">
            
            <!-- Formulaire de contact -->
            <div class="bg-white rounded-2xl shadow-xl p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center gap-2">
                    <svg class="w-6 h-6 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M20 2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h14l4 4V4c0-1.1-.9-2-2-2z"/>
                    </svg>
                    Nous écrire
                </h2>
                
                <form action="{{ route('support.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Sujet</label>
                        <input type="text" name="subject" required
                            class="w-full border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500 @error('subject') border-red-500 @enderror"
                            placeholder="Ex: Problème de connexion, Question sur un produit...">
                        @error('subject') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Message</label>
                        <textarea name="message" rows="5" required
                            class="w-full border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500 @error('message') border-red-500 @enderror"
                            placeholder="Décrivez votre problème ou votre question en détail..."></textarea>
                        @error('message') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    
                    <div class="flex justify-end">
                        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg transition flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            Envoyer le message
                        </button>
                    </div>
                </form>
            </div>
            
            <!-- Historique des messages -->
            @if($messages->count() > 0)
            <div class="bg-white rounded-2xl shadow-xl p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center gap-2">
                    <svg class="w-6 h-6 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M20 2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h14l4 4V4c0-1.1-.9-2-2-2z"/>
                    </svg>
                    Mes messages
                </h2>
                
                <div class="space-y-4">
                    @foreach($messages as $message)
                    <div class="border rounded-xl p-4 {{ $message->status == 'repondu' ? 'bg-green-50 border-green-200' : 'bg-white border-gray-200' }}">
                        <div class="flex justify-between items-start mb-2">
                            <div class="flex items-center gap-2">
                                <span class="font-semibold text-gray-800">{{ $message->subject }}</span>
                                <span class="px-2 py-0.5 text-xs rounded-full 
                                    @if($message->status == 'en_attente') bg-yellow-100 text-yellow-700
                                    @elseif($message->status == 'repondu') bg-green-100 text-green-700
                                    @else bg-gray-100 text-gray-700
                                    @endif">
                                    {{ $message->status == 'en_attente' ? 'En attente' : ($message->status == 'repondu' ? 'Répondu' : 'Fermé') }}
                                </span>
                            </div>
                            <span class="text-xs text-gray-400">{{ $message->created_at->format('d/m/Y H:i') }}</span>
                        </div>
                        
                        <p class="text-gray-600 text-sm mb-3">{{ $message->message }}</p>
                        
                        @if($message->response)
                        <div class="bg-green-50 rounded-lg p-3 mt-2 border-l-4 border-green-500">
                            <p class="text-xs font-semibold text-green-700 mb-1">Réponse du support :</p>
                            <p class="text-sm text-gray-700">{{ $message->response }}</p>
                            <p class="text-xs text-gray-400 mt-1">{{ $message->updated_at->format('d/m/Y H:i') }}</p>
                        </div>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
            
        </div>
    </div>
</div>

<script>
    function toggleFaq(button) {
        const answer = button.nextElementSibling;
        const icon = button.querySelector('svg');
        answer.classList.toggle('hidden');
        icon.classList.toggle('rotate-180');
    }
</script>
@endsection