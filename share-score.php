<?php
  /* ----------------------------------------------------------
     Ascend: Creature Evolution – share-score.php
     ----------------------------------------------------------
     Expected URL format:
       https://southernvalestudios.com/share-score.php?score=1234
  ----------------------------------------------------------- */

  // 1) Read and sanitise the score from the query‑string
  $score = isset($_GET['score']) ? intval($_GET['score']) : 0;

  // 2) Build the canonical share URL for the og:url tag
  $shareUrl = "https://southernvalestudios.com/share-score.php?score={$score}";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- ----------- SERVER‑RENDERED OPEN GRAPH TAGS ----------- -->
    <meta
      property="og:title"
      content="I scored <?php echo $score; ?> points in Ascend: Creature Evolution!"
    />
    <meta
      property="og:description"
      content="🏆 Think you can beat <?php echo $score; ?> points? Download the game and try your luck!"
    />
    <meta
      property="og:image"
      content="https://southernvalestudios.com/images/ascend-share-image.png"
    />
    <meta property="og:url" content="<?php echo $shareUrl; ?>" />
    <meta property="og:type" content="website" />
    <!-- ------------------------------------------------------- -->

    <title>Ascend: Creature Evolution – My Score</title>

    <style>
      body {
        font-family: Arial, sans-serif;
        text-align: center;
        padding: 20px;
        background: #f5f5f5;
      }
      .container {
        background: white;
        border-radius: 10px;
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      }
      .game-image {
        width: 45%;
        border-radius: 8px;
        margin: 15px 0;
      }
      .score {
        font-size: 28px;
        color: #89d62d;
        margin: 20px 0;
        font-weight: bold;
      }
      .play-button {
        width: 20%;
      }
      .countdown {
        color: #666;
        margin-top: 20px;
      }
    </style>
  </head>

  <body>
    <div class="container">
      <!-- Share image shown on the actual page -->
      <img
        src="https://southernvalestudios.com/images/ascend-creature-evolution.png"
        alt="Ascend – Creature Evolution Banner"
        class="game-image"
      />

      <!-- Visible score -->
      <div class="score">
        <?php echo $score; ?>
        points!
      </div>
      <p>Can you beat this score?</p>

      <!-- Play‑store button -->
      <a
        href="https://play.google.com/store/apps/details?id=com.daniosworld.game2048"
        class="play-button"
      >
        <img
          src="https://southernvalestudios.com/images/play_button_x3.png"
          alt="Download Now"
          class="game-image"
        />
      </a>

      <!-- Countdown message -->
      <p class="countdown" id="countdown">
        Redirecting to Google Play in&nbsp;5&nbsp;seconds…
      </p>
    </div>

    <script>
      /* ---------- Redirect after 5 seconds ---------- */
      let seconds = 5;
      const countdownElement = document.getElementById("countdown");

      const countdownInterval = setInterval(() => {
        seconds--;
        countdownElement.textContent = `Redirecting to Google Play in ${seconds} seconds…`;

        if (seconds <= 0) {
          clearInterval(countdownInterval);
          window.location.href =
            "https://play.google.com/store/apps/details?id=com.daniosworld.game2048";
        }
      }, 1000);
    </script>
  </body>
</html>
