<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Annotations - Purely code or magic?</title>
</head>
<body>
<?php
require 'vendor/autoload.php';

$metadataService = new App\Service\Metadata(App\Template\Fields::class);

$metaTags = $metadataService->getMetaTags();

$output = $input = "";
if (!empty($_POST)) {
    $input = $_POST['text'];
    $output = $metadataService->process($input);
}
?>
<form action="/" method="post">
    <label for="">Options:</label>
    <?php foreach ($metaTags as $metaTag) : ?>
        <button type="button" value="%<?php echo $metaTag['tag']; ?>%" onclick="addText(event)">
        <?php echo $metaTag['label']; ?>
        </button>&nbsp;&nbsp;&nbsp;
    <?php endforeach; ?>
    <br /><br />
    <label for="text">Your input: </label>
    <br />
    <textarea name="text" id="text" cols="50" rows="10"><?php echo $input; ?></textarea>
    <br />
    <button type="submit" >Show me the magic!</button>
</form>
<?php if ($output) : ?>
    <p><img src="assets/img/magic.gif" alt="Show me the magic!"></p>
    <p>Processed text: <?php echo "<pre>{$output}</pre>";?></p>
<?php endif; ?> 
</body>
<script>
function addText(event) {
    var target = event.target || event.srcElement;
    document.getElementById("text").value += target.value;
}
</script>
</html>