
@extends('layouts.manager.template')

@section('content')



<div class="row g-3 mb-4 align-items-center justify-content-between">
    <div class="col-auto">
        <h1 class="app-page-title mb-0">Les demandes de Passations Activités</h1>
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
    <a class="flex-sm-fill text-sm-center nav-link active" id="orders-all-tab" data-bs-toggle="tab" href="#orders-all" role="tab" aria-controls="orders-all" aria-selected="true">passation(s) en attente de validation</a>
    <a class="flex-sm-fill text-sm-center nav-link"  id="orders-paid-tab" data-bs-toggle="tab" href="#orders-paid" role="tab" aria-controls="orders-paid" aria-selected="false">passation(s) valid&eacute;e(s) </a>
    <a class="flex-sm-fill text-sm-center nav-link"  id="orders-pending-tab" data-bs-toggle="tab" href="#orders-pending" role="tab" aria-controls="orders-pending" aria-selected="false">passation(s) refus&eacute;e(s) </a>

</nav>






<div class="tab-content" id="orders-table-tab-content">
    <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
        <div class="app-card app-card-orders-table shadow-sm mb-5">
            <div class="app-card-body">
                <div class="table-responsive">
                    <table class="table app-table-hover mb-0 text-left">
                        <thead>
                            <tr>
                                <th class="cell">ID</th>
                                <th class="cell">Code activit&eacute;</th>
                                <th class="cell">Type activite</th>
                                <th class="cell">Description</th>
                                <th class="cell">Libell&eacute; passation</th>
                                <th class="cell">Estimation pourcentage &eacute;ffectu&eacute;</th>
                                <th class="cell">Matricule</th>
                                <th class="cell">Nom</th>
                                <th class="cell">Pr&eacute;nom(s)</th>
                                <th class="cell">Email</th>
                                <th class="cell">date demande</th>
                                <th class="cell">Date de debut </th>
                                <th class="cell">Date de fin </th>
                                <th class="cell">&eacute;tat passation</th>
                                <th class="cell">Action</th>


                            </tr>
                        </thead>


                         <tbody>


                            @forelse ($ActivitpassAttente as $ActivitpassAttentes )

                            <tr>
                                <td class="cell">{{ $ActivitpassAttentes->idpasst }}</td>
                                <td class="cell">{{ $ActivitpassAttentes->code_activite }}</td>
                                <td class="cell">{{ $ActivitpassAttentes->libelle_activite }}</td>
                                <td class="cell">{{ $ActivitpassAttentes->description }}</td>
                                <td class="cell">{{ $ActivitpassAttentes->libpasst }}</td>
                                <td class="cell">{{ $ActivitpassAttentes->pourcen_travail_eff }}</td>
                                <td class="cell">{{ $ActivitpassAttentes->matrcl }}</td>

                                <td class="cell">{{ $ActivitpassAttentes->nam }}</td>
                                 <td class="cell">{{ $ActivitpassAttentes->renam }}</td>
                                 <td class="cell">{{ $ActivitpassAttentes->eml }}</td>
                                 <td class="cell">{{ $ActivitpassAttentes->datedmd }}</td>
                                 <td class="cell">{{ $ActivitpassAttentes->date_debut }}</td>
                                  <td class="cell">{{ $ActivitpassAttentes->date_fin }}</td>


                                @if($ActivitpassAttentes->etatpassman == $StatutAttentepassMan)
                                <td class="cell"><span class="badge bg-warning">En Attente </span></td>

                                @endif

                                     <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">
                                    <a href="#" class="text-indigo-600 hover:text-indigo-900">Accepter</a>
                                </td>




                            </tr>

                            @empty

                            <tr>
                                <td class="cell justify-content-center" colspan="20">Aucune passation enregistr&eacute;</td>

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
                                <th class="cell">Code activit&eacute;</th>
                                <th class="cell">Type activite</th>
                                <th class="cell">Description</th>
                                <th class="cell">Libell&eacute; passation</th>
                                <th class="cell">Estimation pourcentage &eacute;ffectu&eacute;</th>
                                <th class="cell">Matricule</th>
                                <th class="cell">Nom</th>
                                <th class="cell">Pr&eacute;nom(s)</th>
                                <th class="cell">Email</th>
                                <th class="cell">date demande</th>
                                <th class="cell">Date de debut </th>
                                <th class="cell">Date de fin </th>
                                <th class="cell">&eacute;tat passation</th>
                                <th class="cell">Action</th>


                            </tr>
                        </thead>


                         <tbody>


                            @forelse ($ActivitpassValider as $ActivitpasstValider )

                            <tr>
                                <td class="cell">{{ $ActivitpasstValider->idpasst }}</td>
                                <td class="cell">{{ $ActivitpasstValider->code_activite }}</td>
                                <td class="cell">{{ $ActivitpasstValider->libelle_activite }}</td>
                                <td class="cell">{{ $ActivitpasstValider->description }}</td>
                                <td class="cell">{{ $ActivitpasstValider->libpasst }}</td>
                                <td class="cell">{{ $ActivitpasstValider->pourcen_travail_eff }}</td>
                                <td class="cell">{{ $ActivitpasstValider->matrcl }}</td>

                                <td class="cell">{{ $ActivitpasstValider->nam }}</td>
                                <td class="cell">{{ $ActivitpasstValider->renam }}</td>
                                <td class="cell">{{ $ActivitpasstValider->eml }}</td>
                                <td class="cell">{{ $ActivitpasstValider->datedmd }}</td>
                                <td class="cell">{{ $ActivitpasstValider->date_debut }}</td>
                                <td class="cell">{{ $ActivitpasstValider->date_fin }}</td>


                                @if($ActivitpasstValider->etatpassman == $StatutValpassMan )
                                <td class="cell"><span class="badge bg-warning">En Attente </span></td>

                                @endif



                            </tr>

                            @empty

                            <tr>
                                <td class="cell justify-content-center" colspan="20">Aucune passation valid&eacute;e</td>

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
                                <th class="cell">ID</th>
                                <th class="cell">Code activit&eacute;</th>
                                <th class="cell">Type activite</th>
                                <th class="cell">Description</th>
                                <th class="cell">Libell&eacute; passation</th>
                                <th class="cell">Estimation pourcentage &eacute;ffectu&eacute;</th>
                                <th class="cell">Matricule</th>
                                <th class="cell">Nom</th>
                                <th class="cell">Pr&eacute;nom(s)</th>
                                <th class="cell">Email</th>
                                <th class="cell">date demande</th>
                                <th class="cell">Date de debut </th>
                                <th class="cell">Date de fin </th>
                                <th class="cell">&eacute;tat passation</th>
                                <th class="cell">Action</th>


                            </tr>
                        </thead>

                        <tbody>


                            @forelse ($ActivitpassRefuser as $ActivitpasstRefuser )

                            <tr>
                                <td class="cell">{{ $ActivitpasstRefuser->idpasst }}</td>
                                <td class="cell">{{ $ActivitpasstRefuser->code_activite }}</td>
                                <td class="cell">{{ $ActivitpasstRefuser->libelle_activite }}</td>
                                <td class="cell">{{ $ActivitpasstRefuser->description }}</td>
                                <td class="cell">{{ $ActivitpasstRefuser->libpasst }}</td>
                                <td class="cell">{{ $ActivitpasstRefuser->pourcen_travail_eff }}</td>
                                <td class="cell">{{ $ActivitpasstRefuser->matrcl }}</td>

                                <td class="cell">{{ $ActivitpasstRefuser->nam }}</td>
                                <td class="cell">{{ $ActivitpasstRefuser->renam }}</td>
                                <td class="cell">{{ $ActivitpasstRefuser->eml }}</td>
                                <td class="cell">{{ $ActivitpasstRefuser->datedmd }}</td>
                                <td class="cell">{{ $ActivitpasstRefuser->date_debut }}</td>
                                <td class="cell">{{ $ActivitpasstRefuser->date_fin }}</td>


                                @if($ActivitpasstRefuser->etatpassman == $StatutRefpassMan )
                                <td class="cell"><span class="badge bg-warning">Refus&eacute; </span></td>

                                @endif



                            </tr>

                            @empty

                            <tr>
                                <td class="cell justify-content-center" colspan="20">Aucune passation refus&eacute;e</td>

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
