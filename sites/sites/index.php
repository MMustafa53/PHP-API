<?php
$kontrol = true;

function veri_getir($kon){
    if($kon){
        $ch = curl_init();
        $ankara_kod = 316938;
        $url = "http://dataservice.accuweather.com/forecasts/v1/daily/5day/316938?apikey=nACKxqvYgO5pKAgjS2csqwi3WGoMduSw";
        $api_key = "nACKxqvYgO5pKAgjS2csqwi3WGoMduSw";
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_HEADER, false);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_ENCODING, "UTF-8");
        curl_setopt($ch, CURLOPT_REFERER, 'http://dataservice.accuweather.com/');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($ch);
        $rescode = curl_getinfo($ch,CURLINFO_HTTP_CODE);
        curl_close($ch);
        return $response;
    }else{
        return "Çalışmadı<br>";
    }
}

//echo $response;
//var_dump(json_decode($response));
$data =  veri_getir($kontrol);
$data_decode = json_decode($data,true);


$maxval = $data_decode['DailyForecasts'][0]['Temperature']['Maximum']['Value'];
$minval = $data_decode['DailyForecasts'][0]['Temperature']['Minimum']['Value'];


echo "Ankara İli Hava durumu<br>";
echo "Maximum ".$maxval." Fahrenayt <br> Minimum ".$minval." Fayhrenayt<br>";
$maxval = ($maxval-32)*5/9;
$minval = ($minval-32)*5/9;
echo "Maximum ".intval($maxval)." Derece<br> Minimum ".intval($minval)." Derece";

//$strJsonFileContents = file_get_contents("a.json");
//$a = json_decode($strJsonFileContents,true);
//echo "Ankara İli Hava durumu<br>";
//
//$maxval = $a['Temperature']['Maximum']['Value'];
//$minval = $a['Temperature']['Minimum']['Value'];
//echo "Maximum ".$maxval." Fahrenayt <br> Minimum ".$minval." Fayhrenayt<br>";
//$maxval = ($maxval-32)*5/9;
//$minval = ($minval-32)*5/9;
//echo "Maximum ".intval($maxval)." Derece<br> Minimum".intval($minval)." Derece";
//
//echo "<br>/////////////////////////////////////////////////////--SOAP--/////////////////////////////////////////////////////<br>";
//
//try {
//    $istek = new SoapClient('ab.wsdl');
//    print_r($istek->DescribeProcess());
//    echo "Ankara İli Hava durumu<br>";
//
//    $maxval = $a['Temperature']['Maximum']['Value'];
//    $minval = $a['Temperature']['Minimum']['Value'];
//    echo "Maximum ".$maxval." Fahrenayt <br> Minimum ".$minval." Fayhrenayt<br>";
//    $maxval = ($maxval-32)*5/9;
//    $minval = ($minval-32)*5/9;
//    echo "Maximum ".intval($maxval)." Derece<br> Minimum".intval($minval)." Derece";
//}catch(Exception $exc){
//    echo $exc->getMessage();
//}