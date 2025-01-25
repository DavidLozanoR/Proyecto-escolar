<!-- Formulario para agregar o editar clases -->
<?php if($this->id_perfil==2):?>
    <div class="card">
                <div class="card-header bg-primary text-white">
                    <h2>Agregar / Editar Clase</h2>
                </div>
                <div class="card-body">
                    <form id="formulario" class="formulario">

                        <input type="hidden" name="peticion" value="<?php echo $this->peticion; ?>">

                        <input type="hidden" name="id" value="<?php echo $this->id; ?>">
                        <div class="mb-3">
                            <label for="codigo" class="form-label">Clase:</label>
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
<?php endif?>


<?php if($this->id_perfil==3):?>
<div class="card">
                <div class="card-header bg-primary text-white">
                    <h2>Unirse a una clase</h2>
                </div>
                <div class="card-body">
                    <form id="formulario" class="formulario">
                        <input type="hidden" name="peticion" value="<?php echo "JOIN" ?>">
                        <input type="hidden" name="id_perfil" value="<?php echo $this->id_perfil; ?>">
                        <div class="mb-3">
                            <label for="codigo" class="form-label">Còdigo de Clase:</label>
                            <input type="text" id="codigo" name="codigo" class="form-control"  placeholder="Código Único" required>
                        </div>

                        <input type="button" value="Regresar" class="btn btn-danger"
                        onclick="javascript:location.replace('<?php echo SITE_URL; ?>inicio/clases/')"/>
                        <input type="submit" value="Guardar" class="btn btn-primary"/>
                    </form>
                </div>
            </div>
<?php  endif?>