@extends('layouts.manager.template')

@section('content')



<div class="row g-3 mb-4 align-items-center justify-content-between">
    <div class="col-auto">
        <h1 class="app-page-title mb-0">Visualisation des Cong&eacute;s</h1>
    </div>
    <div class="col-auto">
         <div class="page-utilities">
            <div class="row g-2 justify-content-start justify-content-md-end align-items-center">

               <div class="col-auto">


                    {{-- <a class="tw-text-white tw-bg-red-700 hover:bg-red-800 focus:tw-ring-4 focus:tw-ring-red-300 tw-font-medium tw-rounded-lg tw-text-sm tw-px-5 tw-py-2.5 tw-me-2 tw-mb-2 dark:tw-bg-red-600 dark:hover:tw-bg-red-600 focus:tw-outline-none dark:focus:tw-ring-red-800" href="{{ route('mespassation.create') }}" style="color: beige">Retour</a> --}}
                </div>
            </div><!--//row-->
        </div><!--//table-utilities-->
    </div><!--//col-auto-->
</div><!--//row-->


<nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
    <a class="flex-sm-fill text-sm-center nav-link active" id="orders-all-tab" data-bs-toggle="tab" href="#orders-all" role="tab" aria-controls="orders-all" aria-selected="true">Visualisation des conges </a>
    <a class="flex-sm-fill text-sm-center nav-link"  id="orders-paid-tab" data-bs-toggle="tab" href="#orders-paid" role="tab" aria-controls="orders-paid" aria-selected="false">Visualisation des mois des cong&eacute;s </a>

</nav>



<div class="tab-content" id="orders-table-tab-content">

    <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">


        {{-- affichage Data --}}
    <div class="tw-w-full tw-p-4 tw-text-center tw-bg-white tw-border tw-border-gray-200 tw-rounded-lg tw-shadow sm:tw-p-8 dark:tw-bg-gray-800 dark:tw-border-gray-700">


      <div class="tw-items-center tw-justify-center tw-space-y-4 sm:tw-flex sm:tw-space-y-0 sm:tw-space-x-4 rtl:tw-space-x-reverse">

{{--
  <script>
    document.addEventListener('DOMContentLoaded', function () {
        var ctx = document.getElementById('activityChart').getContext('2d');
        var activityChart = new Chart(ctx, {
            type: 'bar', // Type de graphique : barres horizontales
            data: {
                labels: @json($labels), // Titres des activités
                datasets: [{
                    label: 'Durée des Activités (jours)',
                    data: @json($durations), // Durée calculée en jours
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                    barThickness: 18 // Épaisseur des barres
                }]
            },
            options: {
                indexAxis: 'y', // Afficher les barres horizontalement

                scales: {
                    x: {
                        beginAtZero: true
                    },
                    y: {
                        beginAtZero: true
                    }
                },
//

            }
        });
    });
</script> --}}

    </div>
</div>

{{-- fin affichage data --}}

    </div>






    <div class="tab-pane fade" id="orders-paid" role="tabpanel" aria-labelledby="orders-paid-tab">

        <div class="tw-w-full tw-p-4 tw-text-center tw-bg-white tw-border tw-border-gray-200 tw-rounded-lg tw-shadow sm:tw-p-8 dark:tw-bg-gray-800 dark:tw-border-gray-700">
            <div class="tw-items-center tw-justify-center tw-space-y-4 sm:tw-flex sm:tw-space-y-0 sm:tw-space-x-4 rtl:tw-space-x-reverse">



        <div class="container">
            <h1>Visualisation des Congés par Mois</h1>
            <canvas id="congesChart" width="400" height="200"></canvas>
        </div>

        <script>
            const ctx = document.getElementById('congesChart').getContext('2d');
            const congesChart = new Chart(ctx, {
                type: 'bar', // Type de graphique
                data: {
                    labels: @json($months), // Labels (mois)
                    datasets: [{
                        label: 'Taux de congés calendaire',
                        data: @json($counts), // Données (nombre de congés)
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Taux de Congés'
                            }
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'Mois'
                            }
                        }
                    },

                    plugins: {
                        legend: {
                            display: true,
                            position: 'top',
                        }
                    }

                }
            });
        </script>



{{--  --}}

            </div>
        </div>






    </div>




    </div>


</div>


@endsection
