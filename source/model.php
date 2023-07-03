<?php 

    session_start();
    include "config.php";

    $method = $_POST['method'];
    if(function_exists($method)){
        call_user_func($method);
    }
    else{
        echo 'Function not exists';
    }

    function registerUser(){
        global $con;
        $username = $_POST['username'];
        $email = $_POST['email'];
        $id = $_POST['id'];
        $password = md5($_POST['password']);
        $datea = date('Y-m-d');
        $dateu = date('Y-m-d');

        $query = $con->prepare("INSERT INTO `tbluser`(`username`, `email`, `id`, `password`, `status`, `role`, `dateCreated`, `dateUpdate`) VALUES (?,?,?,?,'1','1',?,?)");
        $query->bind_param('ssisss', $username, $email, $id, $password, $datea, $dateu); 
        $query->execute();
        $result = $query->get_result();
        if(!$result){
            $query->close();
            $con->close();
            echo 'registered';
        }else{
            $query->close();
            $con->close();
            echo 'notRegistered';
        }
    }

    function loginUser(){
        global $con;

        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $query = $con->prepare("SELECT * FROM `tbluser` WHERE `username` = ? AND `password` = ?");
        $query->bind_param('ss', $username, $password);
        $query->execute();
        $result = $query->get_result();
        $data = '';
        while($row = $result->fetch_array()){
            $_SESSION['userid'] = $row['userid'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = $row['role'];
            $data = 1;
        }

        echo $data;
    }

    function timein(){
        global $con;

        $userId = $_SESSION['userid'];
        $datea = date('Y-m-d');
        $dateu = date('h:m:s');

        $query = $con->prepare("INSERT INTO `tblAttendance`(`userId`, `statusId`, `dateCreated`, `timeCreate`) VALUES (?,'1',?,?)");
        $query->bind_param('iss', $userId, $datea, $dateu);
        $query->execute();
        $result = $query->get_result();
        
        if(!$result){
            $query->close();
            $con->close();
            echo '200';
        }else{
            $query->close();
            $con->close();
            echo '404';
        }
    }
    
    function timeout(){
        global $con;

        $userId = $_SESSION['userid'];
        $datea = date('Y-m-d');
        $dateu = date('h:m:s');

        $query = $con->prepare("INSERT INTO `tblAttendance`(`userId` , `statusId`, `dateCreated`, `timeCreate`) VALUES (?,'2',?,?)");
        $query->bind_param('iss', $userId, $datea, $dateu);
        $query->execute();
        $result = $query->get_result();
        
        if(!$result){
            $query->close();
            $con->close();
            echo '200';
        }else{
            $query->close();
            $con->close();
            echo '404';
        }
    }
    
    function getAttendance(){
        global $con;

        $userid = $_SESSION['userid'];

        $query = $con->prepare("SELECT * FROM `tblattendance` WHERE `userid` = ?");
        $query->bind_param('i',$userid);
        $query->execute();
        $result = $query->get_result();
        $data = array();
        while($row = $result->fetch_array())
        {
            $data[] = $row;
        }
        echo json_encode($data);
    }
    
    function deleteUser(){
        global $con;

        $userid = $_POST['userid'];

        $query = $con->prepare("DELETE FROM `tblattendance` WHERE `attenId` = ?");
        $query->bind_param('i',$userid);
        $query->execute();
        $result = $query->get_result();

        if(!$result){
            $query->close();
            $con->close();
            echo '200';
        }else{
            $query->close();
            $con->close();
            echo '404';
        }
    }
    
    function getAllAttendance(){
        global $con;

        $query = $con->prepare("SELECT us.username, us.email, us.id, us.role, us.dateCreated, att.`attenId`, att.`userid`, att.`dateCreated`, att.`timeCreate`, st.statusName FROM `tblattendance` att INNER JOIN `tbluser` us INNER JOIN `tblstatus` st ON att.userid = us.userid AND att.statusid = st.statusId");
        $query->execute();
        $result = $query->get_result();
        $data = array();
        while($row = $result->fetch_array())
        {
            $data[] = $row;
        }
        echo json_encode($data);
    }

    function getStatus(){
        global $con;
        $query = $con->prepare("SELECT count(*) as count, case when status = 1 then 'user' when status = 2 then 'admin' end as 'statusRole' from `tbluser` order by status;");
        $query->execute();
        $result = $query->get_result();
        $data = array();
        while($row = $result->fetch_array())
        {
            $data[] = $row;
        }
        echo json_encode($data);
    }

?>