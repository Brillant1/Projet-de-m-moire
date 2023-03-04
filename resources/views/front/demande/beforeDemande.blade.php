@extends('front.layouts.template')
@section('content')
    <link rel="stylesheet" href="{{asset('css/yearpicker.css')}}">
    <div class="d-flex justify-content-center align-items-center flex-column">
        
        <div class="container-info-start">
            <h3 class="mt-5 text-center favorite-color">Bienvenue, fournissez nous ces informations pour continuer</h3>
            <a href="{{ URL::previous() }}" class="cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#F58000" class="bi bi-arrow-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                </svg>
            </a>
            @if(session('errorMessage'))
            <div class="alert alert-danger text-center py-2">
                <span>{{ session('errorMessage') }}</span>
            </div>
            @endif
            <form action="{{ route('before-demande') }}" method="POST" class="shadow p-3 p-lg-5 rounded mt-4" style="">
                @csrf
                <div class="form-group mb-3">
                    <label for="nom"> Nom</label>
                    <input type="text" name="nom" class="form-control mt-1 p-2" id="nom" placeholder="Votre nom " required>
                    @if ($errors->has('nom'))
                        <span class="text-danger">{{ $errors->first('nom') }}</span>
                    @endif
                </div>
                <div class="form-group mb-3">
                    <label for="prenom"> Prénoms (Dans l'odre)</label>
                    <input type="text" name="prenom" class="form-control mt-1 p-2" id="prenom" placeholder="Vos prénoms dans l'ordre" required>
                    @if ($errors->has('prenom'))
                        <span class="text-danger">{{ $errors->first('prenom') }}</span>
                    @endif
                </div>
                <div class="form-group mb-3">
                    <label for="numero_table"> Numero de table</label>
                    <input type="text" name="numero_table" class="form-control mt-1 p-2" id="numro_table" placeholder="Votre numero de table" required>
                    @if ($errors->has('numero_table'))
                        <span class="text-danger">{{ $errors->first('numero_table') }}</span>
                    @endif
                </div>
                <div class="form-group mb-3 mt-4 ">
                    <label for="annee"> Année où vous avez eu le diplôme</label>
                    <input type="number" placeholder="Anné du diplôme" min="2012" max="2022"  maxlength="4" name="annee" class="form-control mt-1 annee" id="annee" required>
                    @if ($errors->has('annee'))
                        <span class="text-danger">{{ $errors->first('annee') }}</span>
                    @endif
                </div>
                <div class="text-center mt-5 p-2" required>
                    <input type="submit" class="btn btn-success" name="" id="" value="Envoyer">
                </div>
            </form>
        </div>
    </div>
    <script>
        $('document').ready(function() {
            $('.annee').yearpicker();
        });
    </script>
@endsection