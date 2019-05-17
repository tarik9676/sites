<?php
    require_once 'header.php';
    require_once 'db.php';
    session_start();
?>

<div class="container p-5">
    <h2 class="text-center">All Users</h2>

    <div class="row mt-5">
        <div class="col-9">
            <?php
                $sql    = "SELECT * FROM user;";
                $result = $conn->query($sql);

                echo "<table class='table table-borderless'>";
                    while ($row = $result->fetch_assoc()) {
                        $to = $row['UID'];
                        $frnd = "<a class='btn btn-primary' href='message.php?to=$to'>
                                    <i class='fab fa-facebook-messenger' style='font-size:17px'></i> Send Message
                                </a>";
                        $fullname = $row['FIRST'] . " " . $row['LAST'];

                        echo "<tr><td>" . $fullname . "</td><td>" . $row['UID'] . "</td><td>" . $frnd . "</td></tr>";
                    }
                echo "</table>";

                if (!isset($_SESSION['UID'])) {
                    header("Location: index.php");
                }
            ?>
        </div>

        <div class="col-3">
            <?php 
                if (isset($_SESSION['UID'])) {
                    echo "<div class='text-dark'> User ID : " . $_SESSION['UID'] . "</div>";
                } else {
                    echo "Username not found !!";
                }
            ?>
            <a class="btn btn-primary" href="profile.php">Profile</a>
            <a class="btn btn-dark" href="logout.php">Logout</a>
        </div>
    </div>
</div>

<!-- END CODES HERE -->

<?php require_once 'footer.php';?>