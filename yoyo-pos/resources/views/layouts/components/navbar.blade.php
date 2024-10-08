<nav class="navbar navbar-light">
    <style>
        .navbar {
  --c1: #4cc65f;
  --c2: #122643;

  height: 100vh;
  margin: 0;
  background: radial-gradient(
      circle at 27px 119px,
      var(--c1) 2px,
      transparent 3px
    ),
    radial-gradient(circle at 69px 79px, var(--c1) 2px, transparent 3px),
    radial-gradient(circle at 163px 57px, var(--c1) 2px, transparent 3px),
    radial-gradient(circle at 119px 180px, var(--c1) 4px, transparent 5px),
    radial-gradient(circle at 33px 69px, var(--c1) 4px, transparent 5px),
    radial-gradient(circle at 71px 177px, var(--c1) 6px, transparent 7px),
    radial-gradient(circle at 159px 133px, var(--c1) 6px, transparent 7px),
    radial-gradient(circle at 183px 23px, var(--c1) 6px, transparent 7px),
    radial-gradient(circle at 24px 166px, var(--c1) 7px, transparent 8px),
    radial-gradient(circle at 114px 134px, var(--c1) 7px, transparent 8px),
    radial-gradient(circle at 82px 38px, var(--c1) 7px, transparent 8px),
    radial-gradient(circle at 176px 176px, var(--c1) 9px, transparent 10px),
    radial-gradient(circle at 66px 120px, var(--c1) 9px, transparent 10px),
    radial-gradient(circle at 180px 94px, var(--c1) 9px, transparent 10px),
    radial-gradient(circle at 126px 16px, var(--c1) 9px, transparent 10px),
    radial-gradient(circle at 121px 71px, var(--c1) 14px, transparent 15px),
    radial-gradient(circle at 25px 25px, var(--c1) 14px, transparent 15px);
  background-size: 200px 200px;
  background-position: 0 0;
  background-color: var(--c2);
}

    </style>
    <div class="container">
        <a class="navbar-brand" href="http://yoyo.pos:8000/home#" style="color:#F9F9F9; 'Rubik Mono One', font-family:monospace; font-size:50px" >
            {{ config('app.system', 'Laravel') }}
        </a>
    </div>
</nav>
