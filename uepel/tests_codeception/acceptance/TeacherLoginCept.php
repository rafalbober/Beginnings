<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('check Teacher Login page');

$I->amOnPage("/teachers/home");
$I->seeCurrentUrlEquals("/teacher/login");
$I->seeLink("Üpel","/");

$I->wantTo("use homepage link");
$I->click("Üpel");
$I->seeCurrentUrlEquals("/");
