
@extends('layouts.manager.template')

@section('content')



<div class="row g-3 mb-4 align-items-center justify-content-between">
    <div class="col-auto">
        <h1 class="app-page-title mb-0">Planification Cong&eacute;s personnels du 31/01/23 au 31/01/24</h1>
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
{{--
                    <select class="form-select w-auto" >
                          <option selected value="option-1">Mes Cong&eacute;</option>
                          <option value="orders-paid-tab" id="orders-paid-tab" >Activit&eacute; en cour</option>
                    </select> --}}
                </div>
                <div class="col-auto">

                    <a class="tw-text-white tw-bg-red-700 hover:bg-red-800 focus:tw-ring-4 focus:tw-ring-red-300 tw-font-medium tw-rounded-lg tw-text-sm tw-px-5 tw-py-2.5 tw-me-2 tw-mb-2 dark:tw-bg-red-600 dark:hover:tw-bg-red-600 focus:tw-outline-none dark:focus:tw-ring-red-800" href="#" style="color: beige"> Editer le planning</a>
                </div>
            </div><!--//row-->
        </div><!--//table-utilities-->
    </div><!--//col-auto-->
</div><!--//row-->


<nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
    <a class="flex-sm-fill text-sm-center nav-link active" id="orders-all-tab" data-bs-toggle="tab" href="#orders-all" role="tab" aria-controls="orders-all" aria-selected="true">Les cong&eacute;s planifi&eacute;s</a>
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

                                <th class="cell">Matricule</th>
                                <th class="cell">Nom </th>
                                <th class="cell">Pr&eacute;nom</th>
                                <th class="cell">statut entreprise</th>
                                <th class="cell">email</th>
                                <th class="cell">fonction</th>
                                <th class="cell">taux congés total</th>
                                <th class="cell">1 ere tranche date d&eacute;but</th>
                                <th class="cell" >1 ere tranche date fin</th>
                                <th class="cell">2e tranche date d&eacute;but </th>
                                <th class="cell">2e tranche date fin</th>
                                {{-- <th class="cell" >description</th> --}}
                                <th class="cell" >taux restant</th>



                            </tr>
                        </thead>
                        <tbody>


                            @forelse ($conges as $congesP )

                            <tr>
                                <td class="cell">{{ $congesP->matrcl }}</td>
                                <td class="cell">{{ $congesP->nam }}</td>
                                <td class="cell"><span class="truncate">{{ $congesP->renam }}</span></td>

                                <td class="cell"><span class="truncate">{{ $congesP->type_statut }}</span></td>

                                <td class="cell"><span class="truncate">{{ $congesP->eml }}</span></td>
                                <td class="cell"><span class="truncate">{{ $congesP->libelle_fonct }}</span></td>

                                <td class="cell"><span class="truncate">{{ $congesP->taux_conges }}</span></td>

                                <td class="cell"><span class="truncate">{{ \Carbon\Carbon::parse($congesP->date_depart)->format('d/m/y')  }}</span></td>
                                <td class="cell"><span class="truncate">{{ \Carbon\Carbon::parse($congesP->date_arrive)->format('d/m/y')  }}</span></td>

                                <td class="cell"><span class="truncate"></span></td>
                                <td class="cell"><span class="truncate"></span></td>


                                <td class="cell"><span class="truncate">{{ $congesP->taux_rest }}</span></td>



                                {{-- @if($activites-> =="1" )


                                {{-- @else --}}

                                {{-- <td class="cell"><span class="badge bg-danger">Inactif</span></td> --}}
                                {{-- @endif

                            </tr> --}}

                            @empty

                            <tr>
                                <td class="cell text-center" colspan="20">Aucun cong&eacute; enregistr&eacute;</td>

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

{{--
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

                            @endforelse   --}}

                        </tbody>
                    </table>
                </div><!--//table-responsive-->
            </div><!--//app-card-body-->
        </div><!--//app-card-->
    </div><!--//tab-pane-->


</div><!--//tab-content-->



</div><!--//container-fluid-->




@endsection
