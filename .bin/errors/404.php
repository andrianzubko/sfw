<?php header('HTTP/1.1 404 Not Found') ?>
<?php header('Content-Type: text/html; charset=iso-8859-1') ?>
<?php header('Content-Language: en') ?>
<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN">
<HTML><HEAD>
<TITLE>404 Not Found</TITLE>
</HEAD><BODY>
<H1>Not Found</H1>
The requested URL <?php echo htmlspecialchars($_SERVER['REQUEST_URI'] ?? '/') ?> was not found on this server.<P>
<?php if (isset($_SERVER['SERVER_SIGNATURE']) || isset($_SERVER['SERVER_SOFTWARE'])) { ?>
<HR>
<?php echo $_SERVER['SERVER_SIGNATURE'] ?? $_SERVER['SERVER_SOFTWARE'] ?>
<?php } ?>
</BODY></HTML>
