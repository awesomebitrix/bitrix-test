    <? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); ?>
    
    <script src="/bitrix/components/brainkit/draw/media/draw.js"></script>
    <link rel="stylesheet" href="/bitrix/components/brainkit/draw/media/style.css">
    
    <?
    
    if ($_GET["show"] === "edit") {
   
        $APPLICATION->IncludeComponent(
            "brainkit:draw.edit",
            "",
            Array(
//                "DATA_ARR" => $arResult["data"]
            ),
            $component
        );
        
    } else {
        
        $APPLICATION->IncludeComponent(
            "brainkit:draw.list",
            "",
            Array(
//                "DATA_ARR" => $arResult["data"]
            ),
            $component
        );
    }
