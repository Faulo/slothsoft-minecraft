<?php
declare(strict_types = 1);
namespace Slothsoft\Minecraft;

use Slothsoft\Core\IO\Writable\ChunkWriterInterface;
use Generator;

class LogPagesDocument implements ChunkWriterInterface {
    
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
    
    public function toChunks(): Generator {
        yield '<sitemap version="1.0" xmlns="http://schema.slothsoft.net/farah/sitemap" xmlns:sfm="http://schema.slothsoft.net/farah/module">';
        
        for ($year = $this->endYear; $year >= $this->startYear; $year --) {
            yield sprintf('<page status-active="" status-public="" redirect="/Minecraft/Log/" name="%s" title="%s">', $year, $year);
            $startMonth = $year === $this->endYear ? $this->endMonth : 12;
            $endMonth = $year === $this->startYear ? $this->startMonth : 1;
            for ($month = $startMonth; $month >= $endMonth; $month --) {
                yield sprintf('<page status-active="" status-public="" ref="archive" name="%02d" title="month/%02d">', $month, $month);
                yield sprintf('<sfm:param name="chat-start" value="%d"/>', mktime(0, 0, 0, $month, 1, $year));
                yield sprintf('<sfm:param name="chat-end" value="%d"/>', mktime(0, 0, 0, $month + 1, 1, $year));
                yield '</page>';
            }
            yield '</page>';
        }
        
        yield '</sitemap>';
    }
}

