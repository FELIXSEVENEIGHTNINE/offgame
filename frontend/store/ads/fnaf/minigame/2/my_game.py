import pygame
import time

pygame.init()

# Screen Setup
WIDTH, HEIGHT = 800, 600
screen = pygame.display.set_mode((WIDTH, HEIGHT))
clock = pygame.time.Clock()

# Load Sounds
vhs_sound = pygame.mixer.Sound("vhs.wav")
jumpscare_sound = pygame.mixer.Sound("golden_freddy/fnaf-2-death-scream.wav")

# Load & Scale Images
puppet_right = pygame.transform.scale(pygame.image.load("puppet_rightnew.png"), (75, 105))
puppet_left = pygame.transform.scale(pygame.image.load("puppet_leftnew.png"), (75, 105))
puppet_img = puppet_right

gift_img = pygame.transform.scale(pygame.image.load("assets/giftnew.png"), (55, 55))
gifts_screen_img = pygame.image.load("assets/giftsnew.png")
lifenew_img = pygame.image.load(".venv/lifenew.png")
child_img = pygame.transform.scale(pygame.image.load("assets/childnew.png"), (70, 85))
extra_child_img = pygame.transform.scale(pygame.image.load("assets/childnew.png"), (70, 85))

mask_images = {
    "freddy": pygame.transform.scale(pygame.image.load("masks/freddymask.png"), (75, 75)),
    "bonnie": pygame.transform.scale(pygame.image.load("masks/bonniemask.png"), (75, 75)),
    "chica": pygame.transform.scale(pygame.image.load("masks/chicamask.png"), (75, 75)),
    "foxy": pygame.transform.scale(pygame.image.load("masks/foxymask.png"), (75, 75)),
}

# TV Static Frames
tv_frames = [pygame.transform.scale(pygame.image.load(f"tv/tv_{i}.png"), (WIDTH, HEIGHT)) for i in range(1, 4)]

# Jumpscare Frames
jumpscare_frames = [pygame.transform.scale(pygame.image.load(f"golden_freddy/golden_{i}.png"), (WIDTH, HEIGHT)) for i in range(12)]

# Static Frames
static_frames = [pygame.transform.scale(pygame.image.load(f"static/static {i}.png"), (WIDTH, HEIGHT)) for i in range(1, 5)]

# Function to play static sound
def play_staticshock():
    staticshock_sound = pygame.mixer.Sound("static/staticshock.wav")
    pygame.mixer.Sound.play(staticshock_sound)

# Function to show static frames
def show_static_frames():
    play_staticshock()
    static_duration = pygame.mixer.Sound("static/staticshock.wav").get_length()
    frame_delay = static_duration / len(static_frames)

    for frame in static_frames:
        screen.fill((0, 0, 0))
        screen.blit(frame, (0, 0))
        pygame.display.flip()
        pygame.time.delay(int(frame_delay * 1000))

