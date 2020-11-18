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
