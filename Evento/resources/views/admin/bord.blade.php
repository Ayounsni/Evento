<x-layout>
    @include('profile.partials.nav')
 
    <div class=" flex   justify-center  my-9  px-2 ">
        <div class="card d-flex flex-column w-full md:w-11/12">
            <h1 class="display-6 mt-10 border-b-4 border-orange-300 font-sans w-fit self-center">Statistique</h1>
            <div class="container mt-5">
                <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
                    <div class="col">
                         <div class="card radius-10 border-start border-0 border-3 border-info">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p class="mb-0 text-secondary">Total Organisateurs</p>
                                        <h4 class="my-1 fs-4 fw-medium text-info">{{$organisateur}}</h4>
                                        <p class="mb-0 font-13">Dernière mise à jour </p>
                                    </div>
                                    <div class="widgets-icons-2 rounded-circle bg-gradient-scooter text-white ms-auto"><i class="fa fa-users"></i>
                                    </div>
                                </div>
                            </div>
                         </div>
                       </div>
                    <div class="col">
                        <div class="card radius-10 border-start border-0 border-3 border-warning">
                           <div class="card-body">
                               <div class="d-flex align-items-center">
                                   <div>
                                       <p class="mb-0 text-secondary">Total Participants</p>
                                       <h4 class="my-1 fs-4 fw-medium text-warning">{{$user}}</h4>
                                       <p class="mb-0 font-13">Dernière mise à jour</p>
                                   </div>
                                   <div class="widgets-icons-2 rounded-circle bg-gradient-blooker text-white ms-auto"><i class="fa fa-users"></i>
                                   </div>
                               </div>
                           </div>
                        </div>
                      </div> 
                       <div class="col">
                        <div class="card radius-10 border-start border-0 border-3 border-danger">
                           <div class="card-body">
                               <div class="d-flex align-items-center">
                                   <div>
                                       <p class="mb-0 text-secondary">Total Evénements acceptées</p>
                                       <h4 class="my-1 fs-4 fw-medium text-danger">{{$evenement}}</h4>
                                       <p class="mb-0 font-13">Dernière mise à jour</p>
                                   </div>
                                   <div class="widgets-icons-2 rounded-circle bg-gradient-bloody text-white ms-auto"><i class="fa fa-bar-chart"></i>
                                   </div>
                               </div>
                           </div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="card radius-10 border-start border-0 border-3 border-success">
                           <div class="card-body">
                               <div class="d-flex align-items-center">
                                   <div>
                                       <p class="mb-0 text-secondary">Total Réservations acceptées</p>
                                       <h4 class="my-1 fs-4 fw-medium text-success">{{$reservation}}</h4>
                                       <p class="mb-0 font-13">Dernière mise à jour </p>
                                   </div>
                                   <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto"><i class="fa fa-bar-chart"></i>
                                   </div>
                               </div>
                           </div>
                        </div>
                      </div> 
                    </div>
                    <div class="d-flex flex-wrap gap-3 ">
                    <div class="card border flex-grow-1">
                    <h2 class="mb-2 p-2 text-success fs-5 fw-bolder text-center">Nos Organisateurs les plus actifs</h2> 
                    <ul class="list-group">
                    @foreach($organisateurs as $organisateur)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                       {{$organisateur->user->name}}
                            <span class="badge bg-gradient-ohhappiness rounded-pill"> {{$organisateur->total_evenements}}  Evénemens</span>
                        </li> 
                    @endforeach
                        
                    </ul>
                </div>
                <div class="card border flex-grow-1">
                    <h2 class="mb-2 p-2 text-danger fs-5 fw-bolder text-center">Nos Participants les plus actifs</h2> 
                    <ul class="list-group">
                        @foreach($users as $user)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{$user->user->name}}
                            <span class="badge bg-gradient-bloody rounded-pill">{{$user->total_reservations}} Résérvations</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
                </div>
    
                </div>       
        </div>   
    </div> 
   
</x-layout>