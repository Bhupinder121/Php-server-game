class star{
    constructor(index, x, y){
        this.pos = createVector(x, y);
        this.vel = createVector(0, 0);
        this.acc = createVector(random(-1, 1), random(-1, 1));
        this.radius = 8;
        this.index = index;
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
    
    collide(){
        for(box of boxs){
            let top_hit = collideLineCircle(box.pos.x, box.pos.y, box.pos.x + box.size.x, box.pos.y, this.pos.x, this.pos.y, this.radius);
            if(top_hit){
                this.acc.y *= -1;
            }
            let left_hit = collideLineCircle(box.pos.x, box.pos.y, box.pos.x, box.pos.y + box.size.y, this.pos.x, this.pos.y, this.radius);
            if(left_hit){
                this.acc.x *= -1;
            }
            let right_hit = collideLineCircle(box.pos.x + box.size.x, box.pos.y, box.pos.x + box.size.x, box.pos.y + box.size.y, this.pos.x, this.pos.y, this.radius);
            if(right_hit){
                this.acc.x *= -1;
            }
            let bottom_hit = collideLineCircle(box.pos.x, box.pos.y + box.size.y, box.pos.x + box.size.x, box.pos.y + box.size.y, this.pos.x, this.pos.y, this.radius);
            if(bottom_hit){
                this.acc.y *= -1;
            }
        }
    }

    update(){
        this.vel.add(this.acc);
        this.pos.add(this.vel);
        this.vel.mult(0);
    }

    show(){
        this.collide();
        this.update();
        ellipse(this.pos.x, this.pos.y, this.radius);
        this.checkBroundary();
    } 

}