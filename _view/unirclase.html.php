<!-- Formulario para agregar o editar clases -->
<div class="card">
            <div class="card-header bg-primary text-white">
                <h2>Unirse a una clase.</h2>
            </div>
            <div class="card-body">
                <form id="formulario" class="formulario">

                    <input type="hidden" name="peticion" value="<?php echo $this->peticion; ?>">

                    <input type="hidden" name="id" value="<?php echo $this->id; ?>">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $this->nombre?>"  required>
                    </div>

                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción:</label>
                        <input type="textArea" id="descripcion" name="descripcion" value="<?php echo $this->descripcion  ?>" class="form-control" rows="3" required>
                    </div>

                    <div class="mb-3">
                        <label for="horario" class="form-label">Horario:</label>
                        <input type="text" id="horario" name="horario" value="<?php echo $this->horario  ?>" class="form-control" placeholder="Ej: Lunes y Miércoles, 10:00-12:00" required>
                    </div>

                    <div class="mb-3">
                        <label for="profesor" class="form-label">Codigo:</label>
                        <input type="text" id="profesor" name="codigo" value="<?php echo $this->codigo  ?>" class="form-control" required>
                    </div> 
                    
                    <div class="mb-3">
                        <label for="profesor" class="form-label">Profesor:</label>
                        <input type="text" id="profesor" name="profesor" value="<?php echo $this->profesor  ?>" class="form-control" readonly>
                    </div>


                    <input type="button" value="Regresar" class="btn btn-danger"
		            onclick="javascript:location.replace('<?php echo SITE_URL; ?>inicio/clases/')"/>
                    <input type="submit" value="Guardar" class="btn btn-primary"/>
                </form>
            </div>
        </div>