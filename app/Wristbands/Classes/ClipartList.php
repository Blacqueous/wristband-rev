<?php

namespace App\Wristbands\Classes;

use Storage;

class ClipartList {

	public function reset()
	{
		// reset list for available wristband cliparts.
		Storage::put('json/wristband/cliparts/list.json', json_encode($this->cliparts()));
	}

	public function getList()
	{
		// return all available wristband cliparts.
        return $this->getCliparts();
    }

	public function getCliparts()
	{
		// check if .json file exists.
		if(!Storage::has('json/wristband/cliparts/list.json')) {
			// generate and save .json file.
			Storage::put('json/wristband/cliparts/list.json', json_encode($this->cliparts()));
		}
		// return data from .json file.
		return json_decode(Storage::get('json/wristband/cliparts/list.json'), true);
	}

    private static function cliparts()
    {
        return [
            [
                'code' => "none",
                'image' => "assets/images/src/clipart/none.jpg",
                'name' => "None"
            ],
            [
                'code' => "alien",
                'image' => "assets/images/src/clipart/Alien.png",
                'name' => "Alien"
            ],
            [
                'code' => "anchor",
                'image' => "assets/images/src/clipart/Anchor.png",
                'name' => "Anchor"
            ],
            [
                'code' => "angel",
                'image' => "assets/images/src/clipart/Angel.png",
                'name' => "Angel"
            ],
            [
                'code' => "apple",
                'image' => "assets/images/src/clipart/Apple.png",
                'name' => "Apple"
            ],
            [
                'code' => "attention",
                'image' => "assets/images/src/clipart/Attention.png",
                'name' => "Attention"
            ],
            [
                'code' => "badge",
                'image' => "assets/images/src/clipart/Badge.png",
                'name' => "Badge"
            ],
            [
                'code' => "baseball",
                'image' => "assets/images/src/clipart/Baseball.png",
                'name' => "Baseball"
            ],
            [
                'code' => "basketball",
                'image' => "assets/images/src/clipart/Basketball.png",
                'name' => "Basketball"
            ],
            [
                'code' => "batman",
                'image' => "assets/images/src/clipart/Batman.png",
                'name' => "Batman"
            ],
            [
                'code' => "bear",
                'image' => "assets/images/src/clipart/Bear.png",
                'name' => "Bear"
            ],
            [
                'code' => "beers",
                'image' => "assets/images/src/clipart/Beers.png",
                'name' => "Beers"
            ],
            [
                'code' => "bell",
                'image' => "assets/images/src/clipart/Bell.png",
                'name' => "Bell"
            ],
            [
                'code' => "bike",
                'image' => "assets/images/src/clipart/Bike.png",
                'name' => "Bike"
            ],
            [
                'code' => "birdhead",
                'image' => "assets/images/src/clipart/BirdHead.png",
                'name' => "Birdhead"
            ],
            [
                'code' => "bug",
                'image' => "assets/images/src/clipart/Bug.png",
                'name' => "Bug"
            ],
            [
                'code' => "butterfly",
                'image' => "assets/images/src/clipart/Butterfly.png",
                'name' => "Butterfly 1"
            ],
            [
                'code' => "butterfly-1",
                'image' => "assets/images/src/clipart/Butterfly-1.png",
                'name' => "Butterfly 2"
            ],
            [
                'code' => "butterfly-2",
                'image' => "assets/images/src/clipart/Butterfly-2.png",
                'name' => "Butterfly 3"
            ],
            [
                'code' => "butterfly-3",
                'image' => "assets/images/src/clipart/Butterfly-3.png",
                'name' => "Butterfly 4"
            ],
            [
                'code' => "cabin",
                'image' => "assets/images/src/clipart/Cabin.png",
                'name' => "Cabin"
            ],
            [
                'code' => "candy-cane",
                'image' => "assets/images/src/clipart/CandyCane.png",
                'name' => "Candy Cane"
            ],
            [
                'code' => "cat-1",
                'image' => "assets/images/src/clipart/Cat-1.png",
                'name' => "Cat 1"
            ],
            [
                'code' => "cat-2",
                'image' => "assets/images/src/clipart/Cat-2.png",
                'name' => "Cat 2"
            ],
            [
                'code' => "cat-3",
                'image' => "assets/images/src/clipart/Cat-3.png",
                'name' => "Cat 3"
            ],
            [
                'code' => "clover",
                'image' => "assets/images/src/clipart/Clover.png",
                'name' => "Clover"
            ],
            [
                'code' => "cross-1",
                'image' => "assets/images/src/clipart/Cross-1.png",
                'name' => "Cross 1"
            ],
            [
                'code' => "cross-2",
                'image' => "assets/images/src/clipart/Cross-2.png",
                'name' => "Cross 2"
            ],
            [
                'code' => "cross-3",
                'image' => "assets/images/src/clipart/Cross-3.png",
                'name' => "Cross 3"
            ],
            [
                'code' => "crown",
                'image' => "assets/images/src/clipart/Crown.png",
                'name' => "Crown"
            ],
            [
                'code' => "danger",
                'image' => "assets/images/src/clipart/Danger.png",
                'name' => "Danger"
            ],
            [
                'code' => "devil",
                'image' => "assets/images/src/clipart/Devil.png",
                'name' => "Devil"
            ],
            [
                'code' => "diamond",
                'image' => "assets/images/src/clipart/Diamond.png",
                'name' => "Diamond 1"
            ],
            [
                'code' => "diamond-2",
                'image' => "assets/images/src/clipart/Diamond-2.png",
                'name' => "Diamond 2"
            ],
            [
                'code' => "diamond-3",
                'image' => "assets/images/src/clipart/Diamond-3.png",
                'name' => "Diamond 3"
            ],
            [
                'code' => "dove",
                'image' => "assets/images/src/clipart/Dove.png",
                'name' => "Dove"
            ],
            [
                'code' => "duck",
                'image' => "assets/images/src/clipart/Duck.png",
                'name' => "Duck"
            ],
            [
                'code' => "eagle",
                'image' => "assets/images/src/clipart/Eagle.png",
                'name' => "Eagle"
            ],
            [
                'code' => "earth",
                'image' => "assets/images/src/clipart/Earth.png",
                'name' => "Earth"
            ],
            [
                'code' => "eye",
                'image' => "assets/images/src/clipart/Eye.png",
                'name' => "Eye"
            ],
            [
                'code' => "female",
                'image' => "assets/images/src/clipart/Female.png",
                'name' => "Female"
            ],
            [
                'code' => "fish",
                'image' => "assets/images/src/clipart/Fish.png",
                'name' => "Fish 1"
            ],
            [
                'code' => "fish-1",
                'image' => "assets/images/src/clipart/Fish-1.png",
                'name' => "Fish 2"
            ],
            [
                'code' => "flower-1",
                'image' => "assets/images/src/clipart/Flower-1.png",
                'name' => "Flower 1"
            ],
            [
                'code' => "flower-2",
                'image' => "assets/images/src/clipart/Flower-2.png",
                'name' => "Flower 2"
            ],
            [
                'code' => "flower-8",
                'image' => "assets/images/src/clipart/Flower-8.png",
                'name' => "Flower 3"
            ],
            [
                'code' => "flower-12",
                'image' => "assets/images/src/clipart/Flower-12.png",
                'name' => "Flower 4"
            ],
            [
                'code' => "foot",
                'image' => "assets/images/src/clipart/Foot.png",
                'name' => "Foot"
            ],
            [
                'code' => "football",
                'image' => "assets/images/src/clipart/Football.png",
                'name' => "Football"
            ],
            [
                'code' => "frog-2",
                'image' => "assets/images/src/clipart/Frog-2.png",
                'name' => "Frog"
            ],
            [
                'code' => "girl-1",
                'image' => "assets/images/src/clipart/Girl-1.png",
                'name' => "Girl 1"
            ],
            [
                'code' => "girl-2",
                'image' => "assets/images/src/clipart/Girl-2.png",
                'name' => "Girl 2"
            ],
            [
                'code' => "golf-2",
                'image' => "assets/images/src/clipart/Golf-2.png",
                'name' => "Golf"
            ],
            [
                'code' => "graduates",
                'image' => "assets/images/src/clipart/Graduates.png",
                'name' => "Graduates"
            ],
            [
                'code' => "grim-reaper",
                'image' => "assets/images/src/clipart/GrimReaper.png",
                'name' => "Grim Reaper"
            ],
            [
                'code' => "guitar",
                'image' => "assets/images/src/clipart/Guitar.png",
                'name' => "Guitar"
            ],
            [
                'code' => "hand-2",
                'image' => "assets/images/src/clipart/Hand-2.png",
                'name' => "Hand"
            ],
            [
                'code' => "heart-1",
                'image' => "assets/images/src/clipart/Heart-1.png",
                'name' => "Heart 1"
            ],
            [
                'code' => "heart-4",
                'image' => "assets/images/src/clipart/Heart-4.png",
                'name' => "Heart 2"
            ],
            [
                'code' => "heart-5",
                'image' => "assets/images/src/clipart/Heart-5.png",
                'name' => "Heart 3"
            ],
            [
                'code' => "hockey",
                'image' => "assets/images/src/clipart/Hockey.png",
                'name' => "Hockey"
            ],
            [
                'code' => "horse",
                'image' => "assets/images/src/clipart/Horse.png",
                'name' => "Horse 1"
            ],
            [
                'code' => "horse-1",
                'image' => "assets/images/src/clipart/Horse-1.png",
                'name' => "Horse 2"
            ],
            [
                'code' => "horse-2",
                'image' => "assets/images/src/clipart/Horse-2.png",
                'name' => "Horse 3"
            ],
            [
                'code' => "horse-shoe",
                'image' => "assets/images/src/clipart/HorseShoe.png",
                'name' => "Horse Shoe"
            ],
            [
                'code' => "love",
                'image' => "assets/images/src/clipart/Love.png",
                'name' => "Love"
            ],
            [
                'code' => "male",
                'image' => "assets/images/src/clipart/Male.png",
                'name' => "Male"
            ],
            [
                'code' => "maple",
                'image' => "assets/images/src/clipart/Maple.png",
                'name' => "Maple"
            ],
            [
                'code' => "music",
                'image' => "assets/images/src/clipart/Music.png",
                'name' => "Music"
            ],
            [
                'code' => "note",
                'image' => "assets/images/src/clipart/Note.png",
                'name' => "Note"
            ],
            [
                'code' => "paw",
                'image' => "assets/images/src/clipart/Paw.png",
                'name' => "Paw 1"
            ],
            [
                'code' => "paws",
                'image' => "assets/images/src/clipart/Paws.png",
                'name' => "Paw 2"
            ],
            [
                'code' => "peace",
                'image' => "assets/images/src/clipart/Peace.png",
                'name' => "Peace"
            ],
            [
                'code' => "plane-1",
                'image' => "assets/images/src/clipart/Plane-1.png",
                'name' => "Plane"
            ],
            [
                'code' => "plus",
                'image' => "assets/images/src/clipart/Plus.png",
                'name' => "Plus"
            ],
            [
                'code' => "poison",
                'image' => "assets/images/src/clipart/Poison.png",
                'name' => "Poison"
            ],
            [
                'code' => "puzzle",
                'image' => "assets/images/src/clipart/Puzzle.png",
                'name' => "Puzzle"
            ],
            [
                'code' => "race",
                'image' => "assets/images/src/clipart/Race.png",
                'name' => "Race"
            ],
            [
                'code' => "racing",
                'image' => "assets/images/src/clipart/Racing.png",
                'name' => "Racing"
            ],
            [
                'code' => "recycle",
                'image' => "assets/images/src/clipart/Recycle.png",
                'name' => "Recycle"
            ],
            [
                'code' => "ribbon",
                'image' => "assets/images/src/clipart/Ribbon.png",
                'name' => "Ribbon"
            ],
            [
                'code' => "ribbon-1",
                'image' => "assets/images/src/clipart/Ribbon-1.png",
                'name' => "Ribbon 1"
            ],
            [
                'code' => "ribbon-2",
                'image' => "assets/images/src/clipart/Ribbon-2.png",
                'name' => "Ribbon 2"
            ],
            [
                'code' => "rock-1",
                'image' => "assets/images/src/clipart/Rock-1.png",
                'name' => "Rock"
            ],
            [
                'code' => "safety-pin",
                'image' => "assets/images/src/clipart/SafetyPin.png",
                'name' => "Safety Pin"
            ],
            [
                'code' => "shark",
                'image' => "assets/images/src/clipart/Shark.png",
                'name' => "Shark"
            ],
            [
                'code' => "ship-wheel",
                'image' => "assets/images/src/clipart/Ship-Wheel.png",
                'name' => "Ship Wheel"
            ],
            [
                'code' => "smile-1",
                'image' => "assets/images/src/clipart/Smile-1.png",
                'name' => "Smile 1"
            ],
            [
                'code' => "smile-3",
                'image' => "assets/images/src/clipart/Smile-3.png",
                'name' => "Smile 2"
            ],
            [
                'code' => "smile-4",
                'image' => "assets/images/src/clipart/Smile-4.png",
                'name' => "Smile 3"
            ],
            [
                'code' => "soccer",
                'image' => "assets/images/src/clipart/Soccer.png",
                'name' => "Soccer"
            ],
            [
                'code' => "star-1",
                'image' => "assets/images/src/clipart/Star-1.png",
                'name' => "Star 1"
            ],
            [
                'code' => "star-2",
                'image' => "assets/images/src/clipart/Star-2.png",
                'name' => "Star 2"
            ],
            [
                'code' => "star-4",
                'image' => "assets/images/src/clipart/Star-4.png",
                'name' => "Star 3"
            ],
            [
                'code' => "star-of-david",
                'image' => "assets/images/src/clipart/StarofDavid.png",
                'name' => "Star of David"
            ],
            [
                'code' => "superman-2",
                'image' => "assets/images/src/clipart/Superman-2.png",
                'name' => "Superman"
            ],
            [
                'code' => "swim",
                'image' => "assets/images/src/clipart/Swim.png",
                'name' => "Swim"
            ],
            [
                'code' => "tree",
                'image' => "assets/images/src/clipart/Tree.png",
                'name' => "Tree"
            ],
            [
                'code' => "umbrella",
                'image' => "assets/images/src/clipart/Umbrella.png",
                'name' => "Umbrella"
            ],
            [
                'code' => "us-flag",
                'image' => "assets/images/src/clipart/US-Flag.png",
                'name' => "US Flag"
            ],
            [
                'code' => "weed",
                'image' => "assets/images/src/clipart/Weed.png",
                'name' => "Weed"
            ],
            [
                'code' => "yinyang",
                'image' => "assets/images/src/clipart/Yingyang.png",
                'name' => "Yinyang"
            ]
        ];
    }

}
