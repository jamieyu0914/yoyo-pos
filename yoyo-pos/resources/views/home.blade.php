@extends('layouts.app')

@section('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<style>
    body {
    background: #F9F9F9;
}
.container {
    width: 100%;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}
.glass:first-child {
    margin-right: 120px;
}
/*-------------------------------

グラス

-------------------------------*/
.glass {
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
    z-index: 0;
    text-decoration: none;
    width: 320px;
    height: 80px;
    background: rgba(255, 255, 255, 0.2);
    background: linear-gradient(90deg, rgba(255, 255, 255, 0.2), rgba(255, 255, 255, 0), rgba(255, 255, 255, 0.2));
    border-radius: 0 0 12px 12px;
}
.glass::before {
    content: '';
    position: absolute;
    z-index: -1;
    top: -22px;
    left: -6px;
    width: 10px;
    height: 100px;
    transform-origin: top left;
    border-radius: 0 6px 0 0;
    transform: rotate(-20deg);
}
.glass::after {
    content: '';
    position: absolute;
    z-index: -1;
    top: -24px;
    left: -31px;
    width: 36px;
    height: 10px;
    transform-origin: top left;
    border-radius: 0 6px 0 0;
}
.glass.soda::before,
.glass.soda::after {
    background: #ff3363;
}
.glass.cola::before,
.glass.cola::after {
    background: #fff;
}
/*-------------------------------

テキスト

-------------------------------*/
.text {
    position: relative;
    z-index: 4;
    font-family: 'Rubik Mono One', monospace;
    font-weight: 400;
    font-style: normal;
    font-size: 28px;
    letter-spacing: 0.2em;
    color: #fff;
}
/*-------------------------------

反射

-------------------------------*/
.reflection {
    position: absolute;
    z-index: 9;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    box-sizing: border-box;
    border: solid 2px rgba(255, 255, 255, 0.8);
    border-radius: inherit;
}
.reflection::before,
.reflection::after {
    content: '';
    position: absolute;
    left: 0;
    right: 0;
    margin: 0 auto;
    width: calc(100% - 12px);
}
.reflection::before {
    top: 4px;
    height: calc(100% - 12px);
    background: linear-gradient(0deg, rgba(255, 255, 255, 0), rgba(255, 255, 255, 0.8));
    clip-path: polygon(0% 0%, 100% 0%, 100% 100%, 90% 100%, 90% 0%, 15% 0%, 15% 100%, 12% 100%, 12% 0%, 8% 0%, 8% 100%, 0% 100%);
}
.reflection::after {
    bottom: 6px;
    height: 40%;

    border-radius: 0 0 6px 6px;
}
.glass.soda .reflection::after {
    background: linear-gradient(0deg, rgba(255, 255, 255, 0.6), rgba(255, 255, 255, 0));
}
.glass.cola .reflection::after {
    background: linear-gradient(0deg, rgba(255, 255, 255, 0.3), rgba(255, 255, 255, 0));
}
/*-------------------------------

氷

-------------------------------*/
.iceWrap {
    position: absolute;
    z-index: 3;
    top: 0;
    left: 0;
    right: 0;
    margin: 0 auto;
    width: calc(100% - 12px);
    height: calc(100% - 6px);
}
.ice {
    position: absolute;
    width: 32px;
    height: 32px;
    transition: all ease 4s;
    animation: ice ease 5s infinite;
}
.ice::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border-radius: 3px;
    background: radial-gradient(rgba(255, 255, 255, 0.1) 50%, rgba(255, 255, 255, 0.5));
    mix-blend-mode: soft-light;
}
.ice-1 {
    left: 3%;
    bottom: 40%;
    transform: rotate(-25deg);
}
.ice-2 {
    left: 15%;
    bottom: 20%;
    transform: rotate(34deg);
}
.ice-3 {
    left: 35%;
    bottom: 35%;
    transform: rotate(20deg);
}
.ice-4 {
    left: 50%;
    bottom: 30%;
    transform: rotate(-22deg);
}
.ice-5 {
    left: 70%;
    bottom: 50%;
    transform: rotate(30deg);
}
.ice-6 {
    left: 84%;
    bottom: 30%;
    transform: rotate(-47deg);
}

