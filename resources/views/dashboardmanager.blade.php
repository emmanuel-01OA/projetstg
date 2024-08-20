

@extends('layouts.manager.template')

@section('content')
<!--//conteneur-->

<h1 class="app-page-title">Dashboard </h1>



<div class="row g-4 mb-4">
    <div class="col-6 col-lg-3">
        <div class="app-card app-card-stat shadow-sm h-100">
            <div class="app-card-body p-3 p-lg-4">
                <h4 class="stats-type mb-1">Total Utilisateur</h4>
                <div class="stats-figure">5</div>

            </div><!--//app-card-body-->
            <a class="app-card-link-mask" href="#"></a>
        </div><!--//app-card-->
    </div><!--//col-->

    <div class="col-6 col-lg-3">
        <div class="app-card app-card-stat shadow-sm h-100">
            <div class="app-card-body p-3 p-lg-4">
                <h4 class="stats-type mb-1">Total personnel</h4>
                <div class="stats-figure">12</div>

            </div><!--//app-card-body-->
            <a class="app-card-link-mask" href="#"></a>
        </div><!--//app-card-->
    </div><!--//col-->
    <div class="col-6 col-lg-3">
        <div class="app-card app-card-stat shadow-sm h-100">
            <div class="app-card-body p-3 p-lg-4">
                <h4 class="stats-type mb-1">TOTAL PASSATION ACTIVITES</h4>
                <div class="stats-figure">0</div>

            </div><!--//app-card-body-->
            <a class="app-card-link-mask" href="#"></a>
        </div><!--//app-card-->
    </div><!--//col-->
    <div class="col-6 col-lg-3">
        <div class="app-card app-card-stat shadow-sm h-100">
            <div class="app-card-body p-3 p-lg-4">
                <h4 class="stats-type mb-1">TOTAL DEMANDE CONGES</h4>
                <div class="stats-figure">50</div>

            </div><!--//app-card-body-->
            <a class="app-card-link-mask" href="#"></a>
        </div><!--//app-card-->
    </div><!--//col-->
</div><!--//row-->



    {{-- <div class="col-12 col-lg-6">
        <div class="app-card app-card-chart h-100 shadow-sm">
            <div class="app-card-header p-3">
                <div class="row justify-content-between align-items-center">
                    <div class="col-auto">
                        <h4 class="app-card-title">Bar Chart Example</h4>
                    </div><!--//col-->
                    <div class="col-auto">
                        <div class="card-header-action">
                            <a href="charts.html">More charts</a>
                        </div><!--//card-header-actions-->
                    </div><!--//col-->
                </div><!--//row-->
            </div><!--//app-card-header-->
            <div class="app-card-body p-3 p-lg-4">
                <div class="mb-3 d-flex">
                    <select class="form-select form-select-sm ms-auto d-inline-flex w-auto">
                        <option value="1" selected>This week</option>
                        <option value="2">Today</option>
                        <option value="3">This Month</option>
                        <option value="3">This Year</option>
                    </select>
                </div>
                <div class="chart-container">
                    <canvas id="canvas-barchart" ></canvas>
                </div>
            </div><!--//app-card-body-->
        </div><!--//app-card-->
    </div><!--//col-->




</div><!--//row-->
<div class="row g-4 mb-4">
    <div class="col-12 col-lg-6">
        <div class="app-card app-card-progress-list h-100 shadow-sm">
            <div class="app-card-header p-3">
                <div class="row justify-content-between align-items-center">
                    <div class="col-auto">
                        <h4 class="app-card-title">Progress</h4>
                    </div><!--//col-->
                    <div class="col-auto">
                        <div class="card-header-action">
                            <a href="#">All projects</a>
                        </div><!--//card-header-actions-->
                    </div><!--//col-->
                </div><!--//row-->
            </div><!--//app-card-header-->
            <div class="app-card-body">
                <div class="item p-3">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="title mb-1 ">Project lorem ipsum dolor sit amet</div>
                            <div class="progress">
<div class="progress-bar bg-success" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>
                        </div><!--//col-->
                        <div class="col-auto">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
</svg>
                        </div><!--//col-->
                    </div><!--//row-->
                    <a class="item-link-mask" href="#"></a>
                </div><!--//item-->


                 <div class="item p-3">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="title mb-1 ">Project duis aliquam et lacus quis ornare</div>
                            <div class="progress">
<div class="progress-bar bg-success" role="progressbar" style="width: 34%;" aria-valuenow="34" aria-valuemin="0" aria-valuemax="100"></div>
</div>
                        </div><!--//col-->
                        <div class="col-auto">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
</svg>
                        </div><!--//col-->
                    </div><!--//row-->
                    <a class="item-link-mask" href="#"></a>
                </div><!--//item-->

                <div class="item p-3">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="title mb-1 ">Project</div>
                            <div class="progress">
<div class="progress-bar bg-success" role="progressbar" style="width: 68%;" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100"></div>
</div>
                        </div><!--//col-->
                        <div class="col-auto">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
</svg>
                        </div><!--//col-->
                    </div><!--//row-->
                    <a class="item-link-mask" href="#"></a>
                </div><!--//item-->

                <div class="item p-3">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="title mb-1 ">Project sed tempus felis id lacus pulvinar</div>
                            <div class="progress">
<div class="progress-bar bg-success" role="progressbar" style="width: 52%;" aria-valuenow="52" aria-valuemin="0" aria-valuemax="100"></div>
</div>
                        </div><!--//col-->
                        <div class="col-auto">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
</svg>
                        </div><!--//col-->
                    </div><!--//row-->
                    <a class="item-link-mask" href="#"></a>
                </div><!--//item-->

            </div><!--//app-card-body-->
        </div><!--//app-card-->
    </div><!--//col--> --}}
    {{--  --}}
</div><!--//row-->



</div><!--//row-->

@endsection('content')
