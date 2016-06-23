<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

global $componentParams;
$componentParams = $arParams;


//***********Получение списка рисунков***********
function getDrawList() {

    if (CModule::IncludeModule('highloadblock')) {
        
        global $componentParams;
        $hl_block_draw_id = $componentParams["HL_BLOCK_DRAW_ID"];
        
        //Подготовка:
        $arHLBlock = Bitrix\Highloadblock\HighloadBlockTable::getById($hl_block_draw_id)->fetch();
        $obEntity = Bitrix\Highloadblock\HighloadBlockTable::compileEntity($arHLBlock);
        $strEntityDataClass = $obEntity->getDataClass();

        $rsData = $strEntityDataClass::getList(array(
                'select' => array('ID', 'UF_DATA_URI', 'UF_PASSWORD'),
                'order' => array('ID' => 'ASC'),
                'limit' => '50',
        ));

        while ($arItem = $rsData->Fetch()) {
            $data["images"][] = $arItem;
        }
        
        return $data;
        
    }
    
}


//***********Получение одного рисунка по id***********
function getDrawElem($id_elem) {
    
    if (CModule::IncludeModule('highloadblock')) {
        
        global $componentParams;
        $hl_block_draw_id = $componentParams["HL_BLOCK_DRAW_ID"];
        
        //Подготовка:
        $arHLBlock = Bitrix\Highloadblock\HighloadBlockTable::getById($hl_block_draw_id)->fetch();
        $obEntity = Bitrix\Highloadblock\HighloadBlockTable::compileEntity($arHLBlock);
        $strEntityDataClass = $obEntity->getDataClass();
        
        
        $row = $strEntityDataClass::getById($id_elem)->fetch();
        
        return $row;
        
    }
    
}


$componentPage = "template";

$this->IncludeComponentTemplate($componentPage);
