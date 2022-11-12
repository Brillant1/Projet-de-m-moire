@extends('admin.layouts.template')
@section('content')
    <div class="pagetitle mt-3">
       
        <nav class="mb-3">
            <div class="d-flex justify-content-between align-items-center bg-white px-3 py-4">
                <div class=" ">
                    <h1 style="font-size: 1.2rem;">Liste des colleges</h1>
                    <ol class="breadcrumb mt-1 mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('colleges.index') }}">Dashboard</a></li> &nbsp; /
                        <li class="breadcrumb-item"><a href="{{ route('colleges.index') }}">colleges</a></li> &nbsp; /
    
                        <li class="breadcrumb-item active">Liste des college</li>
                        </li>
                    </ol>
                </div>
                <div class="text-center d-flex justify-content-between mt-2">
    
                    <a class="btn bg-favorite-color py-2 fw-bold text-white d-flex justify-content-between align-items-center"
                        href=" {{ route('colleges.create') }} ">Ajouter un
                        nouveau</a>
    
                </div>
            </div>
        </nav>
    </div>



    <div class="tile">
        <div class="tile-body">
            @if (session('updatedMessage'))
                <div class="alert alert-success mb-3">
                    <h6> {{ session('updatedMessage') }} </h3>
                </div>
            @endif
            @if (session('deletedMessage'))
                <div class="alert alert-success mb-3">
                    <h6> {{ session('deletedMessage') }} </h3>
                </div>
            @endif
            {{-- <div class="text-center my-3 alert bg-warning">
                <h4 class="text-white font-italic fw-bold">Liste des colleges</h4>
            </div>
            <div class="text-center mb-4 d-flex justify-content-end">
                <a class="btn btn-success p-2 fw-bold text-white" href=" {{ route('colleges.create') }} ">Ajouter un
                    nouveau</a>
            </div> --}}

        </div>


        <div class="shadow p-5 bg-white" style="border-radius: 10px;">
            <div class="table-responsive container-fluid">
                <table class="table datatable  table-striped border-collapse table-bordered "
                    id="sampleTable">
                    <thead>
                        <tr class="">
                            <th class=" ">Collège</th>
                            
                            <th class="">Commune</th>
                            
                            <th class=" ">Directeur</th>
                            
                            <th class=" ">Action</th>
                        </tr>


                    </thead>
                    <tbody>

                        @foreach ($colleges as $college)
                            <tr class="">

                                <td class=" px-4">{{ $college->nom }}</td>
                               
                                <td class=" px-4">{{ $college->commune->nom }}</td>
                                
                                <td class=" px-4">{{ $college->directeur}}</td>
                               

                                <td class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex justify-content-evenly w-100">
                 
                                        <a href="{{ route('colleges.edit', ['college' => $college->id]) }}"
                                            title="Editer" class="ms-2">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="green" class="bi bi-pen-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M13.498.795l.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z" />
                                            </svg>
                                        </a>

                                        <a href="#" class="text-danger" data-bs-toggle="modal" title="Supprimer"
                                        data-bs-target="{{ '#deleteModal' . $college->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                fill="currentColor" class="bi bi-x text-danger" viewBox="0 0 16 16">
                                                <path
                                                    d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                            </svg>
                                        </a>

                                        

                                        <div class="modal fade" id="{{ 'deleteModal' . $college->id }}"
                                            tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Confirmer la suppression</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Voulez-vous vraiment supprimmer le college : <br>
                                                        {{ $college->nom }}
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form method="POST" action="{{ route('colleges.destroy', ['college' => $college->id]) }}">

                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <input type="hidden" name="_token"
                                                                value="{{ csrf_token() }}">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Annuler</button>
                                                            <input type="submit" class="btn btn-danger" value="Confirmer">
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
