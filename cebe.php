<?php
require 'vendor/autoload.php';

$md = file_get_contents('README.md');

$parser = new \cebe\markdown\GithubMarkdown();
$parser->enableNewlines = true;
$html = $parser->parse($md);

echo $html;
