<?php
if(!function_exists('dd')) {
    function dd($value)
    {
        if(is_array($value)) {
            header("Content-type: application/json");
            echo json_encode($value, JSON_UNESCAPED_UNICODE);
        } else {
            echo '<pre>';var_dump($value);echo '</pre>';
        }
        die(0);
    }
}
if (!function_exists('d')) {
    function d($value)
    {
        if(is_array($value)) {
            header("Content-type: application/json");
            echo json_encode($value, JSON_UNESCAPED_UNICODE);
        } else {
            echo '<pre>';var_dump($value);echo '</pre>';
        }
    }
}
if (!function_exists('json_return')) {
    function json_return($value)
    {
        header("Content-type: application/json");
        echo json_encode($value, JSON_UNESCAPED_UNICODE);
        exit();
    }
}

function cmp1($a, $b) {
    return $a['comNum'] > $b['comNum'] ? -1 : 1;
}

$data = json_decode(file_get_contents('./anime.data'), true);
usort($data, 'cmp1');

$less_than_1 = 0;
$less_than_10 = 0;
$less_than_100 = 0;
$less_than_1000 = 0;
$less_than_10000 = 0;
$less_than_100000 = 0;

foreach ($data as $item) {
    if ($item['comNum'] == 0) {
        $less_than_1++;
    } elseif ($item['comNum'] < 10) {
        $less_than_10++;
    } elseif ($item['comNum'] < 100) {
        $less_than_100++;
    } elseif ($item['comNum'] < 1000) {
        $less_than_1000++;
    } elseif ($item['comNum'] < 10000) {
        $less_than_10000++;
    } elseif ($item['comNum'] < 100000) {
        $less_than_100000++;
    }
}
echo '弹幕为 0 的番剧:'.$less_than_1."\n";
echo '弹幕 (0, 10) 的番剧:'.$less_than_10."\n";
echo '弹幕 (10, 100) 的番剧:'.$less_than_100."\n";
echo '弹幕 (100, 1000) 的番剧:'.$less_than_1000."\n";
echo '弹幕 (1000, 10000) 的番剧:'.$less_than_10000."\n";
echo '弹幕 大于10000 的番剧:'.$less_than_100000."\n";
echo '-------------------------------------------'."\n";
echo '弹幕数最多的前 20:'."\n";
for($i = 0; $i < 20; $i++) {
    echo $data[$i]['title'].' 弹幕数:'.$data[$i]['comNum']."\n";
}
echo '-------------------------------------------'."\n";

function cmp2($a, $b) {
    return $a['playNum'] > $b['playNum'] ? -1 : 1;
}

$data = json_decode(file_get_contents('./anime.data'), true);
usort($data, 'cmp2');

$less_than_1 = 0;
$less_than_10 = 0;
$less_than_100 = 0;
$less_than_1000 = 0;
$less_than_10000 = 0;
$less_than_100000 = 0;

foreach ($data as $item) {
    if ($item['comNum'] == 0) {
        $less_than_1++;
    } elseif ($item['playNum'] < 10) {
        $less_than_10++;
    } elseif ($item['playNum'] < 100) {
        $less_than_100++;
    } elseif ($item['playNum'] < 1000) {
        $less_than_1000++;
    } elseif ($item['playNum'] < 10000) {
        $less_than_10000++;
    } elseif ($item['playNum'] < 100000) {
        $less_than_100000++;
    }
}

echo '播放为 0 的番剧:'.$less_than_1."\n";
echo '播放 (0, 10) 的番剧:'.$less_than_10."\n";
echo '播放 (10, 100) 的番剧:'.$less_than_100."\n";
echo '播放 (100, 1000) 的番剧:'.$less_than_1000."\n";
echo '播放 (1000, 10000) 的番剧:'.$less_than_10000."\n";
echo '播放 大于10000 的番剧:'.$less_than_100000."\n";
echo '-------------------------------------------'."\n";
echo '播放数最多的前 20:'."\n";
for($i = 0; $i < 20; $i++) {
    echo $data[$i]['title'].'播放数:'.$data[$i]['playNum']."\n";
}
echo '-------------------------------------------'."\n";

function cmp3($a, $b) {
    return $a['collNum'] > $b['collNum'] ? -1 : 1;
}

$data = json_decode(file_get_contents('./anime.data'), true);
usort($data, 'cmp3');

$less_than_1 = 0;
$less_than_10 = 0;
$less_than_100 = 0;
$less_than_1000 = 0;
$less_than_10000 = 0;
$less_than_100000 = 0;

foreach ($data as $item) {
    if ($item['comNum'] == 0) {
        $less_than_1++;
    } elseif ($item['collNum'] < 10) {
        $less_than_10++;
    } elseif ($item['collNum'] < 100) {
        $less_than_100++;
    } elseif ($item['collNum'] < 1000) {
        $less_than_1000++;
    } elseif ($item['collNum'] < 10000) {
        $less_than_10000++;
    } elseif ($item['collNum'] < 100000) {
        $less_than_100000++;
    }
}

echo '收藏数为 0 的番剧:'.$less_than_1."\n";
echo '收藏数 (0, 10) 的番剧:'.$less_than_10."\n";
echo '收藏数 (10, 100) 的番剧:'.$less_than_100."\n";
echo '收藏数 (100, 1000) 的番剧:'.$less_than_1000."\n";
echo '收藏数 (1000, 10000) 的番剧:'.$less_than_10000."\n";
echo '收藏数 大于10000 的番剧:'.$less_than_100000."\n";
echo '-------------------------------------------'."\n";
echo '收藏数最多的前 20:'."\n";
for($i = 0; $i < 20; $i++) {
    echo $data[$i]['title'].'收藏数:'.$data[$i]['collNum']."\n";
}
echo '-------------------------------------------'."\n";
