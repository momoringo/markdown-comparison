<?php
require 'vendor/autoload.php';
$md = file_get_contents('README.md');
$html = \Michelf\MarkdownExtra::defaultTransform($md);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Comparison of the Markdown library</title>
<link rel="stylesheet" href="github-markdown.css">
</head>
<body class="markdown-body" style="overflow: auto; padding: 2em;">
<?= $html ?>
</body>
</html>
