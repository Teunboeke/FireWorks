<?php

declare(strict_types=1);

namespace Teunboeke\JoinFireWorks\Item

use pocketmine\block\Block;
use pocketmine\entity\Entity;
use pocketmine\item\Item;
use pocketmine\math\Vector3;
use pocketmine\nbt\NBT;
use pocketmine\nbt\tag\ByteTag;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\ListTag;
use pocketmine\Player;
use pocketmine\utils\Random;
use xenialdan\fireworks\entity\FireworksRocket;

class Fireworks extends item{

  	public $spread = 5.0;
  
  	public function __construct($meta = 0){
      		parent::__construct(self::FIREWORKS, $meta, "Fireworks");
      	}
  
      public function onActivate(Player $player, Block $blockReplace, Block $blockClicked, int $face, Vector3 $clickVector): bool
