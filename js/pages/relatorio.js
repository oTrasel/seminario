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
      url: "./manager/selects/select_info_relatorio.php",
      type: "POST",
      data: { id: turmaId },
      success: function (response) {
        $("#conteudo").html(response);
        $("#relatorio").modal("show");
      },
      error: function (xhr, status, error) {
        console.error("Error:", error);
      },
    });
  });
});
