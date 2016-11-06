<?php

namespace App\Wristbands\Classes;

use Storage;

class ColorsList {

	public function reset()
	{
		// regular style wristbands.
		Storage::put('json/wristband/colors/list.json', json_encode($this->colors()));
	}

	public function getList()
	{
        //
        return $this->getColors();
    }

	public function getColors()
	{
		// check if .json file exists.
		if(!Storage::has('json/wristband/colors/list.json')) {
			// generate and save .json file.
			Storage::put('json/wristband/colors/list.json', json_encode($this->colors()));
		}
		// return data from .json file.
		return json_decode(Storage::get('json/wristband/colors/list.json'), true);
	}

    private static function colors()
    {
        return [
            [
                'id' => "0",
                'color' => "f8f8f8",
                'name' => "White"
            ],
            [
                'id' => "1",
                'color' => "000000",
                'name' => "Black"
            ],
            [
                'id' => "2",
                'color' => "f20018",
                'name' => "Red"
            ],
            [
                'id' => "3",
                'color' => "fb7901",
                'name' => "Orange"
            ],
            [
                'id' => "4",
                'color' => "fbe015",
                'name' => "Yellow"
            ],
            [
                'id' => "5",
                'color' => "cd9b66",
                'name' => "Light Brown"
            ],
            [
                'id' => "6",
                'color' => "904702",
                'name' => "Brown"
            ],
            [
                'id' => "7",
                'color' => "84bdda",
                'name' => "Light Blue"
            ],
            [
                'id' => "8",
                'color' => "0434b2",
                'name' => "Blue"
            ],
            [
                'id' => "9",
                'color' => "291c8e",
                'name' => "Royal Blue"
            ],
            [
                'id' => "10",
                'color' => "7a0172",
                'name' => "Lavender"
            ],
            [
                'id' => "11",
                'color' => "7ee502",
                'name' => "Lime Green"
            ],
            [
                'id' => "12",
                'color' => "008000",
                'name' => "Green"
            ],
            [
                'id' => "13",
                'color' => "1f6b67",
                'name' => "Teal"
            ],
            [
                'id' => "14",
                'color' => "808080",
                'name' => "Gray"
            ],
            [
                'id' => "15",
                'color' => "fe1a7b",
                'name' => "Hot Pink"
            ],
            [
                'id' => "16",
                'color' => "d8b511",
                'name' => "100"
            ],
            [
                'id' => "17",
                'color' => "f4ed47",
                'name' => "101"
            ],
            [
                'id' => "18",
                'color' => "f8e914",
                'name' => "102"
            ],
            [
                'id' => "19",
                'color' => "c4ac0c",
                'name' => "103"
            ],
            [
                'id' => "20",
                'color' => "ac990c",
                'name' => "104"
            ],
            [
                'id' => "21",
                'color' => "80740e",
                'name' => "105"
            ],
            [
                'id' => "22",
                'color' => "f7e859",
                'name' => "106"
            ],
            [
                'id' => "23",
                'color' => "f9e526",
                'name' => "107"
            ],
            [
                'id' => "24",
                'color' => "f8dc16",
                'name' => "108"
            ],
            [
                'id' => "25",
                'color' => "f9d716",
                'name' => "109"
            ],
            [
                'id' => "26",
                'color' => "d8b511",
                'name' => "110"
            ],
            [
                'id' => "27",
                'color' => "aa9309",
                'name' => "111"
            ],
            [
                'id' => "28",
                'color' => "988409",
                'name' => "112"
            ],
            [
                'id' => "29",
                'color' => "f8e55b",
                'name' => "113"
            ],
            [
                'id' => "30",
                'color' => "fae24c",
                'name' => "114"
            ],
            [
                'id' => "31",
                'color' => "fae04d",
                'name' => "115"
            ],
            [
                'id' => "32",
                'color' => "fdd116",
                'name' => "116"
            ],
            [
                'id' => "33",
                'color' => "c59f0c",
                'name' => "117"
            ],
            [
                'id' => "34",
                'color' => "aa8e09",
                'name' => "118"
            ],
            [
                'id' => "35",
                'color' => "8d7920",
                'name' => "119"
            ],
            [
                'id' => "36",
                'color' => "fae280",
                'name' => "120"
            ],
            [
                'id' => "37",
                'color' => "fae071",
                'name' => "121"
            ],
            [
                'id' => "38",
                'color' => "fdd856",
                'name' => "122"
            ],
            [
                'id' => "39",
                'color' => "fec61b",
                'name' => "123"
            ],
            [
                'id' => "40",
                'color' => "e0a90e",
                'name' => "124"
            ],
            [
                'id' => "41",
                'color' => "b48c09",
                'name' => "125"
            ],
            [
                'id' => "42",
                'color' => "f7e7a9",
                'name' => "1205"
            ],
            [
                'id' => "43",
                'color' => "fdde8c",
                'name' => "1215"
            ],
            [
                'id' => "44",
                'color' => "fecc49",
                'name' => "1225"
            ],
            [
                'id' => "45",
                'color' => "fdb515",
                'name' => "1235"
            ],
            [
                'id' => "46",
                'color' => "c0910d",
                'name' => "1245"
            ],
            [
                'id' => "47",
                'color' => "a47f14",
                'name' => "1255"
            ],
            [
                'id' => "48",
                'color' => "7d6316",
                'name' => "1265"
            ],
            [
                'id' => "49",
                'color' => "f3e286",
                'name' => "127"
            ],
            [
                'id' => "50",
                'color' => "f4da5f",
                'name' => "128"
            ],
            [
                'id' => "51",
                'color' => "f3d13c",
                'name' => "129"
            ],
            [
                'id' => "52",
                'color' => "eaae0f",
                'name' => "130"
            ],
            [
                'id' => "53",
                'color' => "c7930b",
                'name' => "131"
            ],
            [
                'id' => "54",
                'color' => "9d7c09",
                'name' => "132"
            ],
            [
                'id' => "55",
                'color' => "705b0a",
                'name' => "133"
            ],
            [
                'id' => "56",
                'color' => "ffd880",
                'name' => "134"
            ],
            [
                'id' => "57",
                'color' => "fecd88",
                'name' => "135"
            ],
            [
                'id' => "58",
                'color' => "fcbe4d",
                'name' => "136"
            ],
            [
                'id' => "59",
                'color' => "fca311",
                'name' => "137"
            ],
            [
                'id' => "60",
                'color' => "d88c02",
                'name' => "138"
            ],
            [
                'id' => "61",
                'color' => "af7605",
                'name' => "139"
            ],
            [
                'id' => "62",
                'color' => "7c5c13",
                'name' => "140"
            ],
            [
                'id' => "63",
                'color' => "fed691",
                'name' => "1345"
            ],
            [
                'id' => "64",
                'color' => "ffce8c",
                'name' => "1355"
            ],
            [
                'id' => "65",
                'color' => "fbbc5b",
                'name' => "1365"
            ],
            [
                'id' => "66",
                'color' => "f89c0d",
                'name' => "1375"
            ],
            [
                'id' => "67",
                'color' => "cd7a02",
                'name' => "1385"
            ],
            [
                'id' => "68",
                'color' => "996007",
                'name' => "1395"
            ],
            [
                'id' => "69",
                'color' => "6b4713",
                'name' => "1405"
            ],
            [
                'id' => "70",
                'color' => "f1ce68",
                'name' => "141"
            ],
            [
                'id' => "71",
                'color' => "f2bf49",
                'name' => "142"
            ],
            [
                'id' => "72",
                'color' => "eeb22d",
                'name' => "143"
            ],
            [
                'id' => "73",
                'color' => "e28c05",
                'name' => "144"
            ],
            [
                'id' => "74",
                'color' => "c68007",
                'name' => "145"
            ],
            [
                'id' => "75",
                'color' => "9f6b05",
                'name' => "146"
            ],
            [
                'id' => "76",
                'color' => "735e27",
                'name' => "147"
            ],
            [
                'id' => "77",
                'color' => "ffd79c",
                'name' => "148"
            ],
            [
                'id' => "78",
                'color' => "fdcc92",
                'name' => "149"
            ],
            [
                'id' => "79",
                'color' => "fdad56",
                'name' => "150"
            ],
            [
                'id' => "80",
                'color' => "f67f00",
                'name' => "151"
            ],
            [
                'id' => "81",
                'color' => "de7500",
                'name' => "152"
            ],
            [
                'id' => "82",
                'color' => "bc6c09",
                'name' => "153"
            ],
            [
                'id' => "83",
                'color' => "9a5905",
                'name' => "154"
            ],
            [
                'id' => "84",
                'color' => "fdb877",
                'name' => "1485"
            ],
            [
                'id' => "85",
                'color' => "fc973b",
                'name' => "1495"
            ],
            [
                'id' => "86",
                'color' => "f57d02",
                'name' => "1505"
            ],
            [
                'id' => "87",
                'color' => "ef6b00",
                'name' => "021"
            ],
            [
                'id' => "88",
                'color' => "b45400",
                'name' => "1525"
            ],
            [
                'id' => "89",
                'color' => "8d4400",
                'name' => "1535"
            ],
            [
                'id' => "90",
                'color' => "4d290f",
                'name' => "1545"
            ],
            [
                'id' => "91",
                'color' => "f3dcaa",
                'name' => "155"
            ],
            [
                'id' => "92",
                'color' => "f3c68d",
                'name' => "156"
            ],
            [
                'id' => "93",
                'color' => "f1a456",
                'name' => "157"
            ],
            [
                'id' => "94",
                'color' => "e97512",
                'name' => "158"
            ],
            [
                'id' => "95",
                'color' => "c15d00",
                'name' => "159"
            ],
            [
                'id' => "96",
                'color' => "9d530a",
                'name' => "160"
            ],
            [
                'id' => "97",
                'color' => "653a10",
                'name' => "161"
            ],
            [
                'id' => "98",
                'color' => "fabf9f",
                'name' => "1555"
            ],
            [
                'id' => "99",
                'color' => "faa678",
                'name' => "1565"
            ],
            [
                'id' => "100",
                'color' => "fc8742",
                'name' => "1575"
            ],
            [
                'id' => "101",
                'color' => "f96b09",
                'name' => "1585"
            ],
            [
                'id' => "102",
                'color' => "d25c05",
                'name' => "1595"
            ],
            [
                'id' => "103",
                'color' => "a04f0e",
                'name' => "1605"
            ],
            [
                'id' => "104",
                'color' => "823e0d",
                'name' => "1615"
            ],
            [
                'id' => "105",
                'color' => "f8c6ab",
                'name' => "162"
            ],
            [
                'id' => "106",
                'color' => "fd9e70",
                'name' => "163"
            ],
            [
                'id' => "107",
                'color' => "fc7f3f",
                'name' => "164"
            ],
            [
                'id' => "108",
                'color' => "f86404",
                'name' => "165"
            ],
            [
                'id' => "109",
                'color' => "db5901",
                'name' => "166"
            ],
            [
                'id' => "110",
                'color' => "b9500f",
                'name' => "167"
            ],
            [
                'id' => "111",
                'color' => "6c2f10",
                'name' => "168"
            ],
            [
                'id' => "112",
                'color' => "f9a58b",
                'name' => "1625"
            ],
            [
                'id' => "113",
                'color' => "fa8f6d",
                'name' => "1635"
            ],
            [
                'id' => "114",
                'color' => "fa7143",
                'name' => "1645"
            ],
            [
                'id' => "115",
                'color' => "fa5601",
                'name' => "1655"
            ],
            [
                'id' => "116",
                'color' => "f95500",
                'name' => "1665"
            ],
            [
                'id' => "117",
                'color' => "a53f0f",
                'name' => "1675"
            ],
            [
                'id' => "118",
                'color' => "853713",
                'name' => "1685"
            ],
            [
                'id' => "119",
                'color' => "f7baa8",
                'name' => "169"
            ],
            [
                'id' => "120",
                'color' => "f88a73",
                'name' => "170"
            ],
            [
                'id' => "121",
                'color' => "fb5f39",
                'name' => "171"
            ],
            [
                'id' => "122",
                'color' => "f64904",
                'name' => "172"
            ],
            [
                'id' => "123",
                'color' => "d24615",
                'name' => "173"
            ],
            [
                'id' => "124",
                'color' => "963313",
                'name' => "174"
            ],
            [
                'id' => "125",
                'color' => "6b321f",
                'name' => "175"
            ],
            [
                'id' => "126",
                'color' => "f9afae",
                'name' => "176"
            ],
            [
                'id' => "127",
                'color' => "f9827e",
                'name' => "177"
            ],
            [
                'id' => "128",
                'color' => "f95e5a",
                'name' => "178"
            ],
            [
                'id' => "129",
                'color' => "f93f26",
                'name' => "Warm Red"
            ],
            [
                'id' => "130",
                'color' => "e23d29",
                'name' => "179"
            ],
            [
                'id' => "131",
                'color' => "c13828",
                'name' => "180"
            ],
            [
                'id' => "132",
                'color' => "7a2d23",
                'name' => "181"
            ],
            [
                'id' => "133",
                'color' => "f99ea3",
                'name' => "1765"
            ],
            [
                'id' => "134",
                'color' => "f9848d",
                'name' => "1775"
            ],
            [
                'id' => "135",
                'color' => "fd4f58",
                'name' => "1785"
            ],
            [
                'id' => "136",
                'color' => "ee2a2c",
                'name' => "1788"
            ],
            [
                'id' => "137",
                'color' => "d62829",
                'name' => "1795"
            ],
            [
                'id' => "138",
                'color' => "ae2626",
                'name' => "1805"
            ],
            [
                'id' => "139",
                'color' => "7b221e",
                'name' => "1815"
            ],
            [
                'id' => "140",
                'color' => "f9b2b8",
                'name' => "1767"
            ],
            [
                'id' => "141",
                'color' => "fd6675",
                'name' => "1777"
            ],
            [
                'id' => "142",
                'color' => "f53f4e",
                'name' => "1787"
            ],
            [
                'id' => "143",
                'color' => "ee2a2c",
                'name' => "032"
            ],
            [
                'id' => "144",
                'color' => "d02b31",
                'name' => "1797"
            ],
            [
                'id' => "145",
                'color' => "a13034",
                'name' => "1807"
            ],
            [
                'id' => "146",
                'color' => "592e28",
                'name' => "1817"
            ],
            [
                'id' => "147",
                'color' => "fabfc1",
                'name' => "182"
            ],
            [
                'id' => "148",
                'color' => "fb8d9a",
                'name' => "183"
            ],
            [
                'id' => "149",
                'color' => "fc5f72",
                'name' => "184"
            ],
            [
                'id' => "150",
                'color' => "e7122e",
                'name' => "185"
            ],
            [
                'id' => "151",
                'color' => "ce1127",
                'name' => "186"
            ],
            [
                'id' => "152",
                'color' => "af1e2d",
                'name' => "187"
            ],
            [
                'id' => "153",
                'color' => "7b2228",
                'name' => "188"
            ],
            [
                'id' => "154",
                'color' => "ffa3b2",
                'name' => "189"
            ],
            [
                'id' => "155",
                'color' => "fb758e",
                'name' => "190"
            ],
            [
                'id' => "156",
                'color' => "f3486c",
                'name' => "191"
            ],
            [
                'id' => "157",
                'color' => "e4053b",
                'name' => "192"
            ],
            [
                'id' => "158",
                'color' => "be0a2f",
                'name' => "193"
            ],
            [
                'id' => "159",
                'color' => "982135",
                'name' => "194"
            ],
            [
                'id' => "160",
                'color' => "762d36",
                'name' => "195"
            ],
            [
                'id' => "161",
                'color' => "fdbec7",
                'name' => "1895"
            ],
            [
                'id' => "162",
                'color' => "fd9bb2",
                'name' => "1905"
            ],
            [
                'id' => "163",
                'color' => "f4537c",
                'name' => "1915"
            ],
            [
                'id' => "164",
                'color' => "dd0544",
                'name' => "1925"
            ],
            [
                'id' => "165",
                'color' => "c10538",
                'name' => "1935"
            ],
            [
                'id' => "166",
                'color' => "a90d35",
                'name' => "1945"
            ],
            [
                'id' => "167",
                'color' => "931739",
                'name' => "1955"
            ],
            [
                'id' => "168",
                'color' => "f3c9ca",
                'name' => "196"
            ],
            [
                'id' => "169",
                'color' => "f19aa2",
                'name' => "197"
            ],
            [
                'id' => "170",
                'color' => "e4546d",
                'name' => "198"
            ],
            [
                'id' => "171",
                'color' => "d71e40",
                'name' => "199"
            ],
            [
                'id' => "172",
                'color' => "c51e38",
                'name' => "200"
            ],
            [
                'id' => "173",
                'color' => "a5283a",
                'name' => "201"
            ],
            [
                'id' => "174",
                'color' => "8b2733",
                'name' => "202"
            ],
            [
                'id' => "175",
                'color' => "f2afc1",
                'name' => "203"
            ],
            [
                'id' => "176",
                'color' => "ec7a9e",
                'name' => "204"
            ],
            [
                'id' => "177",
                'color' => "e54c7b",
                'name' => "205"
            ],
            [
                'id' => "178",
                'color' => "d30546",
                'name' => "206"
            ],
            [
                'id' => "179",
                'color' => "ae003d",
                'name' => "207"
            ],
            [
                'id' => "180",
                'color' => "8f2343",
                'name' => "208"
            ],
            [
                'id' => "181",
                'color' => "75263c",
                'name' => "209"
            ],
            [
                'id' => "182",
                'color' => "ffa0be",
                'name' => "210"
            ],
            [
                'id' => "183",
                'color' => "ff78aa",
                'name' => "211"
            ],
            [
                'id' => "184",
                'color' => "f94f8e",
                'name' => "212"
            ],
            [
                'id' => "185",
                'color' => "eb0e6b",
                'name' => "213"
            ],
            [
                'id' => "186",
                'color' => "cd0156",
                'name' => "214"
            ],
            [
                'id' => "187",
                'color' => "a50545",
                'name' => "215"
            ],
            [
                'id' => "188",
                'color' => "7d1e40",
                'name' => "216"
            ],
            [
                'id' => "189",
                'color' => "f4bfd1",
                'name' => "217"
            ],
            [
                'id' => "190",
                'color' => "ed72a9",
                'name' => "218"
            ],
            [
                'id' => "191",
                'color' => "e42984",
                'name' => "219"
            ],
            [
                'id' => "192",
                'color' => "d00255",
                'name' => "Rubine Red"
            ],
            [
                'id' => "193",
                'color' => "ac004f",
                'name' => "220"
            ],
            [
                'id' => "194",
                'color' => "920041",
                'name' => "221"
            ],
            [
                'id' => "195",
                'color' => "6f193c",
                'name' => "222"
            ],
            [
                'id' => "196",
                'color' => "f993c3",
                'name' => "223"
            ],
            [
                'id' => "197",
                'color' => "f36aae",
                'name' => "224"
            ],
            [
                'id' => "198",
                'color' => "ed2892",
                'name' => "225"
            ],
            [
                'id' => "199",
                'color' => "d50170",
                'name' => "226"
            ],
            [
                'id' => "200",
                'color' => "ad005a",
                'name' => "227"
            ],
            [
                'id' => "201",
                'color' => "8d004c",
                'name' => "228"
            ],
            [
                'id' => "202",
                'color' => "6d213f",
                'name' => "229"
            ],
            [
                'id' => "203",
                'color' => "fda0cc",
                'name' => "PMS 230"
            ],
            [
                'id' => "204",
                'color' => "fc70b9",
                'name' => "PMS 231"
            ],
            [
                'id' => "205",
                'color' => "f541a4",
                'name' => "PMS 232"
            ],
            [
                'id' => "206",
                'color' => "f60091",
                'name' => "Rhodamine Red"
            ],
            [
                'id' => "207",
                'color' => "ce007c",
                'name' => "PMS 233"
            ],
            [
                'id' => "208",
                'color' => "ab0066",
                'name' => "PMS 234"
            ],
            [
                'id' => "209",
                'color' => "8e0553",
                'name' => "PMS 235"
            ],
            [
                'id' => "210",
                'color' => "fbb1d6",
                'name' => "236"
            ],
            [
                'id' => "211",
                'color' => "f683c4",
                'name' => "237"
            ],
            [
                'id' => "212",
                'color' => "e94db2",
                'name' => "238"
            ],
            [
                'id' => "213",
                'color' => "df219d",
                'name' => "239"
            ],
            [
                'id' => "214",
                'color' => "c50f88",
                'name' => "240"
            ],
            [
                'id' => "215",
                'color' => "ad0074",
                'name' => "241"
            ],
            [
                'id' => "216",
                'color' => "7d1c51",
                'name' => "242"
            ],
            [
                'id' => "217",
                'color' => "f9c6d9",
                'name' => "2365"
            ],
            [
                'id' => "218",
                'color' => "eb6bc0",
                'name' => "2375"
            ],
            [
                'id' => "219",
                'color' => "d929a5",
                'name' => "2385"
            ],
            [
                'id' => "220",
                'color' => "c5008d",
                'name' => "2395"
            ],
            [
                'id' => "221",
                'color' => "a80079",
                'name' => "2405"
            ],
            [
                'id' => "222",
                'color' => "9a0070",
                'name' => "2415"
            ],
            [
                'id' => "223",
                'color' => "87005e",
                'name' => "2425"
            ],
            [
                'id' => "224",
                'color' => "f2b9da",
                'name' => "243"
            ],
            [
                'id' => "225",
                'color' => "eda0d4",
                'name' => "244"
            ],
            [
                'id' => "226",
                'color' => "e780c9",
                'name' => "245"
            ],
            [
                'id' => "227",
                'color' => "cd00a3",
                'name' => "246"
            ],
            [
                'id' => "228",
                'color' => "b7008e",
                'name' => "247"
            ],
            [
                'id' => "229",
                'color' => "a3057c",
                'name' => "248"
            ],
            [
                'id' => "230",
                'color' => "7f285f",
                'name' => "249"
            ],
            [
                'id' => "231",
                'color' => "ecc4de",
                'name' => "250"
            ],
            [
                'id' => "232",
                'color' => "e19dd6",
                'name' => "251"
            ],
            [
                'id' => "233",
                'color' => "d269c6",
                'name' => "252"
            ],
            [
                'id' => "234",
                'color' => "c12fb4",
                'name' => "Purple"
            ],
            [
                'id' => "235",
                'color' => "af23a6",
                'name' => "253"
            ],
            [
                'id' => "236",
                'color' => "9f2e96",
                'name' => "254"
            ],
            [
                'id' => "237",
                'color' => "752d6c",
                'name' => "255"
            ],
            [
                'id' => "238",
                'color' => "e5c4d5",
                'name' => "256"
            ],
            [
                'id' => "239",
                'color' => "d3a5c9",
                'name' => "257"
            ],
            [
                'id' => "240",
                'color' => "995097",
                'name' => "258"
            ],
            [
                'id' => "241",
                'color' => "72166b",
                'name' => "259"
            ],
            [
                'id' => "242",
                'color' => "681e5b",
                'name' => "260"
            ],
            [
                'id' => "243",
                'color' => "5c2254",
                'name' => "261"
            ],
            [
                'id' => "244",
                'color' => "552444",
                'name' => "262"
            ],
            [
                'id' => "245",
                'color' => "d8a8d8",
                'name' => "2562"
            ],
            [
                'id' => "246",
                'color' => "c587d0",
                'name' => "2572"
            ],
            [
                'id' => "247",
                'color' => "a946ba",
                'name' => "2582"
            ],
            [
                'id' => "248",
                'color' => "950ea6",
                'name' => "2592"
            ],
            [
                'id' => "249",
                'color' => "810c8e",
                'name' => "2602"
            ],
            [
                'id' => "250",
                'color' => "711d73",
                'name' => "2612"
            ],
            [
                'id' => "251",
                'color' => "612e59",
                'name' => "2622"
            ],
            [
                'id' => "252",
                'color' => "d1a0cd",
                'name' => "2563"
            ],
            [
                'id' => "253",
                'color' => "bb7dbe",
                'name' => "2573"
            ],
            [
                'id' => "254",
                'color' => "9f51a7",
                'name' => "2583"
            ],
            [
                'id' => "255",
                'color' => "872a94",
                'name' => "2593"
            ],
            [
                'id' => "256",
                'color' => "701479",
                'name' => "2603"
            ],
            [
                'id' => "257",
                'color' => "65106d",
                'name' => "2613"
            ],
            [
                'id' => "258",
                'color' => "5c1b5f",
                'name' => "2623"
            ],
            [
                'id' => "259",
                'color' => "bf94cc",
                'name' => "2567"
            ],
            [
                'id' => "260",
                'color' => "ab72bf",
                'name' => "2577"
            ],
            [
                'id' => "261",
                'color' => "8e47ad",
                'name' => "2587"
            ],
            [
                'id' => "262",
                'color' => "67008d",
                'name' => "2597"
            ],
            [
                'id' => "263",
                'color' => "5b037b",
                'name' => "2607"
            ],
            [
                'id' => "264",
                'color' => "570c71",
                'name' => "2617"
            ],
            [
                'id' => "265",
                'color' => "4c145f",
                'name' => "2627"
            ],
            [
                'id' => "266",
                'color' => "e0cde0",
                'name' => "263"
            ],
            [
                'id' => "267",
                'color' => "c6aadb",
                'name' => "264"
            ],
            [
                'id' => "268",
                'color' => "9662c4",
                'name' => "265"
            ],
            [
                'id' => "269",
                'color' => "6d28a9",
                'name' => "266"
            ],
            [
                'id' => "270",
                'color' => "59118e",
                'name' => "267"
            ],
            [
                'id' => "271",
                'color' => "502171",
                'name' => "268"
            ],
            [
                'id' => "272",
                'color' => "442358",
                'name' => "269"
            ],
            [
                'id' => "273",
                'color' => "c9acd8",
                'name' => "2635"
            ],
            [
                'id' => "274",
                'color' => "b591d1",
                'name' => "2645"
            ],
            [
                'id' => "275",
                'color' => "9c6dc9",
                'name' => "2655"
            ],
            [
                'id' => "276",
                'color' => "894fbf",
                'name' => "2665"
            ],
            [
                'id' => "277",
                'color' => "6606a5",
                'name' => "Violet"
            ],
            [
                'id' => "278",
                'color' => "57008b",
                'name' => "2685"
            ],
            [
                'id' => "279",
                'color' => "45235f",
                'name' => "2695"
            ],
            [
                'id' => "280",
                'color' => "baaed2",
                'name' => "270"
            ],
            [
                'id' => "281",
                'color' => "9e91c6",
                'name' => "271"
            ],
            [
                'id' => "282",
                'color' => "8a77b9",
                'name' => "272"
            ],
            [
                'id' => "283",
                'color' => "381879",
                'name' => "273"
            ],
            [
                'id' => "284",
                'color' => "2a1164",
                'name' => "274"
            ],
            [
                'id' => "285",
                'color' => "260f55",
                'name' => "275"
            ],
            [
                'id' => "286",
                'color' => "2c2245",
                'name' => "276"
            ],
            [
                'id' => "287",
                'color' => "ad9fd4",
                'name' => "2705"
            ],
            [
                'id' => "288",
                'color' => "937acd",
                'name' => "2715"
            ],
            [
                'id' => "289",
                'color' => "7251bc",
                'name' => "2725"
            ],
            [
                'id' => "290",
                'color' => "4e0092",
                'name' => "2735"
            ],
            [
                'id' => "291",
                'color' => "3f0077",
                'name' => "2745"
            ],
            [
                'id' => "292",
                'color' => "36006f",
                'name' => "2755"
            ],
            [
                'id' => "293",
                'color' => "2b0d57",
                'name' => "2765"
            ],
            [
                'id' => "294",
                'color' => "d1cfdd",
                'name' => "2706"
            ],
            [
                'id' => "295",
                'color' => "a49fd7",
                'name' => "2716"
            ],
            [
                'id' => "296",
                'color' => "6554ba",
                'name' => "2726"
            ],
            [
                'id' => "297",
                'color' => "4931ad",
                'name' => "2736"
            ],
            [
                'id' => "298",
                'color' => "402995",
                'name' => "2746"
            ],
            [
                'id' => "299",
                'color' => "332876",
                'name' => "2756"
            ],
            [
                'id' => "300",
                'color' => "2b265c",
                'name' => "2766"
            ],
            [
                'id' => "301",
                'color' => "c0d1e5",
                'name' => "2707"
            ],
            [
                'id' => "302",
                'color' => "a4bae1",
                'name' => "2717"
            ],
            [
                'id' => "303",
                'color' => "5e67c4",
                'name' => "2727"
            ],
            [
                'id' => "304",
                'color' => "380097",
                'name' => "072"
            ],
            [
                'id' => "305",
                'color' => "1c146a",
                'name' => "2747"
            ],
            [
                'id' => "306",
                'color' => "151752",
                'name' => "2757"
            ],
            [
                'id' => "307",
                'color' => "13213c",
                'name' => "2767"
            ],
            [
                'id' => "308",
                'color' => "afbcdc",
                'name' => "2708"
            ],
            [
                'id' => "309",
                'color' => "5c76cb",
                'name' => "2718"
            ],
            [
                'id' => "310",
                'color' => "2f43b4",
                'name' => "2728"
            ],
            [
                'id' => "311",
                'color' => "2d008f",
                'name' => "2738"
            ],
            [
                'id' => "312",
                'color' => "1f1c77",
                'name' => "2748"
            ],
            [
                'id' => "313",
                'color' => "192169",
                'name' => "2758"
            ],
            [
                'id' => "314",
                'color' => "112152",
                'name' => "2768"
            ],
            [
                'id' => "315",
                'color' => "b3d1e9",
                'name' => "277"
            ],
            [
                'id' => "316",
                'color' => "99badd",
                'name' => "278"
            ],
            [
                'id' => "317",
                'color' => "6689cb",
                'name' => "279"
            ],
            [
                'id' => "318",
                'color' => "0c1c8d",
                'name' => "Reflex Blue"
            ],
            [
                'id' => "319",
                'color' => "012b7f",
                'name' => "280"
            ],
            [
                'id' => "320",
                'color' => "032c60",
                'name' => "281"
            ],
            [
                'id' => "321",
                'color' => "002552",
                'name' => "282"
            ],
            [
                'id' => "322",
                'color' => "99c5e2",
                'name' => "283"
            ],
            [
                'id' => "323",
                'color' => "76aada",
                'name' => "284"
            ],
            [
                'id' => "324",
                'color' => "3c76bf",
                'name' => "285"
            ],
            [
                'id' => "325",
                'color' => "0037a4",
                'name' => "286"
            ],
            [
                'id' => "326",
                'color' => "023793",
                'name' => "287"
            ],
            [
                'id' => "327",
                'color' => "01327e",
                'name' => "288"
            ],
            [
                'id' => "328",
                'color' => "00264b",
                'name' => "289"
            ],
            [
                'id' => "329",
                'color' => "c4d8e1",
                'name' => "290"
            ],
            [
                'id' => "330",
                'color' => "a9cee1",
                'name' => "291"
            ],
            [
                'id' => "331",
                'color' => "74b1de",
                'name' => "292"
            ],
            [
                'id' => "332",
                'color' => "0051ba",
                'name' => "293"
            ],
            [
                'id' => "333",
                'color' => "003e87",
                'name' => "294"
            ],
            [
                'id' => "334",
                'color' => "00386b",
                'name' => "295"
            ],
            [
                'id' => "335",
                'color' => "002e46",
                'name' => "296"
            ],
            [
                'id' => "336",
                'color' => "94c5e3",
                'name' => "2905"
            ],
            [
                'id' => "337",
                'color' => "61afdd",
                'name' => "2915"
            ],
            [
                'id' => "338",
                'color' => "008ed6",
                'name' => "2925"
            ],
            [
                'id' => "339",
                'color' => "025abc",
                'name' => "2935"
            ],
            [
                'id' => "340",
                'color' => "0154a0",
                'name' => "2945"
            ],
            [
                'id' => "341",
                'color' => "003d6a",
                'name' => "2955"
            ],
            [
                'id' => "342",
                'color' => "00344a",
                'name' => "2965"
            ],
            [
                'id' => "343",
                'color' => "83c6e1",
                'name' => "297"
            ],
            [
                'id' => "344",
                'color' => "52b5de",
                'name' => "298"
            ],
            [
                'id' => "345",
                'color' => "01a4df",
                'name' => "299"
            ],
            [
                'id' => "346",
                'color' => "0171c3",
                'name' => "300"
            ],
            [
                'id' => "347",
                'color' => "005d9b",
                'name' => "301"
            ],
            [
                'id' => "348",
                'color' => "03506e",
                'name' => "302"
            ],
            [
                'id' => "349",
                'color' => "013f54",
                'name' => "303"
            ],
            [
                'id' => "350",
                'color' => "bae0e1",
                'name' => "2975"
            ],
            [
                'id' => "351",
                'color' => "51bfe2",
                'name' => "2985"
            ],
            [
                'id' => "352",
                'color' => "00a5db",
                'name' => "2995"
            ],
            [
                'id' => "353",
                'color' => "0181c8",
                'name' => "3005"
            ],
            [
                'id' => "354",
                'color' => "0173a5",
                'name' => "3015"
            ],
            [
                'id' => "355",
                'color' => "01536b",
                'name' => "3025"
            ],
            [
                'id' => "356",
                'color' => "004354",
                'name' => "3035"
            ],
            [
                'id' => "357",
                'color' => "a6dde2",
                'name' => "304"
            ],
            [
                'id' => "358",
                'color' => "6fcee2",
                'name' => "305"
            ],
            [
                'id' => "359",
                'color' => "00bce2",
                'name' => "306"
            ],
            [
                'id' => "360",
                'color' => "048ecd",
                'name' => "Process Blue"
            ],
            [
                'id' => "361",
                'color' => "0079a6",
                'name' => "307"
            ],
            [
                'id' => "362",
                'color' => "095d7f",
                'name' => "308"
            ],
            [
                'id' => "363",
                'color' => "003e49",
                'name' => "309"
            ],
            [
                'id' => "364",
                'color' => "75d3df",
                'name' => "310"
            ],
            [
                'id' => "365",
                'color' => "28c5d8",
                'name' => "311"
            ],
            [
                'id' => "366",
                'color' => "02acc6",
                'name' => "312"
            ],
            [
                'id' => "367",
                'color' => "009ab6",
                'name' => "313"
            ],
            [
                'id' => "368",
                'color' => "00829a",
                'name' => "314"
            ],
            [
                'id' => "369",
                'color' => "006a77",
                'name' => "315"
            ],
            [
                'id' => "370",
                'color' => "00494f",
                'name' => "316"
            ],
            [
                'id' => "371",
                'color' => "7fd7db",
                'name' => "3105"
            ],
            [
                'id' => "372",
                'color' => "2dc6d6",
                'name' => "3115"
            ],
            [
                'id' => "373",
                'color' => "00b7c5",
                'name' => "3125"
            ],
            [
                'id' => "374",
                'color' => "009baa",
                'name' => "3135"
            ],
            [
                'id' => "375",
                'color' => "00858e",
                'name' => "3145"
            ],
            [
                'id' => "376",
                'color' => "006d74",
                'name' => "3155"
            ],
            [
                'id' => "377",
                'color' => "01565b",
                'name' => "3165"
            ],
            [
                'id' => "378",
                'color' => "c8e8dd",
                'name' => "317"
            ],
            [
                'id' => "379",
                'color' => "93deda",
                'name' => "318"
            ],
            [
                'id' => "380",
                'color' => "4cced0",
                'name' => "319"
            ],
            [
                'id' => "381",
                'color' => "009ea1",
                'name' => "320"
            ],
            [
                'id' => "382",
                'color' => "00878a",
                'name' => "321"
            ],
            [
                'id' => "383",
                'color' => "007272",
                'name' => "322"
            ],
            [
                'id' => "384",
                'color' => "006663",
                'name' => "323"
            ],
            [
                'id' => "385",
                'color' => "aaddd6",
                'name' => "324"
            ],
            [
                'id' => "386",
                'color' => "56cac1",
                'name' => "325"
            ],
            [
                'id' => "387",
                'color' => "01b2aa",
                'name' => "326"
            ],
            [
                'id' => "388",
                'color' => "008c83",
                'name' => "327"
            ],
            [
                'id' => "389",
                'color' => "007771",
                'name' => "328"
            ],
            [
                'id' => "390",
                'color' => "006d67",
                'name' => "329"
            ],
            [
                'id' => "391",
                'color' => "00594f",
                'name' => "330"
            ],
            [
                'id' => "392",
                'color' => "87ddd2",
                'name' => "3242"
            ],
            [
                'id' => "393",
                'color' => "56d6c9",
                'name' => "3252"
            ],
            [
                'id' => "394",
                'color' => "00c1b6",
                'name' => "3262"
            ],
            [
                'id' => "395",
                'color' => "00aa9f",
                'name' => "3272"
            ],
            [
                'id' => "396",
                'color' => "008c83",
                'name' => "3282"
            ],
            [
                'id' => "397",
                'color' => "006054",
                'name' => "3292"
            ],
            [
                'id' => "398",
                'color' => "00493e",
                'name' => "3302"
            ],
            [
                'id' => "399",
                'color' => "8ce0d1",
                'name' => "3245"
            ],
            [
                'id' => "400",
                'color' => "47d6c2",
                'name' => "3255"
            ],
            [
                'id' => "401",
                'color' => "01c6b2",
                'name' => "3265"
            ],
            [
                'id' => "402",
                'color' => "00b3a0",
                'name' => "3275"
            ],
            [
                'id' => "403",
                'color' => "009987",
                'name' => "3285"
            ],
            [
                'id' => "404",
                'color' => "028072",
                'name' => "3295"
            ],
            [
                'id' => "405",
                'color' => "014f41",
                'name' => "3305"
            ],
            [
                'id' => "406",
                'color' => "7ad3c1",
                'name' => "3248"
            ],
            [
                'id' => "407",
                'color' => "35c4b0",
                'name' => "3258"
            ],
            [
                'id' => "408",
                'color' => "00af9a",
                'name' => "3268"
            ],
            [
                'id' => "409",
                'color' => "009b85",
                'name' => "3278"
            ],
            [
                'id' => "410",
                'color' => "018270",
                'name' => "3288"
            ],
            [
                'id' => "411",
                'color' => "006b5b",
                'name' => "3298"
            ],
            [
                'id' => "412",
                'color' => "004437",
                'name' => "3308"
            ],
            [
                'id' => "413",
                'color' => "b7eed3",
                'name' => "331"
            ],
            [
                'id' => "414",
                'color' => "98eecd",
                'name' => "332"
            ],
            [
                'id' => "415",
                'color' => "6ad6af",
                'name' => "333"
            ],
            [
                'id' => "416",
                'color' => "019662",
                'name' => "334"
            ],
            [
                'id' => "417",
                'color' => "05776d",
                'name' => "335"
            ],
            [
                'id' => "418",
                'color' => "016d4b",
                'name' => "336"
            ],
            [
                'id' => "419",
                'color' => "98eecd",
                'name' => "337"
            ],
            [
                'id' => "420",
                'color' => "7cbaab",
                'name' => "338"
            ],
            [
                'id' => "421",
                'color' => "02c195",
                'name' => "339"
            ],
            [
                'id' => "422",
                'color' => "019662",
                'name' => "340"
            ],
            [
                'id' => "423",
                'color' => "05776d",
                'name' => "341"
            ],
            [
                'id' => "424",
                'color' => "016d4b",
                'name' => "342"
            ],
            [
                'id' => "425",
                'color' => "174d32",
                'name' => "343"
            ],
            [
                'id' => "426",
                'color' => "94d6b7",
                'name' => "3375"
            ],
            [
                'id' => "427",
                'color' => "6ad6af",
                'name' => "3385"
            ],
            [
                'id' => "428",
                'color' => "02c195",
                'name' => "3395"
            ],
            [
                'id' => "429",
                'color' => "01bb68",
                'name' => "3405"
            ],
            [
                'id' => "430",
                'color' => "019662",
                'name' => "3415"
            ],
            [
                'id' => "431",
                'color' => "016d4b",
                'name' => "3425"
            ],
            [
                'id' => "432",
                'color' => "174d32",
                'name' => "3435"
            ],
            [
                'id' => "433",
                'color' => "baeebb",
                'name' => "344"
            ],
            [
                'id' => "434",
                'color' => "94d6b7",
                'name' => "345"
            ],
            [
                'id' => "435",
                'color' => "6ad6af",
                'name' => "346"
            ],
            [
                'id' => "436",
                'color' => "019662",
                'name' => "347"
            ],
            [
                'id' => "437",
                'color' => "016d4b",
                'name' => "348"
            ],
            [
                'id' => "438",
                'color' => "016d4b",
                'name' => "349"
            ],
            [
                'id' => "439",
                'color' => "174d32",
                'name' => "350"
            ],
            [
                'id' => "440",
                'color' => "baeebb",
                'name' => "351"
            ],
            [
                'id' => "441",
                'color' => "8feeb5",
                'name' => "352"
            ],
            [
                'id' => "442",
                'color' => "6ad6af",
                'name' => "353"
            ],
            [
                'id' => "443",
                'color' => "01bb68",
                'name' => "354"
            ],
            [
                'id' => "444",
                'color' => "019662",
                'name' => "355"
            ],
            [
                'id' => "445",
                'color' => "016d4b",
                'name' => "356"
            ],
            [
                'id' => "446",
                'color' => "174d32",
                'name' => "357"
            ],
            [
                'id' => "447",
                'color' => "abee97",
                'name' => "358"
            ],
            [
                'id' => "448",
                'color' => "92d785",
                'name' => "359"
            ],
            [
                'id' => "449",
                'color' => "62d54e",
                'name' => "360"
            ],
            [
                'id' => "450",
                'color' => "16bb34",
                'name' => "361"
            ],
            [
                'id' => "451",
                'color' => "329632",
                'name' => "362"
            ],
            [
                'id' => "452",
                'color' => "329632",
                'name' => "363"
            ],
            [
                'id' => "453",
                'color' => "4c7128",
                'name' => "364"
            ],
            [
                'id' => "454",
                'color' => "dceeae",
                'name' => "365"
            ],
            [
                'id' => "455",
                'color' => "d4ee8f",
                'name' => "366"
            ],
            [
                'id' => "456",
                'color' => "b3e565",
                'name' => "367"
            ],
            [
                'id' => "457",
                'color' => "57c01d",
                'name' => "368"
            ],
            [
                'id' => "458",
                'color' => "329632",
                'name' => "369"
            ],
            [
                'id' => "459",
                'color' => "5f990e",
                'name' => "370"
            ],
            [
                'id' => "460",
                'color' => "556610",
                'name' => "371"
            ],
            [
                'id' => "461",
                'color' => "dceeae",
                'name' => "372"
            ],
            [
                'id' => "462",
                'color' => "d4ee8f",
                'name' => "373"
            ],
            [
                'id' => "463",
                'color' => "b3e565",
                'name' => "374"
            ],
            [
                'id' => "464",
                'color' => "aad702",
                'name' => "375"
            ],
            [
                'id' => "465",
                'color' => "84b701",
                'name' => "376"
            ],
            [
                'id' => "466",
                'color' => "5f990e",
                'name' => "377"
            ],
            [
                'id' => "467",
                'color' => "556610",
                'name' => "378"
            ],
            [
                'id' => "468",
                'color' => "dbee6a",
                'name' => "379"
            ],
            [
                'id' => "469",
                'color' => "d3ee28",
                'name' => "380"
            ],
            [
                'id' => "470",
                'color' => "d3ee28",
                'name' => "381"
            ],
            [
                'id' => "471",
                'color' => "aad702",
                'name' => "382"
            ],
            [
                'id' => "472",
                'color' => "b6b202",
                'name' => "383"
            ],
            [
                'id' => "473",
                'color' => "938d03",
                'name' => "384"
            ],
            [
                'id' => "474",
                'color' => "76710a",
                'name' => "385"
            ],
            [
                'id' => "475",
                'color' => "eeef4f",
                'name' => "386"
            ],
            [
                'id' => "476",
                'color' => "ddee47",
                'name' => "387"
            ],
            [
                'id' => "477",
                'color' => "daee06",
                'name' => "388"
            ],
            [
                'id' => "478",
                'color' => "daee06",
                'name' => "389"
            ],
            [
                'id' => "479",
                'color' => "b6b202",
                'name' => "390"
            ],
            [
                'id' => "480",
                'color' => "938d03",
                'name' => "391"
            ],
            [
                'id' => "481",
                'color' => "76710a",
                'name' => "392"
            ],
            [
                'id' => "482",
                'color' => "f5ef91",
                'name' => "393"
            ],
            [
                'id' => "483",
                'color' => "d3898f",
                'name' => "394"
            ],
            [
                'id' => "484",
                'color' => "efee08",
                'name' => "395"
            ],
            [
                'id' => "485",
                'color' => "daee06",
                'name' => "396"
            ],
            [
                'id' => "486",
                'color' => "d9cc0a",
                'name' => "397"
            ],
            [
                'id' => "487",
                'color' => "b6b202",
                'name' => "398"
            ],
            [
                'id' => "488",
                'color' => "938d03",
                'name' => "399"
            ],
            [
                'id' => "489",
                'color' => "f5ef6a",
                'name' => "3935"
            ],
            [
                'id' => "490",
                'color' => "efee08",
                'name' => "3945"
            ],
            [
                'id' => "491",
                'color' => "f2d923",
                'name' => "3955"
            ],
            [
                'id' => "492",
                'color' => "f4d70e",
                'name' => "3965"
            ],
            [
                'id' => "493",
                'color' => "b6b202",
                'name' => "3975"
            ],
            [
                'id' => "494",
                'color' => "978c25",
                'name' => "3985"
            ],
            [
                'id' => "495",
                'color' => "76710a",
                'name' => "3995"
            ],
            [
                'id' => "496",
                'color' => "ddccbb",
                'name' => "400"
            ],
            [
                'id' => "497",
                'color' => "bbbba7",
                'name' => "401"
            ],
            [
                'id' => "498",
                'color' => "b4ac95",
                'name' => "402"
            ],
            [
                'id' => "499",
                'color' => "948b76",
                'name' => "403"
            ],
            [
                'id' => "500",
                'color' => "706e4e",
                'name' => "404"
            ],
            [
                'id' => "501",
                'color' => "685449",
                'name' => "405"
            ],
            [
                'id' => "502",
                'color' => "ccbbaa",
                'name' => "406"
            ],
            [
                'id' => "503",
                'color' => "b4ac95",
                'name' => "407"
            ],
            [
                'id' => "504",
                'color' => "b0938f",
                'name' => "408"
            ],
            [
                'id' => "505",
                'color' => "948b76",
                'name' => "409"
            ],
            [
                'id' => "506",
                'color' => "706e4e",
                'name' => "410"
            ],
            [
                'id' => "507",
                'color' => "685449",
                'name' => "411"
            ],
            [
                'id' => "508",
                'color' => "2d2d2c",
                'name' => "412"
            ],
            [
                'id' => "509",
                'color' => "ccccbb",
                'name' => "413"
            ],
            [
                'id' => "510",
                'color' => "bbbba7",
                'name' => "414"
            ],
            [
                'id' => "511",
                'color' => "96aa98",
                'name' => "415"
            ],
            [
                'id' => "512",
                'color' => "948b76",
                'name' => "416"
            ],
            [
                'id' => "513",
                'color' => "6f706d",
                'name' => "417"
            ],
            [
                'id' => "514",
                'color' => "4f6654",
                'name' => "418"
            ],
            [
                'id' => "515",
                'color' => "292210",
                'name' => "419"
            ],
            [
                'id' => "516",
                'color' => "ccccbb",
                'name' => "420"
            ],
            [
                'id' => "517",
                'color' => "bbbba7",
                'name' => "421"
            ],
            [
                'id' => "518",
                'color' => "aaaaaa",
                'name' => "422"
            ],
            [
                'id' => "519",
                'color' => "919190",
                'name' => "423"
            ],
            [
                'id' => "520",
                'color' => "6f706d",
                'name' => "424"
            ],
            [
                'id' => "521",
                'color' => "4f6654",
                'name' => "425"
            ],
            [
                'id' => "522",
                'color' => "2d2d2c",
                'name' => "426"
            ],
            [
                'id' => "523",
                'color' => "ddddcc",
                'name' => "427"
            ],
            [
                'id' => "524",
                'color' => "ccccbb",
                'name' => "428"
            ],
            [
                'id' => "525",
                'color' => "a8bba9",
                'name' => "429"
            ],
            [
                'id' => "526",
                'color' => "96aa98",
                'name' => "430"
            ],
            [
                'id' => "527",
                'color' => "4a6b72",
                'name' => "431"
            ],
            [
                'id' => "528",
                'color' => "4c4d4d",
                'name' => "432"
            ],
            [
                'id' => "529",
                'color' => "2d2d2c",
                'name' => "433"
            ],
            [
                'id' => "530",
                'color' => "ddcccc",
                'name' => "434"
            ],
            [
                'id' => "531",
                'color' => "ddbbc3",
                'name' => "435"
            ],
            [
                'id' => "532",
                'color' => "bbaaaa",
                'name' => "436"
            ],
            [
                'id' => "533",
                'color' => "8b706f",
                'name' => "437"
            ],
            [
                'id' => "534",
                'color' => "4c4d4d",
                'name' => "438"
            ],
            [
                'id' => "535",
                'color' => "4b2a2c",
                'name' => "439"
            ],
            [
                'id' => "536",
                'color' => "4b2a2c",
                'name' => "440"
            ],
            [
                'id' => "537",
                'color' => "ddddcc",
                'name' => "441"
            ],
            [
                'id' => "538",
                'color' => "bbbba7",
                'name' => "442"
            ],
            [
                'id' => "539",
                'color' => "96aa98",
                'name' => "443"
            ],
            [
                'id' => "540",
                'color' => "919190",
                'name' => "444"
            ],
            [
                'id' => "541",
                'color' => "4f6654",
                'name' => "445"
            ],
            [
                'id' => "542",
                'color' => "4c4d4d",
                'name' => "446"
            ],
            [
                'id' => "543",
                'color' => "4c4825",
                'name' => "447"
            ],
            [
                'id' => "544",
                'color' => "eeddcc",
                'name' => "Warm Gray 1"
            ],
            [
                'id' => "545",
                'color' => "ddccbb",
                'name' => "Warm Gray 2"
            ],
            [
                'id' => "546",
                'color' => "ccbbaa",
                'name' => "Warm Gray 3"
            ],
            [
                'id' => "547",
                'color' => "bbbba7",
                'name' => "Warm Gray 4"
            ],
            [
                'id' => "548",
                'color' => "b4ac95",
                'name' => "Warm Gray 5"
            ],
            [
                'id' => "549",
                'color' => "b4ac95",
                'name' => "Warm Gray 6"
            ],
            [
                'id' => "550",
                'color' => "b0938f",
                'name' => "Warm Gray 7"
            ],
            [
                'id' => "551",
                'color' => "948b76",
                'name' => "Warm Gray 8"
            ],
            [
                'id' => "552",
                'color' => "948b76",
                'name' => "Warm Gray 9"
            ],
            [
                'id' => "553",
                'color' => "917248",
                'name' => "Warm Gray 10"
            ],
            [
                'id' => "554",
                'color' => "6f706d",
                'name' => "Warm Gray 11"
            ],
            [
                'id' => "555",
                'color' => "f0efd9",
                'name' => "Cool Gray 1"
            ],
            [
                'id' => "556",
                'color' => "ddddcc",
                'name' => "Cool Gray 2"
            ],
            [
                'id' => "557",
                'color' => "cccccc",
                'name' => "Cool Gray 3"
            ],
            [
                'id' => "558",
                'color' => "ccccbb",
                'name' => "Cool Gray 4"
            ],
            [
                'id' => "559",
                'color' => "bbbbbe",
                'name' => "Cool Gray 5"
            ],
            [
                'id' => "560",
                'color' => "bbbba7",
                'name' => "Cool Gray 6"
            ],
            [
                'id' => "561",
                'color' => "b0938f",
                'name' => "Cool Gray 7"
            ],
            [
                'id' => "562",
                'color' => "919190",
                'name' => "Cool Gray 8"
            ],
            [
                'id' => "563",
                'color' => "5d625e",
                'name' => "Cool Gray 9"
            ],
            [
                'id' => "564",
                'color' => "6f706d",
                'name' => "Cool Gray 10"
            ],
            [
                'id' => "565",
                'color' => "6f706d",
                'name' => "Cool Gray 11"
            ],
            [
                'id' => "566",
                'color' => "4c4825",
                'name' => "448"
            ],
            [
                'id' => "567",
                'color' => "4c4825",
                'name' => "449"
            ],
            [
                'id' => "568",
                'color' => "4c4825",
                'name' => "450"
            ],
            [
                'id' => "569",
                'color' => "b4ab74",
                'name' => "451"
            ],
            [
                'id' => "570",
                'color' => "d4bb95",
                'name' => "452"
            ],
            [
                'id' => "571",
                'color' => "ddcca7",
                'name' => "453"
            ],
            [
                'id' => "572",
                'color' => "ddccbb",
                'name' => "454"
            ],
            [
                'id' => "573",
                'color' => "6c4e09",
                'name' => "4485"
            ],
            [
                'id' => "574",
                'color' => "978c25",
                'name' => "4495"
            ],
            [
                'id' => "575",
                'color' => "919650",
                'name' => "4505"
            ],
            [
                'id' => "576",
                'color' => "b4ab74",
                'name' => "4515"
            ],
            [
                'id' => "577",
                'color' => "d4bb95",
                'name' => "4525"
            ],
            [
                'id' => "578",
                'color' => "ddcca7",
                'name' => "4535"
            ],
            [
                'id' => "579",
                'color' => "eeddbb",
                'name' => "4545"
            ],
            [
                'id' => "580",
                'color' => "745127",
                'name' => "455"
            ],
            [
                'id' => "581",
                'color' => "938d03",
                'name' => "456"
            ],
            [
                'id' => "582",
                'color' => "b79903",
                'name' => "457"
            ],
            [
                'id' => "583",
                'color' => "d6cf6e",
                'name' => "458"
            ],
            [
                'id' => "584",
                'color' => "ecdd78",
                'name' => "459"
            ],
            [
                'id' => "585",
                'color' => "efdc98",
                'name' => "460"
            ],
            [
                'id' => "586",
                'color' => "eeddaa",
                'name' => "461"
            ],
            [
                'id' => "587",
                'color' => "4c4825",
                'name' => "462"
            ],
            [
                'id' => "588",
                'color' => "745127",
                'name' => "463"
            ],
            [
                'id' => "589",
                'color' => "8f6324",
                'name' => "464"
            ],
            [
                'id' => "590",
                'color' => "d4ab78",
                'name' => "465"
            ],
            [
                'id' => "591",
                'color' => "d4bb95",
                'name' => "466"
            ],
            [
                'id' => "592",
                'color' => "ddcca7",
                'name' => "467"
            ],
            [
                'id' => "593",
                'color' => "ddcca7",
                'name' => "468"
            ],
            [
                'id' => "594",
                'color' => "4d270d",
                'name' => "4625"
            ],
            [
                'id' => "595",
                'color' => "874842",
                'name' => "4635"
            ],
            [
                'id' => "596",
                'color' => "b28b6f",
                'name' => "4645"
            ],
            [
                'id' => "597",
                'color' => "c59976",
                'name' => "4655"
            ],
            [
                'id' => "598",
                'color' => "d4bb95",
                'name' => "4665"
            ],
            [
                'id' => "599",
                'color' => "eecca6",
                'name' => "4675"
            ],
            [
                'id' => "600",
                'color' => "eeccbb",
                'name' => "4685"
            ],
            [
                'id' => "601",
                'color' => "6e3204",
                'name' => "469"
            ],
            [
                'id' => "602",
                'color' => "4d270d",
                'name' => "4695"
            ],
            [
                'id' => "603",
                'color' => "745127",
                'name' => "4705"
            ],
            [
                'id' => "604",
                'color' => "917248",
                'name' => "4715"
            ],
            [
                'id' => "605",
                'color' => "b28b6f",
                'name' => "4725"
            ],
            [
                'id' => "606",
                'color' => "d4bb95",
                'name' => "4735"
            ],
            [
                'id' => "607",
                'color' => "ccbbaa",
                'name' => "4745"
            ],
            [
                'id' => "608",
                'color' => "ddccbb",
                'name' => "4755"
            ],
            [
                'id' => "609",
                'color' => "4b2a2c",
                'name' => "476"
            ],
            [
                'id' => "610",
                'color' => "712c2b",
                'name' => "477"
            ],
            [
                'id' => "611",
                'color' => "712c2b",
                'name' => "478"
            ],
            [
                'id' => "612",
                'color' => "b28b6f",
                'name' => "479"
            ],
            [
                'id' => "613",
                'color' => "ccbbaa",
                'name' => "480"
            ],
            [
                'id' => "614",
                'color' => "ddccbb",
                'name' => "481"
            ],
            [
                'id' => "615",
                'color' => "eeddcc",
                'name' => "482"
            ],
            [
                'id' => "616",
                'color' => "712c2b",
                'name' => "483"
            ],
            [
                'id' => "617",
                'color' => "992c23",
                'name' => "484"
            ],
            [
                'id' => "618",
                'color' => "dc1d19",
                'name' => "485"
            ],
            [
                'id' => "619",
                'color' => "f69373",
                'name' => "486"
            ],
            [
                'id' => "620",
                'color' => "f4ba8e",
                'name' => "487"
            ],
            [
                'id' => "621",
                'color' => "eecca6",
                'name' => "488"
            ],
            [
                'id' => "622",
                'color' => "eeccbb",
                'name' => "489"
            ],
            [
                'id' => "623",
                'color' => "4b2a2c",
                'name' => "490"
            ],
            [
                'id' => "624",
                'color' => "781014",
                'name' => "491"
            ],
            [
                'id' => "625",
                'color' => "992c23",
                'name' => "492"
            ],
            [
                'id' => "626",
                'color' => "d3898f",
                'name' => "493"
            ],
            [
                'id' => "627",
                'color' => "f6b4b7",
                'name' => "494"
            ],
            [
                'id' => "628",
                'color' => "f6b4b7",
                'name' => "495"
            ],
            [
                'id' => "629",
                'color' => "ffcccc",
                'name' => "496"
            ],
            [
                'id' => "630",
                'color' => "4b2a2c",
                'name' => "497"
            ],
            [
                'id' => "631",
                'color' => "712c2b",
                'name' => "498"
            ],
            [
                'id' => "632",
                'color' => "874842",
                'name' => "499"
            ],
            [
                'id' => "633",
                'color' => "d3898f",
                'name' => "500"
            ],
            [
                'id' => "634",
                'color' => "e3aaa9",
                'name' => "501"
            ],
            [
                'id' => "635",
                'color' => "eecccc",
                'name' => "502"
            ],
            [
                'id' => "636",
                'color' => "ffcccc",
                'name' => "503"
            ],
            [
                'id' => "637",
                'color' => "451110",
                'name' => "4975"
            ],
            [
                'id' => "638",
                'color' => "874842",
                'name' => "4985"
            ],
            [
                'id' => "639",
                'color' => "b56875",
                'name' => "4995"
            ],
            [
                'id' => "640",
                'color' => "b0938f",
                'name' => "5005"
            ],
            [
                'id' => "641",
                'color' => "ccaaa2",
                'name' => "5015"
            ],
            [
                'id' => "642",
                'color' => "ddbbaa",
                'name' => "5025"
            ],
            [
                'id' => "643",
                'color' => "eecccc",
                'name' => "5035"
            ],
            [
                'id' => "644",
                'color' => "4b2a2c",
                'name' => "504"
            ],
            [
                'id' => "645",
                'color' => "691129",
                'name' => "505"
            ],
            [
                'id' => "646",
                'color' => "9e1b62",
                'name' => "506"
            ],
            [
                'id' => "647",
                'color' => "d990b5",
                'name' => "507"
            ],
            [
                'id' => "648",
                'color' => "f099c9",
                'name' => "508"
            ],
            [
                'id' => "649",
                'color' => "f6b4b7",
                'name' => "509"
            ],
            [
                'id' => "650",
                'color' => "eecccc",
                'name' => "510"
            ],
            [
                'id' => "651",
                'color' => "572852",
                'name' => "511"
            ],
            [
                'id' => "652",
                'color' => "9e1b62",
                'name' => "512"
            ],
            [
                'id' => "653",
                'color' => "981f89",
                'name' => "513"
            ],
            [
                'id' => "654",
                'color' => "e771c0",
                'name' => "514"
            ],
            [
                'id' => "655",
                'color' => "f099c9",
                'name' => "515"
            ],
            [
                'id' => "656",
                'color' => "f4b6cf",
                'name' => "516"
            ],
            [
                'id' => "657",
                'color' => "eeccde",
                'name' => "517"
            ],
            [
                'id' => "658",
                'color' => "4b2a2c",
                'name' => "5115"
            ],
            [
                'id' => "659",
                'color' => "6e4473",
                'name' => "5125"
            ],
            [
                'id' => "660",
                'color' => "ac748e",
                'name' => "5135"
            ],
            [
                'id' => "661",
                'color' => "ac748e",
                'name' => "5145"
            ],
            [
                'id' => "662",
                'color' => "ccaac2",
                'name' => "5155"
            ],
            [
                'id' => "663",
                'color' => "ddcccc",
                'name' => "5165"
            ],
            [
                'id' => "664",
                'color' => "eeddcc",
                'name' => "5175"
            ],
            [
                'id' => "665",
                'color' => "572852",
                'name' => "518"
            ],
            [
                'id' => "666",
                'color' => "6e4473",
                'name' => "519"
            ],
            [
                'id' => "667",
                'color' => "6d1a8a",
                'name' => "520"
            ],
            [
                'id' => "668",
                'color' => "b292b2",
                'name' => "521"
            ],
            [
                'id' => "669",
                'color' => "ccaac2",
                'name' => "522"
            ],
            [
                'id' => "670",
                'color' => "d7afdd",
                'name' => "523"
            ],
            [
                'id' => "671",
                'color' => "ddccdd",
                'name' => "524"
            ],
            [
                'id' => "672",
                'color' => "4b2a2c",
                'name' => "5185"
            ],
            [
                'id' => "673",
                'color' => "712c2b",
                'name' => "5195"
            ],
            [
                'id' => "674",
                'color' => "8b706f",
                'name' => "5205"
            ],
            [
                'id' => "675",
                'color' => "b292b2",
                'name' => "5215"
            ],
            [
                'id' => "676",
                'color' => "ccaac2",
                'name' => "5225"
            ],
            [
                'id' => "677",
                'color' => "ddbbc3",
                'name' => "5235"
            ],
            [
                'id' => "678",
                'color' => "ddcccc",
                'name' => "5245"
            ],
            [
                'id' => "679",
                'color' => "572852",
                'name' => "525"
            ],
            [
                'id' => "680",
                'color' => "6d1a8a",
                'name' => "526"
            ],
            [
                'id' => "681",
                'color' => "7219bd",
                'name' => "527"
            ],
            [
                'id' => "682",
                'color' => "9d6bc5",
                'name' => "528"
            ],
            [
                'id' => "683",
                'color' => "d594d2",
                'name' => "529"
            ],
            [
                'id' => "684",
                'color' => "d7afdd",
                'name' => "530"
            ],
            [
                'id' => "685",
                'color' => "ddccdd",
                'name' => "531"
            ],
            [
                'id' => "686",
                'color' => "2d2d2c",
                'name' => "5255"
            ],
            [
                'id' => "687",
                'color' => "4d4f72",
                'name' => "5265"
            ],
            [
                'id' => "688",
                'color' => "626b95",
                'name' => "5275"
            ],
            [
                'id' => "689",
                'color' => "7070bd",
                'name' => "5285"
            ],
            [
                'id' => "690",
                'color' => "b292b2",
                'name' => "5295"
            ],
            [
                'id' => "691",
                'color' => "ccbbc3",
                'name' => "5305"
            ],
            [
                'id' => "692",
                'color' => "ddcccc",
                'name' => "5315"
            ],
            [
                'id' => "693",
                'color' => "062559",
                'name' => "532"
            ],
            [
                'id' => "694",
                'color' => "2d4f7a",
                'name' => "533"
            ],
            [
                'id' => "695",
                'color' => "2d4f7a",
                'name' => "534"
            ],
            [
                'id' => "696",
                'color' => "8b95b4",
                'name' => "535"
            ],
            [
                'id' => "697",
                'color' => "aaaac0",
                'name' => "536"
            ],
            [
                'id' => "698",
                'color' => "bbbbbe",
                'name' => "537"
            ],
            [
                'id' => "699",
                'color' => "ccccdd",
                'name' => "538"
            ],
            [
                'id' => "700",
                'color' => "062559",
                'name' => "539"
            ],
            [
                'id' => "701",
                'color' => "062559",
                'name' => "540"
            ],
            [
                'id' => "702",
                'color' => "013c77",
                'name' => "541"
            ],
            [
                'id' => "703",
                'color' => "6e91b6",
                'name' => "542"
            ],
            [
                'id' => "704",
                'color' => "9bb3d6",
                'name' => "543"
            ],
            [
                'id' => "705",
                'color' => "9bb3d6",
                'name' => "544"
            ],
            [
                'id' => "706",
                'color' => "ccccdd",
                'name' => "545"
            ],
            [
                'id' => "707",
                'color' => "062d31",
                'name' => "5395"
            ],
            [
                'id' => "708",
                'color' => "2d4f7a",
                'name' => "5405"
            ],
            [
                'id' => "709",
                'color' => "626b95",
                'name' => "5415"
            ],
            [
                'id' => "710",
                'color' => "8b95b4",
                'name' => "5425"
            ],
            [
                'id' => "711",
                'color' => "a9bbc1",
                'name' => "5435"
            ],
            [
                'id' => "712",
                'color' => "b4d3d1",
                'name' => "5445"
            ],
            [
                'id' => "713",
                'color' => "ccddcc",
                'name' => "5455"
            ],
            [
                'id' => "714",
                'color' => "062d31",
                'name' => "546"
            ],
            [
                'id' => "715",
                'color' => "01474c",
                'name' => "547"
            ],
            [
                'id' => "716",
                'color' => "013c77",
                'name' => "548"
            ],
            [
                'id' => "717",
                'color' => "5391ac",
                'name' => "549"
            ],
            [
                'id' => "718",
                'color' => "91abb8",
                'name' => "550"
            ],
            [
                'id' => "719",
                'color' => "a9bbc1",
                'name' => "551"
            ],
            [
                'id' => "720",
                'color' => "c9dddd",
                'name' => "552"
            ],
            [
                'id' => "721",
                'color' => "01474c",
                'name' => "5465"
            ],
            [
                'id' => "722",
                'color' => "266c6c",
                'name' => "5475"
            ],
            [
                'id' => "723",
                'color' => "4e938d",
                'name' => "5485"
            ],
            [
                'id' => "724",
                'color' => "7cbaab",
                'name' => "5495"
            ],
            [
                'id' => "725",
                'color' => "b4d3d1",
                'name' => "5505"
            ],
            [
                'id' => "726",
                'color' => "ccddcc",
                'name' => "5513"
            ],
            [
                'id' => "727",
                'color' => "ccddcc",
                'name' => "5523"
            ],
            [
                'id' => "728",
                'color' => "062d31",
                'name' => "5467"
            ],
            [
                'id' => "729",
                'color' => "226753",
                'name' => "5477"
            ],
            [
                'id' => "730",
                'color' => "67896f",
                'name' => "5487"
            ],
            [
                'id' => "731",
                'color' => "96aa98",
                'name' => "5497"
            ],
            [
                'id' => "732",
                'color' => "a8bba9",
                'name' => "5507"
            ],
            [
                'id' => "733",
                'color' => "ccccbb",
                'name' => "5517"
            ],
            [
                'id' => "734",
                'color' => "ccddcc",
                'name' => "5527"
            ],
            [
                'id' => "735",
                'color' => "174d32",
                'name' => "553"
            ],
            [
                'id' => "736",
                'color' => "016d4b",
                'name' => "554"
            ],
            [
                'id' => "737",
                'color' => "266c6c",
                'name' => "555"
            ],
            [
                'id' => "738",
                'color' => "76aa92",
                'name' => "556"
            ],
            [
                'id' => "739",
                'color' => "a8bba9",
                'name' => "557"
            ],
            [
                'id' => "740",
                'color' => "b3cdb6",
                'name' => "558"
            ],
            [
                'id' => "741",
                'color' => "c6ddbb",
                'name' => "559"
            ],
            [
                'id' => "742",
                'color' => "174d32",
                'name' => "5535"
            ],
            [
                'id' => "743",
                'color' => "4f6654",
                'name' => "5545"
            ],
            [
                'id' => "744",
                'color' => "72948c",
                'name' => "5555"
            ],
            [
                'id' => "745",
                'color' => "96aa98",
                'name' => "5565"
            ],
            [
                'id' => "746",
                'color' => "a8bba9",
                'name' => "5575"
            ],
            [
                'id' => "747",
                'color' => "b3cdb6",
                'name' => "5585"
            ],
            [
                'id' => "748",
                'color' => "ddddcc",
                'name' => "5595"
            ],
            [
                'id' => "749",
                'color' => "2f4f47",
                'name' => "560"
            ],
            [
                'id' => "750",
                'color' => "226753",
                'name' => "561"
            ],
            [
                'id' => "751",
                'color' => "266c6c",
                'name' => "562"
            ],
            [
                'id' => "752",
                'color' => "7cbaab",
                'name' => "563"
            ],
            [
                'id' => "753",
                'color' => "94d6b7",
                'name' => "564"
            ],
            [
                'id' => "754",
                'color' => "b7eed3",
                'name' => "565"
            ],
            [
                'id' => "755",
                'color' => "cceedf",
                'name' => "566"
            ],
            [
                'id' => "756",
                'color' => "174d32",
                'name' => "5605"
            ],
            [
                'id' => "757",
                'color' => "4f6654",
                'name' => "5615"
            ],
            [
                'id' => "758",
                'color' => "6f706d",
                'name' => "5625"
            ],
            [
                'id' => "759",
                'color' => "96aa98",
                'name' => "5635"
            ],
            [
                'id' => "760",
                'color' => "bbbba7",
                'name' => "5645"
            ],
            [
                'id' => "761",
                'color' => "ccccbb",
                'name' => "5655"
            ],
            [
                'id' => "762",
                'color' => "ddddcc",
                'name' => "568"
            ],
            [
                'id' => "763",
                'color' => "05776d",
                'name' => "569"
            ],
            [
                'id' => "764",
                'color' => "019662",
                'name' => "570"
            ],
            [
                'id' => "765",
                'color' => "7cbaab",
                'name' => "571"
            ],
            [
                'id' => "766",
                'color' => "94d6b7",
                'name' => "572"
            ],
            [
                'id' => "767",
                'color' => "b7eed3",
                'name' => "573"
            ],
            [
                'id' => "768",
                'color' => "ccddcc",
                'name' => "574"
            ],
            [
                'id' => "769",
                'color' => "556610",
                'name' => "575"
            ],
            [
                'id' => "770",
                'color' => "4c7128",
                'name' => "576"
            ],
            [
                'id' => "771",
                'color' => "B7C892",
                'name' => "577"
            ],
            [
                'id' => "772",
                'color' => "cecd93",
                'name' => "578"
            ],
            [
                'id' => "773",
                'color' => "cbdda6",
                'name' => "579"
            ],
            [
                'id' => "774",
                'color' => "cecd93",
                'name' => "580"
            ],
            [
                'id' => "775",
                'color' => "cbdda6",
                'name' => "5743"
            ],
            [
                'id' => "776",
                'color' => "4c4825",
                'name' => "5753"
            ],
            [
                'id' => "777",
                'color' => "6f7528",
                'name' => "5763"
            ],
            [
                'id' => "778",
                'color' => "706e4e",
                'name' => "5773"
            ],
            [
                'id' => "779",
                'color' => "b4ab74",
                'name' => "5783"
            ],
            [
                'id' => "780",
                'color' => "b4ab74",
                'name' => "5793"
            ],
            [
                'id' => "781",
                'color' => "ccccaa",
                'name' => "5803"
            ],
            [
                'id' => "782",
                'color' => "ddddbb",
                'name' => "5747"
            ],
            [
                'id' => "783",
                'color' => "46440e",
                'name' => "5757"
            ],
            [
                'id' => "784",
                'color' => "6f7528",
                'name' => "5767"
            ],
            [
                'id' => "785",
                'color' => "919650",
                'name' => "5777"
            ],
            [
                'id' => "786",
                'color' => "b4ab74",
                'name' => "5787"
            ],
            [
                'id' => "787",
                'color' => "cecd93",
                'name' => "5797"
            ],
            [
                'id' => "788",
                'color' => "ccccaa",
                'name' => "5807"
            ],
            [
                'id' => "789",
                'color' => "ddddbb",
                'name' => "581"
            ],
            [
                'id' => "790",
                'color' => "76710a",
                'name' => "582"
            ],
            [
                'id' => "791",
                'color' => "938d03",
                'name' => "583"
            ],
            [
                'id' => "792",
                'color' => "aad702",
                'name' => "584"
            ],
            [
                'id' => "793",
                'color' => "dbee6a",
                'name' => "585"
            ],
            [
                'id' => "794",
                'color' => "dbee6a",
                'name' => "586"
            ],
            [
                'id' => "795",
                'color' => "d4ee8f",
                'name' => "587"
            ],
            [
                'id' => "796",
                'color' => "46440e",
                'name' => "5815"
            ],
            [
                'id' => "797",
                'color' => "6f7528",
                'name' => "5825"
            ],
            [
                'id' => "798",
                'color' => "919650",
                'name' => "5835"
            ],
            [
                'id' => "799",
                'color' => "b4ab74",
                'name' => "5845"
            ],
            [
                'id' => "800",
                'color' => "cecd93",
                'name' => "5855"
            ],
            [
                'id' => "801",
                'color' => "ddcca7",
                'name' => "5865"
            ],
            [
                'id' => "802",
                'color' => "ddddbb",
                'name' => "5875"
            ],
            [
                'id' => "803",
                'color' => "f5efb3",
                'name' => "600"
            ],
            [
                'id' => "804",
                'color' => "f5ef91",
                'name' => "601"
            ],
            [
                'id' => "805",
                'color' => "ecdd78",
                'name' => "602"
            ],
            [
                'id' => "806",
                'color' => "f5dc4c",
                'name' => "603"
            ],
            [
                'id' => "807",
                'color' => "f2d923",
                'name' => "604"
            ],
            [
                'id' => "808",
                'color' => "d9cc0a",
                'name' => "605"
            ],
            [
                'id' => "809",
                'color' => "b6b202",
                'name' => "606"
            ],
            [
                'id' => "810",
                'color' => "f5efb3",
                'name' => "607"
            ],
            [
                'id' => "811",
                'color' => "f5efb3",
                'name' => "608"
            ],
            [
                'id' => "812",
                'color' => "efdc98",
                'name' => "609"
            ],
            [
                'id' => "813",
                'color' => "ecdd78",
                'name' => "610"
            ],
            [
                'id' => "814",
                'color' => "dacf47",
                'name' => "611"
            ],
            [
                'id' => "815",
                'color' => "d9cc0a",
                'name' => "612"
            ],
            [
                'id' => "816",
                'color' => "b79903",
                'name' => "613"
            ],
            [
                'id' => "817",
                'color' => "eeddaa",
                'name' => "614"
            ],
            [
                'id' => "818",
                'color' => "dddda3",
                'name' => "615"
            ],
            [
                'id' => "819",
                'color' => "cecd93",
                'name' => "616"
            ],
            [
                'id' => "820",
                'color' => "d6cf6e",
                'name' => "617"
            ],
            [
                'id' => "821",
                'color' => "b9ac52",
                'name' => "618"
            ],
            [
                'id' => "822",
                'color' => "978c25",
                'name' => "619"
            ],
            [
                'id' => "823",
                'color' => "76710a",
                'name' => "620"
            ],
            [
                'id' => "824",
                'color' => "ccddcc",
                'name' => "621"
            ],
            [
                'id' => "825",
                'color' => "b3cdb6",
                'name' => "622"
            ],
            [
                'id' => "826",
                'color' => "a8bba9",
                'name' => "623"
            ],
            [
                'id' => "827",
                'color' => "72948c",
                'name' => "624"
            ],
            [
                'id' => "828",
                'color' => "67896f",
                'name' => "625"
            ],
            [
                'id' => "829",
                'color' => "2f4f47",
                'name' => "626"
            ],
            [
                'id' => "830",
                'color' => "062d31",
                'name' => "627"
            ],
            [
                'id' => "831",
                'color' => "cceedf",
                'name' => "628"
            ],
            [
                'id' => "832",
                'color' => "b4d3d1",
                'name' => "629"
            ],
            [
                'id' => "833",
                'color' => "93d6d6",
                'name' => "630"
            ],
            [
                'id' => "834",
                'color' => "4fbac6",
                'name' => "631"
            ],
            [
                'id' => "835",
                'color' => "01accf",
                'name' => "632"
            ],
            [
                'id' => "836",
                'color' => "04729e",
                'name' => "633"
            ],
            [
                'id' => "837",
                'color' => "04729e",
                'name' => "634"
            ],
            [
                'id' => "838",
                'color' => "afd7f7",
                'name' => "635"
            ],
            [
                'id' => "839",
                'color' => "04729e",
                'name' => "636"
            ],
            [
                'id' => "840",
                'color' => "6db5e0",
                'name' => "637"
            ],
            [
                'id' => "841",
                'color' => "01accf",
                'name' => "638"
            ],
            [
                'id' => "842",
                'color' => "01accf",
                'name' => "639"
            ],
            [
                'id' => "843",
                'color' => "0582be",
                'name' => "640"
            ],
            [
                'id' => "844",
                'color' => "04729e",
                'name' => "641"
            ],
            [
                'id' => "845",
                'color' => "c9dddd",
                'name' => "642"
            ],
            [
                'id' => "846",
                'color' => "b4d3d1",
                'name' => "643"
            ],
            [
                'id' => "847",
                'color' => "9bb3d6",
                'name' => "644"
            ],
            [
                'id' => "848",
                'color' => "6e91b6",
                'name' => "645"
            ],
            [
                'id' => "849",
                'color' => "626b95",
                'name' => "646"
            ],
            [
                'id' => "850",
                'color' => "2d4f7a",
                'name' => "647"
            ],
            [
                'id' => "851",
                'color' => "062559",
                'name' => "648"
            ],
            [
                'id' => "852",
                'color' => "ccccdd",
                'name' => "649"
            ],
            [
                'id' => "853",
                'color' => "ccccdd",
                'name' => "650"
            ],
            [
                'id' => "854",
                'color' => "aaaac0",
                'name' => "651"
            ],
            [
                'id' => "855",
                'color' => "6e91b6",
                'name' => "652"
            ],
            [
                'id' => "856",
                'color' => "2d4f7a",
                'name' => "653"
            ],
            [
                'id' => "857",
                'color' => "062559",
                'name' => "654"
            ],
            [
                'id' => "858",
                'color' => "070f2d",
                'name' => "655"
            ],
            [
                'id' => "859",
                'color' => "ccddee",
                'name' => "656"
            ],
            [
                'id' => "860",
                'color' => "c4ccee",
                'name' => "657"
            ],
            [
                'id' => "861",
                'color' => "9bb3d6",
                'name' => "658"
            ],
            [
                'id' => "862",
                'color' => "7070bd",
                'name' => "659"
            ],
            [
                'id' => "863",
                'color' => "242d8d",
                'name' => "660"
            ],
            [
                'id' => "864",
                'color' => "242d8d",
                'name' => "661"
            ],
            [
                'id' => "865",
                'color' => "062559",
                'name' => "662"
            ],
            [
                'id' => "866",
                'color' => "ddccdd",
                'name' => "663"
            ],
            [
                'id' => "867",
                'color' => "ddcccc",
                'name' => "664"
            ],
            [
                'id' => "868",
                'color' => "ccbbc3",
                'name' => "665"
            ],
            [
                'id' => "869",
                'color' => "b292b2",
                'name' => "666"
            ],
            [
                'id' => "870",
                'color' => "ac748e",
                'name' => "667"
            ],
            [
                'id' => "871",
                'color' => "6e4473",
                'name' => "668"
            ],
            [
                'id' => "872",
                'color' => "572852",
                'name' => "669"
            ],
            [
                'id' => "873",
                'color' => "eeccde",
                'name' => "670"
            ],
            [
                'id' => "874",
                'color' => "f4b6cf",
                'name' => "671"
            ],
            [
                'id' => "875",
                'color' => "f4b6cf",
                'name' => "672"
            ],
            [
                'id' => "876",
                'color' => "d990b5",
                'name' => "673"
            ],
            [
                'id' => "877",
                'color' => "e771c0",
                'name' => "674"
            ],
            [
                'id' => "878",
                'color' => "f52668",
                'name' => "675"
            ],
            [
                'id' => "879",
                'color' => "9e1b62",
                'name' => "676"
            ],
            [
                'id' => "880",
                'color' => "eeccde",
                'name' => "677"
            ],
            [
                'id' => "881",
                'color' => "eecccc",
                'name' => "678"
            ],
            [
                'id' => "882",
                'color' => "ddbbc3",
                'name' => "679"
            ],
            [
                'id' => "883",
                'color' => "ddaabd",
                'name' => "680"
            ],
            [
                'id' => "884",
                'color' => "ac748e",
                'name' => "681"
            ],
            [
                'id' => "885",
                'color' => "a95379",
                'name' => "682"
            ],
            [
                'id' => "886",
                'color' => "9e1b62",
                'name' => "683"
            ],
            [
                'id' => "887",
                'color' => "eecccc",
                'name' => "684"
            ],
            [
                'id' => "888",
                'color' => "ddbbc3",
                'name' => "685"
            ],
            [
                'id' => "889",
                'color' => "ddaabd",
                'name' => "686"
            ],
            [
                'id' => "890",
                'color' => "d3898f",
                'name' => "687"
            ],
            [
                'id' => "891",
                'color' => "ac748e",
                'name' => "688"
            ],
            [
                'id' => "892",
                'color' => "954668",
                'name' => "689"
            ],
            [
                'id' => "893",
                'color' => "712c2b",
                'name' => "690"
            ],
            [
                'id' => "894",
                'color' => "eecccc",
                'name' => "691"
            ],
            [
                'id' => "895",
                'color' => "f6b4b7",
                'name' => "692"
            ],
            [
                'id' => "896",
                'color' => "e3aaa9",
                'name' => "693"
            ],
            [
                'id' => "897",
                'color' => "b56875",
                'name' => "695"
            ],
            [
                'id' => "898",
                'color' => "874842",
                'name' => "696"
            ],
            [
                'id' => "899",
                'color' => "712c2b",
                'name' => "697"
            ],
            [
                'id' => "900",
                'color' => "eecccc",
                'name' => "698"
            ],
            [
                'id' => "901",
                'color' => "f6b4b7",
                'name' => "699"
            ],
            [
                'id' => "902",
                'color' => "f58d90",
                'name' => "700"
            ],
            [
                'id' => "903",
                'color' => "f58d90",
                'name' => "701"
            ],
            [
                'id' => "904",
                'color' => "f45d5b",
                'name' => "702"
            ],
            [
                'id' => "905",
                'color' => "bb3745",
                'name' => "703"
            ],
            [
                'id' => "906",
                'color' => "992c23",
                'name' => "704"
            ],
            [
                'id' => "907",
                'color' => "ffddde",
                'name' => "705"
            ],
            [
                'id' => "908",
                'color' => "ffccbb",
                'name' => "706"
            ],
            [
                'id' => "909",
                'color' => "f6b4b7",
                'name' => "707"
            ],
            [
                'id' => "910",
                'color' => "f58d90",
                'name' => "708"
            ],
            [
                'id' => "911",
                'color' => "f45d5b",
                'name' => "709"
            ],
            [
                'id' => "912",
                'color' => "bb3745",
                'name' => "710"
            ],
            [
                'id' => "913",
                'color' => "dc1d19",
                'name' => "711"
            ],
            [
                'id' => "914",
                'color' => "ffcca5",
                'name' => "712"
            ],
            [
                'id' => "915",
                'color' => "eecca6",
                'name' => "713"
            ],
            [
                'id' => "916",
                'color' => "f4ba8e",
                'name' => "714"
            ],
            [
                'id' => "917",
                'color' => "fcaa53",
                'name' => "715"
            ],
            [
                'id' => "918",
                'color' => "f78c13",
                'name' => "716"
            ],
            [
                'id' => "919",
                'color' => "cf6002",
                'name' => "717"
            ],
            [
                'id' => "920",
                'color' => "cf6002",
                'name' => "718"
            ],
            [
                'id' => "921",
                'color' => "ffdda9",
                'name' => "719"
            ],
            [
                'id' => "922",
                'color' => "f4ba8e",
                'name' => "720"
            ],
            [
                'id' => "923",
                'color' => "d4ab78",
                'name' => "721"
            ],
            [
                'id' => "924",
                'color' => "d28b52",
                'name' => "722"
            ],
            [
                'id' => "925",
                'color' => "b37736",
                'name' => "723"
            ],
            [
                'id' => "926",
                'color' => "8f6324",
                'name' => "724"
            ],
            [
                'id' => "927",
                'color' => "6c4e09",
                'name' => "725"
            ],
            [
                'id' => "928",
                'color' => "eeccbb",
                'name' => "726"
            ],
            [
                'id' => "929",
                'color' => "f4ba8e",
                'name' => "727"
            ],
            [
                'id' => "930",
                'color' => "d4ab78",
                'name' => "728"
            ],
            [
                'id' => "931",
                'color' => "b28b6f",
                'name' => "729"
            ],
            [
                'id' => "932",
                'color' => "b37736",
                'name' => "730"
            ],
            [
                'id' => "933",
                'color' => "745127",
                'name' => "731"
            ],
            [
                'id' => "934",
                'color' => "6e3204",
                'name' => "732"
            ],
            [
                'id' => "935",
                'color' => "2d2d2c",
                'name' => "Black 2"
            ],
            [
                'id' => "936",
                'color' => "292210",
                'name' => "Black 3"
            ],
            [
                'id' => "937",
                'color' => "2d2d2c",
                'name' => "Black 4"
            ],
            [
                'id' => "938",
                'color' => "4b2a2c",
                'name' => "Black 5"
            ],
            [
                'id' => "939",
                'color' => "240b30",
                'name' => "Black 6"
            ],
            [
                'id' => "940",
                'color' => "4b2a2c",
                'name' => "Black 7"
            ],
            [
                'id' => "941",
                'color' => "01accf",
                'name' => "801"
            ],
            [
                'id' => "942",
                'color' => "62d54e",
                'name' => "802"
            ],
            [
                'id' => "943",
                'color' => "f6f031",
                'name' => "803"
            ],
            [
                'id' => "944",
                'color' => "fe973b",
                'name' => "804"
            ],
            [
                'id' => "945",
                'color' => "f45d5b",
                'name' => "805"
            ],
            [
                'id' => "946",
                'color' => "ed0199",
                'name' => "806"
            ],
            [
                'id' => "947",
                'color' => "ed0199",
                'name' => "807"
            ],
            [
                'id' => "948",
                'color' => "02c195",
                'name' => "808"
            ],
            [
                'id' => "949",
                'color' => "cfd32a",
                'name' => "809"
            ],
            [
                'id' => "950",
                'color' => "f4d70e",
                'name' => "810"
            ],
            [
                'id' => "951",
                'color' => "f78c13",
                'name' => "811"
            ],
            [
                'id' => "952",
                'color' => "f52668",
                'name' => "812"
            ],
            [
                'id' => "953",
                'color' => "ed0199",
                'name' => "813"
            ],
            [
                'id' => "954",
                'color' => "9d6bc5",
                'name' => "814"
            ],
        ];
    }

}
