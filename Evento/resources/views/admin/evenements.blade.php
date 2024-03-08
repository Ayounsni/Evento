
<x-layout>
    @include('profile.partials.nav') 
    <div class=" flex  justify-center  my-9  px-2 ">
        <div class="card d-flex flex-column w-full md:w-11/12 md:px-5">
            <h1 class="border-2  md:w-4/12 fs-4 mb-3  fw-lighter mt-4 self-center
             bg-orange-400 text-white p-3 text-center"> Liste Des Evenements</h1>
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
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3 rounded-s-lg text-center">
                                    Nom du créateur
                                 </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                     Titre d'événement
                                </th>
                                <th scope="col" class="px-6 py-3 rounded-e-lg text-center">
                                    Date d'événement 
                                </th>
                               <th scope="col" class="px-6 py-3 rounded-e-lg text-center">
                                   Validation
                               </th>
                            </tr>
                      </thead>
                      @foreach($evenements as $evenement)
                  <tbody>
                       <tr class="bg-white dark:bg-gray-800">
                             <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                                <div class="d-flex justify-content-center gap-3 align-items-center w-auto ">
                                    <img src="{{ asset('image/profile.jpg') }}" alt="logo" class="w-11 rounded-full" >
                                    <p class="fs-6">{{$evenement->user->name}}</p>
                                </div>
                            </th>
                <td class="px-6 py-4 text-center">
                    {{$evenement->titre}}
                </td>
                <td class="px-6 py-4 text-center">
                    {{$evenement->date}}
                </td>
                <td class="px-6 py-4 flex justify-center align-items-center gap-2 ">
                    @if($evenement->status == 'en attente')
                       <form method="POST"  action="{{route('accepter',$evenement->id)}}">
                           @method('PUT')
                           @csrf
                               <button type="submit" class="text-white bg-green-500 hover:bg-green-700 w-32 focus:ring-4 focus:outline-none  focus:ring-red-200 font-medium rounded-lg text-sm px-3 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <i class="bi bi-check-circle"></i> Confirmer</button>
                       </form> 
                       <form method="POST"  action="{{route('rejeter',$evenement->id)}}">
                       @method('PUT')
                       @csrf
                           <button type="submit" class="text-white bg-red-500 hover:bg-red-700 w-32 focus:ring-4 focus:outline-none  focus:ring-green-200 font-medium rounded-lg text-sm px-3 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <i class="bi bi-x-circle"></i> Rejeter</button>
                       </form>
                       @elseif($evenement->status == 'confirmer')
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
    </div> 
</x-layout>