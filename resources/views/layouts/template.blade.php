<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Plann</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">
    <link rel="shortcut icon" href="favicon.ico">

    <!-- configurer taiwind CSS -->
    @vite('resources/css/app.css')

    @vite('resources/js/app.js')
    <script src="{{ mix('js/app.js') }}" defer></script>

    <script src="{{ asset('assets/js/dhtmlgantt.js') }}"></script>

    <link id="theme-style" rel="stylesheet" href="{{ asset('assets/css/dhtml.css') }}">

    <script src="{{ asset('assets/js/chartJS.js') }}"></script>

    <!-- FontAwesome JS-->
    <script defer src="{{ asset('assets/plugins/fontawesome/js/all.min.js') }}"></script>

    <!-- App CSS -->
    <link id="theme-style" rel="stylesheet" href="{{ asset('assets/css/portal.css') }}">

    {{-- mode nuit  --}}
    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>


<style>
    html, body {
        height: 100%;
        margin: 0;
        padding: 0;
    }
    #gantt_here {
        width: 100%;
        height: 100%;
    }
</style>

</head>



<body class="app">
    <header class="app-header fixed-top">

        @include('layouts.topbar');


        @include('layouts.sidebar');

<!--//app-header-inner-->

    </header><!--//app-header-->

    <div class="app-wrapper">

	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">

			  @yield('content')

		    </div><!--//container-fluid-->
	    </div><!--//app-content-->

	    <footer class="app-footer">
		    <div class="container text-center py-3">

		    </div>
	    </footer>
    </div><!--//app-wrapper-->


    <!-- Javascript -->
    <script src="{{ asset('assets/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- Charts JS -->
    <script src="{{ asset('assets/plugins/chart.js/chart.min.js') }}"></script>
    <script src="{{ asset('assets/js/index-charts.js') }}"></script>

    <!-- Page Specific JS -->
    <script src="{{ asset('assets/js/app.js') }}"></script>



    <script>
        function openEditModal(task) {
            this.openModal = false;
            this.openEditModal = true;
            this.task = task;
        }
    </script>

</body>
</html>

