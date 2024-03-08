
<x-layout>
    @include('profile.partials.nav') 
    <div class=" flex  justify-center  my-9  px-2 ">
        <div class="card d-flex flex-column  w-full md:w-11/12 md:px-5">
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
            <h1 class="border-2  md:w-4/12 fs-4 mb-3  fw-lighter mt-4 self-center
             bg-orange-400 text-white p-3 text-center"> Liste Des Participants</h1>


                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3 rounded-s-lg text-center">
                                    Nom du participant
                                 </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                     Email
                                </th>
                                <th scope="col" class="px-6 py-3 rounded-e-lg text-center">
                                   Accées
                              </th>
                            </tr>
                      </thead>
                      @foreach($users as $user)
                  <tbody>
                       <tr class="bg-white dark:bg-gray-800">
                             <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                                <div class="d-flex justify-content-center gap-3 align-items-center w-auto ">
                                    <img src="{{ asset('image/profile.jpg') }}" alt="logo" class="w-11 rounded-full" >
                                    <p class="fs-6">{{$user->name}}</p>
                                </div>
                            </th>
                <td class="px-6 py-4 text-center">
                    {{$user->email}}
                </td>
                <td class="px-6 py-4 text-center">
                    @if($user->bannir == 0)
                       <form method="POST"  action="{{route('ban',$user->id)}}">
                           @method('PUT')
                           @csrf
                               <button type="submit" class="text-white bg-red-500 hover:bg-red-700 focus:ring-4 focus:outline-none  focus:ring-red-200 font-medium rounded-lg text-sm px-3 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                   <i class="bi bi-ban"></i> Interdire l'accès</button>
                       </form>
                   @else
                   <form method="POST"  action="{{route('aut',$user->id)}}">
                       @method('PUT')
                       @csrf
                           <button type="submit" class="text-white bg-green-500 hover:bg-green-700 focus:ring-4 focus:outline-none  focus:ring-green-200 font-medium rounded-lg text-sm px-3 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                               <i class="bi bi-arrow-repeat"></i> Autoriser l'accès</button>
                   </form>
                   @endif
               
                    </td>
            </tr>
        </tbody>
        @endforeach
    </table>
</div>  
<h1 class="border-2  md:w-4/12 fs-4 mb-3  fw-lighter mt-4 self-center
bg-orange-400 text-white p-3 text-center"> Liste Des Organisateurs<span class="text-blue-500 fw-medium "></span></h1>

   <div class="relative overflow-x-auto">
       <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 mb-3 ">
           <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
               <tr>
                   <th scope="col" class="px-6 py-3 rounded-s-lg text-center">
                       Nom d'organisateur
                    </th>
                   <th scope="col" class="px-6 py-3 text-center">
                        Email
                   </th>
                   <th scope="col" class="px-6 py-3 rounded-e-lg text-center">
                      Accées
                 </th>
               </tr>
         </thead>
         @foreach($organisateurs as $organisateur)
         <tbody>
            <tr class="bg-white dark:bg-gray-800">
                  <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                     <div class="d-flex justify-content-center gap-3 align-items-center w-auto ">
                        <img src="{{ asset('image/profile.jpg') }}" alt="logo" class="w-11 rounded-full" >
                         <p class="fs-6">{{$organisateur->name}}</p>
                     </div>
                 </th>
     <td class="px-6 py-4 text-center">
        {{$organisateur->email}}
     </td>
     <td class="px-6 py-4 text-center">
     @if($organisateur->bannir == 0)
        <form method="POST"  action="{{route('ban',$organisateur->id)}}">
            @method('PUT')
            @csrf
                <button type="submit" class="text-white bg-red-500 hover:bg-red-700 focus:ring-4 focus:outline-none  focus:ring-red-200 font-medium rounded-lg text-sm px-3 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <i class="bi bi-ban"></i> Interdire l'accès</button>
        </form>
    @else
    <form method="POST"  action="{{route('aut',$organisateur->id)}}">
        @method('PUT')
        @csrf
            <button type="submit" class="text-white bg-green-500 hover:bg-green-700 focus:ring-4 focus:outline-none  focus:ring-green-200 font-medium rounded-lg text-sm px-3 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <i class="bi bi-arrow-repeat"></i> Autoriser l'accès</button>
    </form>
    @endif

     </td>
 </tr>
</tbody>
@endforeach
</table>
        </div>    
    </div> 
</x-layout>