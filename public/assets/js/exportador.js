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
// Function to clear all the form fields
function clearForm() {
    const form = document.getElementById('meuFormulario');
    form.reset();
}

// Function to attach the event handler to the "Limpar" button
function attachClearFormHandler() {
    const limparButton = document.getElementById('limparFormulario');
    limparButton.addEventListener('click', clearForm);
}

// Call the function to attach the event handler when the page loads
window.onload = attachClearFormHandler;


$(document).ready(function() {
    $('#enviarFormulario').on('click', function() {
        // Obtenha os dados do formulário
        var formData = $('#meuFormulario').serialize();

        // Envie a solicitação Ajax para o servidor
        $.ajax({
            type: 'POST',
            url: '/exportador/find-file', // Substitua pelo caminho da rota que manipula o envio do formulário
            data: formData,
            success: function(response) {
                $(document).ready(function() {
    $.ajax({
            url: '/teste', // Substitua pela URL correta para o seu AJAX
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                console.log(data)
                // Verifique se 'diariocontabilidade' é igual a 1
                if (data[0].diariocontabilidade === "1") {
                    var dataRecebida = new Date(data[0].created_at);
                    var dia = dataRecebida.getDate().toString().padStart(2, '0');
                    var mes = (dataRecebida.getMonth() + 1).toString().padStart(2, '0');
                    var ano = dataRecebida.getFullYear();

                    var dataFormatada = dia + '/' + mes + '/' + ano;
                    // Criação da nova linha na tabela
                    var newRow = '<tr>' +
                        '<td>' + 'DiarioContabilidade' + '</td>' +
                        '<td>Gerado em ' + dataFormatada + '</td>' +
                        '<td>' + data[0].diariocontabilidadeqtd + '</td>' +
                        '<td>' + '<a href="export/download/DiarioContabilidade" class="btn btn-success">Baixar</a>' + '</td>' +
                        '</tr>';

                    // Adiciona a nova linha na tabela
                    $('#tabela-corpo').append(newRow);
                }

                if (data[0].movimentocontabilmensal === "1") {
                    var dataRecebida = new Date(data[0].created_at);
                    var dia = dataRecebida.getDate().toString().padStart(2, '0');
                    var mes = (dataRecebida.getMonth() + 1).toString().padStart(2, '0');
                    var ano = dataRecebida.getFullYear();

                    var dataFormatada = dia + '/' + mes + '/' + ano;
                    // Criação da nova linha na tabela
                    var newRow = '<tr>' +
                        '<td>' + 'MovimentoContabilMensal' + '</td>' +
                        '<td>Gerado em ' + dataFormatada + '</td>' +
                        '<td>' + data[0].movimentocontabilmensalqtd + '</td>' +
                        '<td>' + '<a href="export/download/MovimentoContabilMensal" class="btn btn-success">Baixar</a>' + '</td>' +
                        '</tr>';

                    // Adiciona a nova linha na tabela
                    $('#tabela-corpo').append(newRow);
                }

                if (data[0].planocontabil === "1") {
                    var dataRecebida = new Date(data[0].created_at);
                    var dia = dataRecebida.getDate().toString().padStart(2, '0');
                    var mes = (dataRecebida.getMonth() + 1).toString().padStart(2, '0');
                    var ano = dataRecebida.getFullYear();

                    var dataFormatada = dia + '/' + mes + '/' + ano;
                    // Criação da nova linha na tabela
                    var newRow = '<tr>' +
                        '<td>' + 'PlanoContabil' + '</td>' +
                        '<td>Gerado em ' + dataFormatada + '</td>' +
                        '<td>' + data[0].planocontabilqtd + '</td>' +
                        '<td>' + '<a href="export/download/PlanoContabil" class="btn btn-success">Baixar</a>' + '</td>' +
                        '</tr>';

                    // Adiciona a nova linha na tabela
                    $('#tabela-corpo').append(newRow);
                }

                if (data[0].movimentorealizavel === "1") {
                    var dataRecebida = new Date(data[0].created_at);
                    var dia = dataRecebida.getDate().toString().padStart(2, '0');
                    var mes = (dataRecebida.getMonth() + 1).toString().padStart(2, '0');
                    var ano = dataRecebida.getFullYear();

                    var dataFormatada = dia + '/' + mes + '/' + ano;
                    // Criação da nova linha na tabela
                    var newRow = '<tr>' +
                        '<td>' + 'MovimentoRealizavel' + '</td>' +
                        '<td>Gerado em ' + dataFormatada + '</td>' +
                        '<td>' + data[0].movimentorealizavelqtd + '</td>' +
                        '<td>' + '<a href="export/download/RealizacaoMensalReceitaFonte" class="btn btn-success">Baixar</a>' + '</td>' +
                        '</tr>';

                    // Adiciona a nova linha na tabela
                    $('#tabela-corpo').append(newRow);
                }
                
            }
        ,

        error: function(xhr, status, error) {
            // Trate erros da requisição aqui, se necessário
            console.log(xhr.responseText);
        }
    }, 100);
});
            },
            error: function(error) {
                // Lide com erros de requisição aqui (opcional)
                console.log(error);
            }
        });
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

 