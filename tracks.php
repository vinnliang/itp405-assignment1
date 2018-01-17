<?php
  $pdo = new PDO('sqlite:chinook.db');
  $sql = '
    select tracks.Name as Track_Name, albums.title as Album_Title, artists.Name as Artist, tracks.UnitPrice as Price
    from tracks
    inner join albums
    on albums.AlbumId = tracks.AlbumId
    inner join artists
    on artists.ArtistId = albums.ArtistId
    order by TrackId asc
  ';
  $statement = $pdo->prepare($sql);
  $statement->execute();
  $tracks = $statement->fetchAll(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Tracks</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css">
  </head>
  <body>
    <table class="table">
      <tr>
        <th>Track Name</th>
        <th>Album Title</th>
        <th>Artist Name</th>
        <th>Price</th>
      </tr>
      <?php foreach($tracks as $track) : ?>
        <tr>
          <td><?php echo $track->Track_Name ?></td>
          <td><?php echo $track->Album_Title ?></td>
          <td><?php echo $track->Artist ?></td>
          <td><?php echo $track->Price ?></td>
        </tr>
      <?php endforeach ?>
    </table>
  </body>
</html>
