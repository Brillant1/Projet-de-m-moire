@extends('front.layouts.template')
@section('content')
<style>
    .bg-image-register {
        background-image: url('img/Mobile login-pana.png');
        background-size: 100%;
        background-repeat: no-repeat;
    }
    .login-main-div{
        margin-top: 100px; 
        background-image : url('{{asset('img/LoginBG.jpg')}}');
        background-repeat : no-repeat;
        background-size : 100%;
        width: 100%;  
    }
    .p-DEC-login{
        font-family: 'Inter';
        font-style: normal;
        font-weight: 700;
        font-size: 24px;
        display: flex;
        color: #1117AB;
    }
    .welcome-back{
        font-family: 'Inter';
        font-style: normal;
        font-weight: 700;
        font-size: 32px;
        line-height: 39px;margin-top: 15px; 
    }
    .p-login{
        font-family: 'Inter';
        font-style: normal;
        font-weight: 400;
        font-size: 20px;
        line-height: 24px;
    }
    .p-DEC-login {
        font-family: 'Inter';
        font-style: normal;
        font-weight: 700;
        font-size: 24px;
        display: flex;
        color: #1117AB;
    }


    @media screen and (max-width: 1360px) {
            .login-main-div-next {
                width: 80%;
                margin-top: 50px;
            }
        }
        @media screen and (max-width: 991px) {
            .login-main-div-next {
            margin-bottom: 100px;
            width: 90%;
            margin-top: 50px;
            }
        }
        @media screen and (max-width: 991px) {
            .login-main-div-next {
            margin-bottom: 100px;
            width: 100%;
            margin-top: 40px;
            }
        }
    
</style>
    <div class="container-fluid d-flex justify-content-center mt-0 login-main-div " >
        <div class="row shadow ps-3  bg-white login-main-div-next">


            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            
            <div class="col-12 col-md-6 login-main-div-first-column">
                <div class="">
                    <div class=" d-flex align-items-center justify-content-md-center">
                        <i>
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#1117AB"
                                class="bi bi-layers-fill" viewBox="0 0 16 16">
                                <path
                                    d="M7.765 1.559a.5.5 0 0 1 .47 0l7.5 4a.5.5 0 0 1 0 .882l-7.5 4a.5.5 0 0 1-.47 0l-7.5-4a.5.5 0 0 1 0-.882l7.5-4z" />
                                <path
                                    d="M2.125 8.567l-1.86.992a.5.5 0 0 0 0 .882l7.5 4a.5.5 0 0 0 .47 0l7.5-4a.5.5 0 0 0 0-.882l-1.86-.992-5.17 2.756a1.5 1.5 0 0 1-1.41 0l-5.17-2.756z" />
                            </svg>
                        </i>
                        <p style=" p-DEC-login " class="ms-4 mt-3">DEC - BENIN</p>
                    </div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <h1 class="text-md-center welcome-back">Bienvenue !</h1>
                        <p class="text-md-center p-login">Créer un compte pour faciliter votre demande</p>
                        <!-- Name -->
                        <div class="mt-4 form-group ">
                            {{-- <x-label for="name" :value="__('Name')" /> --}}

                            <x-input id="name" class="form-control  w-100 " style="padding: 14px;" type="text"
                                placeholder="Nom & Prénom(s)" name="name" :value="old('name')" required autofocus />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4 form-group">
                            {{-- <x-label for="email" :value="__('Email')" /> --}}

                            <x-input id="email" class="form-control  w-100 " style="padding: 14px;" type="email"
                                placeholder="Adresse Email" name="email" :value="old('email')" required />
                        </div>

                        <!-- Password -->
                        <div class="mt-4 form-group">
                            {{-- <x-label for="password" :value="__('Password')" /> --}}

                            <x-input id="password" class="form-control  w-100 " style="padding: 14px;"
                                placeholder="Mot de passe" type="password" name="password" required
                                autocomplete="new-password" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="mt-4 form-group">
                            {{-- <x-label for="password_confirmation" :value="__('Confirm Password')" /> --}}

                            <x-input id="password_confirmation" class="form-control  w-100 "
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
                                <a href="{{ route('login') }}" class="text-primary  ">Se connecter <span>
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

            <div class="col-6 bg-image-register pe-0 me-0 col-6 col-md-12 d-sm-none d-md-block  ">
                <div class="w-100 h-100 " style="background: rgba(3, 36, 151, 0.71);">

                </div>
            </div>



        </div>
    </div>
@endsection
