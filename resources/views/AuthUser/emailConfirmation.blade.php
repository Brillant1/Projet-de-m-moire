@extends('front.layouts.template')
@section('content')
    <div class="container d-flex justify-content-center py-3" style="margin-top: 70px;">
        <div class="row shadow ps-3 mt-5" style="width: 80%;">
            <div class="col-6" style="margin-right:0">
                <div class="py-5">
                    <div class=" d-flex align-items-center  ">
                        <i>
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#1117AB" class="bi bi-layers-fill" viewBox="0 0 16 16">
                                <path d="M7.765 1.559a.5.5 0 0 1 .47 0l7.5 4a.5.5 0 0 1 0 .882l-7.5 4a.5.5 0 0 1-.47 0l-7.5-4a.5.5 0 0 1 0-.882l7.5-4z"/>
                                <path d="M2.125 8.567l-1.86.992a.5.5 0 0 0 0 .882l7.5 4a.5.5 0 0 0 .47 0l7.5-4a.5.5 0 0 0 0-.882l-1.86-.992-5.17 2.756a1.5 1.5 0 0 1-1.41 0l-5.17-2.756z"/>
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
                       .bg-image-changepassword{
                           background-image: url('img/Login-rafiki.png');
                           background-size: 100%;
                           background-repeat: no-repeat;
                       }
                   </style>
                   
                    <form action="{{ route('login')}}" style="width: 95%;">  
                        <h1 style="font-family: 'Inter';
                        font-style: normal;
                        font-weight: 700;
                        font-size: 28px;
                        line-height: 50px;margin-top: 15px; ">Confirmation d'email</h1>
                        <p style="font-family: 'Inter';
                        font-style: normal;
                        font-weight: 400;
                        font-size: 20px;
                        line-height: 24px;">Un code a été envoyé à votre mail, renseignez le ci-dessous pour continuer </p>

                        <div class="mt-5" style="line-height: 47px;">
                            <div class="form-group mt-5">       
                                <input class="form-control border-2 w-100"  style="padding: 15px;"type="password" placeholder="Tapez le code reçu" name="code" id="code" required autocomplete="code" >
                            </div>
                                
                                

                                <div class="form-group mt-4">
                                    <input class="w-100 p-1 rounded text-white fw-bold bg-favorite-color border-0" type="submit" name="submit" id="submit" value="Continuer">
                                </div>
                               
                               <p class=" d-flex justify-content-center pt-3">
                                <a href="{{ route('changePassword') }}" class="favorite-color text-center ">
                                    Renvoyer le code   
                                </a>
                               </p>

                                <div class="form-group mt-4">
                                    <input class="w-100 p-1 rounded text-white fw-bold bg-danger border-0" type="submit" name="submit" id="submit" value="Annuler">
                                </div>

                                
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-6 bg-image-changepassword pe-0 me-0 ">
                <div class="w-100 h-100 " style="background: rgba(3, 36, 151, 0.71);">

                </div>
            </div>
        </div>
    </div>
@endsection