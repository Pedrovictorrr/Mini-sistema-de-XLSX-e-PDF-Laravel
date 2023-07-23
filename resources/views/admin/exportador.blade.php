@extends('layout')
@section('content')
    <form>
        <div class="border p-3 rounded  bg-white">
            <div class="form-group">
                <label for="exampleFormControlInput1">Ano</label>
                <input type="date" l" class="form-control" id="exampleFormControlInput1">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Módulo</label>
                <select class="form-control" id="exampleFormControlSelect1">
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
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                        ABERTURA
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                    <label class="form-check-label" for="flexRadioDefault2">
                        DIÁRIO
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3">
                    <label class="form-check-label" for="flexRadioDefault1">
                        FECHAMENTO
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault4">
                    <label class="form-check-label" for="flexRadioDefault2">
                        MENSAL
                    </label>
                </div>
            </div>
            <div class="mt-2 form-group">
                <label for="exampleFormControlSelect1">Mês</label>
                <select class="form-control" id="exampleFormControlSelect1">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
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
                                <input class="form-check-input ml-1" type="checkbox" id="inlineCheckbox1" value="option1">
                                Plano Contábil

                            </div>
                        </th>
                        <td>Gerado em xx/xx/xxxx</td>

                    </tr>
                    <tr>
                        <th>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="inlineCheckbox1">2- </label>
                                <input class="form-check-input ml-1" type="checkbox" id="inlineCheckbox1" value="option1">
                                Movimento Contabil Mensal

                            </div>
                        </th>
                        <td>Gerado em xx/xx/xxxx</td>

                    </tr>
                    <tr>
                        <th>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="inlineCheckbox1">3- </label>
                                <input class="form-check-input ml-1" type="checkbox" id="inlineCheckbox1" value="option1">
                                Diário Contabilidade
                            </div>
                        </th>
                        <td>Gerado em xx/xx/xxxx</td>

                    </tr>
                    <tr>
                        <th>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="inlineCheckbox1">4- </label>
                                <input class="form-check-input ml-1" type="checkbox" id="inlineCheckbox1" value="option1">
                                Movimento Realizavel
                            </div>
                        </th>
                        <td>Gerado em xx/xx/xxxx</td>

                    </tr>
                </tbody>
            </table>
        </div>
        <div class="p-3">
            <button type="button" class="btn btn-primary">Exportar</button>
            <button type="button" class="btn btn-primary">Limpar</button>
            <button type="button" class="btn btn-primary">Ordernar Geração de Arquivos</button>
        </div>
    </form>
@stop
