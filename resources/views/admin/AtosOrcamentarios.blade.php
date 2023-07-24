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
                    <input name="" type="text" class="form-control col-2" id="exampleFormControlInput1">
                </div>
                <div class="form-group row ">
                    <label for="exampleFormControlSelect1" class="mr-2 col-2 mt-2">Data do Ato</label>
                    <input name="" type="date" class="form-control col-2 mt-2" name="" id="">
                </div>
                <div class="form-group row ">
                    <label for="exampleFormControlSelect1" class="mr-2 col-2 mt-2">Data do Lançamento</label>
                    <input name="" type="date" class="form-control col-2 mt-2" name="" id="">
                </div>
                <div class="form-group row ">
                    <label for="exampleFormControlSelect1" class="mr-2 col-2 mt-2">Data da Publicação</label>
                    <input name="" type="date" class="form-control col-2 mt-2" name="" id="">
                </div>
                <div class="form-group row ">
                    <label for="exampleFormControlSelect1" class="mr-2 col-2 mt-2">Tipo de Ato</label>
                    <select name="" class="form-control col-2">
                        <option value="todos">--todos</option>
                        <option>Decreto</option>
                        <option>Resolução</option>
                        <option>Ato Gestor</option>
                    </select>

                </div>
                <div class="form-group row ">
                    <label for="exampleFormControlSelect1" class="mr-2 col-2 mt-2">Tipo de Crédito</label>
                    <select name="Tipo de Credito" class="form-control col-2">
                        <option value="todos">--todos</option>
                        <option>Especial</option>
                        <option>Suplementar</option>
                        <option>Extraordinário</option>
                    </select>

                </div>
                <div class="form-group row ">
                    <label for="exampleFormControlSelect1" class="mr-2 col-2 mt-2">Tipo de Recurso</label>
                    <select class="form-control col-1">
                        <option value="todos">--todos</option>
                        <option>Superávit</option>
                        <option>Excesso de arrecadação</option>
                        <option>Valor do Crédito</option>
                    </select>

                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
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
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                    <td>
                        <button class="btn btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" style="fill:white" viewBox="0 0 512 512">
                                <path
                                    d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z" />
                            </svg>
                        </button>
                        <button class="btn btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" style="fill:white" viewBox="0 0 448 512">
                                <path
                                    d="M64 80c-8.8 0-16 7.2-16 16V416c0 8.8 7.2 16 16 16H384c8.8 0 16-7.2 16-16V96c0-8.8-7.2-16-16-16H64zM0 96C0 60.7 28.7 32 64 32H384c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96zM152 232H296c13.3 0 24 10.7 24 24s-10.7 24-24 24H152c-13.3 0-24-10.7-24-24s10.7-24 24-24z" />
                            </svg>
                        </button>
                        <button class="btn btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" style="fill:white" viewBox="0 0 448 512">

                                <path
                                    d="M64 80c-8.8 0-16 7.2-16 16V416c0 8.8 7.2 16 16 16H384c8.8 0 16-7.2 16-16V96c0-8.8-7.2-16-16-16H64zM0 96C0 60.7 28.7 32 64 32H384c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96zM200 344V280H136c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H248v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z" />
                            </svg>
                        </button>
                        <button class="btn btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" style="fill:white" viewBox="0 0 512 512">
                                <path
                                    d="M128 0C92.7 0 64 28.7 64 64v96h64V64H354.7L384 93.3V160h64V93.3c0-17-6.7-33.3-18.7-45.3L400 18.7C388 6.7 371.7 0 354.7 0H128zM384 352v32 64H128V384 368 352H384zm64 32h32c17.7 0 32-14.3 32-32V256c0-35.3-28.7-64-64-64H64c-35.3 0-64 28.7-64 64v96c0 17.7 14.3 32 32 32H64v64c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V384zM432 248a24 24 0 1 1 0 48 24 24 0 1 1 0-48z" />
                            </svg>
                        </button>
                        <button class="btn btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" style="fill:white"
                                viewBox="0 0 512 512">
                                <!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                <path
                                    d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z" />
                            </svg>
                        </button>
                    </td>
                </tr>

            </tbody>
        </table>
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
                            <input required type="text" name="Numero" class="form-control " id="exampleFormControlInput1">
                        </div>
                        <div class="form-group col ">
                            <label for="exampleFormControlSelect1" class="">Data do Ato</label>
                            <input required type="date" name="Data do Ato" class="form-control" name="" id="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col ">
                            <label for="exampleFormControlSelect1" class="">Data do Lançamento</label>
                            <input required type="date" name="Data do lancamento" class="form-control" name="" id="">
                        </div>
                        <div class="form-group col">
                            <label for="exampleFormControlSelect1" class="">Data da Publicação</label>
                            <input required type="date" name="Data da Publicacao" class="form-control" name="" id="">
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
                        <input required type="number" name="Valor" id="exampleFormControlInput1" placeholder="00.00" class="form-control col-2" step="0.01">
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('assets/js/orcamentario.js') }}"></script>
@stop
