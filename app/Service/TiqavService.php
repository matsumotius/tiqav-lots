<?php
App::import('Lib', 'AlphaNum');

class TiqavService {
    static public $limit = 3844; // 62^2

    public function getRand() {
        return AlphaNum::enc(rand(1, self::$limit));
    }
}
