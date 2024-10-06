
@extends('layouts.collaborateur.template')

@section('content')



<div class="row g-3 mb-4 align-items-center justify-content-between">
    <div class="col-auto">
        <h1 class="app-page-title mb-0">Mes Activit&eacute;s</h1>
    </div>
    <div class="col-auto">
         <div class="page-utilities">
            <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                <div class="col-auto">
                    {{-- <form class="table-search-form row gx-1 align-items-center">
                        <div class="col-auto">
                            <input type="text" id="search-orders" name="searchorders" class="form-control search-orders" placeholder="rechercher">
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn app-btn-secondary">Recherche</button>
                        </div>
                    </form> --}}

                </div><!--//col-->
                <div class="col-auto">

                    {{-- <select class="form-select w-auto" >
                          <option selected value="option-1">Mes Activit&eacute;</option>
                          <option value="orders-paid-tab" id="orders-paid-tab" >Activit&eacute; en cour</option>
                    </select> --}}
                </div>
                <div class="col-auto">

                    <a href="{{ route('mesactivites.create') }}" class="tw-text-white tw-bg-red-700 hover:bg-red-800 focus:tw-ring-4 focus:tw-ring-red-300 tw-font-medium tw-rounded-lg tw-text-sm tw-px-5 tw-py-2.5 tw-me-2 tw-mb-2 dark:tw-bg-red-600 dark:hover:tw-bg-red-600 focus:tw-outline-none dark:focus:tw-ring-red-800"> Ajouter une activit&eacute;(s)</a>
                </div>
            </div><!--//row-->
        </div><!--//table-utilities-->
    </div><!--//col-auto-->
</div><!--//row-->


<nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
    <a class="flex-sm-fill text-sm-center nav-link active" id="orders-all-tab" data-bs-toggle="tab" href="#orders-all" role="tab" aria-controls="orders-all" aria-selected="true">Mes activit&eacute;s</a>
    {{-- <a class="flex-sm-fill text-sm-center nav-link"  id="orders-paid-tab" data-bs-toggle="tab" href="#orders-paid" role="tab" aria-controls="orders-paid" aria-selected="false"></a> --}}

</nav>






