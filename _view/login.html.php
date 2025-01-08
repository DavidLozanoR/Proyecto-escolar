
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <!-- Agregar Bootstrap CSS -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <!-- Agregar Bootstrap JS y Popper.js -->
            <!-- Bootstrap CSS -->
            <link href="<?php echo SITE_URL; ?>utils/bootstrap_v5.1.0/bootstrap.min.css" rel="stylesheet">
            <!-- FontAwesome CSS -->
            <link href="<?php echo SITE_URL; ?>utils/fontawesome-free_v5.15.4/css/all.min.css" rel="stylesheet">
            <!-- DataTables CSS -->
            <link href="<?php echo SITE_URL; ?>utils/datatables_v2.0.8/datatables.min.css" rel="stylesheet">
            <!-- SweetAlert CSS -->
            <link href="<?php echo SITE_URL; ?>utils/sweetalert2_v11.11.1/sweetalert2.min.css" rel="stylesheet">
         
        <style>
            body {
            background: linear-gradient(45deg, #6a11cb, #2575fc);
            height: 100vh;
        }
        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-card {
            background: #fff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        .login-card h2 {
            text-align: center;
            margin-bottom: 30px;
            font-family: 'Roboto', sans-serif;
        }
        .form-group input {
            border-radius: 30px;
            padding-left: 15px;
            height: 45px;
        }
        .btn-primary {
            background-color: #6a11cb;
            border-radius: 30px;
            padding: 10px 20px;
            font-size: 16px;
            width: 100%;
        }
        .btn-primary:hover {
            background-color: #2575fc;
        }
    </style>
</head>
<body>

<div class="login-container">
    <div class="login-card">
        <h2>¡Bienvenido de nuevo!</h2>
        <form id="formulario" class="formulario" >
            <div class="form-group">
                <input type="email" id="usr" name="usr" class="form-control" placeholder="Correo electrónico" required>
            </div>
            <div class="form-group">
                <input type="password" id="pass" name="pass" class="form-control" placeholder="Contraseña" required>
            </div>
            <button  class="btn btn-primary">Iniciar sesión</button>
        </form>
        <div class="text-center mt-3">
            <a href="#" class="text-muted">¿Olvidaste tu contraseña?</a>
        </div>
    </div>
</div>

        <!-- Bootstrap JS -->
    <script src="<?php echo SITE_URL; ?>utils/bootstrap_v5.1.0/bootstrap.bundle.min.js"></script>
    <!-- JQuery JS -->
    <script src="<?php echo SITE_URL; ?>utils/jquery_v3.6.0/jquery.min.js"></script>
    <!-- SITE JS -->
    <script src="<?php echo SITE_URL; ?>js/site.js"></script>
    <!-- SweetAlert2 JS -->
    <script src="<?php echo SITE_URL; ?>utils/sweetalert2_v11.11.1/sweetalert2.min.js"></script>
     <!-- login JS -->
     <script src="<?php echo SITE_URL; ?>js/login.js"></script>
</body>
</html>
