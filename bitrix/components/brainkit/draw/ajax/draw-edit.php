<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

//Подготовка:
if (CModule::IncludeModule('highloadblock')) {
   $arHLBlock = Bitrix\Highloadblock\HighloadBlockTable::getById(HL_BLOCK_DRAW_ID)->fetch();
   $obEntity = Bitrix\Highloadblock\HighloadBlockTable::compileEntity($arHLBlock);
   $strEntityDataClass = $obEntity->getDataClass();
}

//Обновление:
if (CModule::IncludeModule('highloadblock')) {
   $arElementFields = array(
      'UF_DATA_URI' => $_POST['image']
   );
   $obResult = $strEntityDataClass::update($_POST['id'], $arElementFields);
   $ID = $obResult->getID();
   $bSuccess = $obResult->isSuccess();
}