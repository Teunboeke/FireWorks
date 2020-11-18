<?php

namespace Teunboeke\JoinFireWorks\Entity

use pocketmine\entity\Entity; 
use pocketmine\entity\projectile\Projectile;
use pocketmine\level\Level;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\network\mcpe\protocol\ActorEventPacket;
use pocketmine\network\mcpe\protocol\LevelSoundEventPacket;
use pocketmine\Player;
use pocketmine\utils\Random;
use xenialdan\fireworks\item\Fireworks;

class FireworksRocket extends Projectile{
  	const NETWORK_ID = self::FIREWORKS_ROCKET;
