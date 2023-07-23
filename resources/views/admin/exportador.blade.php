@extends('layout')
@section('content')
    <form method="POST" action="{{route('Exportador.findFile')}}">
        @csrf
        <div class="border p-3 rounded  bg-white">
            <div class="form-group">
                <label for="exampleFormControlInput1">Ano</label>
                <input name="Ano" type="date" l" class="form-control" id="exampleFormControlInput1">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Módulo</label>
                <select name="Modulo" class="form-control" id="exampleFormControlSelect1">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>
            <div>
                <label class="" for="flexRadioDefault1">
                    Geração
                </label>
                <br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" value="Abertura" type="radio" name="Geracao" id="Geracao1">
                    <label class="form-check-label" for="Geracao1">
                        ABERTURA
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" value="Diario" type="radio" name="Geracao" id="Geracao2" checked>
                    <label class="form-check-label" for="Geracao2">
                        DIÁRIO
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" value="Fechamento" type="radio" name="Geracao" id="Geracao3">
                    <label class="form-check-label" for="Geracao1">
                        FECHAMENTO
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" value="Mensal" type="radio" name="Geracao" id="Geracao4">
                    <label class="form-check-label" for="Geracao2">
                        MENSAL
                    </label>
                </div>
            </div>
            <div class="mt-2 form-group">
                <label for="exampleFormControlSelect1">Mês</label>
                <select name="mes" class="form-control" id="exampleFormControlSelect1">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
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
                                <input name="Plano Contabil" class="form-check-input ml-1" type="checkbox" id="inlineCheckbox1" value="true">
                                Plano Contábil

                            </div>
                        </th>
                        <td>Gerado em xx/xx/xxxx</td>

                    </tr>
                    <tr>
                        <th>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="inlineCheckbox1">2- </label>
                                <input name="Movimento_Contabil" class="form-check-input ml-1" type="checkbox" id="inlineCheckbox1" value="true">
                                Movimento Contabil Mensal

                            </div>
                        </th>
                        <td>Gerado em xx/xx/xxxx</td>

                    </tr>
                    <tr>
                        <th>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="inlineCheckbox1">3- </label>
                                <input name="Diario Contabilidade" class="form-check-input ml-1" type="checkbox" id="inlineCheckbox1" value="true">
                                Diário Contabilidade
                            </div>
                        </th>
                        <td>Gerado em xx/xx/xxxx</td>

                    </tr>
                    <tr>
                        <th>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="inlineCheckbox1">4- </label>
                                <input name="Movimento Realizavel" class="form-check-input ml-1" type="checkbox" id="inlineCheckbox1" value="true">
                                Movimento Realizavel
                            </div>
                        </th>
                        <td>Gerado em xx/xx/xxxx</td>

                    </tr>
                </tbody>
            </table>
        </div>
        <div class="p-3">
            <button type="submit" class="btn btn-primary">Exportar</button>
            <button type="button" class="btn btn-primary">Limpar</button>
            <button type="button" class="btn btn-primary">Ordernar Geração de Arquivos</button>
        </div>
    </form>
@stop
