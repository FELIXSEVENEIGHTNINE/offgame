var i = 1
let k = 0
var r = 1
var l = 1

var run_val = 1

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

//Initial Start Values
var freddy_initial = 60000
var chica_initial = 50000
var bonnie_initial = 60000

//buffer 
var buffer = 3000

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
var bonnie_difficulty = 27500
var bonnie_room = "1a"
var bonnie_interval = null

//Chica
var chica_difficulty = 35000
var chica_room = "1a"
var chica_interval = null

//Freddy
var freddy_difficulty = 25000
var freddy_room = "1a"
var freddy_interval = null

//Foxy
var foxy_delay = 75000
var foxy_stage_difficulty = 35000
var foxy_in_pirate_cove = true
var foxy_2a = false
var foxy_attack_interval = null
var foxy_run_interval = null
var foxy_stage_interval = null
var foxy_stage = 0

//Battery
var start_battery = 7500
var battery = start_battery
var power_use = 1
var battery_interval

var lights_out_interval
var freddy_lights_out_interval


var jumpscare_animatronic = ''


// End of Animatronic Behavior

var current_cam = '2b'
var camera_name = '2b'

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
var knock = new Audio('Audio/knock.wav');
var run_sound = new Audio('Audio/run.wav');
var freddy_laugh_1 = new Audio('Audio/freddy_laugh_1.wav');
var freddy_laugh_2 = new Audio('Audio/freddy_laugh_2.wav');
var freddy_laugh_3 = new Audio('Audio/freddy_laugh_3.wav');
var freddy_laugh_3 = new Audio('Audio/freddy_laugh_3.wav');
var freddy_laugh_3 = new Audio('Audio/freddy_laugh_3.wav');
var powerdown = new Audio('Audio/powerdown.wav');
var lights_out = new Audio('Audio/lights_out.wav');



window.onload = function() {
    start();
    document.addEventListener('contextmenu', event => event.preventDefault());

};

function test() {
    jumpscare()
}

function batteryStart() {
    battery = start_battery
    battery_interval = setInterval(function () {
        battery -= power_use*power_use
        // console.log(battery)
        batteryUpdate()
        if (battery <= 0) {
            clearInterval(battery_interval)
            battery_interval = null
            lightsOut()
        }
    }, 500);
}

function batteryUpdate() {
    var bat_percent = Math.round(battery/start_battery*100)
    if (bat_percent < 0) {
        bat_percent = 0
    }
    document.getElementById('battery_text').innerHTML=`Power Left: ${bat_percent}%`
    document.getElementById('battery_image').src=`FNAF Assets/UI/Power/${power_use}.png`
    battery_image = 1;

}

function lightsOut() {
    clearAllIntervals()
    powerdown.play()
    if (left_door_isOpen == false) {
        leftDoorCloseInternal()
    }
    if (right_door_isOpen == false) {
        rightDoorCloseInternal()
    }
    if (camera_active) {
        cameraFlipInterval()
    }
    if (left_door_lightOff == false) {
        leftDoorLight()
    }
    if (right_door_lightOff == false) {
        rightDoorLight()
    }
    losing_state = true
    document.getElementById('door_right').style.visibility = 'hidden';
    document.getElementById('door_right_buttons').style.visibility = 'hidden';
    document.getElementById('door_left').style.visibility = 'hidden';
    document.getElementById('door_left_buttons').style.visibility = 'hidden';
    document.getElementById('camera_button').style.visibility = 'hidden';
    document.getElementById('screen').src=`FNAF Assets/Office/Lights Out Office/1.png`
    document.getElementById('battery_text').style.visibility = 'hidden';
    document.getElementById('battery_usage').style.visibility = 'hidden';
    document.getElementById('battery_image').style.visibility = 'hidden';


    var light_out_delay = Math.random() * 15000 + 5000
    lights_out_interval = setInterval(function() { 
        powerdown.pause()
        lightsOutFreddyTimer() 
    }, light_out_delay)
}

