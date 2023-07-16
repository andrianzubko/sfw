<?php header('HTTP/1.1 403 Forbidden') ?>
<?php header('Content-Type: text/html; charset=iso-8859-1') ?>
<?php header('Content-Language: en') ?>
<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN">
<HTML><HEAD>
<TITLE>403 Forbidden</TITLE>
</HEAD><BODY>
<H1>Forbidden</H1>
You don't have permission to access <?php echo htmlspecialchars($_SERVER['REQUEST_URI'] ?? '/') ?> on this server.<P>
<?php if (isset($_SERVER['SERVER_SIGNATURE']) || isset($_SERVER['SERVER_SOFTWARE'])) { ?>
<HR>
<?php echo $_SERVER['SERVER_SIGNATURE'] ?? $_SERVER['SERVER_SOFTWARE'] ?>
<?php } ?>
</BODY></HTML>
