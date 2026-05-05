<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Новости");
$APPLICATION->IncludeComponent(
    "bitrix:news",
    "custom_news",
    array(
        "IBLOCK_TYPE" => "news",
        "IBLOCK_ID" => "1",
        "SEF_MODE" => "Y",
        "SEF_FOLDER" => "/news/",
        "SEF_URL_TEMPLATES" => array(
            "news" => "",
            "section" => "",
            "detail" => "#ELEMENT_ID#/",
        ),
        "NEWS_COUNT" => "20",
        "CACHE_TYPE" => "N",
        "SET_TITLE" => "Y",
    )
);

$APPLICATION->IncludeComponent(
    "custom:iblock.list",
    "",
    [
        "IBLOCK_TYPE" => "content",
        "IBLOCK_ID" => 0
    ]
);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>
