<style>
        /* Estilo para las tarjetas */
        .card {
            background-color: #f8f9fa; /* Gris claro */
            border: 1px solid #dee2e6;
            border-radius: 10px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 15px;
        }
        .card-body {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .card-title {
            font-size: 1.1rem;
            font-weight: bold;
        }
        .card-actions {
            display: flex;
            gap: 10px;
        }
        /* Estilo del contenedor de búsqueda */
        .search-bar {
            margin-bottom: 20px;
            padding-top: 20px; /* Espaciado superior */
        }
        /* Ajustar el diseño del campo de búsqueda */
        .search-input-group {
            display: flex;
            align-items: center;
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            padding: 5px 10px;
        }
        .search-input-group input {
            border: none;
            outline: none;
            width: 100%;
            padding: 10px;
            font-size: 1rem;
        }
        .search-input-group i {
            color: #6c757d;
            font-size: 1.2rem;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container py-4">
        <!-- Encabezado -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="mb-0">Contenido de:<span class="titulo-modulo text-primary"> <?php echo $this->nombre_submodulo ?></span> </h1>
            <input type="button" value="Regresar" class="btn btn-danger" onclick="javascript:location.replace('<?php echo SITE_URL; ?>inicio/entrarmodulo/<?php echo $this->id_modulo ?>')"/>
        </div>

        <!-- Barra de búsqueda -->
        <div class="search-bar">
            <div class="search-input-group">
                <i class="fas fa-search"></i>
                <input type="text" id="searchInput" class="form-control" placeholder="Buscar archivo...">
            </div>
        </div>

        <!-- Contenedor de tarjetas -->
         <?php $ordinal=0?>
        <div id="<?php echo $ordinal?>" class="row">
            <?php foreach ($this->datos as $reg): ?>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($reg["nombre_archivo"]); ?></h5>
                            <div class="card-actions">
                                <a href="<?php echo htmlspecialchars($reg["ruta_archivo"]); ?>" class="btn btn-success btn-sm" target="_blank">
                                    <i class="fas fa-eye"></i> Ver
                                </a>
                                <a href="<?php echo htmlspecialchars($reg["downloadURL"]); ?>" download class="btn btn-primary btn-sm">
                                    <i class="fas fa-download"></i> Descargar
                                </a>
                                <button class="btn btn-danger btn-sm" onclick="eliminarContenido(<?php echo $ordinal;?>,<?php echo $reg['id_contenido']; ?>)">
                                    <i class="fas fa-trash-alt"></i> Eliminar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $ordinal++;?>
            <?php endforeach; ?>
        </div>



    </div>

   
