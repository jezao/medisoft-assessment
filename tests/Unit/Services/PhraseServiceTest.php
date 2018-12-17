<?php

namespace Tests\Unit\Services;

use App\Services\PhraseService;
use PHPUnit\Framework\TestCase;

//use Tests\TestCase;

class PhraseServiceTest extends TestCase
{

    public function testShouldInstanciatePhraseService()
    {

        $service = new PhraseService();
        $this->assertInstanceOf(PhraseService::class, $service);

    }

    public function testShouldReturnAnArrayOfStrings()
    {

        $service = new PhraseService();
        $arr = $service->phraseToArray('Phrase');

        $this->assertEquals(sizeof($arr), sizeof(['P', 'h', 'r', 'a', 's', 'e']));
        $this->assertTrue(['P', 'h', 'r', 'a', 's', 'e'] === $arr);

    }

    public function testShouldReturnAnArrayWithCountOfChars()
    {
        $service = new PhraseService();
        $service->phraseToArray('Jefferson');
        $countChars = $service->countChars();

        $this->assertTrue(is_array($countChars));
        $this->assertTrue($countChars['e'] == 2);
        $this->assertTrue($countChars['f'] == 2);

    }


    public function testShouldReturnBeforeAndAfterChars()
    {
        $service = new PhraseService();
        $service->phraseToArray('Jefferson');

        $before_after = $service->getBeforeAfter('e');

        $this->assertTrue($before_after['before'][0] == 'f' && $before_after['before'][1] == 'r'
            && $before_after['after'][0] == 'J' && $before_after['after'][1] == 'f');
    }

    public function testShouldReturnOnlyBefore()
    {
        $service = new PhraseService();
        $service->phraseToArray('Jefferson');

        $before_after = $service->getBeforeAfter('J');

        $this->assertTrue(isset($before_after['before']) && !isset($before_after['after']));
    }

    public function testShouldReturnOnlyAfter()
    {
        $service = new PhraseService();
        $service->phraseToArray('Jefferson');
        $before_after = $service->getBeforeAfter('n');
        $this->assertTrue(!isset($before_after['before']) && isset($before_after['after']));
    }

    public function testShouldReturnTheDistanceBetweenChars()
    {
        $service = new PhraseService();
        $service->phraseToArray('Jefferson');

        $distance = $service->getDistance('e');

        $this->assertEquals($distance, 2);
    }

    public function testShouldAnalyzeReturnAnObjectInfo()
    {
        $service = new PhraseService();
        $analyze = $service->analyze('Jefferson');



        $this->assertInstanceOf(\stdClass::class,$analyze);

        $arr = json_decode(\GuzzleHttp\json_encode($analyze),true);

        $this->assertEquals($arr[0]['char'],'J');



    }

}
