<!DOCTYPE html>
<html>
<head>
    <title>レポート</title>
</head>
<body>
    <h1>データ取得および保存レポート</h1>
    <p>日付: {{ now()->toDateString() }}</p>
    <p>データクロールプロセスの結果は以下の通りです:</p>
    <ul>
        <li><strong>総レコード数:</strong> {{ $stats['total'] }}</li>
        <!-- <li><strong>処理済みレコード数:</strong> {{ $stats['processed'] }}</li>
        <li><strong>保存されたレコード数:</strong> {{ $stats['saved'] }}</li> -->
        <li><strong>スキップされたレコード数:</strong> {{ $stats['skipped'] }}</li>
    </ul>

    <p>詳細データを表示する: <a href="https://aquaticadventureshop.com/datashow" target="_blank">https://aquaticadventureshop.com/datashow</a></p>
    
    <p>ありがとうございました!</p>
</body>
</html>
