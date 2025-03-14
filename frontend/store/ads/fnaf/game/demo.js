var i = 1
let k = 0
var r = 1

let left_door = 1
var left_door_interval = null
var left_door_isOpen = true
var left_door_lightOff = true

let right_door = 1
var right_door_interval = null
var right_door_isOpen = true
var right_door_lightOff = true

let camera_flip = 1
var camera_interval = null
var camera_active = false

//time remaining
var hour = 0
var time_interval = null
var winnning_state = false

//losing
var losing_state = false
var run = null

//Camera Values 
var cam_1a_status = "default"
var cam_1b_status = "default"
var cam_1c_status = "default"
var cam_2a_status = "default"
var cam_2b_status = "default"
var cam_3_status = "default"
var cam_4a_status = "default"
var cam_4b_status = "default"
var cam_5_status = "default"
var cam_6_status = "default"
var cam_7_status = "default"

//Animatronic Behavior
//Bonnie
var bonnie_difficulty = 15000
var bonnie_room = "1a"
var bonnie_interval = null

//Chica
var chica_difficulty = 15000
var chica_room = "1a"
var chica_interval = null


var jumpscare_animatronic = null


// End of Animatronic Behavior

var current_cam = '2b'

var jumpscare_sound = new Audio('Audio/jumpscare.mp3');
var door_close = new Audio('Audio/door_close.mp3');
var camera_pullup = new Audio('Audio/camera_pullup.mp3');
var button_fail = new Audio('Audio/button_fail.mp3');
var animatronic_door = new Audio('Audio/animatronic_door.mp3');
var audio = new Audio('Audio/jumpscare.mp3');
var ambient = new Audio('Audio/ambient.mp3');
var change_cam = new Audio('Audio/change_cam.mp3');
var door_light = new Audio('Audio/door_light.mp3');
var winning_sound = new Audio('Audio/6am.mp3');


window.onload = function() {
    start();
};

function test() {
    jumpscare()
}

function change(img) {
    stopAllSound()
    jumpscare_sound.play()
    document.getElementById('screen').src=`FNAF Assets/Office/Freddy Jumpscare/${img}.png`
    // console.log(i)
    if (i <= 513) i++
    else {
        i = 500;
    }
}

function stopAllSound() {
    try {
        jumpscare_sound.pause()
    } catch (err) {
    }
    try {
        door_close.pause()
    } catch (err) {
    }
    try {
        camera_pullup.pause()
    } catch (err) {
    }
    try {
        button_fail.pause()
    } catch (err) {
    }
    try {
        audio.pause()
    } catch (err) {
    }
    try {
        animatronic_door.pause()
    } catch (err) {
    }
    try {
        door_light.pause()
    } catch (err) {
    }
    try {
        change_cam.pause()
    } catch (err) {
    }
    try {
        ambient.pause()
    } catch (err) {
    }
    jumpscare_sound = new Audio('Audio/jumpscare.mp3');
    door_close = new Audio('Audio/door_close.mp3');
    camera_pullup = new Audio('Audio/camera_pullup.mp3');
    button_fail = new Audio('Audio/button_fail.mp3');
    animatronic_door = new Audio('Audio/animatronic_door.mp3');
    audio = new Audio('Audio/jumpscare.mp3');
    ambient = new Audio('Audio/ambient.mp3');
    change_cam = new Audio('Audio/change_cam.mp3');
    door_light = new Audio('Audio/door_light.mp3');
}

function leftDoorLight() {

    if(losing_state) {
        stopAllSound()
        button_fail.play()
        return
    }

    if (left_door_lightOff) {
        if (bonnie_room == 'left_door') {
            document.getElementById('screen').src=`FNAF Assets/Office/Bonnie Door/1.png`
            stopAllSound()
            animatronic_door.play()
        } else {
            document.getElementById('screen').src=`FNAF Assets/Office/Left Door Light/1.png`
            stopAllSound()
            door_light.play()
        }
        left_door_lightOff = false
        right_door_lightOff = true
        leftDoorUICheck()
        rightDoorUICheck()
    } else {
        stopAllSound()
        document.getElementById('screen').src=`FNAF Assets/Office/Regular Office/1.png`
        left_door_lightOff = true
        leftDoorUICheck()
    }
}

