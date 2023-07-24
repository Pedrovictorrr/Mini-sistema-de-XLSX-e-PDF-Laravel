@extends('layout')
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/orcamentario.css') }}">

    <div class="ml-2 mb-2">
        <button type="button" onclick="openModal()" class="btn btn-primary">Novo +</button>
    </div>

    <div class="p-3 border bg-white">
        <form class="" id="LeiPesquisar">
            @csrf
            <div class="p-2">
                <div class="form-group row  ">
                    <label for="exampleFormControlInput1 " class="mr-2 col-2 mt-2">Número / Ano</label>
                    <input name="Ano" type="text" class="form-control col-2" id="exampleFormControlInput1">
                </div>
                <div class="form-group row ">
                    <label for="exampleFormControlSelect1" class="mr-2 col-2 mt-2">Data do Ato</label>
                    <input name="Data do Ato" type="date" class="form-control col-2 mt-2" name="" id="">
                </div>
                <div class="form-group row ">
                    <label for="exampleFormControlSelect1" class="mr-2 col-2 mt-2">Data do Lançamento</label>
                    <input name="Data do Lancamento" type="date" class="form-control col-2 mt-2" name=""
                        id="">
                </div>
                <div class="form-group row ">
                    <label for="exampleFormControlSelect1" class="mr-2 col-2 mt-2">Data da Publicação</label>
                    <input name="Data da Publicacao" type="date" class="form-control col-2 mt-2" name=""
                        id="">
                </div>
                <div class="form-group row ">
                    <label for="exampleFormControlSelect1" class="mr-2 col-2 mt-2">Tipo de Ato</label>
                    <select name="Tipo do Ato" class="form-control col-2">
                        <option value="null">--todos</option>
                        <option>Decreto</option>
                        <option>Resolução</option>
                        <option>Ato Gestor</option>
                    </select>

                </div>
                <div class="form-group row ">
                    <label for="exampleFormControlSelect1" class="mr-2 col-2 mt-2">Tipo de Crédito</label>
                    <select name="Tipo de Credito" class="form-control col-2">
                        <option value="null">--todos</option>
                        <option>Especial</option>
                        <option>Suplementar</option>
                        <option>Extraordinário</option>
                    </select>

                </div>
                <div class="form-group row ">
                    <label for="exampleFormControlSelect1" class="mr-2 col-2 mt-2">Tipo de Recurso</label>
                    <select name="Tipo do Recurso" class="form-control col-1">
                        <option value="null">--todos</option>
                        <option>Superávit</option>
                        <option>Excesso de arrecadação</option>
                        <option>Valor do Crédito</option>
                    </select>

                </div>
                <div class="form-check">
                    <input name="Pendente" class="form-check-input" type="checkbox" value="" id="defaultCheck1"
                        value="true">
                    <label class="form-check-label" for="defaultCheck1">
                        Mostrar apenas pendente
                    </label>
                </div>
            </div>
            <div class="p-1 mt-3">
                <button type="button" id="botaoPesquisar" class="btn btn-primary">Pesquisar</button>
                <button type="button" class="btn btn-primary">Limpar</button>
            </div>
        </form>
    </div>
    <div class="mt-2 bg-white">
        <table class="table table-striped table-bordered tabela-resultados">
            <thead>
                <tr>
                    <th scope="col">Lei</th>
                    <th scope="col">Decreto</th>
                    <th scope="col">Data</th>
                    <th scope="col">Data da Publicação</th>
                    <th scope="col">Tipo de Ato</th>
                    <th scope="col">Tipo de Crédito</th>
                    <th scope="col">Tipo de Recurso</th>
                    <th scope="col">Situação</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody id="tabela-corpo">
             
            </tbody>
        </table>
        <div id="alert-pesquisa"></div>
    </div>

    {{-- Modal cadastar nova lei --}}
    <div id="myModal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <div class="mb-2">
                <center>
                    <h2>Nova lei</h2>
                </center>
            </div>
            <form class="FormNovaLei" id="FormNovaLei">
                @csrf
                <div class="p-2">
                    <div class="row">
                        <div class="form-group col ">
                            <label for="exampleFormControlInput1 " class="">Número / Ano</label>
                            <input required type="text" name="Numero" class="form-control "
                                id="exampleFormControlInput1">
                        </div>
                        <div class="form-group col ">
                            <label for="exampleFormControlSelect1" class="">Data do Ato</label>
                            <input required type="date" name="Data do Ato" class="form-control" name=""
                                id="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col ">
                            <label for="exampleFormControlSelect1" class="">Data do Lançamento</label>
                            <input required type="date" name="Data do lancamento" class="form-control" name=""
                                id="">
                        </div>
                        <div class="form-group col">
                            <label for="exampleFormControlSelect1" class="">Data da Publicação</label>
                            <input required type="date" name="Data da Publicacao" class="form-control" name=""
                                id="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col ">
                            <label for="exampleFormControlSelect1" class="">Tipo de Ato</label>
                            <select name="Tipo do ato" class="form-control ">
                                <option value="Decreto">Decreto</option>
                                <option value="Resolucao">Resolução</option>
                                <option value="Ato Gestor">Ato Gestor</option>
                            </select>
                        </div>
                        <div class="form-group col ">
                            <label for="exampleFormControlSelect1" class="">Tipo de Crédito</label>
                            <select name="Tipo do Credito" class="form-control ">
                                <option value="Especial">Especial</option>
                                <option value="Suplementar">Suplementar</option>
                                <option value="Extraordinario">Extraordinário</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col ">
                            <label for="exampleFormControlSelect1" class="mr-2  mt-2">Tipo de Recurso</label>
                            <select name="Tipo do recurso" class="form-control ">
                                <option value="Superavit">Superávit</option>
                                <option value="Excesso de arrecadacao">Excesso de arrecadação</option>
                                <option value="Valor">Valor do Crédito</option>
                            </select>
                        </div>
                        <div class="form-group col ">
                            <label for="exampleFormControlSelect1" class="mr-2  mt-2">Status</label>
                            <select name="Status" class="form-control ">
                                <option value="Emitido">Emitido</option>
                                <option value="Finalizado">Finalizado</option>
                                <option value="Aberto">Aberto</option>
                                <option value="Concluido">Concluido</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row p-2">
                        <label for="exampleFormControlInput1" class="mr-2 mt-2">Valor</label>
                        <input required type="number" name="Valor" id="exampleFormControlInput1" placeholder="00.00"
                            class="form-control col-2" step="0.01">
                    </div>

                </div>
                <div class="p-1 mt-3">
                    <button type="button" id="enviarFormulario" class="btn btn-primary">Enviar</button>
                    <button type="button" class="btn btn-primary">Limpar</button>
                </div>
            </form>

        </div>
    </div>
    {{-- fim modal --}}
    {{-- Modal de cadastro com sucesso! --}}
    <div id="myModalSucess">
        <div class="modal-content">

            <div class="alert alert-success" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" height="50px" class="ml-2" viewBox="0 0 512 512">
                    <path
                        d="M256 48a208 208 0 1 1 0 416 208 208 0 1 1 0-416zm0 464A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-111 111-47-47c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l64 64c9.4 9.4 24.6 9.4 33.9 0L369 209z" />
                </svg>
                Sua lei foi cadastrada com sucesso!
            </div>
            <button class="btn btn-primary" onclick="closeModalSucess()"> Fechar</button>

        </div>
    </div>
    {{-- Fim modal --}}

    {{-- Modal de editar Informações  --}}
    <div id="myModalEdit">
        <div class="modal-content">

            <div class="alert alert-success" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" height="50px" class="ml-2" viewBox="0 0 512 512">
                    <path
                        d="M256 48a208 208 0 1 1 0 416 208 208 0 1 1 0-416zm0 464A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-111 111-47-47c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l64 64c9.4 9.4 24.6 9.4 33.9 0L369 209z" />
                </svg>
                Sua lei foi cadastrada com sucesso!
            </div>
            <button class="btn btn-primary" onclick="closeModalEdit()"> Fechar</button>

        </div>
    </div>
    {{-- Fim modal --}}

    {{-- Modal de Deletar  --}}
    <div id="myModalDelete">
        <div class="modal-content p-3">

            <div class="d-flex justify-content-center p-3" role="alert">

                Tem certeza que deseja deletar esse item?
            </div>
            <div class="d-flex justify-content-center p-2">
                <div class="p-1">
                    <button class="btn btn-success  px-5" onclick="closeModalDelete()">Sim</button>
                </div>
                <div class="p-1">
                    <button class="btn btn-danger  px-5" onclick="closeModalDelete()">Não</button>
                </div>
            </div>
        </div>
    </div>
    {{-- Fim modal --}}

    {{-- Modal de Log  --}}
    <div id="myModalLog">
        <div class="modal-content p-3">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
    {{-- Fim modal --}}

    {{-- Modal de Show  --}}
    <div id="myModalShow">
        <div class="modal-content p-3 " id="ContentModalShow">

            
        </div>
    </div>
    {{-- Fim modal --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('assets/js/orcamentario.js') }}"></script>
@stop
