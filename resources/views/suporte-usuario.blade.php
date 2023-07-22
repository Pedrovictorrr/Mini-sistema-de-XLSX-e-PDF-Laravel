@extends('layout')

@section('content')
    <div class="container">
        <h2>SUPORTE AO USUARIO</h2>
        <a class="btn btn-primary" href="{{ route('criar-ticket') }}">+ NOVO</a>

        <div class="mb-3 d-flex align-items-center col-12">
            <label for="search" class="form-label col-2">ID:</label>
            <input type="text" class="form-control ml-2 col-9" id="search" name="search">
        </div>
        <div class="mb-3 d-flex align-items-center col-12">
            <label for="search" class="form-label col-2">Data:</label>
            <input type="date" class="form-control ml-2 form-date" id="search" name="search">
            <label for="search" class="form-label ml-2">Até:</label>
            <input type="date" class="form-control ml-2 form-date" id="search" name="search">
        </div>
        <div class="mb-3 d-flex align-items-center col-12">
            <label for="search" class="form-label col-2">Data da Resposta:</label>
            <input type="date" class="form-control ml-2 form-date" id="search" name="search">
            <label for="search" class="form-label ml-2">Até:</label>
            <input type="date" class="form-control ml-2 form-date" id="search" name="search">
        </div>
        <div class="mb-3 d-flex align-items-center col-12">
            <label class="form-label col-2" for="modulo">Modulo:</label>
            <select class="form-control ml-2 form-select" id="modulo" name="modulo">
                <option value=""></option>
                <option value="Contabilidade">Contabilidade</option>
                <option value="Compras">Compras</option>
                <option value="Planejamento">Planejamento</option>
                <option value="Fornecedor">Fornecedor</option>
            </select><br><br>
        </div>
        <div class="mb-3 d-flex align-items-center  col-12">
            <label class="form-label col-2" for="responsavel">Responsável:</label>
            <select class="form-control ml-2 form-select" id="responsavel" name="responsavel">
                <option value=""></option>
                <option value="ana">Ana</option>
                <option value="joao">João</option>
                <option value="maria">Maria</option>
            </select>
        </div>
        <div class="mb-3 d-flex align-items-center col-12">
            <label for="search" class="form-label col-2">Assunto:</label>
            <input type="text" class="form-control ml-2" id="search" name="search">
        </div>

        <div class="mb-3 d-flex align-items-center">
            <input type="radio" id="search" name="search">
            <label for="search" class="form-check-label ml-2">Aberto</label>
        </div>

        <div class="mb-3 d-flex align-items-center">
            <input type="radio" id="search" name="search">
            <label for="search" class="form-check-label ml-2">Concluido</label>
        </div>

        <button type="submit" class="btn btn-success">Pesquisar</button>
        <button type="reset" id="resetBtn" class="btn btn-danger">Limpar</button>

        <div class="card shadow mb-4 mt-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Data</th>
                                <th>Módulo</th>
                                <th>Usuário</th>
                                <th>Assunto</th>
                                <th>Situação</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>01/01/2023</td>
                                <td>CONVALIDAÇÃO</td>
                                <td>Antônio da Silva</td>
                                <td>Editar</td>
                                <td>Concluído</td>
                                <td class="actions">
                                    <button type="button" class="btn btn-primary btn-sm">
                                        <i class="fas fa-comment"></i>
                                    </button>
                                    <button type="button" class="btn btn-warning btn-sm">
                                        <i class="fas fa-exclamation"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>02/01/2023</td>
                                <td>COMPRA</td>
                                <td>Davi de Oliveira</td>
                                <td>Criar</td>
                                <td>Pendente</td>
                                <td class="actions">
                                    <button type="button" class="btn btn-primary btn-sm">
                                        <i class="fas fa-comment"></i>
                                    </button>
                                    <button type="button" class="btn btn-warning btn-sm">
                                        <i class="fas fa-exclamation"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>03/01/2023</td>
                                <td>PLANEJAMENTO</td>
                                <td>Davi de Oliveira</td>
                                <td>Excluir</td>
                                <td>Concluído</td>
                                <td class="actions">
                                    <button type="button" class="btn btn-primary btn-sm">
                                        <i class="fas fa-comment"></i>
                                    </button>
                                    <button type="button" class="btn btn-warning btn-sm">
                                        <i class="fas fa-exclamation"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {

        });
    </script>

    <style>
        .form-date {
            width: 150px;
        }

        .form-select {
            width: 140px;
        }

        .col-2 {
            flex: 0 0 14.66667%;
            padding: 0 !important;
            text-align: end;
        }

        .col-12 {
            padding: 0 !important;
            text-align: end;
        }

        .actions {
            text-align: center;
        }

        .btn-warning {
            width: 30px
        }
    </style>
@endsection
