<?php
declare(strict_types = 1);
namespace Slothsoft\Minecraft\Assets;

use Slothsoft\Farah\Module\Executables\ExecutableInterface;
use Slothsoft\Farah\Module\FarahUrl\FarahUrlArguments;
use Slothsoft\Farah\Module\Node\Asset\AssetBase;
use Slothsoft\Minecraft\Executables\MinecraftExecutableCreator;

/**
 *
 * @author Daniel Schulz
 *        
 */
class LogPages extends AssetBase
{

    protected function loadExecutable(FarahUrlArguments $args): ExecutableInterface
    {
        $firstYear = 2010;
        $firstMonth = 12;
        
        $time = time();
        $lastYear = (int) date('Y', $time);
        $lastMonth = (int) date('n', $time);
        
        $creator = new MinecraftExecutableCreator($this, $args);
        return $creator->createLogPagesExecutable($firstYear, $firstMonth, $lastYear, $lastMonth);
    }
}

