<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if POST data is not empty
if (!empty($_POST)) {
    // Post data not empty insert a new record
    // Set-up the variables that are going to be inserted, we must check if the POST variables exist if not we can default them to blank
    $id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : NULL;
    // Check if POST variable "name" exists, if not default the value to blank, basically the same for all variables
    $assasin = isset($_POST['assasin']) ? $_POST['assasin'] : '';
    $fegter = isset($_POST['fegter']) ? $_POST['fegter'] : '';
    $marksman = isset($_POST['marksman']) ? $_POST['marksman'] : '';
    $mage = isset($_POST['mage']) ? $_POST['mage'] : '';
    $tank= isset($_POST['tank']) ? $_POST['tank'] : '';
    $beban = isset($_POST['beban']) ? $_POST['beban'] : '';

    // Insert new record into the contacts table
    $stmt = $pdo->prepare('INSERT INTO poke VALUES (?, ?, ?, ?, ?)');
    $stmt->execute([$id, $assasin, $fegter, $marksman, $mage, $tank, $beban]);
    // Output message
    $msg = 'Created Successfully!';
}
?>


<?=template_header('Create')?>

<div class="content update">
	<h2>Create Poke</h2>
    <form action="create.php" method="post">
        <label for="id">ID</label>
        <label for="assasin">Assasin</label>
        <input type="text" name="id" value="auto" id="id">
        <input type="text" name="assasin" id="assasin">
        <label for="fegter">Fegter</label>
        <label for="marksman">Marksman</label>
        <input type="text" name="marksman" id="marksman">
        <input type="text" name="fegter" id="fegter">
        <label for="mage">Mage</label>
        <input type="text" name="mage" id="mage">
        <label for="mage">Tank</label>
        <input type="text" name="tank" id="tank">
        <label for="mage">Beban</label>
        <input type="text" name="beban" id="beban">
        <input type="submit" value="Create">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>