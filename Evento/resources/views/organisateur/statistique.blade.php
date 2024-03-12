<x-layout>
    @include('profile.partials.nav')
 
    <div class=" flex   justify-center  my-9  px-2 ">
        <div class="card d-flex flex-column w-full md:w-11/12">
            <h1 class="display-6 mt-10 border-b-4 border-orange-300 font-sans w-fit self-center">Statistique des Résérvations</h1>
            <div class="container mt-5">

                    <div class="d-flex flex-wrap justify-content-center gap-3 ">
                          @foreach($statistics as $evenementId => $stats)
                    <div class="card border w-96">
                        @php
                        $evenement = App\Models\Evenement::find($evenementId);
                       @endphp
                    <h2 class="mb-2 p-2 text-orange-500 fs-5 fw-semibold text-center">Evenement {{$evenement->titre}}</h2> 
                    <ul class="list-group">
                  
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                       En attente
                            <span class="badge bg-yellow-500 rounded-pill"> {{ $stats['en_attente'] }} Résérvations</span>
                        </li> 
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                         Confirmer
                                 <span class="badge bg-green-500 rounded-pill"> {{ $stats['confirmees'] }} Résérvations</span>
                             </li> 
                             <li class="list-group-item d-flex justify-content-between align-items-center">
                         Rejeter
                             <span class="badge bg-red-500 rounded-pill"> {{ $stats['rejetees'] }} Résérvations</span>
                                 </li>   
                    </ul>
                </div>
                 @endforeach
              

                </div>
    
                </div>       
        </div>   
    </div> 
   
</x-layout>