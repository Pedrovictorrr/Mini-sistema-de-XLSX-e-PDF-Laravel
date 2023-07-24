@extends('layout')

@section('styles')
    <link href="/assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h4>Fornecedor</h4>
        </div>
        <div class="col-sm-12 my-4">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Empenhos Emitidos</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-borderless" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Empenho</th>
                                    <th>Data de Emissão</th>
                                    <th>Contrato</th>
                                    <th>Valor</th>
                                    <th class="text-center">Ação</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Empenho</th>
                                    <th>Data de Emissão</th>
                                    <th>Contrato</th>
                                    <th>Valor</th>
                                    <th class="text-center">Ação</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <tr>
                                    <td>1234</td>
                                    <td>01/02/2023</td>
                                    <td>123/2023</td>
                                    <td>R$ 12345,67</td>
                                    <td class="text-center">
                                        <button class="btn btn-primary btn-sm btn-circle" onclick="navigate('/solicitacao-pagamentos')">
                                            <i class="fas fa-dollar-sign"></i>
                                        </button>
                                        <button class="btn btn-primary btn-sm btn-circle">
                                            <i class="fas fa-info"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1234</td>
                                    <td>01/02/2023</td>
                                    <td>123/2023</td>
                                    <td>R$ 12345,67</td>
                                    <td class="text-center">
                                        <button class="btn btn-primary btn-sm btn-circle" onclick="navigate('/solicitacao-pagamentos')">
                                            <i class="fas fa-dollar-sign"></i>
                                        </button>
                                        <button class="btn btn-primary btn-sm btn-circle">
                                            <i class="fas fa-info"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1234</td>
                                    <td>01/02/2023</td>
                                    <td>123/2023</td>
                                    <td>R$ 12345,67</td>
                                    <td class="text-center">
                                        <button class="btn btn-primary btn-sm btn-circle" onclick="navigate('/solicitacao-pagamentos')">
                                            <i class="fas fa-dollar-sign"></i>
                                        </button>
                                        <button class="btn btn-primary btn-sm btn-circle">
                                            <i class="fas fa-info"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1234</td>
                                    <td>01/02/2023</td>
                                    <td>123/2023</td>
                                    <td>R$ 12345,67</td>
                                    <td class="text-center">
                                        <button class="btn btn-primary btn-sm btn-circle" onclick="navigate('/solicitacao-pagamentos')">
                                            <i class="fas fa-dollar-sign"></i>
                                        </button>
                                        <button class="btn btn-primary btn-sm btn-circle">
                                            <i class="fas fa-info"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1234</td>
                                    <td>01/02/2023</td>
                                    <td>123/2023</td>
                                    <td>R$ 12345,67</td>
                                    <td class="text-center">
                                        <button class="btn btn-primary btn-sm btn-circle" onclick="navigate('/solicitacao-pagamentos')">
                                            <i class="fas fa-dollar-sign"></i>
                                        </button>
                                        <button class="btn btn-primary btn-sm btn-circle">
                                            <i class="fas fa-info"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="/assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });

        function navigate(route) {
            window.location.href = route;
        }
    </script>
@endsection