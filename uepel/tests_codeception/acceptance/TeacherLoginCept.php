<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('check Teacher Login page');

$I->amOnPage("/teachers/home");
$I->seeCurrentUrlEquals("/teacher/login");
$I->seeLink("Üpel","/");

$I->wantTo("use homepage link");
$I->click("Üpel");
$I->seeCurrentUrlEquals("/");

$I->wantTo('login with existing user');

$I->amOnPage('/teachers/home');

$I->seeCurrentUrlEquals('/teacher/login');

$I->fillField('email', 'siwy@ggios.pl');
$I->fillField('password', 'hahaha');

$I->click('#login_button');

$I->seeCurrentUrlEquals('/teachers/home');

$I->see("Üpel Teacher");

