// Função para abrir o modal
// Função para abrir o modal
function openModal() {
    var modal = document.getElementById("myModal");
    modal.style.display = "block";
}

// Função para fechar o modal
function closeModal() {
    var modal = document.getElementById("myModal");
    modal.style.display = "none";

    // Remove the rows from the table when the modal is closed
    $('#tabela-corpo').empty();
}

// Fecha o modal se o usuário clicar fora da área do modal
window.onclick = function (event) {
    var modal = document.getElementById("myModal");
    if (event.target == modal) {
        modal.style.display = "none";
        // Call the closeModal function to clear the table rows
        closeModal();
    }
};

function openModalSucess() {
    var modal = document.getElementById("myModalSucess");
    modal.style.display = "block";
}

// Função para fechar o modal
function closeModalSucess() {
    var modal = document.getElementById("myModalSucess");
    modal.style.display = "none";

    // Remove the rows from the table when the modal is closed
    $('#tabela-corpo').empty();
}

// Fecha o modal se o usuário clicar fora da área do modal
window.onclick = function (event) {
    var modal = document.getElementById("myModalSucess");
    if (event.target == modal) {
        modal.style.display = "none";
        // Call the closeModal function to clear the table rows
        closeModalSucess();
    }
};

// -------------------- modal editar --------------------//

function openModalEdit(eventData) {
    var modal = document.getElementById("myModalEdit");
    var input = document.getElementById("inputid");
    modal.style.display = "block";
    var item = JSON.parse(eventData.currentTarget.getAttribute('data-item'));
    var currentId = item.id;
   console.log(item)

      document.getElementById("Numero1").placeholder = item.decretoalteracaoorcamentaria || "";
    document.getElementById("dta1").placeholder = item.dataato || "";
    document.getElementById("dtl1").placeholder = item.datapublicacao || "";
    document.getElementById("ato1").value = item.tipoato || "";
    document.getElementById("credito1").value = item.tipocredito || "";
    document.getElementById("recurso1").value = item.tiporecurso || "";
    document.getElementById("status1").value = item.situacao || "";
    document.getElementById("Valor1").placeholder = item.valorcredito || "";
    // Crie um novo elemento input com o tipo "hidden"
    var inputElement = document.createElement("input");
    inputElement.type = "hidden";
     inputElement.name = "id";
    // Defina o valor do atributo "value" como o "currentId"
    inputElement.value = currentId;

    // Adicione o input ao conteúdo do modal antes de exibi-lo
    input.appendChild(inputElement);
}

$(document).ready(function() {
    // Function to handle form submission
    $("#enviarFormularioEdit").click(function(e) {
        e.preventDefault(); // Prevent the default form submission

        // Check if the form is valid (all required fields are filled)
        if ($("#FormEditLei")[0].checkValidity()) {
            // Get form data
            var formData = $("#FormEditLei").serialize();

            // Make an AJAX POST request to the server
            $.ajax({
                type: "POST",
                url: "/orcamentario/edit", // Replace with the actual URL where the form should be submitted
                data: formData,
                success: function(response) {
                    // Handle the success response here
                    closeModalEdit()
                    $('#tabela-corpo').empty();
                    $('#alert-pesquisa').empty();
                    var newRow = '<div class="alert alert-success" role="alert">' +
                        'Item editado com sucesso!' +
                        ' </div>'
                    $('#alert-pesquisa').append(newRow);
                    setTimeout(function () {
                        $('#tabela-corpo').empty();
                        $('#alert-pesquisa').empty();
                        
                    }, 5000);
                },
                error: function(error) {
                    // Handle the error response here
                    console.error("Form submission failed!");
                    console.error(error.responseText); // You can log or display the error message here
                }
            });
        } else {
            // If the form is not valid, display an error message or do something else
            console.error("Please fill in all required fields.");
            $("#FormEditLei").addClass("was-validated");
        }
    });
});



// Função para fechar o modal
function closeModalEdit() {
    var modal = document.getElementById("myModalEdit");
    modal.style.display = "none";

    // Remove the rows from the table when the modal is closed

}

// Fecha o modal se o usuário clicar fora da área do modal
window.onclick = function (event) {
    var modal = document.getElementById("myModalEdit");
    if (event.target == modal) {
        modal.style.display = "none";
        // Call the closeModal function to clear the table rows
        closeModalEdit();
    }
};

// -------------------- fim modal editar --------------------//

// -------------------- Modal deletar --------------------//



