<?php

// init curl & set some options
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://www.reddit.com/search.json?q=title:ycombinator');
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// execute curl & parse json
$response = json_decode(curl_exec($ch));

curl_close($ch);

// print title and url for every result row
foreach($response->data->children as $row) {
  echo '<A HREF="';
	echo $row->data->url . PHP_EOL . PHP_EOL;
	echo '">';
    echo $row->data->title . PHP_EOL;
    echo '</a>';
    echo '</br>';
}
