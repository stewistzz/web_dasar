<?php 
    session_start();
?>


<!DOCTYPE html>
<html lang="en">
<body>
    <?php 
        session_unset();
        session_destroy();

        echo"All sessuon variabel are now removed, and the session is destroyed";
    ?>
</body>
</html>