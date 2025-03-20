import { Howl } from 'howler';

// Screen Setup
const WIDTH = 800, HEIGHT = 600;
const screen = document.createElement('canvas');
screen.width = WIDTH;
screen.height = HEIGHT;
document.body.appendChild(screen);
const ctx = screen.getContext('2d');
const clock = { tick: () => {} }; // Placeholder for clock functionality

// Load Sounds
const vhs_sound = new Howl({ src: ['vhs.wav'], loop: true });
const jumpscare_sound = new Howl({ src: ['golden_freddy/fnaf-2-death-scream.wav'] });

// Load & Scale Images
const puppet_right = new Image();
puppet_right.src = 'puppet_rightnew.png';
const puppet_left = new Image();
puppet_left.src = 'puppet_leftnew.png';
let puppet_img = puppet_right;

const gift_img = new Image();
gift_img.src = 'assets/giftnew.png';
const gifts_screen_img = new Image();
gifts_screen_img.src = 'assets/giftsnew.png';
const lifenew_img = new Image();
lifenew_img.src = '.venv/lifenew.png';
const child_img = new Image();
child_img.src = 'assets/childnew.png';
const extra_child_img = new Image();
extra_child_img.src = 'assets/childnew.png';

const mask_images = {
    freddy: new Image(),
    bonnie: new Image(),
    chica: new Image(),
    foxy: new Image(),
};

mask_images.freddy.src = 'masks/freddymask.png';
mask_images.bonnie.src = 'masks/bonniemask.png';
mask_images.chica.src = 'masks/chicamask.png';
mask_images.foxy.src = 'masks/foxymask.png';

// TV Static Frames
const tv_frames = Array.from({ length: 3 }, (_, i) => {
    const img = new Image();
    img.src = `tv/tv_${i + 1}.png`;
    return img;
});

// Jumpscare Frames
const jumpscare_frames = Array.from({ length: 12 }, (_, i) => {
    const img = new Image();
    img.src = `golden_freddy/golden_${i}.png`;
    return img;
});

// Static Frames
const static_frames = Array.from({ length: 4 }, (_, i) => {
    const img = new Image();
    img.src = `static/static ${i + 1}.png`;
    return img;
});

// Function to play static sound
function play_staticshock() {
    const staticshock_sound = new Howl({ src: ['static/staticshock.wav'] });
    staticshock_sound.play();
}

// Function to show static frames
async function show_static_frames() {
    play_staticshock();
    const static_duration = await new Promise(resolve => {
        const sound = new Howl({ src: ['static/staticshock.wav'] });
        sound.on('load', () => resolve(sound.duration()));
        sound.play();
    });
    const frame_delay = static_duration / static_frames.length;

    for (const frame of static_frames) {
        ctx.fillStyle = 'black';
        ctx.fillRect(0, 0, WIDTH, HEIGHT);
        ctx.drawImage(frame, 0, 0);
        await new Promise(resolve => setTimeout(resolve, frame_delay * 1000));
    }
}

// Function to show centered image
function show_centered_image(image, duration = 3) {
    ctx.fillStyle = 'black';
    ctx.fillRect(0, 0, WIDTH, HEIGHT);
    const imageX = (WIDTH - image.width) / 2;
    const imageY = (HEIGHT - image.height) / 2;
    ctx.drawImage(image, imageX, imageY);
    setTimeout(() => {}, duration * 1000);
}

// Puppet Variables
let puppet_x = WIDTH / 2, puppet_y = HEIGHT - 150;
const puppet_speed = 5;

// Children Positions
const children = [
    { x: 100, y: 60, width: 70, height: 85 },
    { x: WIDTH - 170, y: 60, width: 70, height: 85 },
    { x: 100, y: HEIGHT - 150, width: 70, height: 85 },
    { x: WIDTH - 170, y: HEIGHT - 150, width: 70, height: 85 },
];
const gifts_placed = Array(children.length).fill(false);
const masks_placed = Array(children.length).fill(false);
const child_masks = ["freddy", "bonnie", "chica", "foxy"];

// Extra child position
const extra_child_rect = { x: WIDTH / 2 - 35, y: HEIGHT / 2 - 42, width: 70, height: 85 };
let show_extra_child = false;

// Game Stages
let stage = "GIVE_GIFTS";
let running = true;
let gifts_given = false;
let masks_given = false;
let gift_timer = null;
let last_mask_time = null;
let tv_frame_index = 0;

// Start Static & Gifts Screen
show_static_frames();
vhs_sound.play();
show_centered_image(gifts_screen_img, 3);

// Puppet Movement
function move_puppet(keys) {
    if (keys['ArrowLeft']) {
        puppet_x = Math.max(0, puppet_x - puppet_speed);
        puppet_img = puppet_left;
    }
    if (keys['ArrowRight']) {
        puppet_x = Math.min(WIDTH - 75, puppet_x + puppet_speed);
        puppet_img = puppet_right;
    }
    if (keys['ArrowUp']) {
        puppet_y = Math.max(0, puppet_y - puppet_speed);
    }
    if (keys['ArrowDown']) {
        puppet_y = Math.min(HEIGHT - 105, puppet_y + puppet_speed);
    }
}

// Check Interactions
function checkInteractions() {
    // Interaction logic goes here
}

