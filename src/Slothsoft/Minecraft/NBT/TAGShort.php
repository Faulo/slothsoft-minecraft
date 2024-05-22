<?php
declare(strict_types = 1);
namespace Slothsoft\Minecraft\NBT;

class TAGShort extends TAGNumber
{

    const TYPE = 2;

    public function loadPayload()
    {
        parent::loadPayload(2);
    }
} 

