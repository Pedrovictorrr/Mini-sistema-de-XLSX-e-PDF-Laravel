@extends('layout')
@section('content')
<link rel="stylesheet" href="{{asset('assets/css/exportador.css')}}">


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
            {{-- <div class="form-check form-check-inline">
                <input name="somente ativos" class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Somente Ativos
                </label>
            </div> --}}
        </div>
        <div class="border rounded bg-white">
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
                                    id="Checkbox1" value="true">
                                Plano Contábil

                            </div>
                        </th>
                        <td>Gerado em {{ date('d/m/Y', strtotime($PlanoContabil))}}</td>

                    </tr>
                    <tr>
                        <th>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="inlineCheckbox1">2- </label>
                                <input name="Movimento_Contabil" class="form-check-input ml-1" type="checkbox"
                                    id="Checkbox2" value="true">
                                Movimento Contabil Mensal

                            </div>
                        </th>
                        <td>Gerado em {{ date('d/m/Y', strtotime($MovimentoContabilMensal))}}</td>

                    </tr>
                    <tr>
                        <th>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="inlineCheckbox1">3- </label>
                                <input name="Diario Contabilidade" class="form-check-input ml-1" type="checkbox"
                                    id="Checkbox3" value="true">
                                Diário Contabilidade
                            </div>
                        </th>
                        <td>Gerado em {{ date('d/m/Y', strtotime($DiarioContabilidade))}}</td>

                    </tr>
                    <tr>
                        <th>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="inlineCheckbox1">4- </label>
                                <input name="Movimento Realizavel" class="form-check-input ml-1" type="checkbox"
                                    id="Checkbox4" value="true">
                                Movimento Realizavel
                            </div>
                        </th>
                        <td>Gerado em {{ date('d/m/Y', strtotime($MovimentoRealizavel))}}</td>

                    </tr>
                </tbody>
            </table>
        </div>
        <div class="p-3">
            <button type="button" onclick="openModal()" title="Selecione pelo menos um checkbox" disabled id="enviarFormulario" class="btn btn-primary">Exportar</button>
            <button type="button" id="limparFormulario" class="btn btn-primary">Limpar</button>
            <button type="button" disabled class="btn btn-primary">Ordernar Geração de Arquivos</button>
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
                Arquivo ZIP gerado com sucesso!
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
                <tbody id="tabela-corpo">
                    <!-- Aqui serão adicionadas as linhas dinamicamente -->
                </tbody>
            </table>
        </div>
    </div>
    <div id="resultado"></div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{asset('assets/js/exportador.js')}}"></script>
    
@stop
