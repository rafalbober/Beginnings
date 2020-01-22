<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('See title and homepage link');

$I->amOnPage("/faq");
$I->see("Faq");
$I->seeLink("Üpel", "/");

$I->wantTo("use homepage link");
$I->click("Üpel");
$I->seeCurrentUrlEquals("/");


