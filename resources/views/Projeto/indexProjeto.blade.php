<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa&family=Quicksand:wght@500&display=swap" rel="stylesheet">
    <!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Página Inicial - Projetos</title>

    <script>
        const formatDateTime = (str) => {
            if (typeof str === "string") {
                return str.replace(/([0-9]{4})-([0-9]{2})-([0-9]{2})T([0-9]{2}:[0-9]{2}:[0-9]{2})/, "$3/$2/$1 $4");
            } else {
                return ""
            }
        }
    </script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

    <style>
        * {
            font-family: Comfortaa;
        }
    </style>
</head>

<body>
    <main class="container">
        <div class="d-flex justify-content-center">
            <h1 class='my-4'>Página Inicial - Projetos</h1>
        </div>
        <!-- <div class="row d-flex justify-content-center">
            <div class="col-sm-7 col-md-4 offset-md-1 mb-2">
                <input class="form-control" name="nomeProjeto" type="text" onChange={teste} placeholder="Nome do Projeto"></input>
            </div>
            <div class="col-sm-5 col-md-4 col-lg-3">
                <a href="{{route('projeto.create')}}" class="btn btn-block btn-success btn-md">Adicionar Projeto</a>
            </div>
        </div> -->
        <form method="get" action="{{route('projeto.pesquisa')}}">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-4 col-sm-7 offset-md-2">
                    <input class="form-control offset-md-1" name="nomeProjeto" type="text" placeholder="Nome do Projeto" required>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-5">
                    <button type="submit" class="btn btn-dark btn-md offset-md-2">Pesquisar</button>
                </div>
                <div class="col-lg-3 col-md-7 mt-md-2 col-sm-12 mt-sm-2 mt-lg-0">
                    <a href="{{route('projeto.create')}}" class="btn btn-block btn-success btn-md">Adicionar Projeto</a>
                </div>
            </div>
        </form>

        <table class="table mt-4">
            <thead>
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Nome do Projeto</th>
                    <!-- <th scope="col">Descrição do Projeto</th> -->
                    <th scope="col">Adicionado em</th>
                    <th scope="col">Qtd. Tarefas</th>
                    <th scope="col">Status</th>
                    <th scope="col">Ações</th>
                    <!-- <th scope="col">Listar Tarefas</th>
                    <th scope="col">Editar Projeto</th>
                    <th scope="col">Excluir Projeto</th> -->
                </tr>
            </thead>
            <tbody>
                @if(!is_null($projetos))
                @foreach($projetos as $projeto)
                <tr>
                    <td>{{$projeto->id}}</td>
                    <td>{{$projeto->nomeProjeto}}</td>
                    <!-- <td>{{$projeto->descricaoProjeto}}</td> -->
                    <td>{{$projeto->dhCriacao}}</td>
                    <td>{{$projeto->Tarefa->count()}}</td>
                    <td>{{$projeto->xStatus}}</td>
                    <td class="d-flex">
                        <a href="" type="button" class="btn btn-primary btn-sm m-2 mb-2 mb-sm-0"><box-icon name='list-ul'></box-icon></a>
                        <a href="{{route('projeto.edit', $projeto->id)}}" type="button" class="btn btn-warning btn-sm m-2 mb-2 mb-sm-0"><box-icon name='edit-alt' type='solid'></box-icon></a>
                        <form method="post" action="{{route('projeto.destroy', $projeto->id)}}">
                            @method('delete')
                            @csrf
                            <button href="{{route('projeto.destroy', $projeto->id)}}" type="submit" class="btn btn-danger btn-sm m-2 mb-2 mb-sm-0"><box-icon name='x'></box-icon></button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </main>
    @include('sweetalert::alert')
</body>

</html>