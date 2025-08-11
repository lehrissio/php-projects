<?php
//Playlist Songs Manager (Part 1)

// Background Scenario:
// You are the curator of a series of digital playlists dedicated to enhancing focus while coding. It's time for some routine maintenance on your playlists to ensure they continue to provide the perfect backdrop for coding excellence. 🎵🔄

// Data Provided:
// $playlist (array): Your current playlist might look like this:['Starry Night', 'Moonlit Walk', 'Whispering Wind', 'Golden Horizon']
// Your script should handle varying arrays, testing its flexibility and reliability.

// Instructions:
// Playlist Verification: Start by determining if $playlist is set and contains any tracks. If it's not set or is lacking content, just output the message: "Your playlist needs an update. Time to discover more music!"
// Song Presence Check: Next, search $playlist for a specific track, "Sunny Days". If found, celebrate this excellent choice with a message: "You have great taste! 'Sunny Days' always lifts the mood!" 
// Playlist Update for Missing 'Sunny Days': If your playlist does not contain the song 'Sunny Days' and has at least two songs, update the $playlist variable by replacing the song in the second position with 'Solar Whispers'.
// Ensure you manipulate and update the $playlist array accordingly while applying array functions effectively. 🦾
// Keep in mind that the $playlist array is typically initialized before you start working with them
// However, for testing purposes, there might be instances where $playlist is not declared
// Ensure your script is robust enough to handle such scenarios 

// Write your code here
 
 if (!isset($playlist) || empty($playlist)) {
     echo "Your playlist needs an update. Time to discover more music!";
 } else if (in_array('Sunny Days', $playlist)){
     echo "You have great taste! 'Sunny Days' always lifts the mood!";
 } else if (count($playlist) >= 2) {
     $playlist[1] = 'Solar Whispers';
 }

//Playlist Songs Manager (Part 2)

// Background Scenario:
// As the curator of digital playlists that fuel coding focus, you’ve already made strides in maintaining your collection. Now, it's time to further refine your playlist by making some additional adjustments. 🎵🔄

// Data Provided:
// $playlist (array): Your current playlist might look like this: ['Starry Night', 'Moonlit Walk', 'Whispering Wind', 'Golden Horizon']
// $songRecommendations (array): A selection of recommended songs to consider, for example: ['Ocean Waves', 'City Nights', 'Rising Sun', 'Dancing Shadows', 'Eclipse']
// Your script should handle varying arrays, testing its flexibility and reliability.

// Instructions:
// Highlight the latest addition to your playlist: If your playlist has any songs, output the name of the last song in the format: "Your lastly added song was: '[song at last position]'." Ensure the instruction matches the exact output string required.
// Example: "Your lastly added song was: 'Golden Horizon'."
// Keep your playlist fresh: If it consists of 3 or fewer songs, enrich it by adding a random track from the $songRecommendations array to the end of $playlist
// Remove a Song: A well-curated playlist is never overcrowded. If your playlist has more than 10 songs, remove the song at the first position to keep your collection crisp.
// You will have access to both arrays $playlist and $songRecommendations

// Write your code here

$countPlaylist = count($playlist);
$countRecom = count($songRecommendations);

if (!empty($playlist)) {
    $lastSong = end($playlist);
    echo "Your lastly added song was: '{$lastSong}'.\n";
} 

if ($countPlaylist <= 3 ) {
    $playlist[] = $songRecommendations[array_rand($songRecommendations)];
}

if ($countPlaylist > 10) {
    array_shift($playlist);
}

