<?php 

$string = $_POST["base_text"];


$countword = mb_strlen($string, "UTF-8");
$countline = substr_count($string, "\n");

//echo "文字数:".$countword."\n";
//echo "改行数:".$countline."\n";

$line = intdiv($countword , 28) + $countline + 1;

if($countword > 20){
    //ボードの大きさ
    $width = 900;
    $height = $line*50 + 100;
}else{
    //ボードの大きさ
    $width = $countword*40;
    $height = $countword*4 + 56;
}

//元となるボードの生成
$img = imagecreatetruecolor($width, $height);
imagefilledrectangle($img, 0, 0, $width, $height, imagecolorallocate($img, 224, 224, 224));

//背景を透過する
imagecolortransparent($img, imagecolorallocate($img, 0, 0, 0));

//この配列に合成する文字列を格納する
$imgFns = array('11.png','12.png','13.png','14.png', '15.png');

//一文字目の座標
$position_x = 8;
$position_y = 8;

$output_line = 0;

$string = mb_str_split($string);
//var_dump($string);

foreach($string as $cr){
    if($cr == "\n"){
        $output_line += 1;
        $position_x = 8;
        $position_y = $output_line*50 + 8;
    }else{
        $src = "character/".font($cr);
        $img2 = imagecreatefrompng($src); // 合成する画像を取り込む

        // 合成する画像のサイズを取得
        $sx = imagesx($img2);
        $sy = imagesy($img2);

        
        imageLayerEffect($img, IMG_EFFECT_ALPHABLEND);// 合成する際、透過を考慮する
        imagecopy($img, $img2, $position_x, $position_y, 0, 0, $sx, $sy); // 合成


        if($position_x < 830){
            //1文字ごとに24〜36px横にずらす
            $position_x += rand(24, 36);

            //西森風に斜めにするために一文字ごとに2〜5pxずつy座標をずらす
            $position_y += rand(2, 5);
        }else{
            $output_line += 1;
            $position_x = 8;
            $position_y = $output_line*50 + 8;
        }
        imagedestroy($img2); // 破棄
    }
}

$imgid = uniqid();
$img_src = "data/".$imgid.".png";

imagepng( $img, $img_src);
imagedestroy($img);


function font($base){
    $result = "";

    switch($base){
        case 'ア':
            $result = '11.png';
            break;
        case 'イ':
            $result = '12.png';
            break;
        case 'ウ':
            $result = '13.png';
            break;
        case 'エ':
            $result = '14.png';
            break;
        case 'オ':
            $result = '15.png';
            break;
        case 'カ':
            $result = '21.png';
            break;
        case 'キ':
            $result = '22.png';
            break;
        case 'ク':
            $result = '23.png';
            break;
        case 'ケ':
            $result = '24.png';
            break;
        case 'コ':
            $result = '25.png';
            break;
        case 'サ':
            $result = '31.png';
            break;
        case 'シ':
            $result = '32.png';
            break;
        case 'ス':
            $result = '33.png';
            break;
        case 'セ':
            $result = '34.png';
            break;
        case 'ソ':
            $result = '35.png';
            break;
        case 'タ':
            $result = '41.png';
            break;
        case 'チ':
            $result = '42.png';
            break;
        case 'ツ':
            $result = '43.png';
            break;
        case 'テ':
            $result = '44.png';
            break;
        case 'ト':
            $result = '45.png';
            break;
        case 'ナ':
            $result = 'initial.png';
            break;
        case 'ニ':
            $result = '52.png';
            break;
        case 'ヌ':
            $result = '53.png';
            break;
        case 'ネ':
            $result = '54.png';
            break;
        case 'ノ':
            $result = '55.png';
            break;
        case 'ハ':
            $result = '61.png';
            break;
        case 'ヒ':
            $result = '62.png';
            break;
        case 'フ':
            $result = '63.png';
            break;
        case 'ヘ':
            $result = '64.png';
            break;
        case 'ホ':
            $result = 'initial.png';
            break;
        case 'マ':
            $result = '71.png';
            break;
        case 'ミ':
            $result = '72.png';
            break;
        case 'ム':
            $result = '73.png';
            break;
        case 'メ':
            $result = '74.png';
            break;
        case 'モ':
            $result = '75.png';
            break;
        case 'ヤ':
            $result = '81.png';
            break;
        case 'ユ':
            $result = '83.png';
            break;
        case 'ヨ':
            $result = '85.png';
            break;
        case 'ラ':
            $result = '91.png';
            break;
        case 'リ':
            $result = '92.png';
            break;
        case 'ル':
            $result = '93.png';
            break;
        case 'レ':
            $result = '94.png';
            break;
        case 'ロ':
            $result = '95.png';
            break;
        case 'ワ':
            $result = '101.png';
            break;
        case 'ヲ':
            $result = 'initial.png';
            break;
        case 'ン':
            $result = '105.png';
            break;

        default:
            $result = 'null';
            break;
        
    }

    return $result;
}

?>


<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/result.css">
        <link rel="stylesheet" href="css/common.css">
        <title>生成結果</title>

        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="apple-touch-icon" sizes="512x512" href="images/icon.png">
        <link rel="shortcut icon" href="images/icon.png">
    </head>
    <body>
        <header>
            <h1>西森テキストメーカー</h1>
        </header>

        <div class="main-section">
            <h3>生成結果</h3>
            <p>スマホの場合、以下の画像を長押しすると保存が可能です。PCの場合は右クリックで保存できます。</p>
            <img src="<?= $img_src ?>">

            <a href="index.php" class="link-button">
                <div class="restart-button">
                    他の文章も試す
                </div>
            </a>

            <p>文字が出力されない場合は、その文字のフォントデータがまだ作られていない可能性があります。フォントデータが追加されるまでお待ちください。</p>

        </div>

        <footer>
            <ul>
                <li><a href="versionhistory.html">バージョン履歴</a></li>
            </ul>
            <p>Version1.0.0</p>
            <p>(C) フジ 2022</p>
        </footer>
    </body>
 </html>