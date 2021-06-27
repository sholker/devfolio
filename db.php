<?php

function db_connection(){
    //create a mySQL DB connection:
    $dbhost = "182.50.133.173";
    $dbuser = "studDB21a";
    $dbpass = "stud21DB1!";
    $dbname = "studDB21a";
    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// testing connection success
    if (mysqli_connect_errno()) {
        die("DB connection failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")");
    }
    return $connection;
}
function get_projects()
{
////create a mySQL DB connection:
//    $dbhost = "182.50.133.173";
//    $dbuser = "studDB21a";
//    $dbpass = "stud21DB1!";
//    $dbname = "studDB21a";
//    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
//
//// testing connection success
//    if (mysqli_connect_errno()) {
//        die("DB connection failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")");
//    }


//$query = "insert into tbl_prods(name,img_url,cat_id) values ('$prodName','$prodImg','$catId')";

    $connection = db_connection();
    $query = "SELECT * FROM `tbl_user_90_project`";
//    echo $query;
    $result = $mysqli -> query;
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("DB query failed.");
    }

    $row = mysqli_fetch_assoc($result); // there is only 1 item with id=X

    $result = $connection->query($query);
    $i=1;
    if ($result->num_rows > 0) {
// output data of each row


        while ($row = $result->fetch_assoc()) {
            $format = 'popup%d';
            $id= sprintf($format, $i);
            echo  '<a href="#' . $id . '" class="project col-md-4 my-col">' . $row['Name'] . '<img src="img/' . $row["image"] . '"alt="" class="img-fluid"></a>' . '<div id="' . $id . '" class="popup">' . '<a href="#work" class="close">&times;</a>' . '<h2>' . $row["Name"] . '</h2>' . '<p> About: <br>' . $row['Description'] . ' <br><a href="' . $row['url'] . '" target="_blank" rel="noopener noreferrer">click here to project</a></p></div><a href="#work" class="close-popup"></a>';

                $i+=1;

//            echo "<p>  - Name: " . $row["Name"] . " " . $row["Desciption"] . "</p><br>";
        }
    }
//    mysqli_close();
}

function get_experience()
{
    //create a mySQL DB connection:
    $dbhost = "182.50.133.173";
    $dbuser = "studDB21a";
    $dbpass = "stud21DB1!";
    $dbname = "studDB21a";
    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// testing connection success
    if (mysqli_connect_errno()) {
        die("DB connection failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")");
    }

//$query = "insert into tbl_prods(name,img_url,cat_id) values ('$prodName','$prodImg','$catId')";

    $connection = db_connection();
    $query = "SELECT * FROM  tbl_user_90_experience";
//    echo $query;
    $result = $mysqli -> query;
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("DB query failed.");
    }

    $row = mysqli_fetch_assoc($result); // there is only 1 item with id=X

    $result = $connection->query($query);
    $i=1;
    if ($result->num_rows > 0) {
// output data of each row


        while ($row = $result->fetch_assoc()) {
            $format = 'popup%d';
            $id= sprintf($format, $i);

            echo '<div class="col-md-4"><div class="service-box"><div class="service-ico"></div><div class="service-content"><h2 class="s-title">' . $row["company"] . '</h2><i class="text-center">' . $row['years'] . '</i><br>
                        <p class="s-description left_text">' . $row["description"] . '</p></div></div> </div>';
        }
    }
    mysqli_close();
}

?>