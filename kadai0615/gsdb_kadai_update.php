<?php
//1. POSTデータ取得
$school_num = $_POST["school_num"];
$picture = $_POST["picture"];
$name= $_POST["name"];
$select_course = $_POST["select_course"];
$age = $_POST["age"];
$about_work = $_POST["about_work"];
$info = $_POST["info"];


$checkbox = $_REQUEST["presen"];
$presen = sizeof($checkbox);

//2. DB接続します
try {
  $pdo = new PDO('mysql:dbname=gs_db37;charset=utf8;host=localhost','root','');
//注意：ホストは、サクラに繋いだらそれになる。ルート、そのあとのスペースは指定
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}
//トライはエラーをキャッチする関数。catchは接続できた場合の対応。PDOはmysqlへの接続。


//３．データ登録SQL作成
$stmt = $pdo->prepare("UPDATE gs_gsdb_table SET school_num=:school_num, picture=:picture, name=:name, select_course=:select_course, age=:age, about_work=:about_work, info=:info, presen=:presen, datetime=sysdate() WHERE school_num=:school_num");
//この下はバインドバリューはハッキング対策。POSTで受けたものに怪しいものがないかチェック。
$stmt->bindValue(':school_num', $school_num, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT
$stmt->bindValue(':picture', $picture, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':select_course', $select_course, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':age', $age, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':about_work', $about_work, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':info', $info, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':presen', $presen, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  //５．index.phpへリダイレクト
  header("Location: gsdb_kadai_index.php");
  exit;

}
?>
