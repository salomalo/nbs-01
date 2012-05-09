<?php
/**
 * @version SVN: $Id: builder.php 469 2011-07-29 19:03:30Z elkuku $
 * @package    renters
 * @subpackage Base
 * @author     neo hoang {@link concept-web.eu}
 * @author     Created on 04-May-2012
 * @license    GNU/GPL
 */

//-- No direct access
defined('_JEXEC') || die('=;)');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>"
lang="<?php echo $this->language; ?>"
dir="<?php echo $this->direction; ?>">
<head>
    <jdoc:include type="head" />
    <link rel="stylesheet"
    href="<?php echo $this->baseurl ?>/templates/<?php $this->template; ?>/css/template.css" type="text/css" />

<?php if($this->direction == 'rtl') : ?>
    <link rel="stylesheet"
    href="<?php echo $this->baseurl ?>/templates/<?php $this->template; ?>/css/template_rtl.css" type="text/css" />
<?php endif; ?>
</head>
<body class="contentpane">
    <jdoc:include type="message" />
    <jdoc:include type="component" />
</body>
</html>
