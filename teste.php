<?php
session_start();
//este formulario é usado para teste
$usuarios_validos = [
    'admin@portalturismoangola.ao' => 'senha1234',
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $senha = $_POST['senha'] ?? '';

    if (isset($usuarios_validos[$email]) && $usuarios_validos[$email] === $senha) {
        $_SESSION['usuario_logado'] = $email;
        header('Location: painel.html');
        exit();
    } else {
        echo "<script>
                alert('Conta criado com sucesso. Seja muito bem-vindo! PTA-Portal de Turismo de Angola');
                window.location.href = 'index.html';
              </script>";
        exit();
    }
} else {
    header('Location: index.html');
    exit();
}
?>