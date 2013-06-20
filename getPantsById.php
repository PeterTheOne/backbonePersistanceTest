<?php

function returnError($error = 'undefined error') {
    header('Content-Type: application/json');
    echo json_encode(array('error' => $error));
    exit;
}

if (!isset($_GET['id'])) {
    returnError('id is not set');
}
$id = intval($_GET['id']);

$dataFile = 'json/pants.json';
if (!file_exists($dataFile)) {
    returnError('file doesn\'t exist.');
}
$collection = json_decode(file_get_contents($dataFile));

if ($collection === null) {
    returnError('file cannot be decoded');
}

$model = null;
foreach ($collection as $currentModel) {
    if ($currentModel->id === $id) {
        $model = $currentModel;
        break;
    }
}

header('Content-Type: application/json');

if ($model === null) {
    returnError();
}

echo json_encode(array($model));

?>