<!DOCTYPE html>
<html>
<head>
    <title>CHESS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <style type="text/css">
        body {
    font-family:chess;
    margin: 0;
    background-color:#DEB887;
             }
   
        .square {
    background:#afa;
    display:inline-block;
    border:3px solid red;
    text-align:center;
    position: absolute;
    cursor: pointer;
             }
        .square:hover {
            color: blue;
        }
        .rect {
    display:inline-block;
    text-align:center;
    position: absolute;
    top: 0%;
    left: 0%;
             }
        .rect:hover{
            color: red;
        }
        .rect1 {
    display:inline-block;
    text-align:center;
    position: absolute;
    top: 0%;
    left: 0%;
             }
        .rect1:hover{
            color: red;
        }
        .stp {
            font-size:25px;
            text-align: center;
            border:3px solid #FFB6C1;
            width:280px;
            height:30px;
            position:absolute;
            color:blue;
            background-color: #F08080;
            top:45%;
            left:77%;
           
        }
        .ccc {
            font-size:20px;
            text-align: center;
            border:3px solid #FFB6C1;
            width:280px;
            height:60px;
            position:absolute;
            color:black;
            background-color: #F08080;
            left:77%;
            top:5%;
           
        }
        .ddd {
            font-size:20px;
            text-align: center;
            border:3px solid #FFB6C1;
            width:280px;
            height:30px;
            position:absolute;
            color:black;
            background-color: #F08080;
            left:77%;
            top:10%;

        }
        
        .clockpos .btn{
            position:absolute;
            top:50%;
            left:82%;
            width:150px;
            height:50px;
            border:3px solid #FFB6C1;
            text-align: center;
        }
        .clockpos .btn:hover{
            background-color: #F08080;
            color:red;
        }
        .stopwatch {
            font-size: 50px;
            text-align: center;
            font-family: monospace;
            border:3px solid #FFB6C1;
            width:280px;
            height:60px;
            position:absolute;
            color:blue;
            background-color: #F08080;
            left:77%;
            top:35%;
        }
        
        .controls .kkv2{
            position:absolute;
            top:60%;
            left:82%;
            width:150px;
            height:50px;
            border:3px solid #FFB6C1;
            background-color: #FAFAD2;
            text-align: center;
        }
        .controls .kkv2:hover{
            background-color: #F08080;
            color:red;
        }
               .restart .restartb {
            position:absolute;
            top:70%;
            left:82%;
            width:150px;
            height:50px;
            border:3px solid #FFB6C1;
            background: #FAFAD2;
            text-align: center;
        }
        .restart .restartb:hover{
             background-color: #F08080;
            color:red;
        }
        .home .homeg {
            position:absolute;
            top:80%;
            left:82%;
            width:150px;
            height:50px;
            border:3px solid #FFB6C1;
            text-align: center;
            background-color: #FAFAD2;
        }
        .home .homeg:hover{
             background-color: #F08080;
            color:red;
        }
    </style>
