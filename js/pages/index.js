$(document).ready(function () {
  $('#login-form').submit(function (event) {
    event.preventDefault();

    // Desabilita o botão de login e atualiza o texto e o estilo
    var loginButton = $('#login-button');
    loginButton.prop('disabled', true);
    loginButton.html(`
        <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
        <span role="status">Login</span>
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
          window.location.href = "home.php";
        } else if (response === 'erroLogin') {
          alert('Usuário ou Senha inválidos!');
        } else if (response === 'erroToken' || response === 'erroRequisicao') {
          alert('Erro ao efetuar Login, tente novamente');
          location.reload();
        } else {
          alert('Erro ao efetuar Login, tente novamente');
          location.reload();
        }

        // Reabilita o botão de login e restaura o texto e o estilo originais
        loginButton.prop('disabled', false);
        loginButton.html('Login');
      },
      error: function (xhr, status, error) {

        alert('Usuário ou Senha inválidos!');

        // Reabilita o botão de login e restaura o texto e o estilo originais
        loginButton.prop('disabled', false);
        loginButton.html('Login');
      }
    });
  });
});
