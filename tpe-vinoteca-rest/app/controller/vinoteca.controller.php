<?php
require_once 'app/model/vinoteca.model.php';
require_once 'app/view/json.view.php';

class vinotecaController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new vinotecaModel();
        $this->view = new JSONView();
    }

    // /api/vinos
    #aca deberia hacer alguna validacion?empty o isset o if(!)???
    public function getAll($request, $response) {
        $vinos= $this->model->getvinos();

        return $this->view->response($vinos);
    }
    


     // /api/vinos/:id
     public function getvino($request, $response) {
    // obtengo el id del vino desde la ruta
         $id = $request->params->id;

    // obtengo el vino de la DB
         $vinoID = $this->model->getvinoindividual($id);

        if(!$vinoID) {
            return $this->view->response("el vino con el id=$id no existe", 404);
            }

    // mando el vino a la vista
        return $this->view->response($vinoID);
    }

    public function deletevino($request, $response) {
        $id = $request->params->id;

        $vino = $this->model->getvinoindividual($id);

        if (!$vino) {
            return $this->view->response("el vinoo con el id=$id no existe", 404);
        }

        $this->model->eliminarvino($id);
        $this->view->response("el vino con el id=$id se eliminó con éxito");
    }
    //funcion crear
    public function createvino($request, $response) {
     

        // valido los datos
        if (empty($request->body->nombre_vino) || empty($request->body->tipo)) {
            return $this->view->response('Faltan completar datos', 400);
        }

        // obtengo los datos
        $nombre_vino = $request->body->nombre_vino;       
        $tipo = $request->body->tipo;              

        // inserto los datos
        $id = $this->model->insertvino($nombre_vino, $tipo);

        if (!$id) {
            return $this->view->response("Error al insertar el vino", 500);
        }

        // buena práctica es devolver el recurso insertado
        $vinoid = $this->model->getvinoindividual($id);
        return $this->view->response($vinoid, 201);
    }

    public function updatevino($request, $response) {
        $id = $request->params->id;

        // verifico que exista
        $vino = $this->model->getvinoindividual($id);
        if (!$vino) {
            return $this->view->response("el vino con el id=$id no existe", 404);
        }

         // valido los datos
         if (empty($request->body->nombre_vino) || empty($request->body->tipo)) {
            return $this->view->response('Faltan completar datos', 400);
        }

        // obtengo los datos
        $nombre_vino = $request->body->nombre_vino;       
        $tipo = $request->body->tipo;       
        

        // actualiza la tarea
        $this->model->updatevino($nombre_vino, $tipo);

        // obtengo la tarea modificada y la devuelvo en la respuesta
        $vino = $this->model->getvinoindividual($id);
        $this->view->response($vino, 200);
    }




}