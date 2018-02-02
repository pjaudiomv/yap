<?php
    include 'config.php';
    header("content-type: text/xml");
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
    
    if ($province_lookup) {
        $province = $_REQUEST['Province'];
    } else {
        if (len($_REQUEST['ToState']) > 0) {
            $province = $_REQUEST['ToState']; // Retrieved from Twilio metadata
        } elseif ($toll_free_province_bias != null) {
            $province = $toll_free_province_bias; // Override for Tollfree
        } else {
            $province = "";
        }
    }
    $speechResult = $_REQUEST['SpeechResult'];
    $searchType = $_REQUEST['SearchType'];
    
    if ($searchType == "1") {
        $action = "helpline-search.php";
    } else {
        $action = "meeting-searchtype.php";
    }
?>
<Response>
    <Redirect method="GET"><?php echo $action; ?>?Digits=<?php echo urlencode($speechResult . ", " . $province); ?></Redirect>
</Response>