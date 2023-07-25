@extends('layout')

@section('styles')
    <link href="/assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#solicitacaoPagamentoModal">
                <i class="fas fa-plus"></i> Solicitar
            </button>
        </div>
        <div class="col-sm-12 my-4">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Solicitações de Pagamento</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-borderless" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nº Solicitação</th>
                                    <th>Solicitante</th>
                                    <th>Data</th>
                                    <th>Empenho</th>
                                    <th>Contrato</th>
                                    <th width="100px">Valor</th>
                                    <th class="text-center" width="100px">Ação</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade modal-scroll" id="solicitacaoPagamentoModal" tabindex="-1" role="dialog"
        aria-labelledby="solicitacaoPagamentoModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="exampleModalLongTitle">Solicitação de Pagamento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="pagamentoForm">
                        <input type="hidden" name="empenho_id" value="{{ request('empenho_id') }}">
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <label for="valorPagamento">Valor da Solicitação de Pagamento</label>
                                <input type="text" class="form-control money" id="valorPagamento" name="valor"
                                    required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <h5 class="my-3">Informações do Documento</h5>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label for="tipoDocumento">Tipo</label>
                                <select class="form-control" id="tipoDocumento" name="tipo_documento" required>
                                    <option value="fiscal">Fiscal</option>
                                    <option value=recibo>Recibo</option>
                                </select>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label for="numeroDocumento">Número</label>
                                <input type="text" class="form-control number" id="numeroDocumento"
                                    name="numero_documento" required>
                            </div>
                            <div class="col-sm-6 form-group serieDoc">
                                <label for="serieDocumento">Série</label>
                                <input type="text" class="form-control" id="serieDocumento" name="serie_documento">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label for="emissaoDocumento">Data de Emissão</label>
                                <input type="date" class="form-control" id="emissaoDocumento" name="emissao_documento"
                                    required>
                            </div>
                            <div class="col-sm-12 form-group">
                                <label for="observacao">Observação (Opcional)</label>
                                <textarea class="form-control" rows="2" id="observacao" name="observacao_documento"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <h5 class="my-3">Informações do Pagamento</h5>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label for="formaPagamento">Forma de pagamento</label>
                                <select class="form-control" id="formaPagamento" name="forma_pagamento" required>
                                    <option value="conta_bancaria">Conta Bancária</option>
                                    <option value="documento_fatura">Documento/Fatura</option>
                                </select>
                            </div>
                            <div class="col-sm-6 form-group fpbanco">
                                <label for="agencia">Agência <small>(com digito verificador)</small></label>
                                <input type="text" class="form-control" id="agencia" name="agencia">
                            </div>
                            <div class="col-sm-6 form-group fpbanco">
                                <label for="conta">Conta <small>(com digito verificador)</small></label>
                                <input type="text" class="form-control" id="conta" name="conta">
                            </div>
                            <div class="col-sm-6 form-group fpbanco">
                                <label for="banco">Nome do Banco</label>
                                <input type="text" class="form-control" id="banco" name="nome_banco">
                            </div>
                            <div class="col-sm-6 form-group fpbanco">
                                <label for="operacao">Operação da Conta</label>
                                <input type="text" class="form-control number" id="operacao" name="op_conta">
                            </div>
                            <div class="col-sm-6 form-group fpbanco">
                                <label for="cidade">Cidade do Banco</label>
                                <input type="text" class="form-control" id="cidade" name="cidade_banco">
                            </div>
                            <div class="col-sm-6 form-group fpfatura">
                                <label for="faturaDoc">Documento/Fatura</label>
                                <input type="file" class="form-control" id="faturaDoc">
                            </div>
                            <div class="col-sm-12 form-group">
                                <label for="observacaoPagamento">Observação do pagamento (Opcional)</label>
                                <textarea class="form-control" rows="2" id="observacaoPagamento" name="observacao_pagamento"></textarea>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button form="pagamentoForm" class="btn btn-primary">Enviar Solicitação</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-scroll" id="anexosModal" tabindex="-1" role="dialog"
        aria-labelledby="anexosModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="accordion anexosAccordion" id="accordionExample">
                        <div class="card border-0">
                            <div class="card-header p-0" id="headingFiscalDoc">
                                <button class="btn btn-link btn-block text-left anexos-acc" type="button"
                                    data-toggle="collapse" data-target="#collapseFiscalDoc" aria-expanded="true"
                                    aria-controls="collapseFiscalDoc">
                                    Documento Fiscal (NF, Recibo, Guias, Faturas, etc..)
                                </button>
                            </div>
                            <div id="collapseFiscalDoc" class="collapse" aria-labelledby="headingFiscalDoc"
                                data-parent="#accordionExample">
                                <div class="row p-4">
                                    <div class="col-sm-12">
                                        <button class="btn btn-outline-secondary">Procurar Arquivo</button>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="card border-secondary mt-3">
                                            <div class="card-body d-flex justify-content-between align-items-center">
                                                <div class="text-secondary">NF.pdf (Cadastrado)</div>
                                                <div>
                                                    <button class="btn btn-link text-secondary">
                                                        <i class="fas fa-file"></i>
                                                    </button>
                                                    <button class="btn btn-link text-secondary">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card border-0">
                            <div class="card-header p-0" id="headingNegatDebitos">
                                <button class="btn btn-link btn-block anexos-acc collapsed" type="button"
                                    data-toggle="collapse" data-target="#collapseNegatDebitos" aria-expanded="false"
                                    aria-controls="collapseNegatDebitos">
                                    Certidão Negativa de Débitos
                                    <i class="fas fa-exclamation-triangle text-warning mr-2"></i>
                                </button>
                            </div>
                            <div id="collapseNegatDebitos" class="collapse" aria-labelledby="headingNegatDebitos"
                                data-parent="#accordionExample">
                                <div class="row p-4">
                                    <div class="col-sm-12">
                                        <button class="btn btn-outline-secondary">Procurar Arquivo</button>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="card border-secondary mt-3">
                                            <div class="card-body d-flex justify-content-between align-items-center">
                                                <div class="text-secondary">NF.pdf (Cadastrado)</div>
                                                <div>
                                                    <button class="btn btn-link text-secondary">
                                                        <i class="fas fa-file"></i>
                                                    </button>
                                                    <button class="btn btn-link text-secondary">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card border-0">
                            <div class="card-header p-0" id="headingCertiTrabalhista">
                                <button class="btn btn-link btn-block anexos-acc collapsed" type="button"
                                    data-toggle="collapse" data-target="#collapseCertiTrabalhista" aria-expanded="false"
                                    aria-controls="collapseCertiTrabalhista">
                                    Certidão Trabalhista
                                    <i class="fas fa-exclamation-triangle text-warning mr-2"></i>
                                </button>
                            </div>
                            <div id="collapseCertiTrabalhista" class="collapse" aria-labelledby="headingCertiTrabalhista"
                                data-parent="#accordionExample">
                                <div class="row p-4">
                                    <div class="col-sm-12">
                                        <button class="btn btn-outline-secondary">Procurar Arquivo</button>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="card border-secondary mt-3">
                                            <div class="card-body d-flex justify-content-between align-items-center">
                                                <div class="text-secondary">NF.pdf (Cadastrado)</div>
                                                <div>
                                                    <button class="btn btn-link text-secondary">
                                                        <i class="fas fa-file"></i>
                                                    </button>
                                                    <button class="btn btn-link text-secondary">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card border-0">
                            <div class="card-header p-0" id="headingPrevidenciaSocial">
                                <button class="btn btn-link btn-block anexos-acc collapsed" type="button"
                                    data-toggle="collapse" data-target="#collapsePrevidenciaSocial" aria-expanded="false"
                                    aria-controls="collapsePrevidenciaSocial">
                                    Guia da Previdência Social
                                    <i class="fas fa-exclamation-triangle text-warning mr-2"></i>
                                </button>
                            </div>
                            <div id="collapsePrevidenciaSocial" class="collapse"
                                aria-labelledby="headingPrevidenciaSocial" data-parent="#accordionExample">
                                <div class="row p-4">
                                    <div class="col-sm-12">
                                        <button class="btn btn-outline-secondary">Procurar Arquivo</button>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="card border-secondary mt-3">
                                            <div class="card-body d-flex justify-content-between align-items-center">
                                                <div class="text-secondary">NF.pdf (Cadastrado)</div>
                                                <div>
                                                    <button class="btn btn-link text-secondary">
                                                        <i class="fas fa-file"></i>
                                                    </button>
                                                    <button class="btn btn-link text-secondary">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card border-0">
                            <div class="card-header p-0" id="headingFGTS">
                                <button class="btn btn-link btn-block anexos-acc collapsed" type="button"
                                    data-toggle="collapse" data-target="#collapseFGTS" aria-expanded="false"
                                    aria-controls="collapseFGTS">
                                    FGTS
                                    <i class="fas fa-exclamation-triangle text-warning mr-2"></i>
                                </button>
                            </div>
                            <div id="collapseFGTS" class="collapse" aria-labelledby="headingFGTS"
                                data-parent="#accordionExample">
                                <div class="row p-4">
                                    <div class="col-sm-12">
                                        <button class="btn btn-outline-secondary">Procurar Arquivo</button>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="card border-secondary mt-3">
                                            <div class="card-body d-flex justify-content-between align-items-center">
                                                <div class="text-secondary">NF.pdf (Cadastrado)</div>
                                                <div>
                                                    <button class="btn btn-link text-secondary">
                                                        <i class="fas fa-file"></i>
                                                    </button>
                                                    <button class="btn btn-link text-secondary">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-scroll" id="cancelamentoModal" tabindex="-1" role="dialog"
        aria-labelledby="cancelamentoModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="exampleModalLongTitle">Cancelar Solicitação de Pagamento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <label for="dataCancelamento">Data de Cancelamento</label>
                            <input type="date" class="form-control" id="dataCancelamento">
                        </div>
                        <div class="col-sm-12 form-group">
                            <label for="motivoCancelamento">Motivo</label>
                            <textarea class="form-control" rows="4" id="motivoCancelamento"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="/assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/0.9.0/jquery.mask.min.js"
        integrity="sha512-oJCa6FS2+zO3EitUSj+xeiEN9UTr+AjqlBZO58OPadb2RfqwxHpjTU8ckIC8F4nKvom7iru2s8Jwdo+Z8zm0Vg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        var dataTable;

        $(document).ready(function() {
            // inicializacao
            const currentURL = new URL(window.location.href);
            const queryParams = new URLSearchParams(currentURL.search);
            const empenho_id = {{ request('empenho_id') }};
            carregarPagamentos(empenho_id);

            // eventos
            $('#pagamentoForm').on('submit', function(event) {
                event.preventDefault();
                showLoading('Enviando solicitação de pagamento');
                const data = new FormData();

                $("#pagamentoForm")
                    .serializeArray()
                    .forEach(item => {
                        let value = item.value;
                        if (item.name == 'valor') {
                            value = value.replace('.', '')
                                .replace(',', '.');
                        }
                        data.append(item.name, value);
                    });

                const fileInput = document.getElementById('faturaDoc');
                const documento = fileInput.files[0];

                if (documento) {
                    data.append('documento', documento);
                }

                $.ajax({
                    url: '/api/empenho/pagamentos',
                    method: 'POST',
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function() {
                        hideLoading();
                        window.location.reload();
                    },
                    error: function(xhr, status, error) {
                        hideLoading();
                        console.error("Erro na requisição:", error);
                    }
                });
            });

            $('#tipoDocumento').on('change', function(event) {
                if (event.target.value == 'fiscal') {
                    $('.serieDoc').show();
                } else {
                    $('.serieDoc').hide();
                }
            });

            $('#formaPagamento').on('change', function(event) {
                if (event.target.value == 'conta_bancaria') {
                    $('.fpbanco').show();
                    $('.fpfatura').hide();
                } else {
                    $('.fpbanco').hide();
                    $('.fpfatura').show();
                }
            });

            $('.anexos-acc').on('click', function(event) {
                $('.anexos-acc').css('backgroundColor', 'rgba(0,0,0,.03)');
                $('.anexos-acc').css('color', 'var(--primary)');
                event.target.style.backgroundColor = 'var(--primary)';
                event.target.style.color = 'white';
            });

            $('.anexos-acc')[0].click();
            $('.pbanco').hide();
            $('.fpfatura').hide();
            $('.money').mask('000.000.000.000.000,00', {
                reverse: true
            });
        });

        function carregarPagamentos(empenho_id) {
            dataTable = $('#dataTable').DataTable({
                columnDefs: [{
                    targets: 5,
                    width: '100px',
                }, {
                    targets: 6,
                    className: 'text-center',
                    orderable: false
                }],
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.5/i18n/pt-BR.json',
                }
            });

            $.ajax({
                url: `/api/empenho/${empenho_id}/pagamentos`,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    dataTable.clear().draw();
                    for (var i = 0; i < data.length; i++) {
                        addTabelaPagamento(
                            data[i].id,
                            data[i].empenho.user.id,
                            data[i].empenho.user.name,
                            data[i].emissao_documento,
                            data[i].empenho.id,
                            data[i].empenho.contrato_id,
                            data[i].valor,
                        );
                    }
                }
            });
        }

        function addTabelaPagamento(
            id,
            solicitante_id,
            solicitante_nome,
            data,
            empenho_id,
            contrato_id,
            valor
        ) {
            const actions = `
                <button class="btn btn-primary btn-sm btn-circle" data-toggle="modal" data-target="#anexosModal">
                    <i class="fab fa-amilia"></i>
                </button>
                <button class="btn btn-primary btn-sm btn-circle" data-toggle="modal" data-target="#cancelamentoModal">
                    <i class="fas fa-slash"></i>
                </button>
                <button class="btn btn-primary btn-sm btn-circle" onclick="navigate('/solicitacao-pagamentos/info')">
                    <i class="fas fa-info"></i>
                </button>
            `;

            dataTable.row
                .add([
                    `${id}/${data.slice(0, 4)}`,
                    `${solicitante_id} - ${solicitante_nome}`,
                    formatDate(data),
                    empenho_id,
                    contrato_id,
                    formatMoney(valor),
                    actions
                ])
                .draw();
        }

        function formatDate(inputDate) {
            const dateParts = inputDate.split(' ')[0].split('-');
            const formattedDate = `${dateParts[2]}/${dateParts[1]}/${dateParts[0]}`;
            return formattedDate;
        }

        function formatMoney(number) {
            return parseFloat(number).toLocaleString('pt-BR', {
                style: 'currency',
                currency: 'BRL'
            });
        }

        function showLoading(text) {
            Swal.fire({
                title: 'Carregando...',
                text: text,
                didOpen: () => {
                    Swal.showLoading()
                }
            });
        }

        function hideLoading() {
            Swal.close();
        }

        function toast(icon, title) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });

            Toast.fire({
                icon,
                title
            });
        }

        function navigate(route) {
            window.location.href = route;
        }
    </script>
@endsection
