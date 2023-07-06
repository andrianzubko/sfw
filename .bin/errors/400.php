<?php header('HTTP/1.1 400 Bad Request') ?>
<?php header('Content-Type: text/html; charset=iso-8859-1') ?>
<?php header('Content-Language: en') ?>
<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN">
<HTML><HEAD>
<TITLE>400 Bad Request</TITLE>
</HEAD><BODY>
<H1>Bad Request</H1>
Your browser sent a request that this server could not understand.<P>
<?php if (isset($_SERVER['SERVER_SIGNATURE']) || isset($_SERVER['SERVER_SOFTWARE'])) { ?>
<HR>
<?php echo $_SERVER['SERVER_SIGNATURE'] ?? $_SERVER['SERVER_SOFTWARE'] ?>
<?php } ?>
</BODY></HTML>
