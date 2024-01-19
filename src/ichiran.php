<?php require 'db-connect.php'; ?>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">

<?php

try {
    $pdo = new PDO($connect, USER, PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
    $sql = "SELECT * FROM cooking";

    
    $result = $pdo->query($sql);

    echo '<div class="section">';
    echo '<div class="container">';
    echo '<h3 class="title is-3 has-text-centered">レシピ一覧</h3>';

    if ($result->rowCount() > 0) {
       
        echo '<table class="table is-fullwidth is-bordered is-striped">
                <thead>
                    <tr class="has-background-success-dark">
                        <th class="has-text-light">料理ID</th>
                        <th class="has-text-light">料理名</th>
                        <th class="has-text-light">作成者名</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>';

        // データ表示
        $data = $result->fetchAll(PDO::FETCH_ASSOC);
        foreach ($data as $row) {
            echo "<tr>
                    <td>" . $row["cooking_id"] . "</td>
                    <td>" . $row["cooking_name"] . "</td>
                    <td>" . $row["chef"] . "</td>
                    <td><a class='button is-link' href='koushin-input.php?cooking_id=" . $row["cooking_id"] . "'>更新</a></td>
                    <td><a class='button is-danger' href='sakujyo-input.php?cooking_id=" . $row["cooking_id"] . "'>削除</a></td>
                  </tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "<p class='has-text-centered'>データがありません</p>";
    }
} catch (PDOException $e) {
    echo "<p class='has-text-danger'>Error: " . $e->getMessage() . "</p>";
} finally {
   
    $pdo = null;
}
?>
<nav class="level">

    <div class="level-item">
        <form action="touroku-input.php" method="post">
            <button class="button is-success" type="submit">新規登録</button>
        </form>
    </div>
</nav>