</head>
<body>

    <div id="container"></div>
    <div id="contains"></div>
    <div id="containss"></div>
    <div id="clock" class="ccc"></div>
    <div id="day" class="ddd"></div>
    <div class="clockpos"></div>
    <div class="restart"><a href="computer"><button class="restartb">RESTART GAME</button></a></div>
    <div class="home"><a href="./"><button class="homeg">HOME</button></a></div>
    
    <div class="stp">STOP WATCH</div>
    <div class="stopwatch">00:00:00</div>
    <div class="controls">
        <button class="kkv2" onclick="pausee()">PAUSE / RESUME</button> </div>

    
    
   

    <script type="text/javascript">
    alert("This game has a time limit of 1 min for each step.\n As you click 'OK' , your time will start");
    window.onload = function(){
    var w = window.innerWidth ;
    var h = window.innerHeight ;
    
    var tsw = (w > h) ? h : w;
    
    var sw = (tsw-16)/8;
    var kw =(tsw-16)/8;
    var count=0;
    
    //making chess board

    var container = document.getElementById("container");
    var contains = document.getElementById("contains");
    var contains = document.getElementById("containss");

    for(var n = 0; n < 64; n++){
        var square = document.createElement("div");
        square.classList.add("square");
        square.classList.add("s"+n);
        square.style.height = sw + 'px';
        square.style.width = sw + 'px';
        square.style.top = 7+(h-tsw)/2+sw*(Math.floor(n/8)) + 'px';
        square.style.left = 7+(w-tsw)/2+sw*(Math.floor(n%8)) + 'px';
        square.style.fontSize = sw*3/4 + 'px';
        container.appendChild(square);
    }
    for(var n = 0; n < 16; n++){
        var rect = document.createElement("div");
        rect.classList.add("rect");
        rect.classList.add("r"+n);
        rect.style.height = kw + 'px';
        rect.style.width = kw + 'px';
        rect.style.top = 10+  (h-tsw)/2+kw*3/4*(Math.floor(n/5)) + 'px';
        rect.style.left = (w-tsw)/2+kw*3/4 *(Math.floor(n%5)) -325 + 'px';
        rect.style.fontSize = kw*3/4 + 'px';
        contains.appendChild(rect);
    }
    for(var n = 0; n < 16; n++){
        var rect1 = document.createElement("div");
        rect1.classList.add("rect1");
        rect1.classList.add("r"+n);
        rect1.style.height = kw + 'px';
        rect1.style.width = kw + 'px';
        rect1.style.top =400+  (h-tsw)/2+kw*3/4*(Math.floor(n/5)) + 'px';
        rect1.style.left = (w-tsw)/2+kw*3/4*(Math.floor(n%5)) -325 + 'px';
        rect1.style.fontSize = kw*3/4 + 'px';
        containss.appendChild(rect1);
    }

    var fonts = {
        'l' : '&#9812;',   //white king
        'w' : '&#9813;',   //white queen
        't' : '&#9814',    //white rock
        'v' : '&#9815',     //white bishop
        'm' : '&#9816',     //white knight
        'o' : '&#9817',     //white pawn
        'k' : '&#9818;',    //black king
        'q' : '&#9819;',    //black queen
        'r' : '&#9820',     //black rock
        'b' : '&#9821',     //black bishop
        'n' : '&#9822',     //black knight
        'p' : '&#9823',    //black pawn
    }
    
    var values = ['r','n','b','q','k','b','n','r','p','p','p','p','p','p','p','p',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'o','o','o','o','o','o','o','o','t','m','v','w','l','v','m','t'];
    var ck = false;
    var cr1 = false;
    var cr2 = false;
    var cl;
    
    var sqs = document.getElementsByClassName("square");
    var rts = document.getElementsByClassName("rect");
    var rts1 = document.getElementsByClassName("rect1");
    for(var n = 0; n < 64; n++){
        if(values[n] !== 0){
           sqs[n].innerHTML = fonts[values[n]];
        }
        sqs[n].addEventListener("click",check);
    }
    
    function updateSquarecolor(){
        for(var n = 0; n < 64; n++){
            if(Math.floor(n/8)%2 === 0){
                if(n%2 === 0){
                    sqs[n].style.background = '#D2691E';
                }
                else {
                    sqs[n].style.background = '#FF7F50';
                }
            }
            else {
                if(n%2 === 1){
                    sqs[n].style.background = '#D2691E';
                }
                else {
                    sqs[n].style.background = '#FF7F50';
                }
            }
        }
    }
    startTime()
    start()
    updateSquarecolor();

    var moveable = false;
    var moveTarget = "";
    var moveScopes = [];
    var these = [];
    var those = [];


    function checkBlack(n,values){
        var target = values[n];
        var scopes = [];
        var x = n;
       
        if(target === "o"){
            x -= 8;
            if("prnbkq".indexOf(values[x-1]) >= 0 && x%8 != 0){
                scopes.push(x-1);
            }
            if("prnbkq".indexOf(values[x+1]) >= 0 && x%8 != 7){
                scopes.push(x+1);
            }
            if(x >= 0 && values[x] === 0){
                scopes.push(x);
                if(x >= 40){
                    if(x-8 >= 0 && values[x-8] === 0){
                        scopes.push(x-8);
                    }
                }
            }
        }
       
        else if(target === "t"){
            x = n;
            x -= 8;
            while(x >= 0){
                if(values[x] === 0){
                    scopes.push(x);
                }
                else if("prnbqk".indexOf(values[x]) >= 0){
                    scopes.push(x);
                    break;
                }
                else {
                    break;
                }
                x -= 8;
            }
            x = n;
            x += 8;
            while(x < 64){
                if(values[x] === 0){
                    scopes.push(x);
                }
                else if("prnbqk".indexOf(values[x]) >= 0){
                    scopes.push(x);
                    break;
                }
                else {
                    break;
                }
                x += 8;
            }
            x = n;
            x++;
            while(x%8 != 0){
                if(values[x] === 0){
                    scopes.push(x);
                }
                else if("prnbqk".indexOf(values[x]) >= 0){
                    scopes.push(x);
                    break;
                }
                else {
                    break;
                }
                x++;
            }
            x = n;
            x--;
            while(x%8 != 7){
                if(values[x] === 0){
                    scopes.push(x);
                }
                else if("prnbqk".indexOf(values[x]) >= 0){
                    scopes.push(x);
                    break;
                }
                else {
                    break;
                }
                x--;
            }
        }
        
        else if(target === "m"){
            x = n;
            if(x%8 > 1 && x%8 < 6){
                x -= 17;
                if(("prnbqk".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                    scopes.push(x);
                }
                x = n;
                x -= 15;
                if(("prnbqk".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                    scopes.push(x);
                }

                x = n;
                x -= 10;
                if(("prnbqk".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                    scopes.push(x);
                }
                x = n;
                x -= 6;
                if(("prnbqk".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                    scopes.push(x);
                }
                x = n;
                x += 6;
                if(("prnbqk".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                    scopes.push(x);
                }
                x = n;
                x += 10;
                if(("prnbqk".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                    scopes.push(x);
                }
                x = n;
                x += 15;
                if(("prnbqk".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                    scopes.push(x);
                }
                x = n;
                x += 17;
                if(("prnbqk".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                    scopes.push(x);
                }
            }
            else {
                x = n;
                if(x%8 <= 1){
                    x = n;
                    x -= 15;
                    if(("prnbqk".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                        scopes.push(x);
                    }
                    x = n;
                    x -= 6;
                    if(("prnbqk".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                        scopes.push(x);
                    }
                    x = n;
                    x += 10;
                    if(("prnbqk".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                        scopes.push(x);
                    }
                    x = n;
                    x += 17;
                    if(("prnbqk".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                        scopes.push(x);
                    }
                }
                x = n;
                if(x%8 === 1){
                    x -= 17;
                    if(("prnbqk".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                        scopes.push(x);
                    }
                    x = n;
                    x += 15;
                    if(("prnbqk".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                        scopes.push(x);
                    }
                }
                if(x%8 >= 6){
                    x = n;
                    x -= 17;
                    if(("prnbqk".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                        scopes.push(x);
                    }
                    x = n;
                    x -= 10;
                    if(("prnbqk".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                        scopes.push(x);
                    }
                    x = n;
                    x += 6;
                    if(("prnbqk".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                        scopes.push(x);
                    }
                    x = n;
                    x += 15;
                    if(("prnbqk".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                        scopes.push(x);
                    }
                }
                x = n;
                if(x%8 === 6){
                    x = n;
                    x -= 15;
                    if(("prnbqk".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                        scopes.push(x);
                    }
                    x = n;
                    x += 17;
                    if(("prnbqk".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                        scopes.push(x);
                    }
                }
            }
        }
        
        else if(target === "v"){
            x = n;
            x -= 9;
            while(x >= 0 && x%8 !== 7){
                if(values[x] === 0){
                    scopes.push(x);
                }
                else if("prnbqk".indexOf(values[x]) >= 0){
                    scopes.push(x);
                    break;
                }
                else {
                    break;
                }
                x -= 9;
            }
            x = n;
            x += 7;
            while(x < 64 && x%8 !== 7){
                if(values[x] === 0){
                    scopes.push(x);
                }
                else if("prnbqk".indexOf(values[x]) >= 0){
                    scopes.push(x);
                    break;
                }
                else {
                    break;
                }
                x += 7;
            }
            x = n;
            x += 9;
            while(x%8 != 0 && x%8 !== 0){
                if(values[x] === 0){
                    scopes.push(x);
                }
                else if("prnbqk".indexOf(values[x]) >= 0){
                    scopes.push(x);
                    break;
                }
                else {
                    break;
                }
                x += 9;
            }
            x = n;
            x -= 7;
            while(x%8 != 0){
                if(values[x] === 0){
                    scopes.push(x);
                }
                else if("prnbqk".indexOf(values[x]) >= 0){
                    scopes.push(x);
                    break;
                }
                else {
                    break;
                }
                x -= 7;
            }
        }
       
        else if(target === "w"){
            x = n;
            x -= 8;
            while(x >= 0){
                if(values[x] === 0){
                    scopes.push(x);
                }
                else if("prnbqk".indexOf(values[x]) >= 0){
                    scopes.push(x);
                    break;
                }
                else {
                    break;
                }
                x -= 8;
            }
            x = n;
            x += 8;
            while(x < 64){
                if(values[x] === 0){
                    scopes.push(x);
                }
                else if("prnbqk".indexOf(values[x]) >= 0){
                    scopes.push(x);
                    break;
                }
                else {
                    break;
                }
                x += 8;
            }
            x = n;
            x++;
            while(x%8 != 0){
                if(values[x] === 0){
                    scopes.push(x);
                }
                else if("prnbqk".indexOf(values[x]) >= 0){
                    scopes.push(x);
                    break;
                }
                else {
                    break;
                }
                x++;
            }
            x = n;
            x--;
            while(x%8 != 7){
                if(values[x] === 0){
                    scopes.push(x);
                }
                else if("prnbqk".indexOf(values[x]) >= 0){
                    scopes.push(x);
                    break;
                }
                else {
                    break;
                }
                x--;
            }
            x = n;
            x -= 9;
            while(x >= 0 && x%8 !== 7){
                if(values[x] === 0){
                    scopes.push(x);
                }
                else if("prnbqk".indexOf(values[x]) >= 0){
                    scopes.push(x);
                    break;
                }
                else {
                    break;
                }
                x -= 9;
            }
            x = n;
            x += 7;
            while(x < 64 && x%8 !== 7){
                if(values[x] === 0){
                    scopes.push(x);
                }
                else if("prnbqk".indexOf(values[x]) >= 0){
                    scopes.push(x);
                    break;
                }
                else {
                    break;
                }
                x += 7;
            }
            x = n;
            x += 9;
            while(x%8 != 0 && x%8 !== 0){
                if(values[x] === 0){
                    scopes.push(x);
                }
                else if("prnbqk".indexOf(values[x]) >= 0){
                    scopes.push(x);
                    break;
                }
                else {
                    break;
                }
                x += 9;
            }
            x = n;
            x -= 7;
            while(x%8 != 0){
                if(values[x] === 0){
                    scopes.push(x);
                }
                else if("prnbqk".indexOf(values[x]) >= 0){
                    scopes.push(x);
                    break;
                }
                else {
                    break;
                }
                x -= 7;
            }
        }
        
        else if(target === "l"){
            x = n;
            x += 8;
            if(("prnbqk".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                scopes.push(x);
            }
            x = n;
            x -= 8;
            if(("prnbqk".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                scopes.push(x);
            }
            x = n;
            if(x%8 > 0){
                x = n;
                x -= 1;
                if(("prnbqk".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                    scopes.push(x);
                }
                x = n;
                x -= 9;
                if(("prnbqk".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                    scopes.push(x);
                }

                x = n;
                x += 7;
                if(("prnbqk".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                    scopes.push(x);
                }
            }
            x = n;
            if(x%8 < 7){
                x = n;
                x += 1;
                if(("prnbqk".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                    scopes.push(x);
                }
                x = n;
                x += 9;
                if(("prnbqk".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                    scopes.push(x);
                }
                x = n;
                x -= 7;
                if(("prnbqk".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                    scopes.push(x);
                }
            }
            x = n;
            if(!ck){
                cl = false;
                if(!cr2){
                //    cl = false;
                    if(values[n+1] === 0 && values[n+2] === 0 && values[n+3] === "t"){
                        scopes.push(x+2);
                        cl = true;
                    }
                }
                if(!cr1){
                //    cl = false;
                    if(values[n-1] === 0 && values[n-2] === 0 && values[n-3] === 0 && values[n-4] === "t"){
                        scopes.push(x-2);
                        cl = true;
                    }
                }
            }
        }
        if(scopes.length) {return scopes;}
    }

    function checkWhite(n,values){
        var target = values[n];
        var scopes = [];
        var x = n;
        if(target === "p"){
            x += 8;
            if("otmvlw".indexOf(values[x-1]) >= 0 && x%8 != 0){
                scopes.push(x-1);
            }
            if("otmvlw".indexOf(values[x+1]) >= 0 && x%8 != 7){
                scopes.push(x+1);
            }
            if(x < 64 && values[x] === 0){
                scopes.push(x);
                if(x <= 23){
                    if(x+8 >= 0 && values[x+8] === 0){
                        scopes.push(x+8);
                    }
                }
            }
        }
        
        else if(target === "r"){
            x = n;
            x -= 8;
            while(x >= 0){
                if(values[x] === 0){
                    scopes.push(x);
                }
                else if("otmvlw".indexOf(values[x]) >= 0){
                    scopes.push(x);
                    break;
                }
                else {
                    break;
                }
                x -= 8;
            }
            x = n;
            x += 8;
            while(x < 64){
                if(values[x] === 0){
                    scopes.push(x);
                }
                else if("otmvlw".indexOf(values[x]) >= 0){
                    scopes.push(x);
                    break;
                }
                else {
                    break;
                }
                x += 8;
            }
            x = n;
            x++;
            while(x%8 != 0){
                if(values[x] === 0){
                    scopes.push(x);
                }
                else if("otmvlw".indexOf(values[x]) >= 0){
                    scopes.push(x);
                    break;
                }
                else {
                    break;
                }
                x++;
            }
            x = n;
            x--;
            while(x%8 != 7){
                if(values[x] === 0){
                    scopes.push(x);
                }
                else if("otmvlw".indexOf(values[x]) >= 0){
                    scopes.push(x);
                    break;
                }
                else {
                    break;
                }
                x--;
            }
        }
        
        else if(target === "n"){
            x = n;
            if(x%8 > 1 && x%8 < 6){
                x -= 17;
                if(("otmvlw".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                    scopes.push(x);
                }
                x = n;
                x -= 15;
                if(("otmvlw".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                    scopes.push(x);
                }

                x = n;
                x -= 10;
                if(("otmvlw".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                    scopes.push(x);
                }
                x = n;
                x -= 6;
                if(("otmvlw".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                    scopes.push(x);
                }
                x = n;
                x += 6;
                if(("otmvlw".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                    scopes.push(x);
                }
                x = n;
                x += 10;
                if(("otmvlw".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                    scopes.push(x);
                }
                x = n;
                x += 15;
                if(("otmvlw".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                    scopes.push(x);
                }
                x = n;
                x += 17;
                if(("otmvlw".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                    scopes.push(x);
                }
            }
            else {
                x = n;
                if(x%8 <= 1){
                    x = n;
                    x -= 15;
                    if(("otmvlw".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                        scopes.push(x);
                    }
                    x = n;
                    x -= 6;
                    if(("otmvlw".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                        scopes.push(x);
                    }
                    x = n;
                    x += 10;
                    if(("otmvlw".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                        scopes.push(x);
                    }
                    x = n;
                    x += 17;
                    if(("otmvlw".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                        scopes.push(x);
                    }
                }
                x = n;
                if(x%8 === 1){
                    x -= 17;
                    if(("otmvlw".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                        scopes.push(x);
                    }
                    x = n;
                    x += 15;
                    if(("otmvlw".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                        scopes.push(x);
                    }
                }
                if(x%8 >= 6){
                    x = n;
                    x -= 17;
                    if(("otmvlw".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                        scopes.push(x);
                    }
                    x = n;
                    x -= 10;
                    if(("otmvlw".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                        scopes.push(x);
                    }
                    x = n;
                    x += 6;
                    if(("otmvlw".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                        scopes.push(x);
                    }
                    x = n;
                    x += 15;
                    if(("otmvlw".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                        scopes.push(x);
                    }
                }
                x = n;
                if(x%8 === 6){
                    x = n;
                    x -= 15;
                    if(("otmvlw".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                        scopes.push(x);
                    }
                    x = n;
                    x += 17;
                    if(("otmvlw".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                        scopes.push(x);
                    }
                }
            }
        }
     
        else if(target === "b"){
            x = n;
            x -= 9;
            while(x >= 0 && x%8 !== 7){
                if(values[x] === 0){
                    scopes.push(x);
                }
                else if("otmvlw".indexOf(values[x]) >= 0){
                    scopes.push(x);
                    break;
                }
                else {
                    break;
                }
                x -= 9;
            }
            x = n;
            x += 7;
            while(x < 64 && x%8 !== 7){
                if(values[x] === 0){
                    scopes.push(x);
                }
                else if("otmvlw".indexOf(values[x]) >= 0){
                    scopes.push(x);
                    break;
                }
                else {
                    break;
                }
                x += 7;
            }
            x = n;
            x += 9;
            while(x%8 != 0 && x%8 !== 0){
                if(values[x] === 0){
                    scopes.push(x);
                }
                else if("otmvlw".indexOf(values[x]) >= 0){
                    scopes.push(x);
                    break;
                }
                else {
                    break;
                }
                x += 9;
            }
            x = n;
            x -= 7;
            while(x%8 != 0){
                if(values[x] === 0){
                    scopes.push(x);
                }
                else if("otmvlw".indexOf(values[x]) >= 0){
                    scopes.push(x);
                    break;
                }
                else {
                    break;
                }
                x -= 7;
            }
        }
        
        else if(target === "q"){
            x = n;
            x -= 8;
            while(x >= 0){
                if(values[x] === 0){
                    scopes.push(x);
                }
                else if("otmvlw".indexOf(values[x]) >= 0){
                    scopes.push(x);
                    break;
                }
                else {
                    break;
                }
                x -= 8;
            }
            x = n;
            x += 8;
            while(x < 64){
                if(values[x] === 0){
                    scopes.push(x);
                }
                else if("otmvlw".indexOf(values[x]) >= 0){
                    scopes.push(x);
                    break;
                }
                else {
                    break;
                }
                x += 8;
            }
            x = n;
            x++;
            while(x%8 != 0){
                if(values[x] === 0){
                    scopes.push(x);
                }
                else if("otmvlw".indexOf(values[x]) >= 0){
                    scopes.push(x);
                    break;
                }
                else {
                    break;
                }
                x++;
            }
            x = n;
            x--;
            while(x%8 != 7){
                if(values[x] === 0){
                    scopes.push(x);
                }
                else if("otmvlw".indexOf(values[x]) >= 0){
                    scopes.push(x);
                    break;
                }
                else {
                    break;
                }
                x--;
            }
            x = n;
            x -= 9;
            while(x >= 0 && x%8 !== 7){
                if(values[x] === 0){
                    scopes.push(x);
                }
                else if("otmvlw".indexOf(values[x]) >= 0){
                    scopes.push(x);
                    break;
                }
                else {
                    break;
                }
                x -= 9;
            }
            x = n;
            x += 7;
            while(x < 64 && x%8 !== 7){
                if(values[x] === 0){
                    scopes.push(x);
                }
                else if("otmvlw".indexOf(values[x]) >= 0){
                    scopes.push(x);
                    break;
                }
                else {
                    break;
                }
                x += 7;
            }
            x = n;
            x += 9;
            while(x%8 != 0 && x%8 !== 0){
                if(values[x] === 0){
                    scopes.push(x);
                }
                else if("otmvlw".indexOf(values[x]) >= 0){
                    scopes.push(x);
                    break;
                }
                else {
                    break;
                }
                x += 9;
            }
            x = n;
            x -= 7;
            while(x%8 != 0){
                if(values[x] === 0){
                    scopes.push(x);
                }
                else if("otmvlw".indexOf(values[x]) >= 0){
                    scopes.push(x);
                    break;
                }
                else {
                    break;
                }
                x -= 7;
            }
        }
        
        else if(target === "k"){
            x = n;
            x += 8;
            if(("otmvlw".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                scopes.push(x);
            }
            x = n;
            x -= 8;
            if(("otmvlw".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                scopes.push(x);
            }
            x = n;
            if(x%8 > 0){
                x = n;
                x -= 1;
                if(("otmvlw".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                    scopes.push(x);
                }
                x = n;
                x -= 9;
                if(("otmvlw".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                    scopes.push(x);
                }

                x = n;
                x += 7;
                if(("otmvlw".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                    scopes.push(x);
                }
            }
            x = n;
            if(x%8 < 7){
                x = n;
                x += 1;
                if(("otmvlw".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                    scopes.push(x);
                }
                x = n;
                x += 9;
                if(("otmvlw".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                    scopes.push(x);
                }
                x = n;
                x -= 7;
                if(("otmvlw".indexOf(values[x]) >= 0 || values[x] === 0) && x < 64 && x >= 0){
                    scopes.push(x);
                }
            }
        }
        if(scopes.length) return scopes;
    }

    var myTurn = true;

    function checkmate(){
        var many=0;
        var total=0;
        for(var x=0;x<64;x++){
            if(values[x]=='l' || values[x]=='w' || values[x]=='t' || values[x]=='v' || values[x]=='m' || values[x]=='o'){
                var n = x;

                var scopes= checkBlack(n,values) || [];
                total = total + scopes.length;
                var moveT=n;
                if(scopes.length>0){
                    for(var z=0; z<scopes.length;z++){
                        n=scopes[z];
                        var checkArr = [];
                        for(var y = 0; y < 64; y++){
                            checkArr[y] = values[y];
                        }    
                        checkArr[n] = checkArr[moveT];
                        checkArr[moveT] = 0;
                        
                        var arrr = [];
                        for(var g=0;g<64;g++){
                            if(checkArr[g]=='p' || checkArr[g]=='k' || checkArr[g]=='q' || checkArr[g]=='r' || checkArr[g]=='n' || checkArr[g]=='b'){
                                arrr.push(g);
                            }
                        }
                        for(var p=0;p<arrr.length;p++){
                            var scope = checkWhite(arrr[p],checkArr) || [];
                            var temp = many;
                            for(var k = 0; k < scope.length; k++){
                                if(checkArr[scope[k]] === 'l'){
                                    many = many + 1;
                                    break;
                                }
                            }
                            if(many==temp+1){
                                break;
                            }
                        }
                    }
                }
            }
        }
        if(many==total){
            alert('you lose');
            window.reload();
        }
    }

    function check(){

        if(myTurn){
            var n = Number(this.classList[1].slice(1));
            var target = values[n];

            var scopes = checkBlack(n,values) || [];

            var x = n;

            if(!moveable){
                if(scopes.length > 0){
                    moveable = true;
                    moveTarget = n;
                    moveScopes = scopes.join(",").split(",");
                }
                
            }
            else {
                if(moveScopes.indexOf(String(n)) >= 0){
                    var checkArr = [];
                    var saveKing = false;
                    for(var z = 0; z < 64; z++){
                        checkArr[z] = values[z];
                    }
                    
                    checkArr[n] = checkArr[moveTarget];
                    checkArr[moveTarget] = 0;
                    
                    for(var y = 0; y < 64; y++){
                        if("prnbkq".indexOf(checkArr[y]) >= 0){
                            var checkScp = checkWhite(y,checkArr) || [];
                            for(var z = 0; z < checkScp.length; z++){
                                if(checkArr[checkScp[z]] === 'l'){
                                    if(!saveKing){
                                        // alert('Protect Your King');
                                        
                                        // saveKing = true;
                                    }
                                }
                            }
                        }
                    }
                    
                    if(!saveKing){
                        var temp = values[n];
                        if(temp!==0){
                            these.push(temp);
                        }
                        values[n] = values[moveTarget];
                        values[moveTarget] = 0;
                        if(cl){
                            if(n === 62 && moveTarget === 60){
                                values[63] = 0;
                                values[61] = "t";
                            }
                            else if(n === 58 && moveTarget === 60){
                                values[59] = "t";
                                values[56] = 0;
                            }
                        }
                        if(moveTarget === 60){
                            ck = true;
                        }
                        else if(moveTarget === 63){
                            cr2 = true;
                        }
                        else if(moveTarget === 56){
                            cr1 = true;
                        }
                        if(values[n] === "o" && n < 8){
                            values[n] = "w";
                        }
                        moveable = false;
                        scopes = [];
                        myTurn = false;
                        setTimeout(chooseTurn,1000);
                    }
                }
                else {
                    moveScopes = [];
                    moveable = false;
                }
            }

            updateSquarecolor();
            
            for(var x = 0; x < 64; x++){
                sqs[x].innerHTML = fonts[values[x]];
                if(values[x] === 0){
                    sqs[x].innerHTML = "";
                }
            }

            for(var x=0;x<these.length; x++ ){
                rts[x].innerHTML = fonts [these[x]] ;


            }

            for(var x = 0; x < scopes.length; x++){
                sqs[scopes[x]].style.background = "#aaf";
            }
        }
    }


    var arr = [];

    function chooseTurn(){
        var approved = [];
        var actions = [];
        var effects = [];


        for(var n = 0; n < 64; n++){
            if("prnbqk".indexOf(values[n]) >= 0){
                var scopes = checkWhite(n,values) || [];
                for(var x = 0; x < scopes.length; x++){
                    var tmp = [];
                    for(var xx = 0; xx < 64; xx++){
                        tmp[xx] = values[xx]
                    }
                    var effect = 0;
                    var action = Math.random()*3;
                    //Action value
                    var actionValue = tmp[scopes[x]];
                    if(actionValue === "l"){
                        action = 100 + Math.random()*3;
                    }
                    else if(actionValue === "w"){
                        action = 50 + Math.random()*3;
                    }
                    else if(actionValue === "v"){
                        action = 30 + Math.random()*3;
                    }
                    else if(actionValue === "m"){
                        action = 30 + Math.random()*3;
                    }
                    else if(actionValue === "t"){
                        action = 30 + Math.random()*3;
                    }
                    else if(actionValue === "o"){
                        action = 15 + Math.random()*3;
                    }
                    //Effect value
                    tmp[scopes[x]] = tmp[n];
                    tmp[n] = 0;
                    for(var y = 0; y < 64; y++){
                        if("otmvlw".indexOf(values[y]) >= 0){
                            var tmpScp = checkBlack(y,tmp) || [];
                            for(var z = 0; z < tmpScp.length; z++){
                                var effectValue = tmp[tmpScp[z]];
                                if(effectValue == "k"){
                                    if(effect < 100){
                                        effect = 100;
                                    }
                                }
                                else if(effectValue == "q"){
                                    if(effect < 50){
                                        effect = 50;
                                    }
                                }
                                else if(effectValue == "b"){
                                    if(effect < 30){
                                        effect = 30;
                                    }
                                }
                                else if(effectValue == "n"){
                                    if(effect < 30){
                                        effect = 30;
                                    }
                                }
                                else if(effectValue == "r"){
                                    if(effect < 30){
                                        effect = 30;
                                    }
                                }
                                else if(effectValue == "p"){
                                    if(effect < 15){
                                        effect = 15;
                                    }
                                }
                            }
                        }
                    }




                    actions.push(action);
                    effects.push(effect);
                    approved.push(n+"-"+scopes[x]);
                    restart();
                }
            }
        }

        

        var bestEffect = Math.min.apply(null,effects);
        
        if(bestEffect >= 100){
            alert("You Win");
            window.reload();
            setTimeout(function(){
                values = ['r','n','b','q','k','b','n','r','p','p','p','p','p','p','p','p',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'o','o','o','o','o','o','o','o','t','m','v','w','l','v','m','t'];
        },100);
        }

        var tmpA = [];
        var tmpB = [];
        var tmpC = [];
        var bestMove = "";

        for(var n = 0; n < effects.length; n++){
            if(effects[n] === bestEffect){
                tmpA.push(actions[n]);
                tmpB.push(approved[n]);
                tmpC.push(effects[n]);
            }
        }
        bestMove = tmpB[tmpA.indexOf(Math.max.apply(null,tmpA))];
    


        if(bestMove){
            var temp =values[Number(bestMove.split("-")[1])];
            if(temp!==0){
                those.push(temp);
            }
            values[Number(bestMove.split("-")[1])] = values[Number(bestMove.split("-")[0])];
            values[Number(bestMove.split("-")[0])] = 0;
            if(values[Number(bestMove.split("-")[1])] === "p" && Number(bestMove.split("-")[1]) >= 56){
                values[Number(bestMove.split("-")[1])] = "q";
            }
            for(var x=0;x<those.length; x++ ){
                rts1[x].innerHTML = fonts [those[x]] ;


            }


            sqs[bestMove.split("-")[1]].style.background = '#aaf';
            sqs[bestMove.split("-")[0]].style.background = '#aaf';

            for(var x = 0; x < 64; x++){
                
                sqs[x].innerHTML = fonts[values[x]];
                if(values[x] === 0){
                    sqs[x].innerHTML = "";
                }
            }
            myTurn = true;
        }
        else {
            
        }
        checkmate();
    }
}















// date and day

var day;
function startTime(){
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    var d = today.getDate();
    var mo = today.getMonth()+1;
    var y = today.getFullYear();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('clock').innerHTML =
    h + ":" + m + ":" + s; 
    document.getElementById('day').innerHTML =
    day + ", " + d + "." + mo + "." + y; 
    var t = setTimeout(startTime, 0);
}

    switch (new Date().getDay()){
            case 0:
                day = "Sunday";
                break;
            case 1:
                day = "Monday";
                break;
            case 2:
                day = "Tuesday";
                break;
            case 3:
                day = "Wednesday";
                break;
            case 4:
                day = "Thursday";
                break;
            case 5:
                day = "Friday";
                break;
            case 6:
                day = "Saturday";
                break;
           }
    function checkTime(i) {
    if (i < 10) {i = "0" + i}
    return i;
    }
    //stop watch

     var msvv = 0, svv = 0, mvv = 0;
     var msvv2 = 0, svv2 = 0, mvv2 = 0;

        var timervv;
        var countsec=0;
        var countsec2 = 0;
        var countmin=0;

        var stopwatchEl = document.querySelector('.stopwatch');
       

        function start() {
            if(!timervv) {
                timervv = setInterval(run, 10);
            }
        }
        function pausee(){
           var ubb=document.getElementById("container");
           if(ubb.style.display ==="none"){
            ubb.style.display="block";
            start();
           }
           else{ubb.style.display="none";pause();}

        }
        function run() {
            stopwatchEl.textContent = getTimer();
            maxxTime2();
            maxxTime();
            msvv++;
            msvv2++;
            if(msvv == 100) {
                msvv = 0;
                msvv2 = 0;
                svv++;
                svv2++;
            }
            if(svv2==60){
                svv2=0;
                mvv2++;
            }
            if(svv == 60) {
                svv = 0;
                mvv++;
            }

        }
        function maxxTime2(){
            if(mvv2 >= 45){
                alert("The time for this game has reached 45 minutes. So the game is drawn.\n Click ok to go to our home page.");
            window.reload();
               
            }

            if(mvv2 >= 30  && countsec2==0){
                countsec2=1;
                alert("There are 15 more minutes left for the game,\n and after that it will be drawn.");

            }
        }
        function maxxTime(){
            if(mvv >= 1){
                if(countmin==0){
                    alert("Time limit exceeded. You Lose\n Now you will be ridirected to our home page.");
                    countmin=1;
                }
            window.reload();
               
            }

            if(svv >= 45 && mvv < 1 && countsec==0){
                countsec=1;
                alert("Move quickly.\nYou have only 15 sec left for this move\n\n\n\n\n\n ");

            }
        }

        function pause() {
            stopTimer();
        }

        function stop() {
            stopTimer();
            msvv= 0;
            svv = 0;
            mvv = 0;
            stopwatchEl.textContent = getTimer();
        }

        function stopTimer() {
            clearInterval(timervv);
            timervv = false;
        }

        function getTimer() {
            return (mvv < 10 ? "0" + mvv : mvv) + ":" + (svv < 10 ? "0" + svv : svv) + ":" + (msvv < 10 ? "0" + msvv : msvv);
        }

        function restart() {
            stop();
            start();
        }
</script>


    

</body> 
</html>