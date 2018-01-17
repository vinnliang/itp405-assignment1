<?php
  $pdo = new PDO('sqlite:chinook.db');
  $sql = '
    select *
    from genres
    order by GenreId asc
  ';
  $statement = $pdo->prepare($sql);
  $statement->execute();
  $genres = $statement->fetchAll(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Genres</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css">
  </head>
  <body>
    <table class="table">
      <tr>
        <th>ID</th>
        <th>Name</th>
      </tr>
      <?php foreach($genres as $genre) : ?>
        <tr>
          <td><?php echo $genre->GenreId ?></td>
          <td><?php echo $genre->Name ?></td>
          <td>
            <a href="tracks.php?genre=<?php echo $genre->GenreId ?>">
              Tracks in this category
            </a>
          </td>
        </tr>
      <?php endforeach ?>
    </table>
  </body>
</html>
