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
                            <tfoot>
                                <tr>
                                    <th>Nº Solicitação</th>
                                    <th>Solicitante</th>
                                    <th>Data</th>
                                    <th>Empenho</th>
                                    <th>Contrato</th>
                                    <th width="100px">Valor</th>
                                    <th class="text-center" width="100px">Ação</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <tr>
                                    <td>4</td>
                                    <td>123456789 - RESPONSÁVEL TÉCNICO DO FORNECEDOR</td>
                                    <td>01/02/2023</td>
                                    <td>1314/2023</td>
                                    <td>126/2023</td>
                                    <td>R$ 1234,43</td>
                                    <td class="text-center" width="100px">
                                        <button class="btn btn-primary btn-sm btn-circle" data-toggle="modal" data-target="#anexosModal">
                                            <i class="fab fa-amilia"></i>
                                        </button>
                                        <button class="btn btn-primary btn-sm btn-circle" data-toggle="modal" data-target="#cancelamentoModal">
                                            <i class="fas fa-slash"></i>
                                        </button>
                                        <button class="btn btn-primary btn-sm btn-circle" onclick="navigate('/solicitacao-pagamentos/info')">
                                            <i class="fas fa-info"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>123456789 - RESPONSÁVEL TÉCNICO DO FORNECEDOR</td>
                                    <td>01/02/2023</td>
                                    <td>1314/2023</td>
                                    <td>126/2023</td>
                                    <td>R$ 1234,43</td>
                                    <td class="text-center" width="100px">
                                        <button class="btn btn-primary btn-sm btn-circle" data-toggle="modal" data-target="#anexosModal">
                                            <i class="fab fa-amilia"></i>
                                        </button>
                                        <button class="btn btn-primary btn-sm btn-circle" data-toggle="modal" data-target="#cancelamentoModal">
                                            <i class="fas fa-slash"></i>
                                        </button>
                                        <button class="btn btn-primary btn-sm btn-circle" onclick="navigate('/solicitacao-pagamentos/info')">
                                            <i class="fas fa-info"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>123456789 - RESPONSÁVEL TÉCNICO DO FORNECEDOR</td>
                                    <td>01/02/2023</td>
                                    <td>1314/2023</td>
                                    <td>126/2023</td>
                                    <td>R$ 1234,43</td>
                                    <td class="text-center" width="100px">
                                        <button class="btn btn-primary btn-sm btn-circle" data-toggle="modal" data-target="#anexosModal">
                                            <i class="fab fa-amilia"></i>
                                        </button>
                                        <button class="btn btn-primary btn-sm btn-circle" data-toggle="modal" data-target="#cancelamentoModal">
                                            <i class="fas fa-slash"></i>
                                        </button>
                                        <button class="btn btn-primary btn-sm btn-circle" onclick="navigate('/solicitacao-pagamentos/info')">
                                            <i class="fas fa-info"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>123456789 - RESPONSÁVEL TÉCNICO DO FORNECEDOR</td>
                                    <td>01/02/2023</td>
                                    <td>1314/2023</td>
                                    <td>126/2023</td>
                                    <td>R$ 1234,43</td>
                                    <td class="text-center" width="100px">
                                        <button class="btn btn-primary btn-sm btn-circle" data-toggle="modal" data-target="#anexosModal">
                                            <i class="fab fa-amilia"></i>
                                        </button>
                                        <button class="btn btn-primary btn-sm btn-circle" data-toggle="modal" data-target="#cancelamentoModal">
                                            <i class="fas fa-slash"></i>
                                        </button>
                                        <button class="btn btn-primary btn-sm btn-circle" onclick="navigate('/solicitacao-pagamentos/info')">
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

    <!-- Modal -->
    <div class="modal fade modal-scroll" id="solicitacaoPagamentoModal" tabindex="-1" role="dialog" aria-labelledby="solicitacaoPagamentoModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="exampleModalLongTitle">Solicitação de Pagamento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label for="valorPagamento">Valor da Solicitação de Pagamento</label>
                            <input type="text" class="form-control" id="valorPagamento">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <h5 class="my-3">Informações do Documento</h5>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="tipoDocumento">Tipo</label>
                            <select class="form-control" id="tipoDocumento">
                                <option value="fiscal">Fiscal</option>
                                <option value=recibo>Recibo</option>
                            </select>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="numeroDocumento">Número</label>
                            <input type="text" class="form-control" id="numeroDocumento">
                        </div>
                        <div class="col-sm-6 form-group serieDoc">
                            <label for="serieDocumento">Série</label>
                            <input type="text" class="form-control" id="serieDocumento">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="serieDocumento">Data de Emissão</label>
                            <input type="text" class="form-control" id="serieDocumento">
                        </div>
                        <div class="col-sm-12 form-group">
                            <label for="observacao">Observação (Opcional)</label>
                            <textarea class="form-control" rows="2" id="observacao"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <h5 class="my-3">Informações do Pagamento</h5>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="formaPagamento">Forma de pagamento</label>
                            <select class="form-control" id="formaPagamento">
                                <option value="1">Conta Bancária</option>
                                <option value="2">Documento/Fatura</option>
                            </select>
                        </div>
                        <div class="col-sm-6 form-group fpbanco">
                            <label for="agencia">Agência <small>(com digito verificador)</small></label>
                            <input type="text" class="form-control" id="agencia">
                        </div>
                        <div class="col-sm-6 form-group fpbanco">
                            <label for="conta">Conta <small>(com digito verificador)</small></label>
                            <input type="text" class="form-control" id="conta">
                        </div>
                        <div class="col-sm-6 form-group fpbanco">
                            <label for="banco">Nome do Banco</label>
                            <input type="text" class="form-control" id="banco" name="banco">
                        </div>
                        <div class="col-sm-6 form-group fpbanco">
                            <label for="operacao">Operação do Conta</label>
                            <input type="text" class="form-control" id="operacao" name="operacao">
                        </div>
                        <div class="col-sm-6 form-group fpbanco">
                            <label for="cidade">Cidade do Banco</label>
                            <input type="text" class="form-control" id="cidade" name="cidade">
                        </div>
                        <div class="col-sm-6 form-group fpfatura">
                            <label for="faturaDoc">Documento/Fatura</label>
                            <input type="file" class="form-control" id="faturaDoc" name="faturaDoc">
                        </div>
                        <div class="col-sm-12 form-group">
                            <label for="observacaoPagamento">Observação do pagamento (Opcional)</label>
                            <textarea class="form-control" rows="2" id="observacaoPagamento"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary">Enviar Solicitação</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-scroll" id="anexosModal" tabindex="-1" role="dialog" aria-labelledby="anexosModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="accordion anexosAccordion" id="accordionExample">
                        <div class="card border-0">
                            <div class="card-header p-0" id="headingFiscalDoc">
                                <button class="btn btn-link btn-block text-left anexos-acc" type="button" data-toggle="collapse" data-target="#collapseFiscalDoc" aria-expanded="true" aria-controls="collapseFiscalDoc">
                                    Documento Fiscal (NF, Recibo, Guias, Faturas, etc..)
                                </button>
                            </div>
                            <div id="collapseFiscalDoc" class="collapse" aria-labelledby="headingFiscalDoc" data-parent="#accordionExample">
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
                                <button class="btn btn-link btn-block anexos-acc collapsed" type="button" data-toggle="collapse" data-target="#collapseNegatDebitos" aria-expanded="false" aria-controls="collapseNegatDebitos">
                                    Certidão Negativa de Débitos
                                    <i class="fas fa-exclamation-triangle text-warning mr-2"></i>
                                </button>
                            </div>
                            <div id="collapseNegatDebitos" class="collapse" aria-labelledby="headingNegatDebitos" data-parent="#accordionExample">
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
                                <button class="btn btn-link btn-block anexos-acc collapsed" type="button" data-toggle="collapse" data-target="#collapseCertiTrabalhista" aria-expanded="false" aria-controls="collapseCertiTrabalhista">
                                    Certidão Trabalhista
                                    <i class="fas fa-exclamation-triangle text-warning mr-2"></i>
                                </button>
                            </div>
                            <div id="collapseCertiTrabalhista" class="collapse" aria-labelledby="headingCertiTrabalhista" data-parent="#accordionExample">
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
                                <button class="btn btn-link btn-block anexos-acc collapsed" type="button" data-toggle="collapse" data-target="#collapsePrevidenciaSocial" aria-expanded="false" aria-controls="collapsePrevidenciaSocial">
                                    Guia da Previdência Social
                                    <i class="fas fa-exclamation-triangle text-warning mr-2"></i>
                                </button>
                            </div>
                            <div id="collapsePrevidenciaSocial" class="collapse" aria-labelledby="headingPrevidenciaSocial" data-parent="#accordionExample">
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
                                <button class="btn btn-link btn-block anexos-acc collapsed" type="button" data-toggle="collapse" data-target="#collapseFGTS" aria-expanded="false" aria-controls="collapseFGTS">
                                    FGTS
                                    <i class="fas fa-exclamation-triangle text-warning mr-2"></i>
                                </button>
                            </div>
                            <div id="collapseFGTS" class="collapse" aria-labelledby="headingFGTS" data-parent="#accordionExample">
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

    <div class="modal fade modal-scroll" id="cancelamentoModal" tabindex="-1" role="dialog" aria-labelledby="cancelamentoModalTitle" aria-hidden="true">
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

    <script>
        $(document).ready(function() {
            $('.pbanco').hide();
            $('.fpfatura').hide();

            $('#tipoDocumento').on('change', function (event) {
                if (event.target.value == 'fiscal') {
                    $('.serieDoc').show();
                } else {
                    $('.serieDoc').hide();
                }
            });

            $('#formaPagamento').on('change', function (event) {
                if (event.target.value == '1') {
                    $('.fpbanco').show();
                    $('.fpfatura').hide();
                } else {
                    $('.fpbanco').hide();
                    $('.fpfatura').show();
                }
            });

            $('.anexos-acc').on('click', function (event) {
                $('.anexos-acc').css('backgroundColor', 'rgba(0,0,0,.03)');
                $('.anexos-acc').css('color', 'var(--primary)');
                event.target.style.backgroundColor = 'var(--primary)';
                event.target.style.color = 'white';
            });
            $('.anexos-acc')[0].click();
        });

        function navigate(route) {
            window.location.href = route;
        }
    </script>
@endsection