<div class="container mt-5">
    <h1 class="mb-4">Modificar Perfil</h1>

    <!-- Formulario para modificar perfil -->
    <form id="formulario" class="form">
        <input type="hidden" name="peticion" value="<?php echo $this->peticion; ?>">

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo $this->nombre; ?>" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Correo Electrónico:</label>
            <input type="email" id="email" name="email" value="<?php echo $this->email; ?>" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="edad" class="form-label">Edad:</label>
            <input type="number" id="edad" min="18" name="edad" value="<?php echo $this->edad; ?>" class="form-control">
        </div>

        <div class="mb-3">
            <label for="genero" class="form-label">Género:</label>
            <select id="genero" name="genero" class="form-select">
                <option value="Masculino" <?php echo $this->genero == 'Masculino' ? 'selected' : ''; ?>>Masculino</option>
                <option value="Femenino" <?php echo $this->genero == 'Femenino' ? 'selected' : ''; ?>>Femenino</option>
                <option value="Otro" <?php echo $this->genero == 'Otro' ? 'selected' : ''; ?>>Otro</option>
            </select>
        </div>

        <input type="button" value="Regresar" class="btn btn-danger"
		onclick="javascript:location.replace('<?php echo SITE_URL; ?>inicio/')"/>
        <button type="submit" class="btn btn-primary" >Actualizar Perfil</button>

    </form>
</div>
