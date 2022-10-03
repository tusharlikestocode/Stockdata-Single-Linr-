<?php
$key="7TY619H7IEWKP713";
$txt="IBM";
$url="https://www.alphavantage.co/query?function=GLOBAL_QUOTE&symbol=".$txt."&apikey=".$key;
$ch=curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
$result=curl_exec($ch);
curl_close($ch);
$result=json_decode($result,true);
$key="7TY619H7IEWKP713";
$url1="https://www.alphavantage.co/query?function=GLOBAL_QUOTE&symbol=RELIANCE.BSE&apikey=".$key;
$ch1=curl_init();
curl_setopt($ch1,CURLOPT_URL,$url1);
curl_setopt($ch1,CURLOPT_RETURNTRANSFER,true);
$result1=curl_exec($ch1);
curl_close($ch1);
$result1=json_decode($result1,true);
echo "the new open is".$result["Global Quote"]["02. open"];
if(isset($result1['Global Quote'])){
	echo "<table  id='customers' border='1'>";
	
	echo "</table>";
}else{
	echo "Something went wrong";
}
if(isset($result['Global Quote'],$result1['Global Quote'])){
	echo "<table  id='customers' border='1'><tr><th>Symbol</th><th>Open</th><th>High</th><th>Low</th><th>Price</th><th>Volume</th><th>Latest Trading Day</th><th>Previous Close</th><th>Change</th><th>Change Percent</th></tr>";
	foreach($result['Global Quote'] as $key=>$val){
    echo "<td>$val</td>";
  	}
    echo "<br>";
  foreach($result1['Global Quote'] as $key=>$val){
    echo "<td>$val</td>";
  }
    
	echo "</table>";
}else{
	echo "Something went wrong";
}
?>
<?php

?>
<?php

require_once(__DIR__ . '/vendor/autoload.php');

$config = Finnhub\Configuration::getDefaultConfiguration()->setApiKey('token', '');
$client = new Finnhub\Api\DefaultApi(
    new GuzzleHttp\Client(),
    $config
);

print_r($client->companyProfile("AAPL"));

?>

<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  
  text-align: center;
  background-color: #4CAF50;
  color: white;
  padding-top: 10px;
  padding-bottom: 10px;
  padding-left: 30px;
  padding-right: 40px;

}
</style>