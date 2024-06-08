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
  $("#buscarBt").click(function () {
    var turmaId = $("#selectTurmas").val();
    $.ajax({
      url: "./manager/selects/select_busca_aluno_lancar.php",
      type: "POST",
      data: { id: turmaId },
      success: function (response) {
        $("#conteudo").html(response);
        $("#alunosCadastrados").modal("show");
      },
      error: function (xhr, status, error) {
        console.error("Error:", error);
      },
    });
  });

  $("#editarModal").on("show.bs.modal", function (event) {
    var button = $(event.relatedTarget);
    var alunoId = button.data("id");
    var alunoNome = button.closest("tr").find("td:first").text();
    var modal = $(this);

    modal.find(".modal-title").text("Lancar notas de: " + alunoNome);

    modal.find("#idVinculo").val(alunoId);
  });
});


$(document).ready(function () {
  $("#editarForm").submit(function (event) {
    event.preventDefault();

    // Desabilita o botão de login e atualiza o texto e o estilo
    var notas = $("#cadastroBt");
    notas.prop("disabled", true);
    notas.html(`
        <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
        <span role="status">Lançando Notas</span>
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
          alert("Notas Lançadas com Sucesso!");
          location.reload();
        } else {
          alert(
            "Houve um erro ao Lançar as Notas, por favor, tente novamente!"
          );
          location.reload();
        }

        // Reabilita o botão de login e restaura o texto e o estilo originais
        notas.prop("disabled", false);
        notas.html("Cadastrar");
      },
      error: function (xhr, status, error) {
        alert(
          "Houve um erro ao Lançar as Notas, por favor, tente novamente!"
        );

        // Reabilita o botão de login e restaura o texto e o estilo originais
        notas.prop("disabled", false);
        notas.html("Lançar Notas");
      },
    });
  });
});
