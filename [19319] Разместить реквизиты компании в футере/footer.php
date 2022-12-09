<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();                        
if(\Bitrix\Main\Loader::includeSharewareModule("krayt.floor") == \Bitrix\Main\Loader::MODULE_DEMO_EXPIRED || 
   \Bitrix\Main\Loader::includeSharewareModule("krayt.floor") ==  \Bitrix\Main\Loader::MODULE_NOT_FOUND
    )
{ return false;}
$curPage = $APPLICATION->GetCurPage(true);
if ($curPage != SITE_DIR."index.php") {
?>    </div>
    </div>
<?}?>
</main>
<div class="product_card_fast modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog modal-dialog-centered product_card_wrp">
        <div class="modal-content">
            <div class="product_card__content">
                <div class="product_card">
                    <div class="product_row">
                        <div class="container_wrp">
                            <div id="exampleModal_content" class="clearfix">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="button" class="btn-close" data-dismiss="modal"></button>
        </div>
    </div>
</div>
<div class="modal fade user_form feedback-form" id="modalFeedback" tabindex="-1" role="dialog" aria-labelledby="modalFeedbackLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered user_form_wrp">
        <div class="modal-content">
            <?$APPLICATION->IncludeComponent("bitrix:main.include", "template1", Array(
	"AREA_FILE_SHOW" => "file",	// Показывать включаемую область
		"PATH" => SITE_DIR."include/footer_main.feedback.php",	// Путь к файлу области
	),
	false
);?>
            <button type="button" class="btn-close" data-dismiss="modal"></button>
        </div>
    </div>
</div>

<div class="modal fade user_form feedback-form" id="clickFeedback" tabindex="-1" role="dialog" aria-labelledby="modalFeedbackTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered user_form_wrp">
        <div class="modal-content">
            <?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/footer_main.feedback.php"), false);?>
            <button type="button" class="btn-close" data-dismiss="modal"></button>
        </div>
    </div>
</div>
<footer class="footer">
    <div class="footer_wrp">
        <div class="footer_top">
            <div class="container_wrp">
                <div class="row">
                    <div class="col-lg-5 col-12 text-lg-left text-center">
                        <div class="footer_top_col">
                            <div class="title_big">
                                <?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/footer_info_shop_t.php"), false);?>
                                </div>
                            <div class="footer-store">
                                <div class="store-address">
                                    <p class="change_DESCRIPTION"><?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/address_default.php"), false);?></p>
                                </div>
                                <div class="store-phone">

                                        <?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/footer_phone_t.php"), false);?>
									<!--<span class="change_PHONE"><?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/telephone.php"), false);?></span>-->
                                </div>
                                <div class="store-mail">
                                    <?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/footer_email.php"), false);?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-12 text-lg-left text-center mt-lg-0 mt-3">
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="title_big">
                                    <?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/footer_about_t.php"), false);?>
                                    </div>
                                <?$APPLICATION->IncludeComponent(
                                    "bitrix:menu",
                                    "bottom_menu",
                                    array(
                                        "ALLOW_MULTI_SELECT" => "N",
                                        "CHILD_MENU_TYPE" => "left",
                                        "DELAY" => "N",
                                        "MAX_LEVEL" => "1",
                                        "MENU_CACHE_GET_VARS" => array(
                                        ),
                                        "MENU_CACHE_TIME" => "3600",
                                        "MENU_CACHE_TYPE" => "Y",
                                        "MENU_CACHE_USE_GROUPS" => "Y",
                                        "ROOT_MENU_TYPE" => "bottom",
                                        "USE_EXT" => "N",
                                        "COMPONENT_TEMPLATE" => "bottom_menu"
                                    ),
                                    false
                                );?>
                            </div>
                            <div class="col-lg-6 col-12 mt-md-0 mt-3">
                                <div class="title_big">
                                    <?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/footer_info_t.php"), false);?>
                                    </div>
                                <?$APPLICATION->IncludeComponent(
                                    "bitrix:menu",
                                    "bottom_menu",
                                    array(
                                        "ALLOW_MULTI_SELECT" => "N",
                                        "CHILD_MENU_TYPE" => "left",
                                        "DELAY" => "N",
                                        "MAX_LEVEL" => "1",
                                        "MENU_CACHE_GET_VARS" => array(
                                        ),
                                        "MENU_CACHE_TIME" => "3600",
                                        "MENU_CACHE_TYPE" => "Y",
                                        "MENU_CACHE_USE_GROUPS" => "Y",
                                        "ROOT_MENU_TYPE" => "bottom2",
                                        "USE_EXT" => "N",
                                        "COMPONENT_TEMPLATE" => "bottom_menu"
                                    ),
                                    false
                                );?>
                            </div>
                            <div class="col-4" style="display: none;">
                                <div class="title_big">
                                    <?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/footer_info_t.php"), false);?>
                                    </div>
                                <?$APPLICATION->IncludeComponent(
                                    "bitrix:menu",
                                    "bottom_menu",
                                    array(
                                        "ALLOW_MULTI_SELECT" => "N",
                                        "CHILD_MENU_TYPE" => "left",
                                        "DELAY" => "N",
                                        "MAX_LEVEL" => "1",
                                        "MENU_CACHE_GET_VARS" => array(
                                        ),
                                        "MENU_CACHE_TIME" => "3600",
                                        "MENU_CACHE_TYPE" => "Y",
                                        "MENU_CACHE_USE_GROUPS" => "Y",
                                        "ROOT_MENU_TYPE" => "bottom3",
                                        "USE_EXT" => "N",
                                        "COMPONENT_TEMPLATE" => "bottom_menu"
                                    ),
                                    false
                                );?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer_bot">
            <div class="container_wrp">
                <div class="row align-items-center">
                    <div class="col-lg-5 col-12 text-lg-left text-center">
                        <div class="row">
                            <div class="logo_box col-auto ">
                                <a href="<?=SITE_DIR?>" class="logo_link"><?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/logo/company_logo.php"), false);?>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-12 text-lg-left text-center mt-lg-0 mt-3">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-12 mt-md-0 mt-3">
                                
                                <?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/footer.php"), false);?>
                                
                            </div>
                            <div class="col-lg-6 col-12 mt-md-0 mt-3">
                                <?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/icons/soc_icons.php"), false);?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="bg-mask"></div>
<?php $APPLICATION->IncludeFile(SITE_DIR.'include/metrica.php');
?>
</body>
</html>