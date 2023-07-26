<?php
declare(strict_types=1);

namespace Ecommerce\Index\View;

use Ecommerce\Core\Controller\ControllerInterface;
use Ecommerce\Core\DB\Sql\Select;
use SimpleXMLElement;

class Output implements ControllerInterface
{
    /**
     * @inheritDoc
     */
    public function execute(): void
    {
        echo " We are inside Index. Hello!";
        echo " Create xml";

        $selectDepartment = new Select();
        $arrDepartment = $selectDepartment->selectAll('department');

//        // Создаем объект SimpleXMLElement
/*        $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><root></root>');*/
//
//        // Добавляем элементы в XML
//        $child1 = $xml->addChild('child1', 'Значение 1');
//        $child2 = $xml->addChild('child2', 'Значение 2');
//
//        // Добавляем атрибут к элементу
//        $child1->addAttribute('attribute1', 'Значение атрибута');
//
//        // Сохраняем XML в файл
//        $xml->asXML('file.xml');
//
//        echo 'Данные успешно записаны в файл file.xml';


        $xml = new SimpleXMLElement('<data/>');

        foreach ($arrDepartment as $valueDep) {
            $xmlRow = $xml->addChild('department');
            foreach ($valueDep as $key => $value) {
                $xmlRow->addChild($key, $value);

            }
        }

        // сохранение XML в файл
        echo $xml->asXML();

        $xml->asXML('img/dataXml.xml');



    }
}