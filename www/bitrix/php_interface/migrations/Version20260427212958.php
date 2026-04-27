<?php

namespace Sprint\Migration;


class Version20260427212958 extends Version
{

    protected $description = "";

    public function up()
    {
        $helper = $this->getHelperManager();

        $iblockId = $helper->Iblock()->saveIblock([
            'NAME' => 'Парсер данные',
            'CODE' => 'parser_data',
            'IBLOCK_TYPE_ID' => 'content',
            'SITE_ID' => ['s1'],
        ]);

        $helper->Iblock()->saveProperty($iblockId, [
            'NAME' => 'Тип',
            'CODE' => 'TYPE',
            'PROPERTY_TYPE' => 'L',
        ]);
    }

    public function down()
    {
        $helper = $this->getHelperManager();

        //your code ...
    }

}
