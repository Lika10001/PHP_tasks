<?php

error_reporting(E_ERROR | E_PARSE);
require('simple_html_dom.php');
if(isset($_POST["submit"])) {
    $url = $_POST["url"];
    $path = 'downloads_for_1';
   // $html = file_get_contents($url);
    $html = file_get_html($url);
    foreach($html->find("img") as $image){
        $src = $image->src;
        $filename = strrchr($image->src,"/");
        if (strtolower(substr($src, 0, 5)) != 'http:' && strtolower(substr($src, 0, 6)) != 'https:')
           $src = 'https:'.$src;
        echo"<h2>$src</h2>";
        //file_put_contents($path.$filename, file_get_contents($src));
        if(strstr($src, '.jpg') || strstr($src, '.gif') || strstr($src, '.png')) {
            $ch = curl_init($src);
            echo"<h2>подходит</h2>";
            $fp = fopen($path . $filename, 'wb');
            curl_setopt($ch, CURLOPT_FILE, $fp);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_exec($ch);
            curl_close($ch);
            fclose($fp);
        }
    }
}

?>
<!doctype html>
<html lang="en">
  <head>
  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    

    <title>Task 3</title>
  </head>
  <body>
    <div class="container" id="mainDiv"> 
      <form method="post">
  <div class="mb-3">
    <input type="text" class="form-control" name="url" placeholder="Введите ссылку" id="city" aria-describedby="Forecast city">
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Ввести</button>
</form>
</div> 
    </div>  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>