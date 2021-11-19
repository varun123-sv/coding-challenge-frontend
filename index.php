<html>
    <head>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
    <script>
    // checkcookie();
function validateForm() {
  let x = document.forms["myform"]["name"].value;
  if (x == "") {
    // alert("Name must be filled out");
    return good();
    // return bad();
  }
  else{
      return bad();
  }
}
function good(){
    var x = document.getElementById("select-field");
     x.style.color = "red";
     x.style.display = "inline";
     return false;
}

</script>
<style>
    #select-field{
        margin-top:0;
        display:none;
    }
    #map{
        height: 700px;
        width: 100%;
    }
    *,
*:before,
*:after{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body{
    background-color: #080710;
}
.background{
    width: 430px;
    height: 520px;
    position: absolute;
    transform: translate(-50%,-50%);
    left: 50%;
    top: 50%;
}
.background .shape{
    height: 200px;
    width: 200px;
    position: absolute;
    border-radius: 50%;
}
.shape:first-child{
    background: linear-gradient(
        #1845ad,
        #23a2f6
    );
    left: -80px;
    top: -80px;
}
.shape:last-child{
    background: linear-gradient(
        to right,
        #ff512f,
        #f09819
    );
    right: -30px;
    bottom: -80px;
}
form{
    height: 520px;
    width: 400px;
    background-color: rgba(255,255,255,0.13);
    position: absolute;
    transform: translate(-50%,-50%);
    top: 50%;
    left: 76%;
    border-radius: 10px;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 40px rgba(8,7,16,0.6);
    padding: 50px 35px;
}
form *{
    font-family: 'Poppins',sans-serif;
    color: #ffffff;
    letter-spacing: 0.5px;
    outline: none;
    border: none;
}
form h3{
    font-size: 32px;
    font-weight: 500;
    line-height: 42px;
    text-align: center;
}

label{
    display: block;
    margin-top: 30px;
    font-size: 16px;
    font-weight: 500;
}
input{
    display: block;
    height: 50px;
    width: 100%;
    background-color: rgba(255,255,255,0.07);
    border-radius: 3px;
    padding: 0 10px;
    margin-top: 8px;
    font-size: 14px;
    font-weight: 300;
}
select{
  display: block;
    height: 50px;
    width: 100%;
    background-color: rgba(255,255,255,0.07);
    border-radius: 3px;
    padding: 0 10px;
    margin-top: 8px;
    font-size: 14px;
    font-weight: 300;
}
::placeholder{
    color: #e5e5e5;
}
button{
    margin-top: 0px;
    width: 100%;
    background-color: #ffffff;
    color: #080710;
    padding: 15px 0;
    font-size: 18px;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer;
}
option{
  background-color: #080710;
  backdrop-filter: blur(10px);
}
.social{
  margin-top: 30px;
  display: flex;
}
.social div{
  background: red;
  width: 150px;
  border-radius: 3px;
  padding: 5px 10px 10px 5px;
  background-color: rgba(255,255,255,0.27);
  color: #eaf0fb;
  text-align: center;
}
.social div:hover{
  background-color: rgba(255,255,255,0.47);
}
.social .fb{
  margin-left: 25px;
}
.social i{
  margin-right: 4px;
}
    </style>
</head>
<body>
<?php

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
// foreach($data as $val){
//     echo $val['name']."<br>";
//     echo $val['address']['geo']['lat']."<br>";
//     echo $val['address']['geo']['lng']."<br>";
// }

?>
<!-- <form name="myform" action="index1.php" method="post" onsubmit="return validateForm()">
<label for="name">Name</label>
<select id="name" name="name">
<option style="display:none;"></option>
<?php foreach($data as $val){ ?>
    <option ><?php  echo $val['name']; ?></option>
  <?php }?>
  </select>
  <p id="select-field">Please select the field</p>
Title: <input type="text" name="title"><br>
Body: <input type="text" name="body"><br>
<input type="hidden" name="userId" value = "1"><br>
<input type="submit">
</form> -->
<iframe id="google-maps"
  width="810"
  height="710"
  frameborder="0" style="border:0"
  src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDGLIJp3hCBhxUiDqbjiCjSAKfS5_JutVw&q=10.305385,77.923029" allowfullscreen>
</iframe>
<p id="ajax-req"></p>

<div class="background">
        <!-- <div class="shape"></div>
        <div class="shape"></div> -->
    </div>
    <form name="myform" action="index1.php" method="post" onsubmit="return validateForm()">
        <h3>Login Here</h3>

        <label for="name">Name</label>
        <select id="name" name="name">
<option style="display:none;"></option>
<?php foreach($data as $val){ ?>
    <option ><?php  echo $val['name']; ?></option>
  <?php }?>
  </select>
  <p id="select-field">Please select the field</p>

        <label for="title">Title</label>
        <input type="input" placeholder="Password" id="title" name="title">
        <label for="body">Body</label>
        <input type="input" placeholder="Password" id="body" name="body">
        <input type="hidden" name="userId" value = "1"><br>

        <button type="submit">Submit</button>
    </form>

<script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGLIJp3hCBhxUiDqbjiCjSAKfS5_JutVw&callback=initMap">
</script>
<script>
  function checkcookie(){
  <?php
     if(isset($_COOKIE['longitude'])and isset($_COOKIE['latitude'])){ 
     echo "let cookies = document.cookie;";
      } ?>
     if (typeof cookies !== 'undefined') {
       document.write(cookies);
    // the variable is defined
}
}
checkcookie();
function check(){
  console.log("hello");
}
check();
function bad(){
    let x = document.forms["myform"]["name"].value;
    const xhttp = new XMLHttpRequest();

// Define a callback function
xhttp.onload = function() {
  // Here you can use the Data
  document.getElementById("ajax-req").innerHTML =
    this.responseText;
}

// Send a request
xhttp.open("GET", "http://localhost/internship/temp.php?name="+x);
xhttp.send();
return false;
}
    </script>
   
</body>
</html>