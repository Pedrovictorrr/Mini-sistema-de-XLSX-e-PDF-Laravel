@extends('layout')
@section('content')
    <style>
        /* Estilos para o modal */
        body {
            font-family: Arial, sans-serif;
        }

        #myModal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
        }

        #myModal .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 70%;
        }

        #myModal .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        #myModal .close:hover,
        #myModal .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>

    <form id="meuFormulario">
        @csrf
        <div class="border p-3 rounded  bg-white">
            <div class="form-group">
                <label for="exampleFormControlSelect1">Ano</label>
                <select name="Ano" class="form-control" id="exampleFormControlSelect1">
                    @foreach ($anos as $anos)
                        <option>{{ $anos }}</option>
                    @endforeach

                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Módulo</label>
                <select name="Modulo" class="form-control" id="exampleFormControlSelect1">
                    <option>Contábil</option>
                    <option disabled>Tesouraria</option>
                    <option disabled>Licitações</option>
                    <option disabled>Contratos</option>
                    <option disabled>Patrimônio</option>
                </select>
            </div>
            <div>
                <label class="" for="flexRadioDefault1">
                    Geração
                </label>
                <br>
                <div class="form-check form-check-inline">
                    <input disabled class="form-check-input" value="Abertura" type="radio" name="Geracao" id="Geracao1">
                    <label class="form-check-label" for="Geracao1">
                        ABERTURA
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input disabled class="form-check-input" value="Diario" type="radio" name="Geracao" id="Geracao2">
                    <label class="form-check-label" for="Geracao2">
                        DIÁRIO
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input disabled class="form-check-input" value="Fechamento" type="radio" name="Geracao"
                        id="Geracao3">
                    <label class="form-check-label" for="Geracao1">
                        FECHAMENTO
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" value="Mensal" type="radio" name="Geracao" id="Geracao4" checked>
                    <label class="form-check-label" for="Geracao2">
                        MENSAL
                    </label>
                </div>
            </div>
            <div class="mt-2 form-group">
                <label for="exampleFormControlSelect1">Mês</label>
                <select name="Mes" class="form-control" id="exampleFormControlSelect1">
                    @foreach ($meses as $index => $mes)
                        <option value="{{ $loop->index + 1 }}">{{ $mes }}</option>
                    @endforeach


                </select>
            </div>
            <div class="form-check form-check-inline">
                <input name="somente ativos" class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Somente Ativos
                </label>
            </div>
        </div>
        <div class="border rounded shadow">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col-10">Arquivo</th>
                        <th scope="col-2">Ultima geração</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <tr>
                        <th>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="inlineCheckbox1">1- </label>
                                <input name="Plano Contabil" class="form-check-input ml-1" type="checkbox"
                                    id="inlineCheckbox1" value="true">
                                Plano Contábil

                            </div>
                        </th>
                        <td>Gerado em xx/xx/xxxx</td>

                    </tr>
                    <tr>
                        <th>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="inlineCheckbox1">2- </label>
                                <input name="Movimento_Contabil" class="form-check-input ml-1" type="checkbox"
                                    id="inlineCheckbox1" value="true">
                                Movimento Contabil Mensal

                            </div>
                        </th>
                        <td>Gerado em xx/xx/xxxx</td>

                    </tr>
                    <tr>
                        <th>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="inlineCheckbox1">3- </label>
                                <input name="Diario Contabilidade" class="form-check-input ml-1" type="checkbox"
                                    id="inlineCheckbox1" value="true">
                                Diário Contabilidade
                            </div>
                        </th>
                        <td>Gerado em xx/xx/xxxx</td>

                    </tr>
                    <tr>
                        <th>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="inlineCheckbox1">4- </label>
                                <input name="Movimento Realizavel" class="form-check-input ml-1" type="checkbox"
                                    id="inlineCheckbox1" value="true">
                                Movimento Realizavel
                            </div>
                        </th>
                        <td>Gerado em xx/xx/xxxx</td>

                    </tr>
                </tbody>
            </table>
        </div>
        <div class="p-3">
            <button type="button" onclick="openModal()" id="enviarFormulario" class="btn btn-primary">Exportar</button>
            <button type="button" class="btn btn-primary">Limpar</button>
            <button type="button" class="btn btn-primary">Ordernar Geração de Arquivos</button>
        </div>
    </form>

    <div id="myModal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <div class="alert alert-success" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" height="50px" viewBox="0 0 512 512">
                    <path
                        d="M256 48a208 208 0 1 1 0 416 208 208 0 1 1 0-416zm0 464A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-111 111-47-47c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l64 64c9.4 9.4 24.6 9.4 33.9 0L369 209z" />
                </svg>
                A simple success alert—check it out!
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Arquivo</th>
                        <th scope="col">Status</th>
                        <th scope="col">Qtde. Registros</th>
                        <th scope="col">Baixar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">PlanoContabil</th>
                        <td>Gerado em </td>
                        <td></td>
                        <td><a href="" class="btn btn-primary">Baixar</a></td>
                    </tr>
                    <tr>
                        <th scope="row">Movimento Contabil Mensal</th>
                        <td>Gerado em </td>
                        <td></td>
                        <td><a href="" class="btn btn-primary">Baixar</a></td>
                    </tr>
                    <tr>
                        <th scope="row">Diário Contabilidade</th>
                        <td>Gerado em </td>
                        <td></td>
                        <td><a href="" class="btn btn-primary">Baixar</a></td>
                    </tr>
                    <tr>
                        <th scope="row">Movimento Realizavel</th>
                        <td>Gerado em </td>
                        <td></td>
                        <td><a href="" class="btn btn-primary">Baixar</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        // Função para abrir o modal
        function openModal() {
            var modal = document.getElementById("myModal");
            modal.style.display = "block";
        }

        // Função para fechar o modal
        function closeModal() {
            var modal = document.getElementById("myModal");
            modal.style.display = "none";
        }

        // Fecha o modal se o usuário clicar fora da área do modal
        window.onclick = function(event) {
            var modal = document.getElementById("myModal");
            if (event.target == modal) {
                modal.style.display = "none";
            }
        };
    </script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#enviarFormulario').on('click', function() {
                // Obtenha os dados do formulário
                var formData = $('#meuFormulario').serialize();

                // Envie a solicitação Ajax para o servidor
                $.ajax({
                    type: 'POST',
                    url: '/exportador/find-file', // Substitua pelo caminho da rota que manipula o envio do formulário
                    data: formData,
                    success: function(response) {
                        // Lide com a resposta do servidor aqui (opcional)
                        console.log('Enviado com sucesso!');
                    },
                    error: function(error) {
                        // Lide com erros de requisição aqui (opcional)
                        console.log(error);
                    }
                });
            });
        });
    </script>

@stop
