<!-- Formulario para agregar o editar clases -->
<div class="card">
            <div class="card-header bg-primary text-white">
                <h2>Agregar Contenido</h2>
            </div>
            <div class="card-body">
                <form id="formulario" class="formulario">

                    <input type="hidden" name="peticion" value="<?php echo $this->peticion; ?>">

                    <input type="hidden" id="id_submodulo" name="id_submodulo" value="<?php echo $this->id_submodulo; ?>">
                    <input type="hidden" id="id_contenido" name="id_contenido" value="<?php echo $this->id_contenido; ?>">
                    <div class="mb-3">
                        <label for="nombre_submodulo" class="form-label">Nombre del Modulo:</label>
                        <input type="text" id="submodulo" name="nombre_submodulo" value="<?php echo $this->nombre_submodulo  ?>" class="form-control" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre del Archivo:</label>
                        <input type="text" id="nombre" name="nombre_archivo" class="form-control" value="<?php echo $this->nombre_archivo?>"  required>
                    </div>

                    <div class="mb-3">
                        <label for="ruta" class="form-label">Ruta del Archivo:</label>
                        <input type="textArea" id="ruta" name="ruta_archivo" value="<?php echo $this->ruta_archivo  ?>" class="form-control" rows="3" required>
                    </div>


                    <input type="button" value="Regresar" class="btn btn-danger"
		            onclick="javascript:location.replace('<?php echo SITE_URL; ?>inicio/entrarsubmodulo/<?php echo $this->id_submodulo?>')"/>
                    <input type="submit" value="Guardar" class="btn btn-primary"/>
                </form>
            </div>
        </div>