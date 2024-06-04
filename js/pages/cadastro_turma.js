$(document).ready(function () {
    $('#cadastro_turma').submit(function (event) {
      event.preventDefault();
  
      // Desabilita o botão de login e atualiza o texto e o estilo
      var cadastroTurma = $('#cadastroBt');
      cadastroTurma.prop('disabled', true);
      cadastroTurma.html(`
        <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
        <span role="status">Cadastrando</span>
      `);
  
      var formData = $(this).serialize();
  
      $.ajax({
        url: $(this).attr('action'),
        type: 'POST',
        data: formData,
        success: function (response) {
          // Verifica o conteúdo da resposta do servidor
          response = response.trim();
          if (response === 'sucesso') {
            alert('Turma cadastrada com Sucesso!');
            location.reload();
          } else {
            alert('Houve um erro ao cadastrar a Turma, por favor, tente novamente!');
            location.reload();
          }
  
          // Reabilita o botão de login e restaura o texto e o estilo originais
          cadastroTurma.prop('disabled', false);
          cadastroTurma.html('Cadastrar');
        },
        error: function (xhr, status, error) {
            alert('Houve um erro ao cadastrar a Turma, por favor, tente novamente!');
  
          // Reabilita o botão de login e restaura o texto e o estilo originais
          cadastroTurma.prop('disabled', false);
          cadastroTurma.html('Cadastrar');
        }
      });
    });
  });


  $('#tableInfos').DataTable({
    paging: false,
    info: false, // Ativa a funcionalidade de salvar o estado
    "language": {
      "lengthMenu": "Display _MENU_ registros por páginas",
      "zeroRecords": "Nada encontrado - Desculpe",
      "info": "Pagina _PAGE_ de _PAGES_",
      "infoEmpty": "Sem registros",
      "infoFiltered": "(filtered from _MAX_ total records)",
      "search": "Filtrar resultados"
    },
    order: [[1, 'asc']],
  });

  $(document).ready(function() {
    let turma = document.getElementById('descr_turma');
    let botao = document.getElementById('cadastroBt');

    function toggleButton() {
        if (turma.value !== '') {
            botao.disabled = false;
        } else {
            botao.disabled = true;
        }
    }

    // Inicialmente verifica o valor do campo
    toggleButton();

    // Adiciona o evento onchange ao campo de entrada
    turma.onchange = toggleButton;
});
  