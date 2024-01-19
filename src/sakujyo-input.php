<?php require 'db-connect.php'; ?>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
<?php 
// データベース接続
$pdo = new PDO($connect,USER, PASS);
// Columnsテーブルからデータ取得
$sql = "SELECT * FROM cooking WHERE cooking_id = ?";
$result = $pdo->prepare($sql);
$result->execute([$_GET['cooking_id']]);
$row = $result->fetch();
?>

<h3 class="title is-3 has-text-centered">レシピ削除</h3>
<div class="content">
    <div class="container">
        <nav class="level">

            <div class="level-item">
                <form action="sakujyo-output.php" method="post">
                    <p><input type="hidden" name="cooking_id" value="<?= $row['cooking_id'] ?>"></p>
                    <p>
                    <div class="has-text-centered"><?= $row['cooking_name'] ?></div>
                    </p>
                    <p>
                    <div class="has-text-centered"><?= $row['chef'] ?></div>
                    </p>
                    <p class="has-text-centered">削除しますか？</p>
                    <nav class="level">

                        <div class="level-item">
                            <input class="button has-background-success-dark has-text-white" type="submit" value="削除">
                            <a href="ichiran.php"><button class="button has-background-success-dark has-text-white"
                                    type="button">戻る</button></a>
                        </div>
                    </nav>
                </form>
            </div>
    </diV>
    </body>

    </html>