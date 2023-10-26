let stars = [];
let boxs = [];
let walls = [];
let mouseStar;
let lineConnected;
let startButton;
let buttonPos;

function setup(){
    createCanvas(windowWidth, windowHeight);
    lineConnected = true;
    buttonPos = createVector((width/2), (height/2) - 150);
    mouseStar = new star(mouseX, mouseY);
    mouseStar.radius = 10;
    startButton = createButton("Start");
    startButton.position(buttonPos.x, buttonPos.y);
    startButton.id("start");
    LeaderButton = createButton("Leader board");
    LeaderButton.position(buttonPos.x, buttonPos.y + 100);
    LeaderButton.id("start");
    LogButton = createButton("Log out");
    LogButton.position(buttonPos.x, buttonPos.y + 200);
    LogButton.id("start");
    startButton.mousePressed(explode);
    // startButton.style("width", "100px");
    // startButton.style("height", "20px");
}

function explode(){
    // for(let i = 0; i < 200; i++){
    //     stars.push(new star(buttonPos.x + 50, buttonPos.y + 25));
    //     let ran = floor(random(0, 10));
    //     if(ran == 1){
    //         stars[stars.length - 1].isInfected = true;
    //     }
        
    // }
    for(let i = 0; i < 3; i++){
        boxs.push(new box(random(width-500), random(height-500), random(PI)));
    }
}

function start(){
    
    for(let i = 0; i < 3; i++){
        boxs.push(new box(random(width-500), random(height-500), random(PI)));
    }
}

function mousePressed(){
    let hit = mouseStar.collide_box();
    if(hit){
        if(lineConnected){
            walls.push(new wall(walls.length, mouseX, mouseY, mouseX, mouseY));
            lineConnected = false;
        }
        else{
            walls[walls.length - 1].p2 = createVector(mouseX, mouseY);
            walls[walls.length - 1].isConnected = true;
            lineConnected = true;
        }
        
    }
}

function checkInfected(star){
    return star.isInfected;
}

function draw(){
    background(51);
    fill(255, 0, 0);
    mouseStar.pos = createVector(mouseX, mouseY);
    ellipse(mouseStar.pos.x, mouseStar.pos.y, mouseStar.radius);
    let die = -1;
    for(let i = 0; i < walls.length; i++){
        if(walls[i].health <= 0){
            die = i;
            continue;
        }
        else{
            walls[i].show();
        }
    }
    if(die > -1){
        walls.splice(die, 1);
    }
    for(let i = 0; i < stars.length; i++){
        stars[i].show();
    }
    for(let i = 0; i < boxs.length; i++){
        boxs[i].show();
    }

    let infected = stars.filter(checkInfected);
    console.log((infected.length/stars.length)*100);
}