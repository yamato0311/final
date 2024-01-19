<?php require 'db-connect.php'; ?>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
<?php

$pdo = new PDO($connect, USER, PASS);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $cooking_name = $_POST['cooking_name'];
    $chef = $_POST['chef'];

    
    $sql = "INSERT INTO cooking (cooking_id, cooking_name, chef) VALUES (:cooking_id, :cooking_name, :chef)";

    
    $stmt = $pdo->prepare($sql);

    
    $stmt->bindParam(':cooking_id', $cooking_id, PDO::PARAM_INT);
    $stmt->bindParam(':cooking_name', $cooking_name, PDO::PARAM_STR);
    $stmt->bindParam(':chef', $chef, PDO::PARAM_STR);

    try {
        
        $stmt->execute();

       
        echo '<nav class="level">';
        
        echo '<div class="level-item">';
        echo '<p class="">レシピが正常に登録されました。</p>';
        echo '</div>';
        echo '</nav>';
    } catch (PDOException $e) {
       
        echo '<p class="has-text-danger">エラー: ' . $e->getMessage() . '</p>';
        
    }
}
?>
<nav class="level">

    <div class="level-item">
        <p><button class="button has-background-success-dark has-text-white"
                onclick="location.href='ichiran.php'">レシピ一覧へ</button></p>
    </div>
</nav>
</div>
</diV>