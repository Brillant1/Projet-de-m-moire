<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            box-sizing: border-box;
        }

        .main {
            width: 220mm;
            height: 305mm;
            position: relative;
            background-color: rgb(218, 231, 218)
        }

        .head {}

        .divHierachie {
            width: 60%;
        }

        .divHierachie>hr {
            width: 90px;
            background-color: black;
            margin-top: 0px;
            margin-bottom: 20px;
        }

        .divHierachie>p {
            margin-bottom: 0px;
        }

        .infoDiv {
            display: flex;
            flex-direction: column;
            padding: 10px;
        }

        .infoDiv>div {
            display: flex;
        }

        .infoDiv>div>div:first-child {
            width: 40%;
        }

        .infoDiv>div>div:first-child>p {
            margin-left: 20px;
            font-size: 1.1rem;
            font-family: cursive;
        }

        .infoDiv>div>div:last-child {
            width: 60%;
        }

        .infoDiv>div>div:last-child>p {
            font-size: 1.1rem;
            width: 100%;
            border-bottom: 1px dotted black;
            font-family: cursive;
        }

        .reference {
            margin-left: 40px;
            font-family: fantasy
        }
    </style>
</head>

<body>
    <div class="main border">
        <div class="head d-flex">
            <div class=" divHierachie pt-3 d-flex flex-column justify-content-center align-items-center pb-3 ">
                <p>REPUBLIQUE DU BENIN</p>
                <hr>
                <p class="fw-bold">MINISTERE DE L'ENSEIGNEMENT SECONDAIRE, <br> TECHNIQUE ET DE LA FORMATION
                    PROFESSIONNELLE</p>
                <hr>
                <p>CABINET DU MINISTERE</p>
                <hr>
                <p class="fw-bold">DIRECTION DES EXAMENS ET CONCOURS</p>
                <hr>
            </div>
            <div class="photo d-flex justify-content-between align-items-center p-2">

                {{-- <img src="images/default-removebg-preview.png" alt="" width="150" height="150"> --}}
                <img src="images/default.png" alt="" width="150" height="150" class="mx-2">
            </div>
        </div>
        <h2 class="text-center pt-1 fw-bold pb-2"
            style="font-family: 'Times New Roman', Times, serif; font-style:oblique">ATTESTATION</h2>

        <div>
            <div class="reference">
                <p>N° <span style="border-bottom: 3px dotted black;"> <b>16/0019/22</b></span> / DEC / MESTFP / SIS /
                    SDADC</p>
            </div>
            <p class="text-center fw-bold fs-5" style="">Le Directeur des Examens et Concours, soussigné, atteste
                que :
            </p>
            <div class="infoDiv">
                <div class="d-flex align-items-center p-2">
                    <div>
                        <p>M :</p>
                    </div>
                    <div>
                        <p class="fw-bold fs-4">TCHAGNONSI Esaie</p>
                    </div>
                </div>

                <div class="d-flex align-items-center p-2">
                    <div>
                        <p>Né le : </p>
                    </div>
                    <div>
                        <p>20/04/2000</p>
                    </div>
                </div>

                <div class="d-flex align-items-center p-2">
                    <div>
                        <p>à :</p>
                    </div>
                    <div>
                        <p>OUESSE</p>
                    </div>
                </div>

                <div class="d-flex align-items-center p-2">
                    <div>
                        <p>a subi avec succès l'examen du : </p>
                    </div>
                    <div>
                        <p class="fw-bold fs-5">Brevet d'Etudes du Premier Cycle (BEPC)</p>
                    </div>
                </div>

                <div class="d-flex align-items-center p-2">
                    <div>
                        <p>Série : </p>
                    </div>
                    <div>
                        <p class="fw-bold">Mod.Court</p>
                    </div>
                </div>

                <div class="d-flex align-items-center p-2">
                    <div>
                        <p>à la session de : </p>
                    </div>
                    <div>
                        <p class="dotted fw-bold">Juin 2016</p>
                    </div>
                </div>

                <div class="d-flex align-items-center p-2">
                    <div>
                        <p>Centre de : </p>
                    </div>
                    <div>
                        <p>CEG 2 OUESSE</p>
                    </div>
                </div>

                <div class="d-flex align-items-center p-2">
                    <div>
                        <p>Conformément à la décision N° : </p>
                    </div>
                    <div>
                        <p>024/MESTFP/DC/SGM/DEC/STEC-ECGSTMS/SA</p>
                    </div>
                </div>
                <div class="d-flex align-items-center p-2">
                    <div class="d-flex">
                        <p>du</p>
                        <p style="float: right">:</p>
                        </p>
                    </div>
                    <div>
                        <p>18 Février 2017</p>
                    </div>
                </div>


            </div>
            <p class="fw-bold text-center pt-0 mt-0 mt-0">En foi de quoi, la présente Attestation lui est délivrée pour
                servir et valoir ce que de droit.</p>
            <div class="d-flex flex-column justify-content-center " style="width: 50%; float: right;line-height: 7px;">
                <p style="margin-left: 70px;">Portono-Novo, jeudi 10 septembre 2020</p>
                <img src="images/signature1.png" alt="" class="pb-1">

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>

</body>

</html>
