<x-layout>
    @include('profile.partials.nav') 

    <div class=" flex flex-col md:flex-row  justify-center gap-5 my-3 relative px-4 ">
        <div class="d-flex flex-column  w-full md:w-9/12">
        <div class="card w-100  rounded-2 bg-gray-100">
            <img src="{{ asset('image/event.jpg') }}" alt="image" class="h-44 rounded-t-lg">
            <div class="px-6 md:px-32 d-flex flex-column">
               

                <div class="card flex flex-col p-4 my-12 shadow-md">
                    <h1 class="fs-3 text-center w-fit self-center border-b-2 border-orange-400">Evenement {{$event->titre}}</h1> 
                    <div class="flex justify-between  align-items-center">
                    <p class="fs-6 fw-medium mt-2 text-gray-800" >Catégorie : <span class="text-orange-500 fw-normal">{{$event->categorie->nom}}</span></p>
                    <div class="flex flex-col justify-center align-items-center">
                    <p class="fs-6 fw-medium mt-4 text-gray-800 " >Date de l'événement </p>
                    <p class="text-orange-500 fw-normal">{{$event->date}}</p>
                </div>
                </div>
                <p class="fs-6 fw-medium mt-4 text-gray-800">Description :</p>
                <p>{{$event->description}}</p>
                    <div class="flex flex-col md:flex-row justify-between gap-2 mt-4">
                        <div class="flex flex-col">
                        <p class="fs-6 fw-medium  text-gray-800">Nom d'organisateur</p>
                        <p class="text-orange-500 ">{{$event->user->name}}</p>
                        </div>
                        <p class="fs-6 fw-medium  text-gray-800">Places Restantes :
                             <span class="bg-orange-400 fw-normal text-white py-0 px-2 w-fit rounded-full">{{$event->place}}</span></p>
                        <div class="flex flex-col">
                            <p class="fs-6 fw-medium  text-gray-800">Emplacement</p>
                            <p class="text-orange-500 ">{{$event->lieu}}</p>
                        </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
    </div>   
</x-layout>