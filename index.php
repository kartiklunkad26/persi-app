<!DOCTYPE html>
<html >
  <body>
    <h2 style="text-align: center; color: #2B5663; font-size: 2em; font-family: Verdana,sans-serif; font-variant: small-caps;">Spectacular EMC Dojo App! :)</h2>
    <img style="border-radius: 30px; border: 15px solid #45B0FE; display: block; margin: 50px auto auto auto" src="http://lorempixel.com/g/600/400/cats/" alt="Cute Cat" style="width:600px;height:800px;"><br/>
  <div style="text-align: center; color: #45B0FE; font-size: 1em; font-family: Verdana,sans-serif;"><?php
  echo 'My environment variables are: ' .$_ENV["VCAP_SERVICES"] . '!' ."<br>";
  echo "Instance ID is: "  .$_ENV["CF_INSTANCE_INDEX"] ."<br>";
  echo "My IP is: " .$_ENV["CF_INSTANCE_ADDR"] ."<br>"."<br>"."<br>";

  ?>
  <form name="form" method="post">
    <input type="text" name="text_box" size="50"/>
    <input type="submit" id="search-submit" value="submit" />
  </form>
  <?php
    $service_broker = $_ENV["CF_SERVICE"];
    $filepath = json_decode($_ENV["VCAP_SERVICES"],true)[$service_broker][0]['volume_mounts'][0]['container_dir'];
    $filepath = $filepath . "/hello.txt";
    if(!empty($_POST))
    {
       $fh = fopen($filepath, 'a') or die("can't open file");
       fwrite($fh, $_POST['text_box'] . "\n");
       fclose($fh);
    }
    $fh = fopen($filepath, 'r') or die("can't open file");
    fclose($fh);
    $file = file_get_contents($filepath, true);
    echo $file;
  ?>
  </div>
  </body>
</html>
