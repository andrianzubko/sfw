<?php header('HTTP/1.1 500 Internal Server Error') ?>
<?php header('Content-Type: text/html; charset=iso-8859-1') ?>
<?php header('Content-Language: en') ?>
<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN">
<HTML><HEAD>
<TITLE>500 Internal Server Error</TITLE>
</HEAD><BODY>
<H1>Internal Server Error</H1>
The server encountered an internal error or
misconfiguration and was unable to complete
your request.<P>
Please contact the server administrator,
 <?php echo htmlspecialchars($_SERVER['SERVER_ADMIN'] ?? '...') ?> and inform them of the time the error occurred,
and anything you might have done that may have
caused the error.<P>
More information about this error may be available
in the server error log.<P>
<?php if (isset($_SERVER['SERVER_SIGNATURE']) || isset($_SERVER['SERVER_SOFTWARE'])) { ?>
<HR>
<?php echo $_SERVER['SERVER_SIGNATURE'] ?? $_SERVER['SERVER_SOFTWARE'] ?>
<?php } ?>
</BODY></HTML>
