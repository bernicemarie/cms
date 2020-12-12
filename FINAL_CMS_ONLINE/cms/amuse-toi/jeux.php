<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="css/style.css" />
    <title>Devine mon nombre!</title>
  </head>
  <body>
    <header>
      <h1>Devinez un nombre entre 1 et 20</h1>
      <a href="../index"> <p class="between"><button class="btn">Rétour</button></p></a>
      <button class="btn again">Jouez encore!</button>
      <div class="number">?</div>
    </header>
    <main>
      <section class="left">
        <input type="number" class="guess" />
        <button class="btn check">Verifie!</button>
      </section>
      <section class="right">
        <p class="message">Recherche...</p>
        <p class="label-score">💯 Score: <span class="score">20</span></p>
        <p class="label-highscore">
          🥇 Score élévé: <span class="highscore">0</span>
        </p>
      </section>
    </main>
    <script src="js/scripts.js"></script>
  </body>
</html>
