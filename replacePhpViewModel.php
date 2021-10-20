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
    <div class="user-name">ようこそ {{userFullName}} さん</div>
    <div class="to-do-item" v-for="(toDoItem, key) of toDoList" :key="key" @dblclick="switchIsDone(key);">
        <div>
            題名：{{toDoItem.title}}
            <span class="notice-is-done" v-if="toDoItem.isDone">完了</span>
        </div>
        <div>{{displayTilTime(key)}}</div>
        <div>
            備考：<div>{{toDoItem.info}}</div>
        </div>
    </div>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
<script>
    const entryApp = new Vue({
        el: '#entryApp',
        data: {
            userFirstName: '<?php echo($user_first_name) ?>',
            userLastName: '<?php echo($user_last_name) ?>',
            toDoList: <?php echo(json_encode($toDoList)); ?>
        },
        methods: {
            switchIsDone: function (key) {
                this.toDoList[key].isDone = ! this.toDoList[key].isDone;
            }
        },
        computed: {
            userFullName: {
                get: function () {
                    return this.userLastName + ' ' + this.userFirstName;
                }
            },
            displayTilTime: {
                get: function () {
                    return function (key) {
                        let time = new Date(this.toDoList[key].tilTime);
                        return '～' + time.getFullYear() + '年' + (time.getMonth() + 1).toString() + '月' + time.getDate() + '日' + time.getHours() + '時' + time.getMinutes() + '分';
                    }
                }
            },
        }
    })
</script>
</html>