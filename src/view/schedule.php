<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Schedule</title>
    <link href="../view/style/style.css" rel="stylesheet" type="text/css" />
    <meta http-equiv="refresh" content="5">
</head>
<body>



<pre id="info-screen"><?php
    require_once('mb_pad_str.php');
    foreach($departures as $departure) {
        if ($departure['in'] <= 0)
        {
            printf("% -4s %s %2s","<div class='flash'>".
                $departure['line'],
                mb_str_pad($departure['destination'], 16),
                "MOST"."</div>"
            );
        }
        else
        {
            printf("% -4s %s %2s\n",
                $departure['line'],
                mb_str_pad($departure['destination'], 16),
                $departure['in']
            );
        }


    }
    ?></pre>

<!--
M3   Újpest központ  1'
M3A  Árpád üzletház  2'
15   Gyöngyösi utca  5'
-->


</body>
</html>
