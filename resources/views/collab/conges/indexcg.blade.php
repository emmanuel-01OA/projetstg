
@extends('layouts.collaborateur.template')

@section('content')



<div class="row g-3 mb-4 align-items-center justify-content-between">
    <div class="col-auto max-w-2xl sm:tw-mt-20 lg:tw-mt-24">
        <h1 class="app-page-title mb-0">Mes cong&eacute;s</h1>
    </div>

    <div class="col-auto max-w-2xl sm:tw-mt-20 lg:tw-mt-24">
    <a class="tw-text-white tw-bg-red-700  hover:bg-red-800 focus:tw-ring-4 focus:tw-ring-red-300 tw-font-medium tw-rounded-lg tw-text-sm tw-px-5 tw-py-2.5 tw-me-2 tw-mb-2 dark:tw-bg-red-600 dark:hover:tw-bg-red-600 focus:tw-outline-none dark:focus:tw-ring-red-800" href="{{ route('mescongesuser.create') }}" style="color: beige">Faire une planification congés</a>
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






                    {{-- insertion du card --}}


<div class="tw-w-full tw-p-4 tw-text-center tw-bg-white tw-border tw-border-gray-200 tw-rounded-lg tw-shadow sm:tw-p-8 dark:tw-bg-gray-800 dark:tw-border-gray-700">



    <div class="tw-items-center tw-text-gray-900 dark:tw-text-white sm:tw-p-12  tw-justify-center tw-space-y-12 sm:tw-flex sm:tw-space-y-0 sm:tw-space-x-12 rtl:tw-space-x-reverse">


        {{-- texte de card --}}

        <div class="tw-flex tw-flex-col tw-items-center tw-justify-center">
            <dd class="tw-text-gray-500 dark:tw-text-gray-400">Matricule: </dd>
            <dt class="tw-mb-2 tw-text-3xl tw-font-extrabold">{{ $matricul->matrcl }}</dt>

        </div>





        <div class="tw-flex tw-flex-col tw-items-center tw-justify-center">
            <dd class="tw-text-gray-500 dark:tw-text-gray-400"></dd>
            <dt class="tw-mb-2 tw-text-3xl tw-font-extrabold"></dt>
        </div>
        <div class="tw-flex tw-flex-col tw-items-center tw-justify-center">
            <dd class="tw-text-gray-500 dark:tw-text-gray-400"></dd>
            <dt class="tw-mb-2 tw-text-3xl tw-font-extrabold"></dt>
        </div>

        @forelse ($tblperinfocg as $tblperinfocg)


        {{-- @foreach ($tblperinfocg as $tblperinfocg) --}}
        <div class="tw-flex tw-flex-col tw-items-center tw-justify-center">
            <dd class="tw-text-gray-500 dark:tw-text-gray-400">Taux congé totale : </dd>
            <dt class="tw-mb-2 tw-text-3xl tw-font-extrabold">{{ $tblperinfocg->taux_conges   }}</dt>

        </div>

        <div class="tw-flex tw-flex-col tw-items-center tw-justify-center">
            <dd class="tw-text-gray-500 dark:tw-text-gray-400">Nom et prénom :</dd>
            <dt class="tw-mb-2 tw-text-3xl tw-font-extrabold">{{ $tblperinfocg->nam }}  {{ $tblperinfocg->renam }}</dt>
        </div>
        <div class="tw-flex tw-flex-col tw-items-center tw-justify-center">
            <dd class="tw-text-gray-500 dark:tw-text-gray-400"></dd>
            <dt class="tw-mb-2 tw-text-3xl tw-font-extrabold"></dt>
        </div>
        <div class="tw-flex tw-flex-col tw-items-center tw-justify-center">
            <dd class="tw-text-gray-500 dark:tw-text-gray-400">Taux congés restant</dd>
            <dt class="tw-mb-2 tw-text-3xl tw-font-extrabold">{{ $tblperinfocg->taux_rest }}</dt>
        </div>
        <div class="tw-flex tw-flex-col tw-items-center tw-justify-center">
            <dd class="tw-text-gray-500 dark:tw-text-gray-400"></dd>
            <dt class="tw-mb-2 tw-text-3xl tw-font-extrabold"></dt>
        </div>
        <div class="tw-flex tw-flex-col tw-items-center tw-justify-center">
            <dd class="tw-text-gray-500 dark:tw-text-gray-400"></dd>
            <dt class="tw-mb-2 tw-text-3xl tw-font-extrabold"></dt>
        </div>
        <div class="tw-flex tw-flex-col tw-items-center tw-justify-center">
            <dd class="tw-text-gray-500 dark:tw-text-gray-400">Ann&eacute;e</dd>
            <dt class="tw-mb-2 tw-text-3xl tw-font-extrabold">2024</dt>
        </div>
        <div class="tw-flex tw-flex-col tw-items-center tw-justify-center">
            <dd class="tw-text-gray-500 dark:tw-text-gray-400"></dd>
            <dt class="tw-mb-2 tw-text-3xl tw-font-extrabold"></dt>
        </div>


        @empty

         {{-- @foreach ($tblperinfocg as $tblperinfocg) --}}
         <div class="tw-flex tw-flex-col tw-items-center tw-justify-center">
            <dd class="tw-text-gray-500 dark:tw-text-gray-400">Taux congé totale : </dd>
            <dt class="tw-mb-2 tw-text-3xl tw-font-extrabold"> - </dt>

        </div>

        <div class="tw-flex tw-flex-col tw-items-center tw-justify-center">
            <dd class="tw-text-gray-500 dark:tw-text-gray-400">Nom et prénom :</dd>
            <dt class="tw-mb-2 tw-text-3xl tw-font-extrabold"> - </dt>
        </div>
        <div class="tw-flex tw-flex-col tw-items-center tw-justify-center">
            <dd class="tw-text-gray-500 dark:tw-text-gray-400"></dd>
            <dt class="tw-mb-2 tw-text-3xl tw-font-extrabold"></dt>
        </div>
        <div class="tw-flex tw-flex-col tw-items-center tw-justify-center">
            <dd class="tw-text-gray-500 dark:tw-text-gray-400">Taux congés restant</dd>
            <dt class="tw-mb-2 tw-text-3xl tw-font-extrabold"> - </dt>
        </div>
        <div class="tw-flex tw-flex-col tw-items-center tw-justify-center">
            <dd class="tw-text-gray-500 dark:tw-text-gray-400"></dd>
            <dt class="tw-mb-2 tw-text-3xl tw-font-extrabold"></dt>
        </div>
        <div class="tw-flex tw-flex-col tw-items-center tw-justify-center">
            <dd class="tw-text-gray-500 dark:tw-text-gray-400"></dd>
            <dt class="tw-mb-2 tw-text-3xl tw-font-extrabold"></dt>
        </div>
        <div class="tw-flex tw-flex-col tw-items-center tw-justify-center">
            <dd class="tw-text-gray-500 dark:tw-text-gray-400">Ann&eacute;e</dd>
            <dt class="tw-mb-2 tw-text-3xl tw-font-extrabold">2024</dt>
        </div>
        <div class="tw-flex tw-flex-col tw-items-center tw-justify-center">
            <dd class="tw-text-gray-500 dark:tw-text-gray-400"></dd>
            <dt class="tw-mb-2 tw-text-3xl tw-font-extrabold"></dt>
        </div>


        @endforelse


        {{-- @endforeach --}}

        {{-- <div class="tw-flex tw-flex-col tw-items-center tw-justify-center">
            <dt class="tw-mb-2 tw-text-3xl tw-font-extrabold">1B+</dt>
            <dd class="tw-text-gray-500 dark:tw-text-gray-400">Contributors</dd>
        </div>
        <div class="tw-flex tw-flex-col tw-items-center tw-justify-center">
            <dt class="tw-mb-2 tw-text-3xl tw-font-extrabold">90+</dt>
            <dd class="tw-text-gray-500 dark:tw-text-gray-400">Top Forbes companies</dd>
        </div> --}}
        {{-- <div class="tw-flex tw-flex-col tw-items-center tw-justify-center">
            <dt class="tw-mb-2 tw-text-3xl tw-font-extrabold">4M+</dt>
            <dd class="tw-text-gray-500 dark:tw-text-gray-400">Organizations</dd>
        </div> --}}

    </div>

