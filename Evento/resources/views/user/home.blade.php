<x-layout>
    @include('profile.partials.nav') 
    <div class="mt-4 px-3">
        @include('profile.partials.recherche')  
        </div>
    <div class=" flex flex-col md:flex-row  justify-center gap-5 my-3 relative px-2 ">
        <div class="d-flex flex-column  w-full md:w-9/12">

        <div class="card w-100 min-h-screen rounded-2 bg-gray-100">
            <div class="px-4 d-flex flex-column">
                <h1 class="display-6 mt-10 border-b-4 border-orange-300 font-sans w-fit self-center">Événements en ligne à venir</h1>
                <div class="self-end px-10">
                <form class="max-w-sm mx-auto" method="POST" action="{{route('filtre')}}">
                    @csrf 
                    <select name="categorie" onchange="this.form.submit()" class="bg-gray-50 border mt-5 w-44 border-gray-300 self-end text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block  p-2.5
                     dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500
                      dark:focus:border-blue-500">
                      @if(isset($cat))
                      <option value="{{$cat->id}}" selected>{{$cat->nom}}</option>
                      @foreach($categories as $categorie)
                      @if($categorie->id != $cat->id)
                      <option value="{{$categorie->id}}">{{$categorie->nom}}</option>
                      @endif
                      @endforeach
                      <option value="all">All</option>
                      @else
                      <option selected>Filtrer par Catégorie</option>
                      @foreach($categories as $categorie)
                      <option value="{{$categorie->id}}">{{$categorie->nom}}</option>
                      @endforeach
                      @endif
                    </select>
                  </form>
                </div>
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
                <div class="card mb-4 mt-1 shadow-md border-none " >
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{ asset('image/img.png') }}" class="  md:border-e-2 border-gray-300 img-fluid w-auto h-100 "  alt="image">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body pb-0">
                              <h1 class="fs-5 fw-medium text-gray-500 text-center mb-3">Evénement {{$evenement->titre}}</h1>
                               <div class="d-flex flex-column flex-md-row justify-content-between">            
                               </div> 
                               <p class=" fw-medium">Description</p>
                               <div class="h-6 overflow-hidden">
                                <p class="truncate">{{$evenement->description}}</p>
                               </div>
                                <hr class="my-2" />
      
                                <div class="d-flex flex-column flex-md-row justify-content-between">
                                    <div class="d-flex flex-column w-50">
                                        <p class="fw-medium"><i class="bi bi-diagram-3"></i> Places</p>
                                        <p class="bg-orange-400 text-white py-0 px-2 w-fit rounded-full">{{$evenement->place}}</p>
                                    </div>
                                    <div class="d-flex flex-column w-50">
                                       <p class="fw-medium"><i class="bi bi-tag"></i> Catégorie </p>
                                       <p class="text-orange-500 fw-medium">{{$evenement->categorie->nom}}</p>    
                                    </div>         
                                </div>
                                <div class="flex justify-end">
                                <a class="underline text-end text-sm mb-1 text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('show',$evenement->id) }}">
                                    {{ __('En savoir plus') }}
                                </a>
                             </div>
                            </div>
                        </div>
                        <a href="{{route('reserv',$evenement->id)}}" class="w-full bg-orange-500 py-1 rounded-b-md hover:bg-orange-700 text-gray-50 text-center"><i class="bi bi-ticket-perforated"></i> Réserver Ticket</a>
                    </div>
                  </div>
            </div>
            @endforeach   
            </div>
            <div class="my-3">
            {{ $evenements->links() }}
             </div>
            </div>
        </div>
    </div>
    </div>   
</x-layout>