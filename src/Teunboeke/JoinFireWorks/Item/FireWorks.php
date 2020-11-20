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
use Teunboeke\FireworksRocket\entity\FireworksRocket;

class Fireworks extends item{

  	public $spread = 5.0;
  
  	public function __construct($meta = 0){
      		parent::__construct(self::FIREWORKS, $meta, "Fireworks");
      	}
  
      public function onActivate(Player $player, Block $blockReplace, Block $blockClicked, int $face, Vector3 $clickVector): bool
          {  
		$random = new Random();
        		$yaw = $random->nextBoundedInt(360);
        		$pitch = -1 * (float)(90 + ($random->nextFloat() * $this->spread - $this->spread / 2));
        		$nbt = Entity::createBaseNBT($blockReplace->add(0.5, 0, 0.5), null, $yaw, $pitch);
           	/** @var CompoundTag $tags */
        		$tags = $this->getNamedTagEntry("Fireworks");
	      		if (!is_null($tags)){
			$nbt->setTag($tags);
						}
				
	      
	              $rocket = new FireworksRocket($player->getLevel(), $nbt, $player, $this, $random);
	              $player->getLevel()->addEntity($rocket);

	      		if ($rocket instanceof Entity){
			if ($player->isSurvival()){
								--$this->count;
						}	
			$rocket->spawnToAll();
			return true;	
						}
	      		return false;
	      	}
	
		public static function ToNbt(FireworksData $data): CompoundTag{
					$value = [];
					$root = new CompoundTag();
					foreach ($data->explosions as $explosion){
							$tag = new CompoundTag();
							$tag->setByteArray("FireworkColor", strval($explosion->fireworkColor[0])); //TODO figure out calculation
							$tag->setByteArray("FireworkFade", strval($explosion->fireworkFade[0])); //TODO figure out calculation
									$tag->setByte("FireworkFlicker", ($explosion->fireworkFlicker ? 1 : 0));
									$tag->setByte("FireworkTrail", ($explosion->fireworkTrail ? 1 : 0));
									$tag->setByte("FireworkType", $explosion->fireworkType);
									$value[] = $tag;
								}

					$explosions = new ListTag("Explosions", $value, NBT::TAG_Compound);
					$root->setTag(new CompoundTag("Fireworks",
								[      
										$explosions,	
										new ByteTag("Flight", $data->flight)
													])
						      		);
					
			return $root;
	}
	
	}

class FireworksData{
		/** @var int */
		public $flight = 1;
		/** @var FireworksExplosion[] */
		public $explosions = [];
	}

class FireworksExplosion{
		/** @var int[] count keys = 3 */ //TODO figure out calculation
		public $fireworkColor = [];
