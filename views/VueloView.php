<?php

class VueloView {

    public function mostrarVuelos($vuelosAll) {
        ?>
      
        <div class="container bg-white rounded p-5 mt-3">
            <h1 class="text-center mt-3">Todos los Vuelos</h1>
               <!-- Navbar -->
            <nav class="navbar d-flex justify-content-around  align-items-center  bg-primary">
                <ul class="d-flex justify-content-around  align-items-center list-unstyled fs-2">
                     <li class="d-flex justify-content-around  align-items-center  nav-item">
                                <a class="nav-link m-4 text-light" href="./index.php?controller=Vuelo&action=mostrar">Vuelos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link m-4 text-warning" href="./index.php?controller=Pasaje&action=mostrar">Pasajes</a>
                            </li>
                </ul>
            </nav>
            <!-- Navbar -->
            <!-- INICIO TABLA -->
            <table class="table mt-4">
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
                            <td><?php
                                $pasajeros = $vuelo->getNumPasajeros();
                                if ($pasajeros <= 0) {
                                    echo 'Ninguno';
                                } else {
                                    echo $pasajeros;
                                };
                                ?></td>
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
