<?php
require 'vendor/autoload.php';
$md = file_get_contents('README.md');
$html = '';
$type = isset($_GET['t']) ? $_GET['t'] : '';
$flavor = isset($_GET['f']) ? $_GET['f'] : '';
if ($type == 'michelf') {
  if ($flavor == 'extra') {
    $html = \Michelf\MarkdownExtra::defaultTransform($md);
  } else {
    $html = \Michelf\Markdown::defaultTransform($md);
  }
} elseif ($type == 'cebe') {
  if ($flavor == 'extra') {
    $parser = new \cebe\markdown\MarkdownExtra();
  } elseif ($flavor == 'github') {
    $parser = new \cebe\markdown\GithubMarkdown();
  } else {
    $parser = new \cebe\markdown\Markdown();
  }
  $html = $parser->parse($md);
} elseif ($type == 'parsedown') {
  $parser = new Parsedown();
  $html = $parser->text($md);
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Comparison of the Markdown library</title>
<link rel="stylesheet" href="github-markdown.css">
<style>
.markdown-body {overflow: auto; padding: 2em;}
.menu a {padding: 4px; background: #fdd;}
</style>
</head>
<body class="markdown-body">
<p class="menu">
  <a href="index.php?t=michelf">PHP Markdown</a>
  <a href="index.php?t=michelf&f=extra">PHP Markdown(Extra)</a>
  <a href="index.php?t=cebe">cebe/markdown</a>
  <a href="index.php?t=cebe&f=extra">cebe/markdown(Extra)</a>
  <a href="index.php?t=cebe&f=github">cebe/markdown(GitHub)</a>
  <a href="index.php?t=parsedown">Parsedown</a>
</p>
<?= $html ?>
</body>
</html>
