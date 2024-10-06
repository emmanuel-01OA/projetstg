@extends('layouts.template')

@section('content')




<div class="row g-3 mb-4 align-items-center justify-content-between">
    <div class="col-auto">
        <h1 class="app-page-title mb-0">PERSONNEL</h1>
    </div>
    <div class="col-auto">
         <div class="page-utilities">
            <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                <div class="col-auto">
                    {{-- <form class="table-search-form row gx-1 align-items-center">
                        <div class="col-auto">
                            <input type="text" id="search-orders" name="searchorders" class="form-control search-orders" placeholder="Search">
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn app-btn-secondary">Search</button>
                        </div>
                    </form> --}}

                </div><!--//col-->
                <div class="col-auto">

                    {{-- <select class="form-select w-auto" >
                          <option selected value="option-1">personnel</option>
                          <option value="option-2">personnel inactif</option>
                    </select> --}}
                </div>
                <div class="col-auto">




                    <a class="tw-text-white tw-bg-red-700 hover:bg-red-800 focus:tw-ring-4 focus:tw-ring-red-300 tw-font-medium tw-rounded-lg tw-text-sm tw-px-5 tw-py-2.5 tw-me-2 tw-mb-2 dark:tw-bg-red-600 dark:hover:tw-bg-red-600 focus:tw-outline-none dark:focus:tw-ring-red-800" href="{{ route('personnel.create') }}" style="color: beige"> Ajouter personnel</a>
                </div>
            </div><!--//row-->
        </div><!--//table-utilities-->
    </div><!--//col-auto-->
</div><!--//row-->


<nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
    <a class="flex-sm-fill text-sm-center nav-link active" id="orders-all-tab" data-bs-toggle="tab" href="#orders-all" role="tab" aria-controls="orders-all" aria-selected="true">personnel actif</a>
    <a class="flex-sm-fill text-sm-center nav-link"  id="orders-paid-tab" data-bs-toggle="tab" href="#orders-paid" role="tab" aria-controls="orders-paid" aria-selected="false">personnel inactif</a>

</nav>


<div class="tab-content" id="orders-table-tab-content">
    <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
        <div class="app-card app-card-orders-table shadow-sm mb-5">
            <div class="app-card-body">
                <div class="table-responsive">
                    <table class="table app-table-hover mb-0 text-left">
                        <thead>
                            <tr>
                                <th class="cell">Matricule</th>
                                <th class="cell">Nom</th>
                                <th class="cell">Prenom</th>
                                <th class="cell">email</th>
                                <th class="cell">contact</th>
                                <th class="cell">fonction</th>
                                <th class="cell">type utilisateur</th>
                                <th class="cell">Status</th>
                                <th class="cell"> </th>
                                <th class="cell tw-text-center" colspan="20">Action</th>

                            </tr>
                        </thead>
                        <tbody>


                            @forelse ($personne as $personnel)

                            <tr>
                                <td class="cell">{{ $personnel->matrcl }}</td>
                                <td class="cell"><span class="truncate">{{ $personnel->nam }}</span></td>
                                <td class="cell">{{ $personnel->renam }}</td>
                                <td class="cell">{{ $personnel->eml }}</td>
                                <td class="cell">{{ $personnel->conta }}</td>
                                <td class="cell">{{ $personnel->libelle_fonct }}</td>
                                <td class="cell">{{ $personnel->ty_user }}</td>


                                @if($personnel->code_statut =="1" )
                                <td class="cell"><span class="badge bg-success">Actif</span></td>

                                @else

                                <td class="cell"><span class="badge bg-danger">Inactif</span></td>
                                @endif

                                <td class="cell"> </td>


        <td class="cell">


            <a href="" data-bs-toggle="modal"  data-bs-target="#editp" class="flex tw-items-center  tw-text-white hover:tw-bg-gray-100 hover:tw-text-green-800 tw-border hover:tw-border-green-700 tw-bg-green-700 tw-bg-white-700 focus:tw-ring-4 focus:tw-outline-none focus:tw-ring-green-300 tw-font-medium tw-rounded-lg tw-text-sm tw-px-3 tw-py-2 tw-text-center dark:tw-border-green-500 dark:tw-text-green-500 dark:hover:tw-text-white dark:hover:tw-bg-green-600 dark:focus:tw-ring-green-900">

                Modifier</a>

                {{-- @include('collab.passation.modaledecision.modalaccpass') --}}

            </td>

                <td class="cell">


            <a href="" data-bs-toggle="modal"  data-bs-target="#editbrefus" class="flex tw-items-center tw-text-white hover:tw-text-red-700 hover:tw-bg-gray-100 tw-border hover:tw-border-red-700 tw-bg-red-800 focus:tw-ring-4 focus:tw-outline-none focus:tw-ring-red-300 tw-font-medium tw-rounded-lg tw-text-sm tw-px-3 tw-py-2 tw-text-center dark:tw-border-red-500 dark:tw-text-red-500 dark:hover:tw-text-white dark:hover:tw-bg-red-600 dark:focus:tw-ring-red-900"> Supprimer</a>

            {{-- @include('collab.passation.modaledecision.modalRefdmdpass') --}}
        </td>


                            </tr>

                            @empty

                            <tr>
                                <td class="cell justify-content-center" colspan="20">Aucun Personnel enregistr&eacute;</td>

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
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Pr&eacute;c&eacute;dent</a>
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
                                <th class="cell">Matricule</th>
                                <th class="cell">Nom</th>
                                <th class="cell">Prenom</th>
                                <th class="cell">email</th>
                                <th class="cell">contact</th>
                                <th class="cell">fonction</th>
                                <th class="cell">type utilisateur</th>
                                <th class="cell">Status</th>
                                <th class="cell"> </th>
                            </tr>
                        </thead>
                        <tbody>


                            @forelse ($personnelin as $personnelin)

                            <tr>
                                <td class="cell">{{ $personnelin->matrcl }}</td>
                                <td class="cell"><span class="truncate">{{ $personnelin->nam }}</span></td>
                                <td class="cell">{{ $personnelin->renam }}</td>
                                <td class="cell">{{ $personnelin->eml }}</td>
                                <td class="cell">{{ $personnelin->conta }}</td>
                                <td class="cell">{{ $personnelin->libelle_fonct }}</td>
                                <td class="cell">{{ $personnelin->ty_user }}</td>


                                @if($personnelin->code_statut =="1" )
                                <td class="cell"><span class="badge bg-success">Actif</span></td>

                                @else

                                <td class="cell"><span class="badge bg-danger">Inactif</span></td>
                                @endif

                                <td class="cell"> </td>

                            </tr>

                            @empty

                            <tr>
                                <td class="cell" colspan="50" >Aucun Personnel enregistr&eacute;</td>

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
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Pr&eacute;c&eacute;dent</a>
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



</div><!--//tab-content-->



</div><!--//container-fluid-->




@endsection
