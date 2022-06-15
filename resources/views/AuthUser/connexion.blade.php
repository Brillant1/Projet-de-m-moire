@extends('front.layouts.template')
@section('content')
    <div class="container d-flex justify-content-center py-3" style="margin-top: 100px;">
        <div class="row shadow ps-3 mt-5" style="width: 80%;">
            <div class="col-6 " style="margin-right:0">
                <div class="">
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
                        <p style="font-family: 'Inter';
                            font-style: normal;
                            font-weight: 700;
                            font-size: 24px;
                            display: flex;
                            
                            color: #1117AB;" class="ms-4 mt-3">DEC - BENIN</p>
                    </div>
                    <style>
                        .bg-image-login {
                            background-image: url('img/Authentication-rafiki.png');
                            background-size: 100%;
                            background-repeat: no-repeat;
                        }
                    </style>

                    <form action="{{ route('login') }}" style="width: 95%;" method="POST">
                        @csrf
                        <h1 style="font-family: 'Inter';
                            font-style: normal;
                            font-weight: 700;
                            font-size: 28px;
                            line-height: 50px;margin-top: 15px; ">Bon retour parmi nous !</h1>
                        <p style="font-family: 'Inter';
                            font-style: normal;
                            font-weight: 400;
                            font-size: 20px;
                            line-height: 24px;">Connectez-vous avec votre email et votre mot de passe</p>

                        <div class="mt-5" style="line-height: 47px;">
                            <div class="form-group mt-4">
                                <input class="form-control border-2 w-100 " style="padding: 15px;" type="email"
                                    placeholder="Adresse Email" name="email" id="email" :value="old('email')" required
                                    autofocus>
                            </div>
                            <div class="form-group mt-5">

                                <input class="form-control border-2 w-100" style="padding: 15px;" type="password"
                                    placeholder="Mot de passe" name="password" id="password" required
                                    autocomplete="current-password">
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
                                        href="{{ route('forgotPassword') }}">
                                        {{ __('Mot de passe oublié ?') }}
                                    </a>
                                @endif
                            </div>

                            <div class="form-group mt-4">
                                <input class="w-100 p-1 rounded text-white fw-bold fs-5 bg-success border-0" type="submit"
                                    name="submit" id="submit" value="Connexion">
                            </div>
                            <div class="d-flex justify-content-between mt-4">
                                <p>Vous n'avez pas de compte ?</p>
                                <a href="{{ route('inscription') }}" class="text-danger">Inscrivez-vous <span>
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
