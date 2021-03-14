<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
        "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Music Viewer</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
    <link href="viewer.css" type="text/css" rel="stylesheet"/>
</head>
<body>
<div id="header">

    <h1>190M Music Playlist Viewer</h1>
    <h2>Search Through Your Playlists and Music</h2>
</div>

<div id="listarea">
    <ul id="musiclist">

        <?php

        $playlist = $_REQUEST['playlist'];

        if (isset($playlist)) {
            $playlist = file_get_contents("songs/$playlist");

            foreach (glob("songs/*.mp3") as $filename) {
                echo strpos($playlist, $filename)!== false;
                $filesize = filesize($filename);
               if (str_contains($playlist, $filename)!== false) {
                    $filename = str_replace("songs/", "", $filename);
                    echo "
            <li class='mp3item'>
            <a href='songs/$filename'>$filename</a>
            ($filesize b)
            </li>";
                }


            }

        } else {
            foreach (glob("songs/*.mp3") as $filename) {
                $filesize = filesize($filename);
                $filename = str_replace("songs/", "", $filename);
                echo "
            <li class='mp3item'>
            <a href='songs/$filename'>$filename</a>
            ($filesize b)
            </li>";

            }
            foreach (glob("songs/*.txt") as $filename) {
                $filesize = filesize($filename);
                $filename = str_replace("songs/", "", $filename);
                echo "
            <li class='playlistitem'>
            <a href='index.php?playlist=$filename'>$filename</a>
            ($filesize b)
            </li>";

            }
        }
        ?>
        <!--        <li class="mp3item">-->
        <!--            <a href="songs/Be More.mp3">Be More.mp3</a>-->
        <!--            (5438375 b)-->
        <!--        </li>-->
        <!---->
        <!--        <li class="mp3item">-->
        <!--            <a href="songs/Drift Away.mp3">Drift Away.mp3</a>-->
        <!--            (5724612 b)-->
        <!--        </li>-->
        <!---->
        <!--        <li class="mp3item">-->
        <!--            <a href="songs/Hello.mp3">Hello.mp3</a>-->
        <!---->
        <!--            (1871110 b)-->
        <!--        </li>-->
        <!---->
        <!--        <li class="mp3item">-->
        <!--            <a href="songs/Panda Sneeze.mp3">Panda Sneeze.mp3</a>-->
        <!--            (58 b)-->
        <!--        </li>-->
        <!---->
        <!--        <li class="playlistitem">-->
        <!--            <a href="music.php?playlist=mypicks.txt">mypicks.txt</a>-->
        <!--        </li>-->
        <!---->
        <!--        <li class="playlistitem">-->
        <!--            <a href="music.php?playlist=playlist.txt">playlist.txt</a>-->
        <!--        </li>-->
    </ul>
</div>
</body>
</html>
