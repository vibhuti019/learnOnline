<?php 

    if($_SERVER['SCRIPT_NAME'] != "/index.php"){
        die('FALSE');
    }


    function adminHome(){
        
        $htmlResponse = "

        <!DOCTYPE html>
        <html lang=\"en\">
        <head>
            <meta charset=\"UTF-8\">
            <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
            <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
            <title>Document</title>
        
            <style>
                body {
        font-family: 'Open Sans', sans-serif;
        minwidth: 100%;
        height: 100%;
        margin: 0 auto;
        background: #f2f2f2;
        }
        .admin-sidebar {
        background: #1a1a1a;
        width: 175px;
        height: 100%;
        position: fixed;
        z-index: -1;
        overflow-x: hidden;
        padding-top: 20px;
        z-index: 1000;
        top:30px;
        text-align: right;
        }
        .admin-header {
        background: #1a1a1a;
        padding: 15px 16px 15px 0px;
        height: 20px;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 2000;
        }
        .header-greet {
        display: inline-block;
        float: right;
        }
        h3 {
        margin: 0;
        display: inline-block;
        color: #fff;
        }
        .header-text {
        color: #fff;
        padding-left: 16px;
        }
        .logout-btn {
        padding: 18px 16px;
        color: #fff;
        background: #4444;
        box-shadow: 0px 0px 4px rgba(0,0,0) inset;
        }
        li {
        list-style-type: none;
        padding: 15px;
        border-bottom: 0.5px solid black;
        cursor: pointer;
        }
        li:hover {
        list-style-type: none;
        padding: 15px;
        background: #151515;
        border-bottom: 0.5px solid black;
        box-shadow: 0px 0px 4px rgba(0,0,0) inset;
        }
        .submenu{
        background: #1c1c1c;
        }
        .submenutext{
        margin-right: 25px;
        }
        a {
        text-decoration: none;
        color: #fff;
        }
        .search-input {
        padding: 8px;
        border: 1px solid black;
        border-radius: 4px 0px 0px 4px;
        background: #222;
        color: #fff;
        outline: none;
        box-shadow: 0px 0px 3px rgba(0,0,0) inset;
        }
        #search-btn-1 {
        position: absolute;
        padding: 7.5px;
        border: 1px solid black;
        border-radius: 0px 4px 4px 0px;
        background: #222;
        color: #fff;
        outline: none;
        box-shadow: 0px 0px 3px rgba(0,0,0) inset;
        }
        .fa-angle-down {
        color: #fff;
        float: right;
        }
        .second-nav-ul {
        display: none;
        }
        .nav-items {
        padding: 0;
        margin: 0;
        float: left;
        }
        .nav-items:hover {
        padding: 0;
        margin: 0;
        width: auto;
        }
        .center-content {
        width: auto;
        padding-left: 175px;
        z-index: -1000;
        padding-top: 30px;
        margin: 20px;
        }
        /*DASHBOARD CONTENT ENDING*/
        .all-border {
        border: 1px solid trans;
        width: auto;
        }
        .shows-location {
        border: 1px solid transparent;
        width: auto;
        height: 50px;
        margin: 1em;
        border-radius: 5px;
        background: rgba(0, 0, 0, 0.9);
        color: white;
        }
        .location {
        font-size: 12px;
        display: inline-block;
        margin: 0;
        vertical-align: middle;
        padding: 20px 30px;
        }
        .location-text {
        display: inline-block;
        margin: 0;
        }
        a {
        color: #fff;
        text-decoration: none;
        font-size: 12px;
        }
        div.panel {
        display: none;
        }
        div.panel.show {
        display: block !important;
        }
        @media screen and (max-width: 640px) {
        .admin-sidebar {
        width: 100%;
        height: 100%;
        position: relative;
        top:0px;
        text-align: center;
        }
        .admin-header {
        background: #101010;
        position: relative;
        padding: 15px 0px;
        }
        .center-content {
        width: 100%;
        padding: 0px;
        margin: 0px;
        }
        .all-border {
        border: 0px;
        width: 100%;
        padding: 5px;
        box-sizing:border-box;
        -moz-box-sizing:border-box;
        -webkit-box-sizing:border-box;
        -ms-box-sizing:border-box;
        }
        }
        
            </style>
        
            <script>
                window.onload=function(){
        var acc = document.getElementsByClassName(\"accordion\");
        var panel = document.getElementsByClassName('panel');
        for (var i = 0; i < acc.length; i++) {
        acc[i].onclick = function() {
        var setClasses = !this.classList.contains('active');
        setClass(acc, 'active', 'remove');
        setClass(panel, 'show', 'remove');
        if (setClasses) {
        this.classList.toggle(\"active\");
        this.nextElementSibling.classList.toggle(\"show\");
        }
        }
        }
        function setClass(els, className, fnName) {
        for (var i = 0; i < els.length; i++) {
        els[i].classList[fnName](className);
        }
        }
        }
        
            </script>
        </head>
        <body>
            <div class='all'>
                <div class='admin-header'>
                <div class='header-text'>
                <h3>Admin Panel 2.0</h3>
                <div class='header-greet'>
                <span>Hello Admin</span>
                <a href='' class='logout-btn'><svg width=\"14\" height=\"14\" viewBox=\"0 0 24 24\"><path fill=\"#fff\" d=\"M14 12h-4v-12h4v12zm4.213-10.246l-1.213 1.599c2.984 1.732 5 4.955 5 8.647 0 5.514-4.486 10-10 10s-10-4.486-10-10c0-3.692 2.016-6.915 5-8.647l-1.213-1.599c-3.465 2.103-5.787 5.897-5.787 10.246 0 6.627 5.373 12 12 12s12-5.373 12-12c0-4.349-2.322-8.143-5.787-10.246z\"/></svg></a>
                </div>
                </div>
                </div>
                <div class='admin-sidebar'>
                <li>
                <a href=''>Dashboard</a>
                </li>
                <li>
                <a href=''>Users</a>
                </li>
                <li>
                <a href=''>Add Update</a>
                </li>
                <li>
                <a href=''>Create Admin</a>
                </li>
                <li class=\"accordion\"><a>Blog</a> <svg width=\"8\" height=\"8\" viewBox=\"0 0 24 24\"><path fill=\"#fff\" d=\"M0 7.33l2.829-2.83 9.175 9.339 9.167-9.339 2.829 2.83-11.996 12.17z\"/></svg></li>
                <div class=\"panel\">
                <li class=\"submenu\"><a href='' class=\"submenutext\">Add Blog</a></li>
                <li class=\"submenu\"><a href='' class=\"submenutext\">Delete Blog</a></li>
                <li class=\"submenu\"><a href='' class=\"submenutext\">Update Blog</a></li>
                </div>
                <li class=\"accordion\"><a>Events</a> <svg width=\"8\" height=\"8\" viewBox=\"0 0 24 24\"><path fill=\"#fff\" d=\"M0 7.33l2.829-2.83 9.175 9.339 9.167-9.339 2.829 2.83-11.996 12.17z\"/></svg></li>
                <div class=\"panel\">
                <li class=\"submenu\"><a href='' class=\"submenutext\">Add Events</a></li>
                <li class=\"submenu\"><a href='' class=\"submenutext\">Delete Events</a></li>
                <li class=\"submenu\"><a href='' class=\"submenutext\">Update Events</a></li>
                <li class=\"submenu\"><a href='' class=\"submenutext\">Office Events</a></li>
                <li class=\"submenu\"><a href='' class=\"submenutext\">User Events</a></li>
                <li class=\"submenu\"><a href='' class=\"submenutext\">Public Events</a></li>
                <li class=\"submenu\"><a href='' class=\"submenutext\">Admin Events</a></li>
                </div>
                <li>
                <a href=''>Server Info</a>
                </li>
                </div>
                <div class='center-content'>
                <div class='all-border'>
                <div class='shows-location'>
                <div class='location-text'>
                <span class='location'>Admin >> Dashboard</span>
                </div>
                </div>
                    <span>text<span>
                
            
                </div>
                </div>
                </div>
        </body>
        </html>

        ";

        echo $htmlResponse;
        die();
    }


    function adminUsers(){
        //just to check
        studentHome();

        echo 'Users';
        die();
    }


    function adminClass(){
        echo 'Students';
        die();
    }

    function adminAddUsers(){
        echo 'Admin Add Users';
        die();
    }

    function adminAddClass(){
        echo 'Admin Add Class';
        die();
    }

    function adminAddAdminUser(){
        echo 'Add Admin User';
        die();
    }

    function adminChangePassword(){
        echo 'Admin Change Password';
        die();
    }
?>