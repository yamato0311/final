<?php require 'db-connect.php'; ?>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cooking_id'])) {
    try {
        
        $pdo = new PDO($connect, USER, PASS);

        
        $cooking_id = $_POST['cooking_id'];
        $cooking_name = $_POST['cooking_name'];
        $chef = $_POST['chef'];

        
        $sql = "UPDATE cooking SET cooking_name = :cooking_name, chef = :chef WHERE cooking_id = :cooking_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':cooking_id', $cooking_id, PDO::PARAM_INT);
        $stmt->bindParam(':cooking_name', $cooking_name, PDO::PARAM_STR);
        $stmt->bindParam(':chef', $chef, PDO::PARAM_STR);
        $stmt->execute();

        
        echo '<nav class="level">';
        
        echo '<div class="level-item">';
        echo "レシピが更新されました。";
        echo '</div>';
        echo '</nav>';
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    } finally {
        
        $pdo = null;
    }
} else {
    echo "不正なアクセスです";
}
?>
<nav class="level">

    <div class="level-item">
        <p><button class="button has-background-success-dark has-text-white"
                onclick="location.href='ichiran.php'">レシピ一覧へ</button></p>
    </div>
    </div>
    </div>
</nav>