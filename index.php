<?php include "include/header.php"; ?>

<section class="preview">
    <div id="poster">
        <img src="img/1.png" width="100%"/>
    </div>

    <div id="info">
        <h1>TITRE DU SPECTACLE</h1>
        <h2>Etablissement</h2>
        <hr/>
        <p>
            <b>Date :</b> Mai 2021<br>
            <b>Durée :</b> 120 min<br>
            <b>Taille du fichier :</b> 5 Go
        </p>
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
if (isset($_GET['s'])) {
    echo 'var : '.$_GET['s'];
}

include "include/footer.php"; ?>