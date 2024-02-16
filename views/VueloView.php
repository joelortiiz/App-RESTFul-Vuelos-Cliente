<?php

class VueloView {

    public function mostrarVuelos($vuelosAll) {
        ?>
        <!-- INICIO HEADER -->
        <header>
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-nav">
                <div class="container">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto align-items-center">
                            <li class="nav-item">
                                <a class="nav-link mx-2" href="./index.php?controller=Vuelo&action=mostrar"><i class="fa-solid fa-plane pe-2"></i>Vuelos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mx-2" href="./index.php?controller=Pasaje&action=mostrar"><i class="fa-solid fa-ticket pe-2"></i>Pasajes</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Navbar -->
        </header>
        <!-- FIN HEADER -->
        <div class="container bg-white rounded p-5 mt-3">
            <h1 class="text-center mt-3">Vuelos</h1>
            <!-- INICIO TABLA -->
            <table class="table mt-5">
                <thead>
                    <tr class="text-center">
                        <th>Identificador</th>
                        <th>Aeropuerto Origen</th>
                        <th>Nombre Aeropuerto Origen</th>
                        <th>Pais Origen</th>
                        <th>Aeropuerto Destino</th>
                        <th>Nombre Aeropuerto Destino</th>
                        <th>Pais Destino</th>
                        <th>Tipo de Vuelo</th>
                        <th>Número pasajeros</th>
                    </tr>
                    
                </thead>
                <tbody>
                    <?php
                    foreach ($vuelosAll as $vuelo) {
                        ?>
                    <tr class="text-center">
                            <td><?php echo $vuelo->getIdentificador(); ?></td>
                            <td><?php echo $vuelo->getAeropuertoorigen(); ?></td>
                            <td><?php echo $vuelo->getNombreorigen(); ?></td>
                            <td><?php echo $vuelo->getPaisorigen(); ?></td>
                            <td><?php echo $vuelo->getAeropuertodestino(); ?></td>
                            <td><?php echo $vuelo->getNombredestino(); ?></td>
                            <td><?php echo $vuelo->getPaisdestino(); ?></td>
                            <td><?php echo $vuelo->getTipovuelo(); ?></td>
                            <td><?php echo $vuelo->getNumPasajeros(); ?></td>



                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
            <!-- FIN TABLA -->
        </div>
        <?php
        // Fin del contenedor
    }
}
