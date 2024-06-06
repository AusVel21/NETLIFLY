<?php
    class usernameController{
        private $model;
        public function __construct()
        {
            require_once __DIR__"../model/usernameModel.php";
            $this->model = new usernameModel();
        }
        public function guardar($nombre, $direccion, $telefono, $correo_electronico, $password){
            $id = $this->model->insertar($nombre, $direccion, $telefono, $correo_electronico, $password);
            return ($id!=false) ? header("Location:show.php?id=".$id) : header("Location:create.php");
        }
        public function show($id){
            return ($this->model->show($id) != false) ? $this->model->show($id) : header("Location:index.php");
        }
        public function index(){
            return ($this->model->index()) ? $this->model->index() : false;
        }
        public function update($id, $nombre, $direccion, $telefono, $correo_electronico){
            return ($this->model->update($id, $nombre, $direccion, $telefono, $correo_electronico) != false) ? header("Location:show.php?id=".$id) : header("Location:index.php");
        }
        public function delete($id){
            return ($this->model->delete($id)) ? header("Location:head.php") : header("Location:show.php?id=".$id) ;
        }
        public function updateEstado($id, $estado){
            return ($this->model->updateEstado($id, $estado)) ? header("Location:head.php") : header("Location:updateEstado.php") ;
        }
    }

?>
