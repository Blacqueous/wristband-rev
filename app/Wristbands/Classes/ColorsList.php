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
                'name' => "Pantone 100"
            ],
            [
                'id' => "17",
                'color' => "f4ed47",
                'name' => "Pantone 101"
            ],
            [
                'id' => "18",
                'color' => "f8e914",
                'name' => "Pantone 102"
            ],
            [
                'id' => "19",
                'color' => "c4ac0c",
                'name' => "Pantone 103"
            ],
            [
                'id' => "20",
                'color' => "ac990c",
                'name' => "Pantone 104"
            ],
            [
                'id' => "21",
                'color' => "80740e",
                'name' => "Pantone 105"
            ],
            [
                'id' => "22",
                'color' => "f7e859",
                'name' => "Pantone 106"
            ],
            [
                'id' => "23",
                'color' => "f9e526",
                'name' => "Pantone 107"
            ],
            [
                'id' => "24",
                'color' => "f8dc16",
                'name' => "Pantone 108"
            ],
            [
                'id' => "25",
                'color' => "f9d716",
                'name' => "Pantone 109"
            ],
            [
                'id' => "26",
                'color' => "d8b511",
                'name' => "Pantone 110"
            ],
            [
                'id' => "27",
                'color' => "aa9309",
                'name' => "Pantone 111"
            ],
            [
                'id' => "28",
                'color' => "988409",
                'name' => "Pantone 112"
            ],
            [
                'id' => "29",
                'color' => "f8e55b",
                'name' => "Pantone 113"
            ],
            [
                'id' => "30",
                'color' => "fae24c",
                'name' => "Pantone 114"
            ],
            [
                'id' => "31",
                'color' => "fae04d",
                'name' => "Pantone 115"
            ],
            [
                'id' => "32",
                'color' => "fdd116",
                'name' => "Pantone 116"
            ],
            [
                'id' => "33",
                'color' => "c59f0c",
                'name' => "Pantone 117"
            ],
            [
                'id' => "34",
                'color' => "aa8e09",
                'name' => "Pantone 118"
            ],
            [
                'id' => "35",
                'color' => "8d7920",
                'name' => "Pantone 119"
            ],
            [
                'id' => "36",
                'color' => "fae280",
                'name' => "Pantone 120"
            ],
            [
                'id' => "37",
                'color' => "fae071",
                'name' => "Pantone 121"
            ],
            [
                'id' => "38",
                'color' => "fdd856",
                'name' => "Pantone 122"
            ],
            [
                'id' => "39",
                'color' => "fec61b",
                'name' => "Pantone 123"
            ],
            [
                'id' => "40",
                'color' => "e0a90e",
                'name' => "Pantone 124"
            ],
            [
                'id' => "41",
                'color' => "b48c09",
                'name' => "Pantone 125"
            ],
            [
                'id' => "42",
                'color' => "f7e7a9",
                'name' => "Pantone 1205"
            ],
            [
                'id' => "43",
                'color' => "fdde8c",
                'name' => "Pantone 1215"
            ],
            [
                'id' => "44",
                'color' => "fecc49",
                'name' => "Pantone 1225"
            ],
            [
                'id' => "45",
                'color' => "fdb515",
                'name' => "Pantone 1235"
            ],
            [
                'id' => "46",
                'color' => "c0910d",
                'name' => "Pantone 1245"
            ],
            [
                'id' => "47",
                'color' => "a47f14",
                'name' => "Pantone 1255"
            ],
            [
                'id' => "48",
                'color' => "7d6316",
                'name' => "Pantone 1265"
            ],
            [
                'id' => "49",
                'color' => "f3e286",
                'name' => "Pantone 127"
            ],
            [
                'id' => "50",
                'color' => "f4da5f",
                'name' => "Pantone 128"
            ],
            [
                'id' => "51",
                'color' => "f3d13c",
                'name' => "Pantone 129"
            ],
            [
                'id' => "52",
                'color' => "eaae0f",
                'name' => "Pantone 130"
            ],
            [
                'id' => "53",
                'color' => "c7930b",
                'name' => "Pantone 131"
            ],
            [
                'id' => "54",
                'color' => "9d7c09",
                'name' => "Pantone 132"
            ],
            [
                'id' => "55",
                'color' => "705b0a",
                'name' => "Pantone 133"
            ],
            [
                'id' => "56",
                'color' => "ffd880",
                'name' => "Pantone 134"
            ],
            [
                'id' => "57",
                'color' => "fecd88",
                'name' => "Pantone 135"
            ],
            [
                'id' => "58",
                'color' => "fcbe4d",
                'name' => "Pantone 136"
            ],
            [
                'id' => "59",
                'color' => "fca311",
                'name' => "Pantone 137"
            ],
            [
                'id' => "60",
                'color' => "d88c02",
                'name' => "Pantone 138"
            ],
            [
                'id' => "61",
                'color' => "af7605",
                'name' => "Pantone 139"
            ],
            [
                'id' => "62",
                'color' => "7c5c13",
                'name' => "Pantone 140"
            ],
            [
                'id' => "63",
                'color' => "fed691",
                'name' => "Pantone 1345"
            ],
            [
                'id' => "64",
                'color' => "ffce8c",
                'name' => "Pantone 1355"
            ],
            [
                'id' => "65",
                'color' => "fbbc5b",
                'name' => "Pantone 1365"
            ],
            [
                'id' => "66",
                'color' => "f89c0d",
                'name' => "Pantone 1375"
            ],
            [
                'id' => "67",
                'color' => "cd7a02",
                'name' => "Pantone 1385"
            ],
            [
                'id' => "68",
                'color' => "996007",
                'name' => "Pantone 1395"
            ],
            [
                'id' => "69",
                'color' => "6b4713",
                'name' => "Pantone 1405"
            ],
            [
                'id' => "70",
                'color' => "f1ce68",
                'name' => "Pantone 141"
            ],
            [
                'id' => "71",
                'color' => "f2bf49",
                'name' => "Pantone 142"
            ],
            [
                'id' => "72",
                'color' => "eeb22d",
                'name' => "Pantone 143"
            ],
            [
                'id' => "73",
                'color' => "e28c05",
                'name' => "Pantone 144"
            ],
            [
                'id' => "74",
                'color' => "c68007",
                'name' => "Pantone 145"
            ],
            [
                'id' => "75",
                'color' => "9f6b05",
                'name' => "Pantone 146"
            ],
            [
                'id' => "76",
                'color' => "735e27",
                'name' => "Pantone 147"
            ],
            [
                'id' => "77",
                'color' => "ffd79c",
                'name' => "Pantone 148"
            ],
            [
                'id' => "78",
                'color' => "fdcc92",
                'name' => "Pantone 149"
            ],
            [
                'id' => "79",
                'color' => "fdad56",
                'name' => "Pantone 150"
            ],
            [
                'id' => "80",
                'color' => "f67f00",
                'name' => "Pantone 151"
            ],
            [
                'id' => "81",
                'color' => "de7500",
                'name' => "Pantone 152"
            ],
            [
                'id' => "82",
                'color' => "bc6c09",
                'name' => "Pantone 153"
            ],
            [
                'id' => "83",
                'color' => "9a5905",
                'name' => "Pantone 154"
            ],
            [
                'id' => "84",
                'color' => "fdb877",
                'name' => "Pantone 1485"
            ],
            [
                'id' => "85",
                'color' => "fc973b",
                'name' => "Pantone 1495"
            ],
            [
                'id' => "86",
                'color' => "f57d02",
                'name' => "Pantone 1505"
            ],
            [
                'id' => "87",
                'color' => "ef6b00",
                'name' => "Pantone 021"
            ],
            [
                'id' => "88",
                'color' => "b45400",
                'name' => "Pantone 1525"
            ],
            [
                'id' => "89",
                'color' => "8d4400",
                'name' => "Pantone 1535"
            ],
            [
                'id' => "90",
                'color' => "4d290f",
                'name' => "Pantone 1545"
            ],
            [
                'id' => "91",
                'color' => "f3dcaa",
                'name' => "Pantone 155"
            ],
            [
                'id' => "92",
                'color' => "f3c68d",
                'name' => "Pantone 156"
            ],
            [
                'id' => "93",
                'color' => "f1a456",
                'name' => "Pantone 157"
            ],
            [
                'id' => "94",
                'color' => "e97512",
                'name' => "Pantone 158"
            ],
            [
                'id' => "95",
                'color' => "c15d00",
                'name' => "Pantone 159"
            ],
            [
                'id' => "96",
                'color' => "9d530a",
                'name' => "Pantone 160"
            ],
            [
                'id' => "97",
                'color' => "653a10",
                'name' => "Pantone 161"
            ],
            [
                'id' => "98",
                'color' => "fabf9f",
                'name' => "Pantone 1555"
            ],
            [
                'id' => "99",
                'color' => "faa678",
                'name' => "Pantone 1565"
            ],
            [
                'id' => "100",
                'color' => "fc8742",
                'name' => "Pantone 1575"
            ],
            [
                'id' => "101",
                'color' => "f96b09",
                'name' => "Pantone 1585"
            ],
            [
                'id' => "102",
                'color' => "d25c05",
                'name' => "Pantone 1595"
            ],
            [
                'id' => "103",
                'color' => "a04f0e",
                'name' => "Pantone 1605"
            ],
            [
                'id' => "104",
                'color' => "823e0d",
                'name' => "Pantone 1615"
            ],
            [
                'id' => "105",
                'color' => "f8c6ab",
                'name' => "Pantone 162"
            ],
            [
                'id' => "106",
                'color' => "fd9e70",
                'name' => "Pantone 163"
            ],
            [
                'id' => "107",
                'color' => "fc7f3f",
                'name' => "Pantone 164"
            ],
            [
                'id' => "108",
                'color' => "f86404",
                'name' => "Pantone 165"
            ],
            [
                'id' => "109",
                'color' => "db5901",
                'name' => "Pantone 166"
            ],
            [
                'id' => "110",
                'color' => "b9500f",
                'name' => "Pantone 167"
            ],
            [
                'id' => "111",
                'color' => "6c2f10",
                'name' => "Pantone 168"
            ],
            [
                'id' => "112",
                'color' => "f9a58b",
                'name' => "Pantone 1625"
            ],
            [
                'id' => "113",
                'color' => "fa8f6d",
                'name' => "Pantone 1635"
            ],
            [
                'id' => "114",
                'color' => "fa7143",
                'name' => "Pantone 1645"
            ],
            [
                'id' => "115",
                'color' => "fa5601",
                'name' => "Pantone 1655"
            ],
            [
                'id' => "116",
                'color' => "f95500",
                'name' => "Pantone 1665"
            ],
            [
                'id' => "117",
                'color' => "a53f0f",
                'name' => "Pantone 1675"
            ],
            [
                'id' => "118",
                'color' => "853713",
                'name' => "Pantone 1685"
            ],
            [
                'id' => "119",
                'color' => "f7baa8",
                'name' => "Pantone 169"
            ],
            [
                'id' => "120",
                'color' => "f88a73",
                'name' => "Pantone 170"
            ],
            [
                'id' => "121",
                'color' => "fb5f39",
                'name' => "Pantone 171"
            ],
            [
                'id' => "122",
                'color' => "f64904",
                'name' => "Pantone 172"
            ],
            [
                'id' => "123",
                'color' => "d24615",
                'name' => "Pantone 173"
            ],
            [
                'id' => "124",
                'color' => "963313",
                'name' => "Pantone 174"
            ],
            [
                'id' => "125",
                'color' => "6b321f",
                'name' => "Pantone 175"
            ],
            [
                'id' => "126",
                'color' => "f9afae",
                'name' => "Pantone 176"
            ],
            [
                'id' => "127",
                'color' => "f9827e",
                'name' => "Pantone 177"
            ],
            [
                'id' => "128",
                'color' => "f95e5a",
                'name' => "Pantone 178"
            ],
            [
                'id' => "129",
                'color' => "f93f26",
                'name' => "Warm Red"
            ],
            [
                'id' => "130",
                'color' => "e23d29",
                'name' => "Pantone 179"
            ],
            [
                'id' => "131",
                'color' => "c13828",
                'name' => "Pantone 180"
            ],
            [
                'id' => "132",
                'color' => "7a2d23",
                'name' => "Pantone 181"
            ],
            [
                'id' => "133",
                'color' => "f99ea3",
                'name' => "Pantone 1765"
            ],
            [
                'id' => "134",
                'color' => "f9848d",
                'name' => "Pantone 1775"
            ],
            [
                'id' => "135",
                'color' => "fd4f58",
                'name' => "Pantone 1785"
            ],
            [
                'id' => "136",
                'color' => "ee2a2c",
                'name' => "Pantone 1788"
            ],
            [
                'id' => "137",
                'color' => "d62829",
                'name' => "Pantone 1795"
            ],
            [
                'id' => "138",
                'color' => "ae2626",
                'name' => "Pantone 1805"
            ],
            [
                'id' => "139",
                'color' => "7b221e",
                'name' => "Pantone 1815"
            ],
            [
                'id' => "140",
                'color' => "f9b2b8",
                'name' => "Pantone 1767"
            ],
            [
                'id' => "141",
                'color' => "fd6675",
                'name' => "Pantone 1777"
            ],
            [
                'id' => "142",
                'color' => "f53f4e",
                'name' => "Pantone 1787"
            ],
            [
                'id' => "143",
                'color' => "ee2a2c",
                'name' => "Pantone 032"
            ],
            [
                'id' => "144",
                'color' => "d02b31",
                'name' => "Pantone 1797"
            ],
            [
                'id' => "145",
                'color' => "a13034",
                'name' => "Pantone 1807"
            ],
            [
                'id' => "146",
                'color' => "592e28",
                'name' => "Pantone 1817"
            ],
            [
                'id' => "147",
                'color' => "fabfc1",
                'name' => "Pantone 182"
            ],
            [
                'id' => "148",
                'color' => "fb8d9a",
                'name' => "Pantone 183"
            ],
            [
                'id' => "149",
                'color' => "fc5f72",
                'name' => "Pantone 184"
            ],
            [
                'id' => "150",
                'color' => "e7122e",
                'name' => "Pantone 185"
            ],
            [
                'id' => "151",
                'color' => "ce1127",
                'name' => "Pantone 186"
            ],
            [
                'id' => "152",
                'color' => "af1e2d",
                'name' => "Pantone 187"
            ],
            [
                'id' => "153",
                'color' => "7b2228",
                'name' => "Pantone 188"
            ],
            [
                'id' => "154",
                'color' => "ffa3b2",
                'name' => "Pantone 189"
            ],
            [
                'id' => "155",
                'color' => "fb758e",
                'name' => "Pantone 190"
            ],
            [
                'id' => "156",
                'color' => "f3486c",
                'name' => "Pantone 191"
            ],
            [
                'id' => "157",
                'color' => "e4053b",
                'name' => "Pantone 192"
            ],
            [
                'id' => "158",
                'color' => "be0a2f",
                'name' => "Pantone 193"
            ],
            [
                'id' => "159",
                'color' => "982135",
                'name' => "Pantone 194"
            ],
            [
                'id' => "160",
                'color' => "762d36",
                'name' => "Pantone 195"
            ],
            [
                'id' => "161",
                'color' => "fdbec7",
                'name' => "Pantone 1895"
            ],
            [
                'id' => "162",
                'color' => "fd9bb2",
                'name' => "Pantone 1905"
            ],
            [
                'id' => "163",
                'color' => "f4537c",
                'name' => "Pantone 1915"
            ],
            [
                'id' => "164",
                'color' => "dd0544",
                'name' => "Pantone 1925"
            ],
            [
                'id' => "165",
                'color' => "c10538",
                'name' => "Pantone 1935"
            ],
            [
                'id' => "166",
                'color' => "a90d35",
                'name' => "Pantone 1945"
            ],
            [
                'id' => "167",
                'color' => "931739",
                'name' => "Pantone 1955"
            ],
            [
                'id' => "168",
                'color' => "f3c9ca",
                'name' => "Pantone 196"
            ],
            [
                'id' => "169",
                'color' => "f19aa2",
                'name' => "Pantone 197"
            ],
            [
                'id' => "170",
                'color' => "e4546d",
                'name' => "Pantone 198"
            ],
            [
                'id' => "171",
                'color' => "d71e40",
                'name' => "Pantone 199"
            ],
            [
                'id' => "172",
                'color' => "c51e38",
                'name' => "Pantone 200"
            ],
            [
                'id' => "173",
                'color' => "a5283a",
                'name' => "Pantone 201"
            ],
            [
                'id' => "174",
                'color' => "8b2733",
                'name' => "Pantone 202"
            ],
            [
                'id' => "175",
                'color' => "f2afc1",
                'name' => "Pantone 203"
            ],
            [
                'id' => "176",
                'color' => "ec7a9e",
                'name' => "Pantone 204"
            ],
            [
                'id' => "177",
                'color' => "e54c7b",
                'name' => "Pantone 205"
            ],
            [
                'id' => "178",
                'color' => "d30546",
                'name' => "Pantone 206"
            ],
            [
                'id' => "179",
                'color' => "ae003d",
                'name' => "Pantone 207"
            ],
            [
                'id' => "180",
                'color' => "8f2343",
                'name' => "Pantone 208"
            ],
            [
                'id' => "181",
                'color' => "75263c",
                'name' => "Pantone 209"
            ],
            [
                'id' => "182",
                'color' => "ffa0be",
                'name' => "Pantone 210"
            ],
            [
                'id' => "183",
                'color' => "ff78aa",
                'name' => "Pantone 211"
            ],
            [
                'id' => "184",
                'color' => "f94f8e",
                'name' => "Pantone 212"
            ],
            [
                'id' => "185",
                'color' => "eb0e6b",
                'name' => "Pantone 213"
            ],
            [
                'id' => "186",
                'color' => "cd0156",
                'name' => "Pantone 214"
            ],
            [
                'id' => "187",
                'color' => "a50545",
                'name' => "Pantone 215"
            ],
            [
                'id' => "188",
                'color' => "7d1e40",
                'name' => "Pantone 216"
            ],
            [
                'id' => "189",
                'color' => "f4bfd1",
                'name' => "Pantone 217"
            ],
            [
                'id' => "190",
                'color' => "ed72a9",
                'name' => "Pantone 218"
            ],
            [
                'id' => "191",
                'color' => "e42984",
                'name' => "Pantone 219"
            ],
            [
                'id' => "192",
                'color' => "d00255",
                'name' => "Rubine Red"
            ],
            [
                'id' => "193",
                'color' => "ac004f",
                'name' => "Pantone 220"
            ],
            [
                'id' => "194",
                'color' => "920041",
                'name' => "Pantone 221"
            ],
            [
                'id' => "195",
                'color' => "6f193c",
                'name' => "Pantone 222"
            ],
            [
                'id' => "196",
                'color' => "f993c3",
                'name' => "Pantone 223"
            ],
            [
                'id' => "197",
                'color' => "f36aae",
                'name' => "Pantone 224"
            ],
            [
                'id' => "198",
                'color' => "ed2892",
                'name' => "Pantone 225"
            ],
            [
                'id' => "199",
                'color' => "d50170",
                'name' => "Pantone 226"
            ],
            [
                'id' => "200",
                'color' => "ad005a",
                'name' => "Pantone 227"
            ],
            [
                'id' => "201",
                'color' => "8d004c",
                'name' => "Pantone 228"
            ],
            [
                'id' => "202",
                'color' => "6d213f",
                'name' => "Pantone 229"
            ],
            [
                'id' => "203",
                'color' => "fda0cc",
                'name' => "Pantone 230"
            ],
            [
                'id' => "204",
                'color' => "fc70b9",
                'name' => "Pantone 231"
            ],
            [
                'id' => "205",
                'color' => "f541a4",
                'name' => "Pantone 232"
            ],
            [
                'id' => "206",
                'color' => "f60091",
                'name' => "Rhodamine Red"
            ],
            [
                'id' => "207",
                'color' => "ce007c",
                'name' => "Pantone 233"
            ],
            [
                'id' => "208",
                'color' => "ab0066",
                'name' => "Pantone 234"
            ],
            [
                'id' => "209",
                'color' => "8e0553",
                'name' => "Pantone 235"
            ],
            [
                'id' => "210",
                'color' => "fbb1d6",
                'name' => "Pantone 236"
            ],
            [
                'id' => "211",
                'color' => "f683c4",
                'name' => "Pantone 237"
            ],
            [
                'id' => "212",
                'color' => "e94db2",
                'name' => "Pantone 238"
            ],
            [
                'id' => "213",
                'color' => "df219d",
                'name' => "Pantone 239"
            ],
            [
                'id' => "214",
                'color' => "c50f88",
                'name' => "Pantone 240"
            ],
            [
                'id' => "215",
                'color' => "ad0074",
                'name' => "Pantone 241"
            ],
            [
                'id' => "216",
                'color' => "7d1c51",
                'name' => "Pantone 242"
            ],
            [
                'id' => "217",
                'color' => "f9c6d9",
                'name' => "Pantone 2365"
            ],
            [
                'id' => "218",
                'color' => "eb6bc0",
                'name' => "Pantone 2375"
            ],
            [
                'id' => "219",
                'color' => "d929a5",
                'name' => "Pantone 2385"
            ],
            [
                'id' => "220",
                'color' => "c5008d",
                'name' => "Pantone 2395"
            ],
            [
                'id' => "221",
                'color' => "a80079",
                'name' => "Pantone 2405"
            ],
            [
                'id' => "222",
                'color' => "9a0070",
                'name' => "Pantone 2415"
            ],
            [
                'id' => "223",
                'color' => "87005e",
                'name' => "Pantone 2425"
            ],
            [
                'id' => "224",
                'color' => "f2b9da",
                'name' => "Pantone 243"
            ],
            [
                'id' => "225",
                'color' => "eda0d4",
                'name' => "Pantone 244"
            ],
            [
                'id' => "226",
                'color' => "e780c9",
                'name' => "Pantone 245"
            ],
            [
                'id' => "227",
                'color' => "cd00a3",
                'name' => "Pantone 246"
            ],
            [
                'id' => "228",
                'color' => "b7008e",
                'name' => "Pantone 247"
            ],
            [
                'id' => "229",
                'color' => "a3057c",
                'name' => "Pantone 248"
            ],
            [
                'id' => "230",
                'color' => "7f285f",
                'name' => "Pantone 249"
            ],
            [
                'id' => "231",
                'color' => "ecc4de",
                'name' => "Pantone 250"
            ],
            [
                'id' => "232",
                'color' => "e19dd6",
                'name' => "Pantone 251"
            ],
            [
                'id' => "233",
                'color' => "d269c6",
                'name' => "Pantone 252"
            ],
            [
                'id' => "234",
                'color' => "c12fb4",
                'name' => "Purple"
            ],
            [
                'id' => "235",
                'color' => "af23a6",
                'name' => "Pantone 253"
            ],
            [
                'id' => "236",
                'color' => "9f2e96",
                'name' => "Pantone 254"
            ],
            [
                'id' => "237",
                'color' => "752d6c",
                'name' => "Pantone 255"
            ],
            [
                'id' => "238",
                'color' => "e5c4d5",
                'name' => "Pantone 256"
            ],
            [
                'id' => "239",
                'color' => "d3a5c9",
                'name' => "Pantone 257"
            ],
            [
                'id' => "240",
                'color' => "995097",
                'name' => "Pantone 258"
            ],
            [
                'id' => "241",
                'color' => "72166b",
                'name' => "Pantone 259"
            ],
            [
                'id' => "242",
                'color' => "681e5b",
                'name' => "Pantone 260"
            ],
            [
                'id' => "243",
                'color' => "5c2254",
                'name' => "Pantone 261"
            ],
            [
                'id' => "244",
                'color' => "552444",
                'name' => "Pantone 262"
            ],
            [
                'id' => "245",
                'color' => "d8a8d8",
                'name' => "Pantone 2562"
            ],
            [
                'id' => "246",
                'color' => "c587d0",
                'name' => "Pantone 2572"
            ],
            [
                'id' => "247",
                'color' => "a946ba",
                'name' => "Pantone 2582"
            ],
            [
                'id' => "248",
                'color' => "950ea6",
                'name' => "Pantone 2592"
            ],
            [
                'id' => "249",
                'color' => "810c8e",
                'name' => "Pantone 2602"
            ],
            [
                'id' => "250",
                'color' => "711d73",
                'name' => "Pantone 2612"
            ],
            [
                'id' => "251",
                'color' => "612e59",
                'name' => "Pantone 2622"
            ],
            [
                'id' => "252",
                'color' => "d1a0cd",
                'name' => "Pantone 2563"
            ],
            [
                'id' => "253",
                'color' => "bb7dbe",
                'name' => "Pantone 2573"
            ],
            [
                'id' => "254",
                'color' => "9f51a7",
                'name' => "Pantone 2583"
            ],
            [
                'id' => "255",
                'color' => "872a94",
                'name' => "Pantone 2593"
            ],
            [
                'id' => "256",
                'color' => "701479",
                'name' => "Pantone 2603"
            ],
            [
                'id' => "257",
                'color' => "65106d",
                'name' => "Pantone 2613"
            ],
            [
                'id' => "258",
                'color' => "5c1b5f",
                'name' => "Pantone 2623"
            ],
            [
                'id' => "259",
                'color' => "bf94cc",
                'name' => "Pantone 2567"
            ],
            [
                'id' => "260",
                'color' => "ab72bf",
                'name' => "Pantone 2577"
            ],
            [
                'id' => "261",
                'color' => "8e47ad",
                'name' => "Pantone 2587"
            ],
            [
                'id' => "262",
                'color' => "67008d",
                'name' => "Pantone 2597"
            ],
            [
                'id' => "263",
                'color' => "5b037b",
                'name' => "Pantone 2607"
            ],
            [
                'id' => "264",
                'color' => "570c71",
                'name' => "Pantone 2617"
            ],
            [
                'id' => "265",
                'color' => "4c145f",
                'name' => "Pantone 2627"
            ],
            [
                'id' => "266",
                'color' => "e0cde0",
                'name' => "Pantone 263"
            ],
            [
                'id' => "267",
                'color' => "c6aadb",
                'name' => "Pantone 264"
            ],
            [
                'id' => "268",
                'color' => "9662c4",
                'name' => "Pantone 265"
            ],
            [
                'id' => "269",
                'color' => "6d28a9",
                'name' => "Pantone 266"
            ],
            [
                'id' => "270",
                'color' => "59118e",
                'name' => "Pantone 267"
            ],
            [
                'id' => "271",
                'color' => "502171",
                'name' => "Pantone 268"
            ],
            [
                'id' => "272",
                'color' => "442358",
                'name' => "Pantone 269"
            ],
            [
                'id' => "273",
                'color' => "c9acd8",
                'name' => "Pantone 2635"
            ],
            [
                'id' => "274",
                'color' => "b591d1",
                'name' => "Pantone 2645"
            ],
            [
                'id' => "275",
                'color' => "9c6dc9",
                'name' => "Pantone 2655"
            ],
            [
                'id' => "276",
                'color' => "894fbf",
                'name' => "Pantone 2665"
            ],
            [
                'id' => "277",
                'color' => "6606a5",
                'name' => "Violet"
            ],
            [
                'id' => "278",
                'color' => "57008b",
                'name' => "Pantone 2685"
            ],
            [
                'id' => "279",
                'color' => "45235f",
                'name' => "Pantone 2695"
            ],
            [
                'id' => "280",
                'color' => "baaed2",
                'name' => "Pantone 270"
            ],
            [
                'id' => "281",
                'color' => "9e91c6",
                'name' => "Pantone 271"
            ],
            [
                'id' => "282",
                'color' => "8a77b9",
                'name' => "Pantone 272"
            ],
            [
                'id' => "283",
                'color' => "381879",
                'name' => "Pantone 273"
            ],
            [
                'id' => "284",
                'color' => "2a1164",
                'name' => "Pantone 274"
            ],
            [
                'id' => "285",
                'color' => "260f55",
                'name' => "Pantone 275"
            ],
            [
                'id' => "286",
                'color' => "2c2245",
                'name' => "Pantone 276"
            ],
            [
                'id' => "287",
                'color' => "ad9fd4",
                'name' => "Pantone 2705"
            ],
            [
                'id' => "288",
                'color' => "937acd",
                'name' => "Pantone 2715"
            ],
            [
                'id' => "289",
                'color' => "7251bc",
                'name' => "Pantone 2725"
            ],
            [
                'id' => "290",
                'color' => "4e0092",
                'name' => "Pantone 2735"
            ],
            [
                'id' => "291",
                'color' => "3f0077",
                'name' => "Pantone 2745"
            ],
            [
                'id' => "292",
                'color' => "36006f",
                'name' => "Pantone 2755"
            ],
            [
                'id' => "293",
                'color' => "2b0d57",
                'name' => "Pantone 2765"
            ],
            [
                'id' => "294",
                'color' => "d1cfdd",
                'name' => "Pantone 2706"
            ],
            [
                'id' => "295",
                'color' => "a49fd7",
                'name' => "Pantone 2716"
            ],
            [
                'id' => "296",
                'color' => "6554ba",
                'name' => "Pantone 2726"
            ],
            [
                'id' => "297",
                'color' => "4931ad",
                'name' => "Pantone 2736"
            ],
            [
                'id' => "298",
                'color' => "402995",
                'name' => "Pantone 2746"
            ],
            [
                'id' => "299",
                'color' => "332876",
                'name' => "Pantone 2756"
            ],
            [
                'id' => "300",
                'color' => "2b265c",
                'name' => "Pantone 2766"
            ],
            [
                'id' => "301",
                'color' => "c0d1e5",
                'name' => "Pantone 2707"
            ],
            [
                'id' => "302",
                'color' => "a4bae1",
                'name' => "Pantone 2717"
            ],
            [
                'id' => "303",
                'color' => "5e67c4",
                'name' => "Pantone 2727"
            ],
            [
                'id' => "304",
                'color' => "380097",
                'name' => "Pantone 072"
            ],
            [
                'id' => "305",
                'color' => "1c146a",
                'name' => "Pantone 2747"
            ],
            [
                'id' => "306",
                'color' => "151752",
                'name' => "Pantone 2757"
            ],
            [
                'id' => "307",
                'color' => "13213c",
                'name' => "Pantone 2767"
            ],
            [
                'id' => "308",
                'color' => "afbcdc",
                'name' => "Pantone 2708"
            ],
            [
                'id' => "309",
                'color' => "5c76cb",
                'name' => "Pantone 2718"
            ],
            [
                'id' => "310",
                'color' => "2f43b4",
                'name' => "Pantone 2728"
            ],
            [
                'id' => "311",
                'color' => "2d008f",
                'name' => "Pantone 2738"
            ],
            [
                'id' => "312",
                'color' => "1f1c77",
                'name' => "Pantone 2748"
            ],
            [
                'id' => "313",
                'color' => "192169",
                'name' => "Pantone 2758"
            ],
            [
                'id' => "314",
                'color' => "112152",
                'name' => "Pantone 2768"
            ],
            [
                'id' => "315",
                'color' => "b3d1e9",
                'name' => "Pantone 277"
            ],
            [
                'id' => "316",
                'color' => "99badd",
                'name' => "Pantone 278"
            ],
            [
                'id' => "317",
                'color' => "6689cb",
                'name' => "Pantone 279"
            ],
            [
                'id' => "318",
                'color' => "0c1c8d",
                'name' => "Reflex Blue"
            ],
            [
                'id' => "319",
                'color' => "012b7f",
                'name' => "Pantone 280"
            ],
            [
                'id' => "320",
                'color' => "032c60",
                'name' => "Pantone 281"
            ],
            [
                'id' => "321",
                'color' => "002552",
                'name' => "Pantone 282"
            ],
            [
                'id' => "322",
                'color' => "99c5e2",
                'name' => "Pantone 283"
            ],
            [
                'id' => "323",
                'color' => "76aada",
                'name' => "Pantone 284"
            ],
            [
                'id' => "324",
                'color' => "3c76bf",
                'name' => "Pantone 285"
            ],
            [
                'id' => "325",
                'color' => "0037a4",
                'name' => "Pantone 286"
            ],
            [
                'id' => "326",
                'color' => "023793",
                'name' => "Pantone 287"
            ],
            [
                'id' => "327",
                'color' => "01327e",
                'name' => "Pantone 288"
            ],
            [
                'id' => "328",
                'color' => "00264b",
                'name' => "Pantone 289"
            ],
            [
                'id' => "329",
                'color' => "c4d8e1",
                'name' => "Pantone 290"
            ],
            [
                'id' => "330",
                'color' => "a9cee1",
                'name' => "Pantone 291"
            ],
            [
                'id' => "331",
                'color' => "74b1de",
                'name' => "Pantone 292"
            ],
            [
                'id' => "332",
                'color' => "0051ba",
                'name' => "Pantone 293"
            ],
            [
                'id' => "333",
                'color' => "003e87",
                'name' => "Pantone 294"
            ],
            [
                'id' => "334",
                'color' => "00386b",
                'name' => "Pantone 295"
            ],
            [
                'id' => "335",
                'color' => "002e46",
                'name' => "Pantone 296"
            ],
            [
                'id' => "336",
                'color' => "94c5e3",
                'name' => "Pantone 2905"
            ],
            [
                'id' => "337",
                'color' => "61afdd",
                'name' => "Pantone 2915"
            ],
            [
                'id' => "338",
                'color' => "008ed6",
                'name' => "Pantone 2925"
            ],
            [
                'id' => "339",
                'color' => "025abc",
                'name' => "Pantone 2935"
            ],
            [
                'id' => "340",
                'color' => "0154a0",
                'name' => "Pantone 2945"
            ],
            [
                'id' => "341",
                'color' => "003d6a",
                'name' => "Pantone 2955"
            ],
            [
                'id' => "342",
                'color' => "00344a",
                'name' => "Pantone 2965"
            ],
            [
                'id' => "343",
                'color' => "83c6e1",
                'name' => "Pantone 297"
            ],
            [
                'id' => "344",
                'color' => "52b5de",
                'name' => "Pantone 298"
            ],
            [
                'id' => "345",
                'color' => "01a4df",
                'name' => "Pantone 299"
            ],
            [
                'id' => "346",
                'color' => "0171c3",
                'name' => "Pantone 300"
            ],
            [
                'id' => "347",
                'color' => "005d9b",
                'name' => "Pantone 301"
            ],
            [
                'id' => "348",
                'color' => "03506e",
                'name' => "Pantone 302"
            ],
            [
                'id' => "349",
                'color' => "013f54",
                'name' => "Pantone 303"
            ],
            [
                'id' => "350",
                'color' => "bae0e1",
                'name' => "Pantone 2975"
            ],
            [
                'id' => "351",
                'color' => "51bfe2",
                'name' => "Pantone 2985"
            ],
            [
                'id' => "352",
                'color' => "00a5db",
                'name' => "Pantone 2995"
            ],
            [
                'id' => "353",
                'color' => "0181c8",
                'name' => "Pantone 3005"
            ],
            [
                'id' => "354",
                'color' => "0173a5",
                'name' => "Pantone 3015"
            ],
            [
                'id' => "355",
                'color' => "01536b",
                'name' => "Pantone 3025"
            ],
            [
                'id' => "356",
                'color' => "004354",
                'name' => "Pantone 3035"
            ],
            [
                'id' => "357",
                'color' => "a6dde2",
                'name' => "Pantone 304"
            ],
            [
                'id' => "358",
                'color' => "6fcee2",
                'name' => "Pantone 305"
            ],
            [
                'id' => "359",
                'color' => "00bce2",
                'name' => "Pantone 306"
            ],
            [
                'id' => "360",
                'color' => "048ecd",
                'name' => "Process Blue"
            ],
            [
                'id' => "361",
                'color' => "0079a6",
                'name' => "Pantone 307"
            ],
            [
                'id' => "362",
                'color' => "095d7f",
                'name' => "Pantone 308"
            ],
            [
                'id' => "363",
                'color' => "003e49",
                'name' => "Pantone 309"
            ],
            [
                'id' => "364",
                'color' => "75d3df",
                'name' => "Pantone 310"
            ],
            [
                'id' => "365",
                'color' => "28c5d8",
                'name' => "Pantone 311"
            ],
            [
                'id' => "366",
                'color' => "02acc6",
                'name' => "Pantone 312"
            ],
            [
                'id' => "367",
                'color' => "009ab6",
                'name' => "Pantone 313"
            ],
            [
                'id' => "368",
                'color' => "00829a",
                'name' => "Pantone 314"
            ],
            [
                'id' => "369",
                'color' => "006a77",
                'name' => "Pantone 315"
            ],
            [
                'id' => "370",
                'color' => "00494f",
                'name' => "Pantone 316"
            ],
            [
                'id' => "371",
                'color' => "7fd7db",
                'name' => "Pantone 3105"
            ],
            [
                'id' => "372",
                'color' => "2dc6d6",
                'name' => "Pantone 3115"
            ],
            [
                'id' => "373",
                'color' => "00b7c5",
                'name' => "Pantone 3125"
            ],
            [
                'id' => "374",
                'color' => "009baa",
                'name' => "Pantone 3135"
            ],
            [
                'id' => "375",
                'color' => "00858e",
                'name' => "Pantone 3145"
            ],
            [
                'id' => "376",
                'color' => "006d74",
                'name' => "Pantone 3155"
            ],
            [
                'id' => "377",
                'color' => "01565b",
                'name' => "Pantone 3165"
            ],
            [
                'id' => "378",
                'color' => "c8e8dd",
                'name' => "Pantone 317"
            ],
            [
                'id' => "379",
                'color' => "93deda",
                'name' => "Pantone 318"
            ],
            [
                'id' => "380",
                'color' => "4cced0",
                'name' => "Pantone 319"
            ],
            [
                'id' => "381",
                'color' => "009ea1",
                'name' => "Pantone 320"
            ],
            [
                'id' => "382",
                'color' => "00878a",
                'name' => "Pantone 321"
            ],
            [
                'id' => "383",
                'color' => "007272",
                'name' => "Pantone 322"
            ],
            [
                'id' => "384",
                'color' => "006663",
                'name' => "Pantone 323"
            ],
            [
                'id' => "385",
                'color' => "aaddd6",
                'name' => "Pantone 324"
            ],
            [
                'id' => "386",
                'color' => "56cac1",
                'name' => "Pantone 325"
            ],
            [
                'id' => "387",
                'color' => "01b2aa",
                'name' => "Pantone 326"
            ],
            [
                'id' => "388",
                'color' => "008c83",
                'name' => "Pantone 327"
            ],
            [
                'id' => "389",
                'color' => "007771",
                'name' => "Pantone 328"
            ],
            [
                'id' => "390",
                'color' => "006d67",
                'name' => "Pantone 329"
            ],
            [
                'id' => "391",
                'color' => "00594f",
                'name' => "Pantone 330"
            ],
            [
                'id' => "392",
                'color' => "87ddd2",
                'name' => "Pantone 3242"
            ],
            [
                'id' => "393",
                'color' => "56d6c9",
                'name' => "Pantone 3252"
            ],
            [
                'id' => "394",
                'color' => "00c1b6",
                'name' => "Pantone 3262"
            ],
            [
                'id' => "395",
                'color' => "00aa9f",
                'name' => "Pantone 3272"
            ],
            [
                'id' => "396",
                'color' => "008c83",
                'name' => "Pantone 3282"
            ],
            [
                'id' => "397",
                'color' => "006054",
                'name' => "Pantone 3292"
            ],
            [
                'id' => "398",
                'color' => "00493e",
                'name' => "Pantone 3302"
            ],
            [
                'id' => "399",
                'color' => "8ce0d1",
                'name' => "Pantone 3245"
            ],
            [
                'id' => "400",
                'color' => "47d6c2",
                'name' => "Pantone 3255"
            ],
            [
                'id' => "401",
                'color' => "01c6b2",
                'name' => "Pantone 3265"
            ],
            [
                'id' => "402",
                'color' => "00b3a0",
                'name' => "Pantone 3275"
            ],
            [
                'id' => "403",
                'color' => "009987",
                'name' => "Pantone 3285"
            ],
            [
                'id' => "404",
                'color' => "028072",
                'name' => "Pantone 3295"
            ],
            [
                'id' => "405",
                'color' => "014f41",
                'name' => "Pantone 3305"
            ],
            [
                'id' => "406",
                'color' => "7ad3c1",
                'name' => "Pantone 3248"
            ],
            [
                'id' => "407",
                'color' => "35c4b0",
                'name' => "Pantone 3258"
            ],
            [
                'id' => "408",
                'color' => "00af9a",
                'name' => "Pantone 3268"
            ],
            [
                'id' => "409",
                'color' => "009b85",
                'name' => "Pantone 3278"
            ],
            [
                'id' => "410",
                'color' => "018270",
                'name' => "Pantone 3288"
            ],
            [
                'id' => "411",
                'color' => "006b5b",
                'name' => "Pantone 3298"
            ],
            [
                'id' => "412",
                'color' => "004437",
                'name' => "Pantone 3308"
            ],
            [
                'id' => "413",
                'color' => "b7eed3",
                'name' => "Pantone 331"
            ],
            [
                'id' => "414",
                'color' => "98eecd",
                'name' => "Pantone 332"
            ],
            [
                'id' => "415",
                'color' => "6ad6af",
                'name' => "Pantone 333"
            ],
            [
                'id' => "416",
                'color' => "019662",
                'name' => "Pantone 334"
            ],
            [
                'id' => "417",
                'color' => "05776d",
                'name' => "Pantone 335"
            ],
            [
                'id' => "418",
                'color' => "016d4b",
                'name' => "Pantone 336"
            ],
            [
                'id' => "419",
                'color' => "98eecd",
                'name' => "Pantone 337"
            ],
            [
                'id' => "420",
                'color' => "7cbaab",
                'name' => "Pantone 338"
            ],
            [
                'id' => "421",
                'color' => "02c195",
                'name' => "Pantone 339"
            ],
            [
                'id' => "422",
                'color' => "019662",
                'name' => "Pantone 340"
            ],
            [
                'id' => "423",
                'color' => "05776d",
                'name' => "Pantone 341"
            ],
            [
                'id' => "424",
                'color' => "016d4b",
                'name' => "Pantone 342"
            ],
            [
                'id' => "425",
                'color' => "174d32",
                'name' => "Pantone 343"
            ],
            [
                'id' => "426",
                'color' => "94d6b7",
                'name' => "Pantone 3375"
            ],
            [
                'id' => "427",
                'color' => "6ad6af",
                'name' => "Pantone 3385"
            ],
            [
                'id' => "428",
                'color' => "02c195",
                'name' => "Pantone 3395"
            ],
            [
                'id' => "429",
                'color' => "01bb68",
                'name' => "Pantone 3405"
            ],
            [
                'id' => "430",
                'color' => "019662",
                'name' => "Pantone 3415"
            ],
            [
                'id' => "431",
                'color' => "016d4b",
                'name' => "Pantone 3425"
            ],
            [
                'id' => "432",
                'color' => "174d32",
                'name' => "Pantone 3435"
            ],
            [
                'id' => "433",
                'color' => "baeebb",
                'name' => "Pantone 344"
            ],
            [
                'id' => "434",
                'color' => "94d6b7",
                'name' => "Pantone 345"
            ],
            [
                'id' => "435",
                'color' => "6ad6af",
                'name' => "Pantone 346"
            ],
            [
                'id' => "436",
                'color' => "019662",
                'name' => "Pantone 347"
            ],
            [
                'id' => "437",
                'color' => "016d4b",
                'name' => "Pantone 348"
            ],
            [
                'id' => "438",
                'color' => "016d4b",
                'name' => "Pantone 349"
            ],
            [
                'id' => "439",
                'color' => "174d32",
                'name' => "Pantone 350"
            ],
            [
                'id' => "440",
                'color' => "baeebb",
                'name' => "Pantone 351"
            ],
            [
                'id' => "441",
                'color' => "8feeb5",
                'name' => "Pantone 352"
            ],
            [
                'id' => "442",
                'color' => "6ad6af",
                'name' => "Pantone 353"
            ],
            [
                'id' => "443",
                'color' => "01bb68",
                'name' => "Pantone 354"
            ],
            [
                'id' => "444",
                'color' => "019662",
                'name' => "Pantone 355"
            ],
            [
                'id' => "445",
                'color' => "016d4b",
                'name' => "Pantone 356"
            ],
            [
                'id' => "446",
                'color' => "174d32",
                'name' => "Pantone 357"
            ],
            [
                'id' => "447",
                'color' => "abee97",
                'name' => "Pantone 358"
            ],
            [
                'id' => "448",
                'color' => "92d785",
                'name' => "Pantone 359"
            ],
            [
                'id' => "449",
                'color' => "62d54e",
                'name' => "Pantone 360"
            ],
            [
                'id' => "450",
                'color' => "16bb34",
                'name' => "Pantone 361"
            ],
            [
                'id' => "451",
                'color' => "329632",
                'name' => "Pantone 362"
            ],
            [
                'id' => "452",
                'color' => "329632",
                'name' => "Pantone 363"
            ],
            [
                'id' => "453",
                'color' => "4c7128",
                'name' => "Pantone 364"
            ],
            [
                'id' => "454",
                'color' => "dceeae",
                'name' => "Pantone 365"
            ],
            [
                'id' => "455",
                'color' => "d4ee8f",
                'name' => "Pantone 366"
            ],
            [
                'id' => "456",
                'color' => "b3e565",
                'name' => "Pantone 367"
            ],
            [
                'id' => "457",
                'color' => "57c01d",
                'name' => "Pantone 368"
            ],
            [
                'id' => "458",
                'color' => "329632",
                'name' => "Pantone 369"
            ],
            [
                'id' => "459",
                'color' => "5f990e",
                'name' => "Pantone 370"
            ],
            [
                'id' => "460",
                'color' => "556610",
                'name' => "Pantone 371"
            ],
            [
                'id' => "461",
                'color' => "dceeae",
                'name' => "Pantone 372"
            ],
            [
                'id' => "462",
                'color' => "d4ee8f",
                'name' => "Pantone 373"
            ],
            [
                'id' => "463",
                'color' => "b3e565",
                'name' => "Pantone 374"
            ],
            [
                'id' => "464",
                'color' => "aad702",
                'name' => "Pantone 375"
            ],
            [
                'id' => "465",
                'color' => "84b701",
                'name' => "Pantone 376"
            ],
            [
                'id' => "466",
                'color' => "5f990e",
                'name' => "Pantone 377"
            ],
            [
                'id' => "467",
                'color' => "556610",
                'name' => "Pantone 378"
            ],
            [
                'id' => "468",
                'color' => "dbee6a",
                'name' => "Pantone 379"
            ],
            [
                'id' => "469",
                'color' => "d3ee28",
                'name' => "Pantone 380"
            ],
            [
                'id' => "470",
                'color' => "d3ee28",
                'name' => "Pantone 381"
            ],
            [
                'id' => "471",
                'color' => "aad702",
                'name' => "Pantone 382"
            ],
            [
                'id' => "472",
                'color' => "b6b202",
                'name' => "Pantone 383"
            ],
            [
                'id' => "473",
                'color' => "938d03",
                'name' => "Pantone 384"
            ],
            [
                'id' => "474",
                'color' => "76710a",
                'name' => "Pantone 385"
            ],
            [
                'id' => "475",
                'color' => "eeef4f",
                'name' => "Pantone 386"
            ],
            [
                'id' => "476",
                'color' => "ddee47",
                'name' => "Pantone 387"
            ],
            [
                'id' => "477",
                'color' => "daee06",
                'name' => "Pantone 388"
            ],
            [
                'id' => "478",
                'color' => "daee06",
                'name' => "Pantone 389"
            ],
            [
                'id' => "479",
                'color' => "b6b202",
                'name' => "Pantone 390"
            ],
            [
                'id' => "480",
                'color' => "938d03",
                'name' => "Pantone 391"
            ],
            [
                'id' => "481",
                'color' => "76710a",
                'name' => "Pantone 392"
            ],
            [
                'id' => "482",
                'color' => "f5ef91",
                'name' => "Pantone 393"
            ],
            [
                'id' => "483",
                'color' => "d3898f",
                'name' => "Pantone 394"
            ],
            [
                'id' => "484",
                'color' => "efee08",
                'name' => "Pantone 395"
            ],
            [
                'id' => "485",
                'color' => "daee06",
                'name' => "Pantone 396"
            ],
            [
                'id' => "486",
                'color' => "d9cc0a",
                'name' => "Pantone 397"
            ],
            [
                'id' => "487",
                'color' => "b6b202",
                'name' => "Pantone 398"
            ],
            [
                'id' => "488",
                'color' => "938d03",
                'name' => "Pantone 399"
            ],
            [
                'id' => "489",
                'color' => "f5ef6a",
                'name' => "Pantone 3935"
            ],
            [
                'id' => "490",
                'color' => "efee08",
                'name' => "Pantone 3945"
            ],
            [
                'id' => "491",
                'color' => "f2d923",
                'name' => "Pantone 3955"
            ],
            [
                'id' => "492",
                'color' => "f4d70e",
                'name' => "Pantone 3965"
            ],
            [
                'id' => "493",
                'color' => "b6b202",
                'name' => "Pantone 3975"
            ],
            [
                'id' => "494",
                'color' => "978c25",
                'name' => "Pantone 3985"
            ],
            [
                'id' => "495",
                'color' => "76710a",
                'name' => "Pantone 3995"
            ],
            [
                'id' => "496",
                'color' => "ddccbb",
                'name' => "Pantone 400"
            ],
            [
                'id' => "497",
                'color' => "bbbba7",
                'name' => "Pantone 401"
            ],
            [
                'id' => "498",
                'color' => "b4ac95",
                'name' => "Pantone 402"
            ],
            [
                'id' => "499",
                'color' => "948b76",
                'name' => "Pantone 403"
            ],
            [
                'id' => "500",
                'color' => "706e4e",
                'name' => "Pantone 404"
            ],
            [
                'id' => "501",
                'color' => "685449",
                'name' => "Pantone 405"
            ],
            [
                'id' => "502",
                'color' => "ccbbaa",
                'name' => "Pantone 406"
            ],
            [
                'id' => "503",
                'color' => "b4ac95",
                'name' => "Pantone 407"
            ],
            [
                'id' => "504",
                'color' => "b0938f",
                'name' => "Pantone 408"
            ],
            [
                'id' => "505",
                'color' => "948b76",
                'name' => "Pantone 409"
            ],
            [
                'id' => "506",
                'color' => "706e4e",
                'name' => "Pantone 410"
            ],
            [
                'id' => "507",
                'color' => "685449",
                'name' => "Pantone 411"
            ],
            [
                'id' => "508",
                'color' => "2d2d2c",
                'name' => "Pantone 412"
            ],
            [
                'id' => "509",
                'color' => "ccccbb",
                'name' => "Pantone 413"
            ],
            [
                'id' => "510",
                'color' => "bbbba7",
                'name' => "Pantone 414"
            ],
            [
                'id' => "511",
                'color' => "96aa98",
                'name' => "Pantone 415"
            ],
            [
                'id' => "512",
                'color' => "948b76",
                'name' => "Pantone 416"
            ],
            [
                'id' => "513",
                'color' => "6f706d",
                'name' => "Pantone 417"
            ],
            [
                'id' => "514",
                'color' => "4f6654",
                'name' => "Pantone 418"
            ],
            [
                'id' => "515",
                'color' => "292210",
                'name' => "Pantone 419"
            ],
            [
                'id' => "516",
                'color' => "ccccbb",
                'name' => "Pantone 420"
            ],
            [
                'id' => "517",
                'color' => "bbbba7",
                'name' => "Pantone 421"
            ],
            [
                'id' => "518",
                'color' => "aaaaaa",
                'name' => "Pantone 422"
            ],
            [
                'id' => "519",
                'color' => "919190",
                'name' => "Pantone 423"
            ],
            [
                'id' => "520",
                'color' => "6f706d",
                'name' => "Pantone 424"
            ],
            [
                'id' => "521",
                'color' => "4f6654",
                'name' => "Pantone 425"
            ],
            [
                'id' => "522",
                'color' => "2d2d2c",
                'name' => "Pantone 426"
            ],
            [
                'id' => "523",
                'color' => "ddddcc",
                'name' => "Pantone 427"
            ],
            [
                'id' => "524",
                'color' => "ccccbb",
                'name' => "Pantone 428"
            ],
            [
                'id' => "525",
                'color' => "a8bba9",
                'name' => "Pantone 429"
            ],
            [
                'id' => "526",
                'color' => "96aa98",
                'name' => "Pantone 430"
            ],
            [
                'id' => "527",
                'color' => "4a6b72",
                'name' => "Pantone 431"
            ],
            [
                'id' => "528",
                'color' => "4c4d4d",
                'name' => "Pantone 432"
            ],
            [
                'id' => "529",
                'color' => "2d2d2c",
                'name' => "Pantone 433"
            ],
            [
                'id' => "530",
                'color' => "ddcccc",
                'name' => "Pantone 434"
            ],
            [
                'id' => "531",
                'color' => "ddbbc3",
                'name' => "Pantone 435"
            ],
            [
                'id' => "532",
                'color' => "bbaaaa",
                'name' => "Pantone 436"
            ],
            [
                'id' => "533",
                'color' => "8b706f",
                'name' => "Pantone 437"
            ],
            [
                'id' => "534",
                'color' => "4c4d4d",
                'name' => "Pantone 438"
            ],
            [
                'id' => "535",
                'color' => "4b2a2c",
                'name' => "Pantone 439"
            ],
            [
                'id' => "536",
                'color' => "4b2a2c",
                'name' => "Pantone 440"
            ],
            [
                'id' => "537",
                'color' => "ddddcc",
                'name' => "Pantone 441"
            ],
            [
                'id' => "538",
                'color' => "bbbba7",
                'name' => "Pantone 442"
            ],
            [
                'id' => "539",
                'color' => "96aa98",
                'name' => "Pantone 443"
            ],
            [
                'id' => "540",
                'color' => "919190",
                'name' => "Pantone 444"
            ],
            [
                'id' => "541",
                'color' => "4f6654",
                'name' => "Pantone 445"
            ],
            [
                'id' => "542",
                'color' => "4c4d4d",
                'name' => "Pantone 446"
            ],
            [
                'id' => "543",
                'color' => "4c4825",
                'name' => "Pantone 447"
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
                'name' => "Pantone 448"
            ],
            [
                'id' => "567",
                'color' => "4c4825",
                'name' => "Pantone 449"
            ],
            [
                'id' => "568",
                'color' => "4c4825",
                'name' => "Pantone 450"
            ],
            [
                'id' => "569",
                'color' => "b4ab74",
                'name' => "Pantone 451"
            ],
            [
                'id' => "570",
                'color' => "d4bb95",
                'name' => "Pantone 452"
            ],
            [
                'id' => "571",
                'color' => "ddcca7",
                'name' => "Pantone 453"
            ],
            [
                'id' => "572",
                'color' => "ddccbb",
                'name' => "Pantone 454"
            ],
            [
                'id' => "573",
                'color' => "6c4e09",
                'name' => "Pantone 4485"
            ],
            [
                'id' => "574",
                'color' => "978c25",
                'name' => "Pantone 4495"
            ],
            [
                'id' => "575",
                'color' => "919650",
                'name' => "Pantone 4505"
            ],
            [
                'id' => "576",
                'color' => "b4ab74",
                'name' => "Pantone 4515"
            ],
            [
                'id' => "577",
                'color' => "d4bb95",
                'name' => "Pantone 4525"
            ],
            [
                'id' => "578",
                'color' => "ddcca7",
                'name' => "Pantone 4535"
            ],
            [
                'id' => "579",
                'color' => "eeddbb",
                'name' => "Pantone 4545"
            ],
            [
                'id' => "580",
                'color' => "745127",
                'name' => "Pantone 455"
            ],
            [
                'id' => "581",
                'color' => "938d03",
                'name' => "Pantone 456"
            ],
            [
                'id' => "582",
                'color' => "b79903",
                'name' => "Pantone 457"
            ],
            [
                'id' => "583",
                'color' => "d6cf6e",
                'name' => "Pantone 458"
            ],
            [
                'id' => "584",
                'color' => "ecdd78",
                'name' => "Pantone 459"
            ],
            [
                'id' => "585",
                'color' => "efdc98",
                'name' => "Pantone 460"
            ],
            [
                'id' => "586",
                'color' => "eeddaa",
                'name' => "Pantone 461"
            ],
            [
                'id' => "587",
                'color' => "4c4825",
                'name' => "Pantone 462"
            ],
            [
                'id' => "588",
                'color' => "745127",
                'name' => "Pantone 463"
            ],
            [
                'id' => "589",
                'color' => "8f6324",
                'name' => "Pantone 464"
            ],
            [
                'id' => "590",
                'color' => "d4ab78",
                'name' => "Pantone 465"
            ],
            [
                'id' => "591",
                'color' => "d4bb95",
                'name' => "Pantone 466"
            ],
            [
                'id' => "592",
                'color' => "ddcca7",
                'name' => "Pantone 467"
            ],
            [
                'id' => "593",
                'color' => "ddcca7",
                'name' => "Pantone 468"
            ],
            [
                'id' => "594",
                'color' => "4d270d",
                'name' => "Pantone 4625"
            ],
            [
                'id' => "595",
                'color' => "874842",
                'name' => "Pantone 4635"
            ],
            [
                'id' => "596",
                'color' => "b28b6f",
                'name' => "Pantone 4645"
            ],
            [
                'id' => "597",
                'color' => "c59976",
                'name' => "Pantone 4655"
            ],
            [
                'id' => "598",
                'color' => "d4bb95",
                'name' => "Pantone 4665"
            ],
            [
                'id' => "599",
                'color' => "eecca6",
                'name' => "Pantone 4675"
            ],
            [
                'id' => "600",
                'color' => "eeccbb",
                'name' => "Pantone 4685"
            ],
            [
                'id' => "601",
                'color' => "6e3204",
                'name' => "Pantone 469"
            ],
            [
                'id' => "602",
                'color' => "4d270d",
                'name' => "Pantone 4695"
            ],
            [
                'id' => "603",
                'color' => "745127",
                'name' => "Pantone 4705"
            ],
            [
                'id' => "604",
                'color' => "917248",
                'name' => "Pantone 4715"
            ],
            [
                'id' => "605",
                'color' => "b28b6f",
                'name' => "Pantone 4725"
            ],
            [
                'id' => "606",
                'color' => "d4bb95",
                'name' => "Pantone 4735"
            ],
            [
                'id' => "607",
                'color' => "ccbbaa",
                'name' => "Pantone 4745"
            ],
            [
                'id' => "608",
                'color' => "ddccbb",
                'name' => "Pantone 4755"
            ],
            [
                'id' => "609",
                'color' => "4b2a2c",
                'name' => "Pantone 476"
            ],
            [
                'id' => "610",
                'color' => "712c2b",
                'name' => "Pantone 477"
            ],
            [
                'id' => "611",
                'color' => "712c2b",
                'name' => "Pantone 478"
            ],
            [
                'id' => "612",
                'color' => "b28b6f",
                'name' => "Pantone 479"
            ],
            [
                'id' => "613",
                'color' => "ccbbaa",
                'name' => "Pantone 480"
            ],
            [
                'id' => "614",
                'color' => "ddccbb",
                'name' => "Pantone 481"
            ],
            [
                'id' => "615",
                'color' => "eeddcc",
                'name' => "Pantone 482"
            ],
            [
                'id' => "616",
                'color' => "712c2b",
                'name' => "Pantone 483"
            ],
            [
                'id' => "617",
                'color' => "992c23",
                'name' => "Pantone 484"
            ],
            [
                'id' => "618",
                'color' => "dc1d19",
                'name' => "Pantone 485"
            ],
            [
                'id' => "619",
                'color' => "f69373",
                'name' => "Pantone 486"
            ],
            [
                'id' => "620",
                'color' => "f4ba8e",
                'name' => "Pantone 487"
            ],
            [
                'id' => "621",
                'color' => "eecca6",
                'name' => "Pantone 488"
            ],
            [
                'id' => "622",
                'color' => "eeccbb",
                'name' => "Pantone 489"
            ],
            [
                'id' => "623",
                'color' => "4b2a2c",
                'name' => "Pantone 490"
            ],
            [
                'id' => "624",
                'color' => "781014",
                'name' => "Pantone 491"
            ],
            [
                'id' => "625",
                'color' => "992c23",
                'name' => "Pantone 492"
            ],
            [
                'id' => "626",
                'color' => "d3898f",
                'name' => "Pantone 493"
            ],
            [
                'id' => "627",
                'color' => "f6b4b7",
                'name' => "Pantone 494"
            ],
            [
                'id' => "628",
                'color' => "f6b4b7",
                'name' => "Pantone 495"
            ],
            [
                'id' => "629",
                'color' => "ffcccc",
                'name' => "Pantone 496"
            ],
            [
                'id' => "630",
                'color' => "4b2a2c",
                'name' => "Pantone 497"
            ],
            [
                'id' => "631",
                'color' => "712c2b",
                'name' => "Pantone 498"
            ],
            [
                'id' => "632",
                'color' => "874842",
                'name' => "Pantone 499"
            ],
            [
                'id' => "633",
                'color' => "d3898f",
                'name' => "Pantone 500"
            ],
            [
                'id' => "634",
                'color' => "e3aaa9",
                'name' => "Pantone 501"
            ],
            [
                'id' => "635",
                'color' => "eecccc",
                'name' => "Pantone 502"
            ],
            [
                'id' => "636",
                'color' => "ffcccc",
                'name' => "Pantone 503"
            ],
            [
                'id' => "637",
                'color' => "451110",
                'name' => "Pantone 4975"
            ],
            [
                'id' => "638",
                'color' => "874842",
                'name' => "Pantone 4985"
            ],
            [
                'id' => "639",
                'color' => "b56875",
                'name' => "Pantone 4995"
            ],
            [
                'id' => "640",
                'color' => "b0938f",
                'name' => "Pantone 5005"
            ],
            [
                'id' => "641",
                'color' => "ccaaa2",
                'name' => "Pantone 5015"
            ],
            [
                'id' => "642",
                'color' => "ddbbaa",
                'name' => "Pantone 5025"
            ],
            [
                'id' => "643",
                'color' => "eecccc",
                'name' => "Pantone 5035"
            ],
            [
                'id' => "644",
                'color' => "4b2a2c",
                'name' => "Pantone 504"
            ],
            [
                'id' => "645",
                'color' => "691129",
                'name' => "Pantone 505"
            ],
            [
                'id' => "646",
                'color' => "9e1b62",
                'name' => "Pantone 506"
            ],
            [
                'id' => "647",
                'color' => "d990b5",
                'name' => "Pantone 507"
            ],
            [
                'id' => "648",
                'color' => "f099c9",
                'name' => "Pantone 508"
            ],
            [
                'id' => "649",
                'color' => "f6b4b7",
                'name' => "Pantone 509"
            ],
            [
                'id' => "650",
                'color' => "eecccc",
                'name' => "Pantone 510"
            ],
            [
                'id' => "651",
                'color' => "572852",
                'name' => "Pantone 511"
            ],
            [
                'id' => "652",
                'color' => "9e1b62",
                'name' => "Pantone 512"
            ],
            [
                'id' => "653",
                'color' => "981f89",
                'name' => "Pantone 513"
            ],
            [
                'id' => "654",
                'color' => "e771c0",
                'name' => "Pantone 514"
            ],
            [
                'id' => "655",
                'color' => "f099c9",
                'name' => "Pantone 515"
            ],
            [
                'id' => "656",
                'color' => "f4b6cf",
                'name' => "Pantone 516"
            ],
            [
                'id' => "657",
                'color' => "eeccde",
                'name' => "Pantone 517"
            ],
            [
                'id' => "658",
                'color' => "4b2a2c",
                'name' => "Pantone 5115"
            ],
            [
                'id' => "659",
                'color' => "6e4473",
                'name' => "Pantone 5125"
            ],
            [
                'id' => "660",
                'color' => "ac748e",
                'name' => "Pantone 5135"
            ],
            [
                'id' => "661",
                'color' => "ac748e",
                'name' => "Pantone 5145"
            ],
            [
                'id' => "662",
                'color' => "ccaac2",
                'name' => "Pantone 5155"
            ],
            [
                'id' => "663",
                'color' => "ddcccc",
                'name' => "Pantone 5165"
            ],
            [
                'id' => "664",
                'color' => "eeddcc",
                'name' => "Pantone 5175"
            ],
            [
                'id' => "665",
                'color' => "572852",
                'name' => "Pantone 518"
            ],
            [
                'id' => "666",
                'color' => "6e4473",
                'name' => "Pantone 519"
            ],
            [
                'id' => "667",
                'color' => "6d1a8a",
                'name' => "Pantone 520"
            ],
            [
                'id' => "668",
                'color' => "b292b2",
                'name' => "Pantone 521"
            ],
            [
                'id' => "669",
                'color' => "ccaac2",
                'name' => "Pantone 522"
            ],
            [
                'id' => "670",
                'color' => "d7afdd",
                'name' => "Pantone 523"
            ],
            [
                'id' => "671",
                'color' => "ddccdd",
                'name' => "Pantone 524"
            ],
            [
                'id' => "672",
                'color' => "4b2a2c",
                'name' => "Pantone 5185"
            ],
            [
                'id' => "673",
                'color' => "712c2b",
                'name' => "Pantone 5195"
            ],
            [
                'id' => "674",
                'color' => "8b706f",
                'name' => "Pantone 5205"
            ],
            [
                'id' => "675",
                'color' => "b292b2",
                'name' => "Pantone 5215"
            ],
            [
                'id' => "676",
                'color' => "ccaac2",
                'name' => "Pantone 5225"
            ],
            [
                'id' => "677",
                'color' => "ddbbc3",
                'name' => "Pantone 5235"
            ],
            [
                'id' => "678",
                'color' => "ddcccc",
                'name' => "Pantone 5245"
            ],
            [
                'id' => "679",
                'color' => "572852",
                'name' => "Pantone 525"
            ],
            [
                'id' => "680",
                'color' => "6d1a8a",
                'name' => "Pantone 526"
            ],
            [
                'id' => "681",
                'color' => "7219bd",
                'name' => "Pantone 527"
            ],
            [
                'id' => "682",
                'color' => "9d6bc5",
                'name' => "Pantone 528"
            ],
            [
                'id' => "683",
                'color' => "d594d2",
                'name' => "Pantone 529"
            ],
            [
                'id' => "684",
                'color' => "d7afdd",
                'name' => "Pantone 530"
            ],
            [
                'id' => "685",
                'color' => "ddccdd",
                'name' => "Pantone 531"
            ],
            [
                'id' => "686",
                'color' => "2d2d2c",
                'name' => "Pantone 5255"
            ],
            [
                'id' => "687",
                'color' => "4d4f72",
                'name' => "Pantone 5265"
            ],
            [
                'id' => "688",
                'color' => "626b95",
                'name' => "Pantone 5275"
            ],
            [
                'id' => "689",
                'color' => "7070bd",
                'name' => "Pantone 5285"
            ],
            [
                'id' => "690",
                'color' => "b292b2",
                'name' => "Pantone 5295"
            ],
            [
                'id' => "691",
                'color' => "ccbbc3",
                'name' => "Pantone 5305"
            ],
            [
                'id' => "692",
                'color' => "ddcccc",
                'name' => "Pantone 5315"
            ],
            [
                'id' => "693",
                'color' => "062559",
                'name' => "Pantone 532"
            ],
            [
                'id' => "694",
                'color' => "2d4f7a",
                'name' => "Pantone 533"
            ],
            [
                'id' => "695",
                'color' => "2d4f7a",
                'name' => "Pantone 534"
            ],
            [
                'id' => "696",
                'color' => "8b95b4",
                'name' => "Pantone 535"
            ],
            [
                'id' => "697",
                'color' => "aaaac0",
                'name' => "Pantone 536"
            ],
            [
                'id' => "698",
                'color' => "bbbbbe",
                'name' => "Pantone 537"
            ],
            [
                'id' => "699",
                'color' => "ccccdd",
                'name' => "Pantone 538"
            ],
            [
                'id' => "700",
                'color' => "062559",
                'name' => "Pantone 539"
            ],
            [
                'id' => "701",
                'color' => "062559",
                'name' => "Pantone 540"
            ],
            [
                'id' => "702",
                'color' => "013c77",
                'name' => "Pantone 541"
            ],
            [
                'id' => "703",
                'color' => "6e91b6",
                'name' => "Pantone 542"
            ],
            [
                'id' => "704",
                'color' => "9bb3d6",
                'name' => "Pantone 543"
            ],
            [
                'id' => "705",
                'color' => "9bb3d6",
                'name' => "Pantone 544"
            ],
            [
                'id' => "706",
                'color' => "ccccdd",
                'name' => "Pantone 545"
            ],
            [
                'id' => "707",
                'color' => "062d31",
                'name' => "Pantone 5395"
            ],
            [
                'id' => "708",
                'color' => "2d4f7a",
                'name' => "Pantone 5405"
            ],
            [
                'id' => "709",
                'color' => "626b95",
                'name' => "Pantone 5415"
            ],
            [
                'id' => "710",
                'color' => "8b95b4",
                'name' => "Pantone 5425"
            ],
            [
                'id' => "711",
                'color' => "a9bbc1",
                'name' => "Pantone 5435"
            ],
            [
                'id' => "712",
                'color' => "b4d3d1",
                'name' => "Pantone 5445"
            ],
            [
                'id' => "713",
                'color' => "ccddcc",
                'name' => "Pantone 5455"
            ],
            [
                'id' => "714",
                'color' => "062d31",
                'name' => "Pantone 546"
            ],
            [
                'id' => "715",
                'color' => "01474c",
                'name' => "Pantone 547"
            ],
            [
                'id' => "716",
                'color' => "013c77",
                'name' => "Pantone 548"
            ],
            [
                'id' => "717",
                'color' => "5391ac",
                'name' => "Pantone 549"
            ],
            [
                'id' => "718",
                'color' => "91abb8",
                'name' => "Pantone 550"
            ],
            [
                'id' => "719",
                'color' => "a9bbc1",
                'name' => "Pantone 551"
            ],
            [
                'id' => "720",
                'color' => "c9dddd",
                'name' => "Pantone 552"
            ],
            [
                'id' => "721",
                'color' => "01474c",
                'name' => "Pantone 5465"
            ],
            [
                'id' => "722",
                'color' => "266c6c",
                'name' => "Pantone 5475"
            ],
            [
                'id' => "723",
                'color' => "4e938d",
                'name' => "Pantone 5485"
            ],
            [
                'id' => "724",
                'color' => "7cbaab",
                'name' => "Pantone 5495"
            ],
            [
                'id' => "725",
                'color' => "b4d3d1",
                'name' => "Pantone 5505"
            ],
            [
                'id' => "726",
                'color' => "ccddcc",
                'name' => "Pantone 5513"
            ],
            [
                'id' => "727",
                'color' => "ccddcc",
                'name' => "Pantone 5523"
            ],
            [
                'id' => "728",
                'color' => "062d31",
                'name' => "Pantone 5467"
            ],
            [
                'id' => "729",
                'color' => "226753",
                'name' => "Pantone 5477"
            ],
            [
                'id' => "730",
                'color' => "67896f",
                'name' => "Pantone 5487"
            ],
            [
                'id' => "731",
                'color' => "96aa98",
                'name' => "Pantone 5497"
            ],
            [
                'id' => "732",
                'color' => "a8bba9",
                'name' => "Pantone 5507"
            ],
            [
                'id' => "733",
                'color' => "ccccbb",
                'name' => "Pantone 5517"
            ],
            [
                'id' => "734",
                'color' => "ccddcc",
                'name' => "Pantone 5527"
            ],
            [
                'id' => "735",
                'color' => "174d32",
                'name' => "Pantone 553"
            ],
            [
                'id' => "736",
                'color' => "016d4b",
                'name' => "Pantone 554"
            ],
            [
                'id' => "737",
                'color' => "266c6c",
                'name' => "Pantone 555"
            ],
            [
                'id' => "738",
                'color' => "76aa92",
                'name' => "Pantone 556"
            ],
            [
                'id' => "739",
                'color' => "a8bba9",
                'name' => "Pantone 557"
            ],
            [
                'id' => "740",
                'color' => "b3cdb6",
                'name' => "Pantone 558"
            ],
            [
                'id' => "741",
                'color' => "c6ddbb",
                'name' => "Pantone 559"
            ],
            [
                'id' => "742",
                'color' => "174d32",
                'name' => "Pantone 5535"
            ],
            [
                'id' => "743",
                'color' => "4f6654",
                'name' => "Pantone 5545"
            ],
            [
                'id' => "744",
                'color' => "72948c",
                'name' => "Pantone 5555"
            ],
            [
                'id' => "745",
                'color' => "96aa98",
                'name' => "Pantone 5565"
            ],
            [
                'id' => "746",
                'color' => "a8bba9",
                'name' => "Pantone 5575"
            ],
            [
                'id' => "747",
                'color' => "b3cdb6",
                'name' => "Pantone 5585"
            ],
            [
                'id' => "748",
                'color' => "ddddcc",
                'name' => "Pantone 5595"
            ],
            [
                'id' => "749",
                'color' => "2f4f47",
                'name' => "Pantone 560"
            ],
            [
                'id' => "750",
                'color' => "226753",
                'name' => "Pantone 561"
            ],
            [
                'id' => "751",
                'color' => "266c6c",
                'name' => "Pantone 562"
            ],
            [
                'id' => "752",
                'color' => "7cbaab",
                'name' => "Pantone 563"
            ],
            [
                'id' => "753",
                'color' => "94d6b7",
                'name' => "Pantone 564"
            ],
            [
                'id' => "754",
                'color' => "b7eed3",
                'name' => "Pantone 565"
            ],
            [
                'id' => "755",
                'color' => "cceedf",
                'name' => "Pantone 566"
            ],
            [
                'id' => "756",
                'color' => "174d32",
                'name' => "Pantone 5605"
            ],
            [
                'id' => "757",
                'color' => "4f6654",
                'name' => "Pantone 5615"
            ],
            [
                'id' => "758",
                'color' => "6f706d",
                'name' => "Pantone 5625"
            ],
            [
                'id' => "759",
                'color' => "96aa98",
                'name' => "Pantone 5635"
            ],
            [
                'id' => "760",
                'color' => "bbbba7",
                'name' => "Pantone 5645"
            ],
            [
                'id' => "761",
                'color' => "ccccbb",
                'name' => "Pantone 5655"
            ],
            [
                'id' => "762",
                'color' => "ddddcc",
                'name' => "Pantone 568"
            ],
            [
                'id' => "763",
                'color' => "05776d",
                'name' => "Pantone 569"
            ],
            [
                'id' => "764",
                'color' => "019662",
                'name' => "Pantone 570"
            ],
            [
                'id' => "765",
                'color' => "7cbaab",
                'name' => "Pantone 571"
            ],
            [
                'id' => "766",
                'color' => "94d6b7",
                'name' => "Pantone 572"
            ],
            [
                'id' => "767",
                'color' => "b7eed3",
                'name' => "Pantone 573"
            ],
            [
                'id' => "768",
                'color' => "ccddcc",
                'name' => "Pantone 574"
            ],
            [
                'id' => "769",
                'color' => "556610",
                'name' => "Pantone 575"
            ],
            [
                'id' => "770",
                'color' => "4c7128",
                'name' => "Pantone 576"
            ],
            [
                'id' => "771",
                'color' => "B7C892",
                'name' => "Pantone 577"
            ],
            [
                'id' => "772",
                'color' => "cecd93",
                'name' => "Pantone 578"
            ],
            [
                'id' => "773",
                'color' => "cbdda6",
                'name' => "Pantone 579"
            ],
            [
                'id' => "774",
                'color' => "cecd93",
                'name' => "Pantone 580"
            ],
            [
                'id' => "775",
                'color' => "cbdda6",
                'name' => "Pantone 5743"
            ],
            [
                'id' => "776",
                'color' => "4c4825",
                'name' => "Pantone 5753"
            ],
            [
                'id' => "777",
                'color' => "6f7528",
                'name' => "Pantone 5763"
            ],
            [
                'id' => "778",
                'color' => "706e4e",
                'name' => "Pantone 5773"
            ],
            [
                'id' => "779",
                'color' => "b4ab74",
                'name' => "Pantone 5783"
            ],
            [
                'id' => "780",
                'color' => "b4ab74",
                'name' => "Pantone 5793"
            ],
            [
                'id' => "781",
                'color' => "ccccaa",
                'name' => "Pantone 5803"
            ],
            [
                'id' => "782",
                'color' => "ddddbb",
                'name' => "Pantone 5747"
            ],
            [
                'id' => "783",
                'color' => "46440e",
                'name' => "Pantone 5757"
            ],
            [
                'id' => "784",
                'color' => "6f7528",
                'name' => "Pantone 5767"
            ],
            [
                'id' => "785",
                'color' => "919650",
                'name' => "Pantone 5777"
            ],
            [
                'id' => "786",
                'color' => "b4ab74",
                'name' => "Pantone 5787"
            ],
            [
                'id' => "787",
                'color' => "cecd93",
                'name' => "Pantone 5797"
            ],
            [
                'id' => "788",
                'color' => "ccccaa",
                'name' => "Pantone 5807"
            ],
            [
                'id' => "789",
                'color' => "ddddbb",
                'name' => "Pantone 581"
            ],
            [
                'id' => "790",
                'color' => "76710a",
                'name' => "Pantone 582"
            ],
            [
                'id' => "791",
                'color' => "938d03",
                'name' => "Pantone 583"
            ],
            [
                'id' => "792",
                'color' => "aad702",
                'name' => "Pantone 584"
            ],
            [
                'id' => "793",
                'color' => "dbee6a",
                'name' => "Pantone 585"
            ],
            [
                'id' => "794",
                'color' => "dbee6a",
                'name' => "Pantone 586"
            ],
            [
                'id' => "795",
                'color' => "d4ee8f",
                'name' => "Pantone 587"
            ],
            [
                'id' => "796",
                'color' => "46440e",
                'name' => "Pantone 5815"
            ],
            [
                'id' => "797",
                'color' => "6f7528",
                'name' => "Pantone 5825"
            ],
            [
                'id' => "798",
                'color' => "919650",
                'name' => "Pantone 5835"
            ],
            [
                'id' => "799",
                'color' => "b4ab74",
                'name' => "Pantone 5845"
            ],
            [
                'id' => "800",
                'color' => "cecd93",
                'name' => "Pantone 5855"
            ],
            [
                'id' => "801",
                'color' => "ddcca7",
                'name' => "Pantone 5865"
            ],
            [
                'id' => "802",
                'color' => "ddddbb",
                'name' => "Pantone 5875"
            ],
            [
                'id' => "803",
                'color' => "f5efb3",
                'name' => "Pantone 600"
            ],
            [
                'id' => "804",
                'color' => "f5ef91",
                'name' => "Pantone 601"
            ],
            [
                'id' => "805",
                'color' => "ecdd78",
                'name' => "Pantone 602"
            ],
            [
                'id' => "806",
                'color' => "f5dc4c",
                'name' => "Pantone 603"
            ],
            [
                'id' => "807",
                'color' => "f2d923",
                'name' => "Pantone 604"
            ],
            [
                'id' => "808",
                'color' => "d9cc0a",
                'name' => "Pantone 605"
            ],
            [
                'id' => "809",
                'color' => "b6b202",
                'name' => "Pantone 606"
            ],
            [
                'id' => "810",
                'color' => "f5efb3",
                'name' => "Pantone 607"
            ],
            [
                'id' => "811",
                'color' => "f5efb3",
                'name' => "Pantone 608"
            ],
            [
                'id' => "812",
                'color' => "efdc98",
                'name' => "Pantone 609"
            ],
            [
                'id' => "813",
                'color' => "ecdd78",
                'name' => "Pantone 610"
            ],
            [
                'id' => "814",
                'color' => "dacf47",
                'name' => "Pantone 611"
            ],
            [
                'id' => "815",
                'color' => "d9cc0a",
                'name' => "Pantone 612"
            ],
            [
                'id' => "816",
                'color' => "b79903",
                'name' => "Pantone 613"
            ],
            [
                'id' => "817",
                'color' => "eeddaa",
                'name' => "Pantone 614"
            ],
            [
                'id' => "818",
                'color' => "dddda3",
                'name' => "Pantone 615"
            ],
            [
                'id' => "819",
                'color' => "cecd93",
                'name' => "Pantone 616"
            ],
            [
                'id' => "820",
                'color' => "d6cf6e",
                'name' => "Pantone 617"
            ],
            [
                'id' => "821",
                'color' => "b9ac52",
                'name' => "Pantone 618"
            ],
            [
                'id' => "822",
                'color' => "978c25",
                'name' => "Pantone 619"
            ],
            [
                'id' => "823",
                'color' => "76710a",
                'name' => "Pantone 620"
            ],
            [
                'id' => "824",
                'color' => "ccddcc",
                'name' => "Pantone 621"
            ],
            [
                'id' => "825",
                'color' => "b3cdb6",
                'name' => "Pantone 622"
            ],
            [
                'id' => "826",
                'color' => "a8bba9",
                'name' => "Pantone 623"
            ],
            [
                'id' => "827",
                'color' => "72948c",
                'name' => "Pantone 624"
            ],
            [
                'id' => "828",
                'color' => "67896f",
                'name' => "Pantone 625"
            ],
            [
                'id' => "829",
                'color' => "2f4f47",
                'name' => "Pantone 626"
            ],
            [
                'id' => "830",
                'color' => "062d31",
                'name' => "Pantone 627"
            ],
            [
                'id' => "831",
                'color' => "cceedf",
                'name' => "Pantone 628"
            ],
            [
                'id' => "832",
                'color' => "b4d3d1",
                'name' => "Pantone 629"
            ],
            [
                'id' => "833",
                'color' => "93d6d6",
                'name' => "Pantone 630"
            ],
            [
                'id' => "834",
                'color' => "4fbac6",
                'name' => "Pantone 631"
            ],
            [
                'id' => "835",
                'color' => "01accf",
                'name' => "Pantone 632"
            ],
            [
                'id' => "836",
                'color' => "04729e",
                'name' => "Pantone 633"
            ],
            [
                'id' => "837",
                'color' => "04729e",
                'name' => "Pantone 634"
            ],
            [
                'id' => "838",
                'color' => "afd7f7",
                'name' => "Pantone 635"
            ],
            [
                'id' => "839",
                'color' => "04729e",
                'name' => "Pantone 636"
            ],
            [
                'id' => "840",
                'color' => "6db5e0",
                'name' => "Pantone 637"
            ],
            [
                'id' => "841",
                'color' => "01accf",
                'name' => "Pantone 638"
            ],
            [
                'id' => "842",
                'color' => "01accf",
                'name' => "Pantone 639"
            ],
            [
                'id' => "843",
                'color' => "0582be",
                'name' => "Pantone 640"
            ],
            [
                'id' => "844",
                'color' => "04729e",
                'name' => "Pantone 641"
            ],
            [
                'id' => "845",
                'color' => "c9dddd",
                'name' => "Pantone 642"
            ],
            [
                'id' => "846",
                'color' => "b4d3d1",
                'name' => "Pantone 643"
            ],
            [
                'id' => "847",
                'color' => "9bb3d6",
                'name' => "Pantone 644"
            ],
            [
                'id' => "848",
                'color' => "6e91b6",
                'name' => "Pantone 645"
            ],
            [
                'id' => "849",
                'color' => "626b95",
                'name' => "Pantone 646"
            ],
            [
                'id' => "850",
                'color' => "2d4f7a",
                'name' => "Pantone 647"
            ],
            [
                'id' => "851",
                'color' => "062559",
                'name' => "Pantone 648"
            ],
            [
                'id' => "852",
                'color' => "ccccdd",
                'name' => "Pantone 649"
            ],
            [
                'id' => "853",
                'color' => "ccccdd",
                'name' => "Pantone 650"
            ],
            [
                'id' => "854",
                'color' => "aaaac0",
                'name' => "Pantone 651"
            ],
            [
                'id' => "855",
                'color' => "6e91b6",
                'name' => "Pantone 652"
            ],
            [
                'id' => "856",
                'color' => "2d4f7a",
                'name' => "Pantone 653"
            ],
            [
                'id' => "857",
                'color' => "062559",
                'name' => "Pantone 654"
            ],
            [
                'id' => "858",
                'color' => "070f2d",
                'name' => "Pantone 655"
            ],
            [
                'id' => "859",
                'color' => "ccddee",
                'name' => "Pantone 656"
            ],
            [
                'id' => "860",
                'color' => "c4ccee",
                'name' => "Pantone 657"
            ],
            [
                'id' => "861",
                'color' => "9bb3d6",
                'name' => "Pantone 658"
            ],
            [
                'id' => "862",
                'color' => "7070bd",
                'name' => "Pantone 659"
            ],
            [
                'id' => "863",
                'color' => "242d8d",
                'name' => "Pantone 660"
            ],
            [
                'id' => "864",
                'color' => "242d8d",
                'name' => "Pantone 661"
            ],
            [
                'id' => "865",
                'color' => "062559",
                'name' => "Pantone 662"
            ],
            [
                'id' => "866",
                'color' => "ddccdd",
                'name' => "Pantone 663"
            ],
            [
                'id' => "867",
                'color' => "ddcccc",
                'name' => "Pantone 664"
            ],
            [
                'id' => "868",
                'color' => "ccbbc3",
                'name' => "Pantone 665"
            ],
            [
                'id' => "869",
                'color' => "b292b2",
                'name' => "Pantone 666"
            ],
            [
                'id' => "870",
                'color' => "ac748e",
                'name' => "Pantone 667"
            ],
            [
                'id' => "871",
                'color' => "6e4473",
                'name' => "Pantone 668"
            ],
            [
                'id' => "872",
                'color' => "572852",
                'name' => "Pantone 669"
            ],
            [
                'id' => "873",
                'color' => "eeccde",
                'name' => "Pantone 670"
            ],
            [
                'id' => "874",
                'color' => "f4b6cf",
                'name' => "Pantone 671"
            ],
            [
                'id' => "875",
                'color' => "f4b6cf",
                'name' => "Pantone 672"
            ],
            [
                'id' => "876",
                'color' => "d990b5",
                'name' => "Pantone 673"
            ],
            [
                'id' => "877",
                'color' => "e771c0",
                'name' => "Pantone 674"
            ],
            [
                'id' => "878",
                'color' => "f52668",
                'name' => "Pantone 675"
            ],
            [
                'id' => "879",
                'color' => "9e1b62",
                'name' => "Pantone 676"
            ],
            [
                'id' => "880",
                'color' => "eeccde",
                'name' => "Pantone 677"
            ],
            [
                'id' => "881",
                'color' => "eecccc",
                'name' => "Pantone 678"
            ],
            [
                'id' => "882",
                'color' => "ddbbc3",
                'name' => "Pantone 679"
            ],
            [
                'id' => "883",
                'color' => "ddaabd",
                'name' => "Pantone 680"
            ],
            [
                'id' => "884",
                'color' => "ac748e",
                'name' => "Pantone 681"
            ],
            [
                'id' => "885",
                'color' => "a95379",
                'name' => "Pantone 682"
            ],
            [
                'id' => "886",
                'color' => "9e1b62",
                'name' => "Pantone 683"
            ],
            [
                'id' => "887",
                'color' => "eecccc",
                'name' => "Pantone 684"
            ],
            [
                'id' => "888",
                'color' => "ddbbc3",
                'name' => "Pantone 685"
            ],
            [
                'id' => "889",
                'color' => "ddaabd",
                'name' => "Pantone 686"
            ],
            [
                'id' => "890",
                'color' => "d3898f",
                'name' => "Pantone 687"
            ],
            [
                'id' => "891",
                'color' => "ac748e",
                'name' => "Pantone 688"
            ],
            [
                'id' => "892",
                'color' => "954668",
                'name' => "Pantone 689"
            ],
            [
                'id' => "893",
                'color' => "712c2b",
                'name' => "Pantone 690"
            ],
            [
                'id' => "894",
                'color' => "eecccc",
                'name' => "Pantone 691"
            ],
            [
                'id' => "895",
                'color' => "f6b4b7",
                'name' => "Pantone 692"
            ],
            [
                'id' => "896",
                'color' => "e3aaa9",
                'name' => "Pantone 693"
            ],
            [
                'id' => "897",
                'color' => "b56875",
                'name' => "Pantone 695"
            ],
            [
                'id' => "898",
                'color' => "874842",
                'name' => "Pantone 696"
            ],
            [
                'id' => "899",
                'color' => "712c2b",
                'name' => "Pantone 697"
            ],
            [
                'id' => "900",
                'color' => "eecccc",
                'name' => "Pantone 698"
            ],
            [
                'id' => "901",
                'color' => "f6b4b7",
                'name' => "Pantone 699"
            ],
            [
                'id' => "902",
                'color' => "f58d90",
                'name' => "Pantone 700"
            ],
            [
                'id' => "903",
                'color' => "f58d90",
                'name' => "Pantone 701"
            ],
            [
                'id' => "904",
                'color' => "f45d5b",
                'name' => "Pantone 702"
            ],
            [
                'id' => "905",
                'color' => "bb3745",
                'name' => "Pantone 703"
            ],
            [
                'id' => "906",
                'color' => "992c23",
                'name' => "Pantone 704"
            ],
            [
                'id' => "907",
                'color' => "ffddde",
                'name' => "Pantone 705"
            ],
            [
                'id' => "908",
                'color' => "ffccbb",
                'name' => "Pantone 706"
            ],
            [
                'id' => "909",
                'color' => "f6b4b7",
                'name' => "Pantone 707"
            ],
            [
                'id' => "910",
                'color' => "f58d90",
                'name' => "Pantone 708"
            ],
            [
                'id' => "911",
                'color' => "f45d5b",
                'name' => "Pantone 709"
            ],
            [
                'id' => "912",
                'color' => "bb3745",
                'name' => "Pantone 710"
            ],
            [
                'id' => "913",
                'color' => "dc1d19",
                'name' => "Pantone 711"
            ],
            [
                'id' => "914",
                'color' => "ffcca5",
                'name' => "Pantone 712"
            ],
            [
                'id' => "915",
                'color' => "eecca6",
                'name' => "Pantone 713"
            ],
            [
                'id' => "916",
                'color' => "f4ba8e",
                'name' => "Pantone 714"
            ],
            [
                'id' => "917",
                'color' => "fcaa53",
                'name' => "Pantone 715"
            ],
            [
                'id' => "918",
                'color' => "f78c13",
                'name' => "Pantone 716"
            ],
            [
                'id' => "919",
                'color' => "cf6002",
                'name' => "Pantone 717"
            ],
            [
                'id' => "920",
                'color' => "cf6002",
                'name' => "Pantone 718"
            ],
            [
                'id' => "921",
                'color' => "ffdda9",
                'name' => "Pantone 719"
            ],
            [
                'id' => "922",
                'color' => "f4ba8e",
                'name' => "Pantone 720"
            ],
            [
                'id' => "923",
                'color' => "d4ab78",
                'name' => "Pantone 721"
            ],
            [
                'id' => "924",
                'color' => "d28b52",
                'name' => "Pantone 722"
            ],
            [
                'id' => "925",
                'color' => "b37736",
                'name' => "Pantone 723"
            ],
            [
                'id' => "926",
                'color' => "8f6324",
                'name' => "Pantone 724"
            ],
            [
                'id' => "927",
                'color' => "6c4e09",
                'name' => "Pantone 725"
            ],
            [
                'id' => "928",
                'color' => "eeccbb",
                'name' => "Pantone 726"
            ],
            [
                'id' => "929",
                'color' => "f4ba8e",
                'name' => "Pantone 727"
            ],
            [
                'id' => "930",
                'color' => "d4ab78",
                'name' => "Pantone 728"
            ],
            [
                'id' => "931",
                'color' => "b28b6f",
                'name' => "Pantone 729"
            ],
            [
                'id' => "932",
                'color' => "b37736",
                'name' => "Pantone 730"
            ],
            [
                'id' => "933",
                'color' => "745127",
                'name' => "Pantone 731"
            ],
            [
                'id' => "934",
                'color' => "6e3204",
                'name' => "Pantone 732"
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
                'name' => "Pantone 801"
            ],
            [
                'id' => "942",
                'color' => "62d54e",
                'name' => "Pantone 802"
            ],
            [
                'id' => "943",
                'color' => "f6f031",
                'name' => "Pantone 803"
            ],
            [
                'id' => "944",
                'color' => "fe973b",
                'name' => "Pantone 804"
            ],
            [
                'id' => "945",
                'color' => "f45d5b",
                'name' => "Pantone 805"
            ],
            [
                'id' => "946",
                'color' => "ed0199",
                'name' => "Pantone 806"
            ],
            [
                'id' => "947",
                'color' => "ed0199",
                'name' => "Pantone 807"
            ],
            [
                'id' => "948",
                'color' => "02c195",
                'name' => "Pantone 808"
            ],
            [
                'id' => "949",
                'color' => "cfd32a",
                'name' => "Pantone 809"
            ],
            [
                'id' => "950",
                'color' => "f4d70e",
                'name' => "Pantone 810"
            ],
            [
                'id' => "951",
                'color' => "f78c13",
                'name' => "Pantone 811"
            ],
            [
                'id' => "952",
                'color' => "f52668",
                'name' => "Pantone 812"
            ],
            [
                'id' => "953",
                'color' => "ed0199",
                'name' => "Pantone 813"
            ],
            [
                'id' => "954",
                'color' => "9d6bc5",
                'name' => "Pantone 814"
            ],
        ];
    }

}
