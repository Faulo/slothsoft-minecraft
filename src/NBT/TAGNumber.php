<?php
declare(strict_types = 1);
namespace Slothsoft\Minecraft\NBT;

class TAGNumber extends TAGNode {
    
    private $bytes = 0;
    
    public function loadPayload() {
        $this->loadPayloadNumber();
    }
    
    public function loadPayloadNumber(int $size = 0, int $mode = 0) {
        $this->bytes = $size;
        
        $offset = $this->getPayloadOffset();
        
        switch ($mode) {
            
            case 0:
                
                $int = self::getInteger($offset, $this->bytes);
                
                break;
            
            case 1:
                
                $int = self::getFloat($offset, $this->bytes);
                
                break;
        }
        
        $this->Payload['number'] = $int;
    }
    
    public function getLength() {
        return parent::getLength() + $this->bytes;
    }
    
    public function getValue() {
        
        // var_dump($this->Payload['int']);
        return $this->Payload['number'];
    }
    
    public $Payload = array(
        
        'number' => 0
    );
}