// Fecha o modal se o usuário clicar fora da área do modal
window.onclick = function (event) {
    var modal = document.getElementById("myModalDelete");
    if (event.target == modal) {
        modal.style.display = "none";
        // Call the closeModal function to clear the table rows
        closeModalDelete();
    }
};
var currentId; // Variável global para armazenar o ID do item
var csrfToken;
function openModalDelete(id) {
    var item = JSON.parse(id.currentTarget.getAttribute('data-item'));
    var modal = document.getElementById("myModalDelete");
    console.log(item.id);
    modal.style.display = "block";
    currentId = item.id; // Salvar o ID na variável global
    csrfToken = document.getElementById("csrfToken").value;
    console.log(csrfToken)
}

function closeModalDelete() {
    var modal = document.getElementById("myModalDelete");
    modal.style.display = "none";
}

function confirmDelete() {
    closeModalDelete();

    // Obter o token CSRF do documento (válido apenas se estiver usando Laravel)


    // Executar a requisição AJAX para a rota POST
    $.ajax({
        type: "POST",
        url: "/orcamentario/delete", // Substitua pelo caminho correto da sua rota POST
        data: {
            _token: csrfToken, // Enviar o token CSRF junto com os dados
            id: currentId
        },
        success: function (response) {
            $('#tabela-corpo').empty();
            $('#alert-pesquisa').empty();
            var newRow = '<div class="alert alert-success" role="alert">' +
                'Item apagado com sucesso!' +
                ' </div>'
            $('#alert-pesquisa').append(newRow);
            setTimeout(function () {
                $('#tabela-corpo').empty();
                $('#alert-pesquisa').empty();
                $('#tabela-resultados2').empty();
            }, 5000);
        },
        error: function (xhr, status, error) {
            // Lógica em caso de erro
        }
    });
}
// -------------------- fim modal deletar --------------------//

// -------------------- Modal Show --------------------//

function openModalShow(event) {
    var item = JSON.parse(event.currentTarget.getAttribute('data-item'));
    var modal = document.getElementById("myModalShow");
    modal.style.display = "block";
    console.log(item)
    $('#ContentModalShow').empty();
    var newRow =
        '<p><strong>Lei: </strong>' + item.decretoalteracaoorcamentaria + '</p>' +
        '<p><strong>Decreto: </strong>' + item.tipolei + '</p>' +
        '<p><strong>Data: </strong>' + item.dataato + '</p>' +
        '<p><strong>Data da publicação: </strong>' + item.datapublicacao + '</p>' +
        '<p><strong>Tipo de Ato: </strong>' + item.tipoato + '</p>' +
        '<p><strong>Tipo de Crédito: </strong>' + item.tipocredito + '</p>' +
        '<p><strong>Tipo de Recurso: </strong>' + item.tiporecurso + '</p>' +
        '<p><strong>Situação: </strong>' + item.situacao + '</p>' +
        '<p><strong>Valor: </strong>' + item.valorcredito + '</p>' +
        '<div class="p-1">' +
        '<button class="btn btn-danger  px-5" onclick="closeModalShow()">Fechar</button>' +
        '</div>'
        ;

    $('#ContentModalShow').append(newRow);
}

// Função para fechar o modal
function closeModalShow() {
    var modal = document.getElementById("myModalShow");
    modal.style.display = "none";

    // Remove the rows from the table when the modal is closed

}

// Fecha o modal se o usuário clicar fora da área do modal
window.onclick = function (event) {
    var modal = document.getElementById("myModalShow");
    if (event.target == modal) {
        modal.style.display = "none";
        // Call the closeModal function to clear the table rows
        closeModalShow();
    }
};

// -------------------- fim modal Show --------------------//


// -------------------- Modal Log --------------------//

function openModalLog(id) {
    var modal = document.getElementById("myModalLog");
    modal.style.display = "block";
    var item = JSON.parse(id.currentTarget.getAttribute('data-item'));
    var currentId = item.id; // Salvar o ID na variável local (não global)

    // Fazer a solicitação AJAX
    $.ajax({
        url: "getLogAto?id=" + currentId, // Substitua "sua_url_do_servidor" pelo endereço do servidor
        type: "GET",
        dataType: "json",
        success: function (data) {
            console.log(data)

            $('#tabelaLog').empty();// Ajuste "tabelaLog" para o ID correto da tabela
            data.forEach(function (item) {
                var dataRecebida = new Date(item.created_at);
                var dia = dataRecebida.getDate().toString().padStart(2, '0');
                var mes = (dataRecebida.getMonth() + 1).toString().padStart(2, '0');
                var ano = dataRecebida.getFullYear();
                console.log(data)
                var dataFormatada = dia + '/' + mes + '/' + ano;
                var newRow = '<tr>' +
                    '<td>' + item.username + '</td>' +
                    '<td>' + dataFormatada + '</td>' +
                    '</tr>';

                // Adicionar a nova linha à tabela

                $('#tabelaLog').append(newRow);
            });
        },
        error: function (xhr, status, error) {
            // Tratar possíveis erros na solicitação
            console.error("Erro na requisição AJAX:", status, error);
        }
    });
}


