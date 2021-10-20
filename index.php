<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Vue.js入門 ～ToDoアプリ編～</title>
    <link rel="stylesheet" href="sample.css">
</head>
<body>
<h1>Vue.js入門 ～ToDoアプリ編～</h1>
<div id="entryApp">
    <div class="to-do-item">
        <div>題名：{{toDoList[0].title}}</div>
        <div>～{{toDoList[0].tilTime}}</div>
        <div>
            備考：<div>{{toDoList[0].info}}</div>
        </div>
    </div>
    <div class="to-do-item">
        <div>題名：{{toDoList[1].title}}</div>
        <div>～{{toDoList[1].tilTime}}</div>
        <div>
            備考：<div>{{toDoList[1].info}}</div>
        </div>
    </div>
    <div class="to-do-item">
        <div>題名：{{toDoList[2].title}}</div>
        <div>～{{toDoList[2].tilTime}}</div>
        <div>
            備考：<div>{{toDoList[2].info}}</div>
        </div>
    </div>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
<script>
    const entryApp = new Vue({
        el: '#entryApp',
        data: {
            userFirstName: '太郎',
            userLastName: 'OC',
            toDoList: [
                {
                    title: '洗濯',
                    tilTime: '2021-10-25 10:00:00',
                    info: '洗濯の前に必ず天気予報を見ること。部屋干しする場合、先に掃除機かけること。'
                },
                {
                    title: '食材買う',
                    tilTime: '2021-10-25 18:00:00',
                    info: '買い物リスト\n・ジャガイモ\n・ニンジン\n・鶏肉\n・とまと'
                },
                {
                    title: '掃除機かける',
                    tilTime: '2021-10-25 13:00:00',
                    info: '洗濯部屋干しするんだったら、干す前にかけて'
                }
            ]
        }
    })
</script>
</html>