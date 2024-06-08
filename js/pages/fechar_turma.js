function verificarSelecao() {
  const selectTurmas = document.getElementById("selectTurmas");
  const buscarBt = document.getElementById("cadastroBt");

  if (selectTurmas.value !== "") {
    buscarBt.disabled = false;
  } else {
    buscarBt.disabled = true;
  }
}

$("#selectTurmas")
  .select2({
    placeholder: "Selecione uma Turma",
    allowClear: false,
    closeOnSelect: true,
    theme: "bootstrap-5",
  })
  .val(null)
  .trigger("change");
$(".select2-selection--single").css("height", "40px");


$(document).ready(function () {
  $("#fecharTurma").submit(function (event) {
    event.preventDefault();

    // Desabilita o botão de login e atualiza o texto e o estilo
    var fehcarTurma = $("#cadastroBt");
    fehcarTurma.prop("disabled", true);
    fehcarTurma.html(`
          <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
          <span role="status">Fechando Turma</span>
        `);

    var formData = $(this).serialize();

    $.ajax({
      url: $(this).attr("action"),
      type: "POST",
      data: formData,
      success: function (response) {
        // Verifica o conteúdo da resposta do servidor
        response = response.trim();
        if (response === "sucesso") {
          alert("Turma fechada com Sucesso!");
          location.reload();
        } else {
          alert("Houve um erro ao Fechar a Turma, por favor, tente novamente!");
          location.reload();
        }

        // Reabilita o botão de login e restaura o texto e o estilo originais
        fehcarTurma.prop("disabled", false);
        fehcarTurma.html("Fechar Turma");
      },
      error: function (xhr, status, error) {
        alert("Houve um erro ao Fechar a Turma, por favor, tente novamente!");

        // Reabilita o botão de login e restaura o texto e o estilo originais
        fehcarTurma.prop("disabled", false);
        fehcarTurma.html("Cadastrar");
      },
    });
  });
});


$("#tableInfos").DataTable({
  paging: false,
  info: false, // Ativa a funcionalidade de salvar o estado
  language: {
    lengthMenu: "Display _MENU_ registros por páginas",
    zeroRecords: "Nada encontrado - Desculpe",
    info: "Pagina _PAGE_ de _PAGES_",
    infoEmpty: "Sem registros",
    infoFiltered: "(filtered from _MAX_ total records)",
    search: "Filtrar resultados",
  },
  order: [[1, "asc"]],
});
