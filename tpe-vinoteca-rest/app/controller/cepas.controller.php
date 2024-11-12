<?php
require_once 'app/model/cepas.model.php';
require_once 'app/view/json.view.php';

class cepascontroller{
    private $model;
    private $view;

    public function __construct(){
        $this->model = new cepasmodel;
        $this->view = new jsonview;

    }

    public function getAll($request, $response){
        $cepas= $this-> model-> getcepas();

        return $this->view->response($cepas);

    }

    public function getcepa($request, $response) {
             $id = $request->params->id;
    
             $cepaID = $this->model->getcepaindividual($id);
    
            if(!$cepaID) {
                return $this->view->response("la cepa con el id=$id no existe", 404);
                }
    
            return $this->view->response($cepaID);
        }
    
        public function deletecepas($request, $response) {
            $id = $request->params->id;
    
            $cepa = $this->model->getcepaindividual($id);
    
            if (!$cepa) {
                return $this->view->response("La cepa con el id=$id no existe", 404);
            }
    
            $this->model->eliminarcepa($id);
            $this->view->response("La cepa con el id=$id se eliminó con éxito");
        }
        //funcion crear
        public function createcepas($request, $response) {
         
            if (empty($request->body->nombre_cepa) || empty($request->body->aroma) || empty($request->body->maridaje) || empty($request->body->textura)) {
                return $this->view->response('Faltan completar datos', 400);
            }
    
            $nombre_cepa = $request->body->nombre_cepa;       
            $aroma = $request->body->aroma;
            $maridaje = $request->body->maridaje;
            $textura = $request->body->textura;              

            $id = $this->model->insertcepa($nombre_cepa, $aroma, $maridaje, $textura);
    
            if (!$id) {
                return $this->view->response("Error al insertar la cepa", 500);
            }

            $cepaid = $this->model->getcepaindividual($id);
            return $this->view->response($cepaid, 201);
        }
    
        public function updatecepas($request, $response) {
            $id = $request->params->id;
    
            $cepa = $this->model->getcepaindividual($id);
            if (!$cepa) {
                return $this->view->response("la cepa con el id=$id no existe", 404);
            }

             if (empty($request->body->nombre_cepa) || empty($request->body->aroma) || empty($request->body->maridaje) || empty($request->body->textura)) {
                return $this->view->response('Faltan completar datos', 400);
            }

            $nombre_cepa = $request->body->nombre_cepa;       
            $aroma = $request->body->aroma;
            $maridaje = $request->body->maridaje;
            $textura = $request->body->textura;          
            $id_cepa = $request->body->id_cepa;   

            $this->model->updatecepas($nombre_cepa, $aroma, $maridaje, $textura, $id_cepa);
    
            $cepa = $this->model->getcepaindividual($id);
            $this->view->response('El vino con id='.$id.' ha sido modificado.', 200);
            $this->view->response($cepa, 200);
        }

    

}