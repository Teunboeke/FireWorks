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
  
  	public $width = 0.25;
  	public $height = 0.25;

  	public $gravity = 0.0;
  	public $drag = 0.01;
  
  	private $lifeTime = 0;
  	public $random;
 /** @var null|Fireworks */
  	public $fireworks;
