<?php
    if(isset($_GET['name'])){
        echo $_GET['name'];
        $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://jsonplaceholder.typicode.com/users',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    $data = json_decode($response, JSON_PRETTY_PRINT);
    // print_r($data);
    foreach($data as $val){
        // echo $val['name']."<br>";
        // echo $val['address']['geo']['lat']."<br>";
        // echo $val['address']['geo']['lng']."<br>";
        if($_GET['name'] == $val['name']){

            echo $val['address']['geo']['lat']."<br>";
            echo $val['address']['geo']['lng']."<br>";

        }
    }
    }
?>