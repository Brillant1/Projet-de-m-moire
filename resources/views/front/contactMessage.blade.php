<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header">
                    Bonjour !
                </div>
                <div class="card-body">
                    <h1>Message d'un utilisateurs</h1>
                    <div class="shadow p-2">
                        <p>Nom : {{ $detailMessage['nom'] }}</p>
                        <p>Email : {{ $detailMessage['email'] }}</p>
                        <p>Téléphone : {{ $detailMessage['phone'] }}</p>
                        <p>Sujet : {{ $detailMessage['objet'] }}</p>
                        <p>Message : {{ $detailMessage['message'] }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
