<?php
declare(strict_types = 1);
namespace Slothsoft\Minecraft\Executables;

use Slothsoft\Farah\Module\Executables\ExecutableDOMWriterBase;
use DOMDocument;
use DOMElement;

class LogPagesExecutable extends ExecutableDOMWriterBase
{
    private $startYear;
    private $startMonth;
    private $endYear;
    private $endMonth;
    public function __construct(int $startYear, int $startMonth, int $endYear, int $endMonth) {
        $this->startYear = $startYear;
        $this->startMonth = $startMonth;
        $this->endYear = $endYear;
        $this->endMonth = $endMonth;
    }
    public function toElement(DOMDocument $targetDoc) : DOMElement
    {
        $fragment = $targetDoc->createDocumentFragment();
        $fragment->appendXML($this->buildXml());
        return $fragment->removeChild($fragment->firstChild);
    }

    public function toDocument() : DOMDocument
    {
        $document = new DOMDocument();
        $document->loadXML($this->buildXml());
        return $document;
    }
    
    private function buildXml() : string {
        $xml = '<sitemap version="1.0" xmlns="http://schema.slothsoft.net/farah/sitemap" xmlns:sfm="http://schema.slothsoft.net/farah/module">';
        
        for ($year = $this->endYear; $year >= $this->startYear; $year --) {
            $xml .= sprintf('<page status-active="" status-public="" redirect="/Minecraft/Log/" name="%s" title="%s">', $year, $year);
            $startMonth = $year === $this->endYear ? $this->endMonth : 12;
            $endMonth = $year === $this->startYear ? $this->startMonth : 1;
            for ($month = $startMonth; $month >= $endMonth; $month --) {
                $xml .= sprintf('<page status-active="" status-public="" ref="archive" name="%02d" title="month/%02d">', $month, $month);
                $xml .= sprintf('<sfm:param name="chat-start" value="%d"/>', mktime(0, 0, 0, $month, 1, $year));
                $xml .= sprintf('<sfm:param name="chat-end" value="%d"/>', mktime(0, 0, 0, $month + 1, 1, $year));
                $xml .= '</page>';
            }
            $xml .= '</page>';
        }
        
        $xml .= '</sitemap>';
        
        return $xml;
    }
}

