<?php
if (isset($conf['charset'])) {
    header('Content-type: text/html; charset=' . $conf['charset']);
}
?>
<html>
<head>
<?php
$page_title = $conf['webtitle'];
if (!empty($title)) $page_title .= ' :: ' . $title;
?>
<title><?php echo($page_title); ?></title>
<link href="images/style.css" rel="stylesheet" type="text/css">
</head>
<body <?php if (!empty($bodyStyle)) echo ' class="' . $bodyStyle . '"' ?>>
