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

  	public function __construct(Level $level, CompoundTag $nbt, Entity $shootingEntity = null, ?Fireworks $item = null, ?Random $random = null){
      		$this->random = $random; 
      		$this->fireworks = $item;
      		parent::__construct($level, $nbt, $shootingEntity);
      	} 
  
      protected function initEntity(): void
            {
        		parent::initEntity();
        		$random = $this->random ?? new Random();
        
        		$this->setGenericFlag(self::DATA_FLAG_HAS_COLLISION, true);
        		$this->setGenericFlag(self::DATA_FLAG_AFFECTED_BY_GRAVITY, true);
          $this->getDataPropertyManager()->setItem(16, $this->fireworks);

        		$flyTime = 1;
        
        		try{
			if (!is_null($this->namedtag->getCompoundTag("Fireworks")))
        				if ($this->namedtag->getCompoundTag("Fireworks")->getByte("Flight", 1))
                  					$flyTime = $this->namedtag->getCompoundTag("Fireworks")->getByte("Flight", 1);
              		} catch (\Exception $exception){
              			$this->server->getLogger()->debug($exception);
              		}
        
        		$this->lifeTime = 20 * $flyTime + $random->nextBoundedInt(5) + $random->nextBoundedInt(7);
        	}
