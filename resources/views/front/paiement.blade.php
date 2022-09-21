@extends('front.layouts.template')
@section('content')
    {{-- <div style="height: 500px;" class="d-flex justify-content-center align-items-center flex-column">
        
        @if(session('addedDemandeMessage'))
            <div class="alert alert-success mb-3">
                <h6> {{ session('addedDemandeMessage') }}</h6>
            </div>
        @endif

        <div class="d-flex justify-content-center align-items-center">
            <button class="btn btn-lg btn-danger kkiapay-button" id="button" class="">Payer maintentenant</button>
        </div>
    </div> --}}




    <section >
        <div class="container-fluid mt-5 mb-5">
            <div class="container rosette-bg-green py-5 rounded text-white d-flex justify-content-center align-items-center flex-column">
                <h2 class="text-center h1-inscription fw-bold">Votre demande a été bien envoyée</h2>
               
                    <p class="px-2  mt-3 mb-2 inscrire-reinscrire-content text-inscription "> 
                        {{ $message }}
                    </p>
                
                <div class="d-flex justify-content-center w-75 mt-4 fs-6" >
                    <button class="rounded text-uppercase text-danger fw-bold bg-white favorite-color px-4 py-3 me-3 text-center kkiapay-button" id="button">Je paie maintenant</button>
                </div>
            </div>
        </div>
    </section>




    <script amount=5000 email="{{ $email }}" position="center" theme="#032497F5" phone="97000000"
        firstname="{{ $prenom }}" lastname="{{ $nom }}" sandbox="true" callback="{{ $callbackRoute }}"
        key="0b7354b0ed5a11ec848227abfc492dc7" src="https://cdn.kkiapay.me/k.js">
    </script>

    {{-- <script amount=5000 email="{{ Session::get('email') }}" position="center" theme="#032497F5" phone="97000000"
    firstname="{{ Session::get('prenom') }}" lastname="{{ Session::get('nom') }}" sandbox="true" callback="{{ Session::get('callbackRoute') }}"
    key="0b7354b0ed5a11ec848227abfc492dc7" src="https://cdn.kkiapay.me/k.js">
    </script> --}}
    
@endsection
