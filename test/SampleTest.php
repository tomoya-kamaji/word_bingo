<?php

require_once('vendor/autoload.php');

class SampleTest extends PHPUnit\Framework\TestCase {
    public function test1() {
        $sample = new Sample\Sample();
        $S = 3;
        $bingoCard[0] = array('apple', 'orange', 'cube');
        $bingoCard[1] = array('batch', 'web', 'cloud');
        $bingoCard[2] = array('sql', 'http', 'https');
        $N = 7;
        $inputselected = array('web', 'https','windows', 'batch', 'keyboard','apple', 'cpu');
        $this->assertEquals('yes', $sample->WordBing($S, $bingoCard, $N, $inputselected));
    }
    public function test2() {
        $sample = new Sample\Sample();
        $S = 3;
        $bingoCard[0] = array('cpp', 'kotlin', 'typescript');
        $bingoCard[1] = array('csharpa', 'ruby', 'php');
        $bingoCard[2] = array('go', 'rust', 'dart');
        $N = 5;
        $inputselected = array('java', 'delphi','fortran','haskell', 'python');
        $this->assertEquals('no', $sample->WordBing($S, $bingoCard, $N, $inputselected));
    }

    public function test3()
    {
        $sample = new Sample\Sample();
        $S = 4;
        $bingoCard[0] = array('beer', 'wine', 'gin', 'vodka');
        $bingoCard[1] = array('beef', 'chicken', 'pork', 'seafood');
        $bingoCard[2] = array('ant', 'bee', 'ladybug', 'beetle');
        $bingoCard[3] = array('bear', 'snake', 'dog', 'camel');
        $N = 7;
        $inputselected = array('be', 'bear', 'bee', 'beef', 'been','beer','beetle');
        $this->assertEquals('no', $sample->WordBing($S, $bingoCard, $N, $inputselected));
    }

    //斜めビンゴ
    public function test4()
    {
        $sample = new Sample\Sample();
        $S = 3;
        $bingoCard[0] = array('q', 'w', 'e');
        $bingoCard[1] = array('a', 's', 'd');
        $bingoCard[2] = array('z', 'x', 'c');
        $N = 3;
        $inputselected = array('q', 'a', 'z');
        $this->assertEquals('yes', $sample->WordBing($S, $bingoCard, $N, $inputselected));
    }
}