function leftDoorCloseInternal() {

    if(losing_state) {
        stopAllSound()
        button_fail.play()
        return
    }

    stopAllSound()
    door_close.play()
    if (left_door_isOpen) {
        if (left_door_interval === null) {
            left_door_interval = setInterval(function() { leftDoorClose() }, 20)
            left_door_isOpen = false
            leftDoorUICheck()
        }
    } else {
        if (left_door_interval === null) {
            left_door_interval = setInterval(function() { leftDoorOpen() }, 20)
            left_door_isOpen = true
            leftDoorUICheck()
        }
    }
}

function leftDoorUICheck() {

    if(left_door_lightOff) {
        if(left_door_isOpen) {
            document.getElementById('door_left_buttons').src=`FNAF Assets/UI/Door Buttons/Left Button/Open Off.png`
        } else {
            document.getElementById('door_left_buttons').src=`FNAF Assets/UI/Door Buttons/Left Button/Close Off.png`
        }
    } else {
        if(left_door_isOpen) {
            document.getElementById('door_left_buttons').src=`FNAF Assets/UI/Door Buttons/Left Button/Open Light.png`
        } else {
            document.getElementById('door_left_buttons').src=`FNAF Assets/UI/Door Buttons/Left Button/Close Light.png`
        }
    }
}

function leftDoorClose() {
    document.getElementById('door_left').src=`FNAF Assets/Office/Left Door Animation/${left_door}.png`
    // console.log(left_door)
    if (left_door < 16) {
        left_door++
    } else {
        clearInterval(left_door_interval)
        left_door_interval = null
    }
}

function leftDoorOpen() {
    document.getElementById('door_left').src=`FNAF Assets/Office/Left Door Animation/${left_door}.png`
    // console.log(left_door)
    if (left_door > 1) {
        left_door--
    } else {
        clearInterval(left_door_interval)
        left_door_interval = null
    }
}

function rightDoorLight() {

    if (right_door_lightOff) {
        // document.getElementById('screen').src=`FNAF Assets/Office/Right Door Light/1.png`
        stopAllSound()
        door_light.play()
        document.getElementById('screen').src=`FNAF Assets/Office/Right Door Light/1.png`
        right_door_lightOff = false
        left_door_lightOff = true
        rightDoorUICheck()
        leftDoorUICheck()
    } else {
        stopAllSound()
        document.getElementById('screen').src=`FNAF Assets/Office/Regular Office/1.png`
        right_door_lightOff = true
        rightDoorUICheck()
    }
}

function rightDoorCloseInternal() {

    stopAllSound()
    door_close.play()
    if (right_door_isOpen) {
        if (right_door_interval === null) {
            right_door_interval = setInterval(function() { rightDoorClose() }, 20)
            right_door_isOpen = false
            rightDoorUICheck()
        }
    } else {
        if (right_door_interval === null) {
            right_door_interval = setInterval(function() { rightDoorOpen() }, 20)
            right_door_isOpen = true
            rightDoorUICheck()
        }
    }
}

function rightDoorUICheck() {

    if(right_door_lightOff) {
        if(right_door_isOpen) {
            document.getElementById('door_right_buttons').src=`FNAF Assets/UI/Door Buttons/Right Button/Open Off.png`
        } else {
            document.getElementById('door_right_buttons').src=`FNAF Assets/UI/Door Buttons/Right Button/Close Off.png`
        }
    } else {
        if(right_door_isOpen) {
            document.getElementById('door_right_buttons').src=`FNAF Assets/UI/Door Buttons/Right Button/Open Light.png`
        } else {
            document.getElementById('door_right_buttons').src=`FNAF Assets/UI/Door Buttons/Right Button/Close Light.png`
        }
    }
}

function rightDoorClose() {
    document.getElementById('door_right').src=`FNAF Assets/Office/Right Door Animation/${right_door}.png`
    // console.log(right_door)
    if (right_door < 16) {
        right_door++
    } else {
        clearInterval(right_door_interval)
        right_door_interval = null
    }
}

function rightDoorOpen() {
    document.getElementById('door_right').src=`FNAF Assets/Office/Right Door Animation/${right_door}.png`
    // console.log(right_door)
    if (right_door > 1) {
        right_door--
    } else {
        clearInterval(right_door_interval)
        right_door_interval = null
    }
}

function cameraFlipInterval() {
    stopAllSound()
    camera_pullup.play()
    if (camera_active) {
        if (camera_interval === null) {
            camera_interval = setInterval(function() { cameraFlipDown() }, 20)
            camera_active = false
            if(losing_state) {
                jumpscare()
            }
        }
    } else {
        if (camera_interval === null) {
            camera_interval = setInterval(function() { cameraFlipUp() }, 20)
            camera_active = true
        }
    }
}

