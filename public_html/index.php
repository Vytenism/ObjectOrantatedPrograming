<?php
require '../bootloader.php';

$nav = [
    'left' => [
        ['url' => '/', 'title' => 'Home']
    ]
];




$db = new Core\FileDB(DB_FILE);
$db->load();
//$db->getData();
$db->createTable('drinks');
//$db->insertRow('drinks', $drink->getData());
//$test = $db->getRowsWhere('drinks', ['abarot' => 40]);
//var_dump($drinks);
//var_dump($db);
$drink = new App\Drinks\Drink([
    'id' => 0,
    'name' => 'viskis',
    'amount_ml' => 700,
    'abarot' => 41,
    'image' => '.jpg']);
$modelDrinks = new App\Drinks\Model();
//$modelDrinks->insert('viskis');
$drinks = $modelDrinks->get();
//
//$drinks = $modelDrinks->get(['abarot' => 40]);
//var_dump($test);

foreach ($drinks as $drink) {
    var_dump($drink);
//    $drink->setImage('https://dydza6t6xitx6.cloudfront.net/ci-angry-orchard-crisp-apple-cider-b7dc378f12558f5e.jpeg');
//    $modelDrinks->update($drink);
}

$dbarray = $db->getData();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>OOP</title>
        <link rel="stylesheet" href="media/css/normalize.css">
        <link rel="stylesheet" href="media/css/style.css">
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="icon" href="favicon.ico" type="image/x-icon">        
        <script defer src="media/js/app.js"></script>
    </head>
    <body>
        <?php require ROOT . '/app/templates/navigation.tpl.php'; ?>

        <div class="content">
            <?php require ROOT . '/core/templates/form/form.tpl.php'; ?>
        </div>
        <div class="middle">
        <div>
        <?php foreach ($dbarray['drinks'] as $drinks => $drink): ?>
            <h1>
                <?php print $drink['name']; ?>
            </h1>
            <img class="gerimas" src="<?php print $drink['image']; ?>" alt="logo">
            <h2>
                 <?php print $drink['amount_ml'] . 'ml'; ?>
            </h2>
              <h2>
                 <?php print $drink['abarot'] . '%'; ?>
            </h2>
        <?php endforeach; ?>
        </div>
            </div>
    </body>
</html>
