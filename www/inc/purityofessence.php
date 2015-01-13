<?php require_once 'HTMLPurifier.auto.php';
$config = HTMLPurifier_Config::createDefault();
$purifier = new HTMLPurifier($config);
#print_r($_GET);
foreach ($_GET as $key => $value) {
  if (gettype($value) != "array") {
    $_GET[$key] = $purifier->purify($value);
    # print '$key: '.$key.' $value: '.$value;
  } else {
    foreach ($value as $key1 => $value1) {
      $value[$key1] = $purifier->purify($value1);
    }
  }
}
?>

