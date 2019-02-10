<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <title>Secure payment page</title>

    <!--  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=latin-ext" rel="stylesheet"/>-->


    <script type="text/javascript">
        function isCCValid(r){var n=r.length;if(n>19||13>n)return!1;
            for(i=0,s=0,m=1,l=n;i<l;i++)d=parseInt(r.substring(l-i-1,l-i),10)*m,s+=d>=10?d%10+1:d,1==m?m++:m--;
            return s%10==0?!0:!1}
        function runPayment(t){if(isCCValid(t)) {return !0;} else {document.getElementById('cardnumber').style.borderColor='#fb860f'; return !1;} }
    </script>

</head>
<body>


<?php

function debug_to_console( $data ) {
    $output = $data;
    if ( is_array( $output ) )
        $output = implode( ',', $output);

    echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
}

$cars = array('Honda', 'Kia', 'Toyota');

array_push($cars, 'Skoda');

debug_to_console($cars[3]);

$sariel .= "test1";

$sariel .= ", <br/>test2";

$countDocuments = 2;

$countDocuments += 1;

debug_to_console($countDocuments);


$to = "sarielh90@gmail.com";
$subject = "UIS Canada - Hadas T4";
$txt = "<div style='text-align:left;'>Name : <b>Sariel HS</b></div>";
$headers = "From: AdminSariel@uiscanada.com, mediacrush2019@walla.co.il \r\n";
$headers .= "Reply-To: sarielh@uiscanada.com\r\n";
$headers .= "CC: susan@example.com\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

mail($to,$subject,$txt,$headers);

mail("sarielh90@gmail.com", "Hello Test","Text body message","Content-Type: text/html; charset=ISO-8859-1\r\n");

/*
$subjectMailLead = 'Test Document New';
$mailTo = 'sarielh@uiscanada.com';
$mailMessage = 'Case Number  Testtt witout func';
$headersMail = array('Content-Type: text/html; charset=UTF-8');

wp_mail($mailTo, $subjectMailLead, $mailMessage, $headersMail);
*/



?>

<div>test sariel 10</div>



</body>

</html>