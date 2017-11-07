<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Schedule</title>
    <link href="../view/style/style.css" rel="stylesheet" type="text/css" />
</head>
<body>



<pre id="info-screen"><?php
        foreach($departures as $departure) {
            print $departure['line']. " ";
            print $departure['destination']. " ";
            print $departure['in']. "'";
            print "<br />";
        }
    ?></pre>

<!--
M3   Újpest központ  1'
M3A  Árpád üzletház  2'
15   Gyöngyösi utca  5'
-->


</body>
</html>
