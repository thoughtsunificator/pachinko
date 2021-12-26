<?php
use \Core\Debug;
use \Core\Config;

$appData = [];

array_push($appData, "execution time: ". round((microtime(true) - START_TIME), 10) * 1000 ."ms");

$configData = [];

$vars = get_class_vars(Config::class);
foreach ($vars as $key => $value) {
	array_push($configData, "$key : ". json_encode($value));
}
$SQLqueriesCount = count(Debug::$orm["queries"]);
$controllerData = [];
array_push($controllerData, "Controller : ". Debug::$controller["controller"]);
foreach (Debug::$controller["scope"] as $key => $value) {
	array_push($controllerData, "$key : ". json_encode($value));
}
$viewData = [];
array_push($viewData, "Path : ". explode("View", Debug::$view["path"])[1]);
foreach (Debug::$view["scope"] as $key => $value) {
	array_push($viewData, "$key : ". json_encode($value));
}
$SQLqueriesData = Debug::$orm["queries"];
?>
<link rel="stylesheet" href="/resource/consoru/resource/consoru.css">
<script src="/resource/userinterface.js-collection/userinterface/tab.js"></script>
<script>
	Consoru = {}
</script>
<script src="/resource/consoru/src/object/console.js"></script>
<script src="/resource/consoru/src/object/button.js"></script>
<script src="/resource/consoru/src/object/tab.js"></script>
<script src="/resource/consoru/src/object/row.js"></script>
<script src="/resource/consoru/src/userinterface/console.js"></script>
<script src="/resource/consoru/src/userinterface/console.binding.js"></script>
<script src="/resource/consoru/src/userinterface/rows.js"></script>
<script src="/resource/consoru/src/userinterface/rows.binding.js"></script>
<script src="/resource/consoru/src/userinterface/row.js"></script>
<script src="/resource/consoru/src/userinterface/row.binding.js"></script>
<script>
UserInterface.runModel("consoru.console", { bindingArgs: [
	[
		{
			name: "App",
			data: <?php echo json_encode($appData) ?>
		},
		{
			name: "Config",
			data: <?php echo json_encode($configData) ?>
		},
		{
			name: "Controller",
			data: <?php echo json_encode($controllerData) ?>
		},
		{
			name: "View",
			data: <?php echo json_encode($viewData) ?>
		},
		{
			name: "SQL Queries (<?php echo $SQLqueriesCount;?>)",
			data: <?php echo json_encode($SQLqueriesData);?>
		},
	], 0], parentNode: document.body })
</script>
