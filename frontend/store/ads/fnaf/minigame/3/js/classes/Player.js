class Player extends Sprite {
    constructor({ position, collisionBlocks, imageSrc, frameRate, animations}) {
        super({imageSrc, frameRate})
        this.position = position
        this.velocity = {
            x: 0,
            y: 1,
        }

        this.collisionBlocks = collisionBlocks
        this.hitbox = {
            position: {
                x: this.position.x,
                y: this.position.y,
            },
            width: 10,
            height: 10
        }

        this.animations = animations
        this.lastDirection = 'right'

        for(let key in this.animations){
            const image = new Image()
            image.src = this.animations[key].imageSrc

            this.animations[key].image = image

        }

        this.camerabox = {
            position: {
                x: this.position.x,
                y: this.position.y,
            },
            width: 200,
            height: 80,
        }

    }

    switchSprite(key){
        if(this.image === this.animations[key].image || !this.loaded) return
        this.currentFrame = 0
        this.image = this.animations[key].image
        this.frameBuffer = this.animations[key].frameBuffer
        this.frameRate = this.animations[key].frameRate
    }

    updateCamerabox(){
        this.camerabox = {
            position: {
                x: this.position.x - 72,
                y: this.position.y,
            },
            width: 200,
            height: 80,
        }
    }

    checkForHorizontalCanvasCollision(){
        if(this.hitbox.position.x + this.hitbox.width + this.velocity.x >= 1920 || 
            this.hitbox.position.x + this.velocity.x <= 0){
            this.velocity.x = 0
        }
    }

    shouldPanCameraToTheLeft({canvas, camera}){
        const cameraboxRightSide = this.camerabox.position.x + this.camerabox.width
        const scaledDownCanvasWidth = canvas.width / 1.5

        if(cameraboxRightSide >= 1920) return

        if(cameraboxRightSide >= scaledDownCanvasWidth + Math.abs(camera.position.x)){
            camera.position.x -= this.velocity.x
        }
        
    }

    shouldPanCameraToTheRight({canvas, camera}){
        if(this.camerabox.position.x <= 0) return
        
        if(this.camerabox.position.x <= Math.abs(camera.position.x)){
            camera.position.x -= this.velocity.x
        }
    }

    // shouldPanCameraDown({canvas, camera}){
    //     if(this.camerabox.position.x <= 0) return
        
    //     if(this.camerabox.position.x <= Math.abs(camera.position.x)){
    //         camera.position.x -= this.velocity.x
    //     }
    // }

    update(){
        this.updateFrames()
        this.updateHitbox()
        this.updateCamerabox()
        
        // // draws out the image
        // c.fillStyle = 'rgba(0, 0, 255, 0.2)'
        // c.fillRect(this.camerabox.position.x, this.camerabox.position.y, this.camerabox.width, this.camerabox.height)
        

        // c.fillStyle = 'rgba(255, 0, 0, 0.2)'
        // c.fillRect(this.hitbox.position.x, this.hitbox.position.y, this.hitbox.width, this.hitbox.height)
        
        this.draw()

        this.position.x += this.velocity.x
        this.updateHitbox()
        this.checkForHorizontalCollisions()
        this.applyGravity()
        this.updateHitbox()
        this.checkForVerticalCollisions()
        this.checkForCollectibleCollision(); // Check for collectible pickup
    }

    updateHitbox(){
        this.hitbox = {
            position: {
                x: this.position.x +6,
                y: this.position.y + 2,
            },
            width: 45,
            height: 60,
        }
    }

    checkForHorizontalCollisions(){
        for(let i = 0; i < this.collisionBlocks.length; i++){
            const collisionBlock = this.collisionBlocks[i]

            if(
                collision({
                    object1: this.hitbox,
                    object2: collisionBlock,
                })
            ){
                if(this.velocity.x > 0){
                    this.velocity.x = 0

                    const offset = 
                    this.hitbox.position.x - this.position.x + this.hitbox.width

                    this.position.x = collisionBlock.position.x - offset - 0.01
                    break
                }

                if(this.velocity.x < 0){
                    this.velocity.x = 0

                    const offset = 
                    this.hitbox.position.x - this.position.x

                    this.position.x = 
                        collisionBlock.position.x + collisionBlock.width - offset + 0.01
                    break    
                }
            }
            
        }
    }

    applyGravity() {
        this.velocity.y += gravity
        this.position.y += this.velocity.y
    }

    checkForVerticalCollisions(){
        for(let i = 0; i < this.collisionBlocks.length; i++){
            const collisionBlock = this.collisionBlocks[i]

            if(
                collision({
                    object1: this.hitbox,
                    object2: collisionBlock,
                })
            ){
                if(this.velocity.y > 0){
                    this.velocity.y = 0

                    const offset = 
                    this.hitbox.position.y - this.position.y + this.hitbox.height

                    this.position.y = collisionBlock.position.y - offset - 0.01
                    break
                }

                if(this.velocity.y < 0){
                    this.velocity.y = 0

                    const offset = this.hitbox.position.y - this.position.y

                    this.position.y = 
                        collisionBlock.position.y + collisionBlock.height - offset + 0.01
                    break
                }
            }
            
        }
    }

    checkForCollectibleCollision() {
        let allCollected = true; // Assume all are collected
    
        collectibles.forEach((collectible) => {
            if (!collectible.collected &&
                this.hitbox.position.x < collectible.position.x + collectible.width &&
                this.hitbox.position.x + this.hitbox.width > collectible.position.x &&
                this.hitbox.position.y < collectible.position.y + collectible.height &&
                this.hitbox.position.y + this.hitbox.height > collectible.position.y) {
                
                collectible.collected = true; // Mark as collected
                console.log("Collectible picked up!");
            }
    
            if (!collectible.collected) {
                allCollected = false; // If any are uncollected, set false
            }
        });
    
        if (allCollected) {
            triggerJumpscare(); // Call jumpscare function
        }
    }
    
}