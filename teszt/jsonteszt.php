<?php




for ($i=0; $i < 5; $i++) { 
    $json=file_get_contents('https://randomuser.me/api');
    $arr = json_decode($json,true);
    echo"<img src='".$arr["results"][0]["picture"]['large']."'<br>";
    echo "<br>Name: ".$arr["results"][0]["name"]['first']." ".$arr["results"][0]["name"]['last'];
echo "<br>Location: ".$arr["results"][0]["location"]['city']."";
echo "<br>Age: ".$arr["results"][0]['dob']['age']."<br>";
}


?>