</div>









                    {{-- <select class="form-select w-auto" >
                          <option selected value="option-1">Mes cong&eacute;(s)</option>

                    </select> --}}
                </div>

                <div class="col-auto">

                    {{-- <a class="btn btn-danger" href="#" style="color: beige"> Ajouter une activit&eacute;(s)</a> --}}
                </div>
            </div><!--//row-->
        </div><!--//table-utilities-->
    </div><!--//col-auto-->
</div><!--//row-->



<nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4 ">
    <a class="flex-sm-fill text-sm-center  nav-link active" id="orders-all-tab" data-bs-toggle="tab" href="#orders-all" role="tab" aria-controls="orders-all" aria-selected="true">Planification en Attente de validation</a>
    <a class="flex-sm-fill text-sm-center nav-link"  id="orders-paid-tab" data-bs-toggle="tab" href="#orders-paid" role="tab" aria-controls="orders-paid" aria-selected="false">Cong&eacute; valid&eacute;</a>
    <a class="flex-sm-fill text-sm-center nav-link"  id="orders-pending-tab" data-bs-toggle="tab" href="#orders-pending" role="tab" aria-controls="orders-pending" aria-selected="false">Planification refus&eacute;e </a>

</nav>





<div class="tab-content" id="orders-table-tab-content">
    <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
        <div class="app-card app-card-orders-table shadow-sm mb-5">
            <div class="app-card-body">
                <div class="table-responsive">
                    <table class="table app-table-hover mb-0 text-left">
                        <thead>
                            <tr>
                                <th class="cell ">ID</th>
                                <th class="cell ">description</th>
                                <th class="cell ">Taux congés</th>
                                <th class="cell ">date d&eacute;but </th>
                                <th class="cell ">date fin</th>
                                <th class="cell ">Statut</th>

                                <th class="cell ">Etat</th>
                                <th class="cell text-center" >Action(s)</th>

                            </tr>
                        </thead>
                        <tbody>


                             @forelse ($planifcg as $planifcg )

                            <tr>

                                <td class="cell" >{{ $planifcg->id_p }}</td>
                                <td class="cell">{{ $planifcg->lbelle_conges }}</td>
                                <td class="cell">{{ $planifcg->taux_plcg }}</td>
                                <td class="cell">{{ $planifcg->date_depart }}</td>
                                <td class="cell">{{ $planifcg->date_arrive }}</td>

                                @if($planifcg->etatvalidpl =="1" )
                                <td class="cell"><span class="badge bg-warning">En Attente</span></td>


                                @elseif ($planifcg->etatvalidpl =="2" )

                                <td class="cell"><span class="badge bg-succes">Valid&eacute;</span></td>


                                @elseif ($planifcg->etatvalidpl =="0" )

                                <td class="cell"><span class="badge bg-danger">Refus&eacute;</span></td>


                                @else

                                <td class="cell text-center">Aucun statut</td>

                                @endif







                                @if($planifcg->etatf =="1" )
                                <td class="cell"><span class="badge bg-success">Actif</span></td>


                                @else

                                <td class="cell"><span class="badge bg-danger">Inactif</span></td>
                                @endif






                                <td class="cell">

                                    <a href=""  class="flex tw-items-center  tw-text-white hover:tw-bg-gray-100 hover:tw-text-green-800 tw-border hover:tw-border-green-700 tw-bg-green-700 tw-bg-white-700 focus:tw-ring-4 focus:tw-outline-none focus:tw-ring-green-300 tw-font-medium tw-rounded-lg tw-text-sm tw-px-3 tw-py-2 tw-text-center dark:tw-border-green-500 dark:tw-text-green-500 dark:hover:tw-text-white dark:hover:tw-bg-green-600 dark:focus:tw-ring-green-900">

                                        Modifier </a>
                                        {{-- @include('collab.passation.modaledecision.modalaccpass') --}}

                                </td>

                              <td class="cell">

                                <a href="" class="flex tw-items-center tw-text-white hover:tw-text-red-700 hover:tw-bg-gray-100 tw-border hover:tw-border-red-700 tw-bg-red-800 focus:tw-ring-4 focus:tw-outline-none focus:tw-ring-red-300 tw-font-medium tw-rounded-lg tw-text-sm tw-px-3 tw-py-2 tw-text-center dark:tw-border-red-500 dark:tw-text-red-500 dark:hover:tw-text-white dark:hover:tw-bg-red-600 dark:focus:tw-ring-red-900"> Annuler </a>
{{--
                                    @include('collab.passation.modaledecision.modalRefdmdpass') --}}
                             </td>



                            </tr>

                            @empty

                            <tr>
                                <td class="cell text-center" colspan="20">Aucune plannification de cong&eacute;(s) enregistr&eacute;</td>
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
                                <th class="cell ">ID</th>
                                <th class="cell ">description</th>
                                <th class="cell ">Taux congés</th>
                                <th class="cell ">date d&eacute;but </th>
                                <th class="cell ">date fin</th>
                                <th class="cell ">Statut</th>

                                <th class="cell ">Etat</th>
                                <th class="cell text-center">Action(s)</th>

                            </tr>
                        </thead>
                        <tbody>


                             @forelse ($planifcgval as $planifcg )

                            <tr>

                                <td class="cell" >{{ $planifcgval->id_p }}</td>
                                <td class="cell">{{ $planifcgval->lbelle_conges }}</td>
                                <td class="cell">{{ $planifcgval->taux_plcg }}</td>
                                <td class="cell">{{ $planifcgval->date_depart }}</td>
                                <td class="cell">{{ $planifcgval->date_arrive }}</td>

                                @if($planifcgval->etatvalidpl =="1" )
                                <td class="cell"><span class="badge bg-warning">En Attente</span></td>


                                @elseif ($planifcgval->etatvalidpl =="2" )

                                <td class="cell"><span class="badge bg-succes">Valid&eacute;</span></td>


                                @elseif ($planifcgval->etatvalidpl =="0" )

                                <td class="cell"><span class="badge bg-danger">Refus&eacute;</span></td>


                                @else

                                <td class="cell text-center">Aucun statut</td>

                                @endif







                                @if($planifcgval->etatf =="1" )
                                <td class="cell"><span class="badge bg-success">Actif</span></td>


                                @else

                                <td class="cell"><span class="badge bg-danger">Inactif</span></td>
                                @endif






                                <td class="cell" >

                                    <a href=""  class="flex tw-items-center  tw-text-white hover:tw-bg-gray-100 hover:tw-text-green-800 tw-border hover:tw-border-green-700 tw-bg-green-700 tw-bg-white-700 focus:tw-ring-4 focus:tw-outline-none focus:tw-ring-green-300 tw-font-medium tw-rounded-lg tw-text-sm tw-px-3 tw-py-2 tw-text-center dark:tw-border-green-500 dark:tw-text-green-500 dark:hover:tw-text-white dark:hover:tw-bg-green-600 dark:focus:tw-ring-green-900">

                                        Modifier </a>
                                        {{-- @include('collab.passation.modaledecision.modalaccpass') --}}

                                </td>

                              <td class="cell">

                                <a href="" class="flex tw-items-center tw-text-white hover:tw-text-red-700 hover:tw-bg-gray-100 tw-border hover:tw-border-red-700 tw-bg-red-800 focus:tw-ring-4 focus:tw-outline-none focus:tw-ring-red-300 tw-font-medium tw-rounded-lg tw-text-sm tw-px-3 tw-py-2 tw-text-center dark:tw-border-red-500 dark:tw-text-red-500 dark:hover:tw-text-white dark:hover:tw-bg-red-600 dark:focus:tw-ring-red-900"> Annuler </a>
{{--
                                    @include('collab.passation.modaledecision.modalRefdmdpass') --}}
                             </td>



                            </tr>

                            @empty

                            <tr>
                                <td class="cell text-center" colspan="20">Aucune planification de cong&eacute;(s) enregistr&eacute;</td>
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
        </nav>
    </div><!--//tab-pane-->


