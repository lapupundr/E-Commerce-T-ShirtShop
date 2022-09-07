<?php

declare(strict_types=1);

namespace Ecommerce\Core\Controller;

use Ecommerce\Core\DB\Sql\Insert;
use Ecommerce\Core\DB\Sql\Select;
use Ecommerce\Core\DB\Sql\Where;
use Ecommerce\Core\DB\WhereConditionException;

class Setup implements ControllerInterface
{
    /**
     * @inheritDoc
     * @throws WhereConditionException
     */
    public function execute(): void
    {
        echo 'You are inside setup modules';
        $listOfScripts = glob('app/*/Setup/*.php');
        $listOfSetupModules = $this->getListOfSetupModules();

        foreach ($listOfScripts as $installFile) {
            $path = $this->transformPath($installFile);
            $pathNoSlash = str_replace('\\', '', $path);
            if (!in_array($pathNoSlash, $listOfSetupModules)) {
                echo ' not found module, install it';
                $object = new $path();
                $object->install();
                $addModule = new Insert();
                $addModule->insert('setup_modules', ['module_path'=>$pathNoSlash]);
            } else {
                echo ' Module is already installed';
            }
        }
    }

    /**
     * @param string $installFile
     * @return string
     */
    private function transformPath(string $installFile): string
    {
        $path = str_replace(['/', 'app'], ['\\', 'Ecommerce'], $installFile);
        return substr($path, 0, strcspn($path, '.'));
    }

    /**
     * @return string[]
     * @throws WhereConditionException
     */
    private function getListOfSetupModules(): array
    {
        $select = new Select();
        $where = new Where(['module_path', 'Ec%', 'LIKE']);
        return $select->select('setup_modules', $where);
    }
}