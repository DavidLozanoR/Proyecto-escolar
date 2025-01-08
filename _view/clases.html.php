<div class="container-fluid">
    <nav class="navbar navbar-light bg-light d-flex justify-content-between">
        <button class="btn btn-outline-dark d-md-none" id="toggleSidebarMobile">☰</button>
        <h1 class="mb-0">Gestión de Clases</h1>
        <button class="btn btn-primary" onclick="javascript:location.replace('<?php echo SITE_URL; ?>inicio/agregarclase/')">
            <i class="fas fa-plus"></i> Agregar Clase
        </button>
    </nav>
    <div class="py-4">
        <!-- Mi tabla de datos -->
        <div class="table-responsive">
            <table id="tblDatos" class="table table-striped table-sm table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Horario</th>
                        <th>Código</th>
                        <th>Profesor</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $ordinal = 0; ?>
                    <?php foreach($this->datos as $reg): ?>
                        <tr>
                            <td class="text-center"><?php echo $ordinal+1 ?></td>
                            <td><?php echo htmlspecialchars($reg["nombre"]) ?></td>
                            <td class="text-justify"><?php echo htmlspecialchars($reg["descripcion"]) ?></td>
                            <td><?php echo htmlspecialchars($reg["horario"]) ?></td>
                            <td><?php echo htmlspecialchars($reg["codigo_unico"]) ?></td>
                            <td><?php echo htmlspecialchars($this->profesor) ?></td>
                            <td class="text-center">
                                <div class="d-flex justify-content-around">
                                    <!-- Botón Editar con icono -->
                                    <a class="btn btn-warning btn-sm" href="javascript:location.replace('<?php echo SITE_URL; ?>inicio/editarclase/<?php echo $reg["id_clase"] ?>/')">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <!-- Botón Eliminar con icono -->
                                    <button class="btn btn-danger btn-sm" onclick="eliminaRegistro(<?php echo $ordinal ?>,<?php echo $reg["id_clase"] ?>)">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                    <!-- Botón Entrar -->
                                    <a class="btn btn-success btn-sm" href="javascript:location.replace('<?php echo SITE_URL; ?>inicio/entrarclase/<?php echo $reg["id_clase"] ?>/')">
                                        <i class="fas fa-sign-in-alt"></i> Entrar
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php $ordinal++; ?>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


