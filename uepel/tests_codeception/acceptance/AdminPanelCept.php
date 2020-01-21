<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('see all links');

$I->amOnPage('/admin');
$I->fillField('email', 'admin@ggios.pl');
$I->fillField('password', 'admin');
$I->click('#login_button');
$I->see("Admin Panel");

$I->seeLink("Deanery Home", "/admin");
$I->seeLink("Students", "/deaneries/student_index");
$I->seeLink("Teachers", "/deaneries/teacher_index");

$I->wantTo("use all links on Admin Panel page");
$I->click("Students");
$I->see("Students");
$I->seeCurrentUrlEquals("/deaneries/student_index");

$I->click("Deanery Home");

$I->click("Teachers");
$I->see("Teachers");
$I->seeCurrentUrlEquals("/deaneries/teacher_index");

$I->click("Deanery Home");

$I->wantTo("Logout");
$I->seeCurrentUrlEquals("/admin");
$I->click("admin");
$I->click("Logout");
$I->seeCurrentUrlEquals("/admin/login");

