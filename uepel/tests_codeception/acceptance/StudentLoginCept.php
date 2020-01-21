<?php
$I = new AcceptanceTester($scenario);
$I->wantTo("see Üpel link");

$I->amOnPage("/student/home");
$I->seeCurrentUrlEquals("/student/login");
$I->seeLink("Üpel","/");
$I->see("Login Student");

$I->wantTo("use homepage link");
$I->click("Üpel");
$I->seeCurrentUrlEquals("/");

$I->wantTo('login with existing user');

$I->amOnPage('/student/home');

$I->seeCurrentUrlEquals('/student/login');

$I->fillField('email', 'hehe@xd.pl');
$I->fillField('password', 'hehe');

$I->click('#login_button');

$I->seeCurrentUrlEquals('/student/home');

$I->see("Student Panel");
