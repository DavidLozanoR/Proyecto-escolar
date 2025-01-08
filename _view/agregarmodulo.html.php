<!-- Formulario para agregar o editar clases -->
<div class="card">
            <div class="card-header bg-primary text-white">
                <h2>Agregar / Editar Módulo</h2>
            </div>
            <div class="card-body">
                <form id="formulario" class="form">

                    <input type="hidden" name="peticion" value="<?php echo $this->peticion; ?>">
                    <?php if($this->peticion === "INSERT"): ?>
                            <input type="hidden" name="id_modulo" id="id_modulo" value="<?php echo $this->id_modulo; ?>">
                            <input type="hidden" name="id_clase"    id="id_clase"     value="<?php echo $this->id; ?>">
                     <?php endif; ?>
                    <?php if($this->peticion === "UPDATE"): ?>
                             <input type="hidden" name="id_modulo" id="id_modulo"  value="<?php echo $this->id_modulo; ?>">
                             <input type="hidden" name="id_clase"  id="id_clase"     value="<?php echo $this->id_clase; ?>">
                     <?php endif; ?>

                    <div class="mb-3">
                        <label for="profesor" class="form-label">Nombre de la Clase:</label>
                        <input type="text" id="claser" name="nameClase" value="<?php echo $this->clase ?>" class="form-control" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre del Módulo:</label>
                        <input type="text" id="nombre" name="nombreModulo" class="form-control" value="<?php echo $this->nombre?>"  required>
                    </div>

                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción:</label>
                        <input type="textArea" id="descripcion" name="descripcionModulo" value="<?php echo $this->descripcion  ?>" class="form-control" rows="3" required>
                    </div>

                    <?php if($this->peticion == "UPDATE"): ?>
                         
                      <input type="button" value="Regresar" class="btn btn-danger" onclick="javascript:location.replace('<?php echo SITE_URL; ?>inicio/entrarclase/<?php echo $this->id_clase; ?>')"/>
                     <?php endif; ?>
                     <?php if($this->peticion == "INSERT"): ?>
                         
                         <input type="button" value="Regresar" class="btn btn-danger" onclick="javascript:location.replace('<?php echo SITE_URL; ?>inicio/entrarclase/<?php echo $this->id; ?>')"/>
                        <?php endif; ?>
                    <input type="submit" value="Guardar" class="btn btn-primary"/>
                </form>
            </div>
        </div>