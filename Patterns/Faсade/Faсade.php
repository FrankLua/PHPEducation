<?php
/* 
Фасад (Facade) - это паттерн проектирования, который позволяет скрыть сложность системы и предоставить более простой интерфейс для взаимодействия с ней.
структурный шаблон проектировани

Проблема:
Допустим, у нас есть CMS, и с каждым новым постом мы хотим писать об этом в твиттере.

Сначала мы будем использовать библиотеку dg / twitter-php для отправки твитов. в README говорится, что следующий код должен публиковать твит

use DG\Twitter\Twitter;

$twitter = new Twitter($consumerKey, $consumerSecret, $accessToken, $accessTokenSecret);

$twitter->send('I am fine today.');

При отправки каждого сообщения нам необходимо вставлять параметры, что бы испрправить это мы можем приминить "фасад"
Запишим секретные переменные в конфигурационный файл 

'twitter' => [
    'api_key' => env('TWITTER_API_KEY'),
    'api_secret' => env('TWITTER_API_SECRET'),
    'api_token' => env('TWITTER_Access_TOKEN'),
    'api_token_secret' => env('TWITTER_Access_TOKEN_SECRET'),
],

class TwitterFacade 
{
  public static function get()
  {
      $config = config('services.twitter');
      return new Twitter($config['api_key'], $config['api_secret'], $config['api_token'], $config['api_token_secret']);
  }
}

и теперь всякий раз, когда мы хотим отправлять твиты, мы просто пишем одну-единственную строку

TwitterFacade::get()->send('Test tweet from a facade class');


Ещё один пример 
Класс компьютер достаточно сложный но мы можем сделать для него фасад что позволит нам легче с ним взаимодействовать
class Computer

Фасад не может трогать логику, он только использует методы классов!

*/
class Computer
{
    public function getElectricShock()
    {
        echo "Ouch!";
    }

    public function makeSound()
    {
        echo "Beep beep!";
    }

    public function showLoadingScreen()
    {
        echo "Loading..";
    }

    public function bam()
    {
        echo "Ready to be used!";
    }

    public function closeEverything()
    {
        echo "Bup bup bup buzzzz!";
    }

    public function sooth()
    {
        echo "Zzzzz";
    }

    public function pullCurrent()
    {
        echo "Haaah!";
    }
}
class ComputerFacade
{
    protected $computer;

    public function __construct(Computer $computer)
    {
        $this->computer = $computer;
    }

    public function turnOn()
    {
        $this->computer->getElectricShock();
        $this->computer->makeSound();
        $this->computer->showLoadingScreen();
        $this->computer->bam();
    }

    public function turnOff()
    {
        $this->computer->closeEverything();
        $this->computer->pullCurrent();
        $this->computer->sooth();
    }
}

$computer = new ComputerFacade(new Computer());
$computer->turnOn(); // Ouch! Beep beep! Loading.. Ready to be used!
$computer->turnOff(); // Bup bup buzzz! Haah! Zzzzz