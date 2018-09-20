<?php
  require_once("AuthnetARB.class.php");

$login = '7urM47EbF'; $transkey = '383UjJnggZ4598XM'; $test = TRUE;

$arb = new AuthnetARB($login, $transkey, $test);

$arb->setParameter('interval_length', 1); $arb->setParameter('interval_unit', 'months'); $arb->setParameter('startDate', date("Y-m-d")); $arb->setParameter('totalOccurrences', 12); $arb->setParameter('trialOccurrences', 0); $arb->setParameter('trialAmount', 0.00);

$arb->setParameter('amount', 30.00); $arb->setParameter('refId', 45); $arb->setParameter('cardNumber', '5424000000000015'); $arb->setParameter('expirationDate', '2019-05');

$arb->setParameter('firstName', 'Joe'); $arb->setParameter('lastName', 'Doe'); $arb->setParameter('address', 'Casa 1872'); $arb->setParameter('city', 'nav'); $arb->setParameter('state', 'FL'); $arb->setParameter('zip', '33619'); $arb->setParameter('country', 'us');

$arb->setParameter('subscrName', 'Jitendra H Goyal'); $arb->createAccount();

echo 'isSuccessful: ' .$arb->isSuccessful() . '<br />';

if ($arb->isSuccessful()) { echo 'cool, it worked! <br />'; } else { echo 'error in payment <br />'; }

echo 'isError: ' .$arb->isError() . '<br />'; echo 'getSubscriberID: ' .$arb->getSubscriberID() . '<br />'; echo 'getResponse: ' .$arb->getResponse() . '<br />'; echo 'getResultCode:' .$arb->getResultCode() . '<br />'; echo 'getString: ' .$arb->getString() . '<br />'; echo 'getRawResponse: ' .$arb->getRawResponse() . '<br />'; ?>

