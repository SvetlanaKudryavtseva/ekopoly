<?

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)  die();

use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Loader;
$curPage = $APPLICATION->GetCurPage(true);
CJSCore::Init(array("popup",'core','sidepanel'));
if(\Bitrix\Main\Loader::includeSharewareModule("krayt.floor") == \Bitrix\Main\Loader::MODULE_DEMO_EXPIRED ||
    \Bitrix\Main\Loader::includeSharewareModule("krayt.floor") ==  \Bitrix\Main\Loader::MODULE_NOT_FOUND
)
{
    $APPLICATION->IncludeFile(SITE_DIR.'include/alert_install.php');
    die();

}
Loader::includeModule('krayt.floor');

// TASK 18709

define("SITE_SERVER_PROTOCOL", (CMain::IsHTTPS()) ? "https://" : "http://"); // Переменная определяет протокол, по которому работает ваш сайт
$thisCurPage = $APPLICATION->GetCurPage(); // Получаем текущий адрес страницы

$thisUrl = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$conditionUrl = preg_match("/\/product\//i", $thisUrl);
// TASK 18709

?>

<!doctype html>
<html lang="ru">
<head>
    <meta name="viewport"content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <!--<meta name="viewport" content="width=1300">-->
	<?//$APPLICATION->ShowHead();
    $APPLICATION->ShowProperty('MetaOG');
    $APPLICATION->ShowProperty('BeforeHeadClose');
    ?>

	<?// TASK 18709?>

	<meta property="og:url" content="<?=SITE_SERVER_PROTOCOL . SITE_SERVER_NAME . $thisCurPage?>">
	<meta property="og:type" content="website">
	<meta property="og:title" content="<?$APPLICATION->ShowProperty("title")?>">
	<meta property="og:description" content="<?=$APPLICATION->ShowProperty("description")?>">
	<? if($conditionUrl) { ?>
    <?$APPLICATION->ShowViewContent('og_image');?>
	<? } else { ?>
	<meta property="og:image" content="https://ekopoly.ru/favicon.ico">
	<? } ?>

	<?// END TASK 18709?>

	<?// TASK 18677 For Ivan?>
    <?$APPLICATION->ShowMeta("robots")?>
    <?$APPLICATION->ShowMeta("description")?>
    <?$APPLICATION->ShowCSS()?>
    <?$APPLICATION->ShowHeadStrings()?>
    <?$APPLICATION->ShowHeadScripts()?>
	<?// TASK 18677 For Ivan?>

    <link rel="canonical" href="https://ekopoly.ru<? echo $APPLICATION->GetCurDir(); ?>" />
	<link rel="icon" href="/favicon.ico" type="image/vnd.microsoft.icon" />
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-555QMCL');</script>
    <!-- End Google Tag Manager -->

    <?
    use Bitrix\Main\Page\Asset;
    // JS libraries
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH. "/js/lib/jquery.min.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH. "/js/lib/bootstrap.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH. "/js/lib/jquery.fancybox.min.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH. "/js/lib/jquery.formstyler.min.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH. "/js/lib/jquery.nicescroll.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH. "/js/lib/owl.carousel.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH. "/js/lib/tooltipster.bundle.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH. "/js/lib/wow.min.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH. "/js/lib/slick.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH. "/js/lib/jquery.maskedinput.min.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH. "/js/script.js");

    // CSS libraries
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH."/css/lib/animate.wow.css");
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH."/css/lib/font-awesome.css");
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH."/css/lib/owl.carousel.css");
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH."/css/lib/jquery.fancybox.min.css");
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH."/css/lib/jquery.formstyler.css");
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH."/css/lib/swiper.min.css");
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH."/css/lib/slick.css");
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH."/css/lib/bootstrap_v4.css");
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH."/css/lib/tooltipster.bundle.min.css");

  //  Asset::getInstance()->addJs(SITE_TEMPLATE_PATH. "/components/bitrix/catalog/master_template/bitrix/catalog.element/laminat/script.js");
    Asset::getInstance()->addJs("/local/components/krayt/one.click/templates/.default/script.js");
    Asset::getInstance()->addCss("/local/components/krayt/one.click/templates/.default/style.css");

	// CUSTOM CSS
	Asset::getInstance()->addCss(SITE_TEMPLATE_PATH."/css/custom.css");
	?>
    <script>
        var settingSantech = {
            SITE_DIR: '<?=SITE_DIR?>',
            SITE_ID: '<?=SITE_ID?>'
        };
    </script>
    <?=CKray_floor::getStyleLabelProp(SITE_ID)?>
    <title><?$APPLICATION->ShowTitle()?></title>
</head>

<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-555QMCL"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<?
$APPLICATION->ShowPanel();

