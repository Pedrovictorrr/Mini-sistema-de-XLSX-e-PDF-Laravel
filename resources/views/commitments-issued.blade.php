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
                            <tbody></tbody>
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
        function carregarEmpenhos() {
            const dataTable = $('#dataTable').DataTable({
                columnDefs: [{
                    targets: 4,
                    className: 'text-center',
                    orderable: false
                }],
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.5/i18n/pt-BR.json',
                }
            });

            $.ajax({
                url: '/api/empenhos',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    dataTable.clear().draw();
                    for (var i = 0; i < data.length; i++) {
                        const id = data[i].id;
                        const actions = `
                            <button class="btn btn-primary btn-sm btn-circle" onclick="paymentRequest(${id})">
                                <i class="fas fa-dollar-sign"></i>
                            </button>
                            <button class="btn btn-primary btn-sm btn-circle">
                                <i class="fas fa-info"></i>
                            </button>
                        `;

                        dataTable.row
                            .add([
                                `${id}/${data[i].data_emissao.slice(0, 4)}`,
                                formatDate(data[i].data_emissao),
                                `${data[i].contrato_id}/${data[i].data_emissao.slice(0, 4)}`,
                                formatMoney(data[i].valor),
                                actions
                            ])
                            .draw();
                    }
                }
            });
        }

        function formatDate(inputDate) {
            const dateParts = inputDate.split(' ')[0].split('-');
            const formattedDate = `${dateParts[2]}/${dateParts[1]}/${dateParts[0]}`;
            return formattedDate;
        }

        function formatMoney(number) {
            return parseFloat(number).toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
        }

        function paymentRequest(empenho_id) {
            window.location.href = `/empenho/${empenho_id}/pagamentos`;
        }

        $(document).ready(function() {
            carregarEmpenhos();
        });
    </script>
@endsection