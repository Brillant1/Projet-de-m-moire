@extends('front.layouts.template')
@section('content')

<style>
    .taux{
        width: 200px;
        height:200px;
        border-radius: 50%;
        line-height: 40px;
    }
    .taux>p{
        font-family: 'Inter';
        font-style: normal;
        font-weight: 700;
        font-size: 40px;
        line-height: 50px;
        margin-top: 20px;
        color: white;
    }
</style>
<div id="carouselExampleIndicators" class="carousel slide container-fluid p-0 m-0 position-relative" data-bs-ride="carousel" >
    <div>
        <div class="carousel-indicators">

            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3" class="text-black;"></button>

        </div>
        <div class="d-flex justify-content-center flex-column align-items-center " style=" z-index: 99 ;position: absolute; top: 0px; background: rgba(3, 36, 151, 0.71); width: 100% ; height: 700px;">
            <p class="text-white text-center" style="font-family: 'Inter';
            font-style: normal;
            font-weight: 700;
            font-size: 40px;
            line-height: 60px;
            margin-bottom: 80px;">
                Bienvenu sur la plateforme officielle de <br> demande et de suivie de vos attestions du <br> CEP et du BEPC au Benin

            </p>
            <a href="{{ route('demandes.create') }}" class="rounded rounded-pill px-4 py-1 fs-4 border border-2 border-white mt-3 text-white" style="font-family: 'Inter';
            font-style: normal;
            font-weight: 700;
            "> Demander mon attestation</a>
        </div>
        <div class="carousel-inner" style="height:700px;">
            <div class="carousel-item active" style="height:700px;">
                <img src="{{ asset('img/etu1.png') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" style="height:700px;">
                <img src="{{ asset('img/etu1.png') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" style="height:700px;">
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
    <p class="h2 fw-bold mt-5 mb-5 pt-5 pb-2">Taux d'admission aux derniers examens</p>
    <div class="d-flex justify-content-between" style="width: 60%;">

        <div class="d-flex flex-column justify-content-center align-items-center">
            <div class=" taux bg-favorite-color d-flex justify-content-center align-items-center flex-column ">
                <i>
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="white" class="bi bi-file-earmark-check-fill" viewBox="0 0 16 16">
                        <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zm1.354 4.354l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
                    </svg>
                </i>
                <p class="text-white">85%</p>
            </div>
            <p class="fs-3 mt-4">CEP 2022</p>
        </div>
        <div class="d-flex flex-column justify-content-center align-items-center">
            <div class="taux bg-favorite-color d-flex justify-content-center align-items-center flex-column ">
                <i>
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="white" class="bi bi-patch-check-fill" viewBox="0 0 16 16">
                        <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
                    </svg>
                </i>
                <p>75%</p>
            </div>
            <p class="fs-3 mt-4">BEPC 2022</p>
        </div>
       <div class="d-flex flex-column justify-content-center align-items-center">
            <div class=" taux bg-favorite-color d-flex justify-content-center align-items-center flex-column ">
                <i>
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="white" class="bi bi-shield-fill-check" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 0c-.69 0-1.843.265-2.928.56-1.11.3-2.229.655-2.887.87a1.54 1.54 0 0 0-1.044 1.262c-.596 4.477.787 7.795 2.465 9.99a11.777 11.777 0 0 0 2.517 2.453c.386.273.744.482 1.048.625.28.132.581.24.829.24s.548-.108.829-.24a7.159 7.159 0 0 0 1.048-.625 11.775 11.775 0 0 0 2.517-2.453c1.678-2.195 3.061-5.513 2.465-9.99a1.541 1.541 0 0 0-1.044-1.263 62.467 62.467 0 0 0-2.887-.87C9.843.266 8.69 0 8 0zm2.146 5.146a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 7.793l2.646-2.647z"/>
                    </svg>
                </i>
                <p>80%</p>
            </div>
            <P class="fs-3 mt-4">BAC 2022</P>
       </div>
    </div>
    <h1 class="favorite-color w-75 text-center fw-bold" style="background-color: #cfd0e9; margin-top: 100px;">MOT D'ACCUEIL DU DEC</h1>
    <div class="mot-duc w-75 text-justify fs-5  mt-5" style="line-height: 45px;">
        <p class="text-justify">Je souhaite ?? tous les ??tudiants et particuli??rement aux d??tenteurs aux candidats admis ?? un examen quelconque b??ninois la bienvenue sur le site web : monattestation.dec.bj

            Il s???agit d???un site con??u et r??alis?? par la Direction des Examens et Concours (DEC). Il est destin?? ?? assainir et all??ger la demande et la r??ception des attestations des diff??rents examens au B??nin. A termes, il vise ?? cr??er les pr??alables propices ?? la d??livrance ais??e et acc??l??r??s des attestations des diff??rents examens au B??nin ?? savoir : le CEP, le BEPC et le BAC.</p>
        <p class="text-justify">Ce site s???inscrit parfaitement dans la grande r??forme de d??mat??rialisation de l???administration publique et les r??formes engag??es par le Minist??re de l???Enseignement Sup??rieur et de la Recherche Scientifique (MESRS) depuis 2016. Il vient am??liorer les r??formes de la bancarisation et de la r??cup??ration des attestations des examens en R??publique du B??nin par la DEC. Il est l???expression de l???engagement de la DEC ?? apporter les solutions idoines aux probl??mes qui se posent aux ??tudiants b??ninois dans l???obtention de leurs attestations.</p>

          <p class="text-justify">J???invite tous les acteurs impliqu??s dans le processus de traitement et de d??livrance des attestations  ?? contribuer ?? sa bonne gestion et ?? son am??lioration. Je souhaite qu???ils trouvent ?? travers ce site, la d??termination d???une ??quipe ?? mieux agir pour ??tre utile ?? sa communaut??.</p>
        <p class="mb-0 pb-0 mt-1 fw-bold">Docteur Roger KOUDOADINOU</p>
        <p class="pt-0 mt-0 fw-bold">Directeur des Examens et Concours</p>
        </div>
</div>


@endsection
