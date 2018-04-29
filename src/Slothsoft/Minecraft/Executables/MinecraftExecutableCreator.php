<?php
namespace Slothsoft\Minecraft\Executables;

use Slothsoft\Farah\Module\Executables\ExecutableCreator;
use Slothsoft\Farah\Module\Executables\ExecutableInterface;

class MinecraftExecutableCreator extends ExecutableCreator
{
    public function createLogPagesExecutable(int $firstYear, int $firstMonth, int $lastYear, int $lastMonth) : ExecutableInterface {
        return $this->initExecutable(new LogPagesExecutable($firstYear, $firstMonth, $lastYear, $lastMonth));
    }
}

