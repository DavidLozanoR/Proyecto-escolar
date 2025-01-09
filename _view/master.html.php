<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/x-icon" href="data:image/x-icon;base64,AAABAAEAEBAQAAEABAAoAQAAFgAAACgAAAAQAAAAIAAAAAEABAAAAAAAgAAAAAAAAAAAAAAAEAAAAAAAAAAAAAAA/4QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAREREAAAAAAQAAAQAAAAEQAAEREQABEAABERABEQEAAQAQAAAQAQAREAAAABABABEAAQERAAEAEQABAQAAABABEAAAEQAAEAAREREREAABAAAREREAAAAQAAABAAAAAAEAAAEAAAAAABEREAAAD//wAA//8AAPgfAAD33wAAzwcAADwxAAB2+wAAY/sAAGdHAABnXwAAs+cAALgDAADeBwAA798AAPffAAD4PwAA" >
    
    <title>PROFESOR</title>
    <!-- Bootstrap CSS -->
    <link href="<?php echo SITE_URL; ?>utils/bootstrap_v5.1.0/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome CSS -->
    <link href="<?php echo SITE_URL; ?>utils/fontawesome-free_v5.15.4/css/all.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link href="<?php echo SITE_URL; ?>utils/datatables_v2.0.8/datatables.min.css" rel="stylesheet">
    <!-- SweetAlert CSS -->
    <link href="<?php echo SITE_URL; ?>utils/sweetalert2_v11.11.1/sweetalert2.min.css" rel="stylesheet">
 
    <link  href="<?php echo SITE_URL; ?>css/clases.css" rel="stylesheet">
    
</head>
<body>
    <div id="sidebar" class="bg-dark">
        <nav class="navbar navbar-dark">
            <div class="container-fluid">
                <button class="btn btn-dark d-md-none" id="toggleSidebar">
                    ☰
                </button>
            </div>
        </nav>
        <div class="overflow-auto" style="height: calc(100% - 56px);">
            <ul class="nav flex-column">
                <li class="nav-item">
                    
                <a href="javascript:location.replace('<?php echo SITE_URL; ?>inicio/')" class="nav-link">Inicio</a>
                </li>
                <li class="nav-item">
                    <a href="javascript:location.replace('<?php echo SITE_URL; ?>inicio/perfil/')" class="nav-link">Perfil</a>

                </li>
                <li class="nav-item">
                     <a href="javascript:location.replace('<?php echo SITE_URL; ?>inicio/clases/')" class="nav-link">Clases</a>
                   
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Tema</a>
                </li>
                <li class="nav-item">
                <a href="javascript:location.replace('<?php echo SITE_URL; ?>inicio/salir/')" class="nav-link">Salir</a>
                </li>
                <!-- Add more items as needed -->
            </ul>
        </div>
    </div>

    <div id="content">
		<!-- AQUI VA TODO EL CONTENIDO CAMBIANTE -->
		<?php $ctrl->renderContent(); ?>
    </div>

    <!-- Bootstrap JS -->
    <script src="<?php echo SITE_URL; ?>utils/bootstrap_v5.1.0/bootstrap.bundle.min.js"></script>
    <!-- JQuery JS -->
    <script src="<?php echo SITE_URL; ?>utils/jquery_v3.6.0/jquery.min.js"></script>
    <!-- DataTables JS -->
    <script src="<?php echo SITE_URL; ?>utils/datatables_v2.0.8/datatables.min.js"></script>
    <!-- SweetAlert2 JS -->
    <script src="<?php echo SITE_URL; ?>utils/sweetalert2_v11.11.1/sweetalert2.min.js"></script>
    <!-- SITE JS -->
    <script src="<?php echo SITE_URL; ?>js/site.js"></script>
    
    <script>
        $('#tblDatos').DataTable( {
            responsive: true, // Activa la funcionalidad responsiva
            paging: true,     // Activa la paginación
            searching: true,  // Activa la barra de búsqueda
            ordering: true,   // Activa la funcionalidad de ordenamiento
            autoWidth: true, // Desactiva el auto-ajuste de ancho
            language: {
                url: "<?php echo SITE_URL; ?>utils/datatables_v2.0.8/es-MX.json" // Traducción al español
            }
        } );
        const sidebar = document.getElementById('sidebar');
        const content = document.getElementById('content');
        const toggleSidebar = document.getElementById('toggleSidebar');
        const toggleSidebarMobile = document.getElementById('toggleSidebarMobile');
        
        const adjustSidebarForScreenSize = () => {
            if (window.innerWidth <= 768) {
                sidebar.classList.add('collapsed');
                content.classList.add('collapsed');
                sidebar.classList.toggle('collapsed');
            } else {
                sidebar.classList.remove('collapsed');
                content.classList.remove('collapsed');
            }
        };
        
        toggleSidebar.addEventListener('click', () => {
            sidebar.classList.toggle('collapsed');
            content.classList.toggle('collapsed');
        });
        
        toggleSidebarMobile.addEventListener('click', () => {
            sidebar.classList.toggle('collapsed');
        });
        
        window.addEventListener('resize', adjustSidebarForScreenSize);
        window.addEventListener('load', adjustSidebarForScreenSize);
        </script>

	
        <script>
            <?php $ctrl->renderJS(); ?>
        </script>

</body>
</html>



