@extends('admin.layouts.template')
@section('content')

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('departements.index') }}">Département</a></li>
                <li class="breadcrumb-item active">Editer département</li></li>
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
            <div class="col-lg-12">
              <div class="row">
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
                                <h6> {{ session('updatedMessage') }} </h6>
                            </div>

                        @endif
                  <div class="card top-selling overflow-auto">

                    <h3 class="card-title bg-warning fw-bold rounded-sm p-3 text-white full-width ">Ajoutez un nouveau département</h3>
                    <div class="card-body pb-0">

                      <form method="POST" action="{{route('departements.update', ['departement'=>$departement->id])}}" enctype="multipart/form-data" class="pb-4">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="form-group col-md-6 p-2">
                                <label for="nom" class="control-label " >Nom du département</label>
                                <input class="form-control border-2 " type="text" value="{{ $departement->nom }}" name="nom" id="nom">
                            </div>
                            <div class="form-group col-md-6 p-2">
                                <label for="reference" class="control-label " >Référence du département</label>
                                <input class="form-control border-2 " type="text" value="{{ $departement->reference }}" name="reference" id="reference">
                            </div>
                        </div>


                        <div class="d-flex justify-content-center">
                            <input type="submit" name="send" value="Enrégistrer les modifications" id="send" class="btn btn-success fw-bold px-5 mt-4">
                        </div>
                    </form>
                    </div>

                  </div>
                </div><!-- End Top Selling -->

              </div>
            </div><!-- End Left side columns -->

            <!-- Right side columns -->
            <div class="col-lg-4">

            </div><!-- End Right side columns -->

          </div>
        </section>
@endsection
