<?php

function returnError($error = 'undefined error') {
    header('Content-Type: application/json');
    echo json_encode(array('error' => $error));
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    returnError('REQUEST_METHOD is not set to post.');
}

$model = json_decode(file_get_contents('php://input'), true);
if ($model === null) {
    returnError('post data cannot be decoded');
}

$dataFile = 'json/pants.json';
if (!file_exists($dataFile)) {
    returnError('file doesn\'t exist.');
}
$collection = json_decode(file_get_contents($dataFile));

if ($collection === null) {
    returnError('file cannot be decoded');
}

$highestId = 0;
foreach ($collection as $currentModel) {
    if ($currentModel->id > $highestId) {
        $highestId = $currentModel->id;
    }
}
$model['id'] = $highestId + 1;

$collection[] = $model;

if (!is_writable($dataFile)) {
    returnError('cannot write to file');
}
$result = file_put_contents($dataFile, json_encode($collection));

header('Content-Type: application/json');

echo json_encode(array('success' => 'win!'));

?>