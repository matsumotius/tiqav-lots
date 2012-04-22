<?php
class Lot extends AppModel {

    public $name     = 'Lot';
    public $usetable = 'lots';

    public $validate = array(
        'name' => array(
            'rule' => array('maxlength', 16)
        )
    );

    public function getLatest($limit = 5) {
        $limit = (int) $limit;
        if (0 === $limit) return false;
        return $this->find('all', array(
            'order' => array('Lot.created_at', 'Lot.created_at DESC'),
            'limit' => $limit
        ));
    }

    public function updateName($id, $name) {
        return 'update_name';
    }
}
