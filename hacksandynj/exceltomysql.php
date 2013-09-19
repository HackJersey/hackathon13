<?php
  //Variables for connecting to your database.
            //These variable values come from your hosting account.
            $hostname = "hacksandynj.db.10172105.hostedresource.com";
            $username = "hacksandynj";
            $dbname = "hacksandynj";

            //These variable values need to be changed by you before deploying
            $password = "Mangualde@1";
            $table = "all12";
                  
            //Connecting to your database
          $link=  mysql_connect($hostname, $username, $password) OR DIE ("Unable to 
            connect to database! Please try again later.");
            mysql_select_db($dbname);

$filename="all12.csv";
//$link= mysql_connect($hostname, $username, $password);
if (!$link )die(mysql_error());
mysql_select_db ( all12 );
@ini_set("auto_detect_line_endings",1);
$fp=fopen($filename,"r");
if ($fp){
while (!feof($fp)){
$data = fgetcsv($fp);
$sql="INSERT INTO $table VALUES (";
foreach ($data as $key => $value){
$sql.="'$value',";
}
$sql=substr($sql,0,-1).");";
$result=mysql_query($sql) or die (mysql_error());
}
}
else 
{
echo "couldn't open file";
}
?> 