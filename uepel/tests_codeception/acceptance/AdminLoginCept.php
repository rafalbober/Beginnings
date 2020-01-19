<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('check Admin Login page');

$I->amOnPage("/admin");
$I->seeCurrentUrlEquals("/admin/login");
$I->seeLink("Üpel","/");

$I->wantTo("use homepage link");
$I->click("Üpel");
$I->seeCurrentUrlEquals("/");


