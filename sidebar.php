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