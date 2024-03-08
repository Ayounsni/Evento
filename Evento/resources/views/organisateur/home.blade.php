<x-layout>
    @include('profile.partials.nav') 
    <div class=" flex flex-col md:flex-row  justify-center gap-5 my-3 relative px-2 ">
        <div class="d-flex flex-column  w-full md:w-9/12">
        <div class="card w-100 min-h-screen rounded-2 bg-gray-100">

            <div class="px-4 d-flex flex-column">
                <h1 class="display-6 mt-10 border-b-4 border-orange-300 font-sans w-fit self-center">Gérer mes événements</h1>
                <a href="{{route('addEvent')}}" class="self-end">
                    <button type="submit" class="text-white bg-orange-600 hover:bg-orange-700 focus:ring-4 focus:outline-none mt-5 focus:ring-orange-200 font-medium rounded-lg text-sm px-3 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <i class="bi bi-plus-lg"></i> Ajouter évenement</button>
                </a> 
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
                
                <div class="flex flex-col md:flex-row justify-center flex-wrap align-items-center mt-3 gap-3">
                 @foreach($evenements as $evenement)
                <div class="flex flex-col w-full md:w-5/12">
                <div class="d-flex justify-content-end  gap-2 mt-3"> 
                    <form method="POST" action="{{route('deleteEvent',$evenement->id)}}">
                        @method('DELETE')
                        @csrf
                        <button class="bg-red-600 py-1 px-2 rounded-2 text-white"><i class="bi bi-trash3-fill"></i></button>
                    </form>
                   <a href="{{route('editEvent',$evenement->id)}}"><button class="bg-green-600 py-1 px-2 rounded-2 text-white"><i class="bi bi-pencil-square"></i></button></a>
                  </div>
                  <div class="card mb-4 mt-1 shadow-md border-none " >
                  <div class="row g-0">
                      <div class="col-md-4">
                          <img src="{{ asset('image/img.png') }}" class=" sm:border-b-2 md:border-e-2 border-gray-300 img-fluid w-auto h-100 "  alt="image">
                      </div>
                      <div class="col-md-8">
                          <div class="card-body">
                            <h1 class="fs-5 fw-medium text-orange-500 text-center mb-3">Evénement {{$evenement->titre}}</h1>
                             <div class="d-flex flex-column flex-md-row justify-content-between">
                                 
                               
                             </div> 
                              <p class="card-text text-sm "></p>
                              <p class="mb-2 fw-medium"><i class="bi bi-list-ol"></i> Nombre de place </p>
                                <p class="bg-orange-400 text-white py-1 px-2 w-fit rounded-full">{{$evenement->place}}</p>
                              <hr class="my-2" />
    
                              <div class="d-flex flex-column flex-md-row justify-content-between">
                                  <div class="d-flex flex-column w-50">
                                      <p class="fw-medium"><i class="bi bi-calendar-event"></i> Date </p>
                                      <p class="text-orange-500 fw-medium">{{$evenement->date}}</p>
                                  </div>
                                  <div class="d-flex flex-column w-50">
                                     <p class="fw-medium"><i class="bi bi-card-checklist"></i> Statut </p>
                                     @if($evenement->status == 'en attente')
                                     <p class="fw-medium mt-1 bg-orange-500 px-2 w-fit text-gray-50 rounded-full">{{$evenement->status}}</p>
                                     @elseif($evenement->status == 'rejeter')
                                      <p class="fw-medium mt-1 bg-red-600 px-2 w-fit text-gray-50 rounded-full">{{$evenement->status}}</p>
                                     @else
                                     <p class="fw-medium mt-1 bg-green-600 px-2 w-fit text-gray-50 rounded-full">{{$evenement->status}}</p>
                                    @endif
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                </div>
            </div>
            @endforeach
            </div>
            </div>
        </div>
    </div>
    </div>   
</x-layout>