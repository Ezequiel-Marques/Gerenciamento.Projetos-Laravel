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

    <title>Página Inicial - Projetos</title>

    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script>
        function openDescription(desc) {
            if (!desc) {
                let modal = document.getElementById('modal');
                let modalBody = document.getElementById('modal-body');
                modalBody.innerHTML = 'Essa tarefa não possui nenhuma descrição!';
                modal.showModal();
            } else {
                let modal = document.getElementById('modal');
                let modalBody = document.getElementById('modal-body');
                modalBody.innerHTML = desc;
                modal.showModal();
            }
        }

        function closeDescription() {
            document.getElementById('modal').close();
        }
    </script>

    <style>
        * {
            font-family: Comfortaa;
        }
    </style>
</head>

<body>
    <main class="container">
        <div>
            <a href="{{route('index.projeto')}}" class='btn btn-secondary btn-sm mt-3'>
                Voltar
            </a>
        </div>
        <div class="d-flex justify-content-center">
            <h1 class='my-2 mb-4'>Tarefas de <strong>{{$projetos->nomeProjeto}}</strong></h1>
        </div>
        <form method="get" action="">
            <div class="d-flex justify-content-center flex-row flex-column flex-sm-row">
                <!-- <div class="mx-2 flex-fill">
                    <input class="form-control" name="nomeProjeto" type="text" placeholder="Nome da Tarefa">
                </div>
                <div class="mx-2">
                    <button type="submit" class="btn btn-dark btn-md w-100 w-sm-auto my-2 my-sm-0">Pesquisar</button>
                </div> -->
                <div class="mx-2">
                    <a href="{{route('tarefa.create', $projetos->id)}}" class="btn btn-block btn-success btn-md w-100 w-sm-auto">Adicionar Tarefa</a>
                </div>
            </div>
        </form>

        <dialog id="modal" class="bg-white rounded border border-1 border-primary w-50">
            <div class="d-flex justify-content-end mb-3">
                <button class="btn btn-sm btn-close" onclick=closeDescription()></button>
            </div>
            <h3 class="d-flex justify-content-center mb-3"><strong>Descrição:</strong></h3>
            <strong>
                <div id="modal-body" class="d-flex justify-content-center"></div>
            </strong>
        </dialog>

        <div class="table-responsive">
            <table class="table mt-4">
                <thead>
                    <tr>
                        <!-- <th scope="col">Código Tarefa</th> -->
                        <th scope="col">Título</th>
                        <th scope="col">Adicionado em</th>
                        <th scope="col">Última alteração</th>
                        <th scope="col">Usuário</th>
                        <th scope="col">Importância</th>
                        <th scope="col">Status</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @if(!is_null($tarefas))
                    @foreach($tarefas as $tarefa)
                    <tr>
                        <!-- <td>{{$tarefa->idTarefa}}</td> -->
                        <td>{{$tarefa->titulo}}</td>
                        <td>{{\Carbon\Carbon::parse($tarefa->dhCriacao)->format('d/m/Y H:i:s')}}</td>
                        <td>{{\Carbon\Carbon::parse($tarefa->ultimaAlteracao)->format('d/m/Y H:i:s')}}</td>
                        <td>{{$tarefa->nomeUsuario}}</td>
                        <td>{{$tarefa->importancia}}</td>
                        <td>{{$tarefa->xStatus}}</td>
                        <td class="d-flex">
                            <button onclick="openDescription('{{$tarefa->descricaoTarefa}}')" type="button" class="btn btn-secondary btn-sm m-2 mb-2 mb-sm-0"><box-icon name='info-circle'></box-icon></button>
                            <a href="{{route('tarefa.edit', [$tarefa->idProjeto, $tarefa->idTarefa])}}" type="button" class="btn btn-warning btn-sm m-2 mb-2 mb-sm-0"><box-icon name='edit-alt'></box-icon></a>
                            <form method="post" action="{{route('tarefa.destroy', $tarefa->idTarefa)}}">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm m-2 mb-2 mb-sm-0"><box-icon name='x'></box-icon></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </main>
    @include('sweetalert::alert')
</body>

</html>