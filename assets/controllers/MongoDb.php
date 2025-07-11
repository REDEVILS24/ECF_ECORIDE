<?php
require_once('/var/www/html/vendor/autoload.php');

use MongoDB\BSON\ObjectId;

class MongoDb
{
    private $client;
    private $database;

    public function __construct()
    {
        $this->client = new MongoDB\Client("mongodb://mongodb:27017");
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
    public function updateVoitures($id, $data)
    {
        $collection = $this->database->selectCollection('voitures');
        $result = $collection->updateOne(['_id' => new MongoDB\BSON\ObjectId($id)], ['$set' => $data]);
        return $result->getModifiedCount();
    }

    public function deleteVoiture($id)
    {

        $collection = $this->database->selectCollection('voitures');
        $result = $collection->deleteOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
        return $result->getDeletedCount();
    }
}