?>
<header id="header" class="header">
    <div class="header_wrp">
        <div class="header_top">
            <div class="container_wrp">
                <div class="header_l-side">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:menu",
                        "top_menu",
                        Array(
                        "ALLOW_MULTI_SELECT" => "N",
                            "CHILD_MENU_TYPE" => "top",
                            "DELAY" => "N",
                            "MAX_LEVEL" => "1",
                            "MENU_CACHE_GET_VARS" => array(
                                0 => "",
                            ),
                            "MENU_CACHE_TIME" => "3600",
                            "MENU_CACHE_TYPE" => "Y",
                            "MENU_CACHE_USE_GROUPS" => "Y",
                            "ROOT_MENU_TYPE" => "top",
                            "USE_EXT" => "N",
                        ),
                        false
                    );?>
                </div>
                <div class="header_r-side">
					<div class="social_top top_icon">
                         <?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/icons/soc_icons.php"), false);?>
                    </div>
                    <div class="favour_top top_icon" id="favour_in">
                        <a href="<?=SITE_DIR?>favorite/">
                            <span class="icon fa fa-heart-o"></span>
                            <span class="text-icon">
                                <?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/header/favorite_t.php"), false);?>
                            </span>
                            <span class="counter full-quantity-favour">0</span>
                        </a>
                    </div>

                    <div class="search_top_mobile top_icon">
                        <img src="/bitrix/templates/floor/img/icons/search-icon.svg">
                    </div>

                    <div class="compare_top top_icon">
                        <?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/header/compare.php"), false);?>

                    </div>


                    <div class="top_user-box">
                        <div class="top_user user_btn">
                            <? $APPLICATION->IncludeComponent("bitrix:system.auth.form", "top_auth", Array(
                                "FORGOT_PASSWORD_URL" => "",
                                "PROFILE_URL" => SITE_DIR."personal",
                                "REGISTER_URL" => SITE_DIR."personal/",
                                "SHOW_ERRORS" => "N",
                                "COMPONENT_TEMPLATE" => ""
                        	),
                            false,
                            array(
                            "ACTIVE_COMPONENT" => "N"
                            )
                        ); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header_mid">
            <div class="container_wrp flex_box">
                <div class="logo_box">
                    <a href="<?=SITE_DIR?>" class="logo_link">
                        <?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/logo/company_logo.php"), false);?>
                    </a>
                </div>

                <?$APPLICATION->IncludeComponent(
                    "bitrix:catalog.store.list",
                    "top_store",
                    array(
                        "CACHE_TIME" => "36000000",
                        "CACHE_TYPE" => "A",
                        "MAP_TYPE" => "0",
                        "PATH_TO_ELEMENT" => "#store_id#",
                        "PHONE" => "Y",
                        "SCHEDULE" => "Y",
                        "SET_TITLE" => "Y",
                        "TITLE" => "",
                        "COMPONENT_TEMPLATE" => "top_store"
                    ),
                    false
                );?>

                <div class="info_item timejob">
                    <p class="title">
                        <b>
                            <?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/header/timejob_t.php"), false);?>
                            </b>
                    </p>
                    <div class="change_SCHEDULE" style="line-height: 21px;">
                        <?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/timejob.php"), false);?>
                    </div>
                </div>
                <div class="info_item phone text-center">
                    <div class="title pl-4">
                        <i class="fa fa-phone"></i>
                        <b class="change_PHONE"><?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/telephone.php"), false);?></b>
                    </div>
                    <a href="javascript:void(0);" class="callback_link" data-toggle="modal"  data-target="#modalFeedback" style="font-size: 14px;display: block;"><span
                                class="dot_link">
                            <?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/header/callback_link_text.php"), false);?>
                           </span></a>
                </div>
                <div class="basket_top">
                    <div class="top_icon basket_top">
                        <span class="icon basket"></span>
                        <span class="text-icon">
                        <span>
                            <?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/header/basket_title.php"), false);?>
                            </span>
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:sale.basket.basket.line",
                            "basket_top",
                            array(
                                "HIDE_ON_BASKET_PAGES" => "Y",
                                "PATH_TO_AUTHORIZE" => "",
                                "PATH_TO_BASKET" => SITE_DIR."cart/",
                                "PATH_TO_ORDER" => SITE_DIR."personal/order/make/",
                                "PATH_TO_PERSONAL" => SITE_DIR."personal/",
                                "PATH_TO_PROFILE" => SITE_DIR."personal/",
                                "PATH_TO_REGISTER" => SITE_DIR."login/",
                                "POSITION_FIXED" => "N",
                                "SHOW_AUTHOR" => "N",
                                "SHOW_EMPTY_VALUES" => "Y",
                                "SHOW_NUM_PRODUCTS" => "Y",
                                "SHOW_PERSONAL_LINK" => "N",
                                "SHOW_PRODUCTS" => "Y",
                                "SHOW_REGISTRATION" => "N",
                                "SHOW_TOTAL_PRICE" => "Y",
                                "COMPONENT_TEMPLATE" => "basket_top",
                                "SHOW_DELAY" => "N",
                                "SHOW_NOTAVAIL" => "N",
                                "SHOW_IMAGE" => "Y",
                                "SHOW_PRICE" => "Y",
                                "SHOW_SUMMARY" => "Y",
                                "MAX_IMAGE_SIZE" => "70"
                            ),
                            false
                        );?>
                    </div>
                </div>
            </div>
        </div>
        <div class="header_bot"> 
            <div class="hb_content">
                <div class="container_wrp">
                    <div class="hb_content-wrapper">
                        <div class="row hb_content-row">
                            <div id="open_menu" class="catalog_btn col-3">
                                <a href="<?=SITE_DIR?>catalog/" class="catalog_link">
                                    <span class="icon_menu"></span>
                                    <span>
                                        <?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/header/catalog_title.php"), false);?>
                                        </span>
                                </a>
                                <div id="popup_menu" class="catalog_menu">
                                    <div class="mobile_menu">
                                        <div class="info_item form_search mobile_form-search desktop_hide">
                                            <?$APPLICATION->IncludeComponent(
	"bitrix:search.form", 
	"top", 
	array(
		"PAGE" => "#SITE_DIR#catalog/search.php",
		"USE_SUGGEST" => "N",
		"COMPONENT_TEMPLATE" => "top"
	),
	false
);?>
                                        </div>
                                        <div class="catalog_menu-box">
                                            <div class="catalog_menu_title desktop_hide">
                                                <a href="<?=SITE_DIR?>catalog/" class="catalog_menu_link">
                                                    <?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/header/catalog_title_m.php"), false);?>

                                                </a>
                                                <span class="fa fa-angle-right open_cat" data-id="mainCatalog"></span>
                                            </div>
                                            <div class="catalog_menu-wrp flex_box" id="mainCatalog">
                                                <div class="open_cat desktop_hide" data-id="mainCatalog">
                                                    <span class="fa fa-angle-left"></span>
                                                    <span><?=Loc::getMessage('K_MOBILE_BACK')?></span>
                                                </div>
                                                <?
                                                $APPLICATION->IncludeComponent("bitrix:menu", "catalog_top", Array(
                                                    "ROOT_MENU_TYPE" => "top_catalog",
                                                    "MAX_LEVEL" => "3",
                                                    "CHILD_MENU_TYPE" => "top_catalog",
                                                    "USE_EXT" => "Y",
                                                    "DELAY" => "N",
                                                    "ALLOW_MULTI_SELECT" => "N",
                                                    "MENU_CACHE_TYPE" => "N",
                                                    "MENU_CACHE_TIME" => "3600",
                                                    "MENU_CACHE_USE_GROUPS" => "Y",
                                                    "MENU_CACHE_GET_VARS" => "",
                                                    "COMPONENT_TEMPLATE" => "vertical_multilevel",
                                                    "MENU_THEME" => "site"
                                                ),
                                                    false
                                                );
                                                ?>
                                            </div>
                                        </div>
                                        <div class="top_user-box desktop_hide">
                                            <div class="top_user user_btn">
                                                <? $APPLICATION->IncludeComponent("bitrix:system.auth.form", "top_auth", Array(
                                                    "FORGOT_PASSWORD_URL" => "",
                                                    "PROFILE_URL" => SITE_DIR."personal",
                                                    "REGISTER_URL" => SITE_DIR."personal/",
                                                    "SHOW_ERRORS" => "N",
                                                    "COMPONENT_TEMPLATE" => ""
                                                ),
                                                    false
                                                ); ?>
                                            </div>
                                        </div>
                                        <div class="top_menu-box desktop_hide">
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
                            <div class="logo_box desktop_hide">
                                <a href="<?=SITE_DIR?>" class="logo_link">
                                    <?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/logo/company_logo.php"), false);?>
                                </a>
                            </div>
                            <div class="col-5 top-bottom-menu">
                                <?$APPLICATION->IncludeComponent(
                                    "bitrix:menu",
                                    "top_menu",
                                    array(
                                        "ALLOW_MULTI_SELECT" => "N",
                                        "CHILD_MENU_TYPE" => "top",
                                        "DELAY" => "N",
                                        "MAX_LEVEL" => "1",
                                        "MENU_CACHE_GET_VARS" => array(
                                        ),
                                        "MENU_CACHE_TIME" => "3600",
                                        "MENU_CACHE_TYPE" => "Y",
                                        "MENU_CACHE_USE_GROUPS" => "Y",
                                        "ROOT_MENU_TYPE" => "top2",
                                        "USE_EXT" => "N",
                                        "COMPONENT_TEMPLATE" => "top_menu"
                                    ),
                                    false
                                );?>

                            </div>
                            <div class="info_item form_search col-4">
                                <?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/header/search.title.php"), false);?>
                            </div>
                            <div class="top_icon-box-mobile"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<main>
<?
if ($curPage != SITE_DIR."index.php") {
?>
    <div class="breadcrumbs">
        <div class="container_wrp">
        <?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "breadcrumb", Array(
            "START_FROM" => "0",
                "PATH" => "",
                "SITE_ID" => SITE_ID,
                "COMPONENT_TEMPLATE" => ".default"
            ),
            false
        );?>
        </div>
    </div>

    <div class="main_content">
        <div class="container_wrp">

<? } else { ?>

<?}?>

