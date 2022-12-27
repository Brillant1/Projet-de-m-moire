@extends('front.layouts.template')
@section('content')
    <style>
        .login-main-div {
            margin-top: 100px;
            background-image: url('{{ asset('img/LoginBG.jpg') }}');
            background-repeat: no-repeat;
            background-size: 100%;
            width: 100%;
        }

        .login-main-div-next {
            margin-bottom: 100px;
            width: 55%;
            margin-top: 120px;
        }

        .p-DEC-login {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 700;
            font-size: 24px;
            display: flex;
            color: #1117AB;
        }

        .login-main-div-first-column {
            margin-right: 0
        }
    </style>

    <div class="container-fluid d-flex justify-content-center align-items-center mt-0 login-main-div flex-column">

        <div class="row shadow ps-3 bg-white login-main-div-next">

            <div class="col-6 login-main-div-first-column">
                <div class="">
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    @if (app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName() == '')
                        <p class="pt-2 m-0 text-danger">Désolé ! Vous devez d'abord vous connecter.</p>
                    @endif


                    <div class=" d-flex align-items-center  ">
                        <i>
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#1117AB"
                                class="bi bi-layers-fill" viewBox="0 0 16 16">
                                <path
                                    d="M7.765 1.559a.5.5 0 0 1 .47 0l7.5 4a.5.5 0 0 1 0 .882l-7.5 4a.5.5 0 0 1-.47 0l-7.5-4a.5.5 0 0 1 0-.882l7.5-4z" />
                                <path
                                    d="M2.125 8.567l-1.86.992a.5.5 0 0 0 0 .882l7.5 4a.5.5 0 0 0 .47 0l7.5-4a.5.5 0 0 0 0-.882l-1.86-.992-5.17 2.756a1.5 1.5 0 0 1-1.41 0l-5.17-2.756z" />
                            </svg>
                        </i>
                        <p class="p-DEC-login ms-4 mt-3">DEC - BENIN</p>
                    </div>
                    <style>
                        .bg-image-login {
                            background-image: url('img/Authentication-rafiki.png');
                            background-size: 100%;
                            background-repeat: no-repeat;
                        }
                    </style>

                    <form method="POST" action="{{ route('login') }}" style="width: 95%;">
                        @csrf
                        <h1
                            style="font-family: 'Inter';
                            font-style: normal;
                            font-weight: 700;
                            font-size: 28px;
                            line-height: 50px;margin-top: 15px; ">
                            Bon retour parmi nous !</h1>
                        <p
                            style="font-family: 'Inter';
                            font-style: normal;
                            font-weight: 400;
                            font-size: 20px;
                            line-height: 24px;">
                            Connectez-vous avec votre email et votre mot de passe</p>

                        <!-- Email Address -->
                        <div>
                            <x-label for="email" :value="__('Email')" />

                            <x-input id="email" style="padding: 15px;" class="block mt-1 w-full form-control"
                                type="email" name="email" :value="old('email')" required autofocus />
                        </div>

                        <!-- Password -->
                        <div class="mt-4 form-group">
                            <x-label for="password" :value="__('Mot de passe')" />

                            <x-input id="password" style="padding: 15px;" class="block mt-1 w-full form-control"
                                type="password" name="password" required autocomplete="current-password" />
                        </div>

                        <!-- Remember Me -->


                        <div class="d-flex justify-content-between mt-4">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox"
                                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    name="remember">
                                <span class="ml-2 text-sm text-gray-600">{{ __('Se souvenir de moi') }}</span>
                            </label>
                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 hover:text-gray-900"
                                    href="{{ route('password.request') }}">
                                    {{ __('Mot de passe oublié?') }}
                                </a>
                            @endif


                        </div>
                        <div class="form-group mt-4">
                            <x-button class="w-100 p-1 rounded text-white fw-bold fs-5 bg-success border-0">
                                {{ __('Connexion') }}
                            </x-button>
                        </div>
                        <div class="d-flex justify-content-between mt-4">
                            <p>Vous n'avez pas de compte ?</p>
                            <a href="{{ route('register') }}" class="text-primary">Inscrivez-vous <span>
                                    <i>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                            fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
                                        </svg>
                                    </i>
                                </span>
                            </a>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-6 bg-image-login pe-0 me-0 ">
                <div class="w-100 h-100 " style="background: rgba(3, 36, 151, 0.71);">

                </div>
            </div>
        </div>
    </div>
@endsection
