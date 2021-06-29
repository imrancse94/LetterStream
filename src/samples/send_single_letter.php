<?php

require './config/sample_config.php';

if($_POST){
    $data['job'] = $_POST['job'];
    $data['pages'] = $_POST['pages'];
    $data['from'] = $_POST['from'];
    $data['to[]'] = $_POST['uniqueid'].':'.$_POST['to'];
    $data['mailtype'] = $_POST['mailtype'];
    $data['paper'] = $_POST['paper'];
    $data['ink'] = $_POST['ink'];
    $data['returnenv'] = $_POST['returnenv'];
    $data['coversheet'] = $_POST['coversheet'];
    $data['preauth'] = $_POST['preauth'];
    $data['debug'] = 3;//$_POST['debug'];
    $response = SampleConfig::letterstream()->setAttachment($file,$data)->send();
    echo "<pre>";
    print_r($response);
    exit;
}

?>

<fieldset id="singlefile">
    <legend>Single File Upload w/ Options</legend>
    <br>
    <form method="post" action="#" enctype="multipart/form-data">
        Job Name: <input type="text" name="job" value="test job <?=date('m/d/y h:i')?>"><br>
        Your PDF <input name="single_file" type="file"><br>
        Number of pages in PDF: <input type="text" name="pages"><br>

        Return Address: <textarea name="from" cols="40" rows="1">John:Doe:123 S Sunny St:Suite
                    101:Scottsdale:AZ:85281</textarea><br>
        Unique recipient ID: <input type="text" name="uniqueid" value="<?=time()?>"><br>
        To Address: <textarea name="to" cols="40" rows="1">Husband:and Wife:456 South Some
                    St:Apt1:Some City:AZ:85260</textarea><br>
        Mail Type: <select name="mailtype">
            <option value="firstclass">firstclass</option>
            <option value="certified">certified</option>
            <option value="certnoerr">certified no err</option>
            <option value="postcard">postcard</option>
            <option value="propostcard">PROpostcard</option>
            <option value="flat">flat</option>
        </select><br>
        Paper: <select name="paper">
            <option value="">plain white</option>
            <option value="PERF">PERF Statement</option>
            <option value="Y">Yellow</option>
            <option value="B">Blue</option>
            <option value="G">Green</option>
            <option value="O">Orange</option>
            <option value="I">Ivory</option>
            <option value="R">Red</option>
        </select><br>
        Coversheet? <select name="coversheet">
            <option value="N">N</option>
            <option value="Y">Y</option>
        </select><br>
        Color Ink? <input type="checkbox" name="ink" value="C"><br>
        Return Envelope? <input type="checkbox" name="returnenv" value="Y"><br>
        PreAuth? <input type="checkbox" name="preauth" value="1"><br>
        Debug: <select name="debug">
            <option value="3">Most Verbose</option>
            <option value="2">Somewhere in the middle</option>
            <option value="1">Least Verbose</option>
            <option value="">None</option>
        </select><br><br>
        <input type="submit" name="submit" value="Submit Job">
    </form>
</fieldset>