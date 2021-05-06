<?php
require_once('Database.php');
class question {

    private $database;
    public function __construct(){
        $this->database = new Database();
    }

    public function create($data){
        $this->database->query('INSERT INTO questionnaires (title)VALUES (:title)');

        $this->database->bind(':title', $data['title']);

        if($this->database->execute()){
            $questionnairesId = $this->database->id();

            for($i = 0; $i < count($data['questions']); $i++){
                $this->database->query('INSERT INTO questions (questionnaireId, content, type)VALUES (:questionnaireId, :content, :type)');
                $this->database->bind(':questionnaireId', $questionnairesId);
                $this->database->bind(':content', $data['questions'][$i]);
                $this->database->bind(':type', $data['type'][$i]);
                $this->database->execute();
            }
            return true;
        }
        else{
            return false;
        }
    }

    public function fetchAll(){
        $this->database->query('SELECT * FROM questionnaires');
        $results = $this->database->fetchAll();

        foreach ($results as $result){
            $this->database->query('SELECT * FROM questions WHERE questionnaireId = :id');
            $this->database->bind(':id', $result['id']);
            $question_result = $this->database->fetchAll();
            array_push($result, [
                'questions' => $question_result
            ]);
            dd($result);
        }

        dd($results[0]['questions']);
        return $results;
    }
}