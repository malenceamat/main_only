<?php
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');

$APPLICATION->IncludeComponent(
    'corporate:car.list',
    '',
    [
        'IBLOCK_CARS_ID'      => '15',
        'IBLOCK_BOOKINGS_ID'  => '16',
        'IBLOCK_POSITIONS_ID' => '13',
    ]
);

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php');
