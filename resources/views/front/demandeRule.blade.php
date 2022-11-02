@extends('front.layouts.template')
@section('content')
<section>
    <div id="carouselExampleIndicators" class="carousel slide container-fluid p-0 m-0 position-relative"
    data-bs-ride="carousel">

    <div class="d-flex justify-content-center flex-column"
        style=" z-index: 99 ;position: absolute; top: 0px; background: rgba(3, 36, 151, 0.71); width: 100% ; height: 300px;">
        <h3 class="text-white ms-5 fw-bold text-center" style="line-height:50px;">
            Formulaire de demande d'attestation des examens au Bénin.
            <br> Nous protégeons toutes vos informations personnelles.
        </h3>
    </div>
    <div class="carousel-inner" style="height:300px;">
        <div class="carousel-item active" style="height:300px;">
            <img src="{{ asset('img/etu1.png') }}" class="d-block w-100" alt="...">
        </div>
    </div>
</div>


</section>
<section class="" style="background-color: rgb(216, 209, 209)">
    <div class="container-fluid w-sm-75 p-4 text-center text-sm-md-start text-disponible">
        <h2 class=" h3 text-uppercase font-bold mb-3 mt-5 h3-step-inscription favorite-color">Les étapes et conditions requises pour la demande d'une attestation.</h2>
    </div>
    <div class="container-fluid d-flex justify-content-center align-items-center">
        <div class="row mt-5" id="main-step-div">
            <div class="col-lg-6 d-flex mb-5 justify-content-between step-register-container">
                <div>
                    <p class="favorite-color font-bold fs-1 ">01</p>
                </div>
                <div class=" container-text-etape" >
                    <h3 >Demande de renseignements</h3>
                    <p class="mt-4 " id="p-text">Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Donec sollicitudin molestie malesuada. Vivamus suscipit tortor eget felis porttitor volutpat. Proin eget tortor risus. Donec rutrum congue leo eget malesuada. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.  </p>
                </div>
            </div>
            <div class="col-lg-6 mb-5 d-flex justify-content-between step-register-container">
                <div>
                    <h1 class="favorite-color font-bold mb-2">02</h1>
                </div>
                <div class=" container-text-etape">
                    <h3 >Compléter le dossier d'inscription </h3>
                    <p class="mt-4 text-justify" id="p-text">Proin eget tortor risus. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Pellentesque in ipsum id orci porta dapibus. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Quisque velit nisi, pretium ut lacinia in, elementum id enim.  </p>
                </div>
            </div>

            <div class="col-lg-6 mb-5 d-flex justify-content-between step-register-container mt-4">
                <div>
                    <h1 class="favorite-color font-bold fs-10 mb-2">03</h1>
                </div>
                <div class=" container-text-etape">
                    <h3 >Réponse de l'école et visite de l'établissement</h3>
                    <p class="mt-4" id="p-text">Proin eget tortor risus. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Pellentesque in ipsum id orci porta dapibus. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Quisque velit nisi, pretium ut lacinia in, elementum id enim. </p>
                </div>
            </div>
            <div class="col-lg-6 mb-5 d-flex justify-content-between step-register-container mt-4">
                <div>
                    <h1 class="favorite-color font-bold">04</h1>
                </div>
                <div class=" container-text-etape">
                    <h3 >Admission et préparation pour la rentrée </h3>
                    <p class="mt-4" id="p-text">Proin eget tortor risus. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Pellentesque in ipsum id orci porta dapibus. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Quisque velit nisi, pretium ut lacinia in, elementum id enim. 


                         </p>
                         <h5>Bienvenue chez nous DEC-BENIN !</h5>
                </div>
            </div>
        </div>
    </div>
</section>
<section >
    {{-- <div class="container-fluid mt-5 mb-5">
        <div class="container rosette-bg-green py-5 rounded text-white d-flex justify-content-center align-items-center flex-column">
            <h2 class="text-center h1-inscription fw-bold">Demande d'attestation de diplôme</h2>
            <p class="px-2  mt-3 mb-2 inscrire-reinscrire-content text-inscription ">Vous souhaitez faire la demande de votre attestation. Merci de passer par le lien ci-dessous pour soumettre le formulaire.
                situation de votre enfant. Nous l'examinerons et vous ferons un retour sous très peu </p>
               
        </div>
    </div> --}}

    <div class="d-flex justify-content-center align-center w-100 mt-4 fs-6" >
        <a href="{{ route('before-demande') }}" class="rounded mt-4 fw-bold bg-success text-white favorite-color px-4 py-3 me-3 text-center" id="inscription-link">Fais une demande</a>
    </div>
</section>
@endsection
