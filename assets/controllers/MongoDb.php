<?php
require_once('/var/www/html/vendor/autoload.php');

class MongoDb
{
    private $client;
    private $database;

    public function __construct()
    {
        $this->client = new MongoDB\Client("mongodb://admin:password@mongodb:27017");
        $this->database = $this->client->selectDatabase('ecoride_mongo');
    }

    public function insertVoiture($data)
    {
        $collection = $this->database->selectCollection('voitures');
        $result = $collection->insertOne($data);
        return $result->getInsertedCount();
    }

    public function getVoitures()
    {
        $collection = $this->database->selectCollection('voitures');
        $cursor = $collection->find();
        return $cursor->toArray();
    }
}