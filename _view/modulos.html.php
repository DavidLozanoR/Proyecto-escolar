<div class="container my-4">
    <!-- Título -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Módulos de la Clase</h1>
    </div>
    
    <!-- Botones "Regresar" y "Agregar Módulo" alineados -->
    <div class="d-flex justify-content-end gap-2 mb-4">
        <input type="button" value="Regresar" class="btn btn-danger" onclick="javascript:location.replace('<?php echo SITE_URL; ?>inicio/clases/')"/>
        <?php if($this->id_perfil==2):?>
        <a class="btn btn-primary" href="javascript:location.replace('<?php echo SITE_URL; ?>inicio/agregarmodulo/<?php echo $this->id?>/')"><i></i> Agregar Módulo</a>
       <?php endif?>     
    </div>
    <br>
    <!-- Contenedor para las tarjetas de los módulos -->
    <div id="modulesContainer">
        <?php $ordinal=0; ?>
        <?php foreach($this->datos as $reg): ?>
        <!-- Ejemplo de tarjeta de un módulo -->
        <div class="card mb-3 module-card" data-ordinal="<?php echo $ordinal; ?>" data-id-modulo="<?php echo $reg["id_modulo"]; ?>">
            <div class="card-body d-flex align-items-center justify-content-between">
                <div>
                    <h5 class="card-title mb-2"><?php echo $reg["nombre"]?></h5>
                    <p class="card-text mb-0"><?php echo $reg["descripcion"]?></p>
                </div>
                <div class="d-flex gap-2 ms-3">
                    <!-- Botón Editar con icono -->
                    <a class="btn btn-warning btn-sm" href="javascript:location.replace('<?php echo SITE_URL; ?>inicio/editarmodulo/<?php echo $reg["id_modulo"] ?>/')">
                        <i class="fas fa-edit"></i> Editar
                    </a>
                    <!-- Botón Eliminar con icono -->
                    <button class="btn btn-danger btn-sm" onclick="eliminaRegistro(<?php echo $ordinal; ?>, <?php echo $reg['id_modulo']; ?>)">
                        <i class="fas fa-trash-alt"></i> Eliminar
                    </button>
                    <!-- Botón Entrar -->
                    <a class="btn btn-success btn-sm" href="javascript:location.replace('<?php echo SITE_URL; ?>inicio/entrarmodulo/<?php echo $reg["id_modulo"] ?>/')">
                        <i class="fas fa-sign-in-alt"></i> Entrar
                    </a>
                </div>
            </div>
        </div>
        <?php $ordinal++; ?>
        <?php endforeach; ?>
    </div>
</div>
