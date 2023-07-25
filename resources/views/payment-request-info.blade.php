@extends('layout')

@section('styles')
    <link href="/assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12 my-4">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Informações - Solicitação de Pagamento</h6>
                </div>
                <div class="card-body">
                    <div class="card mt-3 mb-5">
                        <span class="sp-info-title">Andamento</span>
                        <div class="card-body d-flex justify-content-between flex-wrap">
                            <div class="sp-info-andamento">
                                <div class="sp-info-circle bg-success"></div>
                                <div class="sp-info-label">Solicitação de Pagamento</div>
                            </div>
                            <div class="sp-info-andamento">
                                <div class="sp-info-circle bg-warning"></div>
                                <div class="sp-info-label">Anexos</div>
                            </div>
                            <div class="sp-info-andamento">
                                <div class="sp-info-circle"></div>
                                <div class="sp-info-label">Fiscal</div>
                            </div>
                            <div class="sp-info-andamento">
                                <div class="sp-info-circle"></div>
                                <div class="sp-info-label">Gestor</div>
                            </div>
                            <div class="sp-info-andamento">
                                <div class="sp-info-circle"></div>
                                <div class="sp-info-label">Liquidação</div>
                            </div>
                            <div class="sp-info-andamento">
                                <div class="sp-info-circle"></div>
                                <div class="sp-info-label">Secretário(a)</div>
                            </div>
                            <div class="sp-info-andamento">
                                <div class="sp-info-circle"></div>
                                <div class="sp-info-label">ISS</div>
                            </div>
                            <div class="sp-info-andamento">
                                <div class="sp-info-circle"></div>
                                <div class="sp-info-label">Ordem de Pagamento</div>
                            </div>
                            <div class="sp-info-andamento">
                                <div class="sp-info-circle"></div>
                                <div class="sp-info-label">Autorização</div>
                            </div>
                            <div class="sp-info-andamento">
                                <div class="sp-info-circle"></div>
                                <div class="sp-info-label">Borderô</div>
                            </div>
                            <div class="sp-info-andamento">
                                <div class="sp-info-circle"></div>
                                <div class="sp-info-label">Remessa</div>
                            </div>
                            <div class="sp-info-andamento">
                                <div class="sp-info-circle"></div>
                                <div class="sp-info-label">Pagamento</div>
                            </div>
                            <div class="sp-info-andamento">
                                <div class="sp-info-circle"></div>
                                <div class="sp-info-label">Pagamento Realizado</div>
                            </div>
                        </div>
                    </div>

                    <ul class="nav nav-tabs sp-inf-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <button class="nav-link active" id="geral-tab" data-toggle="tab" data-target="#geral" type="button" role="tab" aria-controls="geral" aria-selected="true">Geral</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="tsp-tab" data-toggle="tab" data-target="#tsp" type="button" role="tab" aria-controls="tsp" aria-selected="false">Trâmites da Solicitação de Pagamento</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="anexos-tab" data-toggle="tab" data-target="#anexos" type="button" role="tab" aria-controls="anexos" aria-selected="false">Anexos Pagamento</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="gestor-tab" data-toggle="tab" data-target="#gestor" type="button" role="tab" aria-controls="gestor" aria-selected="false">Gestor</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="comissaoliq-tab" data-toggle="tab" data-target="#comissaoliq" type="button" role="tab" aria-controls="comissaoliq" aria-selected="false">Comissão de Liquidação</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="processo-tab" data-toggle="tab" data-target="#processo" type="button" role="tab" aria-controls="processo" aria-selected="false">Processo</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="ordempag-tab" data-toggle="tab" data-target="#ordempag" type="button" role="tab" aria-controls="ordempag" aria-selected="false">Ordem de Pagamento</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="iss-tab" data-toggle="tab" data-target="#iss" type="button" role="tab" aria-controls="iss" aria-selected="false">ISS</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="formapag-tab" data-toggle="tab" data-target="#formapag" type="button" role="tab" aria-controls="formapag" aria-selected="false">Forma de Pagamento</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade p-3 show active" id="geral" role="tabpanel" aria-labelledby="geral-tab">
                            <div class="table-responsive">
                                <table class="table table-striped table-borderless border" id="dataTable" width="100%" cellspacing="0">
                                    <tbody>
                                        <tr>
                                            <th class="bg-secondary text-white py-2" colspan="2">Dados Gerais</th>
                                        </tr>
                                        <tr>
                                            <td>Nº Solicitação de Pagamento</td>
                                            <td>4</td>
                                        </tr>
                                        <tr>
                                            <td>Data de Cadastro</td>
                                            <td>16/01/2023</td>
                                        </tr>
                                        <tr>
                                            <td>Valor Solicitação</td>
                                            <td>1234.43</td>
                                        </tr>
                                        <tr>
                                            <td>Solicitante</td>
                                            <td>123456789 - RESPONSAVEL TÉCNICO DO FORNECEDOR</td>
                                        </tr>
                                        <tr>
                                            <td>Empenho</td>
                                            <td>1234/2023</td>
                                        </tr>
                                        <tr>
                                            <td>Fornecedor</td>
                                            <td>123456789 - FORNECEDOR</td>
                                        </tr>
                                        <tr>
                                            <td>Contrato</td>
                                            <td>1234/2023</td>
                                        </tr>
                                        <tr>
                                            <td>Tipo de Documento</td>
                                            <td>NOTA FISCAL</td>
                                        </tr>
                                        <tr>
                                            <td>Nº Doc Fiscal</td>
                                            <td>1234</td>
                                        </tr>
                                        <tr>
                                            <td>Série Doc Fiscal</td>
                                            <td>A1</td>
                                        </tr>
                                        <tr>
                                            <td>Data Emissão Doc Fiscal</td>
                                            <td>16/01/2023</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade p-3" id="tsp" role="tabpanel" aria-labelledby="tsp-tab">
                            <div class="table-responsive">
                                <table class="table table-striped table-borderless border" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class="bg-secondary text-white py-2">Data</th>
                                            <th class="bg-secondary text-white py-2">Origem</th>
                                            <th class="bg-secondary text-white py-2">Destino</th>
                                            <th class="bg-secondary text-white py-2">Motivo</th>
                                            <th class="bg-secondary text-white py-2">Usuário</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>16/01/2023 12:00:30</td>
                                            <td>Anexar Documentos</td>
                                            <td></td>
                                            <td>Aguardando Anexar os Documentos</td>
                                            <td>RESPONSÁVEL TÉCNICO</td>
                                        </tr>
                                        <tr>
                                            <td>16/01/2023 12:00:30</td>
                                            <td>Anexar Documentos</td>
                                            <td></td>
                                            <td>Aguardando Anexar os Documentos</td>
                                            <td>RESPONSÁVEL TÉCNICO</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade p-3" id="anexos" role="tabpanel" aria-labelledby="anexos-tab">
                            <div class="accordion anexosAccordion" id="accordionExample">
                                <div class="card border-0">
                                    <div class="card-header p-0" id="headingFiscalDoc">
                                        <button class="btn btn-link btn-block text-left anexos-acc" type="button" data-toggle="collapse" data-target="#collapseFiscalDoc" aria-expanded="true" aria-controls="collapseFiscalDoc">
                                            Documento Fiscal (NF, Recibo, Guias, Faturas, etc..)
                                        </button>
                                    </div>
                                    <div id="collapseFiscalDoc" class="collapse p-3 border" aria-labelledby="headingFiscalDoc" data-parent="#accordionExample">
                                        <table class="table table-striped table-borderless table-sm border m-0">
                                            <thead>
                                                <tr>
                                                    <th>Cadastro</th>
                                                    <th>Arquivo</th>
                                                    <th>Situação</th>
                                                    <th>Usuário</th>
                                                    <th>Anexo</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>16/01/2023 12:00:30</td>
                                                    <td>NF.pdf</td>
                                                    <td>Anexo Cadastrado</td>
                                                    <td>RESPONSÁVEL TÉCNICO</td>
                                                    <td>
                                                        <button class="btn btn-light btn-sm btn-circle text-secondary">
                                                            <i class="fas fa-file"></i>
                                                        </button>
                                                        <button class="btn btn-light btn-sm btn-circle text-secondary">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card border-0">
                                    <div class="card-header p-0" id="headingNegatDebitos">
                                        <button class="btn btn-link btn-block anexos-acc collapsed" type="button" data-toggle="collapse" data-target="#collapseNegatDebitos" aria-expanded="false" aria-controls="collapseNegatDebitos">
                                            Certidão Negativa de Débitos
                                        </button>
                                    </div>
                                    <div id="collapseNegatDebitos" class="collapse p-3 border" aria-labelledby="headingNegatDebitos" data-parent="#accordionExample">
                                        <table class="table table-striped table-borderless table-sm border m-0">
                                            <thead>
                                                <tr>
                                                    <th>Cadastro</th>
                                                    <th>Arquivo</th>
                                                    <th>Situação</th>
                                                    <th>Usuário</th>
                                                    <th>Anexo</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>16/01/2023 12:00:30</td>
                                                    <td>NF.pdf</td>
                                                    <td>Anexo Cadastrado</td>
                                                    <td>RESPONSÁVEL TÉCNICO</td>
                                                    <td>
                                                        <button class="btn btn-light btn-sm btn-circle text-secondary">
                                                            <i class="fas fa-file"></i>
                                                        </button>
                                                        <button class="btn btn-light btn-sm btn-circle text-secondary">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card border-0">
                                    <div class="card-header p-0" id="headingCertiTrabalhista">
                                        <button class="btn btn-link btn-block anexos-acc collapsed" type="button" data-toggle="collapse" data-target="#collapseCertiTrabalhista" aria-expanded="false" aria-controls="collapseCertiTrabalhista">
                                            Certidão Trabalhista
                                        </button>
                                    </div>
                                    <div id="collapseCertiTrabalhista" class="collapse p-3 border" aria-labelledby="headingCertiTrabalhista" data-parent="#accordionExample">
                                        <table class="table table-striped table-borderless table-sm border m-0">
                                            <thead>
                                                <tr>
                                                    <th>Cadastro</th>
                                                    <th>Arquivo</th>
                                                    <th>Situação</th>
                                                    <th>Usuário</th>
                                                    <th>Anexo</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>16/01/2023 12:00:30</td>
                                                    <td>NF.pdf</td>
                                                    <td>Anexo Cadastrado</td>
                                                    <td>RESPONSÁVEL TÉCNICO</td>
                                                    <td>
                                                        <button class="btn btn-light btn-sm btn-circle text-secondary">
                                                            <i class="fas fa-file"></i>
                                                        </button>
                                                        <button class="btn btn-light btn-sm btn-circle text-secondary">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card border-0">
                                    <div class="card-header p-0" id="headingPrevidenciaSocial">
                                        <button class="btn btn-link btn-block anexos-acc collapsed" type="button" data-toggle="collapse" data-target="#collapsePrevidenciaSocial" aria-expanded="false" aria-controls="collapsePrevidenciaSocial">
                                            Guia da Previdência Social
                                        </button>
                                    </div>
                                    <div id="collapsePrevidenciaSocial" class="collapse p-3 border" aria-labelledby="headingPrevidenciaSocial" data-parent="#accordionExample">
                                        <table class="table table-striped table-borderless table-sm border m-0">
                                            <thead>
                                                <tr>
                                                    <th>Cadastro</th>
                                                    <th>Arquivo</th>
                                                    <th>Situação</th>
                                                    <th>Usuário</th>
                                                    <th>Anexo</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>16/01/2023 12:00:30</td>
                                                    <td>NF.pdf</td>
                                                    <td>Anexo Cadastrado</td>
                                                    <td>RESPONSÁVEL TÉCNICO</td>
                                                    <td>
                                                        <button class="btn btn-light btn-sm btn-circle text-secondary">
                                                            <i class="fas fa-file"></i>
                                                        </button>
                                                        <button class="btn btn-light btn-sm btn-circle text-secondary">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card border-0">
                                    <div class="card-header p-0" id="headingFGTS">
                                        <button class="btn btn-link btn-block anexos-acc collapsed" type="button" data-toggle="collapse" data-target="#collapseFGTS" aria-expanded="false" aria-controls="collapseFGTS">
                                            FGTS
                                        </button>
                                    </div>
                                    <div id="collapseFGTS" class="collapse p-3 border" aria-labelledby="headingFGTS" data-parent="#accordionExample">
                                        <table class="table table-striped table-borderless table-sm border m-0">
                                            <thead>
                                                <tr>
                                                    <th>Cadastro</th>
                                                    <th>Arquivo</th>
                                                    <th>Situação</th>
                                                    <th>Usuário</th>
                                                    <th>Anexo</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>16/01/2023 12:00:30</td>
                                                    <td>NF.pdf</td>
                                                    <td>Anexo Cadastrado</td>
                                                    <td>RESPONSÁVEL TÉCNICO</td>
                                                    <td>
                                                        <button class="btn btn-light btn-sm btn-circle text-secondary">
                                                            <i class="fas fa-file"></i>
                                                        </button>
                                                        <button class="btn btn-light btn-sm btn-circle text-secondary">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="gestor" role="tabpanel" aria-labelledby="gestor-tab">
                            gestor
                        </div>
                        <div class="tab-pane fade" id="comissaoliq" role="tabpanel" aria-labelledby="comissaoliq-tab">
                            comissaoliq
                        </div>
                        <div class="tab-pane fade" id="processo" role="tabpanel" aria-labelledby="processo-tab">
                            processo
                        </div>
                        <div class="tab-pane fade" id="ordempag" role="tabpanel" aria-labelledby="ordempag-tab">
                            ordempag
                        </div>
                        <div class="tab-pane fade" id="iss" role="tabpanel" aria-labelledby="iss-tab">
                            iss
                        </div>
                        <div class="tab-pane fade" id="formapag" role="tabpanel" aria-labelledby="formapag-tab">
                            <table class="table table-striped table-borderless border" id="dataTable" width="100%" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <th class="bg-secondary text-white py-2" colspan="2">Informações do Pagamento</th>
                                    </tr>
                                    <tr>
                                        <td>Forma de Pagamento</td>
                                        <td>Pagamento em Conta</td>
                                    </tr>
                                    <tr>
                                        <td>Agência / Conta</td>
                                        <td>406 / 123-4 BANCO DO FORNECEDOR</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="/assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="/assets/js/payment-request.js"></script>

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
    </script>
@endsection