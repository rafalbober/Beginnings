<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('see all links');

$I->amOnPage('/student/home');
$I->fillField('email', 'hehe@xd.pl');
$I->fillField('password', 'hehe');
$I->click('#login_button');
$I->see("Student Panel");

$I->seeLink("Student Home", "/student/home");
$I->seeLink("About me", "/student/index/1");
$I->seeLink("My Subjects", "/student/my_subjects");
$I->seeLink("Available Subjects", "/student/subjects_show");

$I->wantTo("use all links on Student Panel page");
$I->click("About me");
$I->seeCurrentUrlEquals("/student/index/1");

$I->click("Student Home");

$I->click("My Subjects");
$I->seeCurrentUrlEquals("/student/my_subjects");

$I->click("Student Home");

$I->click("Available Subjects");
$I->seeCurrentUrlEquals("/student/subjects_show");

$I->click("Student Home");

$I->wantTo("Logout");
$I->click("Rafał");
$I->click("Logout");
$I->seeCurrentUrlEquals("/student/login");

