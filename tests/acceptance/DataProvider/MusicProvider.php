<?php

namespace AcceptanceTests\DataProvider;

class MusicProvider
{
    private $data;

    public function __construct()
    {
        $this->data = [
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
    }

    public function getAlbumData()
    {
        return $this->data[rand(0, count($this->data)-1)];
    }
}