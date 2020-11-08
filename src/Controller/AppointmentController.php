<?php 

namespace App\Controller;

use App\Core\View;
use App\Model\Appointment;
use phpDocumentor\Reflection\Location;
// require('src/Model/appointment.php');
// require('src/Core/View.php');

class AppointmentController {

    public function __construct()
    {
        if (isset($_GET) && isset($_GET["action"]) && ($_GET["action"] == "delete")){
            $id = $_GET["id"];
            $this->delete($id);
            return;
        }

        if (isset($_GET) && isset($_GET["action"]) && ($_GET["action"] == "create")){
            $this->create($_POST);
            return;
        }

        if (isset($_GET) && isset($_GET["action"]) && ($_GET["action"] == "upload")){
            $id = $_GET['id'];
            $this->upload($id);
            return;
        }

        if (isset($_GET) && isset($_GET["action"]) && ($_GET["action"] == "edit")){
            $id = $_GET['id'];
            $newData = $_POST;
            $this->edit($id, $newData);
            return;
        }

        return $this->index();
        
    }

    public function create(array $data)
    {
        $newAppointment = new Appointment($data['nombre'], $data['tema'], $data['descripcion']);
        $newAppointment->saveAppointment();

        $this->index();
    }

    public function delete($id){
        $appointment = new Appointment();
        // $rowToDelete = $appointment->findById($id);
        $appointment->deleteAppointment($id);
        
        $this->index();
    }
    public function upload($id){
        $appointment = Appointment::findById($id);
        new View("AppointmentEdit", [
            "appointment" => $appointment,
            ]);
    }

    public function edit($id, $newData){
        $appointment = new Appointment($newData['name'], $newData['topic'], $newData['description']);
        $appointment->editAppointment($id);

        $this->index();
    }

    public function index(): void
    {
        $appointment = new Appointment();
        $appointments = $appointment->showAllAppointments();
        
        new View("AppointmentList", [
            "appointments" => $appointments,
        ]);
    }

}

?>
