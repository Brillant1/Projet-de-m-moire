@extends('admin.layouts.template')
@section('content')
<div class="pagetitle mt-3">
    <nav>
        <div class="d-flex justify-content-between align-items-center bg-white px-3 py-4">
            <div class=" ">
                <h1 style="font-size: 1.2rem;">Liste des alertes</h1>
                <ol class="breadcrumb mt-1 mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('alertes.index') }}">Dashboard</a></li> &nbsp; /
                    <li class="breadcrumb-item"><a href="{{ route('alertes.index') }}">Alertes</a></li> &nbsp; /

                    <li class="breadcrumb-item active">Liste des alertes</li>
                    </li>
                </ol>
            </div>
            <div class="text-center d-flex justify-content-between mt-2">

                <a class="btn bg-favorite-color py-2 fw-bold text-white d-flex justify-content-between align-items-center"
                    href=" # ">Ajouter un
                    nouveau</a>

            </div>
        </div>
    </nav>
</div>



    <div class="tile">
        <div class="tile-body">
            @if (session('addedAlerteMessage'))
                <div class="alert alert-success mb-3">
                    <h6> {{ session('addedAlerteMessage') }} </h3>
                </div>
            @endif
            @if (session('deletedMessage'))
                <div class="alert alert-danger mb-3">
                    <h6> {{ session('deletedMessage') }} </h3>
                </div>
            @endif

        </div>

        <div class="shadow p-2 pt-4 mt-3 bg-white" style="border-radius: 10px;">
            <div class=" table-responsive container-fluid">
                <table class="table datatable  table-striped border-collapse">
                    <thead>
                        <tr class=" ">
                            <th class=" ">Date</th>
                            <th class=" ">Candidat</th>
                            <th class=" ">Message</th>
                            <th class="th">N° Demande</th>
                            <th class=" ">Action</th>
                        </tr>


                    </thead>
                    <tbody>
                        @if (sizeof($alertes) > 0)
                            @foreach ($alertes as $alerte)
                                <tr class=" ">


                                    <td class=" ">{{ $alerte->created_at->format('d-m-Y') }}</td>
                                    {{-- <td class=" ">{{ $alerte->demande->nom }}</td> --}}
                                    <td class=" ">{{ $alerte->message }}</td>
                                    {{-- <td class="">{{ $alerte->demande->id }}</td> --}}

                                    <td class=" d-flex justify-content-evenly align-items-center w-100">
                                        
                                            <a href="{{ route('alertes.edit', ['alerte' => $alerte->id]) }}"
                                                title="Editer l'article" class=""
                                                >

                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-pen-fill " viewBox="0 0 16 16">
                                                    <path
                                                        d="M13.498.795l.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z" />
                                                </svg>
                                            </a>

                                            <button type="button" class="btn mt-2" data-bs-toggle="modal"
                                                data-bs-target="{{ '#deleteModal' . $alerte->nom }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                    fill="currentColor" class="bi bi-x text-danger" viewBox="0 0 16 16">
                                                    <path
                                                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                                </svg>
                                            </button>

                                            {{-- Delete alerte modal --}}
                                            <div class="modal fade" id="{{ 'deleteModal' . $alerte->nom }}"
                                                tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Confirmer la suppression</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Voulez-vous vraiment supprimmer cet alerte envoyé à: <br>
                                                            {{ $alerte->nom . ' ' . $alerte->prenom }} ?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form method="POST"
                                                                action="{{ route('alertes.destroy', ['alerte' => $alerte->id]) }}">

                                                                <input type="hidden" name="_method" value="DELETE">
                                                                <input type="hidden" name="_token"
                                                                    value="{{ csrf_token() }}">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Annuler</button>
                                                                <input type="submit" class="btn btn-danger"
                                                                    value="Confirmer">
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- End delete alerte modal --}}

                                            {{-- modal to alert user about update demand --}}
                                            <div class="modal fade" id="{{ 'updateModal' . $alerte->nom }}"
                                                tabindex="-1">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div
                                                            class="modal-header d-flex  flex-column-reverse bg-favorite-color text-white">
                                                            <h5 class="modal-title pb-1">Informez
                                                                {{-- {{ $alerte->demande->nom . ' ' . $alerte->demande->prenom }} --}}
                                                                de tout ce qui concerne sa demande.
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close" id="btn-close"></button>
                                                        </div>
                                                        <form
                                                            action="{{ route('alertes.update', ['alerte' => $alerte->id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="form-group">

                                                                    <div class="mb-3">
                                                                        <label for="nom" class="form-label px-2">Nom et
                                                                            Prénoms</label>
                                                                        <input type="text" class="form-control"
                                                                            value="{{ $alerte->nom }}" name="nom"
                                                                            id="nom" required>
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label for="sujet" class=" px-2">Sujet du
                                                                            message</label>
                                                                        <select class="form-select px-2"
                                                                            aria-label="Default select example"
                                                                            id="sujet" name="sujet"
                                                                            @if (old('sujet', $alerte->sujet) == $alerte->sujet) selected @endif>
                                                                        </select>
                                                                        <option selected> - - -</option>
                                                                        <option value="1">Rejet de demande</option>
                                                                        <option value="2">Notes</option>
                                                                        <option value="3">Reproches</option>
                                                                        <option value="3">Infos importante</option>
                                                                        </select>
                                                                    </div>




                                                                    <label for="exampleFormControlTextarea1">Message au
                                                                        demandeur
                                                                        {{-- {{ $alerte->demande->nom . ' ' . $alerte->demande->prenom }}</label> --}}
                                                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="message"
                                                                        style="height: 150px;">{{ $alerte->message }}</textarea>
                                                                    <input type="hidden" name="demande_id"
                                                                        value="{{ $alerte->demande_id }}" required>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">

                                                                @csrf
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Annuler</button>
                                                                <input type="submit" class="btn btn-primary"
                                                                    value="Envoyer">
                                                            </div>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                            {{-- end modal --}}

                                        
                                    </td>

                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
