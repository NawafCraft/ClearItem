<?php

namespace ItemClear;

class Task extends \pocketmine\scheduler\PluginTask{
        
    public $owner;

    public function __construct(Main $owner) {
    $this->owner = $owner;
    }
    
    public function onRun($tick){
       foreach($this->owner->config->get("Worlds") as $worldconfig){foreach($this->owner->config->get("Item") as $items){
        foreach ($this->owner->getServer()->getOnlinePlayers() as $a){
      
           if($worldconfig == $a->level->getName()){
                $a->getInventory()->removeItem(\pocketmine\item\Item::get($items,0,PHP_INT_MAX));
           }
          }
        }
    }
  }}
?>