function lightsOutFreddyTimer() {
    clearInterval(lights_out_interval)
    lights_out_interval = null
    lights_out.play()
    freddy_lights_out_interval = setInterval(function() { 
        document.getElementById('screen').src=`FNAF Assets/Office/Lights Out Office/freddy/${l}.png`
        if (l < 26) {
            l++
        } else {
            lights_out.pause()
            batteryLose()
            clearInterval(freddy_lights_out_interval)
            freddy_lights_out_interval = null
        }
     }, 300)
}

function batteryLose() {
    jumpscare_animatronic = 'freddy_lights_out'
    jumpscare()
}

function foxy_attack_timer() {
    if (left_door_isOpen) {
        losing_state = true
        jumpscare_animatronic = 'foxy'
        jumpscare()
    } else {
        foxy_stage = 0
        foxy_2a = false
        clearInterval(foxy_attack_interval)
        foxy_attack_interval = null
        knock.play()
        foxyBehavior()
    }
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
    jumpscare_sound.pause()
    door_close.pause()
    camera_pullup.pause()
    button_fail.pause()
    audio.pause()
    animatronic_door.pause()
    // door_light.pause()
    change_cam.pause()
    ambient.pause()
    lights_out.pause()
    jumpscare_sound = new Audio('Audio/jumpscare.mp3');
    door_close = new Audio('Audio/door_close.mp3');
    camera_pullup = new Audio('Audio/camera_pullup.mp3');
    button_fail = new Audio('Audio/button_fail.mp3');
    animatronic_door = new Audio('Audio/animatronic_door.mp3');
    audio = new Audio('Audio/jumpscare.mp3');
    ambient = new Audio('Audio/ambient.mp3');
    change_cam = new Audio('Audio/change_cam.mp3');
    lights_out = new Audio('Audio/lights_out.wav');
    // door_light = new Audio('Audio/door_light.mp3');
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
            door_light.pause()
            door_light.play()
        }
        if (right_door_lightOff == true) {
            power_use++
            batteryUpdate()
        }

        left_door_lightOff = false
        right_door_lightOff = true
        leftDoorUICheck()
        rightDoorUICheck()
    } else {
        power_use--
        batteryUpdate()
        door_light.pause()
        door_light = new Audio('Audio/door_light.mp3');
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
            power_use++
            batteryUpdate()
            leftDoorUICheck()
        }
    } else {
        if (left_door_interval === null) {
            left_door_interval = setInterval(function() { leftDoorOpen() }, 20)
            left_door_isOpen = true
            power_use--
            batteryUpdate()
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

    if(losing_state) {
        stopAllSound()
        button_fail.play()
        return
    }

    if (right_door_lightOff) {
        if (chica_room == 'right_door') {
            document.getElementById('screen').src=`FNAF Assets/Office/Chica Door/1.png`
            stopAllSound()
            animatronic_door.play()
        } else {
            document.getElementById('screen').src=`FNAF Assets/Office/Right Door Light/1.png`
            door_light.pause()
            door_light.play()
        }
        if (left_door_lightOff == true) {
            power_use++
            batteryUpdate()
        }
        right_door_lightOff = false
        left_door_lightOff = true
        rightDoorUICheck()
        leftDoorUICheck()
    } else {
        power_use--
        batteryUpdate()
        door_light.pause()
        door_light = new Audio('Audio/door_light.mp3');
        document.getElementById('screen').src=`FNAF Assets/Office/Regular Office/1.png`
        right_door_lightOff = true
        rightDoorUICheck()
    }
}

function rightDoorCloseInternal() {

    if(losing_state) {
        stopAllSound()
        button_fail.play()
        return
    }

    stopAllSound()
    door_close.play()
    if (right_door_isOpen) {
        if (right_door_interval === null) {
            right_door_interval = setInterval(function() { rightDoorClose() }, 20)
            right_door_isOpen = false
            power_use++
            batteryUpdate()
            rightDoorUICheck()
        }
    } else {
        if (right_door_interval === null) {
            right_door_interval = setInterval(function() { rightDoorOpen() }, 20)
            right_door_isOpen = true
            power_use--
            batteryUpdate()
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
            power_use--
            batteryUpdate()
            if(losing_state) {
                jumpscare()
            }
        }
    } else {
        if (camera_interval === null) {
            camera_interval = setInterval(function() { cameraFlipUp() }, 20)
            camera_active = true
            power_use++
            batteryUpdate()
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
            document.getElementById('camera_name').innerHTML=`Show Stage`
            break
        case '1b': 
            document.getElementById('camera_screen').src=`FNAF Assets/Camera/Dining 1B/${cam_1b_status}.png`
            document.getElementById('camera_name').innerHTML=`Dining Area`
            break
        case '1c': 
            document.getElementById('camera_screen').src=`FNAF Assets/Camera/Pirate Cove 1C/${cam_1c_status}.png`
            document.getElementById('camera_name').innerHTML=`Pirate Cove`
            break
        case '2a':
            if(foxy_2a) {
                foxyRunningAnimationInterval()
                run_sound.play()
                break
            }
            document.getElementById('camera_screen').src=`FNAF Assets/Camera/West H 2A/${cam_2a_status}.png`
            document.getElementById('camera_name').innerHTML=`West Hall`

            break
        case '2b': 
            document.getElementById('camera_screen').src=`FNAF Assets/Camera/West HC 2B/${cam_2b_status}.png`
            document.getElementById('camera_name').innerHTML=`W. Hall Corner`
            break
        case '3': 
            document.getElementById('camera_screen').src=`FNAF Assets/Camera/Broom 3/${cam_3_status}.png`
            document.getElementById('camera_name').innerHTML=`Supply Closet`
            break
        case '4a':
            document.getElementById('camera_screen').src=`FNAF Assets/Camera/East H 4A/${cam_4a_status}.png`
            document.getElementById('camera_name').innerHTML=`East Hall`
            break
        case '4b': 
            document.getElementById('camera_screen').src=`FNAF Assets/Camera/East HC 4B/${cam_4b_status}.png`
            document.getElementById('camera_name').innerHTML=`E. Hall Corner`
            break
        case '5': 
            document.getElementById('camera_screen').src=`FNAF Assets/Camera/BStage 5/${cam_5_status}.png`
            document.getElementById('camera_name').innerHTML=`Backstage`
            break
        case '6':
            stopAllSound()
            button_fail.play()
            document.getElementById('camera_screen').src=`FNAF Assets/Camera/Kitchen 6/${cam_6_status}.png`
            document.getElementById('camera_name').innerHTML=`Kitchen`
            break
        case '7': 
            document.getElementById('camera_screen').src=`FNAF Assets/Camera/Bathroom 7/${cam_7_status}.png`
            document.getElementById('camera_name').innerHTML=`Restrooms`
            break
        default:
            break
    }
}

function cam1a() {
    stopAllSound()
    change_cam.play()
    current_cam = '1a'
    camera_name = '1a'
    updateCamera()
}

function cam1b() {
    stopAllSound()
    change_cam.play()
    current_cam = '1b'
    camera_name = '1b'
    updateCamera()
}

function cam1c() {
    stopAllSound()
    change_cam.play()
    current_cam = '1c'
    camera_name = '1c'
    updateCamera()
}

function cam2a() {
    stopAllSound()
    change_cam.play()
    current_cam = '2a'
    camera_name = '2a'
    updateCamera()
}

function cam2b() {
    stopAllSound()
    change_cam.play()
    current_cam = '2b'
    camera_name = '2b'
    updateCamera()
}

function cam3() {
    stopAllSound()
    change_cam.play()
    current_cam = '3'
    camera_name = '3'
    updateCamera()
}

function cam4a() {
    stopAllSound()
    change_cam.play()
    current_cam = '4a'
    camera_name = '4a'
    updateCamera()
}

function cam4b() {
    stopAllSound()
    change_cam.play()
    current_cam = '4b'
    camera_name = '4b'
    updateCamera()
}

function cam5() {
    stopAllSound()
    change_cam.play()
    current_cam = '5'
    camera_name = '5'
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
    camera_name = '7'
    updateCamera()
}

function start() {
    bonnie_interval = setInterval(function() { bonnieBehavior() }, bonnie_initial)
    batteryStart()
    time_interval = setInterval(function() { nightTimer() }, 1000)
}

function nightTimer() {
    hour++
    // console.log(hour)
    if (hour == 6) {
        submitAchievement();
        document.getElementById('time').innerHTML = `${hour} AM`;
        clearInterval(bonnie_interval)
        bonnie_interval == null
        clearInterval(chica_interval)
        chica_interval == null
        clearInterval(foxy_stage_interval)
        foxy_stage_interval == null
        clearInterval(time_interval)
        time_interval == null

        losing_state = false
        winnning_state = true
        document.getElementById("announce").innerHTML = "YOU WIN!";
        document.getElementById('announce').style.visibility = 'visible';
        document.getElementById('retry').style.visibility = 'visible';
        document.getElementById('camera_button').style.disabled = 'disabled';
        document.getElementById('camera_button').style.visibility = 'hidden';
        stopAllSound()
        winning_sound.play()
        clearInterval(battery_interval)
        battery_interval = null
        clearInterval(lights_out_interval)
        lights_out_interval = null
        clearInterval(freddy_lights_out_interval)
        freddy_lights_out_interval = null

        

    } else {
        document.getElementById('time').innerHTML = `${hour} AM`;
    }
}

function freddyBehavior() {
    switch(freddy_room) {
        case '1a':
            var chance = Math.floor(Math.random() * 100) + 1;
            if (cam_1a_status == "no_bonnie_and_chica") {
                if(chance > 20) {
                    freddy_room = '1b'
                    cam_1a_status = "no_one"
                    cam_1b_status = "freddy"
                }
                break
            }
        case '1b':
            var chance = Math.floor(Math.random() * 100) + 1;
            if(chance > 60) {
                freddy_room = '4a'
                if(bonnie_room == '1b') {
                    if (Math.floor(chance)%2 == 0) {
                        cam_1b_status = "bonnie_back"
                    } else {
                        cam_1b_status = "bonnie_front"
                    }
                } else if (chica_room == '1b') {
                    if (Math.floor(chance)%2 == 0) {
                        cam_1b_status = "chica_back"
                    } else {
                        cam_1b_status = "chica_front"
                    }
                } else {
                    cam_1b_status = "default"
                }
                cam_4a_status = "freddy"
            } else if (chance > 20) {
                freddy_room = '7'
                if(bonnie_room == '1b') {
                    if (Math.floor(chance)%2 == 0) {
                        cam_1b_status = "bonnie_back"
                    } else {
                        cam_1b_status = "bonnie_front"
                    }
                } else if (chica_room == '1b') {
                    if (Math.floor(chance)%2 == 0) {
                        cam_1b_status = "chica_back"
                    } else {
                        cam_1b_status = "chica_front"
                    }
                } else {
                    cam_1b_status = "default"
                }
                cam_7_status = "freddy"
            }
            break
        case '4a':
            var chance = Math.floor(Math.random() * 100) + 1;
            if(chance > 20) {
                if (chica_room == '4a') {
                    if (Math.floor(chance)%2 == 0) {
                        cam_4a_status = "chica_back"
                    } else {
                        cam_4a_status = "chica_front"
                    }
                } else {
                    cam_4a_status = "default"
                }
                freddy_room = '4b'
                cam_4b_status = "freddy"
            }
        break
        case '4b':
            var chance = Math.floor(Math.random() * 100) + 1;
            if(chance > 20) {
                if (chica_room == '4b') {
                    cam_4b_status = "chica"
                } else {
                    cam_4b_status = "default"
                }
                var laugh_chance = Math.floor(Math.random() * 100);
                if(laugh_chance > 70) {
                    freddy_laugh_1.play()
                } else if (laugh_chance > 30) {
                    freddy_laugh_2.play()
                } else {
                    freddy_laugh_3.play()
                }
                freddy_room = 'right_door'
                
            }
            break
        case '7':
            var chance = Math.floor(Math.random() * 100) + 1;
            if(chance > 20) {
                if (chica_room == '7') {
                    if (Math.floor(chance)%2 == 0) {
                        cam_7_status = "chica_back"
                    } else {
                        cam_7_status = "chica_front"
                    }
                } else {
                    cam_7_status = "default"
                }
                freddy_room = '1b'
                cam_1b_status = "freddy"
            }
            break
        case 'right_door':
            var chance = Math.floor(Math.random() * 100) + 30;
            if(chance > 20) {
                if (right_door_isOpen) {
                    losing_state = true;
                    jumpscare_animatronic = 'freddy';
                    if (camera_active == false) {
                        jumpscare()
                    }
                } else {
                    freddy_room = '1a'
                    if(bonnie_room == '1a') {
                        if(chica_room == '1a') {
                            cam_1a_status = "default"
                        } else {
                            cam_1a_status = "no_chica"
                        }
                    } else {
                        if(chica_room == '1a') {
                            cam_1a_status = "no_bonnie"
                        } else {
                            cam_1a_status = "no_bonnie_and_chica"
                        }
                    }
                }
            }
            break
        default:
            break
    }
    clearInterval(freddy_interval)
    var timer_number = Math.random()*freddy_difficulty+buffer
    freddy_interval = null
    freddy_interval = setInterval(function() { freddyBehavior() }, timer_number)
    // console.log(timer_number)

}

function bonnieBehavior() {
    switch(bonnie_room) {
        case '1a':
            var chance = Math.floor(Math.random() * 100) + 1;
            if(chance > 20) {
                bonnie_room = '1b'
                if(chica_room == '1a') {
                    cam_1a_status = "no_bonnie"
                } else {
                    if (freddy_room == "1a") {
                        cam_1a_status = "no_bonnie_and_chica"
                    } else {
                        cam_1a_status = "no_one"
                    }
                }
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
                if(chica_room == '1b') {
                    if (Math.floor(chance)%2 == 0) {
                        cam_1b_status = "chica_back"
                    } else {
                        cam_1b_status = "chica_front"
                    }
                } else {
                    cam_1b_status = "default"
                }
                cam_2a_status = "bonnie"
            } else if (chance > 20) {
                bonnie_room = '5'
                if(chica_room == '1b') {
                    if (Math.floor(chance)%2 == 0) {
                        cam_1b_status = "chica_back"
                    } else {
                        cam_1b_status = "chica_front"
                    }
                } else {
                    cam_1b_status = "default"
                }
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
                    if(freddy_room == '1a') {
                        bonnie_room = '1a'
                        if(chica_room == '1a') {
                            cam_1a_status = "default"
                        } else {
                            cam_1a_status = "no_chica"
                        }    
                    } else {
                        bonnie_room = '1b'
                        var chance = Math.floor(Math.random() * 100) + 1;
                        if (Math.floor(chance)%2 == 0) {
                            cam_1b_status = "bonnie_back"
                        } else {
                            cam_1b_status = "bonnie_front"
                        }
                    }            
                }
            }
            break
        default:
            break
    }
    clearInterval(bonnie_interval)
    var timer_number = Math.random()*bonnie_difficulty+buffer
    bonnie_interval = null
    bonnie_interval = setInterval(function() { bonnieBehavior() }, timer_number)
    // console.log(timer_number)

}

function chicaBehavior() {
    switch(chica_room) {
        case '1a':
            var chance = Math.floor(Math.random() * 100) + 1;
            if(chance > 20) {
                chica_room = '1b'
                if(bonnie_room == '1a') {
                    cam_1a_status = "no_chica"
                } else {
                    if (freddy_room == "1a") {
                        cam_1a_status = "no_bonnie_and_chica"
                    } else {
                        cam_1a_status = "no_one"
                    }
                }
                if (Math.floor(chance)%2 == 0) {
                    cam_1b_status = "chica_back"
                } else {
                    cam_1b_status = "chica_front"
                }
            }
            break
        case '1b':
            var chance = Math.floor(Math.random() * 100) + 1;
            if(chance > 60) {
                chica_room = '4a'
                if(bonnie_room == '1b') {
                    if (Math.floor(chance)%2 == 0) {
                        cam_1b_status = "bonnie_back"
                    } else {
                        cam_1b_status = "bonnie_front"
                    }
                } else {
                    cam_1b_status = "default"
                }
                if (Math.floor(chance)%2 == 0) {
                    cam_4a_status = "chica_back"
                } else {
                    cam_4a_status = "chica_front"
                }
            } else if (chance > 20) {
                chica_room = '7'
                if(bonnie_room == '1b') {
                    if (Math.floor(chance)%2 == 0) {
                        cam_1b_status = "bonnie_back"
                    } else {
                        cam_1b_status = "bonnie_front"
                    }
                } else {
                    cam_1b_status = "default"
                }
                if (Math.floor(chance)%2 == 0) {
                    cam_7_status = "chica_back"
                } else {
                    cam_7_status = "chica_front"
                }
            }
            break
        case '4a':
            var chance = Math.floor(Math.random() * 100) + 1;
            if(chance > 20) {
                chica_room = '4b'
                cam_4a_status = "default"
                cam_4b_status = "chica"
            }
        break
        case '4b':
            var chance = Math.floor(Math.random() * 100) + 1;
            if(chance > 20) {
                chica_room = 'right_door'
                cam_4b_status = "default"
            }
            break
        case '1a':
            var chance = Math.floor(Math.random() * 100) + 1;
            if(chance > 20) {
                chica_room = '1b'
                if(bonnie_room == '1a') {
                    cam_1a_status = "no_chica"
                } else {
                    cam_1a_status = "no_bonnie_and_chica"
                }
                if (Math.floor(chance)%2 == 0) {
                    cam_1b_status = "chica_back"
                } else {
                    cam_1b_status = "chica_front"
                }
            }
            break
        case '7':
            var chance = Math.floor(Math.random() * 100) + 1;
            if(chance > 20) {
                cam_7_status = "default"
                chica_room = '1b'
                if (Math.floor(chance)%2 == 0) {
                    cam_1b_status = "chica_back"
                } else {
                    cam_1b_status = "chica_front"
                }
            }
            break
        case 'right_door':
            var chance = Math.floor(Math.random() * 100) + 1;
            if(chance > 20) {
                if (right_door_isOpen) {
                    losing_state = true;
                    jumpscare_animatronic = 'chica';
                } else {
                    if(freddy_room == '1a') {
                        chica_room = '1a'
                        if(bonnie_room == '1a') {
                            cam_1a_status = "default"
                        } else {
                            cam_1a_status = "no_bonnie"
                        }
                    } else {
                        var chance = Math.floor(Math.random() * 100) + 1;
                        chica_room = '1b'
                        if (Math.floor(chance)%2 == 0) {
                            cam_1b_status = "chica_back"
                        } else {
                            cam_1b_status = "chica_front"
                        }
                    }
                }
            }
            break
        default:
            break
    }
    clearInterval(chica_interval)
    var timer_number = Math.random()*chica_difficulty+buffer
    chica_interval = null
    chica_interval = setInterval(function() { chicaBehavior() }, timer_number)
    // console.log(timer_number)

}

function foxyBehavior() {
    if (foxy_stage == 0) {
        var chance = Math.floor(Math.random() * foxy_delay) + 30000;
        foxy_stage_interval = setInterval(function() { foxy_stage_timer() }, chance)
    } else if (foxy_stage < 3) {
        var chance = Math.floor(Math.random() * foxy_stage_difficulty) + 10000;
        foxy_stage_interval = setInterval(function() { foxy_stage_timer() }, chance)
    } else {
        foxy_in_pirate_cove = false
        foxy_attack_interval = setInterval(function() { foxy_attack_timer() }, 20000)
        foxy_2a = true
        cam_1c_status = foxy_stage
        return
    }
    cam_1c_status = foxy_stage
    // console.log(foxy_stage)

}
function foxy_stage_timer() {
    clearInterval(foxy_stage_interval)
    foxy_stage_interval = null
    foxy_stage++
    foxyBehavior()
}

function foxy_attack_timer() {
    if (left_door_isOpen) {
        losing_state = true
        jumpscare_animatronic = 'foxy'
        jumpscare()
    } else {
        foxy_stage = 0
        foxy_2a = false
        clearInterval(foxy_attack_interval)
        foxy_attack_interval = null
        knock.play()
        foxyBehavior()
    }
}

function foxyRunningAnimationInterval() {
    foxy_run_interval = setInterval(function() { foxyRunningAnimation(run_val) }, 30)
}


function foxyRunningAnimation(img) {
    document.getElementById('camera_screen').src=`FNAF Assets/Camera/West H 2A/Foxy Run/${img}.png`
    // console.log(i)
    if (run_val < 31) {
        run_val++
    }
    else {
        run_val = 1;
        clearInterval(foxy_attack_interval)
        clearInterval(foxy_run_interval)
        foxy_run_interval = null
        foxy_2a = false
        foxy_attack_interval = setInterval(function() { foxy_attack_timer() }, 3000)
    }
}


function jumpscare() {
    switch (jumpscare_animatronic) {
        case 'bonnie':
            run = setInterval(function() { bonnieJumpscare(i) }, 30)
            break
        case 'chica':
            run = setInterval(function() { chicaJumpscare(i) }, 30)
            break
        case 'foxy':
            run = setInterval(function() { foxyJumpscare(i) }, 30)
            break
        case 'freddy':
            run = setInterval(function() { freddyJumpscare(i) }, 30)
            break
        case 'freddy_lights_out':
            run = setInterval(function() { freddyLightsOutJumpscare(i) }, 30)
            break
    }
    clearInterval(battery_interval)
    battery_interval = null
    clearInterval(time_interval)
    time_interval = null
    document.getElementById('door_right').style.visibility = 'hidden';
    document.getElementById('door_right_buttons').style.visibility = 'hidden';
    document.getElementById('door_left').style.visibility = 'hidden';
    document.getElementById('door_left_buttons').style.visibility = 'hidden';
    document.getElementById('camera_button').style.visibility = 'hidden';
    document.getElementById('battery_text').style.visibility = 'hidden';
    document.getElementById('battery_usage').style.visibility = 'hidden';
    document.getElementById('battery_image').style.visibility = 'hidden';
    stopAllSound()
    jumpscare_sound.play()
    clearAllIntervals()
    
}

function clearAllIntervals() {
    clearInterval(freddy_interval)
    clearInterval(bonnie_interval)
    clearInterval(chica_interval)
    clearInterval(foxy_attack_interval)
    clearInterval(foxy_run_interval)
    clearInterval(foxy_stage_interval)
    freddy_interval = null
    bonnie_interval = null
    chica_interval = null
    foxy_attack_interval = null
    foxy_run_interval = null
    foxy_stage_interval = null
}

function freddyLightsOutJumpscare(img) {
    document.getElementById('camera_button').style.visibility = 'hidden';
    document.getElementById('screen').src=`FNAF Assets/Office/Freddy Lights Out Jumpscare/${img}.png`
    // console.log(i)
    if (i < 20) {
        i++
    }
    else {
        clearInterval(run);
        run = null; 
        document.getElementById("announce").innerHTML = "YOU LOSE!";
        document.getElementById('announce').style.visibility = 'visible';
        document.getElementById('retry').style.visibility = 'visible';
    }
}

function freddyJumpscare(img) {
    document.getElementById('camera_button').style.visibility = 'hidden';
    document.getElementById('screen').src=`FNAF Assets/Office/Freddy Jumpscare/${img}.png`
    // console.log(i)
    if (i <= 24) {
        i++
    }
    else {
        i = 11;
        r++;
        if (r > 8) {
            clearInterval(run);
            run = null; 
            document.getElementById("announce").innerHTML = "YOU LOSE!";
            document.getElementById('announce').style.visibility = 'visible';
            document.getElementById('retry').style.visibility = 'visible';
        }
    }
}

function bonnieJumpscare(img) {
    document.getElementById('camera_button').style.visibility = 'hidden';
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
            document.getElementById('retry').style.visibility = 'visible';
        }
    }
}

function chicaJumpscare(img) {
    document.getElementById('camera_button').style.visibility = 'hidden';
    document.getElementById('screen').src=`FNAF Assets/Office/Chica Jumpscare/${img}.png`
    // console.log(i)
    if (i < 16) {
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
            document.getElementById('retry').style.visibility = 'visible';
        }
    }
}

function foxyJumpscare(img) {
    document.getElementById('screen').src=`FNAF Assets/Office/Foxy Jumpscare/${img}.png`
    // console.log(i)
    if (i < 21) {
        i++
    }
    else {
        clearInterval(run);
        run = null; 
        document.getElementById("announce").innerHTML = "YOU LOSE!";
        document.getElementById('announce').style.visibility = 'visible';
        document.getElementById('camera_button').style.visibility = 'hidden';
        document.getElementById('retry').style.visibility = 'visible';
    }
}

function submitAchievement() {
    // document.getElementById("achievementform").submit();
    document.getElementById("submit").click();
}


