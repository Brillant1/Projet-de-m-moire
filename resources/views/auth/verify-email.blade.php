@extends('front.layouts.template')
@section('content')

        {{-- <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot> --}}


        <div class="container" style="margin-top:135px;">
            <p class="text-center mt-3 inscrire-reinscrire-content text-inscription">
                {{ __('Merci de vous être inscrit ! Avant de commencer, pourriez-vous vérifier votre adresse électronique en cliquant sur le lien que nous venons de vous envoyer ? Si vous n\'avez pas reçu l\'e-mail, nous vous en enverrons un autre avec plaisir.') }}
            </p>
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="container">
            <p class="text-center inscrire-reinscrire-content text-inscription">
                {{ __('Un nouveau lien de vérification a été envoyé à l\'adresse électronique que vous avez fournie lors de votre inscription.') }}
            </p>
            </div>
        @endif

        <div class=" my-5 py-5 d-flex justify-content-center">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <button type="submit" class="btn btn-success">
                        {{ __('Renvoyez le mail de vérification') }}
                    </button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}" class=" ms-3">
                @csrf

                <button type="submit" class=" text-white btn btn-danger">
                    {{ __('Déconnexion') }}
                </button>
            </form>
        </div>
@endsection