// Função para fechar o modal
function closeModalLog() {
    var modal = document.getElementById("myModalLog");
    modal.style.display = "none";

    // Remove the rows from the table when the modal is closed

}

// Fecha o modal se o usuário clicar fora da área do modal
window.onclick = function (event) {
    var modal = document.getElementById("myModalLog");
    if (event.target == modal) {
        modal.style.display = "none";
        // Call the closeModal function to clear the table rows
        closeModalLog();
    }
};

// -------------------- fim modal deletar --------------------//


// Function to clear all the form fields
function clearForm() {
    const form = document.getElementById('FormNovaLei');
    form.reset();
}

// Function to attach the event handler to the "Limpar" button
function attachClearFormHandler() {
    const limparButton = document.getElementById('limparFormulario');
    limparButton.addEventListener('click', clearForm);
}

// Call the function to attach the event handler when the page loads
window.onload = attachClearFormHandler;


$(document).ready(function () {
    $('#enviarFormulario').on('click', function () {
        // Obtenha os dados do formulário
        var formData = $('#FormNovaLei').serialize();

        // Envie a solicitação Ajax para o servidor
        if ($("#FormNovaLei")[0].checkValidity()) {
            $.ajax({
                type: 'POST',
                url: '/orcamentario/nova-lei', // Substitua pelo caminho da rota que manipula o envio do formulário
                data: formData,
                success: function (response) {
                    closeModal()
                    openModalSucess()

                },
                error: function (error) {
                    // Lide com erros de requisição aqui (opcional)
                    console.log(error);
                }
            });
        } else {
            // Caso algum campo esteja vazio, adicione a classe 'was-validated' para exibir as mensagens de validação do bootstrap
            $("#FormNovaLei").addClass("was-validated");
        }
    });
});
function generateSVGIcon(path) {
    return '<svg xmlns="http://www.w3.org/2000/svg" height="1em" style="fill:white" viewBox="0 0 512 512">' +
        path +
        '</svg>';
}

