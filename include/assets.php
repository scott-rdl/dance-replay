<?php

// If a link is submited
if (isset($_GET['del'])) {
    if (is_numeric($_GET['del'])) {
        $del = $_GET['del'];
        $req = $bdd->query("DELETE FROM shortcuts WHERE id = $del");
    }
}


?>