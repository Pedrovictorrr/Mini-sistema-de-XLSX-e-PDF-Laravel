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

$(document).ready(function () {
    $('#botaoPesquisar').on('click', function () {
        // Obtenha os dados do formulário
        var formData = $('#LeiPesquisar').serialize();

        // Envie a solicitação Ajax para o servidor
        if ($("#LeiPesquisar")[0].checkValidity()) {
            $.ajax({
                type: 'POST',
                url: '/orcamentario/nova-lei', // Substitua pelo caminho da rota que manipula o envio do formulário
                data: formData,
                success: function (response) {
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

