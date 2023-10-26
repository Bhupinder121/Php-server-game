<?php
  session_start();
?>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="game.css" />
    <title>Speed Typer</title>
  </head>
  <body>
    <div class="navbar navbar-dark bg-dark">
      <h2 style="color: white;">👩‍💻 Typing Game 👨‍💻</h2>
      <div class="icon">
        <span id="username">👤<?php echo($_SESSION["username"]) ?></span>
      </div>
    </div>
    

    <div id="settings" class="settings">
      <form id="settings-form">
        <div>
          <label for="difficulty">Difficulty</label>
          <select id="difficulty">
            <option value="easy">Easy</option>
            <option value="medium">Medium</option>
            <option value="hard">Hard</option>
          </select>
        </div>
      </form>
    </div>

    <div class="container">
      <p class="time-container">⏰Time left: <span id="time">10s</span></p>
      
      <p class="score-container">💥Score: <span id="score">0</span></p>
      
      <small>Type the following:</small>

      <h1 id="word"></h1>

      <input
        type="text"
        id="text"
        autocomplete="off"
        placeholder="Type the word here..."
        autofocus
      />

      

      <div id="end-game-container" class="end-game-container"></div>
    </div>
    <button class="leader">Leader Board</button>
    <script src="game.js"></script>
  </body>
</html>