<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('check Student Login page');

$I->amOnPage("/student/home");
$I->seeCurrentUrlEquals("/student/login");
$I->seeLink("Üpel","/");

$I->wantTo("use homepage link");
$I->click("Üpel");
$I->seeCurrentUrlEquals("/");
