<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $link = mysqli_connect('localhost', 'root', '', 'art_gallery') or die('Unable to connect the server. ');

    $remove = $_GET['id'];
    $sql = "DELETE FROM image WHERE title='$remove';";
    $sql2 = "DELETE FROM c WHERE title='$remove';";

    $res = mysqli_query($link, $sql);
    $res2 = mysqli_query($link, $sql2);
}
?>


<?php
session_start();
$link = mysqli_connect('localhost', 'root', '', 'art_gallery') or die('Unable to connect the server. ');

$user = $_SESSION['username'];
$sql = "SELECT* from image where username='$user' ";
$sql2 = "SELECT* from sold_out where artistname='$user' ";


$res = mysqli_query($link, $sql);
$res2 = mysqli_query($link, $sql2);
// echo $cat;

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore</title>
    <!-- <link rel="stylesheet" href="explore.css"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>

<style>
    * {
        font-family: "poppins";
    }

    .nav {
        display: flex;
        align-items: center;
        margin-top: 15px;
    }

    .logo {
        width: 50%;
        padding-top: 1px;
        padding-left: 60px;
    }

    .logodiv {
        padding: 1.2% 2%;

    }

    ul {
        list-style-type: none;
        text-decoration: none;
        display: flex;
        padding: 0px;
    }

    li a {
        text-decoration: none;
        margin: 10px;
        font-size: 85%;
        color: #BB46C3;
        padding: 3px 10px;
    }

    li a:hover {
        text-decoration: none;
        margin: 10px;
        padding: 3px 10px;
        font-size: 85%;
        color: #5d1e61;
        background-color: #fbc9ff;
        border-radius: 50px;
    }

    .space {
        display: flex;
        justify-content: center;
        margin: auto;
        max-width: 100%;
    }

    .anim {
        max-width: 30%;
        justify-content: end;
    }

    .animation {
        display: flex;
        justify-content: end;
    }

    .all {
        color: #BB46C3;
    }

    .catagories {
        color: #BB46C3;
        padding-bottom: 50px;
    }

    .bar {
        display: flex;
        flex-direction: row;
        margin: 100px 90px 0px 100px;
    }

    .text1 {
        vertical-align: middle;
        padding-top: 8 px;
        font-size: 50px;
    }

    .filters {
        display: flex;
        justify-content: space-evenly;
        padding-left: 30px;
        padding-right: 0px;
        margin-top: 50px;
    }

    .card {
        box-shadow: 0 0px 8px 0 rgba(0, 0, 0, 0.2);
        transition: 0.3s;
        width: 28vw;
        height: 280px;
        /* height: 20vh; */
        border-radius: 8px;
        margin-left: 20px;
    }

    .card:hover {
        box-shadow: 4px 6px 8px 0 rgba(0, 0, 0, 0.5);
        transition: 0.3s;
        width: 28vw;
        /* height: 20vh; */
        border-radius: 8px;
    }

    .ab {
        float: left;
        /* display: flex; */
        /* justify-content: space-around; */
        height: 400px;


    }

    .cardsss {
        box-shadow: 0 0px 8px 0 rgba(0, 0, 0, 0.2);
        transition: 0.3s;
        width: 28vw;
        height: 25px;
        /* height: 20vh; */
        border-radius: 8px;
        margin: 20px;
    }

    .cardsss:hover {
        box-shadow: 4px 6px 8px 0 rgba(0, 0, 0, 0.5);
        transition: 0.3s;
        width: 28vw;
        /* height: 20vh; */
        border-radius: 8px;
    }

    .bhejo {
        border-radius: 15px;
        height: 30px;
        width: 110px;
        background-color: rgba(128, 0, 128, 0.2);
        margin-bottom: 100px;
        margin-left: 20px;
        font-weight: lighter;
        color: purple;
        border: 0px;
        cursor: pointer;
    }
    .text2{
        color: #BB46C3;
        font-size: 40px;
    }
