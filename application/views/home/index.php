<!doctype html>
<html lang="en" class="no-js">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="canonical" href="https://html5-templates.com/" />
    <title>CI - WBT</title>
    <meta name="description" content="A brief page description">
    <link rel="stylesheet" href="<?= base_url('assets/home/') ?>style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>

    <script src="<?= base_url('assets/home/') ?>script.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#fullpage').fullpage({
                sectionsColor: ['#1bbc9b', '#4BBFC3', '#7BAABE', 'whitesmoke', '#ccddff'],
                anchors: ['firstPage', 'secondPage', '3rdPage', '4thpage', 'lastPage'],
                menu: '#menu',
            });
        });
    </script>
</head>

<body>


    <ul id="menu">
        <li data-menuanchor="firstPage" class="active"><a href="#firstPage">CI</a></li>
        <li data-menuanchor="secondPage"><a href="#secondPage">-</a></li>
        <li data-menuanchor="3rdPage"><a href="#3rdPage">WBT</a></li>
    </ul>

    <div id="fullpage">
        <div class="section " id="section0">
            <h1>WE</h1>
            <p class="introimg">&darr;&#9636;&darr;</p>
        </div>
        <div class="section active" id="section1">
            <div class="slide" id="slide1">
                <div class="intro">
                    <h1>MAGIC WAS</h1>
                </div>
            </div>
            <div class="slide active" id="slide2">
                <h1>MAKE</h1>
            </div>
            <div class="slide" id="slide3">
                <h1>BY WE</h1>
            </div>

        </div>
        <div class="section" id="section2">
            <div class="intro">
                <h1>MAGIC</h1>
            </div>
        </div>
    </div>

</body>

</html>