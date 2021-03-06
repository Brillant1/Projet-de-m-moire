@extends('admin.layouts.template')
@section('content')

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('communes.index') }}">Communes</a></li>
                <li class="breadcrumb-item active">Ajout commune</li></li>
                </ol>
            </nav>
        </div>
        <section class="section dashboard">
            <style>
                .form-control{
                    height: 50px;
                }
                .control-label{
                    padding-bottom: 5px;
                    color: black;
                    font-weight: bold;
                }

            </style>
          <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-12">
              <div class="row">
                <!-- Top Selling -->
                <div class="col-12">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('addedMessage'))

                        <div class="alert alert-success">
                            <h6> {{ session('addedMessage') }} </h6>
                        </div>

                    @endif

                    @if (session('updatedMessage'))

                        <div class="alert alert-success">
                            <h6> {{ session('addedMessage') }} </h6>
                        </div>

                    @endif


                  <div class="card top-selling overflow-auto">
                    <h3 class="card-title bg-warning fw-bold rounded-sm p-3 text-white full-width ">Ajoutez une nouvelle commune</h3>
                    <div class="card-body pb-0">
                        <form method="POST" action="{{route('communes.store')}}" enctype="multipart/form-data" class="pb-4">
                            @csrf
                            <div class="row mb-3">
                                <div class="form-group col-md-6 p-2">
                                    <label for="nom" class="control-label " >Nom de la commune</label>
                                    <input class="form-control border-2 " type="text" placeholder="Tapez le nom de la commune" name="nom" id="nom">
                                </div>
                                <div class="form-group col-md-6 p-2">
                                    <label for="reference" class="control-label" >R??f??rence de la commune</label>
                                    <input class="form-control border-2 " type="text" placeholder="Tapez la r??f??rence de la commune" name="reference" id="reference">
                                </div>

                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-md-12 p-2" style="padding:10px 0 10px 0;">
                                    <label class="control-label" for="departement">D??partement d'appartenance de la commune</label>
                                    <select class="form-control border-2 form-select" style="height: 50px;" name="departement_id" id="departement">
                                        @foreach ($departements as $departement )
                                            <option value="{{ $departement->id }}">{{ $departement->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <input type="submit" name="send" value="Enr??gistrer" id="send" class="btn btn-success fw-bold px-5 mt-4 ">
                            </div>
                        </form>
                    </div>

                  </div>
                </div>

              </div>
            </div>

            <div class="col-lg-4">

            </div>

          </div>
        </section>

       @endsection


