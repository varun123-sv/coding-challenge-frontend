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

  <iframe id="g-maps"
    width="810"
    height="710"
    frameborder="0" style="border:0"
    src="https://maps.google.com/maps?q=20.5937,78.9629&output=embed" allowfullscreen>

  </iframe>
  <p id="ajax-req" style="color:white;"></p>

  <div class="background"></div>

  <form name="myform" action="lib/posts.php" method="post" onsubmit="return validateForm()">
      <h3>Form</h3>
          <label for="name">Name</label>
          <select id="name" name="name" onchange="get_loc(value);">
          <option style="display:none;"></option>

          <?php foreach($data as $val){ ?>
              <option value="<?php echo $val['name']; ?>"><?php  echo $val['name']; ?></option>
            <?php }?>

          </select>

       <p id="select-field" style="padding:10px;">Please select the name field</p>
      <label for="title">Title</label>
      <input type="input" placeholder="Title" id="title" name="title">
      <label for="body">Body</label>
      <input type="input" placeholder="Body" id="body" name="body">
      <input type="hidden" name="userId" value = "1"><br>
      <button type="submit">Submit</button>

  </form>


  <script>

  function get_loc(name){

      const xhttp = new XMLHttpRequest();
      xhttp.onload = function() {

         const res = JSON.parse(this.responseText);
         lat = res.lat;
         long = res.long;
         console.log("latitude : "+lat+"\nlongitude : "+long);

         document.getElementById("g-maps").src ="https://maps.google.com/maps?q="+lat+","+long+"&output=embed";
        }

      // Send a request
      xhttp.open("GET", "lib/loc.php?name="+name);
      xhttp.send();

  }

  function invalid(){
      var x = document.getElementById("select-field");
      var y = document.getElementById("name");
      x.style.color = "red";
      x.style.display = "block";
      y.placeholder ="Please select the field"
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