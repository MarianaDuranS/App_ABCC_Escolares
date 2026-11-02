<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Inicio de Sesión</title>
<style>
  body {
    font-family: Arial, sans-serif;
    background: #f0f2f5;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
  }
  .login-box {
    background: white;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    width: 100%;
    max-width: 350px;
  }
  .login-box h2 { text-align: center; }
  .login-box input {
    width: 100%;
    padding: 12px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 8px;
    box-sizing: border-box;
  }
  .login-box button {
    width: 100%;
    padding: 12px;
    background: #1877f2;
    color: white;
    border: none;
    border-radius: 8px;
    font-size: 16px;
    cursor: pointer;
  }
  .login-box button:hover { background: #155ec1; }
</style>
</head>
<body>

<div class="login-box">
  <h2>Iniciar Sesión</h2>
  <form action="../backend/scripts/validar_usuario.php" method="POST">
    
    <input type="text" id="caja_usuario" name="caja_usuario" placeholder="Usuario" required>
    
    <input type="password" id="caja_password" name="caja_password" placeholder="Contraseña" required>
    
    <button type="submit">Entrar</button>
  </form>
</div>

</body>
</html>