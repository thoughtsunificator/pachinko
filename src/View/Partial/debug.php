<?php
use \Core\Debug;
use \Core\Config;

$configData = [];

$vars = get_class_vars(Config::class);
foreach ($vars as $key => $value) {
	array_push($configData, "$key : ". json_encode($value));
}
$SQLqueriesCount = count(Debug::$queries);
$controllerData = [];
array_push($controllerData, "Controller : ". Debug::$controllerName);
foreach (Debug::$controllerScope as $key => $value) {
	array_push($controllerData, "$key : ". json_encode($value));
}
$viewData = [];
array_push($viewData, "Path : ". explode("View", Debug::$viewPath)[1]);
foreach (Debug::$viewScope as $key => $value) {
	array_push($viewData, "$key : ". json_encode($value));
}
$SQLqueriesData = Debug::$queries;
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
UserInterface.runModel("consoru.console", { bindingArgs: [[
	{
		name: "App",
		data: [
			"execution time: <?php echo (microtime(true) - START_TIME) ;?>",
		]
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
	{name: "SQL Queries (<?php echo $SQLqueriesCount;?>)", data: <?php echo json_encode($SQLqueriesData);?>},
	], 0], parentNode: document.body })
</script>
