<?php

require_once "lib.sepalastschrift.php";

$datum = new DateTime("now + 14 days");
$lastschriften = new SEPALastschrift($datum, "randomid", "FeM e.V. (user)", "FeM e.V.", "123", "123", "123", "EUR");

$lastschriften->addLastschrift("randomtxid", "987", "987", "Test Me", "Mandate-Id123", new DateTime("2013-05-23"), 42.00, "blabla SSS","FRST");
$lastschriften->addLastschrift("randomtxid2", "9871", "9871", "Test Me2", "Mandate-Id122", new DateTime("2013-05-22"), 44.00, "blabla SSS","RCUR");
$lastschriften->addLastschrift("randomtxid3", "9872", "BIC9873", "Test Me3", "Mandate-Id123", new DateTime("2013-05-22"), 44.00, "blabla SSS","RCUR");

header("Content-type: text/xml");
echo $lastschriften->asXML();