/*-------------------------------

ジュース

-------------------------------*/
.waveWrap {
    position: absolute;
    z-index: 2;
    top: 0;
    left: 0;
    right: 0;
    margin: 0 auto;
    width: calc(100% - 12px);
    height: calc(100% - 6px);
    border-radius: 0 0 6px 6px;
    overflow: hidden;
}
.waveWrap::before {
    content: '';
    position: absolute;
    z-index: 2;
    bottom: 0;
    left: 0;
    right: 0;
    margin: 0 auto;
    width: 100%;
    height: 30%;
    border-radius: 0 0 4px 4px;
    background: linear-gradient(0deg, rgba(255, 255, 255, 0.6), rgba(255, 255, 255, 0));
    mix-blend-mode: soft-light;
}
.wave {
    position: absolute;
    top: 10%;
    left: 0;
    width: 100%;
    height: 100%;
    clip-path: path('M0,124V2.71c122.49-10.81,209.27,15.25,320,0v121.29H0Z');
    animation: wave1 ease 5s infinite;
    transition: all ease 4s;
}
.wave::before,
.wave::after {
    content: '';
    position: absolute;
    left: 0;
    width: 100%;
    height: 100%;
}
.wave::before {
    top: 0%;
    clip-path: path('M0,1.15v78.25h320V1.15C206.2-3.87,122.14,9.73,0,1.15Z');
    animation: wave2 ease 6s infinite;
    background-color: hsla(0, 0%, 100%, 0);
}
.wave::after {
    top: 0%;
    clip-path: path('M0,124V2.71c122.49-10.81,209.27,15.25,320,0v121.29H0Z');
    animation: wave1 ease 7s infinite;
    background-color: hsla(0, 0%, 100%, 0);
}
.glass.soda .wave {
    background-color: hsla(184, 100%, 83%, 0.8);
    background-image: radial-gradient(at 15% 25%, hsla(197, 71%, 55%, 0.53) 0px, transparent 50%), radial-gradient(at 78% 30%, hsla(178, 100%, 77%, 0.73) 0px, transparent 50%), radial-gradient(at 94% 92%, hsla(210, 97%, 57%, 0.84) 0px, transparent 50%), radial-gradient(at 11% 87%, hsla(176, 100%, 52%, 0.63) 0px, transparent 50%), radial-gradient(at 45% 86%, hsla(178, 75%, 49%, 0.63) 0px, transparent 50%);
}
.glass.soda .wave::before {
    mix-blend-mode: hard-light;
    background-image: radial-gradient(at 28% 80%, hsla(197, 71%, 55%, 0.53) 0px, transparent 50%), radial-gradient(at 66% 64%, hsla(178, 100%, 77%, 0.73) 0px, transparent 50%), radial-gradient(at 94% 28%, hsla(210, 97%, 57%, 0.84) 0px, transparent 50%), radial-gradient(at 50% 32%, hsla(176, 100%, 52%, 0.63) 0px, transparent 50%), radial-gradient(at 16% 29%, hsla(178, 75%, 49%, 0.63) 0px, transparent 50%);
}
.glass.soda .wave::after {
    background-image: radial-gradient(at 25% 51%, hsla(197, 71%, 55%, 0.53) 0px, transparent 50%), radial-gradient(at 69% 48%, hsla(178, 100%, 77%, 0.73) 0px, transparent 50%), radial-gradient(at 10% 94%, hsla(210, 97%, 57%, 0.84) 0px, transparent 50%), radial-gradient(at 90% 90%, hsla(176, 100%, 52%, 0.63) 0px, transparent 50%), radial-gradient(at 60% 89%, hsla(178, 75%, 49%, 0.63) 0px, transparent 50%);
}
.glass.cola .wave {
    background-color: hsla(26, 77%, 83%, 0.8);
    background-image: radial-gradient(at 25% 51%, hsla(18, 74%, 47%, 0.53) 0px, transparent 50%), radial-gradient(at 69% 48%, hsla(18, 100%, 60%, 0.73) 0px, transparent 50%), radial-gradient(at 9% 94%, hsla(18, 77%, 20%, 0.84) 0px, transparent 50%), radial-gradient(at 90% 90%, hsla(0, 88%, 18%, 0.63) 0px, transparent 50%), radial-gradient(at 60% 89%, hsla(0, 52%, 64%, 0.63) 0px, transparent 50%);
}
.glass.cola .wave::before {
    mix-blend-mode: color-burn;
    background-image: radial-gradient(at 85% 18%, hsla(18, 74%, 47%, 0.53) 0px, transparent 50%), radial-gradient(at 52% 26%, hsla(18, 100%, 60%, 0.73) 0px, transparent 50%), radial-gradient(at 12% 18%, hsla(18, 56%, 48%, 0.84) 0px, transparent 50%), radial-gradient(at 22% 81%, hsla(5, 73%, 54%, 0.63) 0px, transparent 50%), radial-gradient(at 75% 82%, hsla(0, 52%, 64%, 0.63) 0px, transparent 50%);
}
.glass.cola .wave::after {
    mix-blend-mode: multiply;
    background-image: radial-gradient(at 86% 93%, hsla(18, 62%, 27%, 1) 0px, transparent 50%), radial-gradient(at 76% 24%, hsla(14, 73%, 30%, 0.93) 0px, transparent 50%), radial-gradient(at 48% 94%, hsla(1, 53%, 32%, 0.92) 0px, transparent 50%), radial-gradient(at 12% 95%, hsla(0, 52%, 21%, 0.86) 0px, transparent 50%), radial-gradient(at 12% 16%, hsla(0, 47%, 36%, 0.94) 0px, transparent 50%), radial-gradient(at 30% 45%, hsla(0, 52%, 64%, 0.63) 0px, transparent 50%);
}
/*-------------------------------

炭酸

-------------------------------*/
.glass .bubbleWrap {
    position: absolute;
    top: 0%;
    left: 0;
    width: 100%;
    height: 125%;
    overflow: hidden;
}
.glass .bubble {
    position: absolute;
    z-index: 3;
    bottom: 0;
    aspect-ratio: 1/1;
    transition: 1.5s;
    animation-name: up;
    animation-iteration-count: infinite;
    mix-blend-mode: hard-light;
}
.bubble::before,
.bubble::after {
    content: '';
    position: absolute;
    border-radius: 50%;
}
.glass.soda .bubble::before,
.glass.soda .bubble::after {
    background: radial-gradient(rgba(255, 255, 255, 0) 30%, rgba(255, 255, 255, 0.6));
}
.glass.cola .bubble::before,
.glass.cola .bubble::after {
    background: radial-gradient(rgba(255, 255, 255, 0) 30%, rgba(255, 255, 255, 0.2));
}
.bubble::before {
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}
.bubble.sz-s::after {
    top: 120%;
    left: -600%;
    width: 200%;
    height: 200%;
}
.bubble.sz-m::after {
    top: 300%;
    left: 400%;
    width: 110%;
    height: 110%;
}
.bubble.sz-l::after {
    top: 300%;
    left: -500%;
    width: 60%;
    height: 60%;
}
/*-------------------------------
サイズ
-------------------------------*/
.glass .bubble.sz-l {
    width: 4%;
}
.glass .bubble.sz-m {
    width: 3%;
}
.glass .bubble.sz-s {
    width: 2%;
}
/*-------------------------------
遅延
-------------------------------*/
.glass .bubble.sp-1 {
    animation-duration: 1.5s;
}
.glass .bubble.sp-2 {
    animation-duration: 1.8s;
}
.glass .bubble.sp-3 {
    animation-duration: 2.2s;
}
.glass .bubble.dl-2 {
    animation-delay: 0.4s;
}
.glass .bubble.dl-3 {
    animation-delay: 0.8s;
}
.glass .bubble.dl-4 {
    animation-delay: 1.2s;
}
.glass .bubble.dl-5 {
    animation-delay: 1.6s;
}
/*-------------------------------
配置
-------------------------------*/
.glass .bubble:nth-child(1) {
    right: 0%;
}
.glass .bubble:nth-child(2) {
    right: 15%;
}
.glass .bubble:nth-child(3) {
    right: 6%;
}
.glass .bubble:nth-child(4) {
    right: 12%;
}
.glass .bubble:nth-child(5) {
    right: 20%;
}
.glass .bubble:nth-child(6) {
    right: 14%;
}
.glass .bubble:nth-child(7) {
    right: 20%;
}
.glass .bubble:nth-child(8) {
    right: 25%;
}
.glass .bubble:nth-child(9) {
    right: 28%;
}
.glass .bubble:nth-child(10) {
    right: 33%;
}
.glass .bubble:nth-child(11) {
    right: 35%;
}
.glass .bubble:nth-child(12) {
    right: 38%;
}
.glass .bubble:nth-child(13) {
    right: 42%;
}
.glass .bubble:nth-child(14) {
    right: 48%;
}
.glass .bubble:nth-child(15) {
    right: 50%;
}
.glass .bubble:nth-child(16) {
    right: 47%;
}
.glass .bubble:nth-child(17) {
    right: 55%;
}
.glass .bubble:nth-child(18) {
    right: 57%;
}
.glass .bubble:nth-child(19) {
    right: 59%;
}
.glass .bubble:nth-child(20) {
    right: 62%;
}
.glass .bubble:nth-child(21) {
    right: 64%;
}
.glass .bubble:nth-child(22) {
    right: 66%;
}
.glass .bubble:nth-child(23) {
    right: 69%;
}
.glass .bubble:nth-child(24) {
    right: 72%;
}
.glass .bubble:nth-child(25) {
    right: 74%;
}
.glass .bubble:nth-child(26) {
    right: 78%;
}
.glass .bubble:nth-child(27) {
    right: 80%;
}
.glass .bubble:nth-child(28) {
    right: 82%;
}
.glass .bubble:nth-child(29) {
    right: 84%;
}
.glass .bubble:nth-child(30) {
    right: 86%;
}
.glass .bubble:nth-child(31) {
    right: 70%;
}
.glass .bubble:nth-child(32) {
    right: 98%;
}
.glass .bubble:nth-child(33) {
    right: 82%;
}
.glass .bubble:nth-child(34) {
    right: 88%;
}
.glass .bubble:nth-child(35) {
    right: 94%;
}
.glass .bubble:nth-child(36) {
    right: 96%;
}
/*-------------------------------

レモン&ライム

-------------------------------*/
.fruit {
    position: absolute;
    top: -32px;
    right: -32px;
    width: 64px;
    height: 64px;
    border-radius: 50%;
    box-sizing: border-box;
    border-style: solid;
    border-width: 3px;
}
.fruit::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    margin: auto;
    width: calc(100% - 6px);
    height: calc(100% - 6px);
    border-radius: 50%;
}
.fruit__inner {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    margin: auto;
    width: 3px;
    height: 100%;
}
.fruit__inner::before,
.fruit__inner::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    margin: auto;
    width: 100%;
    height: 100%;
    background: inherit;
}
.fruit__inner::before {
    transform: rotate(60deg);
}
.fruit__inner::after {
    transform: rotate(-60deg);
}
.fruit--lemon {
    background: #fffede;
    border-color: #ffe605;
}
.fruit--lemon::before {
    background: #fff77a;
}
.fruit--lemon .fruit__inner {
    background: #fffede;
}
.fruit--lime {
    background: #eaffb3;
    border-color: #62c800;
}
.fruit--lime::before {
    background: #a3ff6e;
}
.fruit--lime .fruit__inner {
    background: #eaffb3;
}
/*-------------------------------

アクション

-------------------------------*/
.glass:hover .ice {
    bottom: 0px;
    transform: rotate(0deg);
}
.glass:hover .wave {
    top: 100%;
}
@keyframes up {
    0% {
        bottom: 0%;
    }
    100% {
        bottom: 120%;
    }
}
@keyframes wave1 {
    0% {
        clip-path: path('M0,124V2.71c122.49-10.81,209.27,15.25,320,0v121.29H0Z');
    }
    50% {
        clip-path: path('M0,123.96V2.66c122.28,13.91,215.81-10.38,320,0v121.29H0Z');
    }
    100% {
        clip-path: path('M0,124V2.71c122.49-10.81,209.27,15.25,320,0v121.29H0Z');
    }
}
@keyframes wave2 {
    0% {
        clip-path: path('M0,1.15v78.25h320V1.15C206.2-3.87,122.14,9.73,0,1.15Z');
    }
    50% {
        clip-path: path('M0,1.75v78.25h320V1.75C209.27,11.59,122.49-5.22,0,1.75Z');
    }
    100% {
        clip-path: path('M0,1.15v78.25h320V1.15C206.2-3.87,122.14,9.73,0,1.15Z');
    }
}
</style>

