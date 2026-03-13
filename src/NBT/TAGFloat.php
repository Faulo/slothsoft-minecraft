<?php
declare(strict_types = 1);
namespace Slothsoft\Minecraft\NBT;

class TAGFloat extends TAGNumber {
    
    const TYPE = 5;
    
    public function loadPayload() {
        parent::loadPayloadNumber(4, 1);
    }
} 

