<?php
header("Content-type: application/json");
$version = "1.6"; // 每次commit请将此数字增加[大改0.2小改0.1]，用于显示版本号

// 获取server页面（eu1-10）
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://hax.co.id/data-center");
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727;https://hax.co.id/data-center)');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$server = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

// 获取开通页面（eu-mid1）
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://hax.co.id/create-vps");
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727;https://hax.co.id/create-vps)');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$create = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

file_put_contents("./data.txt",$server);

function getLine($file, $line, $length = 40960){
    $returnTxt = null;
    $i = 1;
 
    $handle = @fopen($file, "r");
    if ($handle) {
        while (!feof($handle)) {
            $buffer = fgets($handle, $length);
            if($line == $i) $returnTxt = $buffer;
            $i++;
        }
        fclose($handle);
    }
    return $returnTxt;
}
$a = getLine("data.txt",103,40960);
$b = getLine("data.txt",111,40960);
$c = getLine("data.txt",119,40960);
$d = getLine("data.txt",127,40960);
$e = getLine("data.txt",135,40960);

// 妈的hax站长可真勤劳 一下子加5个DC
// 直接在源码吐槽了
$f = getLine("data.txt",147,40960);
$g = getLine("data.txt",155,40960);
$h = getLine("data.txt",163,40960);
$i = getLine("data.txt",171,40960);
$j = getLine("data.txt",179,40960);

//eu1
$a1 = preg_replace('<<h1 class="card-text">>', '', $a);
$a2 = preg_replace('<</h1>>', '', $a1);
$a3 = preg_replace('< VPS>', '', $a2);
$a4 = preg_replace('/\n/', '',$a3 );
//eu2
$b1 = preg_replace('<<h1 class="card-text">>', '', $b);
$b2 = preg_replace('<</h1>>', '', $b1);
$b3 = preg_replace('< VPS>', '', $b2);
$b4 = preg_replace('/\n/', '',$b3 );
//eu3
$c1 = preg_replace('<<h1 class="card-text">>', '', $c);
$c2 = preg_replace('<</h1>>', '', $c1);
$c3 = preg_replace('< VPS>', '', $c2);
$c4 = preg_replace('/\n/', '',$c3 );
//eu4
$d1 = preg_replace('<<h1 class="card-text">>', '', $d);
$d2 = preg_replace('<</h1>>', '', $d1);
$d3 = preg_replace('< VPS>', '', $d2);
$d4 = preg_replace('/\n/', '',$d3 );
//eu5
$e1 = preg_replace('<<h1 class="card-text">>', '', $e);
$e2 = preg_replace('<</h1>>', '', $e1);
$e3 = preg_replace('< VPS>', '', $e2);
$e4 = preg_replace('/\n/', '',$e3 );
//eu6
$f1 = preg_replace('<<h1 class="card-text">>', '', $f);
$f2 = preg_replace('<</h1>>', '', $f1);
$f3 = preg_replace('< VPS>', '', $f2);
$f4 = preg_replace('/\n/', '',$f3 );
//eu7
$g1 = preg_replace('<<h1 class="card-text">>', '', $g);
$g2 = preg_replace('<</h1>>', '', $g1);
$g3 = preg_replace('< VPS>', '', $g2);
$g4 = preg_replace('/\n/', '',$g3 );
//eu8
$h1 = preg_replace('<<h1 class="card-text">>', '', $h);
$h2 = preg_replace('<</h1>>', '', $h1);
$h3 = preg_replace('< VPS>', '', $h2);
$h4 = preg_replace('/\n/', '',$h3 );
//eu9
$i1 = preg_replace('<<h1 class="card-text">>', '', $i);
$i2 = preg_replace('<</h1>>', '', $i1);
$i3 = preg_replace('< VPS>', '', $i2);
$i4 = preg_replace('/\n/', '',$i3 );
//eu10
$j1 = preg_replace('<<h1 class="card-text">>', '', $j);
$j2 = preg_replace('<</h1>>', '', $j1);
$j3 = preg_replace('< VPS>', '', $j2);
$j4 = preg_replace('/\n/', '',$j3 );
//eu-mid-1
$midtext = '<option value="EU Middle Specs">EU Middle Specs (KVM + SSD)</option>';
if(strpos($create,$midtext)){
    $mid1 = "true";
}else{
    $mid1="false";
}
echo '{"eu1":"'.$a4.'","eu2":"'.$b4.'","eu3":"'.$c4.'","eu4":"'.$d4.'","eu5":"'.$e4.'","eu6":"'.$f4.'","eu7":"'.$g4.'","eu8":"'.$h4.'","eu9":"'.$i4.'","eu10":"'.$j4.'","eu-mid-1":'.$mid1.',"version":"'.$version.'"}';
unlink("./data.txt");
?>
