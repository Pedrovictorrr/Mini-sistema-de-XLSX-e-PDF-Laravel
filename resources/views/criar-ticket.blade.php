@extends('layout')

@section('content')
    <div class="container">
        <h2>SUPORTE AO USUARIO</h2>
        <form id="supportForm" action="{{ isset($ticket) ? route('tickets.update', $ticket->id) : route('tickets.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            @isset($ticket)
                @method('put')
            @endisset
            <div class="d-flex">
                <label>De:</label>
                <p class="ml-2">@isset($ticket){{$ticket->user->name}}@endisset</p>
            </div>
            <div class="form-group">
                <label for="assunto">Assunto:</label>
                <input type="text" class="form-control" name="assunto" id="assunto"
                    @isset($ticket->assunto)
                    @readonly(true)
                    value="{{ $ticket->assunto }}"
                @endisset>
            </div>
            <div class="form-group">
                <label for="mensagem">Mensagem:</label>
                <textarea class="form-control" name="mensagem" rows="5" id="mensagem">@isset($ticket->mensagem){{$ticket->mensagem}}@endisset</textarea>
            </div>
            <label for="anexo">Anexos:</label>
            <div class="col-12 pl-0">
                <div id="dropzone" class="form-control mb-3 col-6">
                    Clique ou arraste os arquivos
                </div>
                <ul id="fileList" class="col-6">
                    @isset($ticket)
                        @php
                            $files = glob(public_path("uploads/tickets/{$ticket->id}/*"));
                        @endphp

                        @foreach($files as $file)
                            <li class="basePath">
                                <span class="file-name">{{ pathinfo($file, PATHINFO_BASENAME) }}</span>
                                <button type="button" class="view openPath btn btn-primary btn-sm" data-file="{{ url('uploads/tickets/' . $ticket->id . '/' . pathinfo($file, PATHINFO_BASENAME)) }}">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button type="button" class="remove removePath btn btn-danger btn-sm" data-id="{{ $ticket->id }}" data-file="{{ pathinfo($file, PATHINFO_BASENAME) }}">
                                    X
                                </button>
                            </li>
                        @endforeach
                    @endisset
                </ul>
            </div>

            <input type="file" name="anexo[]" id="file" multiple style="display: none;">
            <button type="submit" class="btn btn-success">Enviar</button>
            <button type="reset" id="resetBtn" class="btn btn-danger">Limpar</button>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            var dropzone = $('#dropzone');
            var fileInput = $('#file');
            var fileList = $('#fileList');
            var files = [];
            var resetButton = $('#resetBtn');

            resetButton.on('click', function() {
                files = [];
                document.getElementById('supportForm').reset();
                document.getElementById('file').value = '';
                document.getElementById('fileList').innerHTML = '';
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

            $('.openPath').click(function() {
                let file = $(this).data('file');
                window.open(file, '_blank');
            });

            $('.removePath').on('click', function() {
                var ticketId = $(this).data('id');
                var fileName = $(this).data('file');
                var fileElement = $(this).closest('li');

                $.ajax({
                    url: '/tickets/' + ticketId + '/files/' + encodeURIComponent(fileName),
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(result) {
                        fileElement.remove();
                    },
                    error: function(jqXHR, textStatus, errorThrown) {

                    }
                });
            });

        });
    </script>

    <style>
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
