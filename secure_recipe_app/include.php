<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="simple.css">
    <title>Document</title>
</head>
<body>
<?php
    function e($value) {
        return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
    }

    $pages = [
        'salmon' => 'Salmão Grelhado com Ervas',
        'risotto' => 'Risotto de Cogumelos',
        'tacos' => 'Tacos de Carne com Guacamole',
        'pasta' => 'Macarrão ao Molho de Tomate'
    ];
?>

<form method="GET" action="include.php">
    <select name="page">
        <option value="">Please select a recipe</option>
        
        <?php foreach ($pages AS $key => $value) : ?>
            <option value="<?php echo e($key); ?>" <?php if (!empty($_GET['page']) && $_GET['page'] === $key) echo 'selected';?>><?php echo e($value);?></option>
        <?php endforeach; ?>
    </select>
    <input type="submit" value="Submit!">
</form>

<?php
    // best practice for segurity
    
    if (!empty($_GET['page'])) {
        $page = $_GET['page'];
        if (!empty($pages[$page])) echo file_get_contents("pages/{$_GET['page']}.html");
    }
    
?>




</body>
</html>



