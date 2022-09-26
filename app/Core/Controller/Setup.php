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
     * Column name with the path to Setup class
     * (usually this class contains SQL scripts with CREATE TABLE / INSERT / UPDATE)
     */
    private const COLUMN_MODULE_PATH = 'module_path';

    /**
     * @inheritDoc
     * @throws WhereConditionException
     */
    public function execute(): void
    {
        echo 'You are inside setup modules';
        $listOfScripts = glob('app/*/Setup/*.php');
        $listOfSetupModules = $this->getListOfSetupModules();
        $listOfSetupModulesOneArr = [];
        foreach ($listOfSetupModules as $value) {
            $listOfSetupModulesOneArr[] = $value[self::COLUMN_MODULE_PATH];
        }
        $listOfSetupModules = $listOfSetupModulesOneArr ?: [];

        foreach ($listOfScripts as $installFile) {
            $path = $this->transformPath($installFile);
            $pathNoSlash = str_replace('\\', '', $path);
            if (!in_array($pathNoSlash, $listOfSetupModules)) {
                echo ' NOT found module, install it; ';
                $object = new $path();
                $object->install();
                $addModule = new Insert();
                $addModule->insert('setup_modules', [self::COLUMN_MODULE_PATH =>$pathNoSlash]);
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
        $where = new Where([self::COLUMN_MODULE_PATH, 'Ec%', 'LIKE']);
        return $select->selectAll('setup_modules', $where);
    }
}