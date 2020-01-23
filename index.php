<?php 
    require_once '_app/init.php';

    $itemsQuery = $db->prepare("
    SELECT id, name, done
    FROM items
    WHERE user = :user
    ");

    $itemsQuery->execute([
        'user' => $_SESSION['user_id']
    ]);

    $items = $itemsQuery->rowCount() ? $itemsQuery :[];

    
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>To do</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Shadows+Into+Light+Two" rel="stylesheet">
    <link rel="stylesheet" href="_css/main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<div class="list">
    <h1 class="header">To do.</h1>

    <?php if(!empty($items)): ?>
    <ul class="items">
        <?php foreach($items as $item): ?>
        <li>
            <span class="item<?php echo $item['done'] ? ' done' : '' ?>"><?php echo $item['name']; ?></span>
            <?php if(!$item['done']): ?>
            <a href="mark.php?as=done&item=<?php echo $item['id']; ?>" class="done-button" >Marque como concluído</a>
            <?php endif;?>
        </li>
        <?php endforeach; ?>
    </ul>
    <?php else: ?>
    <p> Você não adicionou items ainda.</p>
    <?php endif; ?>
    <form class="item-add" action="add.php" method="POST">
        <input type="text" name="name" placeholder="Insira um novo item aqui." class="input" autocomplete="off" required>
        <input type="submit" class="submit" value="Add" name="addTask">
    </form>
</div>

<body>

</body>

</html>