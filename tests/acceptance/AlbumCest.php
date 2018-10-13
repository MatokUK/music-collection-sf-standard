<?php
class AlbumCest
{
    public function testList(AcceptanceTester $I)
    {
        $I->wantTo('Test that list albums is displayed correctly');

        $I->amOnPage('/admin/album');
        $I->see('List of Albums', 'h1');
    }

   public function testAdd(AcceptanceTester $I)
    {
        $I->wantTo('Test that page for add artist display form');

        $I->amOnPage('/admin/album');
        $I->click('Add Album');

        $album = $this->getAlbumData();

        $I->fillField('album[title]', $album[0]);
        $I->fillField('album[genre]', $album[1]);
        $I->fillField('album[year]', $album[2]);
        $I->click('//input[@type="submit"]');
        $I->see('List of Albums', 'h1');
    }

    /*public function testDelete(AcceptanceTester $I)
    {
        $I->wantTo('Test delete of previously artist is working');

        $I->amOnPage('/admin/artist/add');
        $I->see('Add Artist');
    }*/

    private function getAlbumData()
    {
        $albums = [
            ['Queen', 'rock', 1973],
            ['Queen II', 'rock', 1973],
            ['A Night at the Opera', 'rock', 1975],
            ['Under The Blade', 'rock', 1982],
            ['Stay Hungry', 'rock', 1984],
            ['A Twisted Christmas', 'rock', 2006],
            ['A Girl Like Me', 'pop', 2006],
            ['Good Girl Gone Bad', 'pop', 2006],
            ['Rated R', 'pop', 2009],
            ['Teenage Dream', 'pop', 2010],
            ['Prism', 'pop', 2013],
        ];

        return $albums[rand(0, count($albums)-1)];
    }
}