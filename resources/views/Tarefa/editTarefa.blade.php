<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa&family=Quicksand:wght@500&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Editar Tarefa</title>

    <style>
        * {
            font-family: Comfortaa;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="{{route('tarefa.show', [$tarefa->idProjeto, $tarefa->idTarefa])}}" class='btn btn-secondary btn-sm my-4'>
                    Voltar
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h1>Editar Tarefa</h1>
            </div>
        </div>
        <form method="post" action="{{route('tarefa.update', [$tarefa->idProjeto, $tarefa->idTarefa])}}">
            @csrf
            @method('put')
            <div class="row">
                <div class="col-md-3 col-sm-12">
                    <strong><label class='mt-2'>Código do Projeto:</label> <br /></strong>
                    <input type="number" class='form-control' name='idProjeto' value="{{$tarefa->idProjeto}}" required readOnly></input>
                </div>
                <div class="col-md-3 col-sm-12">
                    <strong><label class='mt-2'>Código da Tarefa:</label> <br /></strong>
                    <input type="number" class='form-control' name='idTarefa' value="{{$tarefa->idTarefa}}" required readOnly></input>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-4">
                    <strong><label class='mt-2'>Nome da Tarefa:</label> <br /></strong>
                    <input type="text" class='form-control' name='titulo' value="{{$tarefa->titulo}}" required></input>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-4">
                    <strong><label class='mb-0 mt-3'>Nome do Usuário:</label> <br /></strong>
                    <input type="link" class='form-control' name='nomeUsuario' value="{{$tarefa->nomeUsuario}}"></input>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-5 d-flex flex-column">
                    <label htmlFor="" class='mb-0 mt-3'><strong>Descrição da Tarefa:</strong></label>
                    <textarea style="resize: none; height: 130px" class="form-control" maxlength="250" name='descricaoTarefa'>{{$tarefa->descricaoTarefa}}</textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-4 mt-3 mb-0">
                    <label htmlFor=""><strong>Importância:</strong></label>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-1">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id='f1' name="importancia" value="Baixa" {{$tarefa->importancia === "Baixa" ? 'checked' : ''}} required></input>
                        <label class="form-check-label" htmlFor="f1">Baixa</label>
                    </div>
                </div>
                <div class="col-12 col-lg-1">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id='f2' name="importancia" value="Normal" {{$tarefa->importancia === "Normal" ? 'checked' : ''}} required></input>
                        <label class="form-check-label" htmlFor="f2">Normal</label>
                    </div>
                </div>
                <div class="col-12 col-lg-1">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id='f3' name="importancia" value="Urgente" {{$tarefa->importancia === "Urgente" ? 'checked' : ''}} required></input>
                        <label class="form-check-label" htmlFor="f3">Urgente</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4 mt-3 mb-0">
                    <label htmlFor=""><strong>Status:</strong></label>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="f4" name="xStatus" value="A iniciar" {{$tarefa->xStatus === "A iniciar" ? 'checked' : ''}} required></input>
                        <label class="form-check-label" htmlFor="f4">A iniciar</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="f5" name="xStatus" value="Em andamento" {{$tarefa->xStatus === "Em andamento" ? 'checked' : ''}} required></input>
                        <label class="form-check-label" htmlFor="f5">Em andamento</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="f6" name="xStatus" value="Finalizado" {{$tarefa->xStatus === "Finalizado" ? 'checked' : ''}} required></input>
                        <label class="form-check-label" htmlFor="f6">Finalizado</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <button type='submit' class='btn btn-success btn-sm my-3'>Editar Tarefa</button>
                </div>
            </div>
        </form>
    </div>
    @include('sweetalert::alert')
</body>

</html>