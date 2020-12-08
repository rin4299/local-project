<?php
include_once('constant.php');

class Questions
{
    private $connection;

    private function connect()
    {
        $this->connection = new mysqli(dbIP, 'root', dbPwd, dbName);
    }

    public function addQuestion($session, $post)
    {
        $this->connect();
        $QID = $post['q-id'];
        $content = $post['content'];
        $a = $post['answer-1'];
        $b = $post['answer-2'];
        $c = $post['answer-3'];
        $d = $post['answer-4'];
        $correct = $post['correctAnswer'];
        $diff = $post['difficulty'];
        $subject = $post['subject'];
        $creator = $session['username'];

        $sql_cmd = "INSERT INTO questions VALUES ('$QID', '$content', '$a', '$b', '$c', '$d', '$correct', '$diff', '$subject', '$creator');";
        // $result = $this->connection->query($sql_cmd);
        if ($this->connection->query($sql_cmd) !== TRUE) {
            // echo $this->connection->error;
            // echo '<script type="text/javascript">
            //     alert("Can\'t add new question!");
            //     window.location = "http://' . $_SERVER['SERVER_NAME'] . '/TestMaker/add-question";
            // </script>';
            echo $this->connection->error;
            return;
        }

        // ! Redirect to other page
        $url = 'http://' . $_SERVER['SERVER_NAME'] . '/TestMaker/questions';
        header("Location: $url");

        // close connection
        $this->connection->close();
    }

    public function getQuestion($get) {
        $this->connect();
        $qid = $get["id"];
        $sql_cmd = "SELECT * FROM questions WHERE id = $qid;";
        $result = $this->_connect->query($sql_cmd);

        if ($result->num_rows == 0) {
            echo '<script type="text/javascript">
                alert("Can\'t get new question!");
                window.location = "http://' . $_SERVER['SERVER_NAME'] . '/TestMaker/add-question";
            </script>';
            return;
        } else {
            $this->connection->close();
            return $result->fetch_assoc();
        }
    }

    // function editQuestion()
    public function editQuestion($session, $get)
    {
        $this->connect();
        $qid = $get['id'];
        $content = $get['content'];
        $a = $get['A'];
        $b = $get['B'];
        $c = $get['C'];
        $d = $get['D'];
        $correct = $get['correct'];
        $diff = $get['difficulty'];
        $subject = $get['subject'];

        $sql_cmd = "UPDATE questions SET content = $content, A = $a, B = $b, C = $c, D = $d, 
        correct = $correct, difficulty = $diff, subject = $subject WHERE id = $qid";

        if ($this->connection->query($sql_cmd) !== TRUE) {
            echo '<script type="text/javascript">
                alert("Can\'t edit new question!");
                window.location = "http://' . $_SERVER['SERVER_NAME'] . '/TestMaker/add-question";
            </script>';
            return;
        }

        // ! Redirect to other page
        $url = 'http://' . $_SERVER['SERVER_NAME'] . '/TestMaker/questions';
        header("Location: $url");
        $this->connection->close();
    }
}
?>