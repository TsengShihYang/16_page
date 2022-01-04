<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>線上萬年曆</title>
    <link rel="stylesheet" href="./basic.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Estonia&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./style.css">



</head>
<body>
    <h1>My Calendar</h1>
<?php
$specialDate = ['1-1'=>'元旦','2-14'=>'情人節','4-4'=>'兒童節','4-5'=>'清明節','5-1'=>'勞動節','9-28'=>'教師節','10-10'=>'國慶日','10-19'=>'生誕日','12-25'=>'聖誕節'];

if (isset($_GET['month'])) {
    $month = $_GET['month'];
    $year = $_GET['year'];
} else {
    $month = date("m");
    $year = date("Y");
}

$lastmonth = $month - 1;
$lastyear = $year;
$nextmonth = $month + 1;
$nextyear = $year;

if ($month == 1) {
    $lastmonth = 12;
    $lastyear = $year - 1;

    $nextmonth = $month + 1;
    $nextyear = $year;

} else if ($month == 12) {

    $lastmonth = $month - 1;
    $lastyear = $year;

    $nextmonth = 1;
    $nextyear = $year + 1;
}

$oneDay = date("$year-$month-01");
$firstblank = date("w", strtotime($oneDay));
$monthDays = date("t", strtotime($oneDay));
$firstWeekDays = 7 - $firstblank;
$weeks = ceil(($firstblank + $monthDays) / 7);
$lastWeekDays = ($firstblank + $monthDays) % 7;
$lastblank = 7 - $lastWeekDays;
$allCells = $weeks * 7;
$headers = ['日曜', '月曜', '火曜', '水曜', '木曜', '金曜', '土曜'];

for ($i = 0; $i < $firstblank; $i++) {
    $td[] = "";
}
for ($i = 0; $i < $monthDays; $i++) {
    $td[] = ($i + 1);
}
for ($i = 0; $i < $lastblank; $i++) {
    $td[] = "";
}
?>

    <h3><?=$year;?>年<?=$month;?>月</h3>
    <div class="updown">
     <a href="calendar.php?year=<?=$lastyear;?>&month=<?=$lastmonth;?>"> <前月</a>
     <a style="color:red;" href="calendar.php">當前月份</a>
     <a href="calendar.php?year=<?=$nextyear;?>&month=<?=$nextmonth;?>">次月></a>
    </div>

    <div class="calendar">
    <?php

foreach ($headers as $header) {
    echo "<div class='weekname'>";
    echo $header;
    echo "</div>";
}

for ($i = 0; $i < $allCells; $i++) {
    $w = $i % 7;
    if (is_numeric($td[$i])) {
        $spdate = date("$month-") . $td[$i];
    }else{
        $spdate=null;
    }
   
    if ($w == 0 || $w == 6) {
        echo "<div class='dayoff cell'>";
    } else {
        echo "<div class='cell'>";
    }
    echo $td[$i];
    if (isset($spdate) && array_key_exists($spdate, $specialDate)) {
        echo "<div class='specialDate'>";
        echo $specialDate[$spdate];
        echo "</div>";
    }
    echo "</div>";
}
?>
</div>
<script language="JavaScript">
 function ShowTime(){
　var NowDate=new Date();
　var h=NowDate.getHours();
　var m=NowDate.getMinutes();
　var s=NowDate.getSeconds();
　document.getElementById('showbox').innerHTML = h+'時'+m+'分'+s+'秒';
　setTimeout('ShowTime()',1000);
}
</script>
<body onload="ShowTime()">
<div class="showtime" id="showbox"></div>
</body>

</div>
</body>
</html>