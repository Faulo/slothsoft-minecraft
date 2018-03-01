<?php
namespace Slothsoft\Farah;

use Slothsoft\Core\DOMHelper;
use Slothsoft\Farah\Module\FarahUrl\FarahUrlArguments;

return function(FarahUrlArguments $args) {
    $firstYear = 2010;
    $firstMonth = 12;
    
    $time = time();
    $lastYear = (int) date('Y', $time);
    $lastMonth = (int) date('n', $time);
    
    // my_dump([$firstYear, $lastYear, $firstMonth, $lastMonth]);die();
    
    $xml = '<pages xmlns="http://schema.slothsoft.net/farah/sites" xmlns:sfm="http://schema.slothsoft.net/farah/module">';
    
    for ($year = $lastYear; $year >= $firstYear; $year --) {
        // <page status-active="" status-public="" redirect="/Minecraft/Log/" name="2014" title="2014">
        $xml .= sprintf('<page status-active="" status-public="" redirect="/Minecraft/Log/" name="%s" title="%s">', $year, $year);
        $startMonth = $year === $lastYear ? $lastMonth : 12;
        $endMonth = $year === $firstYear ? $firstMonth : 1;
        for ($month = $startMonth; $month >= $endMonth; $month --) {
            // <page status-active="" status-public="" ref="archive" name="03" title="month/03">
            // <param name="chat-start" value="1393628400"/><param name="chat-end" value="1396303200"/>
            $xml .= sprintf('<page status-active="" status-public="" ref="archive" name="%02d" title="month/%02d">', $month, $month);
            $xml .= sprintf('<sfm:param name="chat-start" value="%d"/>', mktime(0, 0, 0, $month, 1, $year));
            $xml .= sprintf('<sfm:param name="chat-end" value="%d"/>', mktime(0, 0, 0, $month + 1, 1, $year));
            $xml .= '</page>';
        }
        $xml .= '</page>';
    }
    
    $xml .= '</pages>';
    
    $dom = new DOMHelper();
    return $dom->parse($xml);
};