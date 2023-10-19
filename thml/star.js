class star{
    constructor(x, y){
        this.pos = createVector(x, y);
        this.vel = createVector(0, 0);
        this.acc = createVector(random(-1, 1), random(-1, 1));
        this.radius = 8;
        this.isInfected = false;
    }

    checkBroundary(){
        if(this.pos.x < this.radius || this.pos.x > width-this.radius){
            this.acc.x *= -1;
        }
        if(this.pos.y < this.radius || this.pos.y > height-this.radius){
            this.acc.y *= -1;
        }
    }
    
    collide_box(){
        let hit = false;
        for(let i = 0; i < boxs.length; i++){
            let top_hit = collideLineCircle(boxs[i].leftPoint.x, boxs[i].leftPoint.y, boxs[i].rightPoint.x, boxs[i].rightPoint.y, this.pos.x, this.pos.y, this.radius);
            if(top_hit){
                hit = true;
                this.acc.y *= -1;
            }
            let right_hit = collideLineCircle(boxs[i].rightPoint.x, boxs[i].rightPoint.y, boxs[i].rightBottomPoint.x, boxs[i].rightBottomPoint.y, this.pos.x, this.pos.y, this.radius);
            if(right_hit){
                hit = true;
                this.acc.x *= -1;
            }
            let bottom_hit = collideLineCircle(boxs[i].rightBottomPoint.x, boxs[i].rightBottomPoint.y, boxs[i].leftBottomPoint.x, boxs[i].leftBottomPoint.y, this.pos.x, this.pos.y, this.radius);
            if(bottom_hit){
                hit = true;
                this.acc.y *= -1;
            }
            let left_hit = collideLineCircle(boxs[i].leftBottomPoint.x, boxs[i].leftBottomPoint.y, boxs[i].leftPoint.x, boxs[i].leftPoint.y, this.pos.x, this.pos.y, this.radius);
            if(left_hit){
                hit = true;
                this.acc.x *= -1;
            }
        }
        return hit;
    }

    checkWalls(){
        for(let i = 0; i < walls.length; i++){
            if(walls[i].isConnected){
                let hit = collideLineCircle(walls[i].p1.x, walls[i].p1.y, walls[i].p2.x, walls[i].p2.y, this.pos.x, this.pos.y, this.radius);
                if(hit){
                    walls[i].health -= 1;
                    this.acc.mult(-1);
                    break;
                }
            }
        }
    }

    checkStars(){
        for(let i = 0; i < stars.length; i++){
            if(stars[i].pos == this.pos){
                continue
            }
            let hit = collideCircleCircle(this.pos.x, this.pos.y, this.radius, stars[i].pos.x, stars[i].pos.y, stars[i].radius);
            if(hit){
                this.acc.mult(-1);
                stars[i].acc.mult(-1);
                if(this.isInfected){
                    stars[i].isInfected = true;
                }
                break;
            }
        }
    }

    update(){
        this.vel.add(this.acc);
        this.pos.add(this.vel);
        this.vel.mult(0);
    }

    show(){
        this.collide_box();
        this.update();
        if(this.isInfected){
            fill(0, 255, 255);
        }
        else{
            fill(255);
        }
        ellipse(this.pos.x, this.pos.y, this.radius);
        this.checkBroundary();
        this.checkWalls();
        this.checkStars();
    } 

}