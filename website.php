<html>
<body>

<?php
    $name = isset($_POST["name"])?$_POST["name"]:false;
    $position = isset($_POST["position"])?$_POST["position"]:false;
    

    $connection = pg_connect(
        "host=ep-rapid-shape-a11pmwlv.ap-southeast-1.aws.neon.tech
        dbname=test
        user=test_owner
        password=6MPYa0XfNdpS
        sslmode=require
        options='endpoint=ep-rapid-shape-a11pmwlv'"
    );
    
    $entry = pg_fetch_assoc(pg_query($connection, "SELECT * FROM admin WHERE name = '$name'"));
    if($name and $position){
        if(!($entry["name"] == "")){
            echo "has data";
        }else{
            echo "no data";
        };
    }

    if($connection){
        echo "success";
        
    }

    $result = pg_query($connection, "SELECT * FROM admin");
    if(!$result){
        echo "error";
    }

             
?>
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Position</th>
    </tr>
    


    <?php
        while($row = pg_fetch_assoc($result)){
            echo"
            <tr>
                <td>$row[id]</td>
                <td>$row[name]</td>
                <td>$row[position]</td>
            </tr>
            ";
            
        };
    ?>
</table>

</body>
</html>