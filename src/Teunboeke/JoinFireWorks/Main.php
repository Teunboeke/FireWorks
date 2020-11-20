<?php

namespace Teunboeke\JoinFireWorks;

use pocketmine\entity\Entity;
use pocketmine\item\Item;
use pocketmine\item\ItemFactory;
use pocketmine\plugin\PluginBase;
use Teunboeke\JoinFireWorks\Entity\FireworksRocket;
use Teunboeke\JoinFireWorks\Item\FireWorks;

class Main extends PluginBase{

  	public function onLoad(){
      	ItemFactory::registerItem(new Fireworks(), true);
      	Item::initCreativeItems();
      	Entity::registerEntity(FireworksRocket::class, true);
    	}  
}
