<?php
// 結果を代入する変数
$result = false;

// ポスト変数が存在するか
if (isset($_POST['choice'])) {
    $janken = array(
        'グー',
        'チョキ',
        'パー'
    );

    // エスケープ
    $player = htmlspecialchars($_POST['choice'], ENT_QUOTES, 'UTF-8');

    // 相手の手をランダムで決定
    $com = $janken[array_rand($janken)];

    // 勝敗判定
    if ($player === 'グー' && $com === 'チョキ') {
        $result = '勝ち<img src="画像URL" alt="あいこ">';
    } elseif ($player === 'グー' && $com === 'グー') {
        $result = 'あいこ<img src="画像URL" alt="あいこ">';
    } elseif ($player === 'グー' && $com === 'パー') {
        $result = '負け<img src="画像URL" alt="あいこ">';
    } elseif ($player === 'チョキ' && $com === 'グー') {
        $result = '負け';
    }elseif ($player === 'パー' && $com === 'パー') {
		$result = '<img src="画像URL" alt="あいこ">
					あいこだとっ！もう一度勝負だ！';
	}
	// 以下、チョキとパーのコード省略...
	// aaaasssl
	
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>PHPでじゃんけんゲーム</title>
<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="top"> 
<p>選んでください。</p>
</div>

<div class="formbox">


<form action="" method="post">
    <button type="submit" name="choice" value="グー">グー</button>
    <button type="submit" name="choice" value="チョキ">チョキ</button>
    <button type="submit" name="choice" value="パー">パー</button>
</form>
</div>


<div class="kekka">

<?php if ($result) : ?>
    <p>結果</p>

    <p>
    あなた：<?php echo $player; ?><br>
    あいて：<?php echo $com; ?>
    </p>

    <p><?php echo $result; ?>です。</p>
<?php endif; ?>
</div>
</body>
</html>