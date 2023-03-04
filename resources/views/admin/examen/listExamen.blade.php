@extends('admin.layouts.template')
@section('content')
    <div class="pagetitle mt-3">
        <nav>
            <div class="d-flex justify-content-between align-items-center bg-white px-3 py-4">
                <div class=" ">
                    <h1 style="font-size: 1.2rem;">Liste des examens</h1>
                    <ol class="breadcrumb mt-1 mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('examens.index') }}">Dashboard</a></li> &nbsp; /
                        <li class="breadcrumb-item"><a href="{{ route('examens.index') }}">Examens</a></li> &nbsp; /

                        <li class="breadcrumb-item active">Liste des examens</li>
                        </li>
                    </ol>
                </div>
                <div class="text-center d-flex justify-content-between mt-2">

                    <a class="btn bg-favorite-color py-2 fw-bold text-white d-flex justify-content-between align-items-center"
                        href=" {{ route('examens.create') }} ">Ajouter un
                        nouveau</a>

                </div>
            </div>
        </nav>
    </div>



    <div class="tile">
        <div class="tile-body">

            @if (session('addedExamenMessage'))
                <div class="alert alert-success">
                    <h6> {{ session('addedExamenMessage') }} </h6>
                </div>
            @endif

            @if (session('editExamenMessage'))
                <div class="alert alert-success my-3">
                    <h6> {{ session('editExamenMessage') }} </h6>
                </div>
            @endif

            @if (session('deletedExamenMessage'))
                <div class="alert alert-success my-3">
                    <h5> {{ session('deletedExamenMessage') }} </h5>
                </div>
            @endif
            @if (session('statusMessage'))
                <div class="alert alert-success my-3">
                    <h5> {{ session('statusMessage') }} </h5>
                </div>
            @endif


        </div>

        <div class="shadow p-2 pt-4 mt-3 bg-white" style="border-radius: 10px;">
            <div class=" table-responsive container-fluid">
                <table class="table datatable  table-striped border-collapse">
                    <thead>
                        <tr>
                            <th>Année</th>
                            <th>Examen</th>
                            <th>Statut</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if (count($examens) > 0)
                            @foreach ($examens as $examen)
                                <tr class="border">
                                    <td>{{ $examen->annee }}</td>
                                    <td>
                                        @foreach ($examen->examens as $exam)
                                            <b>{{ $exam['examen'] }}</b>: &nbsp; {{ $exam['taux'] }} %<br />
                                        @endforeach
                                    </td>
                                    <td>{{ $examen->status }}</td>
                                    </td>

                                    <td>

                                        <div class="d-flex">


                                            <a href="#" class="text-danger me-1" data-bs-toggle="modal"
                                            data-bs-target="{{ '#changeModalExamen' . $examen->id }}">

                                            @if($examen->status=="desactive")
                                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23"
                                                fill="currentColor" class="bi bi-check2-circle"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z" />
                                                <path
                                                    d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z" />
                                                </svg>
                                            @else
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="green" class="bi bi-check2-all" viewBox="0 0 16 16">
                                                <path d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l7-7zm-4.208 7l-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0z"/>
                                                <path d="M5.354 7.146l.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708z"/>
                                              </svg>    
                                            @endif
                                            

                                        </a>



                                            <a href="{{ route('examens.edit', ['examen' => $examen->id]) }}"
                                                title="Editer l'examen" class="btn btn-sm text-success mx-1">

                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                                                    <path
                                                        d="M13.498.795l.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z" />
                                                </svg>
                                            </a>
                                            <a href="#" class="text-danger" data-bs-toggle="modal"
                                                data-bs-target="{{ '#deleteModalExamen' . $examen->id }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                    fill="currentColor" class="bi bi-x text-danger" viewBox="0 0 16 16">
                                                    <path
                                                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                                </svg>
                                            </a>
                                        </div>
                                    </td>

                                </tr>

                                <!-- Modal Confirm suppresion -->
                                <div class="modal fade" id="{{ 'deleteModalExamen' . $examen->id }}" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Confirmer la suppression</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Voulez-vous vraiment supprimmer l'examen : <br>
                                                {{ $examen->annee }} ?
                                            </div>
                                            <div class="modal-footer">
                                                <form method="POST"
                                                    action="{{ route('examens.destroy', ['examen' => $examen->id]) }}">

                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Annuler</button>
                                                    <input type="submit" class="btn btn-danger" value="Confirmer">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal Confirm status -->
                                <div class="modal fade" id="{{ 'changeModalExamen' . $examen->id }}"
                                    tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title fw-bold">Confirmer @if ($examen->status == 'active')
                                                        la <strong class="text-danger">désactivation</strong>
                                                    @else
                                                        <strong class="text-danger">l'activation</strong>
                                                    @endif de l'examen</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Voulez-vous vraiment @if ($examen->status == 'active')
                                                    <strong class="text-danger">désactiver</strong>
                                                @else
                                                    <strong class="text-danger">activer</strong>
                                                @endif l'examen:
                                                <span class="text-danger"> 
                                                    {{ $examen->annee }} ?</span>
                                            </div>

                                            <div class="modal-footer">
                                                <form method="POST" action="{{ route('changeStateExamen', ['examen'=> $examen->id]) }}">
                                                    @csrf
                                                    
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Annuler</button>
                                                    <input type="submit" class="btn btn-danger"
                                                        value="Confirmer">
                                                </form>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- End Modal Confirm status -->


                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
