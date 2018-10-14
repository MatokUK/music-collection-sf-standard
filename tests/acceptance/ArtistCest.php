<?php
namespace AcceptanceTests;

use AcceptanceTests\DataProvider\MusicProvider;

class ArtistCest
{
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
        $I->wantToTest('List of artists is displayed correctly');

        $I->amOnPage('/admin/artist');
        $I->see('List of Artists', 'h1');
    }

    /**
     * @before login
     */
    public function testAdd(\AcceptanceTester $I, MusicProvider $provider)
    {
        $I->wantToTest('Add Artist');

        $I->amOnPage('/admin/artist/add');
        $I->see('Add new Artist', 'h1');

        $artist = $provider->getArtistData();
        $I->fillField('artist[title]', $artist[0]);
        $I->fillField('artist[webpage]', $artist[1]);
        $I->click('//input[@type="submit"]');
        $I->see('List of Artists', 'h1');
        $I->see('New artist was created', '.alert-success');
    }

    /**
     * @before login
     */
    public function testDelete(\AcceptanceTester $I, MusicProvider $provider)
    {
        $I->wantToTest('Test delete (insert before)');

        $I->amOnPage('/admin/artist/add');

        $artist = $provider->getArtistData();

        $I->fillField('artist[title]', 'A A A'); // I want to have this as first
        $I->fillField('artist[webpage]', $artist[1]);

        $idx = 0;
        foreach($artist['albums'] as $album) {
            $I->click("//a[@id='js-add-artist-album']");
            $I->fillField("artist[albums][$idx][title]", $album[0]);
            $I->fillField("artist[albums][$idx][genre]", $album[1]);
            $I->fillField("artist[albums][$idx][year]", $album[2]);
            $idx++;
            $I->scrollTo("//a[@id='js-add-artist-album']");
            $I->wait(1);
        }

        $I->click('//input[@type="submit"]');

        $I->click('//table//div[@class="btn-group"][1]//a[normalize-space(text())="Delete"]');
        $I->see('Do you really want to remove artist');
        $I->see('Yes', 'button');
        $I->see('to listing', 'button');
        $I->click("//button[contains(@class, 'btn-danger')]");
        $I->see('was deleted');
        $I->wait(1);
    }
}