<div class="container">
    <div class="container">
        <a href="#" class="glass soda">
          <div class="waveWrap">
            <div class="wave">
              <div class="bubbleWrap">
                <div class="bubble sz-s sp-1 dl-2"></div>
                <div class="bubble sz-m sp-3 dl-1"></div>
                <div class="bubble sz-l sp-2 dl-5"></div>
                <div class="bubble sz-s sp-2 dl-3"></div>
                <div class="bubble sz-m sp-3 dl-2"></div>
                <div class="bubble sz-l sp-1 dl-3"></div>
                <div class="bubble sz-s sp-2 dl-1"></div>
                <div class="bubble sz-m sp-1 dl-1"></div>
                <div class="bubble sz-l sp-3 dl-5"></div>
                <div class="bubble sz-s sp-1 dl-2"></div>
                <div class="bubble sz-m sp-3 dl-4"></div>
                <div class="bubble sz-l sp-2 dl-3"></div>
                <div class="bubble sz-m sp-1 dl-2"></div>
                <div class="bubble sz-l sp-3 dl-3"></div>
                <div class="bubble sz-s sp-1 dl-4"></div>
                <div class="bubble sz-m sp-2 dl-1"></div>
                <div class="bubble sz-s sp-1 dl-2"></div>
                <div class="bubble sz-m sp-3 dl-1"></div>
                <div class="bubble sz-l sp-2 dl-5"></div>
                <div class="bubble sz-s sp-2 dl-3"></div>
                <div class="bubble sz-m sp-3 dl-2"></div>
                <div class="bubble sz-l sp-1 dl-3"></div>
                <div class="bubble sz-s sp-2 dl-1"></div>
                <div class="bubble sz-m sp-1 dl-1"></div>
                <div class="bubble sz-l sp-3 dl-5"></div>
                <div class="bubble sz-s sp-1 dl-2"></div>
                <div class="bubble sz-m sp-3 dl-4"></div>
                <div class="bubble sz-l sp-2 dl-3"></div>
                <div class="bubble sz-m sp-1 dl-2"></div>
                <div class="bubble sz-l sp-3 dl-3"></div>
                <div class="bubble sz-s sp-1 dl-4"></div>
                <div class="bubble sz-m sp-2 dl-1"></div>
                <div class="bubble sz-m sp-1 dl-1"></div>
                <div class="bubble sz-l sp-3 dl-4"></div>
                <div class="bubble sz-s sp-1 dl-5"></div>
                <div class="bubble sz-m sp-2 dl-2"></div>
              </div>
            </div>
          </div>
          <div class="fruit fruit--lime">
            <div class="fruit__inner"></div>
          </div>
          <div class="iceWrap">
            <div class="ice ice-1"></div>
            <div class="ice ice-2"></div>
            <div class="ice ice-3"></div>
            <div class="ice ice-4"></div>
            <div class="ice ice-5"></div>
            <div class="ice ice-6"></div>
          </div>
          <span class="text">我是店員</span>
          <div class="reflection"></div>
        </a>

        <a href="#" class="glass cola">
          <div class="waveWrap">
            <div class="wave">
              <div class="bubbleWrap">
                <div class="bubble sz-s sp-1 dl-2"></div>
                <div class="bubble sz-m sp-3 dl-1"></div>
                <div class="bubble sz-l sp-2 dl-5"></div>
                <div class="bubble sz-s sp-2 dl-3"></div>
                <div class="bubble sz-m sp-3 dl-2"></div>
                <div class="bubble sz-l sp-1 dl-3"></div>
                <div class="bubble sz-s sp-2 dl-1"></div>
                <div class="bubble sz-m sp-1 dl-1"></div>
                <div class="bubble sz-l sp-3 dl-5"></div>
                <div class="bubble sz-s sp-1 dl-2"></div>
                <div class="bubble sz-m sp-3 dl-4"></div>
                <div class="bubble sz-l sp-2 dl-3"></div>
                <div class="bubble sz-m sp-1 dl-2"></div>
                <div class="bubble sz-l sp-3 dl-3"></div>
                <div class="bubble sz-s sp-1 dl-4"></div>
                <div class="bubble sz-m sp-2 dl-1"></div>
                <div class="bubble sz-s sp-1 dl-2"></div>
                <div class="bubble sz-m sp-3 dl-1"></div>
                <div class="bubble sz-l sp-2 dl-5"></div>
                <div class="bubble sz-s sp-2 dl-3"></div>
                <div class="bubble sz-m sp-3 dl-2"></div>
                <div class="bubble sz-l sp-1 dl-3"></div>
                <div class="bubble sz-s sp-2 dl-1"></div>
                <div class="bubble sz-m sp-1 dl-1"></div>
                <div class="bubble sz-l sp-3 dl-5"></div>
                <div class="bubble sz-s sp-1 dl-2"></div>
                <div class="bubble sz-m sp-3 dl-4"></div>
                <div class="bubble sz-l sp-2 dl-3"></div>
                <div class="bubble sz-m sp-1 dl-2"></div>
                <div class="bubble sz-l sp-3 dl-3"></div>
                <div class="bubble sz-s sp-1 dl-4"></div>
                <div class="bubble sz-m sp-2 dl-1"></div>
                <div class="bubble sz-m sp-1 dl-1"></div>
                <div class="bubble sz-l sp-3 dl-4"></div>
                <div class="bubble sz-s sp-1 dl-5"></div>
                <div class="bubble sz-m sp-2 dl-2"></div>
              </div>
            </div>
          </div>
          <div class="fruit fruit--lemon">
            <div class="fruit__inner"></div>
          </div>
          <div class="iceWrap">
            <div class="ice ice-1"></div>
            <div class="ice ice-2"></div>
            <div class="ice ice-3"></div>
            <div class="ice ice-4"></div>
            <div class="ice ice-5"></div>
            <div class="ice ice-6"></div>
          </div>
          <span class="text">後台管理</span>
          <div class="reflection"></div>
        </a>
      </div>
</div>

<script>
</script>

@endsection
