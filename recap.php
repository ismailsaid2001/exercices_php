
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <title>recap</title>
</head>

<body>
  <section class="bg-dark text-light  pb-0   text-center text-sm-start">
    <div class="container">
      <div class="d-flex align-items-start mt-5 justify-content-between">
        <div class="my-5">
          <?php 
          if(isset($_POST['submit'])) {
           if (!empty($_POST['name'])&&(!empty($_POST["last_name"]))&&(!empty($_POST['sexe']))){ 
            $welcome = ($_POST["sexe"] == "homme") ? 'Mr' : 'Mme';         
          echo '<h1 class="text-success">' . "commande de " . "$welcome  " . $_POST['name'] . " " . $_POST['last_name'] . '</h1>' ;}
          if(!empty($_POST["nb_sandwitchs"])){
            $prix = ($_POST["nb_sandwitchs"] <= 10) ? 4 * $_POST["nb_sandwitchs"] : 0.9 * $_POST["nb_sandwitchs"]*4 ;
          echo '<h2 class="text-primary">' .$_POST['nb_sandwitchs'].'  sandwitches ' . $_POST['sandwitchs'] . '</h2>' ;
          }
            if(!empty($_POST['add'])){
            $arrayAdd=$_POST['add']; 
            $n= count($arrayAdd);
            echo "<h2>nb de supplements est  ".$n."</h2>";
            foreach($arrayAdd as $value){
              echo "<h2> les  supplements sont </h2>".$value."<br>";
            }
          }
          $fileName =$_FILES['file']['name'];
          $fileTmpName =$_FILES['file']['tmp_name'];
          $fileSize =$_FILES['file']['size'];
          $fileError =$_FILES['file']['error'];
          $fileType =$_FILES['file']['type'];
          $fileExt =explode(".",$fileName);
          $fileActualExt =strtolower(end($fileExt));
          $allowed=array('jpg','jpeg','png','pdf');
          if(in_array($fileActualExt,$allowed)){
            if($fileError===0){
              if($fileSize<500000) {
               $fileNameNew=uniqid('',true).".".$fileActualExt;
               $fileDestination="uploads/".$fileNameNew;
               move_uploaded_file($fileTmpName,$fileDestination);
              }
              else {
                echo "your file is too big ";
              }

            } else echo"error uploading your file";

          }
          else {
            echo "type of file not permissible ";
          }

    

        
        
          if(!empty($_POST['Adresse'])){
          echo '<h2>' . 'Adresse  mail:  ' . $_POST['Adresse'] . '</h2>' ;}
          echo '<h2>' . 'le prix a payer est de  :' .  "$prix" . "Dt" . '</h2>';
        }
          ?>
        </div>
        <img class="img-fluid w-50 d-none d-sm-block mt-5" src="./imgs/sandwitch2.jpg" alt="sandwitch_img">
      </div>
    </div>
  </section>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>

</html>