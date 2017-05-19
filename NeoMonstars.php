<?php include "partials/header.php"; ?>
<div class="openNav" id="openNav">&#9776</div>

<div class="monster-main">
    <h2>Neo Monstars</h2>

    <?php
    include "db.php";
    if (!db_connect()) {
        echo"<p>Connection Failed</p>";
    } else {

        $query = "SELECT * FROM monstars_tb";
        $queryResult = mysqli_query(db_connect(), $query);

        $numberOfRows = mysqli_num_rows($queryResult);

        if ($numberOfRows > 0) {
            while ($row = mysqli_fetch_assoc($queryResult)) {
                $id = $row["id"];
                $name = $row["name"];
                $skill = $row["skill"];
                $habitat = $row["habitat"];
                $description = $row["description"];
                $thumbnail = $row["thumbnail"];
                $bigImg = $row["bigImg"];

                echo "<div class='monsters' data-id='".$id."'>";               
                echo"<div class='each-monstar'>";
                echo "<div class='monstar-img'><img id='imageMonster".$id."' data-big='".$bigImg."' src='" . $thumbnail . "'></div>";
                echo "<h2 id='nameMonster".$id."'>$name</h2>";
                echo "<input id='skillMonster".$id."' type='hidden' value='".$skill."'>";
                echo "<input id='habitMonster".$id."' type='hidden' value='".$habitat."'>";
                echo "<input id='descMonster".$id."' type='hidden' value='".$description."'>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "<p>There's no contents</p>";
        }
    }
    ?>
</div>

<div class="modalbox-style" id="modalBoxMonsterInfo">
    <div class="modalbox-info-style">
        <img id='imageMonsterInfo' src=''>
        <div class="monster-para">
            <h2 id='nameMonsterInfo'></h2>
            <h4 id='skillMonsterInfo'></h4>
            <h4 id='habitMonsterInfo'></h4>
            <p id='descMonsterInfo'></p>
        </div>
        <div id="closeModal">&times;</div>
    </div>
</div>


<?php include "partials/footer.php"; ?>