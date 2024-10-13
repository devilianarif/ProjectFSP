<?php
    require_once('..\Class\member.php');
    $member = new member();
    session_start();

    $username = $_POST['username']; 
    $password = $_POST['password'];

    if(isset($username) && isset($password)){
        $loggedID = $member->login($username, $password);
        if(isset($loggedID)){
            $_SESSION['userid'] = $loggedID;
            $res = $member->getMember(null,null,null,$loggedID);
            $loggedUser = $res->fetch_assoc();

            if($loggedUser["profile"]=="admin"){
                $urlAsal = '..\admin\index.php';
            } else if( $loggedUser["profile"]=="member"){
                $urlAsal = '..\member\index.php';
            }else{
                $urlAsal = '..\loginui.php';
            }
            header("location: " . $urlAsal);
        } else{
            header("location:..\loginui.php?error=1"); //WRONG INFO
        }
    } else{
        header("location: ..\loginui.php?error=2"); //POST EMPTY
    }

    /*  //SINCE LAST URL IS LOGIN, STUCK IN ENDLESS LOGIN LOOP
        $urlAsal = isset($_POST['urlAsal']) ? $_POST['urlAsal'] : '..\admin\adminMain.php';
    */
?>
