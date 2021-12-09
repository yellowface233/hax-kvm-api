<?php
header("Content-type: application/json");
$version = "1.2"; // 每次commit请将此数字增加0.1，用于显示版本号
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://hax.co.id/server");
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727;https://hax.co.id/server)');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$head = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);


file_put_contents("./data.txt",$head);

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
$a = getLine("data.txt",100,40960);
$b = getLine("data.txt",108,40960);
$c = getLine("data.txt",116,40960);
$d = getLine("data.txt",124,40960);
$e = getLine("data.txt",132,40960);
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

echo '{"eu1":"'.$a4.'","eu2":"'.$b4.'","eu3":"'.$c4.'","eu4":"'.$d4.'","eu5":"'.$e4.'","version":'.$version.'}';
unlink("./data.txt");
?>