// Function to handle button click event (replace this with your desired action)
function handleButtonClick() {
    console.log('Button clicked!');
    // Add your desired action here
}
$(document).ready(function () {
    $('#botaoPesquisar').on('click', function () {
        // Obtenha os dados do formulário
        var formData = $('#LeiPesquisar').serialize();

        // Envie a solicitação Ajax para o servidor
        if ($("#LeiPesquisar")[0].checkValidity()) {
            $.ajax({
                type: 'POST',
                url: '/orcamentario/pesquisar-lei', // Substitua pelo caminho da rota que manipula o envio do formulário
                data: formData,
                success: function (response) {

                    if (response && Array.isArray(response) && response.length > 0) {
                        // Clear existing table data if needed
                        $('#tabela-corpo').empty();
                        $('#alert-pesquisa').empty();

                        response.forEach(function (item) {

                            var dataRecebida = new Date(item.created_at);
                            var dia = dataRecebida.getDate().toString().padStart(2, '0');
                            var mes = (dataRecebida.getMonth() + 1).toString().padStart(2, '0');
                            var ano = dataRecebida.getFullYear();
                            console.log(response)
                            var dataFormatada = dia + '/' + mes + '/' + ano;

                            // Create a new row for each item in the response
                            var newRow = '<tr>' +
                                '<td>' + item.decretoalteracaoorcamentaria + '</td>' +
                                '<td>' + item.tipolei + '</td>' +
                                '<td>' + item.dataato + '</td>' +
                                '<td>' + item.datapublicacao + '</td>' +
                                '<td>' + item.tipoato + '</td>' +
                                '<td>' + item.tipocredito + '</td>' +
                                '<td>' + item.tiporecurso + '</td>' +
                                '<td>' + item.situacao + '</td>' +
                                '<td>' + item.valorcredito + '</td>' +
                                '<td>' +
                                '<div class="btn-group">' +
                                '<button class="btn btn-primary" onclick="openModalEdit(event)" data-item=\'' + JSON.stringify(item) + '\'> ' +
                                '<svg xmlns="http://www.w3.org/2000/svg" height="1em" style="fill:white" viewBox="0 0 512 512">' +
                                ' <path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z" />' +
                                +
                                '</svg>'
                                + '</button>' +
                                '<button class="btn btn-primary" onclick="openModalDelete(event)" data-item=\'' + JSON.stringify(item) + '\'>' +
                                '<svg xmlns="http://www.w3.org/2000/svg" height="1em" style="fill:white" viewBox="0 0 512 512">' +
                                '<path d="M64 80c-8.8 0-16 7.2-16 16V416c0 8.8 7.2 16 16 16H384c8.8 0 16-7.2 16-16V96c0-8.8-7.2-16-16-16H64zM0 96C0 60.7 28.7 32 64 32H384c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96zM152 232H296c13.3 0 24 10.7 24 24s-10.7 24-24 24H152c-13.3 0-24-10.7-24-24s10.7-24 24-24z" />' +
                                +
                                '</svg>'
                                + '</button>' +
                                '<button class="btn btn-primary" onclick="openModalLog(event)" data-item=\'' + JSON.stringify(item) + '\'>' +
                                '<svg xmlns="http://www.w3.org/2000/svg" height="1em" style="fill:white" viewBox="0 0 512 512">' +
                                '  <path d="M64 80c-8.8 0-16 7.2-16 16V416c0 8.8 7.2 16 16 16H384c8.8 0 16-7.2 16-16V96c0-8.8-7.2-16-16-16H64zM0 96C0 60.7 28.7 32 64 32H384c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96zM200 344V280H136c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H248v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z" />' +
                                +
                                '</svg>'
                                + '</button>' +
                                '<a class="btn btn-primary" target="_blank" href="/donwload/orcamentario/pdf/' + JSON.stringify(item.id) + '">' +
                                '<svg xmlns="http://www.w3.org/2000/svg" height="1em" style="fill:white" viewBox="0 0 512 512">' +
                                '    <path d="M128 0C92.7 0 64 28.7 64 64v96h64V64H354.7L384 93.3V160h64V93.3c0-17-6.7-33.3-18.7-45.3L400 18.7C388 6.7 371.7 0 354.7 0H128zM384 352v32 64H128V384 368 352H384zm64 32h32c17.7 0 32-14.3 32-32V256c0-35.3-28.7-64-64-64H64c-35.3 0-64 28.7-64 64v96c0 17.7 14.3 32 32 32H64v64c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V384zM432 248a24 24 0 1 1 0 48 24 24 0 1 1 0-48z" />' +
                                +
                                '</svg>'
                                + '</a>' +
                                '<button class="btn btn-primary" onclick="openModalShow(event)" data-item=\'' + JSON.stringify(item) + '\'>' +
                                '<svg xmlns="http://www.w3.org/2000/svg" height="1em" style="fill:white" viewBox="0 0 512 512">' +
                                '  <path  d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z" />' +
                                +
                                '</svg>'
                                + '</button>' +
                                '</div>' +
                                '</td>' +
                                '</tr>';

                            // Append the new row to the table body
                            $('#tabela-corpo').append(newRow);
                        });
                    }
                    else {
                        $('#tabela-corpo').empty();
                        $('#alert-pesquisa').empty();
                        var newRow = '<div class="alert alert-danger" role="alert">' +
                            ' Nenhum dado encontrado!' +
                            ' </div>'
                        $('#alert-pesquisa').append(newRow);
                    }
                    $(".tabela-resultados").show();

                },
                error: function (error) {
                    $(".tabela-resultados").show();

                }
            });
        } else {
            // Caso algum campo esteja vazio, adicione a classe 'was-validated' para exibir as mensagens de validação do bootstrap
            $("#LeiPesquisar").addClass("was-validated");
        }
    });
});

// Obter referências aos elementos do DOM
// Obter referências aos elementos do DOM
const checkboxes = document.querySelectorAll('input[type="checkbox"]');
const enviarFormulario = document.getElementById('enviarFormulario');

// Função para verificar e atualizar o estado do botão e o aviso
function atualizarEstadoBotao() {
    // Verificar se pelo menos um checkbox está selecionado
    const peloMenosUmSelecionado = Array.from(checkboxes).some(checkbox => checkbox.checked);

    // Habilitar o botão se pelo menos um checkbox estiver selecionado ou desabilitá-lo caso contrário
    enviarFormulario.disabled = !peloMenosUmSelecionado;

    // Exibir aviso somente quando o botão estiver desabilitado
    if (!peloMenosUmSelecionado) {
        enviarFormulario.setAttribute('title', 'Selecione pelo menos um checkbox');
    } else {
        enviarFormulario.removeAttribute('title');
    }
}

// Adicionar um ouvinte de eventos para o evento 'change' de todos os checkboxes
checkboxes.forEach(checkbox => {
    checkbox.addEventListener('change', atualizarEstadoBotao);
});

