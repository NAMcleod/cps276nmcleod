<?php

$path = "index.php?page=login";


$nav="";

$adminNav=<<<HTML
    <nav>
            <a href="index.php?page=welcome">Welcome</a>  &emsp; 
            <a href="index.php?page=addContact">Add Contact </a> &emsp;
            <a href="index.php?page=deleteContacts">Delete contact(s)  </a> &emsp;
            <a href="index.php?page=addAdmin">Add Admin </a> &emsp;        <!-- only available to admin users -->
            <a href="index.php?page=deleteAdmin">Delete Admin </a> &emsp;   <!-- only available to admin users -->
            <a href="index.php?page=logout">Logout</a>
    </nav>
HTML;

$staffNav=<<<HTML
    <nav>
            <a href="index.php?page=welcome">Welcome</a>  &emsp; 
            <a href="index.php?page=addContact">Add Contact </a> &emsp;
            <a href="index.php?page=deleteContacts">Delete contact(s)  </a> &emsp;
            <a href="index.php?page=logout">Logout</a>
    </nav>
HTML;

function security()
{
    global $nav, $adminNav, $staffNav;
    session_start();
    if($_SESSION['access'] != 'granted')
    {
        header('location: index.php?=logout.php');
        exit;
    }
    else if($_SESSION['status'] == 'staff')
    {
        $nav = $staffNav;
    }
    else if($_SESSION['status'] == 'admin')
    {
        $nav = $adminNav;
    }
}

function admin()
{
    if($_SESSION['status'] != 'admin')
    {
        header('location: index.php?=logout.php');
        exit;
    }
}

if(isset($_GET)){
    if($_GET['page'] === "addContact"){
        security();
        require_once('pages/addContact.php');
        $result = init();
    }
    
    else if($_GET['page'] === "deleteContacts"){
        security();
        require_once('pages/deleteContacts.php');
        $result = init();
    }

    else if($_GET['page'] === "welcome"){
        security();
        require_once('pages/welcome.php');
        $result = init();

    }

    else if($_GET['page'] === "addAdmin"){
        security();
        admin();
        require_once('pages/addAdmin.php');
        $result = init();
    }

    else if($_GET['page'] === "deleteAdmin"){
        security();
        admin();
        require_once('pages/deleteAdmin.php');
        $result = init();
    }

    else if($_GET['page'] === "login"){
        require_once('pages/login.php');
        $result = init(); 
    }

    else if($_GET['page'] === "logout"){
        require_once('logout.php');
        $result = init(); 
    }

    else {
        //header('Location: http://russet.php?page=form');
        header('location: '.$path);
    }
}

else {
    //header('Location: http://198.199.80.235/cps276/cps276_assignments/assignment10_final_project/solution/index.php?page=form');
    header('location: '.$path);
}



?>