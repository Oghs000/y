<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if the contact id exists, for example update.php?id=1 will get the contact with the id of 1
if (isset($_GET['id'])) {
    if (!empty($_POST)) {
        // This part is similar to the create.php, but instead we update a record and not insert
        $id = isset($_POST['id']) ? $_POST['id'] : NULL;
        $nama = isset($_POST['asssain']) ? $_POST['assasin'] : '';
        $email = isset($_POST['fegter']) ? $_POST['fegter'] : '';
        $notelp = isset($_POST['marksman']) ? $_POST['marksman'] : '';
        $pekerjaan = isset($_POST['mage']) ? $_POST['mage'] : '';
        $nama = isset($_POST['tank']) ? $_POST['tank'] : '';
        $nama = isset($_POST['beban']) ? $_POST['beban'] : '';
        
        // Update the record
        $stmt = $pdo->prepare('UPDATE poke SET id = ?, assasin = ?, fegter = ?, marksman = ?, mage = ?, tank = ?, beban = ? WHERE id = ?');
        $stmt->execute([$id, $assasin, $fegter, $marksman, $mage, $tank, $beban, $_GET['id']]);
        $msg = 'Updated Successfully!';
    }
    // Get the contact from the contacts table
    $stmt = $pdo->prepare('SELECT * FROM poke WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contact) {
        exit('Contact doesn\'t exist with that ID!');
    }
} else {
    exit('No ID specified!');
}
?>



<?=template_header('Read')?>

<div class="content update">
	<h2>Update Contact #<?=$contact['id']?></h2>
    <form action="update.php?id=<?=$contact['id']?>" method="post">
        <label for="id">ID</label>
        <label for="nama">Assasin</label>
        <input type="text" name="id" value="<?=$contact['id']?>" id="id">
        <input type="text" name="assasin" value="<?=$contact['assasin']?>" id="nama">
        <label for="email">Fegter</label>
        <label for="notelp">Marksman</label>
        <input type="text" name="fegter" value="<?=$contact['fegter']?>" id="email">
        <input type="text" name="marksman" value="<?=$contact['marksman']?>" id="notelp">
        <label for="pekerjaan">Mage</label>
        <input type="text" name="mage" value="<?=$contact['mage']?>" id="title">
        <label for="pekerjaan">Tank</label>
        <input type="text" name="tank" value="<?=$contact['tank']?>" id="title">
        <label for="pekerjaan">Beban</label>
        <input type="text" name="beban" value="<?=$contact['beban']?>" id="title">





        <input type="submit" value="Update">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>