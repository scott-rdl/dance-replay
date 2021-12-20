<?php 

include "include/header.php";


// Check if a key is transmitted.
if (isset($_GET['key'])) { 
    $pass = keyClean($_GET['key']);
} else if (!empty($_POST) && isset($_POST['key'])) {
    $pass = keyClean($_POST['key']);
} else {
    $pass = null;
} 

echo 'pass : '.$pass.'<br>';


// Check if a key exist in the db keys
if ($pass != null) {    
    $reqPass = $bdd->prepare("SELECT * FROM pass WHERE pass_key = ?");
    $reqPass->execute([$pass]);
    $dataPass = $reqPass->fetch();
    $passOk = $reqPass->rowCount() == 1;

    echo 'keyOk : '.$passOk.'<br>';
    var_dump($dataPass);
    echo $dataPass['pass_show_id'];
    echo $dataPass['pass_key'];
    
} else { 
    $passOk = 0;
}


// Display the key field, or the show card
if (!$passOk) { 
?>

<section class="keyField">
    <form action="" method="POST">
        <label for="key">J'ai une clé :</label><br>
        <input type="text" name="key" id="key" placeholder="XXXX-XXXX-XXXX-XXXX" required>
        <input type="submit" value=" C'est parti ! "> 
    </form>
</section>


<?php 
} else {

    $reqShow = $bdd->prepare("SELECT * FROM shows, companies WHERE show_compagny = compagny_id AND show_id = ?");
    $reqShow->execute([$dataPass['pass_show_id']]);
    $dataShow = $reqShow->fetch();

    $reqFile = $bdd->prepare("SELECT * FROM files WHERE file_show_id = ?");
    $reqFile->execute([$dataShow['show_id']]);
    $fileOk = $reqFile->rowCount() > 0 ? 1 : 0;
    $dataFile = $reqFile->fetchAll(PDO::FETCH_ASSOC);
    var_dump($dataFile);

?>

<section id="card">
    <div id="poster">
        <img src="img/<?= $dataShow['show_cover']; ?>" width="100%"/>
    </div>

    <div id="info">
        <h1><?= strtoupper($dataShow['show_title']); ?></h1>
        <h2><?= $dataShow['compagny_name']; ?></h2>
        <hr/>
        <p>
            <b>Date :</b> 
            <?= dateToMonthYear($dataShow['show_date']); ?><br>

            <b>Durée :</b> 
            <?= minToHourMin($dataShow['show_length']);?><br>
        </p>
    </div>

    <div id="files">
        <table>
            <thead>
                <tr>
                    <th>Format</th>
                    <th>Nom</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php

                echo '<tr>';
                foreach ($dataFile as $d) {
                    echo '<td>'.fileFormat($d['file_type']).' </td>';
                    echo '<td>'.$d['file_name'].'</td>';
                    echo '<td><button>Télécharger</button></td>';
                }
                echo '</tr>';
            
                ?>


            </tbody>
        </table>



    </div>

    <div id="start">
        <div id="warn">
            Attention, ce lien est limité à un seul téléchargement. Une fois lancé, 
            il n"est plus possible de changer d"appareil ni de connexion internet, 
            En cas d"echec assurez-vous de relancancer le téléchargement avant 24h.
        </div>
        <form method="get" action="">
            <table>
                <tr>
                    <td><input type="checkbox" id="ok" 
                            name="ok" onclick="EnableSubmit(this)"
                            required /> &nbsp;&nbsp;
                    </td>
                    <td><label for="ok">
                            J"ai suffisament d"espace de stockage et une connexion stable. 
                            <a href="https://www.speedtest.net/fr" target="_blank">Tester mon débit.</a>
                        </label>
                    </td>
                </tr>
            </table>
            
            <input type="hidden" name="pass" value="CODE"/>
            <input type="submit" id="send" 
                value="LANCER LE TELECHARGEMENT" 
                onmouseover="MouseOver()" disabled="disabled" />
        </form>
    </div>
</section>

<?php 
}
?>
<?php include "include/footer.php"; ?>