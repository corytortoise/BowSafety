<?php

  namespace corytortoise\BowSafety;
  
  use pocketmine\plugin\PluginBase;
  use pocketmine\event\Listener;
  use pocketmine\event\entity\EntityDamageEvent;
  use pocketmine\Player;
  
  class Main extends PluginBase implements Listener{
    
    public function onEnable(){
      $this->getServer()->getPluginManager()->registerEvents($this, $this);
      $this->getLogger()->notice("BowSafety Enabled!");
    }
    
    public function onDamage(EntityDamageEvent $event){
      $player = $event->getEntity();
      if($player instanceof Player and $event->getCause() === EntityDamageEvent::CAUSE_PROJECTILE){
        if($event->getDamager() === $event->getEntity()){
          $event->setCancelled();
        }
      }
    }
  }

