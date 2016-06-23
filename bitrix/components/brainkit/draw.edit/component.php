<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

if (!empty($_GET["id"])) {
    $data['img'] = getDrawElem($_GET["id"]);
}

$arResult["data"] = $data;


//Проверка пароля, если пароль верен: tpl = image

$tpl = "password";
if ( password_verify($_POST["password"], $data['img']["UF_PASSWORD"]) || ($data['img']["UF_PASSWORD"] == "") ) {
    $tpl = "image";
}

$this->IncludeComponentTemplate($tpl);
