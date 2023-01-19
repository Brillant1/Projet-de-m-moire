@extends('front.layouts.template')
@section('content')
    <section >
        <div class="container-fluid mt-5 mb-5">
            <div class="container py-5 rounded text-white d-flex justify-content-center align-items-center flex-column">
                <div class=" alert alert-success">
                <h5 class=" fw-bold text-center">Votre demande a été bien enrégistrée</h5>
                <p class=" text-center mt-3 mb-2 inscrire-reinscrire-content text-inscription "> 
                    {{ $message }}
                </p>
                </div>
                <div class="d-flex justify-content-center w-75 mt-4 fs-6" >
                    <button class="rounded text-uppercase tex-white fw-bold bg-white favorite-color px-4 py-2 me-3 text-center kkiapay-button btn-pay" id="button">Payez maintenant</button>
                </div>
            </div>
        </div>
    </section>

    <script amount=5000 firstname="{{ $demandeInfos['prenom'] }}" lastname="{{ $demandeInfos['nom'] }}" email="{{ $demandeInfos['email']}}" position="center" theme="#032497F5" phone="97000000"
          sandbox="true" callback="{{ $callbackRoute }}"
        key="0b7354b0ed5a11ec848227abfc492dc7" src="https://cdn.kkiapay.me/k.js">
    </script>

    {{-- <script amount=5000 email="{{ Session::get('email') }}" position="center" theme="#032497F5" phone="97000000"
    firstname="{{ Session::get('prenom') }}" lastname="{{ Session::get('nom') }}" sandbox="true" callback="{{ Session::get('callbackRoute') }}"
    key="0b7354b0ed5a11ec848227abfc492dc7" src="https://cdn.kkiapay.me/k.js">
    </script> --}}
@endsection
