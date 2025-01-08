<!-- Formulario para agregar o editar clases -->
<div class="card">
            <div class="card-header bg-primary text-white">
                <h2>Agregar / Editar Submódulo</h2>
            </div>
            <div class="card-body">
                <form id="formulario" class="form">

                    <input type="hidden" name="peticion" value="<?php echo $this->peticion; ?>">
                    <?php if($this->peticion === "INSERT"): ?>
                            <input type="hidden" name="id_modulo" id="id_modulo" value="<?php echo $this->id; ?>">
                            <input type="hidden" name="id_submodulo"    id="id_submodulo"     value="<?php echo $this->id_submodulo; ?>">
                     <?php endif; ?>
                    <?php if($this->peticion === "UPDATE"): ?>
                             <input type="hidden" name="id_modulo" id="id_modulo"  value="<?php echo $this->id_modulo; ?>">
                             <input type="hidden" name="id_submodulo"  id="id_submodulo"     value="<?php echo $this->id_submodulo; ?>">
                     <?php endif; ?>

                    <div class="mb-3">
                        <label for="profesor" class="form-label">Nombre del Módulo:</label>
                        <input type="text" id="modulo" name="nombreModulo" value="<?php echo $this->modulo ?>" class="form-control" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre del Submódulo:</label>
                        <input type="text" id="nombreSubModulo" name="nombreSubModulo" class="form-control" value="<?php echo $this->nombre?>"  required>
                    </div>

                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción:</label>
                        <input type="textArea" id="descripcion" name="descripcionSubModulo" value="<?php echo $this->descripcion  ?>" class="form-control" rows="3" required>
                    </div>

                    <?php if($this->peticion == "UPDATE"): ?>
                         
                            <input type="button" value="Regresar" class="btn btn-danger" onclick="javascript:location.replace('<?php echo SITE_URL; ?>inicio/entrarmodulo/<?php echo $this->id_modulo; ?>')"/>
                     <?php endif; ?>
                     <?php if($this->peticion == "INSERT"): ?>
                         
                             <input type="button" value="Regresar" class="btn btn-danger" onclick="javascript:location.replace('<?php echo SITE_URL; ?>inicio/entrarmodulo/<?php echo $this->id; ?>')"/>
                        <?php endif; ?>
                    <input type="submit" value="Guardar" class="btn btn-primary"/>
                </form>
            </div>
        </div>