<?php 

if (isset($_GET['pass']) ) {
    if (password_verify($_GET['pass'], '$2y$10$VtSVwtFt/OrEypQA.daQt.v0u2jv1aGEM0dQDTSrcKy.vIE3chlBm')) {
        $_SESSION['cnx'] = true;
    } else {unset($_SESSION['cnx']);}
}


if (!isset($_SESSION['cnx'])) {
    header("Location: index.php");
    exit();
} else {
    
    if (isset($_POST['show-name'])) {
        echo 'new show'.$_POST['show-name'];
        

    } else if (isset($_POST['school-name'])) {
        $req = $bdd->prepare("INSERT INTO schools(school_name) VALUES (?)");
        $req->execute(array($_POST['school-name']));
    }

}