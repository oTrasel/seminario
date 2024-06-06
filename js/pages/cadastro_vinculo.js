$(document).ready(function () {
  $("#selectAlunos")
    .select2({
      placeholder: "Selecione os Alunos",
      allowClear: false,
      closeOnSelect: false,
        theme: 'bootstrap-5'
    })
    .val(null)
    .trigger("change");
  $("#selectTurmas")
    .select2({
      placeholder: "Selecione uma Turma",
      allowClear: false,
      closeOnSelect: true,
      theme: 'bootstrap-5'
    })
    .val(null)
    .trigger("change");
  $(".select2-selection--single").css("height", "40px");
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


$(document).ready(function () {
    $('#cadastro_vinculo').submit(function (event) {
      event.preventDefault();
  
      // Desabilita o botão de login e atualiza o texto e o estilo
      var cadastroVinculo = $('#cadastroBt');
      cadastroVinculo.prop('disabled', true);
      cadastroVinculo.html(`
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
            alert('Vinculo Criado com Sucesso!');
            location.reload();
          } else {
            alert('Houve um erro ao Criar o Vinculo, por favor, tente novamente!');
            location.reload();
          }
  
          // Reabilita o botão de login e restaura o texto e o estilo originais
          cadastroVinculo.prop('disabled', false);
          cadastroVinculo.html('Cadastrar');
        },
        error: function (xhr, status, error) {
            alert('Houve um erro ao Criar o Vinculo, por favor, tente novamente!');
  
          // Reabilita o botão de login e restaura o texto e o estilo originais
          cadastroVinculo.prop('disabled', false);
          cadastroVinculo.html('Cadastrar');
        }
      });
    });
  });