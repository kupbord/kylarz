
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>kylarz site 2.0</title>
    <meta name="description" content="autism warning">
    <meta name="author" content="kylarz">

    <!--[if lt IE 9]>
      <script src="https://cdn.jsdelivr.net/npm/html5shiv@3.7.3/dist/html5shiv.min.js"></script>
    <![endif]-->

    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/maddieisspecial.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/fbb4da9442.js" crossorigin="anonymous"></script>

  </head>

  <body>

    <div class="topbar">
      <div class="fill">
        <div class="container">
          <a class="brand">kylarz</a>
          <ul class="nav">
            <li class="active"><a>this site</a></li>
            <li><a href="//last.fm/user/amerikaslatv">last.fm #1</a></li>
            <li><a href="//last.fm/user/MatzeR">last.fm #2</a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="container">

      <div class="content">
        <div class="page-header">
          <h1>home <small>contains a lot of autism</small></h1>
        </div>
        <div class="row">
          <div class="span10">
            <h2>abou t me</h2>
            <p>i am an idiot who either wastes my time writing shitty php (hey that sounds familiar)<br> or doing autistic things with computers (such as installing windows xp onto a haswell desktop)<br><br>am a minor so don't be carly thanks</p>
        <h3>music</h3>
        <p>mainly listen to 2000s rock metal emo whatever but sometimes other shit (taylor swift in top 10 :sob:)<br>favorites: all american rejects (Peak...), finch (also peak...), taking back sunday, linkin park<br>obviously you can see everything on lastfm so wont explain more here</p> 
    <h2>computer(s)</h2> 
    <div class="a">
        <h4>desktop</h4>   
        <b>CPU:</b> Intel Xeon E3-1270 V3 (4c8t, 3.5GHz)<br>
        <b>RAM:</b> 12GB DDR3 @ 1600MT/s<br>
        <b>GPU:</b> NVIDIA GeForce GT 730 (2GB GDDR5, Kepler)<br>
        <b>HDD:</b> 1TB Seagate ST1000LM035<br>
        <b>OS:</b> Windows XP Pro SP3
</div>

<div class="a">
        <h4>laptop</h4>   
        <b>CPU:</b> Intel Core i5-12450H (8c12t, 4.4GHz)<br>
        <b>RAM:</b> 16GB DDR4 @ 2400MT/s<br>
        <b>GPU:</b> NVIDIA GeForce RTX 3050 Mobile (4GB GDDR6, Ampere)<br>
        <b>SSD:</b> 512GB WD PC SN740<br>
        <b>OS:</b> Windows 11 23H2
</div>
    </div>
          <div class="span4">
          <?php
 $user     = "amerikaslatv"; // Enter your username here
 $key      = "004a92a8f311e4818bfb6f77f20eb0be"; // Enter your API Key
 $status   = 'Last Played'; // default to this, if 'Now Playing' is true, the json will reflect this.
 $endpoint = 'https://ws.audioscrobbler.com/2.0/?method=user.getrecenttracks&user=' . $user . '&&limit=2&api_key=' . $key . '&format=json';
 $ch = curl_init();
 curl_setopt($ch, CURLOPT_URL, $endpoint);
 curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
 curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
 curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0); // 0 for indefinite
 curl_setopt($ch, CURLOPT_TIMEOUT, 10); // 10 second attempt before timing out
 curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json'));
 $response = curl_exec($ch);
 $lastfm[] = json_decode($response, true);
 curl_close($ch);

 $artwork = $lastfm[0]['recenttracks']['track'][0]['image'][2]['#text'];
 if ( empty( $artwork ) ) {  // Check if album artwork exists on last.fm, else use our own fallback image
    $artwork = 'img/no_art.jpg';
}

$trackInfo = [
    'name'       => $lastfm[0]['recenttracks']['track'][0]['name'],
    'artist'     => $lastfm[0]['recenttracks']['track'][0]['artist']['#text'],
    'link'       => $lastfm[0]['recenttracks']['track'][0]['url'],
    'album'      => $lastfm[0]['recenttracks']['track'][0]['album']['#text'],
    'albumArt'   => $artwork,
    'status'     => $status
];

if ( !empty($lastfm[0]['recenttracks']['track'][0]['@attr']['nowplaying']) ) {
    $trackInfo['nowPlaying'] = $lastfm[0]['recenttracks']['track'][0]['@attr']['nowplaying'];
    $trackInfo['status'] = 'Now Playing';
}
echo '<h4>'.$trackInfo['status'].' <i style="margin-top:10px;" class="fab fa-lastfm"></i></h4><div><img style="float:left;margin-right:5px;margin-top:4px;" height="48px" width="48px" src="'.$trackInfo['albumArt'].'"><div class="nooverflow"><a href="'.$trackInfo['link'].'">'.$trackInfo['name'].'</a><br>'.$trackInfo['artist'].'<br>'.$trackInfo['album'].'</div></div><hr>';
 ?>
 <a class="batn" href="//youtube.com/@kylarz"><img src="img/yt.png"></a>
 <a class="batn" href="#" onclick="alert('discord is @jylarz');"><img src="img/discord.png"></a>
 <a class="batn" href="//twitter.com/asphaltk1cker"><img src="img/twitter.png"></a>
 <a class="batn" href="//last.fm/user/amerikaslatv"><img src="img/lastfm.png"></a>
 <a class="batn" href="//open.spotify.com/user/sdyd9c9gvrkh9wky5lyrpf46q"><img src="img/spotify.png"></a>
          </div>
        </div>
      </div>

      <footer>
        <p>made with <3 by kylarz</p>
      </footer>

    </div> <!-- /container -->

  </body>
</html>
