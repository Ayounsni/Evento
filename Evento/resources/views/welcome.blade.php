<x-layout>    
<div class="vh-100 image" >
    @include('profile.partials.nav')
    <h1 class="display-2 text-gray-50 mb-16  lg:w-6/12 md:w-2 font-sans px-10 mt-24">Réservez Vos Places En Toute Simplicité Sur 
        <span class="text-orange-600 fw-semibold">E</span><span class="fw-semibold">vento</span></h1>
    <a href="{{ route('register') }}" class=" bg-orange-600 fs-5 hover:bg-orange-700 px-4 py-6 ml-10 rounded-full text-gray-100">Créez Un Compte Gratuitement</a>    
</div>    
</x-layout>
