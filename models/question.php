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
        $questionnaires = [];
        foreach ($results as $result){
            $this->database->query('SELECT * FROM questions WHERE questionnaireId = :id');
            $this->database->bind(':id', $result['id']);
            $question_result = $this->database->fetchAll();
            $result['questions'] = $question_result;
            array_push($questionnaires, $result);
        }

        return $questionnaires;
    }

    public function delete($id){
        $this->database->query("DELETE FROM questionnaires WHERE id = :id");

        $this->database->bind(':id', $id);

        if($this->database->execute()){
            $this->database->query("DELETE FROM questions WHERE questionnaireId = :id");
            $this->database->bind(':id', $id);
            if($this->database->execute()) {
                return true;
            }
        }
        return false;
    }

    public function fetchOne($id){
        $this->database->query("SELECT * FROM questionnaires WHERE id = :id");

        $this->database->bind(':id', $id);

        $result = $this->database->fetch();

        $this->database->query('SELECT * FROM questions WHERE questionnaireId = :id');
        $this->database->bind(':id', $result['id']);
        $question_result = $this->database->fetchAll();
        $result['questions'] = $question_result;

        return $result;
    }

    public function update($id, $data){
        $this->database->query('UPDATE questionnaires SET title = :title WHERE id = :id');

        $this->database->bind(':id', $id);
        $this->database->bind(':title', $data['title']);

        if($this->database->execute()) {
            $this->database->query("DELETE FROM questions WHERE questionnaireId = :id");
            $this->database->bind(':id', $id);
            if ($this->database->execute()) {
                for($i = 0; $i < count($data['questions']); $i++){
                    $this->database->query('INSERT INTO questions (questionnaireId, content, type)VALUES (:questionnaireId, :content, :type)');
                    $this->database->bind(':questionnaireId', $id);
                    $this->database->bind(':content', $data['questions'][$i]);
                    $this->database->bind(':type', $data['type'][$i]);
                    $this->database->execute();
                }
                return true;
            }
        }
        return false;
    }
}