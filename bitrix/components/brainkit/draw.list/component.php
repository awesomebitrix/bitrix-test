<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$data = getDrawList(); 

$arResult["data"] = $data;

$this->IncludeComponentTemplate();
