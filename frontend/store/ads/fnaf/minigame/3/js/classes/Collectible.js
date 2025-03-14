class Collectible {
    constructor({ position, imageSrc }) {
        this.position = position;
        this.width = 20;
        this.height = 20;
        this.image = new Image();
        this.image.src = imageSrc;
        this.collected = false; // Track if collected
    }

    draw() {
        if (!this.collected) {
            c.drawImage(this.image, this.position.x, this.position.y, this.width, this.height);
        }
    }

    update() {
        this.draw();
    }
}
