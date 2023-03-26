@extends('front.layouts.template')
@section('content')
<style>
    ul
    {
        line-height: 35px;
    }
    ul li{
        font-size: 1.2rem;
    }
    .propriete{
        line-height: 35px;
        font-size: 1.2rem;
    }
</style>
<div id="carouselExampleIndicators" class="carousel slide container-fluid p-0 m-0 position-relative"
        data-bs-ride="carousel">

        <div class="d-flex justify-content-center align-items-center flex-column"
            style=" z-index: 99 ;position: absolute; top: 0px; background: rgba(3, 36, 151, 0.71); width: 100% ; height: 250px;">
            <h3 class="text-white ms-lg-5 ms-0 fw-bold text-center contact-info">
                POLITIQUE DE SECURITE ET DE CONFIDENTIALITE
                </h3>
        </div>
        <div class="carousel-inner" style="height:250px;">
            <div class="carousel-item active" style="height:250px;">
                <img src="{{ asset('img/etu1.png') }}" class="d-block w-100" alt="...">
            </div>
        </div>
    </div>

    <div class="container-fluid d-flex justify-content-center mt-5">
        <div class="container">
            <div>
                <h2>Authentification et autorisation</h2>
                <div class="py-3">
                    <p class="propriete">
                        Les utilisateurs doivent créer un compte avec un mot de passe fort pour accéder à l'application. <br>
                        La vérification de l'adresse email de chaque utilisateur est obligatoire avant de se connecter au site. <br>
                        Les utilisateurs ont des rôles et des permissions d'accès appropriés pour limiter l'accès aux informations sensibles par des personnes non autorisées.
                    </p>
                </div>
            </div>
            <div>
                <h2>Confidentialité</h2>
                <div class="py-3">
                    <p class="propriete">
                        Les informations sensibles stockées dans la base de données sont chiffrées avec une clé de chiffrement forte.
                        Vos données personnelles saisies sur notre site sont confidentielles et ne seront en aucun cas communiquées à des tiers.
                    </p>
                </div>
            </div>
            <div>
                <h2>Sensibilisation à la sécurité </h2>
                <div class="py-3">
                    <p class="propriete">
                        Les utilisateurs sont informés de l'importance de créer des mots de passe forts et de les protéger.
                        Les utilisateurs sont informés de l'importance de ne pas partager leurs informations d'identification.
                        Les utilisateurs sont informés des risques de sécurité courants et de la manière de les éviter.
                    </p>
                    
                </div>
            </div>
            <div>
                <h2>Propriété intellectuelle </h2>
                <div class="py-3">
                    <p class="propriete">
                        Tout le contenu du présent site, incluant, de façon non limitative, les graphismes, images, textes, 
                        logos et icônes ainsi que leur mise en forme sont la propriété exclusive de la DEC-BENIN - à l'exception des marques, logos ou contenus appartenant à d'autres sociétés partenaires ou auteurs.
                        Toute reproduction, distribution, modification, adaptation, retransmission ou publication, même partielle, de ces différents éléments est strictement interdite sans l'accord exprès par écrit de la DEC-BENIN
                    </p>
                </div>
            </div>
            <div>
                <h2>Conditions de service</h2>
                <div class="py-2">
                    <p class="propriete">
                        Ce site est proposé en langages Français, pour un meilleur confort d'utilisation et un graphisme plus agréable, nous vous recommandons de recourir à des navigateurs compatibles et modernes comme: Safari, Firefox, Chrome...
                    </p>
                </div>
            </div>
            <div>
                <h2>Informations et exclusion</h2>
                <div class="py-2">
                    <p class="propriete">
                        « La Direction des Examens et Concours » met en œuvre tous les moyens dont il dispose, pour assurer une information fiable et une mise à jour fiable de son site internet. Toutefois, des erreurs ou omissions 
                        peuvent survenir. A cet effet, l'internaute pourra envoyer toutes informations auprès de : contact@dec.bj et signaler toutes modifications du site qu'il jugerait utile.
                    </p>
                </div>
            </div>

            <div>
                <h2>Liens hypertextes</h2>
                <div class="py-2">
                    <p class="propriete">
                        Notre site peut offrir des liens vers d’autres sites internet ou d’autres ressources disponibles sur Internet. « La Direction des Examens et Concours» ne dispose d'aucun moyen pour contrôler les sites en connexion avec son site internet. Par ailleurs, 
                        il ne répond pas de la disponibilité de tels sites et sources externes, ni ne la garantit. Elle ne peut être tenue pour responsable de tout dommage, de quelque nature que ce soit, résultant du contenu de ces sites ou sources externes.
                    </p>
                </div>
            </div>
        </div>
    </div>

@endsection