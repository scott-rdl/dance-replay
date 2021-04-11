<?php

if (isset($_GET['pass'])) {
    if (password_verify($_GET['pass'], '$2y$10$VtSVwtFt/OrEypQA.daQt.v0u2jv1aGEM0dQDTSrcKy.vIE3chlBm')) {
        $_SESSION['cnx'] = true;
    } else {
        unset($_SESSION['cnx']);
    }
}


if (!isset($_SESSION['cnx'])) {
    header("Location: index.php");
    exit();
} else {

    if (isset($_POST['show-title'])) {
        
        $coverName = coverRename($_FILES['cover']['name']);

        $req = $bdd->prepare("INSERT INTO shows(show_title, show_school, show_length, show_date, show_size, show_url, show_cover ) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $req->execute(array(
            $_POST['show-title'],
            $_POST['show-school'],
            $_POST['show-length'],
            $_POST['show-date'],
            $_POST['show-size'],
            $_POST['show-url'],
            $coverName
        ));

        move_uploaded_file($_FILES['cover']['tmp_name'], "img/" . $coverName);

    } else if (isset($_POST['school-name'])) {
        $req = $bdd->prepare("INSERT INTO schools(school_name) VALUES (?)");
        $req->execute(array($_POST['school-name']));
    }
}


// Create a new unique name for the image storage
function coverRename($img)
{
    $ext = (new SplFileInfo($img))->getExtension();
    return time() . '.' . $ext;
}
