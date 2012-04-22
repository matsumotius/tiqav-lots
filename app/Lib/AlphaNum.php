<?php
class AlphaNum {

  static public $table = array(
    '0','1','2','3','4','5','6','7','8','9',
    'a','b','c','d','e','f','g','h','i','j',
    'k','l','m','n','o','p','q','r','s','t',
    'u','v','w','x','y','z',
    'A','B','C','D','E','F','G','H','I','J',
    'K','L','M','N','O','P','Q','R','S','T',
    'U','V','W','X','Y','Z'
  );

  /**
   *  decode alphanum string
   */
  static public function dec($str = '') {
    $num = 0;
    $enc_array = array_reverse(str_split($str));
    foreach ($enc_array as $digit => $value) {
      $index = array_search($value, self::$table);
      if ($index < 0) {
        throw new Exception('Invalid String.');
      }
      $base = pow(count(self::$table), $digit);
      $num += $base * $index;
    }
    return $num;
  }

  /**
   *  encode number
   */
  static public function enc($num) {
    if(false === is_numeric($num)) {
      throw new Exception('Invalid Number.');
    }
    $str = '';
    $len = count(self::$table);
    for (; $num > 0; $num = floor($num/$len)) {
      $str = self::$table[$num%$len] . $str;
    }
    return $str == '' ? '0' : $str;
  }

}