{{-- tab pane --}}

    <div class="tab-pane fade" id="orders-pending" role="tabpanel" aria-labelledby="orders-pending-tab">
        <div class="app-card app-card-orders-table mb-5">
            <div class="app-card-body">
                <div class="table-responsive">
                    <table class="table mb-0 text-left">
                        <thead>
                            <thead>
                                <tr>
                                    <th class="cell ">ID</th>
                                    <th class="cell ">description</th>
                                    <th class="cell ">Taux congés</th>
                                    <th class="cell ">date d&eacute;but </th>
                                    <th class="cell ">date fin</th>
                                    <th class="cell ">Statut</th>

                                    <th class="cell ">Etat</th>
                                    <th class="cell text-center" >Action(s)</th>

                                </tr>
                            </thead>
                            <tbody>


                                 @forelse ($planifcgref as $planifcg )

                                <tr>

                                    <td class="cell" >{{ $planifcgref->id_p }}</td>
                                    <td class="cell">{{ $planifcgref->lbelle_conges }}</td>
                                    <td class="cell">{{ $planifcgref->taux_plcg }}</td>
                                    <td class="cell">{{ $planifcgref->date_depart }}</td>
                                    <td class="cell">{{ $planifcgref->date_arrive }}</td>

                                    @if($planifcgref->etatvalidpl =="1" )
                                    <td class="cell"><span class="badge bg-warning">En Attente</span></td>


                                    @elseif ($planifcgref->etatvalidpl =="2" )

                                    <td class="cell"><span class="badge bg-succes">Valid&eacute;</span></td>


                                    @elseif ($planifcgref->etatvalidpl =="0" )

                                    <td class="cell"><span class="badge bg-danger">Refus&eacute;</span></td>


                                    @else

                                    <td class="cell text-center">Aucun statut</td>

                                    @endif







                                    @if($planifcgref->etatf =="1" )
                                    <td class="cell"><span class="badge bg-success">Actif</span></td>


                                    @else

                                    <td class="cell"><span class="badge bg-danger">Inactif</span></td>
                                    @endif






                                    <td class="cell">

                                        <a href=""  class="flex tw-items-center  tw-text-white hover:tw-bg-gray-100 hover:tw-text-green-800 tw-border hover:tw-border-green-700 tw-bg-green-700 tw-bg-white-700 focus:tw-ring-4 focus:tw-outline-none focus:tw-ring-green-300 tw-font-medium tw-rounded-lg tw-text-sm tw-px-3 tw-py-2 tw-text-center dark:tw-border-green-500 dark:tw-text-green-500 dark:hover:tw-text-white dark:hover:tw-bg-green-600 dark:focus:tw-ring-green-900">

                                            Modifier </a>
                                            {{-- @include('collab.passation.modaledecision.modalaccpass') --}}

                                    </td>

                                  <td class="cell">

                                    <a href="" class="flex tw-items-center tw-text-white hover:tw-text-red-700 hover:tw-bg-gray-100 tw-border hover:tw-border-red-700 tw-bg-red-800 focus:tw-ring-4 focus:tw-outline-none focus:tw-ring-red-300 tw-font-medium tw-rounded-lg tw-text-sm tw-px-3 tw-py-2 tw-text-center dark:tw-border-red-500 dark:tw-text-red-500 dark:hover:tw-text-white dark:hover:tw-bg-red-600 dark:focus:tw-ring-red-900"> Annuler </a>
    {{--
                                        @include('collab.passation.modaledecision.modalRefdmdpass') --}}
                                 </td>



                                </tr>

                                @empty

                                <tr>
                                    <td class="cell text-center" colspan="20">Aucune planification de cong&eacute;(s) enregistr&eacute;</td>
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
