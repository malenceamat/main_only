<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");?>

<?
$APPLICATION->SetTitle("Обратная связь");
?>

<?$APPLICATION->IncludeComponent(
    "bitrix:form.result.new",
    "custom_form",
    array(
        "WEB_FORM_ID" => "1",
        "USE_EXTENDED_ERRORS" => "Y",
        "CACHE_TYPE" => "N",
        "CACHE_TIME" => "3600",
        "LIST_URL" => "",
        "SUCCESS_URL" => "",
        "AJAX_MODE" => "Y"
    )
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
