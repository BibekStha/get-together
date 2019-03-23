<?php
require_once '../model/database.php';
require_once '../model/playlist_db.php';

if(isset($_POST['deleteplaylist'])){
    $id = $_POST['playlistID'];
    $p = new PlaylistDB;
    $playlist = $p->getPlaylistByID($id);
}

if (isset($_POST['delete_playlist'])) {
    $p = new PlaylistDB();
    $playlist_id = $_POST['playlist_id'];
    $p->deletePlaylist($playlist_id);
    header("Location: index.php");
    exit;
}
include "playlistHeader.php";
?>
<!-- Form for editting a payment -->

<div id="container">
    <a href="index.php">
        <i class="fas fa-arrow-left" id="to-playlists"> Back to Playlists</i>
    </a>
    <h2 class="heading-style3">Delete Playlist: </h2>
    <form method="post" action="">
        <input type="hidden" name="playlist_id" value="<?= $playlist->playlist_id; ?>" />
        <p>Are you sure you want to delete the following playlist? </p>
        <div>
            <label for="name">Playlist Name: </label>
            <?= htmlspecialchars($playlist->name) ?>
        </div>
        <input class="btn form-action" type="submit" name="delete_playlist" value="Delete Playlist">
    </form>
</div>