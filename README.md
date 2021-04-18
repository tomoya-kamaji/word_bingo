# ワードビンゴ
PHPのバージョン：7.4.12



## 環境構築
---
レポジトリをクローン
```
git clone https://github.com/tomoya-kamaji/word_bingo.git
cd word_bingo
```
実行ファイル：word_bingo.php
```
php word_bingo.php
```

## 指針
---
> ①：”ビンゴカード(bingoCard)”を作成する

> ②：”入力されたワード(selected)”、”ビンゴカード(bingoCard)”から”判定用のビンゴカード(bingoJudgeCard)”を作成
- 印がつけば 1
- つかなければ 0

> ③： 判定用のビンゴカードからビンゴを判定
- 横の判定
- 縦の判定
- 右斜め下の判定
- 右斜め上の判定

> ④：ビンゴが存在すればyes、存在しなければ0

## 備考
---
PHPUnitを使用してテストを実施

テスト実行
```
vendor/bin/phpunit test\
```

src/Sample.php

test/SampleTest.php
