
<x-layout>
    @include('profile.partials.nav') 
    <div class=" flex  justify-center  my-9  px-2 ">
        <div class="card d-flex min-h-screen flex-column w-full md:w-11/12 md:px-5">
            <h1 class="display-6 mt-10 border-b-4 border-orange-300 font-sans w-fit self-center">
                Mes Réservations</h1>
             @if(session('success'))
             <div class="alert self-center alert-success  mt-3 text-center w-fit">
                  {{ session('success') }}
             </div>
             @endif
             @if(session('bloc'))
             <div class="alert self-center alert-danger  mt-3 text-center w-fit">
                  {{ session('bloc') }}
             </div>
             @endif
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm mt-14 text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3 rounded-s-lg text-center">
                                   N° du réservation
                                 </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    Titre d'événement
                                </th>
                                <th scope="col" class="px-6 py-3 rounded-e-lg text-center">
                                    Nom d'organisateur
                                </th>
                               <th scope="col" class="px-6 py-3 rounded-e-lg text-center">
                                   Places Restantes
                               </th>
                               <th scope="col" class="px-6 py-3 rounded-e-lg text-center">
                                Status
                            </th>
                            </tr>
                      </thead>
                      @foreach($reservations as $reservation)
                  <tbody>
                       <tr class="bg-white dark:bg-gray-800">
                             <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                                {{$reservation->id}}
                            </th>
                <td class="px-6 py-4 text-center">
                 <p class="fs-6"> {{$reservation->evenement->titre}}</p>  
                </td>
                <td class="px-6 py-4 text-center">
                    {{$reservation->evenement->user->name}}
                </td>
                <td class="px-6 py-4 text-center">
                    {{$reservation->evenement->place}}
                </td>
                <td class="px-6 py-4 flex justify-center align-items-center gap-2 ">
                    @if($reservation->status == 'confirmer')
                         <p class="text-white bg-green-500  w-32 focus:ring-4 focus:outline-none  focus:ring-red-200 font-medium rounded-lg text-sm px-3 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                          <i class="bi bi-check-circle"></i> Confirmé</p>
                          <a href="{{route('ticket',$reservation->id)}}"><button type="submit" class="text-white bg-gray-700 hover:bg-gray-500 w-36 focus:ring-4 focus:outline-none  focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <i class="bi bi-ticket-perforated"></i> Générer Ticket</button></a> 
                    @elseif($reservation->status == 'en attente')
                    <p class="text-white bg-yellow-500  w-32 focus:ring-4 focus:outline-none  focus:ring-red-200 font-medium rounded-lg text-sm px-3 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <i class="bi bi-hourglass-split"></i> En attente</p>
                    @else
                    <p class="text-white bg-red-500  w-32 focus:ring-4 focus:outline-none  focus:ring-red-200 font-medium rounded-lg text-sm px-3 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <i class="bi bi-x-circle"></i> Rejeter</p>   
                    @endif                 
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>
</div>     
<div class="my-3">
    {{ $reservations->links() }}
     </div> 
    </div> 
</x-layout>