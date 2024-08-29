
@extends('layouts.collaborateur.template')

@section('content')



<div class="row g-3 mb-4 align-items-center justify-content-between">
    <div class="col-auto">
        <h1 class="app-page-title mb-0">Passations de mes Activit&eacute;s</h1>
    </div>
    <div class="col-auto">
         <div class="page-utilities">
            <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                <div class="col-auto">


                </div><!--//col-->
                <div class="col-auto">


                </div>
                <div class="col-auto">

                    <a class="btn btn-danger" href="{{ route('mespassation.create') }}" style="color: beige">Faire une demande</a>
                </div>
            </div><!--//row-->
        </div><!--//table-utilities-->
    </div><!--//col-auto-->
</div><!--//row-->


<nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
    <a class="flex-sm-fill text-sm-center nav-link active" id="orders-all-tab" data-bs-toggle="tab" href="#orders-all" role="tab" aria-controls="orders-all" aria-selected="true">Demande(s) en attente de validation</a>
    <a class="flex-sm-fill text-sm-center nav-link"  id="orders-paid-tab" data-bs-toggle="tab" href="#orders-paid" role="tab" aria-controls="orders-paid" aria-selected="false">Demande(s) valid&eacute;e(s) </a>
    <a class="flex-sm-fill text-sm-center nav-link"  id="orders-pending-tab" data-bs-toggle="tab" href="#orders-pending" role="tab" aria-controls="orders-pending" aria-selected="false">Demande(s) refus&eacute;e(s) </a>

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
                                <th class="cell">Description</th>
                                <th class="cell">Libell&eacute; passation</th>
                                <th class="cell">Estimation pourcentage &eacute;ffectu&eacute;</th>
                                <th class="cell">Date de demande</th>
                                <th class="cell">&eacute;tat demande</th>


                            </tr>
                        </thead>
                        <tbody>


                            @forelse ($dmdpasstAttente as $dmdpasstAttentes)

                            <tr>
                                <td class="cell">{{ $dmdpasstAttentes->idpasst }}</td>
                                <td class="cell">{{ $dmdpasstAttentes->code_activite }}</td>
                                <td class="cell">{{ $dmdpasstAttentes->description }}</td>
                                <td class="cell">{{ $dmdpasstAttentes->libpasst }}</td>
                                <td class="cell">{{ $dmdpasstAttentes->pourcen_travail_eff }}</td>
                                <td class="cell">{{ $dmdpasstAttentes->datedmd }}</td>


                                @if($dmdpasstAttentes->etatd == $etatAttente)
                                <td class="cell"><span class="badge bg-warning">En Attente </span></td>

                                @endif

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
                                <th class="cell" >Code activit&eacute;</th>
                                <th class="cell" >Description</th>
                                <th class="cell">Libell&eacute; passation</th>
                                <th class="cell">Estimation pourcentage &eacute;ffectu&eacute;</th>
                                <th class="cell" >Date de demande</th>
                                <th class="cell" >&eacute;tat demande</th>
                            </tr>
                        </thead>
                        <tbody>


                            @forelse ($dmdpasstValider as $dmdpasstValiders)

                            <tr>

                                <td class="cell">{{ $dmdpasstValiders->idpasst }}</td>
                                <td class="cell">{{ $dmdpasstValiders->code_activite }}</td>
                                <td class="cell">{{ $dmdpasstValiders->description }}</td>
                                <td class="cell">{{ $dmdpasstValiders->libpasst }}</td>
                                <td class="cell">{{ $dmdpasstValiders->pourcen_travail_eff }}</td>
                                <td class="cell">{{ $dmdpasstValiders->datedmd }}</td>

                                @if($dmdpasstValiders->etatd == $etatValider )
                                <td class="cell"><span class="badge bg-success">Valid&eacute; </span></td>

                                @endif



                            </tr>

                            @empty

                            <tr>
                                <td class="cell justify-content-center" colspan="6">Aucune passation enregistr&eacute;e </td>

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
                                <th class="cell">Description</th>
                                <th class="cell">Libell&eacute; passation</th>
                                <th class="cell">Estimation pourcentage &eacute;ffectu&eacute;</th>
                                <th class="cell" >Date de demande</th>
                                <th class="cell" >&eacute;tat demande</th>
                            </tr>
                        </thead>
                        <tbody>


                            @forelse ($dmdpasstRefuser  as $dmdpasstRefuse )

                            <tr>

                                <td class="cell">{{ $dmdpasstRefuse->idpasst }}</td>
                                <td class="cell">{{ $dmdpasstRefuse->code_activite }}</td>
                                <td class="cell">{{ $dmdpasstRefuse->description }}</td>
                                <td class="cell">{{ $dmdpasstRefuse->libpasst }}</td>
                                <td class="cell">{{ $dmdpasstRefuse->pourcen_travail_eff }}</td>
                                <td class="cell">{{ $dmdpasstRefuse->datedmd }}</td>

                                @if($dmdpasstRefuse->etatd == $etatRefuser)
                                <td class="cell"><span class="badge bg-danger">Refus&eacute;</span></td>

                                @endif



                            </tr>

                            @empty

                            <tr>
                                <td class="cell justify-content-center" colspan="6">Aucune passation enregistr&eacute;e </td>

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
