<?php

$request = new HttpRequest();
$request->setUrl('http://localhost/Test/create.php');
$request->setMethod(HTTP_METH_POST);

$request->setHeaders(array(
  'postman-token' => 'd08b1326-172e-fc33-e2ba-c57954bc5e2c',
  'cache-control' => 'no-cache',
  'content-type' => 'application/x-www-form-urlencoded',
  'x-access-token' => '.tlqSm3FzuiN66jvi0aHOea0o_WoAOtIYMNLBogc14'
));

$request->setContentType('application/x-www-form-urlencoded');
$request->setPostFields(null);

try {
  $response = $request->send();

  echo $response->getBody();
} catch (HttpException $ex) {
  echo $ex;
}
?
