@extends('layout')

@section('content')
    <div class="container">
        <h2>SUPORTE AO USUARIO</h2>
        <a class="btn btn-primary" href="{{ route('criar-ticket') }}">+ NOVO</a>

        <div class="mb-3 d-flex align-items-center col-12">
            <label for="id" class="form-label col-2">ID:</label>
            <input type="text" class="form-control ml-2 col-9" id="id" name="id">
        </div>
        <div class="mb-3 d-flex align-items-center col-12">
            <label for="dateBegin" class="form-label col-2">Data:</label>
            <input type="date" class="form-control ml-2 form-date" id="dateBegin" name="dateBegin">
            <label for="dateEnd" class="form-label ml-2">Até:</label>
            <input type="date" class="form-control ml-2 form-date" id="dateEnd" name="dateEnd">
        </div>
        <div class="mb-3 d-flex align-items-center col-12">
            <label for="begin" class="form-label col-2 form-input-date">Data da Resposta:</label>
            <input type="date" class="form-control ml-2 form-date" id="begin" name="begin">
            <label for="end" class="form-label ml-2">Até:</label>
            <input type="date" class="form-control ml-2 form-date" id="end" name="end">
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
            </select>
        </div>
        <div class="mb-3 d-flex align-items-center col-12">
            <label for="assunto" class="form-label col-2">Assunto:</label>
            <input type="text" class="form-control col-9 ml-2" id="assunto" name="assunto">
        </div>

        <div class="mb-3 d-flex align-items-center">
            <input type="radio" value="0" id="kind" name="kind">
            <label for="search" class="form-check-label ml-2">Aberto</label>
        </div>

        <div class="mb-3 d-flex align-items-center">
            <input type="radio" value="1" id="kind" name="kind">
            <label for="kind" class="form-check-label ml-2">Concluido</label>
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
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="modal fade" id="ticketModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Atendimento</h4>
                    </div>
                    <div class="modal-body">
                        <div class="d-flex nameLabel"></div>
                        <textarea class="form-control textArea" rows="3" disabled></textarea>
                        <div class="form-group">
                            <label for="mensagem">Enviar nova mensagem:</label>
                            <div class="col-12 d-flex">
                                <textarea class="form-control col-9" name="mensagem" rows="5" id="mensagem"></textarea>
                                <div
                                    class="actions-button col-3 d-flex flex-column align-items-center justify-content-center">
                                    <button type="button" class="btn btn-primary mb-2 openAttach"><i
                                            class="fa fa-cloud-download-alt"></i></button>
                                    <button type="button" class="btn btn-primary"><i
                                            class="fa fa-paper-plane"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="sendFile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Incluir anexo</h4>
                    </div>
                    <div class="modal-body">
                        <label for="anexo">Anexos:</label>
                        <div class="">
                            <div id="dropzone" class="form-control mb-3">
                                Clique ou arraste os arquivos
                            </div>
                            <ul id="fileList">

                            </ul>
                        </div>
                        <input type="file" name="anexo[]" id="file" multiple style="display: none;">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default closeAttach" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        var editRoute = "{{ route('tickets.edit', ['ticket' => 'TICKET_ID']) }}";;
    </script>
    <script>
        var originalData = [];

        function updateTable(data) {
            $('#dataTable tbody').empty();

            $.each(data, function(index, ticket) {
                var row = $('<tr>');
                row.append($('<td>').text(ticket.id));
                row.append($('<td>').text(ticket.created_at));
                row.append($('<td>').text(ticket.modulo.nome));
                row.append($('<td>').text(ticket.user.name));
                row.append($('<td>').text(ticket.assunto));
                row.append($('<td>').text(ticket.situacao.nome));

                // Criação dos botões de ação
                var actionCell = $('<td>').addClass('actions small');
                var status = "status-" + ticket.situacao_id;
                var button1 = $('<button type="button">').html('<i class="fas fa-comment"></i>')
                    .addClass('btn btn-primary btn-sm mr-1 ' + status).click(
                        function() {
                            // $('#ticketModal .modal-body').empty();
                            $('#ticketModal .modal-body .nameLabel').append('<p>' + ticket.created_at + ' - ' +
                                ticket.user.name + '</p>');
                            $('#ticketModal .modal-body .textArea').text(ticket.mensagem)
                            $('#ticketModal .modal-body .textArea').text(ticket.mensagem).attr('disabled',
                                'disabled');
                            $('#ticketModal').modal('show');
                        });

                var button2 = $('<a>', {
                    html: '<i class="fas fa-exclamation"></i>',
                    class: 'btn btn-warning btn-sm',
                    href: "/tickets/" + ticket.id + "/edit",
                });

                actionCell.append(button1).append(button2);
                row.append(actionCell);
                $('#dataTable').append(row);
            });
        }

        function fetchTickets() {
            $.ajax({
                url: '/tickets',
                type: 'GET',
                success: function(response) {
                    originalData = response.data;
                    updateTable(response.data);
                },
                error: function(jqXHR, textStatus, errorThrown) {}
            });
        }

        function filterData() {
            var id = $('#id').val();
            var dateBegin = $('#dateBegin').val();
            var dateEnd = $('#dateEnd').val();
            var begin = $('#begin').val();
            var end = $('#end').val();
            var modulo = $('#modulo').val();
            var responsavel = $('#responsavel').val();
            var assunto = $('#assunto').val();
            var kind = $('input[name="kind"]:checked').val();

            var filteredData = originalData.filter(function(ticket) {
                var ticketDateObj = ticket.created_at.split('/').reverse().join('-');

                var kindMatch = true;
                if (kind == 0) kindMatch = (ticket.situacao_id == 1 || ticket.situacao_id == 2);
                else if (kind == 1) kindMatch = (ticket.situacao_id == 3);

                return (!id || ticket.id == id) &&
                    (!dateBegin || ticketDateObj >= dateBegin) &&
                    (!dateEnd || ticketDateObj <= dateEnd) &&
                    (!begin || ticket.ultima_resposta >= dateBegin) &&
                    (!end || ticket.ultima_resposta <= dateEnd) &&
                    (!modulo || ticket.modulo.nome == modulo) &&
                    (!responsavel || (ticket.user_id == responsavel)) &&
                    (!assunto || ticket.assunto.includes(assunto)) &&
                    kindMatch;
            });
            updateTable(filteredData);
        }

        $('input, select').on('change', function() {
            filterData();
        });

        $(document).ready(function() {

            var dropzone = $('#dropzone');
            var fileInput = $('#file');
            var fileList = $('#fileList');
            var files = [];

            fetchTickets();

            $.ajax({
                url: '/usuarios',
                method: 'GET',
                success: function(data) {
                    var select = $('#responsavel');
                    select.empty();

                    if (data.length > 1) {
                        select.append($('<option>', {
                            value: '',
                            text: ''
                        }));
                    } else select.attr('disabled', 'disabled');

                    $.each(data, function(index, usuario) {
                        select.append($('<option>', {
                            value: usuario.id,
                            text: usuario.name
                        }));
                    });
                },
                error: function(jqXHR, textStatus, errorThrown) {}
            });

            $('.openAttach').click(function() {
                $('#ticketModal').css('opacity', 0);
                $('#sendFile').modal('show');
            });

            $('.closeAttach').click(function() {
                $('#ticketModal').css('opacity', 1);
            });

            dropzone.on('click', function() {
                fileInput.click();
            });

            dropzone.on('dragover', function(e) {
                e.preventDefault();
                dropzone.css('background-color', '#eee');
            });

            dropzone.on('dragleave', function(e) {
                e.preventDefault();
                dropzone.css('background-color', 'transparent');
            });

            dropzone.on('drop', function(e) {
                e.preventDefault();
                dropzone.css('background-color', 'transparent');
                Array.prototype.push.apply(files, e.originalEvent.dataTransfer.files);
                displayFiles();
            });

            fileInput.on('change', function() {
                Array.prototype.push.apply(files, fileInput[0].files);
                displayFiles();
            });

            function displayFiles() {
                fileList.children('li:not(.basePath)').remove();

                for (let i = 0; i < files.length; i++) {
                    let fileName = $('<span>').addClass('file-name').text(files[i].name);
                    let fileItem = $('<li>').append(fileName);
                    let removeButton = $('<button type="button">').addClass('remove').text('X').click(function() {
                        files.splice(i, 1);
                        displayFiles();
                        fileInput.val('');
                    });
                    let viewButton = $('<button type="button">').addClass('view').html('<i class="fas fa-eye"></i>')
                        .click(function() {
                            let file = files[i];
                            const objectURL = URL.createObjectURL(file);
                            window.open(objectURL, '_blank');
                        });
                    fileItem.append(removeButton, viewButton);
                    fileList.append(fileItem);
                }
            }
        });
    </script>

    <style>
        .form-date {
            width: 150px;
        }

        .form-select {
            width: 200px;
        }

        .col-2 {
            flex: 0 0 12.66667%;
            padding: 0 !important;
            text-align: end;
        }

        .col-12 {
            padding: 0 !important;
            text-align: end;
        }

        .actions {
            text-align: center;
            min-width: 100px;
        }

        .btn-warning {
            width: 30px
        }

        .control {
            margin-right: 3px;
        }

        .status-2 {
            background-color: #ff9100;
            border-color: #ff9100;
        }

        .status-3 {
            background-color: #6f6f6f;
            border-color: #6f6f6f;
        }

        #fileList {
            list-style-type: none;
            padding: 0;
        }

        .file-name {
            display: inline-block;
            max-width: 200px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        #fileList li {
            border: 1px solid black;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            position: relative;
        }

        #fileList button {
            display: flex;
            align-items: center;
            justify-content: center;
            border: none;
            background-color: #007bff;
            color: white;
            border-radius: 50%;
            width: 25px;
            height: 25px;
            line-height: 30px;
            text-align: center;
            position: absolute;
            top: 10px;
        }

        #fileList button.remove {
            right: 50px;
        }

        #fileList button.view {
            right: 10px;
        }
    </style>
@endsection
