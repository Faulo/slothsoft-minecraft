<?php
declare(strict_types = 1);
namespace Slothsoft\Minecraft\NBT;

class TAGLong extends TAGNumber {
    
    const TYPE = 4;
    
    public function loadPayload() {
        parent::loadPayloadNumber(8);
    }
} 

