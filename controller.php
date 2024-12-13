<?php

    class productcontrol {
        private $view;
        private $model;

        public function __construct ($v, $m){
            $this->view = $v;
            $this->model = $m;
        }

        //read
        public function viewall (){
            $data = $this->model->selectall();
            $this->view->viewall2($data);
        }

        //create
        public function getdata ($item, $price){
            $this->model->savedata($item, $price);
        }

        public function edit ($id){
            $data = $this->model->edit($id);
            return $this->view->edit($data);
        }

        public function saveupdate ($id, $item, $price){
            $this->model->saveupdate($id, $item, $price);
        }

        public function deletee ($id){
            echo('succcc');
            $this->model->delete($id);
        }
    }

?>