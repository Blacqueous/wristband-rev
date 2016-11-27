<?php

namespace App\Wristbands\Classes;

use Storage;

class FontList {

	public function reset()
	{
		// reset list for available wristband cliparts.
		Storage::put('json/wristband/fonts/list.json', json_encode($this->fonts()));
	}

	public function getList()
	{
		// return all available wristband cliparts.
        return $this->getFonts();
    }

	public function getFonts()
	{
		// check if .json file exists.
		if(!Storage::has('json/wristband/fonts/list.json')) {
			// generate and save .json file.
			Storage::put('json/wristband/fonts/list.json', json_encode($this->fonts()));
		}
		// return data from .json file.
		return json_decode(Storage::get('json/wristband/fonts/list.json'), true);
	}

    private static function fonts()
    {
        return [
            [
                'code' => "aardvark-cafe",
                'font' => "assets/fonts/aardvark_cafe.TTF",
                'image' => "assets/images/src/fonts/Aarvarkcafe.png",
                'name' => "Aardvark Cafe"
            ],
            [
                'code' => "adobe-garamond-bold",
                'font' => "assets/fonts/Adobe_Garamond_Bold.otf",
                'image' => "assets/images/src/fonts/Adobegaramondbold.png",
                'name' => "Adobe Garamond Bold"
            ],
            [
                'code' => "air-stream",
                'font' => "assets/fonts/Air_Stream.TTF",
                'image' => "assets/images/src/fonts/Airstream.png",
                'name' => "Air Stream"
            ],
            [
                'code' => "akzidenz-grotesk-bq",
                'font' => "assets/fonts/AkzidenzGroteskBQ-Cnd.otf",
                'image' => "assets/images/src/fonts/Akzidenzgroteskbq-reg.png",
                'name' => "Akzidenz Grotesk BQ"
            ],
            [
                'code' => "aldo-semibold",
                'font' => "assets/fonts/Aldo_PC.ttf",
                'image' => "assets/images/src/fonts/Aldosemibold.png",
                'name' => "Aldo Semibold"
            ],
            [
                'code' => "andy-bold",
                'font' => "assets/fonts/ANDY-BOLD.TTF",
                'image' => "assets/images/src/fonts/Anybold.png",
                'name' => "Andy Bold"
            ],
            [
                'code' => "arial-black",
                'font' => "assets/fonts/ARIAL-BLACK.ttf",
                'image' => "assets/images/src/fonts/Arialblack.png",
                'name' => "Arial Black"
            ],
            [
                'code' => "arial-bold",
                'font' => "assets/fonts/ARIAL-BOLD.ttf",
                'image' => "assets/images/src/fonts/Arialold.png",
                'name' => "Arial Bold"
            ],
            [
                'code' => "arial-narrow",
                'font' => "assets/fonts/arial-narrow.TTF",
                'image' => "assets/images/src/fonts/Arialnarrow.png",
                'name' => "Arial Narrow"
            ],
            [
                'code' => "arial-rounded",
                'font' => "assets/fonts/ARLRDBD.TTF",
                'image' => "assets/images/src/fonts/Arialrounded.png",
                'name' => "Arial Rounded"
            ],
            [
                'code' => "arno-pro",
                'font' => "assets/fonts/ArnoPro-Regular.otf",
                'image' => "assets/images/src/fonts/Arnopro.png",
                'name' => "Arno Pro"
            ],
            [
                'code' => "artbrush",
                'font' => "assets/fonts/Artbrush.ttf",
                'image' => "assets/images/src/fonts/Artbrush.png",
                'name' => "Artbrush"
            ],
            [
                'code' => "bauhaus",
                'font' => "assets/fonts/Bauhaus.ttf",
                'image' => "assets/images/src/fonts/Bauhaus.png",
                'name' => "Bauhaus"
            ],
            [
                'code' => "beachtype",
                'font' => "assets/fonts/BEACHTYP.TTF",
                'image' => "assets/images/src/fonts/BeachTypeMedium.png",
                'name' => "Beach Type Medium"
            ],
            [
                'code' => "beans",
                'font' => "assets/fonts/beansfont.ttf",
                'image' => "assets/images/src/fonts/Beans.png",
                'name' => "Beans"
            ],
            [
                'code' => "beatsville",
                'font' => "assets/fonts/beatsvil.ttf",
                'image' => "assets/images/src/fonts/Beatsvilleregular.png",
                'name' => "Beatsville Regular"
            ],
            [
                'code' => "bellbuttom",
                'font' => "assets/fonts/BELLBOTT.TTF",
                'image' => "assets/images/src/fonts/Bellbuttom.png",
                'name' => "Bellbuttom"
            ],
            [
                'code' => "berlin-sans-fb",
                'font' => "assets/fonts/BRLNSR.TTF",
                'image' => "assets/images/src/fonts/Berlinsansfb.png",
                'name' => "Berlin Sans FB"
            ],
            [
                'code' => "black-wolf",
                'font' => "assets/fonts/BlackWolf.ttf",
                'image' => "assets/images/src/fonts/Blackwolf.png",
                'name' => "Black Wolf"
            ],
            [
                'code' => "bladerunnermovie",
                'font' => "assets/fonts/BLADRMF_.TTF",
                'image' => "assets/images/src/fonts/BLADERUNNERMOVIE.png",
                'name' => "Blade Runner"
            ],
            [
                'code' => "boisterblack",
                'font' => "assets/fonts/Boisterb.ttf",
                'image' => "assets/images/src/fonts/Boisterblack.png",
                'name' => "Boisterblack"
            ],
            [
                'code' => "bookman-old-style",
                'font' => "assets/fonts/BOOKOS.TTF",
                'image' => "assets/images/src/fonts/Bookmanoldstyle.png",
                'name' => "Bookman Old Style"
            ],
            [
                'code' => "candara",
                'font' => "assets/fonts/Candara.ttf",
                'image' => "assets/images/src/fonts/Candara.png",
                'name' => "Candara"
            ],
            [
                'code' => "cheri",
                'font' => "assets/fonts/CHERI___.TTF",
                'image' => "assets/images/src/fonts/Cheri.png",
                'name' => "Cheri"
            ],
            [
                'code' => "chowfun",
                'font' => "assets/fonts/CHOWFUN.TTF",
                'image' => "assets/images/src/fonts/Chowfun.png",
                'name' => "Chowfun"
            ],
            [
                'code' => "chunkfive",
                'font' => "assets/fonts/Chunkfive.otf",
                'image' => "assets/images/src/fonts/Chunkfive.png",
                'name' => "Chunkfive"
            ],
            [
                'code' => "college",
                'font' => "assets/fonts/college.ttf",
                'image' => "assets/images/src/fonts/COLLEGE.png",
                'name' => "College"
            ],
            [
                'code' => "colony-wars",
                'font' => "assets/fonts/Colony-Wars.ttf",
                'image' => "assets/images/src/fonts/COLONYWARS.png",
                'name' => "Colony Wars"
            ],
            [
                'code' => "comic-sans-ms",
                'font' => "assets/fonts/comic_0.ttf",
                'image' => "assets/images/src/fonts/Comicsansms.png",
                'name' => "Comic Sans MS"
            ],
            [
                'code' => "cooper-black-std",
                'font' => "assets/fonts/CooperBlackStd.otf",
                'image' => "assets/images/src/fonts/Cooperblack.png",
                'name' => "Cooper Black Std"
            ],
            [
                'code' => "creepers",
                'font' => "assets/fonts/Creepers.ttf",
                'image' => "assets/images/src/fonts/CREEPERS.png",
                'name' => "Creepers"
            ],
            [
                'code' => "decker",
                'font' => "assets/fonts/Decker.ttf",
                'image' => "assets/images/src/fonts/Decker.png",
                'name' => "Decker"
            ],
            [
                'code' => "denmark",
                'font' => "assets/fonts/denmark.ttf",
                'image' => "assets/images/src/fonts/Denmark.png",
                'name' => "Denmark"
            ],
            [
                'code' => "dirty-bakers-dozen",
                'font' => "assets/fonts/dirty-bakers-dozen.ttf",
                'image' => "assets/images/src/fonts/DIRTYBAKERSDOZEN.png",
                'name' => "Dirty Bakers Dozen"
            ],
            [
                'code' => "east-market",
                'font' => "assets/fonts/EASTMARK.TTF",
                'image' => "assets/images/src/fonts/Eastmarket.png",
                'name' => "East Market"
            ],
            [
                'code' => "elephant",
                'font' => "assets/fonts/ELEPHNT.TTF",
                'image' => "assets/images/src/fonts/Elephant.png",
                'name' => "Elephant"
            ],
            [
                'code' => "final-frontier-old-style",
                'font' => "assets/fonts/FINALOLD.TTF",
                'image' => "assets/images/src/fonts/FinalFrontieroldstyle.png",
                'name' => "Final Frontier Old Style"
            ],
            [
                'code' => "franklin-gothic-medium",
                'font' => "assets/fonts/framd.ttf",
                'image' => "assets/images/src/fonts/Franklingothicmedium.png",
                'name' => "Franklin Gothic Medium"
            ],
            [
                'code' => "freedom-fighter",
                'font' => "assets/fonts/",
                'image' => "assets/images/src/fonts/FREEDOMFIGHTER.png",
                'name' => "Freedom Fighter"
            ],
            [
                'code' => "Freestyle-script",
                'font' => "assets/fonts/freedomfighter.ttf",
                'image' => "assets/images/src/fonts/Freestylescript.png",
                'name' => "Freestyle Script"
            ],
            [
                'code' => "garamond-regular",
                'font' => "assets/fonts/Garamond-Regular.ttf",
                'image' => "assets/images/src/fonts/Garamond.png",
                'name' => "Garamond Regular"
            ],
            [
                'code' => "harrington",
                'font' => "assets/fonts/HARNGTON.TTF",
                'image' => "assets/images/src/fonts/Harrington.png",
                'name' => "Harrington"
            ],
            [
                'code' => "hotpizza",
                'font' => "assets/fonts/hotpizza.ttf",
                'image' => "assets/images/src/fonts/Hotpizza.png",
                'name' => "Hot Pizza"
            ],
            [
                'code' => "impact",
                'font' => "assets/fonts/impact_0.ttf",
                'image' => "assets/images/src/fonts/Impact.png",
                'name' => "Impact"
            ],
            [
                'code' => "kingrichard",
                'font' => "assets/fonts/kingrichard.ttf",
                'image' => "assets/images/src/fonts/Kingrichard.png",
                'name' => "King Richard"
            ],
            [
                'code' => "komika-boogie",
                'font' => "assets/fonts/KOMIKABG.ttf",
                'image' => "assets/images/src/fonts/Komikaboogie.png",
                'name' => "Komika Boogie"
            ],
            [
                'code' => "lucida-console",
                'font' => "assets/fonts/lucon_0.ttf",
                'image' => "assets/images/src/fonts/Lucidaconsole.png",
                'name' => "Lucida Console"
            ],
            [
                'code' => "metal-storm",
                'font' => "assets/fonts/metalstorm.ttf",
                'image' => "assets/images/src/fonts/Metalstorm.png",
                'name' => "Metal Storm"
            ],
            [
                'code' => "metrolox",
                'font' => "assets/fonts/METROLOX.ttf",
                'image' => "assets/images/src/fonts/Metrolox.png",
                'name' => "Metrolox"
            ],
            [
                'code' => "monotype-corsiva",
                'font' => "assets/fonts/MTCORSVA.TTF",
                'image' => "assets/images/src/fonts/Monotypecorsiva.png",
                'name' => "Monotype Corsiva"
            ],
            [
                'code' => "myriad-pro",
                'font' => "assets/fonts/MyriadPro-Regular.otf",
                'image' => "assets/images/src/fonts/Myriadpro.png",
                'name' => "Myriad Pro"
            ],
            [
                'code' => "nickelodeon",
                'font' => "assets/fonts/NickelodeonNF.ttf",
                'image' => "assets/images/src/fonts/Nikelodeon.png",
                'name' => "Nickelodeon"
            ],
            [
                'code' => "pacifico",
                'font' => "assets/fonts/Pacifico.ttf",
                'image' => "assets/images/src/fonts/Pacifico.png",
                'name' => "Pacifico"
            ],
            [
                'code' => "Palatinolinotype",
                'font' => "assets/fonts/pala_0.ttf",
                'image' => "assets/images/src/fonts/Palatinolinotype.png",
                'name' => "Palatinolinotype"
            ],
            [
                'code' => "permanent-marker",
                'font' => "assets/fonts/PermanentMarker.ttf",
                'image' => "assets/images/src/fonts/Permanentmarker.png",
                'name' => "Permanent Marker"
            ],
            [
                'code' => "scriptmtstd",
                'font' => "assets/fonts/SCRIPTBL.TTF",
                'image' => "assets/images/src/fonts/Scriptmtstd.png",
                'name' => "Scriptmtstd"
            ],
            [
                'code' => "showcard-gothic",
                'font' => "assets/fonts/SHOWG.TTF",
                'image' => "assets/images/src/fonts/Showcardgothic.png",
                'name' => "Showcard Gothic"
            ],
            [
                'code' => "spooky-magic",
                'font' => "assets/fonts/SpookyMagic.ttf",
                'image' => "assets/images/src/fonts/Spookymagic.png",
                'name' => "Spooky Magic"
            ],
            [
                'code' => "swagger",
                'font' => "assets/fonts/Swagger.ttf",
                'image' => "assets/images/src/fonts/Swagger.png",
                'name' => "Swagger"
            ],
            [
                'code' => "tahoma",
                'font' => "assets/fonts/tahoma_0.ttf",
                'image' => "assets/images/src/fonts/Tahoma.png",
                'name' => "Tahoma"
            ],
            [
                'code' => "times-roman",
                'font' => "assets/fonts/times_0.ttf",
                'image' => "assets/images/src/fonts/Timesroman.png",
                'name' => "Times Roman"
            ],
            [
                'code' => "transformers",
                'font' => "assets/fonts/transfrm.ttf",
                'image' => "assets/images/src/fonts/Transformersmovie.png",
                'name' => "Transformers"
            ],
            [
                'code' => "trebuchet-ms",
                'font' => "assets/fonts/trebuc_0.ttf",
                'image' => "assets/images/src/fonts/Trebuchetms.png",
                'name' => "Trebuchet MS"
            ],
            [
                'code' => "trekker-two",
                'font' => "assets/fonts/trekker-two-regular-1361513282.ttf",
                'image' => "assets/images/src/fonts/Trekkertwo.png",
                'name' => "Trekker Two"
            ],
            [
                'code' => "tristan",
                'font' => "assets/fonts/tristan.ttf",
                'image' => "assets/images/src/fonts/Tristan.png",
                'name' => "Tristan"
            ],
            [
                'code' => "tweedledee",
                'font' => "assets/fonts/Tweedledee-Bold.ttf",
                'image' => "assets/images/src/fonts/Tweedledee.png",
                'name' => "Tweedledee Bold"
            ],
            [
                'code' => "victorian-let",
                'font' => "assets/fonts/Victorian-LET.ttf",
                'image' => "assets/images/src/fonts/Victorianlet.png",
                'name' => "Victorian LET"
            ],
            [
                'code' => "wantedms4",
                'font' => "assets/fonts/WantedM54.ttf",
                'image' => "assets/images/src/fonts/Wantedms4.png",
                'name' => "WantedM54"
            ],
            [
                'code' => "wicked-scary-movie",
                'font' => "assets/fonts/WickedScaryMovie.ttf",
                'image' => "assets/images/src/fonts/Wickedscarymovie.png",
                'name' => "Wicked Scary Movie"
            ]
        ];
    }

}
