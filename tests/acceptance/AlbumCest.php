<?php

namespace AcceptanceTests;

use AcceptanceTests\DataProvider\MusicProvider;

class AlbumCest
{
    private $testingDelete = false;

    protected function login(\AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->fillField('_username', 'admin');
        $I->fillField('_password', 'admin');
        $I->click("//button[@type='submit']");
    }

    /**
     * @before login
     */
    public function testList(\AcceptanceTester $I)
    {
        $I->wantTo('Test that list albums is displayed correctly');

        $I->amOnPage('/admin/album');
        $I->see('List of Albums', 'h1');
    }

    /**
     * @before login
     */
    public function testAdd(\AcceptanceTester $I, MusicProvider $dataProvider = null)
    {
        $I->wantTo('Test store new album');

        $I->amOnPage('/admin/album');
        $I->click('Add Album');

        if (!$this->testingDelete) {
            $album = $dataProvider->getAlbumData();
        } else {
            $album = ['a a a', 'aaaa', 2000]; // I want to have this as first
        }

        $I->fillField('album[title]', $album[0]);
        $I->fillField('album[genre]', $album[1]);
        $I->fillField('album[year]', $album[2]);
        $I->click('//input[@type="submit"]');
        $I->see('List of Albums', 'h1');
        $I->see('New album was created', '.alert-success');
    }

    /**
     * @before login
     */
    public function testDelete(\AcceptanceTester $I)
    {
        $I->wantTo('Test delete of previously artist is working');
        $this->testingDelete = true;
        $this->testAdd($I);

        $I->amOnPage('/admin/album');
        $I->click('//table//div[@class="btn-group"][1]//a[normalize-space(text())="Delete"]');
        $I->see('Do you really want to remove album');
        $I->see('Yes', 'button');
        $I->see('to listing', 'button');
        $I->click("//button[contains(@class, 'btn-danger')]");
        $I->see('was deleted');
    }
}