<?php
require './SerializeInterface/SerializeInterface.php';
require './Libraris/JsonV2.php';
require './Adapter/Adapter.php';
require './Libraris/Json.php';



class App
{
    public SerializeInterface $serializeLibrary;

    function __construct($serializeLibrary)
    {
        $this->serializeLibrary = $serializeLibrary;
    }

}


function ClientCode(App $app)
{
    $resultOne = $app->serializeLibrary->toJson('1234');
    $resultTwo = $app->serializeLibrary->fromJson('1234');
}

$app = new App(new Adapter(new JsonSerializeV2()));
ClientCode($app);