
<button class="btn btn-outline-dark d-md-none" id="toggleSidebarMobile">
    ☰
</button>
<?php 
        if($this->id_perfil==2):?><!-- //perfil profesor -->
    <div class="container-fluid">
        <nav class="navbar navbar-light bg-light">
            <span class="navbar-brand">BIENVENIDO PROFESOR.</span>
        </nav>
        
        <div class="py-4">
            <div class="row justify-content-center">
                <h1 class="text-center display-4 font-weight-bold my-4 text-primary">
                Este es un espacio para enseñar, toma las siguientes reflexiones y sé el o la mejor docente.
                </h1><br>
                
                <div class="col-md-6">
                    <!-- Card 1 -->
                    <div class="card mb-3">
                        <div class="card-body">
                            <blockquote class="blockquote mb-0">
                                <p>"El arte supremo del maestro consiste en despertar el goce de la expresión creativa y del conocimiento."</p>
                                <footer class="blockquote-footer">Albert Einstein</footer>
                            </blockquote>
                        </div>
                    </div>
                    <!-- Card 2 -->
                    <div class="card mb-3">
                        <div class="card-body">
                            <blockquote class="blockquote mb-0">
                                <p>"Un buen maestro puede inspirar esperanza, encender la imaginación y cultivar el amor por el aprendizaje."</p>
                                <footer class="blockquote-footer">Brad Henry</footer>
                            </blockquote>
                        </div>
                    </div>
                    <!-- Card 3 -->
                    <div class="card mb-3">
                        <div class="card-body">
                            <blockquote class="blockquote mb-0">
                                <p>"Educar no es dar carrera para vivir, sino templar el alma para las dificultades de la vida."</p>
                                <footer class="blockquote-footer">Pitagoras</footer>
                            </blockquote>
                        </div>
                    </div>
                            <!-- Card 4 (New) -->
                    <div class="card mb-3">
                        <div class="card-body">
                            <blockquote class="blockquote mb-0">
                                <p>"El maestro deja una huella para la eternidad; nunca puede decir cuándo se detiene su influencia."</p>
                                <footer class="blockquote-footer">Henry Adams</footer>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        
    </div>
        <?php endif?>
        <?php 
        if($this->id_perfil==3):?><!-- //perfil alumno -->

<div class="container-fluid">
        <nav class="navbar navbar-light bg-light">
            <span class="navbar-brand">BIENVENIDO ALUMNO.</span>
        </nav>
        <div class="py-4">
        <div class="row justify-content-center">
            <h1 class="text-center display-4 font-weight-bold my-4 text-primary">
                Bienvenido a tu espacio de aprendizaje. Inspírate y conviértete en la mejor versión de ti mismo.
            </h1>
            <div class="col-md-6">
                <!-- Card 1 -->
                <div class="card mb-3">
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <p>"El aprendizaje nunca agota la mente."</p>
                            <footer class="blockquote-footer">Leonardo da Vinci</footer>
                        </blockquote>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="card mb-3">
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <p>"La educación es el arma más poderosa que puedes usar para cambiar el mundo."</p>
                            <footer class="blockquote-footer">Nelson Mandela</footer>
                        </blockquote>
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="card mb-3">
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <p>"La educación no es preparación para la vida; la educación es la vida misma."</p>
                            <footer class="blockquote-footer">John Dewey</footer>
                        </blockquote>
                    </div>
                </div>
                <!-- Card 4 -->
                <div class="card mb-3">
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <p>"El éxito no se mide por los logros, sino por los desafíos que superas."</p>
                            <footer class="blockquote-footer">Desconocido</footer>
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>
    </div>   


</div>
        <?php endif?>
        
