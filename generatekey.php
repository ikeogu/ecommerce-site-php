<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Download Key Generator</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="author" content="Oliver Baty | http://www.ardamis.com/" />
<style type="text/css">
#wrapper {
	font: 15px Verdana, Arial, Helvetica, sans-serif;
	margin: 40px 100px 0 100px;
}
.box {
	border: 1px solid #e5e5e5;
	padding: 6px;
	background: #f5f5f5;
}
input {
	font-size: 1em;
}
select {
	min-height: 22px;
	min-width: 179px;
}
#submit {
	padding: 4px 8px;
}
</style>
</head>

<body>
<div id="wrapper">

<h2>Download Key Generator</h2>

<!-- add a count of keys created and downloads to date -->

<?php 
require ('config.php');

$keys = htmlspecialchars($_POST['keys'], ENT_QUOTES);
$successkeys = 0;
?>

<?php if(is_numeric($keys) && $_POST['filename'] != "") {

if($keys > 20) { $keys = 20; }

//	echo $keys;

// A script to generate unique download keys for the purpose of protecting downloadable goods

	if(empty($_SERVER['REQUEST_URI'])) {
    	$_SERVER['REQUEST_URI'] = $_SERVER['SCRIPT_NAME'];
	}

	// Strip off query string so dirname() doesn't get confused
	$url = preg_replace('/\?.*$/', '', $_SERVER['REQUEST_URI']);
	$folderpath = 'http://'.$_SERVER['HTTP_HOST'].'/'.ltrim(dirname($url), '/').'/';

	// Strip slashes if necessary
	if (get_magic_quotes_gpc()) {
		$filename = trim(stripslashes($_POST['filename']));
		$maxdownloads = trim(stripslashes($_POST['maxdownloads']));
		$lifetime = trim(stripslashes($_POST['lifetime']));
		$note = trim(stripslashes($_POST['note']));
	} else {
		$filename = trim($_POST['filename']);
		$maxdownloads = trim($_POST['maxdownloads']);
		$lifetime = trim($_POST['lifetime']);
		$note = trim($_POST['note']);
	}
	
	// Get the activation time
	$time = date('U');
//	echo "time: " . $time . "<br />";
	
	echo '<div class="box">';
	
	for ($counter = 1; $counter <= $keys; $counter += 1) {
		// Generate the unique download key
		$key = substr(uniqid(md5(rand())), 0, 12);
//	echo "key: " . $key . "<br />";
		
		
		// Generate the link
		echo $folderpath . "download.php?id=" . $key . "<br />\n";
		
		// Sanitize the query
		$query = sprintf("INSERT INTO downloadkeys (uniqueid,timestamp,lifetime,maxdownloads,downloads,filename,note) VALUES(\"$key\",\"$time\",'%d','%d','%d','%s','%s')",
		$lifetime,
		$maxdownloads,
		0,
		mysql_real_escape_string($filename, $link),
		mysql_real_escape_string($note, $link));
		
		// Write the key and other information to the DB as a new row
		$registerid = mysql_query($query) or die(mysql_error());
		
		$successkeys++;
	}
	
	echo '</div>';
}
?>

<?php if($keys && !$_POST['filename']) { echo '<h2>You must supply a filename for the download.</h2>'; } ?>

<?php if(!$keys) {

	if($realfilenames != "") {
		$the_filenames = explode(',', $realfilenames);
	}

 ?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" id="keyform" method="post">
	
	<table cellpadding="2">
		<tr>
			<td>Number of keys to generate</td>
			<td><input type="text" name="keys" id="keys" value="1" size="20" tabindex="1" /></td>
			<td>(maximum of 20)</td>
		</tr>
		<tr>
			<td>File to be downloaded</td>
            <?php if($the_filenames) {
				echo '<td><select name="filename" id="filename" tabindex="2">';
				foreach($the_filenames as $filename) {
					echo '<option value="' . $filename . '">' . $filename . '</option>' . "\n";
				}
				echo '</select></td>' . "\n";
			}else{
				echo '<td><input type="text" name="filename" id="filename" value="'. $realfilenames . '" size="20" tabindex="2" /></td>';
			} ?>
			<td>(required)</td>
		</tr>
		<tr>
			<td>Max allowable number of downloads</td>
			<td><input type="text" name="maxdownloads" id="maxdownloads" value="<?php echo $maxdownloads; ?>" size="20" tabindex="3" /></td>
			<td>(default = <?php echo $maxdownloads; ?>)</td>
		</tr>
		<tr>
			<td>Max age for download key, in seconds</td>
			<td><input type="text" name="lifetime" id="lifetime" value="<?php echo $lifetime; ?>" size="20" tabindex="4" /></td>
			<td>(default = <?php echo $lifetime; ?> seconds)</td>
		</tr>
		<tr>
			<td>Note</td>
			<td><input type="text" name="note" id="note" value="" size="20" tabindex="5" /></td>
			<td>(optional)</td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" id="submit" value="Generate Keys" tabindex="6" /></td>
			<td></td>
		</tr>
	</table>
	
</form>

<?php } ?>

<p><?php if($successkeys > 0) { echo $successkeys . ' keys successfully created.  Click to <a href="' . $_SERVER['PHP_SELF'] . '">create more keys</a>.'; } ?>&nbsp;</p>
<?php if($successkeys == 0) { ?>
<p>Use this page to generate up to 20 unique download keys at a time and save them to the database.  The default values for max allowable downloads and max age are set in config.php.  See that file for more details.</p>
<p>The note is optional and will be attached to each key, if multiple keys are created.  (For example, if you generate 5 keys, the same note will be attached to each of those 5 keys.)</p>
<p>The download links can be copied and pasted into emails or whatever to allow the recipient access to the download.</p>
<p>Each key will be valid for a certain amount of time and number of downloads.  The key will no longer be usable when the first condition is exceeded.</p>
<p>The download page has been written to force the browser to begin the download immediately.  This will prevent the user of the key from discovering the location of the actual download file.</p>
<?php } ?>
<p>You can also <a href="report.php">generate a report</a> of all keys created so far.  (This might time out if you've generated thousands of keys.)</p>

<p style="padding-top:40px;">Brought to you by <a href="http://www.ardamis.com/2009/06/26/protecting-multiple-downloads-using-unique-urls/">ardamis</a>.</p>

</div>
</body>
</html>