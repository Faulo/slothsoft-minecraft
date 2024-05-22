<?php
declare(strict_types = 1);
namespace Slothsoft\Minecraft\NBT;

class TAGDouble extends TAGNumber
{

    const TYPE = 6;

    public function loadPayload()
    {
        parent::loadPayload(8, 1);
    }
} 

