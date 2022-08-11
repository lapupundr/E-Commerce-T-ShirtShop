<?php

declare(strict_types=1);

namespace Ecommerce\Core\Controller;

use Ecommerce\Core\DB\DBConnection;
use Ecommerce\Core\DB\Sql\Insert;
use Ecommerce\Core\DB\Sql\Select;

class Setup implements ControllerInterface
{
    /**
     * @inheritDoc
     */
    public function execute(): void
    {
        echo 'You are inside setup modules';
        $listOfScripts = glob('app/*/Setup/*.php');
        $connection = new DBConnection();

        foreach ($listOfScripts as $installFile) {
            $path = str_replace(['/', 'app'], ['\\', 'Ecommerce'], $installFile);
            $path = substr($path, 0, strcspn($path, '.'));
            $select = new Select($connection);
            $listOfSetupModules = $select->select('setup_modules');
            $pathNoSlash = str_replace('\\', '', $path);
            if (!in_array($pathNoSlash, $listOfSetupModules)) {
                echo ' not found module, install it';
                $object = new $path($connection);
                $object->install();
                $addModule = new Insert($connection);
                $addModule->insert('setup_modules', ['module_path'=>$pathNoSlash]);
            } else {
                echo ' Module is already installed';
            }
        }
    }
}