<div class="tab-content" id="orders-table-tab-content">
    <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
        <div class="app-card app-card-orders-table shadow-sm mb-5">
            <div class="app-card-body">
                <div class="table-responsive">
                    <table class="table app-table-hover mb-0 text-left">
                        <thead>
                            <tr>
                                <th class="cell">Num&eacute;ro activit&eacute;</th>
                                <th class="cell">type activite</th>
                                <th class="cell">Libell&eacute; activit&eacute;</th>
                                <th class="cell">Description</th>
                                <th class="cell">Date debut</th>
                                <th class="cell">Date limite</th>
                                <th class="cell">Etat</th>
                                <th class="cell">Statut</th>
                                <th class="cell col-span-2">Action</th>





                            </tr>
                        </thead>
                        <tbody>


                            @forelse ($activite as $activites)

                            <tr>
                                <td class="cell">{{ $activites->code_activite }}</td>
                                <td class="cell" >{{ $activites->libelle_activite }}</td>
                                <td class="cell">{{ $activites->description }}</td>
                                <td class="cell">{{ $activites->descrip }}</td>
                                <td class="cell">{{ \Carbon\Carbon::parse($activites->date_debut)->format('d/m/y') }}</td>
                                <td class="cell">{{ \Carbon\Carbon::parse($activites->date_fin)->format('d/m/y')  }}</td>

                                @if($activites->etattrs == $StatutuserAct)
                                <td class="cell"><span class="badge bg-success">Actif</span></td>

                                @endif




                                <td class="cell">




        <td class="cell">


            <a href="" data-bs-toggle="modal"  data-bs-target="#editp" class="flex tw-items-center  tw-text-white hover:tw-bg-gray-100 hover:tw-text-green-800 tw-border hover:tw-border-green-700 tw-bg-green-700 tw-bg-white-700 focus:tw-ring-4 focus:tw-outline-none focus:tw-ring-green-300 tw-font-medium tw-rounded-lg tw-text-sm tw-px-3 tw-py-2 tw-text-center dark:tw-border-green-500 dark:tw-text-green-500 dark:hover:tw-text-white dark:hover:tw-bg-green-600 dark:focus:tw-ring-green-900">

                Modifier</a>

                {{-- @include('collab.passation.modaledecision.modalaccpass') --}}

            </td>

                <td class="cell">


            <a href="" data-bs-toggle="modal"  data-bs-target="#editbrefus" class="flex tw-items-center tw-text-white hover:tw-text-red-700 hover:tw-bg-gray-100 tw-border hover:tw-border-red-700 tw-bg-red-800 focus:tw-ring-4 focus:tw-outline-none focus:tw-ring-red-300 tw-font-medium tw-rounded-lg tw-text-sm tw-px-3 tw-py-2 tw-text-center dark:tw-border-red-500 dark:tw-text-red-500 dark:hover:tw-text-white dark:hover:tw-bg-red-600 dark:focus:tw-ring-red-900"> Supprimer</a>

            {{-- @include('collab.passation.modaledecision.modalRefdmdpass') --}}
        </td>






                                    {{-- <a href="#addne" data-bs-toggle="modal" data-bs-target="#addne" class="py-2 tw-px-3 tw-flex tw-items-center tw-text-sm tw-font-medium tw-text-center hover:tw-bg-gray-100 hover:tw-text-gray-900 tw-text-gray-100 tw-rounded-lg tw-border hover:tw-border-gray-900 tw-bg-gray-900 focus:tw-ring-4 focus:tw-outline-none focus:ring-white-300 tw-rounded-lg dark:bg-white-600 dark:hover:tw-bg-white-700 dark:focus:tw-ring-white-800"> --}}

                                        {{-- @include('collab.passation.modaledecision.modalvoirpass') --}}


                                      {{-- <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="currentColor" class="tw-w-4 tw-h-4 tw-mr-2 tw--ml-0.5">
                                           <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                           <path fill-rule="evenodd" clip-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" />
                                       </svg>
                                     Voir

                                     </a> --}}



                                     {{-- </td>


                                        <td class="cell">


                                    <a href="" data-bs-toggle="modal"  data-bs-target="#editp" class="flex tw-items-center  tw-text-white hover:tw-bg-gray-100 hover:tw-text-green-800 tw-border hover:tw-border-green-700 tw-bg-green-700 tw-bg-white-700 focus:tw-ring-4 focus:tw-outline-none focus:tw-ring-green-300 tw-font-medium tw-rounded-lg tw-text-sm tw-px-3 tw-py-2 tw-text-center dark:tw-border-green-500 dark:tw-text-green-500 dark:hover:tw-text-white dark:hover:tw-bg-green-600 dark:focus:tw-ring-green-900">

                                        Modifier</a>


                                    </td> --}}

                                        {{-- <td class="cell">


                                    <a href="#editbrefus{{ $ActivitpassAttent->idpasst }}" data-bs-toggle="modal"  data-bs-target="#editbrefus" class="flex tw-items-center tw-text-white hover:tw-text-red-700 hover:tw-bg-gray-100 tw-border hover:tw-border-red-700 tw-bg-red-800 focus:tw-ring-4 focus:tw-outline-none focus:tw-ring-red-300 tw-font-medium tw-rounded-lg tw-text-sm tw-px-3 tw-py-2 tw-text-center dark:tw-border-red-500 dark:tw-text-red-500 dark:hover:tw-text-white dark:hover:tw-bg-red-600 dark:focus:tw-ring-red-900"> Annuler</a>

                                    @include('collab.passation.modaledecision.modalRefdmdpass')
                                </td> --}}


                            </tr>


                                {{-- @if($activites-> =="1" ) --}}


                                {{-- @else --}}

                                {{-- <td class="cell"><span class="badge bg-danger">Inactif</span></td> --}}
                                {{-- @endif --}}

                            </tr>

                            @empty

                            <tr>
                                <td class="cell text-center" colspan="20">Aucune activit&eacute; enregistr&eacute;</td>

                            </tr>

                            @endforelse



                        </tbody>
                    </table>
                </div><!--//table-responsive-->

            </div><!--//app-card-body-->
        </div><!--//app-card-->
        <nav class="app-pagination">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">pr&eacute;c&eacute;dent</a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Suivant</a>
                </li>
            </ul>
        </nav><!--//app-pagination-->

    </div><!--//tab-pane-->

    <div class="tab-pane fade" id="orders-paid" role="tabpanel" aria-labelledby="orders-paid-tab">
        <div class="app-card app-card-orders-table mb-5">
            <div class="app-card-body">
                <div class="table-responsive">

                    <table class="table mb-0 text-left">
                        <thead>
                            <tr>
                                <th class="cell">ID</th>
                                <th class="cell" colspan="50"></th>
                                <th class="cell" colspan="50"></th>
                                <th class="cell" colspan="50">Libell&eacute; fonction personnel</th>
                            </tr>
                        </thead>
                        <tbody>


                            @forelse ($fonctionin as $activites)

                            <tr>
                                <td class="cell">{{ $activites->code_fonct }}</td>

                                <td class="cell" colspan="50"></td>
                                <td class="cell" colspan="50"></td>
                                <td class="cell"colspan="50"><span class="truncate">{{ $activites->libelle_fonct }}</span></td>

                                @if($activites->etatf =="1")
                                <td class="cell"><span class="badge bg-success">Actif</span></td>

                                @else

                                <td class="cell"><span class="badge bg-danger">Inactif</span></td>
                                @endif

                            </tr>

                            @empty

                            <tr>
                                <td class="cell text-center" colspan="6">Aucune fonction enregistr&eacute;</td>

                            </tr>

                            @endforelse

                        </tbody>
                    </table>
                </div><!--//table-responsive-->
            </div><!--//app-card-body-->
        </div><!--//app-card-->
    </div><!--//tab-pane-->


</div><!--//tab-content-->



</div><!--//container-fluid-->




@endsection
