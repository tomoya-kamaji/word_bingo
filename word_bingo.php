<?php
$bingoCard = [];

$S = (int)(fgets(STDIN));

for ($i = 0; $i < $S; $i++) {
  $bingoCard[$i] = explode(' ', trim(fgets(STDIN))) ;
}
$N = (int)trim(fgets(STDIN));

$selected = [];
$bingoJudgeCards = [];

// bingoJudgeCardsの初期化
for ($i = 0; $i < $S; $i++) {
  for ($j = 0; $j < $S; $j++) {
    $bingoJudgeCards[$i][$j] = 0;
  }
}

for ($i = 0; $i < $N; $i++) {
    $selected = trim(fgets(STDIN));
    $position = find_position($bingoCard,$selected, $S);

    if (!is_null($position)) {
      $bingoJudgeCards[$position[0]][$position[1]] = 1;
    }
}


$isRow = bingo_row($bingoJudgeCards);
$isColumn = bingo_column($bingoJudgeCards,$S);
$isDiagonalDown = bingo_diagonal_down($bingoJudgeCards,$S);
$isDiagonalUp = bingo_diagonal_up($bingoJudgeCards, $S);


if($isRow || $isColumn || $isDiagonalDown || $isDiagonalUp){
  echo 'yes';
}
else{
  echo 'no';
}

# 文字の検索
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

# 横のビンゴ判定
function bingo_row($arrs){
  foreach ($arrs as $arr) {
    if($arr[0] == 1 && count(array_unique($arr)) == 1){
      return true;
    }
  }
  return false;
}

# 縦のビンゴ判定
function bingo_column($arrs, $S){
  # 横と縦を入れ替える
  for ($i = 0; $i < $S; $i++) {
    for ($j = 0; $j < $S; $j++) {
      $replace_arrs[$i][$j] = $arrs[$j][$i];
    }
  }
  foreach ($replace_arrs as $arr) {
    if($arr[0] == 1 && count(array_unique($arr)) == 1){
      return true;
    }
  }
  return false;
}

# 右斜下のビンゴ判定
function bingo_diagonal_down($arrs, $S)
{
  for ($i = 0; $i < $S; $i++) {
    for ($j = 0; $j < $S; $j++) {
      if($i == $j && $arrs[$i][$j] == 0){
        return false;
      }
    }
  }
  return true;
}

# 右斜上のビンゴ判定
function bingo_diagonal_up($arrs, $S)
{
  for ($i = 0; $i < $S; $i++) {
    for ($j = 0; $j < $S; $j++) {
      if ($i == $S-1-$i && $arrs[$i][$j] == 0) {
        return false;
      }
    }
  }
  return true;
}
