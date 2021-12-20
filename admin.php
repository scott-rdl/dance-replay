<?php
include "include/header.php";

// password needed (admin.php?pass=xxx)
include "include/assets-admin.php";
?>

<section>
    <h1>EDIT</h1><br />

    <h2>ADD SCHOOL</h2>
    <form class="admin" method="post" action="">
        <input type="text" name="school-name" placeholder="SCHOOL NAME" required />
        <input type="hidden" name="token" value="<?php echo newToken(); ?>" />
        <input type="submit" value="ADD">
    </form>


    <br />
    <h2>ADD SHOW</h2>
    <form class="admin" method="post" action="" enctype="multipart/form-data">

        <select name="show-school" required>
            <option value="">-- SCHOOL --</option>

            <?php
            $req = $bdd->query("SELECT * FROM schools");

            while ($data = $req->fetch()) {
                echo '<option value="' . $data['school_id'] . '">' . $data['school_name'] . '</option>';
            }
            ?>
        </select><br />

        <input type="text" name="show-title" placeholder="TITLE" required /><br />
        <input type="date" name="show-date" max="<?php echo date('Y-m-d'); ?>" required /><br />
        <input type="number" name="show-length" placeholder="120" size="5" required /> min /
        <input type="number" name="show-size" placeholder="15" size="5" step="0.1" required /> Go<br />
        <input type="url" name="show-url" placeholder="https://drive.google.com/uc?export=download&id=..." required><br />
        <input type="file" name="cover" /><br />
        <input type="hidden" name="token" value="<?php echo newToken(); ?>" />
        <input type="submit" value="ADD">

    </form>
</section>

<?php include "include/footer.php"; ?>