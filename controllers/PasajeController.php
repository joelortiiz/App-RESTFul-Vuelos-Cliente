<?php

class PasajeController {

    private $service;
    private $view;

    public function __construct() {
        
        $this->service = new PasajeService();
        $this->view = new PasajeView();
    }

    public function mostrar() {
        // Decodificar el JSON devuelto por la API
        $pasajesAll = json_decode($this->service->request_curl(), true);

        // Asignar los datos de registros1 a la variable $pasajes
        $pasajes = [];
        foreach ($pasajesAll["registros1"] as $pasaje) {
            $pasajes[] = new Pasaje($pasaje['idpasaje'], $pasaje['nombre'], $pasaje['identificador'], $pasaje['numasiento'], $pasaje['clase'], $pasaje['pvp']);
        }

        // Asignar los datos de registros2 a la variable $selectPasajero
        $selectPasajero = [];
        foreach ($pasajesAll["registros2"] as $pasaje) {
            $selectPasajero[] = new Pasaje($pasaje['nombre'], $pasaje['pasajerocod'], $pasaje['nombre'], $pasaje['nombre'], $pasaje['nombre'], $pasaje['nombre']);
        }

        // Asignar los datos de registros3 a la variable $selectIdentificador
        $selectIdentificador = [];
        foreach ($pasajesAll["registros3"] as $pasaje) {
            $selectIdentificador[] = new Pasaje($pasaje['identificador'], $pasaje['identificador'], $pasaje['identificador'], $pasaje['identificador'], $pasaje['identificador'], $pasaje['identificador']);
        }

        // Pasar los objetos a la vista
        $this->view->mostrarPasajes($pasajes, $selectPasajero, $selectIdentificador);
    }

    public function mostrarDetallesPasaje() {
        $id = $_GET['id'];

        $pasajeObj = $this->service->request_uno($id);

        // Crear un nuevo objeto Pasaje con los valores adecuados
        $pasajeOne = new Pasaje(
                $pasajeObj->idpasaje,
                $pasajeObj->pasajerocod,
                $pasajeObj->identificador,
                $pasajeObj->numasiento,
                $pasajeObj->clase,
                $pasajeObj->pvp
        );

        // Pasar el objeto Pasaje a la vista
        $this->view->mostrarDetallePasaje($pasajeOne);
    }

    public function borrarPasaje() {
        $id = $_GET['id'];

        $borrar = $this->service->request_delete($id);
        
        if($borrar == true) {
                    header('Location: ./index.php?controller=Pasaje&action=mostrar&delete=success');
        }
    }
 public function mostrarInsertar() {

        $pasajesAll = json_decode($this->service->request_curl(), true);

        // Obtener datos para los select
        $selectPasajero = [];
        foreach ($pasajesAll["registros2"] as $pasaje) {
            $selectPasajero[] = new Pasaje($pasaje['nombre'], $pasaje['pasajerocod'], $pasaje['nombre'], $pasaje['nombre'], $pasaje['nombre'], $pasaje['nombre']);
        }

        $selectIdentificador = [];
        foreach ($pasajesAll["registros3"] as $pasaje) {
            $selectIdentificador[] = new Pasaje($pasaje['identificador'], $pasaje['aeropuertoorigen'], $pasaje['aeropuertodestino'], $pasaje['identificador'], $pasaje['identificador'], $pasaje['identificador']);
        }

        // Pasar datos a la vista
        $this->view->mostrarNuevoPasaje($selectPasajero, $selectIdentificador);
    }
    public function insertarPasaje() {

        $pasajerocod = $_POST['pasajero'];
        $identificador = $_POST['identificador'];
        $numasiento = $_POST['numAsiento'];
        $clase = $_POST['clase'];
        $pvp = $_POST['pvp'];

        $result = $this->service->request_post($pasajerocod, $identificador, $numasiento, $clase, $pvp);

        // Construir la URL base
        $baseURL = "./index.php?controller=Pasaje&action=mostrar";

        if ($result === true) {
            header('Location: index.php?controller=Pasaje&action=mostrar&id=' . $_GET['id']. '&check=true');
        } elseif (is_string($result)) {
            // Si el resultado es una cadena, significa que hubo un error personalizado
            header('Location: "./index.php?controller=Pasaje&action=mostrar&id=' . $_GET['id']. '&check=false&error=' . urlencode($result));
        }
    }

    public function mostrarActualizarPasaje() {
        
        // Obtenemos los datos del formulario
        $idpasaje = $_POST['idpasaje'];
        $pasajerocod = $_POST['pasajerocod'];
        $identificador = $_POST['identi'];
        $numasiento = $_POST['Nasiento'];
        $clase = $_POST['clase'];
        $pvp = $_POST['pvp'];


           $pasajes = json_decode($this->service->request_curl(), true);

        // Cargamos datos que aparecerán en el select
        $datosPasajero = [];
        foreach ($pasajes["registros2"] as $pasaje) {
            $datosPasajero[] = new Pasaje($pasaje['nombre'], $pasaje['pasajerocod'], $pasaje['nombre'], $pasaje['nombre'], $pasaje['nombre'], $pasaje['nombre']);
        }

        $datosIdent = [];
        
        foreach ($pasajes["registros3"] as $pasaje) {
            $datosIdent[] = new Pasaje($pasaje['identificador'], $pasaje['aeropuertoorigen'], $pasaje['aeropuertodestino'], $pasaje['identificador'], $pasaje['identificador'], $pasaje['identificador']);
        }
       
        // Pasar datos a la vista
        $this->view->mostrarActualizarPasaje($idpasaje, $pasajerocod, $identificador, $numasiento, $clase, $pvp, $datosPasajero, $datosIdent);
    }

    public function modificarPasaje() {
        
        $id = $_GET['id'];
        $codpasajero = $_POST['pasajero'];
        $identificador = $_POST['identificador'];
        $numasiento = $_POST['numAsiento'];
        $clase = $_POST['clase'];
        $pvp = $_POST['pvp'];

        // Llamada a la función request_put para actualizar un pasaje
        $result = $this->service->request_put($id, $codpasajero, $identificador, $numasiento, $clase, $pvp);

        
        if ($result == 1 ) {
                header('Location: index.php?controller=Pasaje&action=mostrar&actualizar=true');
                exit();
            } else {
                header('Location: index.php?controller=Pasaje&action=mostrar&mensajeError='.$actualizacion);
                exit();
            }

        
        
        if ($result === true) {
            header('Location: index.php?controller=Pasaje&action=mostrar&id=' . $_GET['id']. '&comprobar=true');
        } elseif (is_string($result)) {
            // Si el resultado es una cadena, significa que hubo un error personalizado
            header('Location: "./index.php?controller=Pasaje&action=mostrar&id=' . $_GET['id']. '&comprobar=false&error=' . urlencode($result));
        }
    }
}
