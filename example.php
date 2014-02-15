<?php

require_once "lib.sepalastschrift.php";

$datum = new DateTime("now + 14 days");
$lastschriften = new SEPALastschrift($datum, /* msgid */ "randomid",
                                         /* initiator */ "Example Org (user)",
                                     /* account owner */ "FeM e.V.",
                                      /* account IBAN */ "DE123IBAN",
                                       /* account BIC */ "BICEXAMPLE0",
                                       /* creditor ID */ "DE123456",
                                                         "EUR");

$lastschriften->addLastschrift( /* id */ "randomtxid",
                              /* iban */ "DE456IBAN",
                               /* bic */ "BICEXAMPLE1",
                     /* account owner */ "Test Me",
                           /* mandate */ "Mandate-Id123",
              /* mandate signing date */ new DateTime("2013-05-23"),
                            /* amount */ 42.00,
                           /* subject */ "blabla SSS",
                              /* type */  "FRST");
$lastschriften->addLastschrift("randomtxid2", "DE789IBAN", "BICEXAMPLE2", "Test Me2", "Mandate-Id122", new DateTime("2013-05-22"), 44.00, "blabla SSS","RCUR");
$lastschriften->addLastschrift("randomtxid3", "DE012IBAN", "BICEXAMPLE3", "Test Me3", "Mandate-Id123", new DateTime("2013-05-22"), 44.00, "blabla SSS","RCUR");

# enable self-test: optional
global $sepaLastschriftXMLVersion; # 008.002.02
global $sepaLastschriftXSD; # ../media/
$sepaLastschriftXSD = dirname(__FILE__);
function add_message($msg, $class="hinweis") {
  echo $msg."\n";
}

# output
header("Content-type: text/xml");
echo $lastschriften->asXML();

