@extends('front.layouts.template')
@section('content')
    <div id="carouselExampleIndicators" class="carousel slide container-fluid p-0 m-0 position-relative"
        data-bs-ride="carousel">
        <div>
            <div class="carousel-indicators">

                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"
                    class="text-black;"></button>

            </div>
            <div class=" div-bienvenue d-flex justify-content-center flex-column align-items-center ">
                <p class="text-white text-center">
                    Bienvenu sur la plateforme officielle de <br> demande et de suivie de vos attestions du <br> CEP et du
                    BEPC au Benin

                </p>
                <a href="{{ route('before-demande') }}"
                    class="rounded rounded-pill px-4 py-1 fs-4 border border-2 border-white mt-3 text-white"> Demander mon
                    attestation</a>
            </div>
            <div class="carousel-inner" style="width: 100%;">
                <div class="carousel-item active">
                    <img src="{{ asset('img/etu1.png') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/etu1.png') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/etu1.png') }}" class="d-block w-100" alt="...">
                </div>
            </div>
            <div class="d-flex justify-content-center align-items-center">
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>

    <div class="accueil-section2 d-flex justify-content-center align-items-center flex-column">
        <p class="h2 fw-bold mt-5 mb-5 pt-5 pb-2">Taux d'admission aux derniers examens : <b>{{ $examen->annee }}</b></p>
        <div class="d-flex justify-content-between" style="width: 60%;">
            @if ($examen)
                @foreach ($examen->examens as $key => $exam)
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <div class=" taux bg-favorite-color d-flex justify-content-center align-items-center flex-column ">
                            <span class="text-white fs-5 fw-bold mt-3">{{ $exam['examen'] }}</span>
                            <p class="text-white fs-4">{{ $exam['taux'] }}%</p>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

        <h2 class="favorite-color w-75 py-1 fs-5 text-center fw-bold" style="background-color: #cfd0e9; margin-top: 100px;">MOT
            D'ACCUEIL DU DEC</h2>
        <div class="mot-duc w-75 text-justify fs-5  mt-5" style="line-height: 45px;">
            <p class="text-justify">Je souhaite à tous les étudiants et particulièrement aux détenteurs aux candidats admis
                à un examen quelconque béninois la bienvenue sur le site web : monattestation.dec.bj

                Il s’agit d’un site conçu et réalisé par la Direction des Examens et Concours (DEC). Il est destiné à
                assainir et alléger la demande et la réception des attestations des différents examens au Bénin. A termes,
                il vise à créer les préalables propices à la délivrance aisée et accélérés des attestations des différents
                examens au Bénin à savoir : le CEP, le BEPC et le BAC.</p>
            <p class="text-justify">Ce site s’inscrit parfaitement dans la grande réforme de dématérialisation de
                l’administration publique et les réformes engagées par le Ministère de l’Enseignement Supérieur et de la
                Recherche Scientifique (MESRS) depuis 2016. Il vient améliorer les réformes de la bancarisation et de la
                récupération des attestations des examens en République du Bénin par la DEC. Il est l’expression de
                l’engagement de la DEC à apporter les solutions idoines aux problèmes qui se posent aux étudiants béninois
                dans l’obtention de leurs attestations.</p>

            <p class="text-justify">J’invite tous les acteurs impliqués dans le processus de traitement et de délivrance des
                attestations à contribuer à sa bonne gestion et à son amélioration. Je souhaite qu’ils trouvent à travers ce
                site, la détermination d’une équipe à mieux agir pour être utile à sa communauté.</p>
            <p class="mb-0 pb-0 mt-1 fw-bold">Docteur Roger KOUDOADINOU</p>
            <p class="pt-0 mt-0 fw-bold">Directeur des Examens et Concours</p>
        </div>
    </div>


@endsection
