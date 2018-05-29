<?php
declare(strict_types = 1);
namespace Slothsoft\Minecraft\Asset;

use Slothsoft\Farah\FarahUrl\FarahUrlArguments;
use Slothsoft\Farah\Module\Asset\AssetInterface;
use Slothsoft\Farah\Module\Asset\ExecutableBuilderStrategy\ExecutableBuilderStrategyInterface;
use Slothsoft\Farah\Module\Executable\ExecutableInterface;
use Slothsoft\Farah\Module\Executable\ExecutableStrategies;
use Slothsoft\Farah\Module\Executable\ResultBuilderStrategy\NullResultBuilder;
use Slothsoft\Minecraft\Executables\MinecraftExecutableCreator;

/**
 *
 * @author Daniel Schulz
 *        
 */
class StatusBuilder implements ExecutableBuilderStrategyInterface
{

    protected function loadExecutable(FarahUrlArguments $args): ExecutableInterface
    {
        $creator = new MinecraftExecutableCreator($this, $args);
        return $creator->createNullExecutable();
    }
    
    public function buildExecutableStrategies(AssetInterface $context, FarahUrlArguments $args): ExecutableStrategies
    {
        return new ExecutableStrategies(new NullResultBuilder());
    }
}
