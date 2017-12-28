<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="instagram">
    <div class="container">
        <div class="instagram__h">
            <h2 class="ttl-h2">Мы в Instagram</h2>
        </div>
        <div class="instagram__list">
            <div class="instagram__slider">
                <div class="swiper-wrapper">
                    <?foreach($arResult["ITEMS"] as $k=>$arItem):
                        $cnt = $k%6;
                        ?>
                    <?if($cnt==0):?>
                    <div class="swiper-slide">
                        <div class="instagram__gallery">
                    <?endif;?>
                            <a href="<?=$arItem["LINK"]?>" rel="nofollow" target="_blank" class="instagram__img" style="background-image:url('<?=$arItem["IMAGES"]["low_resolution"]?>');"></a>
                    <?if($cnt==5):?>
                        </div>
                    </div>
                    <?endif;?>
                    <?endforeach;?>
                </div>
            </div>
            <div class="swiper-button-next instagram__next"></div>
            <div class="swiper-button-prev instagram__prev"></div>
        </div>
        <!--end .instagram__list-->
    </div>
</div>
