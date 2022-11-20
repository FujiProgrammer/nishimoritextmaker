<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/index.css">
        <link rel="stylesheet" href="css/common.css">
        <title>西森テキストメーカー</title>

        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="apple-touch-icon" sizes="512x512" href="images/icon.png">
        <link rel="shortcut icon" href="images/icon.png">

        <meta property="og:url" content="https://systemfuji.com/nishimoritextmaker/">
        <meta property="og:site_name" content="西森テキストメーカー">
        <meta property="og:image" content="https://systemfuji.com/nishimoritextmaker/images/logo.png">
        <meta name="twitter:card" content="summary_large_image">

    </head>
    <body>
        <header>
            <h1>西森テキストメーカー</h1>
        </header>

        <div class="main-section">
            <form action="result.php" method="POST">
                <p>生成したい文字列を入力してください。</p>
                <textarea name="base_text" id="base_text"></textarea>

                <h4>注意事項</h4>
                <ul>
                    <li>対応している文字は、カタカナのみです。（一部のカタカナはまだフォントデータがないため、代わりに最上先生の絵が出力されます。）</li>
                    <li>バグなどがありましたらお知らせください。</li>
                    <li>このツールで生成されたデータは、常識の範囲内であれば自由に使ってもらって問題ないです。</li>
                    <li>生成されたデータはサーバに保管されます。</li>
                    <li>画像処理にはサーバに負荷がかかるため、同一者からの異常な量のアクセスを確認した場合、アクセスを遮断することがあります。</li>
                </ul>
                <button>生成</button>
            </form>
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