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
        <div class="contaier">
            <div>
                <h2>Authentification et autorisation</h2>
                <ul class="py-3">
                    <li>
                        Les utilisateurs doivent créer un compte avec un mot de passe fort pour accéder à l'application.
                    </li>  
                    
                    <li> La vérification de l'adresse email de chaque compte est obligatoire pour chaque utilisateur. </li>
                   
                    <li>  Les utilisateurs ont des rôles et des permissions d'accès appropriés pour limiter l'accès aux informations sensibles.
                    </li>   
        
                </ul>
            </div>
            <div>
                <h2>Chiffrement et sauvegarde</h2>
                <ul class="py-3">
                    <li>Les informations sensibles stockées dans la base de données sont chiffrées avec une clé de chiffrement forte.</li>
                    <li>Des sauvegardes régulières sont effectuées toutes les semaines sur une unité de stockage externe sécurisée.</li>
                </ul>
            </div>
            <div>
                <h2>Sensibilisation à la sécurité :</h2>
                <ul class="py-3">
                    <li>Les utilisateurs sont informés de l'importance de créer des mots de passe forts et de les protéger.</li>
                    <li>Les utilisateurs sont informés de l'importance de ne pas partager leurs informations d'identification.</li>
                    <li>Les utilisateurs sont informés des risques de sécurité courants et de la manière de les éviter.</li>
                </ul>
            </div>
        </div>
    </div>

@endsection