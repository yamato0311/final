<?php require 'db-connect.php'; ?>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
<?php

$pdo = new PDO($connect,USER, PASS);
?>
<h3 class="title is-3 has-text-centered">レシピ登録</h3>
<div class="content">
    <div class="container">
        <nav class="level">

            <div class="level-item">
                <form action="touroku-output.php" method="post">
                    　レシピ名:<input type="text" name="cooking_name" required><br>
                    作成者名:<input type="text" name="chef" required><br>
                    <nav class="level">

                        <div class="level-item">
                            <input class="button has-background-success-dark has-text-white" type="submit" value="登録">
                </form>
            </div>
    </diV>
</div>
</nav>