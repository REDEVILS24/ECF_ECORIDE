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
    public function getVoituresByUser($proprietaire_id)
    {
        $collection = $this->database->selectCollection('voitures');
        $cursor = $collection->find(
            ['proprietaire_id' => $proprietaire_id],
            ['limit' => 3]  // 
        );
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
    public function insertAvis($data)
    {
        $collection = $this->database->selectCollection('avis');
        $result = $collection->insertOne($data);
        return $result->getInsertedCount();
    }

    public function getAvis()
    {
        $collection = $this->database->selectCollection('avis');
        $cursor = $collection->find();
        return $cursor->toArray();
    }
    public function updateAvis($id, $data)
    {
        $collection = $this->database->selectCollection('avis');
        $result = $collection->updateOne(['_id' => new MongoDB\BSON\ObjectId($id)], ['$set' => $data]);
        return $result->getModifiedCount();
    }

    public function deleteAvis($id)
    {
        $collection = $this->database->selectCollection('avis');
        $result = $collection->deleteOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
        return $result->getDeletedCount();
    }

    public function insertPreference($data)
    {
        $collection = $this->database->selectCollection('preferences');
        $utilisateur_id = $data['utilisateur_id'];
        $existing = $collection->findOne(['utilisateur_id' => $utilisateur_id]);

        if ($existing) {
            // UPDATE : Remplacer les préférences existantes
            $result = $collection->replaceOne(
                ['utilisateur_id' => $utilisateur_id],
                $data
            );
            return $result->getModifiedCount();
        } else {
            $result = $collection->insertOne($data);
            return $result->getInsertedCount();
        }
    }

    public function getPreferences()
    {
        $collection = $this->database->selectCollection('preferences');
        $cursor = $collection->find();
        return $cursor->toArray();
    }
    public function updatePreference($id, $data)
    {
        $collection = $this->database->selectCollection('preferences');
        $result = $collection->updateOne(['_id' => new MongoDB\BSON\ObjectId($id)], ['$set' => $data]);
        return $result->getModifiedCount();
    }

    public function deletePreference($id)
    {
        $collection = $this->database->selectCollection('preferences');
        $result = $collection->deleteOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
        return $result->getDeletedCount();
    }

}