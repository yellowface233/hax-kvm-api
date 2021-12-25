<?php
header("Content-type: application/json");
$version = "2.0"; // 每次commit请将此数字增加[大改0.2小改0.1]，用于显示版本号

// 获取server页面
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://hax.co.id/data-center");
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727;https://hax.co.id/data-center)');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$server = curl_exec($ch);
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
$a = getLine("data.txt",104,40960); //eu1
$b = getLine("data.txt",112,40960);//2
$c = getLine("data.txt",120,40960);//3
$d = getLine("data.txt",128,40960);//4
$e = getLine("data.txt",136,40960);//5

// 妈的hax站长可真勤劳 一下子加5个DC
// 直接在源码吐槽了
$f = getLine("data.txt",148,40960);//6
$g = getLine("data.txt",156,40960);//7
$h = getLine("data.txt",164,40960);//8
$i = getLine("data.txt",172,40960);//9
$j = getLine("data.txt",180,40960);//10
$k = getLine("data.txt",192,40960);//mid
$id = getLine("data.txt",200,40960);//id-1
$us = getLine("data.txt",207,40960);//usla
$l = getLine("data.txt",250,40960);// 在线VPS总数

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
$k1 = preg_replace('<<h1 class="card-text">>', '', $k);
$k2 = preg_replace('<</h1>>', '', $k1);
$k3 = preg_replace('< VPS>', '', $k2);
$k4 = preg_replace('/\n/', '',$k3 );
//AllVPS
$l1 = preg_replace('<<h1 class="card-text">>', '', $l);
$l2 = preg_replace('<</h1>>', '', $l1);
$l3 = preg_replace('< VPS>', '', $l2);
$l4 = preg_replace('/\n/', '',$l3 );
//id-1
$id = preg_replace('<<h1 class="card-text">>', '', $id);
$id = preg_replace('<</h1>>', '', $id);
$id = preg_replace('< VPS>', '', $id);
$id = preg_replace('/\n/', '',$id );
//us-1
$us = preg_replace('<<h1 class="card-text">>', '', $us);
$us = preg_replace('<</h1>>', '', $us);
$us = preg_replace('< VPS>', '', $us);
$us = preg_replace('/\n/', '',$us );
// OpenVZ 太多了，单独来一块（总和） 草 hax站长真的不能再勤劳了
// OpenVZ五个DC单独（取行数）
$ovz1 = getLine("data.txt",214,40960);
$ovz2 = getLine("data.txt",221,40960);
$ovz3 = getLine("data.txt",228,40960);
$ovz4 = getLine("data.txt",235,40960);
$ovz5 = getLine("data.txt",242,40960);
// 获取数量 五个OVZ
//ovz1
$ovz1 = preg_replace('<<h1 class="card-text">>', '', $ovz1);
$ovz1 = preg_replace('<</h1>>', '', $ovz1);
$ovz1 = preg_replace('< VPS>', '', $ovz1);
$ovz1 = preg_replace('/\n/', '',$ovz1);
//ovz2
$ovz2 = preg_replace('<<h1 class="card-text">>', '', $ovz2);
$ovz2 = preg_replace('<</h1>>', '', $ovz2);
$ovz2 = preg_replace('< VPS>', '', $ovz2);
$ovz2 = preg_replace('/\n/', '',$ovz2);
//ovz3
$ovz3 = preg_replace('<<h1 class="card-text">>', '', $ovz3);
$ovz3 = preg_replace('<</h1>>', '', $ovz3);
$ovz3 = preg_replace('< VPS>', '', $ovz3);
$ovz3 = preg_replace('/\n/', '',$ovz3);
//ovz4
$ovz4 = preg_replace('<<h1 class="card-text">>', '', $ovz4);
$ovz4 = preg_replace('<</h1>>', '', $ovz4);
$ovz4 = preg_replace('< VPS>', '', $ovz4);
$ovz4 = preg_replace('/\n/', '',$ovz4);
//ovz5
$ovz5 = preg_replace('<<h1 class="card-text">>', '', $ovz5);
$ovz5 = preg_replace('<</h1>>', '', $ovz5);
$ovz5 = preg_replace('< VPS>', '', $ovz5);
$ovz5 = preg_replace('/\n/', '',$ovz5);
// 求OpenVZ总和
$ovz = $ovz1+$ovz2+$ovz3+$ovz4+$ovz5;
// OpenVZ结束

echo '{"eu1":"'.$a4.'","eu2":"'.$b4.'","eu3":"'.$c4.'","eu4":"'.$d4.'","eu5":"'.$e4.'","eu6":"'.$f4.'","eu7":"'.$g4.'","eu8":"'.$h4.'","eu9":"'.$i4.'","eu10":"'.$j4.'","eu-mid-1":"'.$k4.'","id1":"'.$id.'","us1":"'.$us.'","OpenVZ":"'.$ovz.'","AllVPS":"'.$l4.'","version":"'.$version.'"}';
unlink("./data.txt");
?>
