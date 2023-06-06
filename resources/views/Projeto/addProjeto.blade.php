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

    <title>Adicionar Projeto</title>

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
                <a href="{{route('index.projeto')}}" class='btn btn-secondary btn-sm my-4'>
                    Voltar
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h1>Adicionar Projeto</h1>
            </div>
        </div>
        <form method="post" action="{{route('projeto.store')}}">
            @csrf
            @method('post')
            <div class="row">
                <div class="col-12 col-lg-4">
                    <strong><label class='mt-2'>Nome do Projeto:</label> <br /></strong>
                    <input type="text" class='form-control' name='nomeProjeto' required></input>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-4">
                    <strong><label class='mb-0 mt-3'>Link do Projeto: (GitHub, GitLab, ...)</label> <br /></strong>
                    <input type="link" class='form-control' name='linkProjeto'></input>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-5 d-flex flex-column">
                    <label htmlFor="" class='mb-0 mt-3'><strong>Descrição do Projeto:</strong></label>
                    <textarea style="resize: none; height: 110px" class="form-control" maxlength="250" name='descricaoProjeto'></textarea>
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
                        <input class="form-check-input" type="radio" id="f4" name="xStatus" value="A iniciar" required></input>
                        <label class="form-check-label" htmlFor="f4">A iniciar</label>
                    </div>
                </div>
                <div classNaclassme="col-12">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="f5" name="xStatus" value="Em andamento" required></input>
                        <label class="form-check-label" htmlFor="f5">Em andamento</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="f6" name="xStatus" value="Finalizado" required></input>
                        <label class="form-check-label" htmlFor="f6">Finalizado</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <button type='submit' class='btn btn-success btn-sm mt-3'>Adicionar Projeto
                        <FontAwesomeIcon icon={faPlus} />
                    </button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>