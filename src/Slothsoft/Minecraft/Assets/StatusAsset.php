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
class StatusAsset extends AssetBase
{

    protected function loadExecutable(FarahUrlArguments $args): ExecutableInterface
    {
        $creator = new MinecraftExecutableCreator($this, $args);
        return $creator->createNullExecutable();
    }
}

