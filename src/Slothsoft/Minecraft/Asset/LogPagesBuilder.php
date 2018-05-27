<?php
declare(strict_types = 1);
namespace Slothsoft\Minecraft\Asset;

use Slothsoft\Farah\FarahUrl\FarahUrlArguments;
use Slothsoft\Farah\Module\Asset\AssetInterface;
use Slothsoft\Farah\Module\Asset\ExecutableBuilderStrategy\ExecutableBuilderStrategyInterface;
use Slothsoft\Farah\Module\Executable\ExecutableInterface;
use Slothsoft\Farah\Module\Executable\ExecutableStrategies;
use Slothsoft\Farah\Module\Executable\ResultBuilderStrategy\DOMWriterResultBuilder;
use Slothsoft\Minecraft\LogPagesDocument;
use Slothsoft\Minecraft\Executables\MinecraftExecutableCreator;

/**
 *
 * @author Daniel Schulz
 *        
 */
class LogPagesBuilder implements ExecutableBuilderStrategyInterface
{

    protected function loadExecutable(FarahUrlArguments $args): ExecutableInterface
    {
        
        
        $creator = new MinecraftExecutableCreator($this, $args);
        return $creator->createLogPagesExecutable($firstYear, $firstMonth, $lastYear, $lastMonth);
    }
    
    public function buildExecutableStrategies(AssetInterface $context, FarahUrlArguments $args): ExecutableStrategies
    {
        $startYear = 2010;
        $startMonth = 12;
        
        $time = time();
        $endYear = (int) date('Y', $time);
        $endMonth = (int) date('n', $time);
        
        $writer = new LogPagesDocument($startYear, $startMonth, $endYear, $endMonth);
        
        return new ExecutableStrategies(new DOMWriterResultBuilder($writer));
    }

}

