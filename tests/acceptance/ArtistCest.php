<?php
class ArtistCest
{
    public function testList(AcceptanceTester $I)
    {
        $I->wantTo('Test that list artists is displayed correctly');

        $I->amOnPage('/admin/artist');
        $I->see('List of Artists', 'h1');
    }

    public function testAdd(AcceptanceTester $I)
    {
        $I->wantTo('Test that page for add artist display form');

        $I->amOnPage('/admin/artist/add');
        $I->see('Add new Artist', 'h1');
    }

    /*public function testDelete(AcceptanceTester $I)
    {
        $I->wantTo('Test delete of previously artist is working');

        $I->amOnPage('/admin/artist/add');
        $I->see('Add Artist');
    }*/
}