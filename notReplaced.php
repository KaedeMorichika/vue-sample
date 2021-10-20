<?php
// 本来ならDBなどから取ってくる
$user_first_name = '太郎';
$user_last_name = 'OC';
$toDoList = [
    [
        'id' => 0,
        'isDone' => true,
        'title' => '洗濯',
        'tilTime' => '2021-10-25 10:00:00',
        'info' => '洗濯の前に必ず天気予報を見ること。部屋干しする場合、先に掃除機かけること。'
    ],
    [
        'id' => 1,
        'isDone' => false,
        'title' => '食材買う',
        'tilTime' => '2021-10-25 18:00:00',
        'info' => '買う物 ジャガイモ, ニンジン, 鶏肉, とまと'
    ],
    [
        'id' => 2,
        'isDone' => true,
        'title' => '掃除機かける',
        'tilTime' => '2021-10-25 13:00:00',
        'info' => '洗濯部屋干しするんだったら、干す前にかけて'
    ]
];
// なんちゃってViewModelの作成
$toDoAppViewModel = [];
$toDoAppViewModel['user_full_name'] = $user_last_name . ' ' . $user_first_name;
$toDoAppViewModel['toDoListViewModel'] = [];
foreach ($toDoList as $key => $toDoItem) {
    $toDoItemViewModel = $toDoItem;
    $date = new DateTimeImmutable($toDoItem['tilTime']);
    $toDoItemViewModel['displayTilTime'] = '～' . $date->format('Y') . '年' . $date->format('m') . '月' . $date->format('d') . '日'
        . $date->format('H') . $date->format('i') . $date->format('s');
    $toDoAppViewModel['toDoListViewModel'][] = $toDoItemViewModel;
}
?>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Vue.js入門 ～ToDoアプリ編～</title>
    <link rel="stylesheet" href="sample.css">
</head>
<body>
<h1>Vue.js入門 ～ToDoアプリ編～</h1>
<div id="entryApp">
    <div class="user-name">ようこそ {$toDoAppViewModel.user_full_name} さん</div>
    {foreach from=$toDoAppViewModel.toDoListViewModel item="toDoItemViewModel" key="key"}
    <div class="to-do-item" data-key="key">
        <div>
            題名：{$toDoItemViewModel.title}
            {if $toDoItemViewModel.isDone}
            <span id="noticeIsDone{$key}" class="notice-is-done" style="display: inline-block">完了</span>
            {else}
            <span id="noticeIsDone{$key}" class="notice-is-done" style="display: none">完了</span>
            {/if}
        </div>
        <div>{$toDoItemViewModel.displayTilTime}</div>
        <div>
            備考：<div>{$toDoItemViewModel.info}</div>
        </div>
    </div>
    {/foreach}
</div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script>
    let toDoList = {$toDoList|@json_encode};

    $(document).on('DOMContentLoaded', function () {
        $('.to-do-item').on('dblclick', function() {
            let key = $(this).data('key');

            // データのisDoneがtrueなら必ず表示、falseなら必ず非表示というわけではない。
            // もし他の場所で「完了」の表示をいじるjQueryがあったら、意図しない挙動になりがち。
            if ($('#noticeIsDone'+key).css('display') === 'inline-block') {
                $('#noticeIsDone'+key).css('display', 'none');
                toDoList[key]['isDone'] = false; // ※ViewModelは変更されない。
            } else {
                $('#noticeIsDone'+key).css('display', 'inline-block');
                toDoList[key]['isDone'] = true; // ※ViewModelは変更されない
            }
        })
    });

</script>
</html>