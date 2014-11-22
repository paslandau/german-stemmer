<?php
use paslandau\GermanStemmer\GermanStemmer;

/**
 *	A short PHPUnit test case.
 *
 *	You can alter the code (maybe to optimize it) but this test should always
 *	be validated.
 *
 *	@author Aris Buzachis <buzachis.aris@gmail.com>
 *  @author Pascal Landau <kontakt@myseosolution.de>
 */

class GermanStemmerTest extends PHPUnit_Framework_TestCase
{
    public static function setUpBeforeClass()
    {
        mb_internal_encoding("utf-8");
    }

    public function tearDown(){
        mb_internal_encoding("utf-8");
    }

    public function testStep1() {
		$words = array(
			'aufeinander' => 'aufeinand',
			'aufeinanderbiss' => 'aufeinanderbiss',
			'aufeinanderfolge' => 'aufeinanderfolg',
			'aufeinanderfolgen' => 'aufeinanderfolg',
			'aufeinanderfolgend' => 'aufeinanderfolg',
			'aufeinanderfolgende' => 'aufeinanderfolg',
			'aufeinanderfolgenden' => 'aufeinanderfolg',
			'aufeinanderfolgender' => 'aufeinanderfolg',
			'aufeinanderfolgt' => 'aufeinanderfolgt',
			'aufeinanderfolgten' => 'aufeinanderfolgt',
			'aufeinanderschlügen' => 'aufeinanderschlug',
			'aufenthalt' => 'aufenthalt',
			'aufenthalten' => 'aufenthalt',
			'aufenthaltes' => 'aufenthalt',
			'auffassungsvermögen' => 'auffassungsvermog',
			'kategorie' => 'kategori',
			'kategorien' => 'kategori',
			'kategorisch' => 'kategor',
			'kategorische' => 'kategor',
			'kategorischen' => 'kategor',
			'kategorischer' => 'kategor',
			'kater' => 'kat',
			'katerliede' => 'katerlied',
			'katern' => 'kat',
			'katers' => 'kat',
			'kattunhalstücher' => 'kattunhalstuch',
			'katzensprung' => 'katzenspr',
			'auferstehung' => 'aufersteh',
			'kauen' => 'kau'
		);

		foreach ($words as $word => $expectedStem) {
			$this->assertEquals($expectedStem, GermanStemmer::stem($word));
		}
	}

    public function test_ShouldThrowExceptionOnUnknownInput(){
        $this->setExpectedException(InvalidArgumentException::class);
        $word = "vergnüglich";
        mb_internal_encoding("cp1252");
        GermanStemmer::stem($word);
    }

    public function test_ShouldSufficeSnowballExampleSet(){
        // see http://snowball.tartarus.org/algorithms/german/stemmer.html
        $words =[
            "aufeinander" => "aufeinand",
            "aufeinanderbiss" => "aufeinanderbiss",
            "aufeinanderfolge" => "aufeinanderfolg",
            "aufeinanderfolgen" => "aufeinanderfolg",
            "aufeinanderfolgend" => "aufeinanderfolg",
            "aufeinanderfolgende" => "aufeinanderfolg",
            "aufeinanderfolgenden" => "aufeinanderfolg",
            "aufeinanderfolgender" => "aufeinanderfolg",
            "aufeinanderfolgt" => "aufeinanderfolgt",
            "aufeinanderfolgten" => "aufeinanderfolgt",
            "aufeinanderschlügen" => "aufeinanderschlug",
            "aufenthalt" => "aufenthalt",
            "aufenthalten" => "aufenthalt",
            "aufenthaltes" => "aufenthalt",
            "auferlegen" => "auferleg",
            "auferlegt" => "auferlegt",
            "auferlegten" => "auferlegt",
            "auferstand" => "auferstand",
            "auferstanden" => "auferstand",
            "auferstehen" => "aufersteh",
            "aufersteht" => "aufersteht",
            "auferstehung" => "aufersteh",
            "auferstünde" => "auferstund",
            "auferwecken" => "auferweck",
            "auferweckt" => "auferweckt",
            "auferzogen" => "auferzog",
            "aufessen" => "aufess",
            "auffa" => "auffa",
            "auffallen" => "auffall",
            "auffallend" => "auffall",
            "auffallenden" => "auffall",
            "auffallender" => "auffall",
            "auffällig" => "auffall",
            "auffälligen" => "auffall",
            "auffälliges" => "auffall",
            "auffassen" => "auffass",
            "auffasst" => "auffasst",
            "auffaßt" => "auffasst",
            "auffassung" => "auffass",
            "auffassungsvermögen" => "auffassungsvermog",
            "kategorie" => "kategori",
            "kategorien" => "kategori",
            "kategorisch" => "kategor",
            "kategorische" => "kategor",
            "kategorischen" => "kategor",
            "kategorischer" => "kategor",
            "kater" => "kat",
            "katerliede" => "katerlied",
            "katern" => "kat",
            "katers" => "kat",
            "käthchen" => "kathch",
            "kathedrale" => "kathedral",
            "kathinka" => "kathinka",
            "katholik" => "kathol",
            "katholische" => "kathol",
            "katholischen" => "kathol",
            "katholischer" => "kathol",
            "kattun" => "kattun",
            "kattunhalstücher" => "kattunhalstuch",
            "katz" => "katz",
            "kätzchen" => "katzch",
            "kätzchens" => "katzch",
            "katze" => "katz",
            "katzen" => "katz",
            "katzenschmer" => "katzenschm",
            "katzensprung" => "katzenspr",
            "katzenwürde" => "katzenwurd",
            "kätzin" => "katzin",
            "kätzlein" => "katzlein",
            "katzmann" => "katzmann",
            "kauen" => "kau",
            "kauerte" => "kauert",
            "kauf" => "kauf",
            "kaufe" => "kauf",
            "kaufen" => "kauf",
            "käufer" => "kauf",
            "kauffahrer" => "kauffahr",
            "kaufherr" => "kaufherr",
            "kaufleute" => "kaufleut",
            "käuflich" => "kauflich",
        ];

        foreach ($words as $word => $expectedStem) {
            $this->assertEquals($expectedStem, GermanStemmer::stem($word));
        }
    }
}