<?php

class weight_weapons
{
    protected const GRIP_RESISTANT = 50;

    public function getGripResistant()
    {
        return static::GRIP_RESISTANT;
    }
}

class heroes 
{
    protected int $hp;
    protected int|float $durability;
    protected string $guns;

    public function __construct(
        int $hp, 
        int|float $durability, 
        string $guns
        )
        {
            $this->hp = $hp;
            $this->durability = $durability;
            $this->guns = $guns;
        }

        public function getMaxDurability(): int|float
        {
            return $this->durability;
        }
        
        public function getCurrentHp(): int
        {
            return $this->hp;
        }
        
        public function getCurrentMaxDurability(): int|float
        {
            return $this->durability;
        }

        public function getCurrentGuns(): string
        {
            return $this->guns;
        }
}

class warrior extends heroes
{
    protected weight_weapons $weight_weapons;

    public function __construct(
        int $hp, 
        int|float $durability, 
        string $guns, 
        weight_weapons $weight_weapons)
    {
        $this->weight_weapons = $weight_weapons;
        parent::__construct($hp, $durability, $guns);
    }
    public function getCurrentMaxDurability(): int|float
    {
        $percentofGripDecreasing = $this->weight_weapons->getGripResistant();
        return $this->durability - ($this->durability * $percentofGripDecreasing / 100);
    }
}

class mage extends heroes 
{

}

class archer extends heroes
{

}

class weapons
{
    protected int $bullets;
}

class bow extends weapons
{

}

class crossbow extends weapons
{

}

class magic_stuff extends weapons
{

}

class sword extends weapons
{

}

class pistol extends weapons
{

}


$weight_weapon = new weight_weapons;

$endurowarrior = new warrior(500, 300, 'sword', $weight_weapon);

//$hero_warrior = new heroes(500, 100, 'pistol');
//$hero_mage = new heroes(200, 200, 'magic_stuff');
//$hero_archer = new heroes(100, 300, 'bow');

echo "Max Durability is: " . $endurowarrior->getMaxDurability() . PHP_EOL;
echo "Current Durability is: " . $endurowarrior->getCurrentMaxDurability() . PHP_EOL;

echo "Current Hp is: " . $endurowarrior->getCurrentHp() . PHP_EOL;

echo "Current Gun is: " . $endurowarrior->getCurrentGuns() . PHP_EOL;


//Max Durability is: 300
//Current Durability is: 150
