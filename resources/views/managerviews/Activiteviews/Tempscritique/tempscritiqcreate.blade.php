
@extends('layouts.manager.template')

@section('content')


<div class="row g-3 mb-4 align-items-center justify-content-between">
    <div class="col-auto">
        <h1 class="app-page-title mb-0">PLANIFICATION DE TEMPS CRITIQUE(S)</h1>
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
                          <option selected value="option-1">Statut personnel</option>
                          <option value="orders-paid-tab" id="orders-paid-tab" >Statut inactif</option>
                    </select> --}}
                </div>





                <div class="col-auto">




                    <a type="button" href="{{ route('TempsCritiqActivites.index') }}" class="tw-text-white tw-bg-red-700 hover:bg-red-800 focus:tw-ring-4 focus:tw-ring-red-300 tw-font-medium tw-rounded-lg tw-text-sm tw-px-5 tw-py-2.5 tw-me-2 tw-mb-2 dark:tw-bg-red-600 dark:hover:tw-bg-red-600 focus:tw-outline-none dark:focus:tw-ring-red-800">retour</a>
                </div>
            </div><!--//row-->
        </div><!--//table-utilities-->
    </div><!--//col-auto-->
</div><!--//row-->


<nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">

</nav>
{{--  --}}

<div class="tab-content" id="orders-table-tab-content">
    <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">

        <section class="tw-bg-white dark:tw-bg-gray-900 tw-rounded-xl ">
            <div class="tw-py-8 tw-px-4 tw-mx-auto tw-max-w-2xl tw-rounded-xllg:tw-py-16">
                <h2 class="tw-mb-4 tw-text-xl tw-font-bold tw-text-gray-900 dark:tw-text-white"></h2>

                <form action="{{ route('TempsCritiqActivites.store') }}" method="POST">
                    @csrf

                    <div class="tw-grid tw-gap-4 sm:tw-grid-cols-1 sm:tw-gap-8">

                        <div class="tw-w-full">
                            <label for="activit" class="tw-block tw-mb-2 tw-text-sm tw-font-medium tw-text-gray-900 dark:tw-text-white">Selectionnez l'activit&eacute; :</label>
                            <select name="activity" id="activitySelect" class="tw-bg-gray-50 tw-border tw-border-gray-300 tw-text-gray-900 tw-text-sm tw-rounded-lg focus:tw-ring-red-600 focus:tw-border-red-600 tw-block tw-w-full tw-p-2.5 dark:tw-bg-gray-700 dark:tw-border-gray-600 dark:tw-placeholder-gray-400 dark:tw-text-white dark:focus:tw-ring-red-500 dark:focus:tw-border-red-500">

                            @forelse ( $Activite as $Activites )
                            <option selected="" class="tw-block tw-mb-2 tw-text-sm tw-font-medium tw-text-gray-900 dark:tw-text-white" value="{{ $Activites->code_activite }}"> {{ $Activites->code_activite }} - {{ $Activites->lib_act }} - {{ $Activites->description }}</option>

                        @empty
                        <option selected=""> Aucune activit&eacute;</option>

                        @endforelse

                    </select>
                 </div>


                        <div class="tw-w-full">
                            <label for="price" class="tw-block tw-mb-2 tw-text-sm tw-font-medium tw-text-gray-900 dark:tw-text-white">Motif de la planification de la p&eacute;riode critique :</label>
                            <input type="text" name="libAct" id="libAct" value="{{ old('libAct') }}" class="tw-bg-gray-50 tw-border tw-border-gray-300 tw-text-gray-900 tw-text-sm tw-rounded-lg focus:tw-ring-red-600 focus:tw-border-red-600 tw-block tw-w-full tw-p-2.5 dark:tw-bg-gray-700 dark:tw-border-gray-600 dark:tw-placeholder-gray-400 dark:tw-text-white dark:focus:tw-ring-red-500 dark:focus:tw-border-red-500" placeholder="entrez le Motif de la planification de la date critique" required>
                        </div>

                        <div class="tw-grid tw-gap-4 sm:tw-grid-cols-2 sm:tw-gap-6">


                        <div class="tw-w-full">
                            <label for="datedeb" class="tw-block tw-mb-4 tw-text-sm tw-font-medium tw-text-gray-900 dark:tw-text-white">Date du d&eacute;but du temps critique </label>
                            <input type="date" name="datedeb" id="datedeb" value="{{ old('datedeb') }}" class="tw-bg-gray-50 tw-border tw-border-gray-300 tw-text-gray-900 tw-text-sm tw-rounded-lg focus:tw-ring-red-600 focus:tw-border-red-600 tw-block tw-w-full tw-p-2.5 dark:tw-bg-gray-700 dark:tw-border-gray-600 dark:tw-placeholder-gray-400 dark:tw-text-white dark:focus:tw-ring-red-500 dark:focus:tw-border-red-500" placeholder="Entrez la date debut de l'activit&eacute;" />
                        </div>

                        <div class="tw-w-full">
                            <label for="datefin" class="tw-block tw-mb-4 tw-text-sm tw-font-medium tw-text-gray-900 dark:tw-text-white">Date finale du temps critique</label>
                            <input type="date" name="datefin" id="datefin" value="{{ old('datefin') }}" class="tw-bg-gray-50 tw-border tw-border-gray-300 tw-text-gray-900 tw-text-sm tw-rounded-lg focus:tw-ring-red-600 focus:tw-border-red-600 tw-block tw-w-full tw-p-2.5 dark:tw-bg-gray-700 dark:tw-border-gray-600 dark:tw-placeholder-gray-400 dark:tw-text-white dark:focus:tw-ring-red-500 dark:focus:tw-border-red-500" placeholder="entrez la date limite" />
                        </div>

                        </div>

                        <div class="tw-w-full">

                        </div>

                        <div class="col-auto tw-mx-auto">
                            <button type="submit" class="tw-text-white tw-bg-red-700 hover:bg-red-800 focus:tw-ring-4 focus:tw-ring-red-300 tw-font-medium tw-rounded-lg tw-text-sm tw-px-5 tw-py-2.5 tw-me-2 tw-mb-2 dark:tw-bg-red-600 dark:hover:tw-bg-red-600 focus:tw-outline-none dark:focus:tw-ring-red-800">enregistrer</button>
                        </div>




                        {{-- test affiche info activite --}}



                        <div id="activityDetails">
                            <!-- Activity details will be displayed here -->
                        </div>

                        {{-- fin test --}}
                    </form>
                </div>





            </div>
        </section>

    </div><!--//tab-pane-->


</div><!--//tab-content-->





</div><!--//container-fluid-->

{{-- <script>


        $(document).ready(function() {
            $('#activitySelect').change(function() {
                var activityId = $(this).val();

                if (activityId) {
                    $.ajax({
                        url: '/activites/' + activityId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#activityDetails').html(
                                '<p><strong>Nom:</strong> ' + data.code_activite + '</p>' +
                                '<p><strong>Status:</strong> ' + data.libelle + '</p>' +
                                '<p><strong>Start Date:</strong> ' + data.start_date + '</p>' +
                                '<p><strong>End Date:</strong> ' + data.end_date + '</p>'
                            );
                        },
                        error: function(xhr) {
                            $('#activityDetails').html('<p>Error retrieving data</p>');
                        }
                    });
                } else {
                    $('#activityDetails').empty();
                }
            });
        });


</script> --}}


@endsection
