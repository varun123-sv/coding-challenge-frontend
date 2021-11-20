<html>

  <head>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css">
  </head>

<body>
  <!-- For name options -->
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

  ?>

  <iframe id="google-maps"
    width="810"
    height="710"
    frameborder="0" style="border:0"
    src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDGLIJp3hCBhxUiDqbjiCjSAKfS5_JutVw&q=10.305385,77.923029" allowfullscreen>
  </iframe>
  <p id="ajax-req"></p>

  <div class="background"></div>

  <form name="myform" action="index1.php" method="post" onsubmit="return validateForm()">

      <h3>Login Here</h3>

          <label for="name">Name</label>
          <select id="name" name="name" onchange="get_loc(value);">
          <option style="display:none;"></option>

          <?php foreach($data as $val){ ?>
              <option value="<?php echo $val['name']; ?>"><?php  echo $val['name']; ?></option>
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

  function get_loc(name){

      const xhttp = new XMLHttpRequest();
      xhttp.onload = function() {
          document.getElementById("ajax-req").innerHTML =this.responseText;
        }

      // Send a request
      xhttp.open("GET", "./loc.php?name="+name);
      xhttp.send();

  }

  function invalid(){
      var x = document.getElementById("select-field");
      x.style.color = "red";
      x.style.display = "inline";
      return false;
  }


  function validateForm() {
    let x = document.forms["myform"]["name"].value;
    if (x == "") 
      return invalid();
     
  }


  </script>
   
</body>
</html>