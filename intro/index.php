<?php
    require_once('vendor/autoload.php');

    use Cowsayphp\Farm;
    $cow = Farm::create(\Cowsayphp\Farm\Whale::class);
    echo $cow -> say("Moo... I'm a cow.") . "\n";

    $faker = Faker\Factory::create('hu_HU');
    for ($i = 0; $i < 30; $i++)
        echo $faker -> name() . "\n";
?>