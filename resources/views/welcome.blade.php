<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Shombhob</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
           * {
  font-family: 'montserrat', sans-serif;
}

body {
  margin: 0;
  padding: 0;
}

.page {
  background: #f1f1f1;
  display: flex;
  flex-wrap: wrap;
}

.col {
  flex: 1;
  height: 100vh;
  position: relative;
}

.countdown-col {
  background: url(https://fadzrinmadu.github.io/hosted-assets/responsive-coming-soon-page-with-awesome-newsletter-html-css-and-js/bg.png) no-repeat center;
  background-size: cover;
}

.time {
  color: #fff;
  text-transform: uppercase;
  width: 90%;
  display: flex;
  justify-content: center;
}

.middle {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
}

.time span {
  padding: 0 14px;
  font-size: 10px;
}

.time span div {
  font-size: 40px;
}

.newslatter {
  width: 90%;
}

.newslatter h4 {
  font-style: italic;
  font-size: 12px;
}

.newslatter input, .newslatter button {
  display: block;
  margin: 12px auto;
  width: 100%;
  max-width: 400px;
  box-sizing: border-box;
  padding: 14px 20px;
  border-radius: 30px;
  border: 1px solid #ddd;
  outline: none;
}

.newslatter-button {
  background: linear-gradient(125deg, #3498db, #34495e);
  color: #fff;
  cursor: pointer;
  transition: 0.4s;
}

.newslatter-button:hover {
  opacity: 0.7;
}


@media screen and (max-width: 900px) {
  .col {
    flex: 100%;
  }
}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="page">
  <div class="countdown-col col">
    <div class="time middle">
      <span><div id="days">5</div> Days</span>
      <span><div id="hours">120</div> Hours</span>
      <span><div id="minutes">7200</div> Minutes</span>
      <span><div id="seconds">432000</div> Seconds</span>
    </div>
  </div>
  <div class="newsletter-col col">
    <div class="newslatter middle">
      <h2 style="color: red">Welcome to Shombhob Health</h2>
      <h4>Stay with us</h4>
    </div>
  </div>
</div>
    </body>
</html>
