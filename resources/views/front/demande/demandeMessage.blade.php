<div class="container">
    <style>
        .rosette-bg-green {
            background-color: #178b01;
        }

        .rosette-bg-orange {
            background-color: #ff8000;
        }

        .font-bold {
            font-family: "Montserrat-Bold";
        }
    </style>
    <div class="row justify-content-center">


        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header">
                    Bonjour !
                </div>
                <div class="card-body">
                    <h1>Demande d'attestation sur le site MON ATTESTATION.BJ</h1>
                    <div class="shadow p-2">
                        <p>Vous avez reçu une demande de: <span
                                class="fw-bold rosette-text-orange">{{ $demandeInfos['nom'] }} </span> résident à
                            <span class="fw-bold  rosette-text-orange">{{ $demandeInfos['prenom'] }}</span>
                        </p> <br>
                        disponible aux coordonées suivantes <span
                            class="fw-bold  rosette-text-orange">{{ $demandeInfos['email'] }}</span> ou le contact <span
                            class="fw-bold  rosette-text-orange">{{ $demandeInfos['contact'] }}</span> qu'il a fourni.
                    </div>
                    <a href="{{ route('singleDemande', $demandeInfos['id']) }}">Accéder à la demande</a>
                </div>
            </div>
        </div>
    </div>
</div>