</style>


<body>
    <div class="all">
        <div class="nav">

            <ul>
                <li><img class="logo" src="logo.png" alt=""></li>
                <li><a href="home_1.php">Home</a></li>
                <!-- <li><a href="">Explore</a></li> -->
                <li><a href="">Account</a></li>
                <!-- <li><a href="">Settings</a></li> -->
                <!-- <li><a href="">Saved</a></li> -->
                <li><a href="">About Us</a></li>
            </ul>
        </div>

        <div class="bar">
            <h1 class="text1">
                MY Artworks (Not yet sold)
            </h1>

            <div class="space"></div>

            <div class="animation">
                <img class="anim" src="https://media4.giphy.com/media/SmVVp30ymr3OznAOVj/giphy.gif?cid=ecf05e47p4ocmh47bswc4kpaagrcqn53nc69884wbyvvf8aa&rid=giphy.gif&ct=s" alt="">
            </div>

        </div>



        <div class=" filters">
            <!-- <a href="#"><img class="card" src="retro.png" alt=""></a> -->
            <!-- <a href="#"><img class="card" src="abstract.png" alt=""></a>
            <a href="#"><img class="card" src="classic.png" alt=""></a>
            <a href="#"><img class="card" src="illustration.png" alt=""></a> -->

            <!-- <div>
                YOU HAVE UPLOADED <?php
                                    // $num=$res->num_rows;
                                    // echo $num;
                                    ?> Arts
            </div> -->

            <?php if ($res->num_rows > 0) { ?>

                <div>
                    <?php while ($row = $res->fetch_assoc()) {
                        $title = $row['title'];
                        $name = $row['username'];
                        $price = $row['price'];

                        $link = "im2.php?uid=$title&id=$name";
                        $link2 = "user_art.php?id=$title";


                    ?>
                        <div class="ab">
                            <a href="<?= $link ?>"> <img class="card" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" /></a>
                            <center>
                                <p class="cardsss2"> <?php echo $title ?> ( <?php echo $price ?>Rs )</p>
                                <form action="<?= $link2 ?>" method="POST">

                                    <input value="Remove" type="submit" class="bhejo"></input>


                                </form>

                            </center>

                        </div>

                    <?php } ?>
                </div>
            <?php } else { ?>
                <p class="status error">Image(s) not found...</p>
            <?php } ?>



        </div>
    </div>

    </div>
    <div class="bar">
        <h1 class="text2">
            MY Artworks (Solded)
        </h1>

        <div class="space"></div>

        <div class="animation">
            <img class="anim" src="https://media4.giphy.com/media/SmVVp30ymr3OznAOVj/giphy.gif?cid=ecf05e47p4ocmh47bswc4kpaagrcqn53nc69884wbyvvf8aa&rid=giphy.gif&ct=s" alt="">
        </div>

    </div>



    <div class=" filters">
        <!-- <a href="#"><img class="card" src="retro.png" alt=""></a> -->
        <!-- <a href="#"><img class="card" src="abstract.png" alt=""></a>
            <a href="#"><img class="card" src="classic.png" alt=""></a>
            <a href="#"><img class="card" src="illustration.png" alt=""></a> -->

        <!-- <div>
                YOU HAVE UPLOADED <?php
                                    // $num=$res->num_rows;
                                    // echo $num;
                                    ?> Arts
            </div> -->

        <?php if ($res2->num_rows > 0) { ?>

            <div>
                <?php while ($row2 = $res2->fetch_assoc()) {
                    $title = $row2['TITLE'];



                ?>
                    <div class="ab">
                        <img class="card" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row2['image']); ?>" />
                        <center>
                            <p class="cardsss"> <?php echo $title ?> </p>

                        </center>

                    </div>

                <?php } ?>
            </div>
        <?php } else { ?>
            <p class="status error">Image(s) not found...</p>
        <?php } ?>



    </div>
    </div>

    </div>
</body>

</html>