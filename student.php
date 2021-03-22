<?php

    if($_SERVER['SCRIPT_NAME'] != "/index.php"){
        die('FALSE');
    }


    function studentHome(){
        $htmlResponse = "
        <!DOCTYPE html>
        <html lang=\"en\">
        <head>
            <meta charset=\"UTF-8\">
            <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
            <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
            <title>Code Editor</title>

            <style>

        * {
        margin: 0;
        padding: 0;
        }
        body {
        background: #1a1a1a;
        font: 10px/1.4 -apple-system, BlinkMacSystemFont, \"Segoe UI\", Roboto, \"Helvetica Neue\", Arial, sans-serif, \"Apple Color Emoji\", \"Segoe UI Emoji\", \"Segoe UI Symbol\", \"Noto Color Emoji\";
        letter-spacing: 0.02rem;
        }
        .topbar {
        background: #404040;
        top: 1px;
        right: 222px;
        left: 37px;
        position: fixed;
        height: 35px;
        z-index: 2;
        display: flex;
        justify-content: space-between;
        user-select: none;
        }
        .topbar_left {
        display: flex;
        align-items: center;
        max-height: 35px;
        padding: 0 10px;
        border-right: 1px solid #1a1a1a;
        }
        .topbar_left span {
        color: rgba(255,255,255,0.5);
        }
        .topbar_middle {
        display: flex;
        max-height: 35px;
        border-left: 1px solid #1a1a1a;
        }
        .topbar_button {
        cursor: default;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #2b2b2b;
        border-right: 1px solid #1a1a1a;
        cursor: pointer;
        }
        .topbar_button svg {
        color: rgba(255,255,255,0.5);
        }
        .topbar_button:hover svg,
        .topbar_button.active svg {
        color: rgba(255,255,255,0.8);
        }
        .topbar_button.active {
        background: #404040;
        }
        .topbar_right {
        display: flex;
        align-items: center;
        max-height: 35px;
        padding: 0 10px;
        position: relative;
        top: 0;
        right: 0;
        border-left: 1px solid #1a1a1a;
        color: rgba(255,255,255,0.5);
        cursor: pointer;
        }
        .topbar_right svg {
        margin-right: 6px;
        }
        .topbar_right > div {
        display: none;
        width: calc(100vw - 259px);
        position: fixed;
        top: 37px;
        left: 37px;
        padding-top: 7px;
        background: #4d4d4d;
        color: rgba(255,255,255,0.8);
        }
        .topbar_right:hover {
        height: 36px;
        background: #4d4d4d;
        border-top: 1px solid #1a1a1a;
        border-right: 1px solid #1a1a1a;
        border-left: 1px solid #1a1a1a;
        border-radius: 3px 3px 0 0;
        border-bottom: 1px solid #1a1a1a;
        top: 0;
        right: -1px;
        padding: 0 10px;
        color: rgba(255,255,255,0.8);
        }
        .topbar_right:hover > div {
        display: block;
        }
        .topbar_right div div {
        display: flex;
        padding: 10px 15px;
        background: #404040;
        border-top: 1px solid #1a1a1a;
        border-bottom: 1px solid #1a1a1a;
        color: rgba(255,255,255,0.5);
        }
        .sidebar-left {
        background: #404040;
        top: 1px;
        bottom: 1px;
        left: 1px;
        position: fixed;
        width: 35px;
        z-index: 3;
        user-select: none;
        }
        .sidebar-left > span {
        display: block;
        min-height: 35px;
        border-bottom: 1px solid #1a1a1a;
        }
        .sidebar-left ul {
        list-style-type: none;
        }
        .sidebar-left li {
        position: relative;
        }
        .sidebar-left li a::after {
        content: \"\";
        position: absolute;
        top: auto;
        bottom: -1px;
        left: 8px;
        height: 1px;
        width: 18px;
        background: #333;
        }
        .sidebar-left li:hover div {
        display: block;
        }
        .sidebar-left li:hover a {
        background: #4d4d4d;
        border-top: 1px solid #1a1a1a;
        border-bottom: 1px solid #1a1a1a;
        border-left: 1px solid #1a1a1a;
        border-radius: 3px 0 0 3px;
        margin-top: -1px;
        padding: 8px 0 6px;
        color: rgba(255,255,255,0.8);
        }
        .sidebar-left li:hover a::after {
        display: none;
        }
        .sidebar-left a {
        display: block;
        width: 35px;
        padding: 9px 0 6px;
        position: relative;
        text-align: center;
        color: rgba(255,255,255,0.5);
        }
        .sidebar-left a:hover {
        color: rgba(255,255,255,0.8);
        }
        .sidebar-left div {
        display: none;
        height: calc(100vh - 67px);
        position: fixed;
        top: 37px;
        left: 37px;
        padding-left: 7px;
        background: #4d4d4d;
        border-right: 1px solid #1a1a1a;
        color: rgba(255,255,255,0.8);
        }
        .sidebar-left div dl {
        width: 240px;
        height: 100%;
        background: #404040;
        border-left: 1px solid #1a1a1a;
        }
        .sidebar-left div dt {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 10px 15px;
        background: #4d4d4d;
        border-bottom: 1px solid #1a1a1a;
        font-size: 14px;
        font-weight: bold;
        }
        .sidebar-left div dt svg {
        color: rgba(255,255,255,0.5);
        cursor: pointer;
        }
        .sidebar-left div dt svg:hover {
        color: rgba(255,255,255,0.8);
        }
        .sidebar-left div dd {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 15px;
        border-bottom: 1px solid #1a1a1a;
        cursor: pointer;
        }
        .sidebar-left div dd span {
        display: flex;
        align-items: center;
        }
        .sidebar-left div dd span svg {
        margin-right: 6px;
        }
        .sidebar-left div dd:hover {
        background: #4d4d4d;
        }
        .sidebar-right {
        background: #2b2b2b;
        top: 1px;
        bottom: 1px;
        right: 1px;
        position: fixed;
        width: 220px;
        z-index: 3;
        user-select: none;
        }
        .sidebar-right ul {
        list-style-type: none;
        display: flex;
        }
        .sidebar-right li {
        width: calc(100% / 4);
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        min-height: 35px;
        border-bottom: 1px solid #1a1a1a;
        border-left: 1px solid #1a1a1a;
        color: rgba(255,255,255,0.5);
        cursor: pointer;
        }
        .sidebar-right li:first-child {
        border: 0;
        }
        .sidebar-right li:hover {
        color: rgba(255,255,255,0.8);
        }
        .sidebar-right li.active {
        background: #404040;
        color: rgba(255,255,255,0.8);
        }
        .sidebar-right > div {
        background: #404040;
        }
        .sidebar-right > div > div {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 10px;
        border-bottom: 1px solid #1a1a1a;
        color: rgba(255,255,255,0.5);
        }
        .sidebar-right > div > div div {
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 100%;
        padding: 10px;
        background: #2b2b2b;
        border-radius: 3px;
        }
        .sidebar-right > div svg {
        cursor: pointer;
        }
        .sidebar-right > div svg:hover {
        color: rgba(255,255,255,0.8);
        }
        .content {
        width: calc(100% - 275px);
        height: calc(100% - 83px);
        position: absolute;
        top: 45px;
        left: 45px;
        z-index: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        }
        .content section {
        background: #2b2b2b;
        width: 100%;
        height: 100%;
        transition-property: max-width, max-height;
        transition-duration: 0.6s;
        transition-timing-function: cubic-bezier(0.43, 0.195, 0.02, 1);
        }
        .desktop .content section {
        max-width: 1004px;
        max-height: 748px;
        }
        .tablet .content section {
        max-width: 748px;
        max-height: 620px;
        }
        .mobile-landscape .content section {
        max-width: 620px;
        max-height: 320px;
        }
        .mobile-portrait .content section {
        max-width: 320px;
        max-height: 620px;
        }
        .content span {
        display: flex;
        justify-content: space-between;
        padding: 10px;
        color: rgba(255,255,255,0.5);
        text-transform: uppercase;
        font-size: 9px;
        }
        .content span::before {
        content: \"Write Your Code Here\";
        }
        .desktop .content span::before {
        content: \"desktop\";
        }
        .tablet .content span::before {
        content: \"tablet\";
        }
        .mobile-landscape .content span::before {
        content: \"mobile landscape\";
        }
        .mobile-portrait .content span::before {
        content: \"mobile portrait\";
        }
        .content svg {
        cursor: pointer;
        }
        .content svg:hover {
        color: rgba(255,255,255,0.8);
        }
        .content div {
        margin: 0 10px 10px;
        height: calc(100% - 42px);
        background: #404040;
        }
        .bottombar {
        background: #404040;
        bottom: 1px;
        right: 222px;
        left: 37px;
        position: fixed;
        height: 28px;
        z-index: 2;
        display: flex;
        justify-content: space-between;
        user-select: none;
        }
        .bottombar_right {
        max-height: 28px;
        }
        .bottombar_right ul {
        display: flex;
        align-items: stretch;
        justify-content: center;
        height: 100%;
        list-style-type: none;
        }
        .bottombar_right li {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0 10px;
        border-left: 1px solid #1a1a1a;
        text-transform: uppercase;
        font-size: 8px;
        color: rgba(255,255,255,0.5);
        }
        .bottombar_right li:last-child {
        color: #06d411;
        }
        .bottombar_right span {
        width: 5px;
        height: 5px;
        margin-left: 10px;
        position: relative;
        top: -1px;
        background: #06d411;
        box-shadow: 0px 1px 10px 3px rgba(6,212,17,0.9);
        }
        .bottombar_left {
        display: flex;
        align-items: center;
        max-height: 28px;
        padding: 0 10px;
        border-right: 1px solid #1a1a1a;
        color: rgba(255,255,255,0.5);
        cursor: pointer;
        }
        .bottombar_left:hover {
        color: rgba(255,255,255,0.8);
        }
        .alert__inside {
        justify-content: flex-start !important;
        position: relative;
        border-radius: 0 !important;
        color: #1a1a1a;
        }
        .alert__inside strong {
        margin-right: 5px;
        font-weight: bold;
        }
        .alert-info .alert__inside {
        background: #f5ef42 !important;
        animation: Info 1.5s infinite linear;
        }
        .alert-success .alert__inside {
        background: #69e781 !important;
        animation: Success 1.5s infinite linear;
        }
        .alert-error .alert__inside {
        background: #f55742 !important;
        animation: Error 1.5s infinite linear;
        }
        @-moz-keyframes Info {
        from {
            box-shadow: 0 0 0 0 #f5ef42;
        }
        to {
            box-shadow: 0 0 0 10px rgba(245,239,66,0);
        }
        }
        @-webkit-keyframes Info {
        from {
            box-shadow: 0 0 0 0 #f5ef42;
        }
        to {
            box-shadow: 0 0 0 10px rgba(245,239,66,0);
        }
        }
        @-o-keyframes Info {
        from {
            box-shadow: 0 0 0 0 #f5ef42;
        }
        to {
            box-shadow: 0 0 0 10px rgba(245,239,66,0);
        }
        }
        @keyframes Info {
        from {
            box-shadow: 0 0 0 0 #f5ef42;
        }
        to {
            box-shadow: 0 0 0 10px rgba(245,239,66,0);
        }
        }
        @-moz-keyframes Success {
        from {
            box-shadow: 0 0 0 0 #69e781;
        }
        to {
            box-shadow: 0 0 0 10px rgba(255,178,41,0);
        }
        }
        @-webkit-keyframes Success {
        from {
            box-shadow: 0 0 0 0 #69e781;
        }
        to {
            box-shadow: 0 0 0 10px rgba(255,178,41,0);
        }
        }
        @-o-keyframes Success {
        from {
            box-shadow: 0 0 0 0 #69e781;
        }
        to {
            box-shadow: 0 0 0 10px rgba(255,178,41,0);
        }
        }
        @keyframes Success {
        from {
            box-shadow: 0 0 0 0 #69e781;
        }
        to {
            box-shadow: 0 0 0 10px rgba(255,178,41,0);
        }
        }
        @-moz-keyframes Error {
        from {
            box-shadow: 0 0 0 0 #f55742;
        }
        to {
            box-shadow: 0 0 0 10px rgba(245,87,66,0);
        }
        }
        @-webkit-keyframes Error {
        from {
            box-shadow: 0 0 0 0 #f55742;
        }
        to {
            box-shadow: 0 0 0 10px rgba(245,87,66,0);
        }
        }
        @-o-keyframes Error {
        from {
            box-shadow: 0 0 0 0 #f55742;
        }
        to {
            box-shadow: 0 0 0 10px rgba(245,87,66,0);
        }
        }
        @keyframes Error {
        from {
            box-shadow: 0 0 0 0 #f55742;
        }
        to {
            box-shadow: 0 0 0 10px rgba(245,87,66,0);
        }
        }

            </style>


            <script>

        const buttons = document.querySelectorAll('.topbar_button')

        buttons.forEach(function(button){
        button.addEventListener('click', function(){
            let screen = this.dataset.screen
            buttons.forEach(function(button){
            button.classList.remove('active')
            })
            this.classList.add('active')
            document.documentElement.classList = screen
        }, false)
        })

            </script>
        </head>
        <body>
            <div class=\"topbar\">
                <div class=\"topbar_left\"><span>Home</span></div>
                <div class=\"topbar_middle\">
                    <div class=\"topbar_button\" data-screen=\"desktop\">
                        <svg width=\"24\" height=\"24\" viewBox=\"0 0 24 24\">
                            <path d=\"M3 4a1 1 0 011-1h16a1 1 0 011 1v13h3v2a1 1 0 01-1 1H1a1 1 0 01-1-1v-2h3V4zm17 0H4v13h16V4z\" fill=\"currentColor\"></path>
                            <path opacity=\".6\" fill=\"currentColor\" d=\"M5 5h14v11H5z\"></path>
                        </svg>
                        <span style=\"width: 50px;color: rgba(255,255,255,0.8);font-size: 12px;padding: 10px;\">first name</span>
                    </div>
                    <!-- <div class=\"topbar_button\" style=\"margin-left: 30%;padding: 10%;\" data-screen=\"desktop\">
                        <svg width=\"12\" height=\"24\" viewBox=\"0 0 24 24\">
                            <path d=\"M3 4a1 1 0 011-1h16a1 1 0 011 1v13h3v2a1 1 0 01-1 1H1a1 1 0 01-1-1v-2h3V4zm17 0H4v13h16V4z\" fill=\"currentColor\"></path>
                            <path opacity=\".6\" fill=\"currentColor\" d=\"M5 5h14v11H5z\"></path>
                        </svg>
                        <span style=\"color: rgba(255,255,255,0.8);font-size: 12px;\">Logout</span>
                    </div> -->
                </div>
                <!-- <div class=\"topbar_middle\">
                    <div class=\"topbar_button\" data-screen=\"desktop\"><svg width=\"24\" height=\"24\" viewBox=\"0 0 24 24\">
                            <path d=\"M3 4a1 1 0 011-1h16a1 1 0 011 1v13h3v2a1 1 0 01-1 1H1a1 1 0 01-1-1v-2h3V4zm17 0H4v13h16V4z\" fill=\"currentColor\"></path>
                            <path opacity=\".6\" fill=\"currentColor\" d=\"M5 5h14v11H5z\"></path>
                        </svg></div>
                    <div class=\"topbar_button active\" data-screen=\"tablet\"><svg width=\"24\" height=\"24\" viewBox=\"0 0 24 24\">
                            <path d=\"M4 4a1 1 0 011-1h14a1 1 0 011 1v16a1 1 0 01-1 1H5a1 1 0 01-1-1V4zm7 15a1 1 0 112 0 1 1 0 01-2 0zm8-15H5v13h14V4z\" fill=\"currentColor\"></path>
                            <path opacity=\".6\" fill=\"currentColor\" d=\"M6 5h12v11H6z\"></path>
                        </svg></div>
                    <div class=\"topbar_button\" data-screen=\"mobile-landscape\"><svg width=\"24\" height=\"24\" viewBox=\"0 0 24 24\">
                            <path d=\"M4 18a1 1 0 01-1-1V7a1 1 0 011-1h16a1 1 0 011 1v10a1 1 0 01-1 1H4zm15-5a1 1 0 110-2 1 1 0 010 2zM4 7v10h13V7H4z\" fill=\"currentColor\"></path>
                            <path opacity=\".6\" fill=\"currentColor\" d=\"M5 16V8h11v8z\"></path>
                        </svg></div>
                    <div class=\"topbar_button\" data-screen=\"mobile-portrait\"><svg width=\"24\" height=\"24\" viewBox=\"0 0 24 24\">
                            <path d=\"M6 4a1 1 0 011-1h10a1 1 0 011 1v16a1 1 0 01-1 1H7a1 1 0 01-1-1V4zm5 15a1 1 0 112 0 1 1 0 01-2 0zm6-15H7v13h10V4z\" fill=\"currentColor\"></path>
                            <path opacity=\".6\" fill=\"currentColor\" d=\"M8 5h8v11H8z\"></path>
                        </svg></div>
                </div> -->
                <div class=\"topbar_right\"><svg width=\"15\" height=\"15\" viewBox=\"0 0 510 510\">
                        <path fill=\"currentColor\" d=\"M505.16405,19.29688c-1.176-5.4629-6.98736-11.26563-12.45106-12.4336C460.61647,0,435.46433,0,410.41962,0,307.2013,0,245.30155,55.20312,199.09162,128H94.88878c-16.29733,0-35.599,11.92383-42.88913,26.49805L2.57831,253.29688A28.39645,28.39645,0,0,0,.06231,264a24.008,24.008,0,0,0,24.00353,24H128.01866a96.00682,96.00682,0,0,1,96.01414,96V488a24.008,24.008,0,0,0,24.00353,24,28.54751,28.54751,0,0,0,10.7047-2.51562l98.747-49.40626c14.56074-7.28515,26.4746-26.56445,26.4746-42.84374V312.79688c72.58882-46.3125,128.01886-108.40626,128.01886-211.09376C512.07522,76.55273,512.07522,51.40234,505.16405,19.29688ZM384.05637,168a40,40,0,1,1,40.00589-40A40.02,40.02,0,0,1,384.05637,168ZM35.68474,352.06641C9.82742,377.91992-2.94985,442.59375.57606,511.41016c69.11565,3.55859,133.61147-9.35157,159.36527-35.10547,40.28913-40.2793,42.8774-93.98633,6.31147-130.54883C129.68687,309.19727,75.97,311.78516,35.68474,352.06641Zm81.63312,84.03125c-8.58525,8.584-30.08256,12.88672-53.11915,11.69922-1.174-22.93555,3.08444-44.49219,11.70289-53.10938,13.42776-13.42578,31.33079-14.28906,43.51813-2.10352C131.60707,404.77148,130.74562,422.67188,117.31786,436.09766Z\"></path>
                    </svg><b>Submit&nbsp;</b><svg width=\"10\" height=\"10\" viewBox=\"0 0 448 512\">
                    </svg>
                </div>
            </div>
            <div class=\"sidebar-left\"><span><a href=\"#\"><svg width=\"21\" height=\"15\" viewBox=\"0 0 21 15\">
                            <path fill=\"currentColor\" d=\"M15 1H1v3h14V1zM6 6v3h14V6H6zm0 8h14v-3H6v3z\"></path>
                        </svg></a></span>
                <ul>
                    <li><a href=\"#\"><svg width=\"20\" height=\"20\" viewBox=\"0 0 20 20\">
                                <path d=\"M3.122 2H0V0h4.878L5.4 4H19v6.82L4.647 13.69 3.122 2zM18 20a2 2 0 110-4 2 2 0 010 4zM6 20a2 2 0 110-4 2 2 0 010 4z\" fill=\"currentColor\"></path>
                            </svg></a>
                        <div>
                            <dl>
                                <dt>Questions</dt>
                                <!-- <dd><span><svg width=\"20\" height=\"20\" viewBox=\"0 0 15 15\">
                                            <path fill=\"currentColor\" d=\"M10.03 8.97l-.16.16A4.95 4.95 0 0011 6 5 5 0 001 6a5 5 0 005 5c1.19 0 2.27-.434 3.13-1.13l-.16.16 3.5 3.5 1.06-1.06-3.5-3.5zM6 9.5C4.07 9.5 2.5 7.93 2.5 6S4.07 2.5 6 2.5 9.5 4.07 9.5 6 7.93 9.5 6 9.5z\"></path>
                                        </svg>Problem Title</span><svg width=\"12\" height=\"12\" viewBox=\"0 0 128 512\">
                                        <path d=\"M64 208c26.5 0 48 21.5 48 48s-21.5 48-48 48-48-21.5-48-48 21.5-48 48-48zM16 104c0 26.5 21.5 48 48 48s48-21.5 48-48-21.5-48-48-48-48 21.5-48 48zm0 304c0 26.5 21.5 48 48 48s48-21.5 48-48-21.5-48-48-48-48 21.5-48 48z\" fill=\"currentColor\"></path>
                                    </svg></dd> -->
                                <dd><span><svg width=\"20\" height=\"20\" viewBox=\"0 0 16 16\">
                                            <path fill=\"currentColor\" d=\"M8.506 7.778c-1.58 0-3.08-.226-4.222-.64a5.1 5.1 0 01-1.272-.642v1.53c0 1.093 2.46 1.98 5.494 1.98S14 9.12 14 8.026v-1.53a5.24 5.24 0 01-1.272.643c-1.143.412-2.642.637-4.222.637v.002zm0 3.998c-1.58 0-3.08-.226-4.222-.64-.506-.182-.933-.396-1.272-.64v1.524c0 1.093 2.46 1.98 5.494 1.98S14 13.113 14 12.02v-1.524a5.243 5.243 0 01-1.272.64c-1.143.415-2.642.64-4.222.64zM8.506 1c-3.035 0-5.494.887-5.494 1.98v1.055c0 1.094 2.46 1.978 5.494 1.978S14 5.13 14 4.035V2.98C14 1.887 11.54 1 8.506 1z\"></path>
                                        </svg>Problem Title</span><svg width=\"12\" height=\"12\" viewBox=\"0 0 128 512\">
                                        <path d=\"M64 208c26.5 0 48 21.5 48 48s-21.5 48-48 48-48-21.5-48-48 21.5-48 48-48zM16 104c0 26.5 21.5 48 48 48s48-21.5 48-48-21.5-48-48-48-48 21.5-48 48zm0 304c0 26.5 21.5 48 48 48s48-21.5 48-48-21.5-48-48-48-48 21.5-48 48z\" fill=\"currentColor\"></path>
                                    </svg></dd>
                            </dl>
                        </div>
                    </li>
                    <!-- <li><a href=\"#\"><svg width=\"20\" height=\"18\" viewBox=\"0 0 20 18\">
                                <path d=\"M13.557.736a1 1 0 00-1.23-.701L.749 3.137A1 1 0 00.034 4.36l2.332 8.701a1 1 0 001.23.701L4 13.654V6.003A2 2 0 015.994 4h8.437L13.557.736zM7.007 6h11.986A1 1 0 0120 6.996v10.008a1 1 0 01-1.007.996H7.007A1 1 0 016 17.004V6.996A1 1 0 017.007 6zM18 9.5a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0zM8 12l3.5-3 7 7H8v-4z\" fill=\"currentColor\"></path>
                            </svg></a>
                        <div></div>
                    </li>
                    <li><a class=\"active\" href=\"#\"><svg width=\"19\" height=\"19\" viewBox=\"0 0 19 19\">
                                <path d=\"M19 8.313v2.377l-3.173.61a6.54 6.54 0 01-.58 1.402l1.812 2.675-1.68 1.678-2.68-1.81a6.516 6.516 0 01-1.406.58L10.684 19h-2.37l-.61-3.17a6.575 6.575 0 01-1.404-.58l-2.68 1.81-1.68-1.68 1.81-2.674a6.63 6.63 0 01-.58-1.406L0 10.688V8.313L3.174 7.7c.137-.488.332-.96.58-1.403L1.94 3.62l1.68-1.678 2.676 1.81A6.56 6.56 0 017.7 3.174L8.312 0h2.377l.61 3.172a6.6 6.6 0 011.4.578l2.674-1.81 1.676 1.68-1.81 2.677c.25.443.443.914.58 1.404l3.18.62zM6.47 11.246a3.498 3.498 0 106.062-3.496 3.498 3.498 0 00-6.06 3.496z\" fill=\"currentColor\"></path>
                            </svg></a>
                        <div></div>
                    </li>
                    <li><a href=\"#\"><svg width=\"20\" height=\"20\" viewBox=\"0 0 20 20\">
                                <path fill=\"currentColor\" d=\"M14 11V7.33h-2a3 3 0 00-3 3v3H7v-3a4.998 4.998 0 015-5h2V2l6 4.5-6 4.5z\"></path>
                                <path fill=\"currentColor\" d=\"M7.108 4H2a1 1 0 00-1 1v12a1 1 0 001 1h15a1 1 0 001-1v-5.25l-2 1.5V16H3V6h2.272a8.044 8.044 0 011.836-2z\"></path>
                            </svg></a>
                        <div></div>
                    </li>
                    <li><a href=\"#\"><svg width=\"20\" height=\"20\" viewBox=\"0 0 16 16\">
                                <path d=\"M1 1h14v14H1V1zm13 1H2v12h12V2z\" fill=\"currentColor\"></path>
                                <path d=\"M4 4h3v3H4V4zm5 0h3v3H9V4zM5 9H4v3h3V9H5zm4 0h3v3H9V9z\" fill=\"currentColor\"></path>
                            </svg></a>
                        <div></div>
                    </li> -->
                    <li><a href=\"#\"><svg width=\"22\" height=\"22\" viewBox=\"0 0 16 16\">
                                <path d=\"M10.99 4L11 1 7 5l4 4-.01-3V4zM15 4h-4v2h4V4zm-9.99 6L5 7l4 4-4 4 .01-3v-2zM1 12h4v-2H1v2z\" fill=\"currentColor\"></path>
                            </svg></a>
                            <div>
                                <dl>
                                    <dt>Time-Table</dt>
                                    <!-- <dd><span><svg width=\"20\" height=\"20\" viewBox=\"0 0 15 15\">
                                                <path fill=\"currentColor\" d=\"M10.03 8.97l-.16.16A4.95 4.95 0 0011 6 5 5 0 001 6a5 5 0 005 5c1.19 0 2.27-.434 3.13-1.13l-.16.16 3.5 3.5 1.06-1.06-3.5-3.5zM6 9.5C4.07 9.5 2.5 7.93 2.5 6S4.07 2.5 6 2.5 9.5 4.07 9.5 6 7.93 9.5 6 9.5z\"></path>
                                            </svg>Search</span><svg width=\"12\" height=\"12\" viewBox=\"0 0 128 512\">
                                            <path d=\"M64 208c26.5 0 48 21.5 48 48s-21.5 48-48 48-48-21.5-48-48 21.5-48 48-48zM16 104c0 26.5 21.5 48 48 48s48-21.5 48-48-21.5-48-48-48-48 21.5-48 48zm0 304c0 26.5 21.5 48 48 48s48-21.5 48-48-21.5-48-48-48-48 21.5-48 48z\" fill=\"currentColor\"></path>
                                        </svg></dd> -->
                                    <dd><span><svg width=\"20\" height=\"20\" viewBox=\"0 0 16 16\">
                                                <path fill=\"currentColor\" d=\"M8.506 7.778c-1.58 0-3.08-.226-4.222-.64a5.1 5.1 0 01-1.272-.642v1.53c0 1.093 2.46 1.98 5.494 1.98S14 9.12 14 8.026v-1.53a5.24 5.24 0 01-1.272.643c-1.143.412-2.642.637-4.222.637v.002zm0 3.998c-1.58 0-3.08-.226-4.222-.64-.506-.182-.933-.396-1.272-.64v1.524c0 1.093 2.46 1.98 5.494 1.98S14 13.113 14 12.02v-1.524a5.243 5.243 0 01-1.272.64c-1.143.415-2.642.64-4.222.64zM8.506 1c-3.035 0-5.494.887-5.494 1.98v1.055c0 1.094 2.46 1.978 5.494 1.978S14 5.13 14 4.035V2.98C14 1.887 11.54 1 8.506 1z\"></path>
                                            </svg>Class Name</span><svg width=\"12\" height=\"12\" viewBox=\"0 0 128 512\">
                                            <path d=\"M64 208c26.5 0 48 21.5 48 48s-21.5 48-48 48-48-21.5-48-48 21.5-48 48-48zM16 104c0 26.5 21.5 48 48 48s48-21.5 48-48-21.5-48-48-48-48 21.5-48 48zm0 304c0 26.5 21.5 48 48 48s48-21.5 48-48-21.5-48-48-48-48 21.5-48 48z\" fill=\"currentColor\"></path>
                                        </svg></dd>
                                </dl>
                            </div>
                    </li>
                    <li><a href=\"#\"><svg width=\"21\" height=\"21\" viewBox=\"0 0 15 15\">
                                <path fill=\"currentColor\" d=\"M10.03 8.97l-.16.16A4.95 4.95 0 0011 6 5 5 0 001 6a5 5 0 005 5c1.19 0 2.27-.434 3.13-1.13l-.16.16 3.5 3.5 1.06-1.06-3.5-3.5zM6 9.5C4.07 9.5 2.5 7.93 2.5 6S4.07 2.5 6 2.5 9.5 4.07 9.5 6 7.93 9.5 6 9.5z\"></path>
                            </svg></a>
                            <div>
                                <dl>
                                    <dt>Acoount Settings(Hide and Show Up Details)</dt>
                                        <dd><span><svg width=\"20\" height=\"20\" viewBox=\"0 0 16 16\">
                                                    <path fill=\"currentColor\" d=\"M8.506 7.778c-1.58 0-3.08-.226-4.222-.64a5.1 5.1 0 01-1.272-.642v1.53c0 1.093 2.46 1.98 5.494 1.98S14 9.12 14 8.026v-1.53a5.24 5.24 0 01-1.272.643c-1.143.412-2.642.637-4.222.637v.002zm0 3.998c-1.58 0-3.08-.226-4.222-.64-.506-.182-.933-.396-1.272-.64v1.524c0 1.093 2.46 1.98 5.494 1.98S14 13.113 14 12.02v-1.524a5.243 5.243 0 01-1.272.64c-1.143.415-2.642.64-4.222.64zM8.506 1c-3.035 0-5.494.887-5.494 1.98v1.055c0 1.094 2.46 1.978 5.494 1.978S14 5.13 14 4.035V2.98C14 1.887 11.54 1 8.506 1z\"></path>
                                            </svg>Change Password</span><svg width=\"12\" height=\"12\" viewBox=\"0 0 128 512\">
                                            <path d=\"M64 208c26.5 0 48 21.5 48 48s-21.5 48-48 48-48-21.5-48-48 21.5-48 48-48zM16 104c0 26.5 21.5 48 48 48s48-21.5 48-48-21.5-48-48-48-48 21.5-48 48zm0 304c0 26.5 21.5 48 48 48s48-21.5 48-48-21.5-48-48-48-48 21.5-48 48z\" fill=\"currentColor\"></path>
                                        </svg></dd>                        
                                        <dd><span><svg width=\"20\" height=\"20\" viewBox=\"0 0 16 16\">
                                                <path fill=\"currentColor\" d=\"M8.506 7.778c-1.58 0-3.08-.226-4.222-.64a5.1 5.1 0 01-1.272-.642v1.53c0 1.093 2.46 1.98 5.494 1.98S14 9.12 14 8.026v-1.53a5.24 5.24 0 01-1.272.643c-1.143.412-2.642.637-4.222.637v.002zm0 3.998c-1.58 0-3.08-.226-4.222-.64-.506-.182-.933-.396-1.272-.64v1.524c0 1.093 2.46 1.98 5.494 1.98S14 13.113 14 12.02v-1.524a5.243 5.243 0 01-1.272.64c-1.143.415-2.642.64-4.222.64zM8.506 1c-3.035 0-5.494.887-5.494 1.98v1.055c0 1.094 2.46 1.978 5.494 1.978S14 5.13 14 4.035V2.98C14 1.887 11.54 1 8.506 1z\"></path>
                                            </svg>Logout</span><svg width=\"12\" height=\"12\" viewBox=\"0 0 128 512\">
                                            <path d=\"M64 208c26.5 0 48 21.5 48 48s-21.5 48-48 48-48-21.5-48-48 21.5-48 48-48zM16 104c0 26.5 21.5 48 48 48s48-21.5 48-48-21.5-48-48-48-48 21.5-48 48zm0 304c0 26.5 21.5 48 48 48s48-21.5 48-48-21.5-48-48-48-48 21.5-48 48z\" fill=\"currentColor\"></path>
                                        </svg></dd>
                                </dl>
                            </div>
                    </li>
                </ul>
            </div>
            <div class=\"sidebar-right\">
                <ul>
                    <!-- <li class=\"active\"><svg width=\"20\" height=\"20\" viewBox=\"0 0 512 512\">
                            <path fill=\"currentColor\" d=\"M496 400H48V80a16 16 0 0 0-16-16H16A16 16 0 0 0 0 80v336a32 32 0 0 0 32 32h464a16 16 0 0 0 16-16v-16a16 16 0 0 0-16-16zm-336-80a32 32 0 1 0-32-32 32 32 0 0 0 32 32zm256-160a32 32 0 1 0-32-32 32 32 0 0 0 32 32zm-224 0a32 32 0 1 0-32-32 32 32 0 0 0 32 32zm192 160a32 32 0 1 0-32-32 32 32 0 0 0 32 32zm-96-64a32 32 0 1 0-32-32 32 32 0 0 0 32 32z\"></path>
                        </svg></li>
                    <li><svg width=\"20\" height=\"20\" viewBox=\"0 0 512 512\">
                            <path fill=\"currentColor\" d=\"M396.8 352h22.4c6.4 0 12.8-6.4 12.8-12.8V108.8c0-6.4-6.4-12.8-12.8-12.8h-22.4c-6.4 0-12.8 6.4-12.8 12.8v230.4c0 6.4 6.4 12.8 12.8 12.8zm-192 0h22.4c6.4 0 12.8-6.4 12.8-12.8V140.8c0-6.4-6.4-12.8-12.8-12.8h-22.4c-6.4 0-12.8 6.4-12.8 12.8v198.4c0 6.4 6.4 12.8 12.8 12.8zm96 0h22.4c6.4 0 12.8-6.4 12.8-12.8V204.8c0-6.4-6.4-12.8-12.8-12.8h-22.4c-6.4 0-12.8 6.4-12.8 12.8v134.4c0 6.4 6.4 12.8 12.8 12.8zM496 400H48V80c0-8.84-7.16-16-16-16H16C7.16 64 0 71.16 0 80v336c0 17.67 14.33 32 32 32h464c8.84 0 16-7.16 16-16v-16c0-8.84-7.16-16-16-16zm-387.2-48h22.4c6.4 0 12.8-6.4 12.8-12.8v-70.4c0-6.4-6.4-12.8-12.8-12.8h-22.4c-6.4 0-12.8 6.4-12.8 12.8v70.4c0 6.4 6.4 12.8 12.8 12.8z\"></path>
                        </svg></li> -->
                    <li class=\"active\">Editor</li>
                    <li>Question</li>
                </ul>
                <div>
                    <div>Editor Settings<svg width=\"12\" height=\"12\" viewBox=\"0 0 19 19\">
                            <path d=\"M19 8.313v2.377l-3.173.61a6.54 6.54 0 01-.58 1.402l1.812 2.675-1.68 1.678-2.68-1.81a6.516 6.516 0 01-1.406.58L10.684 19h-2.37l-.61-3.17a6.575 6.575 0 01-1.404-.58l-2.68 1.81-1.68-1.68 1.81-2.674a6.63 6.63 0 01-.58-1.406L0 10.688V8.313L3.174 7.7c.137-.488.332-.96.58-1.403L1.94 3.62l1.68-1.678 2.676 1.81A6.56 6.56 0 017.7 3.174L8.312 0h2.377l.61 3.172a6.6 6.6 0 011.4.578l2.674-1.81 1.676 1.68-1.81 2.677c.25.443.443.914.58 1.404l3.18.62zM6.47 11.246a3.498 3.498 0 106.062-3.496 3.498 3.498 0 00-6.06 3.496z\" fill=\"currentColor\"></path>
                        </svg></div>
                    <div>
                    <div>Java<svg width=\"12\" height=\"12\" viewBox=\"0 0 128 512\">
                        <path d=\"M64 208c26.5 0 48 21.5 48 48s-21.5 48-48 48-48-21.5-48-48 21.5-48 48-48zM16 104c0 26.5 21.5 48 48 48s48-21.5 48-48-21.5-48-48-48-48 21.5-48 48zm0 304c0 26.5 21.5 48 48 48s48-21.5 48-48-21.5-48-48-48-48 21.5-48 48z\" fill=\"currentColor\"></path>
                    </svg></div>
                    </div>
                    
                    <div class=\"alert alert-info\">
                        <div class=\"alert__inside\"><strong>Warning: </strong>this is a info alert</div>
                    </div>
                    <div class=\"alert alert-success\">
                        <div class=\"alert__inside\"><strong>Warning: </strong>this is a success alert</div>
                    </div>
                    <div class=\"alert alert-error\">
                        <div class=\"alert__inside\"><strong>Warning: </strong>this is a error alertthis is a error alertthis is a error alertthis is a error alertthis is a error alertthis is a error alertthis is a error alertthis is a error alertthis is a error alertthis is a error alertthis is a error alertthis is a error alertthis is a error alertthis is a error alertthis is a error alertthis is a error alertthis is a error alertthis is a error alertthis is a error alertthis is a error alertthis is a error alertthis is a error alert</div>
                    </div>
                </div>
            </div>
            <div class=\"content\">
                <section><span><svg width=\"10\" height=\"10\" viewBox=\"0 0 512 512\">
                            <path d=\"M28.485 28.485L80.65 80.65C125.525 35.767 187.515 8 255.999 8 392.66 8 504.1 119.525 504 256.185 503.9 393.067 392.905 504 256 504c-63.926 0-122.202-24.187-166.178-63.908-5.113-4.618-5.353-12.561-.482-17.433l19.738-19.738c4.498-4.498 11.753-4.785 16.501-.552C160.213 433.246 205.895 452 256 452c108.321 0 196-87.662 196-196 0-108.321-87.662-196-196-196-54.163 0-103.157 21.923-138.614 57.386l54.128 54.129c7.56 7.56 2.206 20.485-8.485 20.485H20c-6.627 0-12-5.373-12-12V36.971c0-10.691 12.926-16.045 20.485-8.486z\" fill=\"currentColor\"></path>
                        </svg></span>
                    <div>
                        <textarea spellcheck=\"false\" name=\"code\" id=\"\" cols=\"30\" rows=\"10\" style=\"width: 100%; height: 100%; background: none;color: #fff;\"></textarea>
                    </div>
                </section>
            </div>
            <div class=\"bottombar\">
                <div class=\"bottombar_left\"><svg width=\"16\" height=\"16\" viewBox=\"0 0 576 512\">
                        <path fill=\"currentColor\" d=\"M384 64H192C86 64 0 150 0 256s86 192 192 192h192c106 0 192-86 192-192S490 64 384 64zm0 336c-79.6 0-144-64.4-144-144s64.4-144 144-144 144 64.4 144 144-64.4 144-144 144z\"></path>
                    </svg></div>
                <div class=\"bottombar_right\">
                    <ul>
                        <li>Last saved less than a minute</li>
                        <li>Online <span></span></li>
                    </ul>
                </div>
            </div>
        </body>
        </html>
            ";
        echo $htmlResponse;
        die();
    }

    function studentClass(){
        echo 'Students';
        die();
    }
    
    function studentChangePassword(){
        echo 'password';
        die();
    }

    function studentJoinClass($classId){
        echo $classId;
        die();
    }

    
?>