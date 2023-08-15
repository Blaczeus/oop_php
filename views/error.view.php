<?php
$configuredStyles = <<<CSS
@import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@800&family=Roboto:wght@100;300&display=swap');

:root {
  --button: hsl(44, 0%, 70%);
  --button-color: hsl(0, 0%, 4%);
  --shadow: hsl(0, 0%, 0%);
  --bg: hsl(53, 0%, 45%);
  --header: hsl(53, 0%, 48%);
  --color: hsl(0, 0%, 98%);
  --lit-header: hsl(53, 0%, 90%);
  --speed: 2s;
}

* {
  box-sizing: border-box;
  transform-style: preserve-3d;
}

@property --swing-x {
  initial-value: 0;
  inherits: false;
  syntax: '<integer>';
}

@property --swing-y {
  initial-value: 0;
  inherits: false;
  syntax: '<integer>';
}

body {
  height: 100vh;
  display: flex;
  overflow: hidden;
  font-family: 'Roboto', sans-serif;
  flex-direction: column;
  align-items: center;
  background: var(--bg);
  color: var(--color);
  perspective: 1200px;
  justify-content: space-evenly;
}

.back-link{
  text-transform: uppercase;
  text-decoration: none;
  background: var(--button);
  color: var(--button-color);
  padding: 1rem 4rem;
  border-radius: 4rem;
  font-size: 0.875rem;
  letter-spacing: 0.05rem;
}

p {
  font-weight: 100;
}

h1 {
  animation: swing var(--speed) infinite alternate ease-in-out;
  font-size: clamp(5rem, 40vmin, 20rem);
  font-family: 'Open Sans', sans-serif;
  margin: 0;
  margin-bottom: 1rem;
  letter-spacing: 1rem;
  transform: translate3d(0, 0, 0vmin);
  --x: calc(50% + (var(--swing-x) * 0.5) * 1%);
  background: radial-gradient(var(--lit-header), var(--header) 45%) var(--x) 100% / 200% 200%;
  -webkit-background-clip: text;
  color: transparent;
}

h1::after {
  animation: swing var(--speed) infinite alternate ease-in-out;
  content: "$errcode";
  position: absolute;
  top: 0;
  left: 0;
  color: var(--shadow);
  filter: blur(1.5vmin);
  transform: scale(1.05) translate3d(0, 12%, -10vmin) translate(calc((var(--swing-x, 0) * 0.05) * 1%), calc((var(--swing-y) * 0.05) * 1%));
}

.cloak {
  animation: swing var(--speed) infinite alternate-reverse ease-in-out;
  height: 100%;
  width: 100%;
  transform-origin: 50% 30%;
  transform: rotate(calc(var(--swing-x) * -0.25deg));
  background: radial-gradient(40% 40% at 50% 42%, transparent, black 35%);
}

.cloak__wrapper {
  position: fixed;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  overflow: unset;
}

.cloak__container {
  height: 250vmax;
  width: 250vmax;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

.pg-content {
 align-items: center;
 display: flex;
 flex-direction: column;
 justify-content: center;
}

.info {
  text-align: center;
  max-width: clamp(16rem, 90vmin, 25rem);
}

.info > p {
  margin-bottom: 3rem;
}

@keyframes swing {
  0% {
    --swing-x: -100;
    --swing-y: -100;
  }
  50% {
    --swing-y: 0;
  }
  100% {
    --swing-y: -100;
    --swing-x: 100;
  }
}
CSS;
?>
<?php require "templates/header.php"; ?>
    <style>
        <?= $configuredStyles ?>
    </style>
    <main class="page-wrapper">
        <!-- Page content -->
        <section class="container d-flex flex-column h-100 align-items-center position-relative zindex-5 pt-5">
            <div class="text-center pt-5 pb-3 mt-auto">
                <div class="pg-content">
                    <h1 class="error-code"><?= $errcode ?></h1>
                    <div class="cloak__wrapper">
                        <div class="cloak__container">
                            <div class="cloak"></div>
                        </div>
                    </div>
                    <div class="info">
                        <h2 class="error-info" style="color: white; font-size: 40px; "><?= $errHeading; ?></h2>
                        <p class="error2-info" style="font-style: italic;">
                            <?= $errContent; ?>
                        </p>
                        <a class="back-link" href="/oop_php/notes">Back</a>
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php require "templates/footer.php"; ?>