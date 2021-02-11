<html>
<head>
<title>Zone H Mass Notifier</title>
<link rel="icon" href="https://icons.iconarchive.com/icons/iconarchive/red-orb-alphabet/256/Letter-H-icon.png" sizes="16x16" type="image/png">
<style>
body{
background:black;
color:white;
}
#defacer{
width:300px;
background:black;
border:solid 2px white;
color:red;
}
#domains{
background:black;
border:solid 2px white;
color:green;
}
</style>
</head>
<body>
<center>
<h1>Zone H Mass Notifier</h1>
<p>The hackers themselves submit their hacked websites. [ Defacers ]</p>
<form method="POST">
<h2>{L337_Name}</h2>
<input id="defacer" type="text" name="defacer" placeholder="CodeName"><br><br>
<textarea id="domains" cols="50px" rows="10px" name="domains" placeholder="http://target.com/def.htm&#10;http://target.com/def.txt"></textarea>
<input type="hidden" name="mirror" value="zone-h"><br>
<input name="zonenow" value="Mass" type="submit">
<?php

if (isset($_POST['zonenow'])) {
  $defacer = $_POST['defacer'];
  echo "<br><font color='red'>Archive</font> : <a href='http://zone-h.org/archive/notifier=$defacer' target='_blank'>http://zone-h.org/archive/notifier=$defacer</a>";
  echo "<br><font color='red'>OnHold</font> : <a href='http://zone-h.org/archive/notifier=$defacer&published=0' target='_blank'>http://zone-h.org/archive/notifier=$defacer&published=0</a>";

  foreach(explode("\n", htmlspecialchars($_POST['domains'])) as $domain)
  {

    postzone($domain, $_POST['defacer'], $_POST['mirror']);
  }
  echo "<br>";

}
function postzone($url, $defacer, $mirror)
{
  $ch = curl_init();
  curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt ($ch, CURLOPT_POST, 1);
  switch($mirror)
  {
  case "zone-h";
    curl_setopt($ch, CURLOPT_URL, "http://www.zone-h.com/notify/single");
    curl_setopt($ch, CURLOPT_POSTFIELDS, "defacer=$defacer&domain1=$url&hackmode=1&reason=1");
    if (preg_match ("/color=\"red\">OK<\/font><\/li>/", curl_exec ($ch))){
       echo "<br><font color='red'>Zone</font><font color='#fff'>-H</font> --&gt; <font color='gold'>$url</font> : <span style='color:white'>Status</span> --&gt; <span style='color: green'>SUCCESS</span> <span style='color:white'>[ OK ]</span>";
    }
    else{
       echo "<br><font color='red'>Zone</font><font color='#fff'>-H</font> --&gt; <font color='gold'>$url</font> : <span style='color:white'>Status</span> --&gt; <span style='color: red'>ERROR</span> <span style='color:white'>[ Failed ]</span>";
    }
    break;
  }
  curl_close($ch);
}
?>
</form>
<font color="red" face="Orbitron" size="3"><p>Copyright @ 2020 GrayHat Phantom <font color="white">| <font color="red">Developed By <font color="white">Ph.Luffy</p></a></font></center>

</body>
</html>
