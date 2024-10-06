<!DOCTYPE html>
<html class="tw-h-full tw-bg-white" lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LoginPlann</title>

    @vite('resources/css/app.css')

    <script defer src="{{ asset('assets/plugins/fontawesome/js/all.min.js') }}"></script>

    <!-- App CSS -->
    <link id="theme-style" rel="stylesheet" href="{{ asset('assets/css/portal.css') }}">

</head>
{{-- <body>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:700,600" rel="stylesheet" type="text/css" />


    <link href="{{ asset('style/styleAuth.css') }}" rel="stylesheet" type="text/css" /> --}}

    {{-- <html class="tw-h-full tw-bg-white"> --}}
  <body class="tw-h-full">

    <div class="tw-flex tw-min-h-full tw-flex-col tw-justify-center tw-px-10 tw-py-6 lg:tw-px-8">
        <div class="sm:tw-mx-auto sm:tw-w-full sm:tw-max-w-sm">
          <img class="tw-mx-auto tw-h-16 tw-w-auto" src="{{ asset('assets/images/logo-sgabs.png') }}" alt="Your Company"/>
        </div>






        <div class="tw-mt-10 sm:tw-mx-auto sm:tw-w-full sm:tw-max-w-sm">
            <form class="tw-space-y-6" method="POST" action="{{ route('handlerLogin') }}">
                <div class="box">
                @csrf
              {{-- @method('POST') --}}

                @if(@Session:: get('error_msg'))

       <b style="align-content: center; color:rgb(224, 14, 14) ">{{ Session::get('error_msg') }} </b>

        @endif

              <div>
                <label for="email" class="tw-block tw-text-sm tw-font-medium tw-leading-6 tw-text-gray-900">Email : </label>
                <div class="tw-mt-2">
                  <input id="email" type="email" name="email" value="{{ old('email') }}" autocomplete="email" required class="tw-block tw-w-full tw-rounded-md tw-border-0 tw-py-1.5 tw-text-gray-900 tw-shadow-sm tw-ring-1 tw-ring-inset tw-ring-gray-300 placeholder:tw-text-gray-400 focus:tw-ring-2 focus:tw-ring-inset focus:tw-ring-red-600 sm:tw-text-sm sm:tw-leading-6">
                  @error('email')

                  {{ $message }}
                  @enderror
                </div>
              </div>

              <div>
                <div class="tw-flex tw-items-center tw-justify-between">
                  <label for="password" class="tw-block tw-text-sm tw-font-medium tw-leading-6 tw-text-gray-900">Mot de passe :</label>
                  {{-- <div class="tw-text-sm">
                    <a href="#" class="tw-font-semibold tw-text-red-600 hover:tw-text-red-500">Forgot password?</a>
                  </div> --}}
                </div>
                <div class="tw-mt-2">
                  <input id="password" name="password" type="password" autocomplete="current-password" class="tw-block tw-w-full tw-rounded-md tw-border-0 tw-py-1.5 tw-text-gray-900 tw-shadow-sm tw-ring-1 tw-ring-inset tw-ring-gray-300 placeholder:tw-text-gray-400 focus:tw-ring-2 focus:tw-ring-inset focus:tw-ring-red-600 sm:tw-text-sm sm:tw-leading-6">

                  @error('password')

                  {{ $message }}
                  @enderror


                </div>
              </div>

              <p class="mt-10 text-center text-sm text-gray-500">

                <a href="#" class="font-semibold leading-6 text-red-600 hover:text-red-500"></a>
              </p>

              <div>
                <button type="submit" class="tw-flex tw-w-full tw-justify-center tw-rounded-md tw-bg-red-600 tw-px-3 tw-py-1.5 tw-text-sm tw-font-semibold tw-leading-6 tw-text-white tw-shadow-sm hover:tw-bg-red-500 focus-visible:tw-outline tw-focus-visible:outline-2 focus-visible:tw-outline-offset-2 tw-focus-visible:tw-outline-red-800">Connexion </button>
              </div>
            </form>
        </div>
        </div>
    </div>





<script>

async function login(email, password) {
    const response = await fetch('/api/login', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ email, password }),
    });

    if (response.ok) {
        const data = await response.json();
        // Stocker le token avec un identifiant unique (par exemple, horodatage)
        localStorage.setItem(`token_${Date.now()}`, data.token);
    } else {
        // Gérer l'erreur de connexion
        console.error('Échec de la connexion');
    }
}

// Fonction pour faire une requête API avec le token sélectionné
async function fetchProtectedData(selectedToken) {
    const response = await fetch('/api/protected-route', {
        method: 'GET',
        headers: {
            'Authorization': `Bearer ${selectedToken}`,
        },
    });

    if (response.ok) {
        const data = await response.json();
        console.log(data);
    } else {
        console.error('Échec de la requête');
    }
}


// Exemple de fonction pour lister les tokens stockés
function listStoredTokens() {
    const tokens = Object.keys(localStorage).filter(key => key.startsWith('token_'));
    return tokens.map(key => localStorage.getItem(key));
}


</script>





{{--
<form method="post" action="{{ route('handlerLogin') }}">

    @csrf
    @method('POST')

    <div class="box">
        <h1>Login Plann</h1>

        @if(@Session:: get('error_msg'))

       <b style="align-content: center; color:rgb(224, 14, 14) ">{{ Session::get('error_msg') }} </b>

        @endif
        <input type="email" name="email" class="email" />

        <input type="password" name="password" class="email" />

        <div class="btn-container">
            <button type="submit"> Connexion </button>
        </div>

        <!-- End Btn -->
        <!-- End Btn2 -->
    </div>
    <!-- End Box -->
</form> --}}


</body>
</html>
