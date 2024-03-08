<x-layout>
    @include('profile.partials.nav') 
    <div class="px-3">
        <div class="col-lg-7 mx-auto mt-1">
          <div class="card  mx-auto bg-light mb-4 shadow-md rounded-md mt-4">
              <div class="card-body bg-light ">
                  
              <div class = "container">
                  <form method="POST" action="" >
                      @csrf
                      <div class="controls">
                          <div class="row ">

                              <h1 class="mb-2 fs-3 text-center text-gray-700  self-center font-serif fw-medium">Catégorie</h1>
                            
                              <div class="col-md-12">
                                <div class="mt-4">
                                    <x-input-label for="titre" :value="__('Nom du Catégorie')" />
                                    <x-text-input  class="block mt-1 w-full " type="text" name="titre" :value="old('titre')"  />
                                    <x-input-error :messages="$errors->get('titre')" class="mt-2" />
                                </div>
                              </div>
                          </div>
                          <div class="row">
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
