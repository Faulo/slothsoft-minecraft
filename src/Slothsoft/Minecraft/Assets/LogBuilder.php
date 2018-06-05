<?php
declare(strict_types = 1);
namespace Slothsoft\Minecraft\Assets;

use Slothsoft\Farah\FarahUrl\FarahUrlArguments;
use Slothsoft\Farah\Module\Asset\AssetInterface;
use Slothsoft\Farah\Module\Asset\ExecutableBuilderStrategy\ExecutableBuilderStrategyInterface;
use Slothsoft\Farah\Module\DOMWriter\ElementClosureDOMWriter;
use Slothsoft\Farah\Module\Executable\ExecutableStrategies;
use Slothsoft\Farah\Module\Executable\ResultBuilderStrategy\DOMWriterResultBuilder;
use DOMDocument;
use DOMElement;

/**
 *
 * @author Daniel Schulz
 *        
 */
class LogBuilder implements ExecutableBuilderStrategyInterface
{
    public function buildExecutableStrategies(AssetInterface $context, FarahUrlArguments $args): ExecutableStrategies
    {
        $writer = function(DOMDocument $targetDoc) : DOMElement {
            return $targetDoc->createElement('log');
        };
        $resultBuilder = new DOMWriterResultBuilder(new ElementClosureDOMWriter($writer));
        return new ExecutableStrategies($resultBuilder);
    }
}
