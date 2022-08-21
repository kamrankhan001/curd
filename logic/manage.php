<?php

    require_once "../helper/database.php";
    require_once "../helper/validations.php";
    require_once "../config.php";
    require_once 'generatepdf.php';

    class Manage{

        public $db;
        public $validator;

        public function __construct(){
            $this->db = new Database(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
            $this->validator = new Validations(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
        }

        public function store(array $info){
            $error = $this->validator->validater($info['picture']['name'], ['required', 'file:["jpeg","png","jpg"]']);
            if($error === true){
                $error = $this->validator->validater($info['name'], ['required']);
                if($error === true){
                    $error = $this->validator->validater($info['father_name'], ['required']);
                    if($error === true){
                        $error = $this->validator->validater($info['email'], ['required', 'email']);
                        if($error === true){
                            $error = $this->validator->validater($info['date'], ['required']);
                            if($error === true){
                                $error = $this->validator->validater($info['time'], ['required']);
                                if($error === true){
                                    $error = $this->validator->validater($info['gender'], ['required']);
                                    if($error === true){
                                        $error = $this->validator->validater($info['language'], ['required']);
                                        if($error === true){
                                            $info['time'] = $this->get_time($info['time']);
                                            $info['date'] = date('m/d/Y', strtotime($info['date']));
                                            $info['picture'] = base64_encode(file_get_contents($info['picture']['tmp_name']));
                                            $info['language'] = $this->get_languages($info['language']);
                                            $this->db->insert('info', $info);
                                            return header("location: ../templates/show.php?success=Record insert successfully");
                                        }else{
                                            return header("location: ../templates/create.php?error={$error}");
                                        }
                                    }else{
                                        return header("location: ../templates/create.php?error={$error}");
                                    }
                                }else{
                                    return header("location: ../templates/create.php?error={$error}");
                                }
                            }else{
                                return header("location: ../templates/create.php?error={$error}");
                            }
                        }else{
                            return header("location: ../templates/create.php?error={$error}");
                        }
                    }else{
                        return header("location: ../templates/create.php?error={$error}");
                    }
                }else{
                    return header("location: ../templates/create.php?error={$error}");
                }
            }else{
                return header("location: ../templates/create.php?error={$error}");
            }
        }

        public function show(){
            $this->db->select('info');
            return $this->db->getResult();
        }

        public function edit($id){
            $this->db->select('info', '*', null, "id='$id'");
            return $this->db->getResult();
        }

        public function update($info, $id){
            if(!empty($info['name'])){
                $this->db->update('info', ['name'=>$info['name']], "id='$id'");
            }
            if(!empty($info['father_name'])){
                $this->db->update('info', ['father_name'=>$info['father_name']], "id='$id'");
            }
            if(!empty($info['email'])){
                $this->db->update('info', ['email'=>$info['email']], "id='$id'");
            }
            if(!empty($info['fruit'])){
                $this->db->update('info', ['fruit'=>$info['fruit']], "id='$id'");
            }
            if(!empty($info['date'])){
                $this->db->update('info', ['date'=>$info['date']], "id='$id'");
            }
            if(!empty($info['time'])){
                $this->db->update('info', ['time'=>$info['time']], "id='$id'");
            }
            if(!empty($info['gender'])){
                $this->db->update('info', ['gender'=>$info['gender']], "id='$id'");
            }
            if(!empty($info['language'])){
                $info['language'] = $this->get_languages($info['language']);
                $this->db->update('info', ['language'=>$info['language']], "id='$id'");
            }
            if(!empty($info['picture']['name'])){
                $info['picture'] = base64_encode(file_get_contents($info['picture']['tmp_name']));
                $this->db->update('info', ['picture'=>$info['picture']], "id='$id'");
            }

            header("location: ../templates/show.php");
        }

        public function delete($id){
            $this->db->delete('info', "id='$id'");
            header("location: ../templates/show.php");
        }

        public function pdf($id){

            $this->db->select('info', '*', null, "id='$id'");
            $data = $this->db->getResult();
            $pdf = new PDF();
           
            $pdf->show($data);
        }

        protected function get_time($time){
            $time = explode(":",$time);
            $hours = $time[0];
            $minutes  = $time[1];
            $meridian = '';
            if($hours > 12) {
                $meridian = 'PM';
                $hours -= 12;
            } else if ($hours < 12) {
                $meridian = 'AM';
                if ($hours == 0) {
                    $hours = 12;
                }
            } else {
                $meridian = 'PM';
            }

            $time = $hours . ':' . $minutes . ' ' . $meridian;
            return $time;
        }

        protected function get_languages($lang){
            $language = '';
            foreach ($lang as $value) {
                $language .= $value." ";
            }

            return $language;
        }

    }


    $manager = new Manage();

    if(isset($_GET['delete'])){
        $manager->delete($_GET['delete']);
    }

    if(isset($_GET['download'])){
        $manager->pdf($_GET['download']);
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        if(isset($_POST['save'])){
            $info = [
                'name' => $_POST['name'],
                'father_name' => $_POST['father_name'],
                'email' => $_POST['email'],
                'fruit' => $_POST['fruit'],
                'date' => $_POST['date'],
                'time' => $_POST['time'],
                'language' => $_POST['language'],
                'gender' => $_POST['gender'],
                'picture' => $_FILES['pic'],
            ];
            $manager->store($info);
        }

        if(isset($_POST['edit'])){
            $info = [
                'name' => $_POST['name'],
                'father_name' => $_POST['father_name'],
                'email' => $_POST['email'],
                'fruit' => $_POST['fruit'],
                'date' => $_POST['date'],
                'time' => $_POST['time'],
                'language' => $_POST['language'],
                'gender' => $_POST['gender'],
                'picture' => $_FILES['pic'],
            ];
            $manager->update($info, $_POST['id']);
        }
    }