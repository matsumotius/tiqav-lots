<?php
App::uses('AppController', 'Controller');
App::uses('TiqavService', 'Service');

class LotsController extends AppController {

    public $name       = 'Lots';
    public $autoRender = false;
    public $uses       = array('Lot');

    public function index() {
        if ($this->request->is('post')) {
            $this->post($this->request->name);
        } else {
            $this->set('lots', $this->Lot->getLatest(5));
            $this->render('index');
        }
    }

    public function lot() {
        $id = $this->params->id;
        if ($this->request->is('post')) {
            $this->update($id, $this->request->data('name'));
        } else {
            $this->findById($id);
        }
    }

    private function findById($id) {
        $lot = $this->Lot->findById($id);
        if ($lot) {
            $this->set('lot', $lot);
            $this->set('user', $this->findSession($id));
            $this->render('lot');
        } else {
            $this->error(404, 'NotFound');
        }
    }

    private function post($name) {
        $tiqav = new TiqavService();
        $query = array(
            'name'       => $name,  
            'first'      => $tiqav->getRand(),  
            'second'     => $tiqav->getRand(),
            'created_at' => date('Y-m-j H:i:s')
        );
        $this->Lot->create($query);
        if ($this->Lot->save()) {
            $id = $this->Lot->getLastInsertID();
            $this->addSession($id, $query);
            $this->redirect(sprintf('/lots/%d', $id), 200);
        } else {
            $this->error();
        }
    }

    private function addSession($id, $query) {
        $user_lots = $this->Session->read('lots');
        $user_lots[$id] = $query;
        $this->Session->write('lots', $user_lots);
    }

    private function findSession($id) {
        $user_lots = $this->Session->read('lots');
        return $user_lots[$id];
    }

    private function update($id, $name) {
        // check session
        if ($this->Lot->updateName($id, $name)) {
            $this->redirect(sprintf('/lots/%d', $id), 200);
        } else {
            $this->error();
        }
    }

    private function error($code = 500, $message = 'Internal Error') {
        $this->response->statusCode((int)$code);
        echo $message;
    }
}
