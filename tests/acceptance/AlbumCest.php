<?php
class AlbumCest
{
    public function testList(AcceptanceTester $I)
    {
        $I->wantTo('Test that list albums is displayed correctly');

        $I->amOnPage('/admin/album');
        $I->see('List of Albums', 'h1');
    }

    /*public function testAdd(AcceptanceTester $I)
    {
        $I->wantTo('Test that page for add artist display form');

        $I->amOnPage('/admin/artist/add');
        $I->see('Add new Artist', 'h1');
    }*/

    /*public function testDelete(AcceptanceTester $I)
    {
        $I->wantTo('Test delete of previously artist is working');

        $I->amOnPage('/admin/artist/add');
        $I->see('Add Artist');
    }*/
}