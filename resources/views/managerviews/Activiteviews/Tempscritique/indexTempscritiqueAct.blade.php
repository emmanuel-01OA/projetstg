
@extends('layouts.manager.template')

@section('content')



<div class="row g-3 mb-4 align-items-center justify-content-between">
    <div class="col-auto">
        <h1 class="app-page-title mb-0"> Activit&eacute;s</h1>
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

                    <a class="tw-text-white tw-bg-red-700  hover:bg-red-800 focus:tw-ring-4 focus:tw-ring-red-300 tw-font-medium tw-rounded-lg tw-text-sm tw-px-5 tw-py-2.5 tw-me-2 tw-mb-2 dark:tw-bg-red-600 dark:hover:tw-bg-red-600 focus:tw-outline-none dark:focus:tw-ring-red-800tw-text-white tw-bg-red-700  hover:bg-red-800 focus:tw-ring-4 focus:tw-ring-red-300 tw-font-medium tw-rounded-lg tw-text-sm tw-px-5 tw-py-2.5 tw-me-2 tw-mb-2 dark:tw-bg-red-600 dark:hover:tw-bg-red-600 focus:tw-outline-none dark:focus:tw-ring-red-800" href="{{ route('TempsCritiqActivites.create') }}" style="color: beige"> Affecter un temps critique</a>
                </div>
            </div><!--//row-->
        </div><!--//table-utilities-->
    </div><!--//col-auto-->
</div><!--//row-->


<nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
    <a class="flex-sm-fill text-sm-center nav-link active" id="orders-all-tab" data-bs-toggle="tab" href="#orders-all" role="tab" aria-controls="orders-all" aria-selected="true">Temps critique des activit&eacute;s Actif</a>
    <a class="flex-sm-fill text-sm-center nav-link"  id="orders-paid-tab" data-bs-toggle="tab" href="#orders-paid" role="tab" aria-controls="orders-paid" aria-selected="false">Temps critique des activit&eacute;s inactif</a>

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
                                <th class="cell">Libell&eacute; activit&eacute;</th>
                                <th class="cell">type activite</th>
                                <th class="cell">Description</th>
                                <th class="cell">Date de début de l'activit&eacute;</th>
                                <th class="cell">Date limite </th>
                                <th class="cell">Statut de l'activit&eacute;</th>
                                <th class="cell">Libell&eacute; critique</th>
                                <th class="cell">Date de debut temps critique</th>
                                <th class="cell">Date de fin temps critique</th>
                                <th class="cell">&eacute;tat</th>

                                {{-- <th class="cell">2e Date de debut temps critique</th>
                                <th class="cell">2e Date de fin temps critique</th> --}}


                            </tr>
                        </thead>
                        <tbody>


                            @forelse ($TmpActactif as $TmpActactifs)

                            <tr>
                                <td class="cell">{{ $TmpActactifs->code_act }}</td>
                                <td class="cell">{{ $TmpActactifs->lib_act }}</td>
                                <td class="cell">{{ $TmpActactifs->libelle_activite }}</td>
                                <td class="cell">{{ $TmpActactifs->description }}</td>
                                <td class="cell">{{ $TmpActactifs->date_deb }}</td>
                                <td class="cell">{{ $TmpActactifs->datefin}}</td>


                                @if($TmpActactifs->statutac =="1")

                                <td class="cell">
                                <dd class="me-2 tw-mt-1.5 tw-inline-flex tw-items-center tw-rounded tw-bg-green-100 tw-px-2.5 tw-py-0.5 tw-text-xs tw-font-medium tw-text-green-800 dark:tw-bg-green-900 dark:tw-text-green-300">
                                    <svg class="me-1 tw-h-3 tw-w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11.917 9.724 16.5 19 7.5" />
                                    </svg>
                                   En cours
                                  </dd>
                                </td>

                                @elseif ($TmpActactifs->statutac =="2")
                                <td class="cell">
                                    <dd class="me-2 tw-mt-1.5 tw-inline-flex tw-items-center tw-rounded tw-bg-red-100 tw-px-2.5 tw-py-0.5 tw-text-xs tw-font-medium tw-text-red-800 dark:tw-bg-red-900 dark:tw-text-red-300">
                                        <svg class="me-1 tw-h-3 tw-w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6" />
                                        </svg>
                                        Terminer
                                      </dd>
                                </td>

                                  @elseif ($TmpActactifs->statutac =="0")

                                  <td class="cell">
                                    <dd class="me-2 tw-mt-1.5 tw-inline-flex tw-items-center tw-rounded tw-bg-green-100 tw-px-2.5 tw-py-0.5 tw-text-xs tw-font-medium tw-text-green-800 dark:tw-bg-green-900 dark:tw-text-green-300">
                                        <svg class="me-1 tw-h-3 tw-w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11.917 9.724 16.5 19 7.5" />
                                        </svg>
                                        Planifer pour plus tard
                                      </dd>
                                </td>

                                @endif

                                <td class="cell">{{ $TmpActactifs->lib_crit }}</td>

                                <td class="cell">{{ \Carbon\Carbon::parse($TmpActactifs->date_deb_crit)->format('d/m/y') }}</td>
                                <td class="cell">{{ \Carbon\Carbon::parse($TmpActactifs->date_fin_crit)->format('d/m/y') }}</td>



                                @if($TmpActactifs->etatcrip =="1" )

                               <td class="cell"><span class="badge bg-success">Inactif</span></td>


                                @else

                               <td class="cell"><span class="badge bg-danger">Inactif</span></td>
                                @endif

                            </tr>

                            @empty

                            <tr>
                                <td class="cell text-center" colspan="20">Aucun temps critique attribu&eacute;</td>

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
                                <th class="cell">Num&eacute;ro activit&eacute;</th>
                                <th class="cell">Libell&eacute; activit&eacute;</th>
                                <th class="cell">type activite</th>
                                <th class="cell">Description</th>
                                <th class="cell">Date de début de l'activit&eacute;</th>
                                <th class="cell">Date limite </th>
                                <th class="cell">Statut de l'activit&eacute;</th>
                                <th class="cell">Libell&eacute; critique</th>
                                <th class="cell">Date de debut temps critique</th>
                                <th class="cell">Date de fin temps critique</th>
                                <th class="cell">&eacute;tat</th>

                            </tr>
                        </thead>
                        <tbody>


                            @forelse ($TmpActInactif as $TmpActInactifs)

                            <tr>
                                <td class="cell">{{ $TmpActInactifs->code_act }}</td>
                                <td class="cell">{{ $TmpActInactifs->lib_act }}</td>
                                <td class="cell">{{ $TmpActInactifs->libelle_activite }}</td>
                                <td class="cell">{{ $TmpActInactifs->description }}</td>
                                <td class="cell">{{ $TmpActInactifs->date_deb }}</td>
                                <td class="cell">{{ $TmpActInactifs->datefin}}</td>




                                {{-- <td class="cell">{{ $TmpActInactifs->statutac }}</td> --}}



                                @if($TmpActInactifs->statutac =="1")

                                <td class="cell">
                                <dd class="me-2 tw-mt-1.5 tw-inline-flex tw-items-center tw-rounded tw-bg-green-100 tw-px-2.5 tw-py-0.5 tw-text-xs tw-font-medium tw-text-green-800 dark:tw-bg-green-900 dark:tw-text-green-300">
                                    <svg class="me-1 tw-h-3 tw-w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11.917 9.724 16.5 19 7.5" />
                                    </svg>
                                   En cours
                                  </dd>
                                </td>

                                @elseif ($TmpActInactifs->statutac =="2")
                                <td class="cell">
                                    <dd class="me-2 tw-mt-1.5 tw-inline-flex tw-items-center tw-rounded tw-bg-red-100 tw-px-2.5 tw-py-0.5 tw-text-xs tw-font-medium tw-text-red-800 dark:tw-bg-red-900 dark:tw-text-red-300">
                                        <svg class="me-1 tw-h-3 tw-w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6" />
                                        </svg>
                                        Terminer
                                      </dd>
                                </td>

                                  @elseif ($TmpActInactifs->statutac =="0")

                                  <td class="cell">
                                    <dd class="me-2 tw-mt-1.5 tw-inline-flex tw-items-center tw-rounded tw-bg-green-100 tw-px-2.5 tw-py-0.5 tw-text-xs tw-font-medium tw-text-green-800 dark:tw-bg-green-900 dark:tw-text-green-300">
                                        <svg class="me-1 tw-h-3 tw-w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11.917 9.724 16.5 19 7.5" />
                                        </svg>
                                        planifer pour plus tard
                                      </dd>
                                </td>

                                @endif

                                <td class="cell">{{ $TmpActInactifs->lib_crit }}</td>

                                <td class="cell">{{ \Carbon\Carbon::parse($TmpActInactifs->date_deb_crit)->format('d/m/y') }}</td>
                                <td class="cell">{{ \Carbon\Carbon::parse($TmpActInactifs->date_fin_crit)->format('d/m/y') }}</td>


                                @if($TmpActInactifs->etatcrip =="1" )

                               <td class="cell"><span class="badge bg-success">Inactif</span></td>


                                @else

                               <td class="cell"><span class="badge bg-danger">Inactif</span></td>
                                @endif

                            </tr>

                            @empty

                            <tr>
                                <td class="cell text-center" colspan="20">Aucun temps critique attribu&eacute;</td>

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
