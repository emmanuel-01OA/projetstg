
@extends('layouts.manager.template')

@section('content')



<div class="row g-3 mb-4 align-items-center justify-content-between">
    <div class="col-auto">
        <h1 class="app-page-title mb-0">Demandes Cong&eacute;s</h1>
    </div>
    <div class="col-auto">
         <div class="page-utilities">
            <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                <div class="col-auto">


                </div><!--//col-->
                <div class="col-auto">


                </div>
                <div class="col-auto">

                    {{-- <a class="btn btn-danger" href="#" style="color: beige">Faire une demande</a> --}}
                </div>
            </div><!--//row-->
        </div><!--//table-utilities-->
    </div><!--//col-auto-->
</div><!--//row-->


<nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
    <a class="flex-sm-fill text-sm-center nav-link active" id="orders-all-tab" data-bs-toggle="tab" href="#orders-all" role="tab" aria-controls="orders-all" aria-selected="true">Conges(s) en attente de validation</a>
    <a class="flex-sm-fill text-sm-center nav-link"  id="orders-paid-tab" data-bs-toggle="tab" href="#orders-paid" role="tab" aria-controls="orders-paid" aria-selected="false">Conge(s) valid&eacute;(s) </a>
    <a class="flex-sm-fill text-sm-center nav-link"  id="orders-pending-tab" data-bs-toggle="tab" href="#orders-pending" role="tab" aria-controls="orders-pending" aria-selected="false">Conge(s) refus&eacute;(s) </a>

</nav>

 {{-- modale --}}




<div class="tab-content" id="orders-table-tab-content">
    <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
        <div class="app-card app-card-orders-table shadow-sm mb-5">
            <div class="app-card-body">
                <div class="table-responsive">
                    <table class="table app-table-hover mb-0 text-left">
                        <thead>
                            <tr>
                                <th class="cell">Demande N </th>
                                <th class="cell">Matricule</th>
                                <th class="cell">Nom</th>
                                <th class="cell">Pr&eacute;nom</th>
                                <th class="cell">Email</th>
                                <th class="cell">fonction</th>
                                <th class="cell">Statut entreprise</th>
                                <th class="cell">Fonction</th>
                                <th class="cell">type de cong&eacute;</th>
                                <th class="cell">Date de debut </th>
                                <th class="cell">Date de fin </th>
                                <th class="cell">&eacute;tat passation</th>
                               <th class="cell text-center" colspan="70">Action(s)</th>


                            </tr>
                        </thead>


                         <tbody>


                                @forelse ($Dconges as $CongesDAtt )

                            <tr>
                                <td class="cell">{{ $CongesDAtt->matrcl }}</td>
                                <td class="cell">{{ $CongesDAtt->nam }}</td>
                                <td class="cell">{{ $CongesDAtt->renam }}</td>
                                <td class="cell">{{ $CongesDAtt->eml }}</td>
                                <td class="cell">{{ $CongesDAtt->conta }}</td>
                                <td class="cell">{{ $CongesDAtt->type_statut }}</td>
                                <td class="cell">{{ $CongesDAtt->libelle_fonct }}</td>
                                <td class="cell">{{ $CongesDAtt->date_depart }}</td>
                                <td class="cell">{{ $CongesDAtt->date_arrive }}</td>
                                {{-- <td class="cell">{{ $CongesDAtt->etatvalidpl }}</td> --}}


                                @if($CongesDAtt->etatvalidpl == $StatutAttentdmdcg )
                                <td class="cell"><span class="badge bg-warning">En Attente </span></td>

                                @endif

                                <td class="cell">

                                    <a href="#addnew" data-bs-toggle="modal" data-bs-target="#addnew" class="py-2 tw-px-3 tw-flex tw-items-center tw-text-sm tw-font-medium tw-text-center hover:tw-bg-gray-100 hover:tw-text-gray-900 tw-text-gray-100 tw-rounded-lg tw-border hover:tw-border-gray-900 tw-bg-gray-900 focus:tw-ring-4 focus:tw-outline-none focus:ring-white-300 dark:bg-white-600 dark:hover:tw-bg-white-700 dark:focus:tw-ring-white-800">

                                        {{-- @include('managerviews.Demandepassation.modaledmdacc') --}}
                                      <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="currentColor" class="tw-w-4 tw-h-4 tw-mr-2 tw--ml-0.5">
                                           <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                           <path fill-rule="evenodd" clip-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" />
                                       </svg>
                                     Voir

                                     </a>



                                 </td>


                                        <td class="cell">


                                    <a href="#edit{{ $CongesDAtt->id_p }}" data-bs-toggle="modal"  data-bs-target="#edit" class="flex tw-items-center  tw-text-white hover:tw-bg-gray-100 hover:tw-text-green-800 tw-border hover:tw-border-green-700 tw-bg-green-700 tw-bg-white-700 focus:tw-ring-4 focus:tw-outline-none focus:tw-ring-green-300 tw-font-medium tw-rounded-lg tw-text-sm tw-px-3 tw-py-2 tw-text-center dark:tw-border-green-500 dark:tw-text-green-500 dark:hover:tw-text-white dark:hover:tw-bg-green-600 dark:focus:tw-ring-green-900">

                                        Accepter</a>

                                        {{-- @include('managerviews.Demandepassation.modaledmdaccp') --}}

                                    </td>

                                        <td class="cell">


                                    <a href="#editrefus" data-bs-toggle="modal"  data-bs-target="#editrefus" class="flex tw-items-center tw-text-white hover:tw-text-red-700 hover:tw-bg-gray-100 tw-border hover:tw-border-red-700 tw-bg-red-800 focus:tw-ring-4 focus:tw-outline-none focus:tw-ring-red-300 tw-font-medium tw-rounded-lg tw-text-sm tw-px-3 tw-py-2 tw-text-center dark:tw-border-red-500 dark:tw-text-red-500 dark:hover:tw-text-white dark:hover:tw-bg-red-600 dark:focus:tw-ring-red-900"> Refuser</a>

                                    {{-- @include('managerviews.Demandepassation.modaleRefdmdpass') --}}
                                </td>

                            </tr>

                            @empty

                            <tr>
                                <td class="cell text-center" colspan="20">Aucune passation enregistr&eacute;</td>

                            </tr>

                            @endforelse


                        </tbody>


                    </table>
                </div>

                <!--//table-responsive-->

            </div><!--//app-card-body-->


        </div><!--//app-card-->








