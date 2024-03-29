<x-layout>
    @include('profile.partials.nav') 
    <div class="px-3">
        <div class="col-lg-7 mx-auto mt-1">
          <div class="card  mx-auto bg-light mb-4 shadow-md rounded-md mt-4">
              <div class="card-body bg-light ">
                  
              <div class = "container">
                  <form method="POST" action="{{route('editEventt',$event->id)}}" >
                    @method('PUT')
                    @csrf
                      <div class="controls">
                          <div class="row ">

                              <h1 class="mb-2 fs-3 text-center text-gray-700  self-center font-sans fw-medium">Evénement</h1>
                            
                              <div class="col-md-6">
                                <div class="mt-4">
                                    <x-input-label for="titre" :value="__('Titre')" />
                                    <x-text-input  class="block mt-1 w-full " type="text" name="titre" :value="$event->titre"  />
                                    <x-input-error :messages="$errors->get('titre')" class="mt-2" />
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="mt-4">
                                    <x-input-label for="date" :value="__('Date')" />
                                    <x-text-input  class="block mt-1 w-full" type="date" name="date" :value="$event->date"  />
                                    <x-input-error :messages="$errors->get('date')" class="mt-2" />
                                </div>
                              </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="mt-4">
                                  <x-input-label for="type" :value="__('Catégorie')" />
                                  <select name="categorie" id="langue" :value="old('categorie')"  class="form-select mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                      <option value="{{$event->id_categorie}}">{{$event->categorie->nom}}</option>
                                      @foreach($categories as $categorie)
                                      @if($categorie->id != $event->id_categorie)
                                      <option value="{{$categorie->id}}" class="form-option">{{$categorie->nom}}</option>
                                  @endif
                                      @endforeach
                  
                                  </select>
                                  <x-input-error :messages="$errors->get('categorie')" class="mt-2" />
                              </div>
                          </div>
                              <div class="col-md-6">
                                <div class="mt-4">
                                    <x-input-label for="adresse" :value="__('Nombre de place')" />
                                    <x-text-input  class="block mt-1 w-full" type="number" name="nombre" :value="$event->place"  />
                                    <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
                                </div>
                              </div>
                          </div>
                          <div class="row">

                              <div class="col-md-12">
                                <div class="mt-4">
                                    <label for="competence" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Emplacement</label>
                                    <x-text-input  class="block mt-1 w-full" type="text" name="lieu" :value="$event->lieu"  />
                                    <x-input-error :messages="$errors->get('lieu')" class="mt-2" />
                                </div>
                              </div>
                              <div class="col-md-12">
                                <div class="mt-4">
                                  <div class="form-group">
                                      <label for="form_message" class="block font-medium text-sm  mb-2 text-gray-700 dark:text-gray-300">Description</label>
                                      <textarea  name="description" :value="old('description')"  class="form-control border-gray-300 dark:border-gray-700 dark:bg-gray-900
                                       dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md
                                        shadow-sm" placeholder="Entrer la description ici." rows="4" >{{$event->description}}</textarea>
                                      @error('description')
                                      <span class="text-danger">{{$message}}</span>      
                                      @enderror
                                  </div>
                                </div>
                              </div>


                              <div class="col-md-12">
                                  <div class="d-flex justify-content-end">
                                      <input type="submit" class="text-white bg-orange-600 hover:bg-orange-700 focus:ring-4 focus:outline-none mt-3 focus:ring-orange-200 font-medium rounded-lg text-sm px-3 py-2 text-center" value="Ajouter Evénement">
                                  </div>
                              </div>
                          </div>
                        </div>

                       
                      </div>
                  </form>
          </div>
              </div>
      </div>
      </div>
    </div>     

</x-layout>
