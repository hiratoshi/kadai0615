<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>log in</title>
    <link href="css/login.css" rel="stylesheet">

</head>

<body>

    <!-- Head[Start] -->
    <header id="header">
        <img src="picture/gs_logo.png" alt="gs" width="200px" height="80px" id="logo">
        <div id="link">


        </div>

    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <form method="post" action="user_loginact.php">


        <h1 id="title">G's Academy DEV course 7th <br>members</h1>
        <div class="touroku">
            <span class="list" id="list1" style="background-color: aliceblue">学籍番号</span><br>
            <input type="text" name="id" class="form" id="f1"><br>
            <span class="list" style="background-color:aliceblue" id="lpw">ログインPASSWORD</span><br><input type="text" name="lpw" class="form" id="f4"><br>
            <input type="submit" value="ログイン" class="button">

        </div>
    </form>
    <!-- Main[End] -->


</body>

</html>