{{-- test Modale --}}















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
                                <th class="cell">Demande N</th>
                                <th class="cell">Matricule</th>
                                <th class="cell">Nom</th>
                                <th class="cell">Pr&eacute;nom</th>
                                <th class="cell">Email</th>
                                <th class="cell">fonction</th>
                                <th class="cell">Statut entreprise</th>
                                <th class="cell">Fonction</th>
                                <th class="cell">type de cong&eacute;</th>
                                <th class="cell">Date de debut </th>
                                <th class="cell">Date de fin </th>
                                <th class="cell">&eacute;tat passation</th>
                               <th class="cell text-center" colspan="70">Action(s)</th>


                            </tr>
                        </thead>


                         <tbody>


                            @forelse ($Dconges as $CongesValid )

                            <tr>
                                <td class="cell">{{ $CongesValid->matrcl }}</td>
                                <td class="cell">{{ $CongesValid->nam }}</td>
                                <td class="cell">{{ $CongesValid->renam }}</td>
                                <td class="cell">{{ $CongesValid->eml }}</td>
                                <td class="cell">{{ $CongesValid->conta }}</td>
                                <td class="cell">{{ $CongesValid->type_statut }}</td>
                                <td class="cell">{{ $CongesValid->libelle_fonct }}</td>
                                <td class="cell">{{ $CongesValid->date_depart }}</td>
                                 <td class="cell">{{ $CongesValid->date_arrive }}</td>

                                @if($CongesValid->etatvalidpl == $StatutValidedmdcg )
                                <td class="cell"><span class="badge bg-warning">Valid&eacute;e </span></td>

                                @endif

                                <td class="cell">

                                    <a href="#addnew" data-bs-toggle="modal" data-bs-target="#addnew" class="py-2 tw-px-3 tw-flex tw-items-center tw-text-sm tw-font-medium tw-text-center hover:tw-bg-gray-100 hover:tw-text-gray-900 tw-text-gray-100 tw-rounded-lg tw-border hover:tw-border-gray-900 tw-bg-gray-900 focus:tw-ring-4 focus:tw-outline-none focus:ring-white-300 dark:bg-white-600 dark:hover:tw-bg-white-700 dark:focus:tw-ring-white-800">
                                        {{-- @include('managerviews.Demandepassation.modaledmdacc') --}}
                                      <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="currentColor" class="tw-w-4 tw-h-4 tw-mr-2 tw--ml-0.5">
                                           <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                           <path fill-rule="evenodd" clip-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" />
                                       </svg>
                                       Voir
                                     </a>
                                 </td>
                            </tr>

                            @empty

                            <tr>
                                <td class="cell text-center" colspan="20">Aucune passation enregistr&eacute;</td>

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



    <div class="tab-pane fade" id="orders-pending" role="tabpanel" aria-labelledby="orders-pending-tab">
        <div class="app-card app-card-orders-table mb-5">
            <div class="app-card-body">
                <div class="table-responsive">
                    <table class="table mb-0 text-left">
                        <thead>
                            <tr>
                                <th class="cell">code Demande</th>
                                <th class="cell">Matricule</th>
                                <th class="cell">Nom</th>
                                <th class="cell">Pr&eacute;nom</th>
                                <th class="cell">Email</th>
                                <th class="cell">Fonction</th>
                                <th class="cell">Statut entreprise</th>
                                <th class="cell">Date de debut </th>
                                <th class="cell">Date de fin </th>
                                <th class="cell">&eacute;tat du cong&eacute;</th>
                               <th class="cell text-center" colspan="70">Action(s)</th>
                            </tr>
                        </thead>


                         <tbody>


                            @forelse ($Dconges as $Dconges )

                            <tr>
                                <td class="cell">{{ $Dconges->matrcl }}</td>
                                <td class="cell">{{ $Dconges->nam }}</td>
                                <td class="cell">{{ $Dconges->renam }}</td>
                                <td class="cell">{{ $Dconges->eml }}</td>
                                <td class="cell">{{ $Dconges->conta }}</td>
                                <td class="cell">{{ $Dconges->type_statut }}</td>
                                <td class="cell">{{ $Dconges->libelle_fonct }}</td>
                                <td class="cell">{{ $Dconges->date_depart }}</td>
                                 <td class="cell">{{ $Dconges->date_arrive }}</td>


                                @if($Dconges->etatvalidpl == $StatutRefdmdcg )
                                <td class="cell"><span class="badge bg-warning">En Attente </span></td>

                                @endif

                                <td class="cell">

                                    <a href="#addnew" data-bs-toggle="modal" data-bs-target="#addnew" class="py-2 tw-px-3 tw-flex tw-items-center tw-text-sm tw-font-medium tw-text-center hover:tw-bg-gray-100 hover:tw-text-gray-900 tw-text-gray-100 tw-rounded-lg tw-border hover:tw-border-gray-900 tw-bg-gray-900 focus:tw-ring-4 focus:tw-outline-none focus:ring-white-300 dark:bg-white-600 dark:hover:tw-bg-white-700 dark:focus:tw-ring-white-800">

                                        {{-- @include('managerviews.Demandepassation.modaledmdacc') --}}
                                      <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="currentColor" class="tw-w-4 tw-h-4 tw-mr-2 tw--ml-0.5">
                                           <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                           <path fill-rule="evenodd" clip-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" />
                                       </svg>
                                     Voir

                                     </a>

                                 </td>

                            </tr>

                            @empty

                            <tr>
                                <td class="cell text-center" colspan="20">Aucune passation enregistr&eacute;</td>

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




</div><!--//tab-content-->



</div><!--//container-fluid-->






@endsection

