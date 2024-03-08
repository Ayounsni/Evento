
<x-layout>
    @include('profile.partials.nav') 
    <div class=" flex  justify-center  my-9  px-2 ">
        <div class="card d-flex flex-column w-full md:w-11/12 md:px-5">
            <h1 class="border-2  md:w-4/12 fs-4 mb-3  fw-lighter mt-4 self-center
             bg-orange-400 text-white p-3 text-center"> Gestion des catégories</h1>
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
                             <a href="" class="self-end px-3">
                    <button type="submit" class="text-white mb-3 bg-orange-600 hover:bg-orange-700 focus:ring-4 focus:outline-none mt-5 focus:ring-orange-200 font-medium rounded-lg text-sm px-3 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <i class="bi bi-plus-lg"></i> Ajouter Catégorie</button></a>
                <div class="relative overflow-x-auto px-2">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3 rounded-s-lg text-center">
                                    Nom du catégorie
                                 </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                     Modifier
                                </th>
                               <th scope="col" class="px-6 py-3 rounded-e-lg text-center">
                                   Supprimer
                               </th>
                            </tr>
                      </thead>
                      @foreach($categories as $categorie)
                  <tbody>
                       <tr class="bg-white dark:bg-gray-800">
                             <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">             
                                    <p class="fs-6">{{$categorie->nom}}</p>
                            </th>
                <td class="px-6 py-4 text-center">
                    <a href="">      
                         <button type="submit" class="text-white bg-green-500 hover:bg-green-700  focus:ring-4 focus:outline-none  focus:ring-red-200 font-medium rounded-lg text-sm px-3 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <i class="bi bi-pencil"></i></button></a>
                </td>

                <td class="px-6 py-4 flex justify-center align-items-center gap-2 ">
                   
                       <form method="POST"  action="">
                           @method('DELETE')
                           @csrf
                               <button type="submit" class="text-white bg-red-500 hover:bg-red-700  focus:ring-4 focus:outline-none  focus:ring-red-200 font-medium rounded-lg text-sm px-3 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <i class="bi bi-trash3"></i></button>
                       </form>                  
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>
</div>      
    </div> 
</x-layout>