function cameraFlipUp() {
    document.getElementById('camera_animation').src=`FNAF Assets/UI/Camera Flip/${camera_flip}.png`
    // console.log(camera_flip)
    if (camera_flip < 10) {
        camera_flip++
    } else {
        clearInterval(camera_interval)
        document.getElementById('camera_animation').src=``
        hideOffice()
        camera_interval = null
    }
}

function cameraFlipDown() {
    document.getElementById('camera_animation').src=`FNAF Assets/UI/Camera Flip/${camera_flip}.png`
    showOffice()
    // console.log(camera_flip)
    if (camera_flip > 1) {
        camera_flip--
    } else {
        clearInterval(camera_interval)
        document.getElementById('camera_animation').src=``
        camera_interval = null
    }
}

function hideOffice() {
    updateCamera()
    document.getElementById('camera_screen').disabled = false
    document.getElementById('camera_screen').style.visibility = 'visible'

    document.getElementById('camera_map').src=`FNAF Assets/UI/Camera Layout/1.png`
    document.getElementById('cameras').disabled = false
    document.getElementById('cameras').style.visibility = 'visible'
}

function showOffice() {
    document.getElementById('camera_screen').disabled = true
    document.getElementById('camera_screen').style.visibility = 'hidden'

    document.getElementById('camera_map').src=``
    document.getElementById('cameras').disabled = true
    document.getElementById('cameras').style.visibility = 'hidden'
}

function updateCamera() {
    switch(current_cam) {
        case '1a':
            document.getElementById('camera_screen').src=`FNAF Assets/Camera/Stage 1A/${cam_1a_status}.png`
            break
        case '1b': 
            document.getElementById('camera_screen').src=`FNAF Assets/Camera/Dining 1B/${cam_1b_status}.png`
            break
        case '1c': 
            document.getElementById('camera_screen').src=`FNAF Assets/Camera/Pirate Cove 1C/${cam_1c_status}.png`
            break
        case '2a':
            document.getElementById('camera_screen').src=`FNAF Assets/Camera/West H 2A/${cam_2a_status}.png`
            break
        case '2b': 
            document.getElementById('camera_screen').src=`FNAF Assets/Camera/West HC 2B/${cam_2b_status}.png`
            break
        case '3': 
            document.getElementById('camera_screen').src=`FNAF Assets/Camera/Broom 3/${cam_3_status}.png`
            break
        case '4a':
            document.getElementById('camera_screen').src=`FNAF Assets/Camera/East H 4A/${cam_4a_status}.png`
            break
        case '4b': 
            document.getElementById('camera_screen').src=`FNAF Assets/Camera/East HC 4B/${cam_4b_status}.png`
            break
        case '5': 
            document.getElementById('camera_screen').src=`FNAF Assets/Camera/BStage 5/${cam_5_status}.png`
            break
        case '6':
            stopAllSound()
            button_fail.play()
            document.getElementById('camera_screen').src=`FNAF Assets/Camera/Kitchen 6/${cam_6_status}.png`
            break
        case '7': 
            document.getElementById('camera_screen').src=`FNAF Assets/Camera/Bathroom 7/${cam_7_status}.png`
            break
        default:
            break
    }
}

function cam1a() {
    stopAllSound()
    change_cam.play()
    current_cam = '1a'
    updateCamera()
}

function cam1b() {
    stopAllSound()
    change_cam.play()
    current_cam = '1b'
    updateCamera()
}

function cam1c() {
    stopAllSound()
    change_cam.play()
    current_cam = '1c'
    updateCamera()
}

function cam2a() {
    stopAllSound()
    change_cam.play()
    current_cam = '2a'
    updateCamera()
}

function cam2b() {
    stopAllSound()
    change_cam.play()
    current_cam = '2b'
    updateCamera()
}

function cam3() {
    stopAllSound()
    change_cam.play()
    current_cam = '3'
    updateCamera()
}

function cam4a() {
    stopAllSound()
    change_cam.play()
    current_cam = '4a'
    updateCamera()
}

function cam4b() {
    stopAllSound()
    change_cam.play()
    current_cam = '4b'
    updateCamera()
}

function cam5() {
    stopAllSound()
    change_cam.play()
    current_cam = '5'
    updateCamera()
}

function cam6() {
    stopAllSound()
    button_fail.play()
    // current_cam = '6'
    updateCamera()
}

function cam7() {
    stopAllSound()
    change_cam.play()
    current_cam = '7'
    updateCamera()
}

