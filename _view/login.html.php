<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login / Registro</title>
    <link href="<?php echo SITE_URL; ?>utils/bootstrap_v5.1.0/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo SITE_URL; ?>utils/fontawesome-free_v5.15.4/css/all.min.css" rel="stylesheet">
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
            min-height: 100vh;
        }
        .login-card {
            background: #fff;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }
        .form-control {
            border-radius: 50px; /* Redondeo completo */
            padding: 0.75rem 1.5rem; /* Tamaño cómodo */
            border: 1px solid #ddd; /* Color de borde sutil */
            box-shadow: inset 0 2px 5px rgba(0, 0, 0, 0.1); /* Efecto de profundidad */
        }
        .form-control:focus {
            border-color: #6a11cb; /* Color del borde al enfocar */
            box-shadow: 0 0 5px rgba(106, 17, 203, 0.5); /* Sombra al enfocar */
            outline: none; /* Elimina el borde azul predeterminado */
        }
        .form-select {
            border-radius: 50px; /* Redondeo para el select */
            padding: 0.75rem 1.5rem;
            border: 1px solid #ddd;
        }
        .btn-primary {
            background-color: #6a11cb;
            border: none;
            border-radius: 50px;
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
            width: 100%;
            transition: background-color 0.3s ease-in-out;
        }
        .btn-primary:hover {
            background-color: #2575fc;
        }
        .toggle-link {
            cursor: pointer;
            color: #6a11cb;
            font-weight: bold;
        }
        .toggle-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <h2 id="form-title">¡Bienvenido de nuevo!</h2>
            
            <form id="login-form">
                <div class="mb-3">
                    <input type="email" id="usr" name="usr" class="form-control" placeholder="Correo electrónico" required>
                </div>
                <div class="mb-3">
                    <input type="password" id="pass" name="pass" class="form-control" placeholder="Contraseña" required>
                </div>
                <button type="submit" class="btn btn-primary">Iniciar sesión</button>
            </form>
            
            <form id="register-form" style="display: none;">
                <div class="mb-3">
                    <input type="text" id="p_apellido" name="p_apellido" class="form-control" placeholder="Primer Apellido" required>
                </div>
                <div class="mb-3">
                    <input type="text" id="s_apellido" name="s_apellido" class="form-control" placeholder="Segundo Apellido" required>
                </div>
                <div class="mb-3">
                    <input type="text" id="nombres" name="nombres" class="form-control" placeholder="Nombre/s" required>
                </div>
                <div class="mb-3">
                    <input type="email" id="email" name="email" class="form-control" placeholder="Correo electrónico" required>
                </div>
                <div class="mb-3">
                    <input type="number" id="edad" name="edad" class="form-control" placeholder="Edad" min="17" max="90" required>
                </div>
                <div class="mb-3">
                    <input type="password" id="pass" name="pass" class="form-control" placeholder="Contraseña" required>
                </div>
                <div class="mb-3">
                    <select name="perfil" id="perfil" class="form-select" required>
                        <option value="" disabled selected>Selecciona tu perfil</option>
                        <option value="Alumno">Alumno</option>
                        <option value="Profesor">Profesor</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Registrarse</button>
            </form>

            <div class="text-center mt-3">
                <span id="toggle-form" class="toggle-link">¿No tienes cuenta? Regístrate aquí</span>
            </div>
        </div>
    </div>
    <script src="<?php echo SITE_URL; ?>utils/jquery_v3.6.0/jquery.min.js"></script>
    <script src="<?php echo SITE_URL; ?>utils/bootstrap_v5.1.0/bootstrap.bundle.min.js"></script>
    <script src="<?php echo SITE_URL; ?>utils/sweetalert2_v11.11.1/sweetalert2.min.js"></script>
    <script src="<?php echo SITE_URL; ?>js/site.js"></script>
    <script src="<?php echo SITE_URL; ?>js/login.js"></script>

</body>
</html>
