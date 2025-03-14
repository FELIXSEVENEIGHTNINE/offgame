// const canvas = document.querySelector('canvas')
// const c = canvas.getContext('2d')

const canvas = document.querySelector("canvas");
const c = canvas.getContext("2d");

// Function to resize canvas dynamically
function resizeCanvas() {
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
}

// Resize when the page loads
resizeCanvas();

// Resize again when the window is resized
window.addEventListener("resize", resizeCanvas);

const backgroundMusic = new Audio("./audio/background.mp3");
backgroundMusic.loop = true;
backgroundMusic.volume = 0.5;

// Ensure music starts on page load
window.onload = () => {
    backgroundMusic.play().catch(error => console.log("Music play error:", error));
};

// Start playing after user interacts
document.addEventListener("click", () => {
    if (backgroundMusic.paused) {
        backgroundMusic.play().catch(error => console.log("Music play error:", error));
    }
});

const scaledCanvas = {
    width: canvas.width / 1.5,
    height: canvas.height / 1.5,
}

const floorCollisions2D = []
for (let i = 0; i < floorCollisions.length; i += 60){
    floorCollisions2D.push(floorCollisions.slice(i, i + 60))
}


// console.log(floorCollisions2D)
const collisionBlocks = []
floorCollisions2D.forEach((row, y) => {
    row.forEach((symbol, x) => {
        if(symbol === 2103){
            console.log('draw a block here!')
            collisionBlocks.push(
                new CollisionBlock({
                    position: {
                        x: x * 32,
                        y: y * 32,
                    },
                })
            )
        }
    })
})

const gravity = 0.5



const player = new Player({
    position: {
        x: 100,
        y: 500,
    },
    collisionBlocks,
    imageSrc: './img/baby/babyidleright.png',
    frameRate: 3,
    animations: {
        Idle: {
            imageSrc: './img/baby/babyidleright.png',
            frameRate: 3,
            frameBuffer: 40,
            
        },
        IdleLeft: {
            imageSrc: './img/baby/babyidleleft.png',
            frameRate: 3,
            frameBuffer: 40,
        },
        Walk: {
            imageSrc: './img/baby/babywalkright.png',
            frameRate: 3,
            frameBuffer: 40,
        },
        WalkLeft: {
            imageSrc: './img/baby/babywalkleft.png',
            frameRate: 3,
            frameBuffer: 40,
        },
        Jump: {
            imageSrc: './img/baby/babyjumpright.png',
            frameRate: 3,
            frameBuffer: 40,
        },
        JumpLeft: {
            imageSrc: './img/baby/babyjumpleft.png',
            frameRate: 3,
            frameBuffer: 40,
        },
        Fall: {
            imageSrc: './img/baby/babyjumpright.png',
            frameRate: 3,
            frameBuffer: 40,
        },
        FallLeft: {
            imageSrc: './img/baby/babyjumpleft.png',
            frameRate: 3,
            frameBuffer: 40,
        }
    }

})

const keys = {
    d: {
        pressed: false,
    },
    a: {
        pressed: false,
    },
}

const background = new Sprite({
    position: {
        x: 0,
        y: 0,
    },
    imageSrc: './img/fnafmap.png'
})

const camera = {
    position: {
        x: 0,
        y: 0,
    },
}

const collectibles = [
    new Collectible({
        position: { x: 200, y: 475 },
        imageSrc: "./img/collectible.png",
    }),
    new Collectible({
        position: { x: 600, y: 550 },
        imageSrc: "./img/collectible.png",
    }),
    new Collectible({
        position: { x: 900, y: 550 },
        imageSrc: "./img/collectible.png",
    }),
    new Collectible({
        position: { x: 1150, y: 475 },
        imageSrc: "./img/collectible.png",
    }),
    new Collectible({
        position: { x: 1625, y: 475 },
        imageSrc: "./img/collectible.png",
    }),
    new Collectible({
        position: { x: 1800, y: 375 },
        imageSrc: "./img/collectible.png",
    }),
]

let animationId; // Store the animation frame ID

function animate() {
    animationId = requestAnimationFrame(animate); // Store the ID so we can cancel it
    // c.fillStyle = 'blue';
    // c.fillRect(0, 0, canvas.width, canvas.height);

    c.save();
    c.scale(1.5, 1.5);
    c.translate(camera.position.x, -background.image.height + scaledCanvas.height);
    background.update();

    collisionBlocks.forEach((collisionBlock) => {
        collisionBlock.update();
    });

    collectibles.forEach((collectible) => {
        collectible.update();
    });

    player.checkForHorizontalCanvasCollision();
    player.update();

    player.velocity.x = 0;
    if (keys.d.pressed) {
        player.switchSprite('Walk');
        player.velocity.x = 2;
        player.lastDirection = 'right';
        player.shouldPanCameraToTheLeft({ canvas, camera });
    } else if (keys.a.pressed) {
        player.switchSprite('WalkLeft');
        player.lastDirection = 'left';
        player.velocity.x = -2;
        player.shouldPanCameraToTheRight({ canvas, camera });
    } else if (player.velocity.y === 0) {
        if (player.lastDirection === 'right') player.switchSprite('Idle');
        else player.switchSprite('IdleLeft');
    }

    if (player.velocity.y < 0) {
        if (player.lastDirection === 'right') player.switchSprite('Jump');
        else player.switchSprite('JumpLeft');
    } else if (player.velocity.y > 0) {
        if (player.lastDirection === 'right') player.switchSprite('Fall');
        else player.switchSprite('FallLeft');
    }

    c.restore();
}

animate(); // Start the loop

window.addEventListener('keydown', () => {
    switch (event.key){
        case 'd':
            keys.d.pressed = true
            break
        case 'a':
            keys.a.pressed = true
            break
        case 'w':
            player.velocity.y = -11
            break
    }
})

window.addEventListener('keyup', () => {
    switch (event.key){
        case 'd':
            keys.d.pressed = false
            break
        case 'a':
            keys.a.pressed = false
            break
    }
})


function triggerJumpscare() {
    console.log("Jumpscare function called!"); 

    // Stop background music
    backgroundMusic.pause();
    backgroundMusic.currentTime = 0; // Reset to start

    cancelAnimationFrame(animationId); // Stop game loop
    c.clearRect(0, 0, canvas.width, canvas.height); // Clear canvas

    // Create GIF element
    const jumpscareGif = document.createElement("img");
    jumpscareGif.src = "./img/jumpscare.gif"; // Ensure path is correct
    jumpscareGif.style.position = "fixed";
    jumpscareGif.style.top = "0";
    jumpscareGif.style.left = "0";
    jumpscareGif.style.width = "100vw";
    jumpscareGif.style.height = "100vh";
    jumpscareGif.style.zIndex = "9999"; // Ensure it appears above everything
    document.body.appendChild(jumpscareGif);

    // Play jumpscare sound
    const jumpscareSound = new Audio("./audio/jumpscare.wav");
    jumpscareSound.play();

    // Remove GIF and exit after 2 seconds
    setTimeout(() => {
        console.log("Closing game...");
        document.body.removeChild(jumpscareGif); // Remove GIF
        window.location.href = "gameover.html"; // Redirect to game over screen
    }, 2000);
}


