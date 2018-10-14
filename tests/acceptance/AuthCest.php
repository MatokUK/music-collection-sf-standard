<?php
namespace AcceptanceTests;

class AuthCest
{
    public function testLoginWithInvalidCredential(\AcceptanceTester $I)
    {
        $I->wantToTest('I cannot login with random username/password');

        $I->amOnPage('/');
        $I->fillField('_username', 'abc');
        $I->fillField('_password', '123');
        $I->click("//button[@type='submit']");
        $I->see('Invalid credentials');
    }

    public function testValidLogin(\AcceptanceTester $I)
    {
        $I->wantToTest('Login and Logout');

        $I->amOnPage('/');
        $I->fillField('_username', 'music');
        $I->fillField('_password', 'music');
        $I->click("//button[@type='submit']");

        $I->seeInCurrentUrl('/admin/artist');
        $I->see('Logout', 'a');
    }
}