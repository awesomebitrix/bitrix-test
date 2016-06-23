<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die(); ?>

<div class="container">
        <div class="row">
                <? foreach ($arResult["data"]['images'] as $image): ?>
                        <div class="col-md-4"><a href="?show=edit&id=<?= $image['ID']?>"><img src="<?= $image['UF_DATA_URI']?>" alt="" class="img-thumbnail"></a></div>
                <? endforeach; ?>
        </div>
</div>

