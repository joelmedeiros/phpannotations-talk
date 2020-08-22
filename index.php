<?php

require 'vendor/autoload.php';

$metadataService = new App\Service\Metadata(App\Template\Fields::class);

$metaTags = $metadataService->getMetaTags();

$output = $input = "";
if (!empty($_POST)) {
    $input = $_POST['text'];
    $output = $metadataService->process($input);
}

echo $output;

?>

<script>
function addText(event) {
    var targ = event.target || event.srcElement;
    document.getElementById("text").value += targ.value;
}
</script>
<form action="/" method="post">
    <?php foreach ($metaTags as $metaTag) : ?>
        <button type="button" value="%<?php echo $metaTag['tag']; ?>%" onclick="addText(event)">
        <?php echo $metaTag['label']; ?> &nbsp;
        </button>
    <?php endforeach; ?>
    <br />
    <textarea name="text" id="text" cols="30" rows="10"><?php echo $input; ?></textarea>
    <br />
    <button type="submit">Mostrar</button>
</form>