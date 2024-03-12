<x-layout>
    @include('profile.partials.nav') 
    <div class=" flex  justify-center  my-9  px-2 ">
        <div class="card d-flex flex-column w-full md:w-11/12 md:px-5">
            <h1 class="display-6 mt-10 border-b-4 border-orange-300 font-sans w-fit self-center">Validation Manuelle Des Réservations</h1>
            @if(session('success'))
            <div class="alert self-center alert-success  mt-3 text-center w-fit">
                 {{ session('success') }}
            </div>
            @endif
            @if(session('delete'))
            <div class="alert self-center alert-danger  mt-3 text-center w-fit">
                 {{ session('delete') }}
            </div>
            @endif
            @foreach($evenements as $evenement)
            <h1 class="border-2  md:w-4/12 fs-4 mb-3  fw-lighter mt-12 self-center
             bg-orange-400 text-white p-1 text-center"> Les Résérvations d'Evénement {{$evenement->titre}}</h1>
             @if($evenement->reservations->count() > 0)
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3 rounded-s-lg text-center">
                                    N° du réservation
                                 </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    Nom du Réservant
                                </th>
                                <th scope="col" class="px-6 py-3 rounded-e-lg text-center">
                                    email du Réservant 
                                </th>
                               <th scope="col" class="px-6 py-3 rounded-e-lg text-center">
                                   Places Restantes
                               </th>
                               <th scope="col" class="px-6 py-3 rounded-e-lg text-center">
                                Validation
                            </th>
                            </tr>
                      </thead>
                      @foreach($evenement->reservations as $reservation)
                  <tbody>
                       <tr class="bg-white dark:bg-gray-800">
                             <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                               {{$reservation->id}}
                            </th>
                <td class="px-6 py-4 text-center">
                                    <p class="fs-6">{{$reservation->user->name}}</p>  
                </td>
                <td class="px-6 py-4 text-center">
                    {{$reservation->user->email}}
                </td>
                <td class="px-6 py-4 text-center">
                    {{$reservation->evenement->place}}
                </td>
                <td class="px-6 py-4 flex justify-center align-items-center gap-2 ">
                    @if($reservation->status == 'en attente')
                          <a href="{{route('valid',$reservation->id)}}"><button type="submit" class="text-white bg-green-500 hover:bg-green-700 w-32 focus:ring-4 focus:outline-none  focus:ring-red-200 font-medium rounded-lg text-sm px-3 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <i class="bi bi-check-circle"></i> Confirmer</button></a>     
                       
                          <a href="{{route('invalid',$reservation->id)}}"><button type="submit" class="text-white bg-red-500 hover:bg-red-700 w-32 focus:ring-4 focus:outline-none  focus:ring-green-200 font-medium rounded-lg text-sm px-3 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <i class="bi bi-x-circle"></i> Rejeter</button></a> 
                       </form>
                       @elseif($reservation->status == 'confirmer')
                       <p class="text-white bg-gray-700 w-32 focus:ring-4 focus:outline-none  font-medium rounded-lg text-sm px-3 py-2 text-center ">Confirmé</p>
                       @else
                       <p class="text-white bg-gray-700 w-32 focus:ring-4 focus:outline-none  font-medium rounded-lg text-sm px-3 py-2 text-center ">Rejeté</p>
                      @endif
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>
</div>
@else
<div class="flex justify-center align-items-center ">
    <p class=" mb-4 text-red-600">Aucune réservation pour cet événement pour le moment.</p>
    </div> 
    @endif     
    @endforeach
    <div class="my-4">
        {{ $evenements->links() }}
         </div>
    </div> 
</x-layout>