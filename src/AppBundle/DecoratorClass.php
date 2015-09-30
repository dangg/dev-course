<?php

/**
 * Class DecoratorClass
 * @package AppBundle
 */
class Movie
{
    protected $title;

    protected $director;

    protected $mainActor;

    public function __construct($title, $director, $mainActor)
    {
        $this->title = $title;
        $this->director = $director;
        $this->mainActor = $mainActor;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getDirector()
    {
        return $this->director;
    }

    /**
     * @return mixed
     */
    public function getMainActor()
    {
        return $this->mainActor;
    }

}

abstract class BaseDecorator
{

    protected $movie;

    public function __construct($movie)
    {
        $this->movie = $movie;
    }

}

class PosterMovieDecorator extends BaseDecorator
{
    public function showTitle()
    {
        return $this->movie->getTitle();
    }
}

class TrailerMovieDecorator extends BaseDecorator
{
    public function showTitle()
    {
        return strtoupper($this->movie->getTitle());
    }
}

$movie = new Movie('Titanic', 'Regizor', 'Leo');

$posterDisplay = new PosterMovieDecorator($movie);
$trailerDisplay = new TrailerMovieDecorator($movie);

echo $posterDisplay->showTitle(); // Titanic
echo $trailerDisplay->showTitle(); // TITANIC

