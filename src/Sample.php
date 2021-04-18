<?php

namespace Sample;

class Sample {
    public function WordBing($S, $bingoCard, $N , $inputselected) {
      $bingoJudgeCard = []; //bingoCardで印がついた箇所は1。つかない箇所は0を格納する。
      $selected = [];  //選ばれたワード

      /* 標準入力部分
      $S = (int)(fgets(STDIN));
      for ($i = 0; $i < $S; $i++) {
        $bingoCard[$i] = explode(' ', trim(fgets(STDIN)));
      }
      $N = (int)trim(fgets(STDIN));
      */

      // bingoJudgeCardの初期化
      for ($i = 0; $i < $S; $i++) {
        for ($j = 0; $j < $S; $j++) {
          $bingoJudgeCard[$i][$j] = 0;
        }
      }

      for ($i = 0; $i < $N; $i++) {
        // $selected = trim(fgets(STDIN));
        $selected = $inputselected[$i];
        $position = find_position($bingoCard, $selected, $S);

        if (!is_null($position)) {
          $bingoJudgeCard[$position[0]][$position[1]] = 1;
        }
      }

      $isRow = bingo_row($bingoJudgeCard);
      $isColumn = bingo_column($bingoJudgeCard, $S);
      $isDiagonalDown = bingo_diagonal_down($bingoJudgeCard, $S);
      $isDiagonalUp = bingo_diagonal_up($bingoJudgeCard, $S);

      if ($isRow || $isColumn || $isDiagonalDown || $isDiagonalUp) {
        // echo 'yes';
        return 'yes';
      } else {
        // echo 'no';
        return 'no';
      }
    }
}


/* -----------以下は用意した関数----------- */

/*
  ビンゴの位置を探す関数
  IN
    $arr：ビンゴカード
    $selected：選ばれたワード
    $S：縦横の数
  OUT
    ビンゴが存在する位置(i,j)
    存在しなければnull
*/
function find_position($arr, $selected, $S)
{
  for ($i = 0; $i < $S; $i++) {
    for ($j = 0; $j < $S; $j++) {
      if ($arr[$i][$j] == $selected) {
        return array($i, $j);
      }
    }
  }
  return null;
}

/*
  横のビンゴ判定
    ”横の最初の数が1”かつ”横が全て重複”していたらビンゴ。これを行数分繰り返す。
  IN
    $arrs：$bingoJudgeCard
  OUT
    ビンゴならtrue。ハズレはfalse
*/
function bingo_row($arrs)
{
  foreach ($arrs as $arr) {
    if ($arr[0] == 1 && count(array_unique($arr)) == 1) {
      return true;
    }
  }
  return false;
}

/*
  縦のビンゴ判定
    横のビンゴ判定を再利用するため、縦横を置換。その後、横判定を利用
  IN
    $arrs：$bingoJudgeCard
    $S：縦横の数
  OUT
    ビンゴならtrue。ハズレはfalse
*/
function bingo_column($arrs, $S)
{
  # 横縦を置換
  for ($i = 0; $i < $S; $i++) {
    for ($j = 0; $j < $S; $j++) {
      $replace_arrs[$i][$j] = $arrs[$j][$i];
    }
  }
  # 横の判定
  foreach ($replace_arrs as $arr) {
    if ($arr[0] == 1 && count(array_unique($arr)) == 1) {
      return true;
    }
  }
  return false;
}

/*
  右斜下のビンゴ判定
    i==jなら右斜下の位置にある。1つでも0があればfalse。なければtrue
  IN
    $arrs：$bingoJudgeCard
    $S：縦横の数
  OUT
    ビンゴならtrue。ハズレはfalse
*/
function bingo_diagonal_down($arrs, $S)
{
  for ($i = 0; $i < $S; $i++) {
    for ($j = 0; $j < $S; $j++) {
      if ($i == $j && $arrs[$i][$j] == 0) {
        return false;
      }
    }
  }
  return true;
}

/*
  右斜上のビンゴ判定
    j==S-1-iなら右斜上の位置にある。1つでも0があればfalse。なければtrue。
  IN
    $arrs：$bingoJudgeCard
    $S：縦横の数
  OUT
    ビンゴならtrue。ハズレはfalse
*/
function bingo_diagonal_up($arrs, $S)
{
  for ($i = 0; $i < $S; $i++) {
    for ($j = 0; $j < $S; $j++) {
      if ($j == $S - 1 - $i && $arrs[$i][$j] == 0) {
        return false;
      }
    }
  }
  return true;
}
