<x-layout>
    @include('profile.partials.nav') 
    <div class="flex flex-col justify-center align-items-center ">
    <div class="w-2/4 self-center border-2 border-gray-950 bg-gray-50 mt-40 p-2">
        <p class="fs-4 fw-medium">TICKET N° 000{{$reservation->id}}</p>
    <p class="text-center fs-3 border-y-2 border-gray-400">Evenement {{$reservation->evenement->titre}}</p>
    <div class="flex justify-between mt-3 px-7">
    <p class="border-b-2  fs-5 w-fit  ">Ticket Pour  </p>
    <p class="fw-medium border-b-2  fs-5 w-fit">{{$reservation->user->name}}</p> 
    </div>
    <div class="flex justify-between mt-3 px-7">
        <p class="border-b-2  fs-5 w-fit  ">Date  </p>
        <p class="fw-medium border-b-2  fs-5 w-fit">{{$reservation->evenement->date}}</p> 
        </div>
        <div class="flex justify-between mt-3 px-7">
            <p class="border-b-2  fs-5 w-fit  ">Lieu  </p>
            <p class="fw-medium border-b-2  fs-5 w-fit">{{$reservation->evenement->lieu}}</p> 
            </div>
            <div class="flex justify-center">
            <img src="{{asset('image/cod.png')}}" alt="pnj" class="w-44 ">
        </div>
    </div>
  <a href="{{route('invoice',$reservation->id)}}" class="w-2/4 bg-gray-700 hover:bg-gray-500 py-2 mt-2 rounded-xl text-gray-50 text-center"> <p><i class="bi bi-filetype-pdf"></i> Télécharger PDF</p></a> 
</div>   
</x-layout>