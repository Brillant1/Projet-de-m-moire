@extends('front.layouts.template')
@section('content')
    <div class="container d-flex justify-content-center" style="margin-top: 30px;">
        <div class="row shadow ps-3 mt-5 " style="width: 80%;">


            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <style>
                .bg-image-register {
                    background-image: url('img/Mobile login-pana.png');
                    background-size: 100%;
                    background-repeat: no-repeat;
                }
            </style>
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
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <h1 style="font-family: 'Inter';
                                font-style: normal;
                                font-weight: 700;
                                font-size: 32px;
                                line-height: 39px;margin-top: 15px; ">Bienvenu !</h1>
                        <p style="font-family: 'Inter';
                                font-style: normal;
                                font-weight: 400;
                                font-size: 20px;
                                line-height: 24px;">Créer un compte pour faciliter votre demande</p>
                        <!-- Name -->
                        <div class="mt-4 form-group ">
                            {{-- <x-label for="name" :value="__('Name')" /> --}}

                            <x-input id="name" class="form-control border-2 w-100 " style="padding: 14px;" type="text"
                                placeholder="Nom & Prénom(s)" name="name" :value="old('name')" required autofocus />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4 form-group">
                            {{-- <x-label for="email" :value="__('Email')" /> --}}

                            <x-input id="email" class="form-control border-2 w-100 " style="padding: 14px;" type="email"
                                placeholder="Adresse Email" name="email" :value="old('email')" required />
                        </div>

                        <!-- Password -->
                        <div class="mt-4 form-group">
                            {{-- <x-label for="password" :value="__('Password')" /> --}}

                            <x-input id="password" class="form-control border-2 w-100 " style="padding: 14px;"
                                placeholder="Mot de passe" type="password" name="password" required
                                autocomplete="new-password" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="mt-4 form-group">
                            {{-- <x-label for="password_confirmation" :value="__('Confirm Password')" /> --}}

                            <x-input id="password_confirmation" class="form-control border-2 w-100 "
                                placeholder="Confirmer mot de passe" style="padding: 14px;" type="password"
                                name="password_confirmation" required />
                        </div>

                        <div class="flex items-center justify-end mt-4 form-group">
                            

                            <div class="form-group mt-5">
                                <input class="w-100 p-2  text-white fw-bold fs-5 bg-success rounded border-0" type="submit"
                                    name="submit" id="submit" value="Inscription">
                            </div>
                            <div class="d-flex justify-content-between mt-5">
                                <p>Vous aviez déjà un compte ?</p>
                                <a href="{{ route('login') }}" class="text-danger">Se connecter <span>
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

            <div class="col-6 bg-image-register pe-0 me-0 ">
                <div class="w-100 h-100 " style="background: rgba(3, 36, 151, 0.71);">

                </div>
            </div>



        </div>
    </div>
@endsection
