<?php
class ArtistCest
{
    public function testList(AcceptanceTester $I)
    {
        $I->wantTo('Test that list artists is displayed correctly');

        $I->amOnPage('/admin/artists');
        $I->see('List of Artists');
    }

    public function testAdd(AcceptanceTester $I)
    {
        $I->wantTo('Test that page for add artist display form');

        $I->amOnPage('/admin/artist/add');
        $I->see('List of Artists');
    }
}