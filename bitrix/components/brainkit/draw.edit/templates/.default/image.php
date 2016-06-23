<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die(); ?>

<div class="container">
        <div class="row">
                <div class="center-canvas">
                        <div class="alert"></div>

                        <canvas id="canvasCreate" width="500" height="500"></canvas> 

                        <div class="tools-row">
                                <button id="clear_part" class="btn btn-default btn-xs">Ластик</button>
                                <button id="black-color" class="btn btn-default btn-xs active">Черный цвет</button>
                         </div>

                        <div class="form-group">
                                <? if (!$arResult["data"]['img']) : ?>
                                <label for="password">Укажите пароль для доступа к рисунку</label>
                                <input type="password" name="password" id="password" class="form-control">
                                <? endif ?> 
                        </div>

                        <button class="btn btn-success" id="save_canvas">Сохранить</button>   

                        <? if ($arResult["data"]['img']) : ?>
                        <div id="canvas-data" data-id="<?= $_GET["id"] ?>" style="display:none">
                        <?= $arResult["data"]['img']['UF_DATA_URI'] ?>
                        </div>   
                        <? endif ?>       
                </div>
        </div>
</div>
