<?php
declare(strict_types = 1);
namespace Slothsoft\Minecraft\Assets;

use Slothsoft\Farah\Module\FarahUrl\FarahUrl;
use Slothsoft\Farah\Module\Node\Asset\AssetImplementation;
use Slothsoft\Farah\Module\Results\ResultCatalog;
use Slothsoft\Farah\Module\Results\ResultInterface;
use DOMDocument;

/**
 *
 * @author Daniel Schulz
 *        
 */
class StatusAsset extends AssetImplementation
{

    protected function loadResult(FarahUrl $url): ResultInterface
    {
        $dataDoc = new DOMDocument();
        $dataRoot = $dataDoc->createElement('status');
        $dataDoc->appendChild($dataRoot);
        return ResultCatalog::createDOMDocumentResult($url, $dataDoc);
    }
}

