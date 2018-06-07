<?php
declare(strict_types = 1);
namespace Slothsoft\Minecraft\NBT;

class TAGByte extends TAGNumber
{

    const TYPE = 1;

    public function loadPayload()
    {
        parent::loadPayload(1);
    }
} 

