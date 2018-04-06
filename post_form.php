<?php
if( ini_get('allow_url_fopen') ) {
        echo 'allow_url_fopen is enabled. file_get_contents should work well';
    } else {
        echo 'allow_url_fopen is disabled. file_get_contents would not work';
    }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
if (!empty($_POST['name']) && !empty($_POST['phone'])){
  if (isset($_POST['name'])) {
    if (!empty($_POST['name'])){
  $name = strip_tags($_POST['name']);
  $nameFieldset = "Имя пославшего: ";
  }
}

if (isset($_POST['phone'])) {
  if (!empty($_POST['phone'])){
  $phone = strip_tags($_POST['phone']);
  $phoneFieldset = "Телефон: ";
  }
}

if (!empty($_POST['name2']) && !empty($_POST['phone2'])){
  if (isset($_POST['name2'])) {
    if (!empty($_POST['name2'])){
  $name = strip_tags($_POST['name2']);
  $nameFieldset = "Имя пославшего2: ";
  }
}

if (isset($_POST['phone2'])) {
  if (!empty($_POST['phone2'])){
  $phone = strip_tags($_POST['phone2']);
  $phoneFieldset = "Телефон2: ";
  }
}

$token = "567654300:AAEbiO3kpQ_vMC1E-YqjSX8OtnsE8BWASLI";
$chat_id = "-294056907";
$arr = array(
  $nameFieldset => $name,
  $phoneFieldset => $phone,
  $nameFieldset2 => $name2,
  $phoneFieldset2 => $phone2
);
foreach($arr as $key => $value) {
  $txt .= "<b>".$key."</b> ".$value."%0A";
};
$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");
if ($sendToTelegram) {

  echo '<p class="success">Спасибо за отправку вашего сообщения!</p>';
    return true;
} else {
  echo '<p class="fail"><b>Ошибка. Сообщение не отправлено!</b></p>';
}
} else {
  echo '<p class="fail">Ошибка. Вы заполнили не все обязательные поля!</p>';
}
} else {
header ("Location: /");
}

?>
