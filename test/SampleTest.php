<?php

require_once('vendor/autoload.php');

class SampleTest extends PHPUnit\Framework\TestCase {
    //入力例1
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
    //入力例2
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
    //入力例3
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

    //横ビンゴ
    public function test4()
    {
        $sample = new Sample\Sample();
        $S = 3;
        $bingoCard[0] = array('q', 'w', 'e');
        $bingoCard[1] = array('a', 's', 'd');
        $bingoCard[2] = array('z', 'x', 'c');
        $N = 3;
        $inputselected = array('q', 'w', 'e');
        $this->assertEquals('yes', $sample->WordBing($S, $bingoCard, $N, $inputselected));
    }
    //縦ビンゴ
    public function test5()
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
    //右斜め上ビンゴ
    public function test6()
    {
        $sample = new Sample\Sample();
        $S = 3;
        $bingoCard[0] = array('q', 'w', 'e');
        $bingoCard[1] = array('a', 's', 'd');
        $bingoCard[2] = array('z', 'x', 'c');
        $N = 3;
        $inputselected = array('z', 's', 'e');
        $this->assertEquals('yes', $sample->WordBing($S, $bingoCard, $N, $inputselected));
    }
    //右斜め下ビンゴ
    public function test7()
    {
        $sample = new Sample\Sample();
        $S = 3;
        $bingoCard[0] = array('q', 'w', 'e');
        $bingoCard[1] = array('a', 's', 'd');
        $bingoCard[2] = array('z', 'x', 'c');
        $N = 3;
        $inputselected = array('q', 's', 'c');
        $this->assertEquals('yes', $sample->WordBing($S, $bingoCard, $N, $inputselected));
    }
    //ビンゴなし
    public function test8()
    {
        $sample = new Sample\Sample();
        $S = 3;
        $bingoCard[0] = array('q', 'w', 'e');
        $bingoCard[1] = array('a', 's', 'd');
        $bingoCard[2] = array('z', 'x', 'c');
        $N = 5;
        $inputselected = array('q', 'w','a', 'd','c');
        $this->assertEquals('no', $sample->WordBing($S, $bingoCard, $N, $inputselected));
    }
}