function start() {
    var timer_number = Math.random()*bonnie_difficulty
    bonnie_interval = setInterval(function() { bonnieBehavior() }, timer_number)
    console.log(timer_number)

    time_interval = setInterval(function() { nightTimer() }, 60000)
}

function nightTimer() {
    hour++
    console.log(hour)
    if (hour == 6) {
        document.getElementById('time').innerHTML = `${hour} AM`;
        clearInterval(bonnie_interval)
        bonnie_interval == null
        clearInterval(time_interval)
        time_interval == null

        winnning_state = true
        document.getElementById("announce").innerHTML = "YOU WIN!";
        document.getElementById('announce').style.visibility = 'visible';
        document.getElementById('retry').style.visibility = 'visible';
        document.getElementById('camera_button').style.disabled = 'disabled';
        document.getElementById('camera_button').style.visibility = 'hidden';
        stopAllSound()
        winning_sound.play()

    } else {
        document.getElementById('time').innerHTML = `${hour} AM`;
    }
}

function bonnieBehavior() {
    switch(bonnie_room) {
        case '1a':
            var chance = Math.floor(Math.random() * 100) + 1;
            if(chance > 20) {
                bonnie_room = '1b'
                cam_1a_status = "no_bonnie"
                if (Math.floor(chance)%2 == 0) {
                    cam_1b_status = "bonnie_back"
                } else {
                    cam_1b_status = "bonnie_front"
                }
            }
            break
        case '1b':
            var chance = Math.floor(Math.random() * 100) + 1;
            if(chance > 60) {
                bonnie_room = '2a'
                cam_1b_status = "default"
                cam_2a_status = "bonnie"
            } else if (chance > 20) {
                bonnie_room = '5'
                cam_1b_status = "default"
                if (Math.floor(chance)%2 == 0) {
                    cam_5_status = "bonnie_back"
                } else {
                    cam_5_status = "bonnie_front"
                }
            }
            break
        case '2a':
            var chance = Math.floor(Math.random() * 100) + 1;
            if(chance > 60) {
                bonnie_room = '2b'
                cam_2a_status = "default"
                cam_2b_status = "bonnie"
            } else if (chance > 20) {
                bonnie_room = '3'
                cam_2a_status = "default"
                cam_3_status = "bonnie"
            }
            break
        case '2b':
            var chance = Math.floor(Math.random() * 100) + 1;
            if(chance > 20) {
                bonnie_room = "left_door"
                cam_2b_status = "default"
            }
            break
        case '3':
            var chance = Math.floor(Math.random() * 100) + 1;
            if(chance > 20) {
                bonnie_room = '2a'
                cam_3_status = "default"
                cam_2a_status = "bonnie"
            }
            break
        case '5':
            var chance = Math.floor(Math.random() * 100) + 1;
            if(chance > 20) {
                bonnie_room = '1b'
                cam_5_status = "default"
                if (Math.floor(chance)%2 == 0) {
                    cam_1b_status = "bonnie_back"
                } else {
                    cam_1b_status = "bonnie_front"
                }
            }
            break
        case 'left_door':
            var chance = Math.floor(Math.random() * 100) + 1;
            if(chance > 20) {
                if (left_door_isOpen) {
                    losing_state = true;
                    jumpscare_animatronic = 'bonnie';
                } else {
                    bonnie_room = '1a'
                    cam_1a_status = "default"
                }
            }
            break
        default:
            break
    }
    clearInterval(bonnie_interval)
    var timer_number = Math.random()*bonnie_difficulty
    bonnie_interval = null
    bonnie_interval = setInterval(function() { bonnieBehavior() }, timer_number)
    console.log(timer_number)

}

function updateRoom() {
}



function jumpscare() {
    switch (jumpscare_animatronic) {
        case 'bonnie':
            run = setInterval(function() { bonnieJumpscare(i) }, 30)
            break
    }
    stopAllSound()
    jumpscare_sound.play()
    
}

function bonnieJumpscare(img) {
    document.getElementById('screen').src=`FNAF Assets/Office/Bonnie Jumpscare/${img}.png`
    // console.log(i)
    if (i < 11) {
        i++
    }
    else {
        i = 2;
        r++;
        if (r > 10) {
            clearInterval(run);
            run = null; 
            document.getElementById("announce").innerHTML = "YOU LOSE!";
            document.getElementById('announce').style.visibility = 'visible';
            document.getElementById('camera_button').style.visibility = 'hidden';
            document.getElementById('retry').style.visibility = 'visible';
        }
    }
}