# Function to show centered image
def show_centered_image(image, duration=3):
    screen.fill((0, 0, 0))
    image_rect = image.get_rect(center=(WIDTH // 2, HEIGHT // 2))
    screen.blit(image, image_rect)
    pygame.display.flip()
    time.sleep(duration)

# Puppet Variables
puppet_x, puppet_y = WIDTH // 2, HEIGHT - 150
puppet_speed = 5

# Children Positions
children = [
    pygame.Rect(100, 60, 70, 85),
    pygame.Rect(WIDTH - 170, 60, 70, 85),
    pygame.Rect(100, HEIGHT - 150, 70, 85),
    pygame.Rect(WIDTH - 170, HEIGHT - 150, 70, 85),
]
gifts_placed = [False] * len(children)
masks_placed = [False] * len(children)
child_masks = ["freddy", "bonnie", "chica", "foxy"]

# Extra child position
extra_child_rect = pygame.Rect(WIDTH // 2 - 35, HEIGHT // 2 - 42, 70, 85)
show_extra_child = False

# Game Stages
stage = "GIVE_GIFTS"
running = True
gifts_given = False
masks_given = False
gift_timer = None
last_mask_time = None
tv_frame_index = 0

# Start Static & Gifts Screen
show_static_frames()
pygame.mixer.Sound.play(vhs_sound, loops=-1)
show_centered_image(gifts_screen_img, 3)

# Puppet Movement
def move_puppet(keys):
    global puppet_x, puppet_y, puppet_img

    if keys[pygame.K_LEFT]:
        puppet_x = max(0, puppet_x - puppet_speed)
        puppet_img = puppet_left
    if keys[pygame.K_RIGHT]:
        puppet_x = min(WIDTH - 75, puppet_x + puppet_speed)
        puppet_img = puppet_right
    if keys[pygame.K_UP]:
        puppet_y = max(0, puppet_y - puppet_speed)
    if keys[pygame.K_DOWN]:
        puppet_y = min(HEIGHT - 105, puppet_y + puppet_speed)

# Check Interactions
def check_interaction():
    global gifts_placed, masks_placed, stage, last_mask_time, gifts_given, masks_given, gift_timer, show_extra_child

    puppet_rect = pygame.Rect(puppet_x, puppet_y, 75, 105)

    if stage == "GIVE_GIFTS":
        for i, child_rect in enumerate(children):
            if not gifts_placed[i] and puppet_rect.colliderect(child_rect.inflate(20, 20)):
                gifts_placed[i] = True
        if all(gifts_placed):
            gifts_given = True
            gift_timer = time.time()
            stage = "WAIT_FOR_MASKS"

    elif stage == "WAIT_FOR_MASKS" and gift_timer and time.time() - gift_timer >= 3:
        show_centered_image(lifenew_img, 3)
        gifts_placed = [False] * len(children)
        stage = "GIVE_MASKS"

    elif stage == "GIVE_MASKS":
        for i, child_rect in enumerate(children):
            if not masks_placed[i] and puppet_rect.colliderect(child_rect.inflate(20, 20)):
                masks_placed[i] = True
                if all(masks_placed):
                    masks_given = True
                    last_mask_time = time.time()
                    show_extra_child = True

# Game Loop
while running:
    screen.fill((0, 0, 0))
    keys = pygame.key.get_pressed()
    move_puppet(keys)

    for event in pygame.event.get():
        if event.type == pygame.QUIT:
            running = False

    check_interaction()

    # TV Frame Animation
    tv_frame_index = (tv_frame_index + 1) % len(tv_frames)
    screen.blit(tv_frames[tv_frame_index], (0, 0))

    # Jumpscare Sequence
    if last_mask_time and time.time() - last_mask_time >= 0.5:
        pygame.mixer.Sound.stop(vhs_sound)
        pygame.mixer.Sound.play(jumpscare_sound)

        for frame in jumpscare_frames:
            screen.fill((0, 0, 0))
            screen.blit(frame, (0, 0))
            pygame.display.flip()
            pygame.time.delay(20)

        pygame.time.delay(500)
        show_static_frames()
        running = False

    else:
        screen.blit(puppet_img, (puppet_x, puppet_y))

        for i, child_rect in enumerate(children):
            screen.blit(child_img, (child_rect.x, child_rect.y))

            gift_x = child_rect.x + 60 if child_rect.x < WIDTH // 2 else child_rect.x - 60
            if gifts_placed[i]:
                screen.blit(gift_img, (gift_x, child_rect.y + 20))

        for i, child_rect in enumerate(children):
            if masks_placed[i]:
                screen.blit(mask_images[child_masks[i]], (child_rect.x - 5, child_rect.y - 15))

        if show_extra_child:
            screen.blit(extra_child_img, (extra_child_rect.x, extra_child_rect.y))

    pygame.display.flip()
    clock.tick(30)

pygame.quit()
