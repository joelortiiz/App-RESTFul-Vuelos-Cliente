<?php

class PasajeView {

    public function mostrarPasajes($pasajes, $selectPasajero, $selectIdentificador) {
        ?>
        <!-- INICIO HEADER -->
        <div class="container bg-white rounded p-5 mt-3">
            <h1 class="text-center mt-3">Vista de los Pasajes</h1>
            <!-- Navbar -->
            <nav class="navbar d-flex justify-content-around  align-items-center  bg-primary">
                <ul class="d-flex justify-content-around  align-items-center list-unstyled fs-2">
                    <li class="d-flex justify-content-around  align-items-center  nav-item">
                        <a class="nav-link m-4 text-warning" href="./index.php?controller=Vuelo&action=mostrar">Vuelos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link m-4 text-light" href="./index.php?controller=Pasaje&action=mostrar">Pasajes</a>
                    </li>
                </ul>
            </nav>
            <div class="container text-center rounded p-5 m-4"> 
            <a href="./index.php?controller=Pasaje&action=mostrarInsertar" class="btn btn-primary">Añadir Nuevo Pasaje</a>
            <?php
            if (isset($_GET["check"])) {
                if ($_GET["check"] == 'true') {
                    ?>
                    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                        <strong>Pasaje creado correctomente</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                } else {
                    $error_message;
                    if (isset($_GET["error"])) {
                        $error_message = urldecode($_GET["error"]);
                    }
                    ?>
                    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                        <strong><?php echo $error_message; ?></strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                }
            }
            if (isset($_GET["delete"])) {
                if ($_GET["delete"] == "true") {
                    ?>
                    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                        <strong>Pasaje borrado correctamente</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                } else {
                    ?>
                    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                        <strong>El pasaje que quieres borrar no existe</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                }
            }
            if (isset($_GET["mody"])) {
                if ($_GET["mody"] == 'true') {
                    ?>
                    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                        <strong>Pasaje modificado </strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                } else {
                    $error_message;
                    if (isset($_GET["error"])) {
                        $error_message = urldecode($_GET["error"]);
                    }
                    ?>
                    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                        <strong><?php echo $error_message; ?></strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                }
            }
            ?>
            <!-- TABLA INICIO -->
            <table class="table mt-4 text-center verticalalign-middle">
                <thead>
                    <tr class="text-center">
                        <th>Id Pasaje</th>
                        <th>Código de Pasajero</th>
                        <th>Identificador</th>
                        <th>Número de asiento</th>
                        <th>PVP</th>

                        <th>Clase</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($pasajes as $pasaje) {
                        ?>
                        <tr class="text-center">
                            <td><?php echo $pasaje->getIdpasaje(); ?></td>
                            <td><?php echo $pasaje->getPasajerocod(); ?></td>
                            <td><?php echo $pasaje->getIdentificador(); ?></td>
                            <td><?php echo $pasaje->getNumasiento(); ?></td>
                            <td><?php echo $pasaje->getClase(); ?></td>
                            <td><?php echo $pasaje->getPvp(); ?>€</td>
                            <td>

                                <a href="./index.php?controller=Pasaje&action=mostrarDetallesPasaje&id=<?php echo $pasaje->getIdpasaje(); ?>" class="btn btn-danger">Ver detalles</a>
                                <!--  
                               <form class="row g-3" action="./index.php?controller=Pasaje&action=mostrarDetallesPasaje&id=<?php echo $pasaje->getIdpasaje(); ?>" method="GET">
                                   <button class="btn btn-success text-light" type="submit">Ver detalles</button>
                               </form>
                                -->

                            </td>
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

    public function mostrarDetallePasaje($pasaje) {
        ?>
        <!-- Contenedor principal -->
        <div class="container bg-warning p-5 mt-3">
            <!-- Título de la sección -->
            <h1 class="text-center mt-3">Detalles del Pasaje ➜ <?php echo $pasaje->getIdpasaje(); ?></h1>            
            <!-- Tabla para mostrar los detalles del pasaje -->
            <table class="table text-center m-5">
                <thead>
                    <tr>
                        <th>Código del Pasajero</th>
                        <th>Identificador</th>
                        <th>Número de Asiento</th>
                        <th>Precio</th>
                        <th>Clase</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <!-- Se muestran los detalles del pasaje -->
                        <td><?php echo $pasaje->getPasajerocod(); ?></td>
                        <td><?php echo $pasaje->getIdentificador(); ?></td>
                        <td><?php echo $pasaje->getNumasiento(); ?></td>
                        <td><?php echo $pasaje->getPvp(); ?>€</td>
                        <td><?php echo $pasaje->getClase(); ?></td>
                    </tr>
                </tbody>
            </table>
            <!-- Botones de acción -->
            <div class="d-flex justify-content-center">

                <!-- Botón para abrir el modal de confirmación de eliminación -->
                <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">

                    Eliminar
                </a>
                <!-- Botón para volver a la página anterior -->
                <a href="./index.php?controller=Pasaje&action=mostrar" class="btn btn-secondary me-2">
                    Volver
                </a>
                <!-- Formulario para modificar el pasaje -->
                <form action="./index.php?controller=Pasaje&action=mostrarActualizarPasaje" method="POST">
                    <!-- Campos ocultos con los datos del pasaje -->
                    <input type="hidden" name="idpasaje" value="<?php echo $pasaje->getIdpasaje(); ?>">
                    <input type="hidden" name="pasajerocod" value="<?php echo $pasaje->getPasajerocod(); ?>">
                    <input type="hidden" name="identi" value="<?php echo $pasaje->getIdentificador(); ?>">
                    <input type="hidden" name="Nasiento" value="<?php echo $pasaje->getNumasiento(); ?>">
                    <input type="hidden" name="clase" value="<?php echo $pasaje->getClase(); ?>">
                    <input type="hidden" name="pvp" value="<?php echo $pasaje->getPvp(); ?>">
                    <!-- Botón para enviar el formulario y modificar el pasaje -->
                    <button class="btn btn-success ms-2">
                        Modificar
                    </button>
                </form>                                
            </div>

            <!-- Modal de confirmación de eliminación -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title" id="exampleModalLabel">Eliminar Pasaje</h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Estás seguro de eliminar el pasaje?</p>
                        </div>
                        <div class="modal-footer">
                            <!-- Botón para cancelar la eliminación -->
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <!-- Botón para eliminar el pasaje -->
                            <a href="./index.php?controller=Pasaje&action=borrarPasaje&id=<?php echo $pasaje->getIdpasaje(); ?>" class="btn btn-danger">Eliminar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }



public function mostrarActualizarPasaje($idPasaje, $codigoPasajero, $identificador, $numAsiento, $clase, $precio, $listaPasajeros, $listaIdentificadores) {
?>
   <div class="container">
    <h1 class="text-center mt-3">Editar Información del Pasaje <?php echo $idPasaje ?></h1>
    <div class="row">
        <div class="col-md-6">
            <form action="./index.php?controller=Pasaje&action=modificarPasaje&id=<?php echo $idPasaje ?>" method="POST">
                <div class="mb-3">
                    <label for="pasajero" class="form-label">Seleccionar Pasajero:</label>
                    <select id="pasajero" name="pasajero" class="form-select">
                        <?php foreach ($listaPasajeros as $pasajero): ?>
                            <?php $selected = ($pasajero->getPasajerocod() == $codigoPasajero) ? "selected" : ""; ?>
                            <option value="<?php echo $pasajero->getPasajerocod(); ?>" <?php echo $selected; ?>>
                                <?php echo $pasajero->getPasajerocod(); ?> - <?php echo $pasajero->getIdpasaje(); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="identificador" class="form-label">Seleccionar Identificador:</label>
                    <select id="identificador" name="identificador" class="form-select">
                        <?php foreach ($listaIdentificadores as $ident): ?>
                            <?php $selected = ($ident->getIdpasaje() == $identificador) ? "selected" : ""; ?>
                            <option value="<?php echo $ident->getIdpasaje(); ?>" <?php echo $selected; ?>>
                                <?php echo $ident->getIdpasaje(); ?> - <?php echo $ident->getPasajerocod(); ?> - <?php echo $ident->getIdentificador(); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="numAsiento" class="form-label">Número de Asiento</label>
                    <input type="number" id="numAsiento" name="numAsiento" class="form-control" required min="1" max="200" value=<?php echo $numAsiento ?>>
                </div>
                <div class="mb-3">
                    <label for="pvp" class="form-label">PVP</label>
                    <input type="number" id="pvp" name="pvp" class="form-control" required min="1" value=<?php echo $precio ?>>
                </div>
                <div class="mb-3">
                    <label>Seleccionar Clase:</label><br>
                    <div class="form-check">
                        <input type="radio" id="turista" name="clase" value="TURISTA" class="form-check-input" <?php if ($clase === 'TURISTA') echo 'checked'; ?>>
                        <label for="turista" class="form-check-label">TURISTA</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" id="primera" name="clase" value="PRIMERA" class="form-check-input" <?php if ($clase === 'PRIMERA') echo 'checked'; ?>>
                        <label for="primera" class="form-check-label">PRIMERA</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" id="business" name="clase" value="BUSINESS" class="form-check-input" <?php if ($clase === 'BUSINESS') echo 'checked'; ?>>
                        <label for="business" class="form-check-label">BUSINESS</label>
                    </div>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Modificar</button>
                </div>
            </form>
        </div>
    </div>
    <form action="./index.php?controller=Pasaje&action=mostrarUnPasaje" method="POST">
        <input type="hidden" name="id" value="<?php echo $idPasaje ?>">
        <button type="submit" class="btn btn-secondary">Volver</button>
    </form>
</div>

<?php
    // Fin del contenedor
}

public function mostrarNuevoPasaje($listaPasajeros, $listaIdentificadores) {
    ?>
    <div class="container">
        <h1 class="text-center mt-3">Agregar Nuevo Pasaje</h1>
        <div class="row justify-content-center">
            <form action="./index.php?controller=Pasaje&action=insertarPasaje" method="POST" class="col-lg-6 col-md-8 col-sm-10">
                <div class="mb-3">
                    <label for="selectPasajero" class="form-label">Seleccionar Pasajero:</label>
                    <select name="pasajero" id="selectPasajero" class="form-select" required>
                        <?php foreach ($listaPasajeros as $pasajero): ?>
                            <option value="<?php echo $pasajero->getPasajerocod(); ?>"><?php echo $pasajero->getPasajerocod(); ?> - <?php echo $pasajero->getIdpasaje(); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="selectIdentificador" class="form-label">Seleccionar Identificador:</label>
                    <select name="identificador" id="selectIdentificador" class="form-select" required>
                        <?php foreach ($listaIdentificadores as $identificador): ?>
                            <option value="<?php echo $identificador->getIdpasaje(); ?>"><?php echo $identificador->getIdpasaje(); ?> - <?php echo $identificador->getPasajerocod(); ?> - <?php echo $identificador->getIdentificador(); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="numAsiento" class="form-label">Número de Asiento:</label>
                    <input type="number" id="numAsiento" name="numAsiento" class="form-control" required min="1" max="200">
                </div>
                <div class="mb-3">
                    <label for="pvp" class="form-label">Precio (PVP):</label>
                    <input type="number" id="pvp" name="pvp" class="form-control" required min="1">
                </div>
                <div class="mb-3">
                    <label class="form-label">Clase:</label>
                    <div class="form-check">
                        <input type="radio" name="clase" value="TURISTA" id="claseTurista" class="form-check-input" checked>
                        <label for="claseTurista" class="form-check-label">TURISTA</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="clase" value="PRIMERA" id="clasePrimera" class="form-check-input">
                        <label for="clasePrimera" class="form-check-label">PRIMERA</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="clase" value="BUSINESS" id="claseBusiness" class="form-check-input">
                        <label for="claseBusiness" class="form-check-label">BUSINESS</label>
                    </div>
                </div>
                <div class="mb-3">
                    <a href="./index.php?controller=Pasaje&action=mostrar" class="btn btn-secondary me-3">Volver</a>
                    <button type="submit" class="btn btn-primary">Insertar</button>                    
                </div>
            </form>
        </div>
    </div>
    <?php
    // Fin del contenedor
}


}
