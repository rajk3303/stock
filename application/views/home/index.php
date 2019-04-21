<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="#0082fb" />



  <title>Simplentory</title>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
      <script src='https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js'></script>
      <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">

      <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
      <link rel="stylesheet" href="<?php echo base_url('assets/index.css') ?>">

      <script src="scripts/countdown.js"></script>
      <script src="scripts/navigationbar.js"></script>
      <script src="scripts/contentcontainers.js"></script>

</head>

<main>
<body onload="myFunction()">
    <div style="z-index: -1;" id="particles-js"></div>


    <div id="myDiv" class="animate-bottom">

        
            <div id="splash">

              <div id="centeringdiv">
                <img id="logomain" class="logoanimation" src="<?php echo base_url('assets/images/simplentorylogo.png') ?>" width="790vw" height="240vw"></img>
              <br />
                <br/>
                <p class="descriptiontext">A simple to use & general purpose stock management solution </p>


                <div class="twobuttons">
                  <div class="row" >
                    
                    <div class="column">
                      <a href="<?php echo base_url('auth/login') ?>">
                        <button type="button" id="loginbtn" ><span>Login</span></button>
                      </a> 
                    </div>
                    <div class="column">
                      <a href="<?php echo base_url('reg/create') ?>">
                        <button type="button" id="registerbtn"><span>Signup</span></button>
                      </a>
                      </div>
                  </div>
                    
                </div>
              </div>
            </div> 
            
          

    <script>
      particlesJS("particles-js", {
        "particles": {
          "number": {
            "value": 300,
            "density": {
              "enable": true,
              "value_area": 2000
            }
          },
          "color": {
            "value": "#00A759"
          },
          "shape": {
            "type": "circle",
            "stroke": {
              "width": 0,
              "color": "#00A759"
            },
            "polygon": {
              "nb_sides": 5
            },
            "image": {
              "src": "img/github.svg",
              "width": 100,
              "height": 100
            }
          },
          "opacity": {
            "value": 1,
            "random": false,
            "anim": {
              "enable": true,
              "speed": 1,
              "opacity_min": 0.1,
              "sync": false
            }
          },
          "size": {
            "value": 3,
            "random": true,
            "anim": {
              "enable": true,
              "speed": 20,
              "size_min": 0.1,
              "sync": false
            }
          },
          "line_linked": {
            "enable": true,
            "distance": 150,
            "color": "#00A759",
            "opacity": 0.4,
            "width": 1
          },
          "move": {
            "enable": true,
            "speed": 1,
            "direction": "none",
            "random": true,
            "straight": false,
            "out_mode": "out",
            "bounce": true,
            "attract": {
              "enable": false,
              "rotateX": 600,
              "rotateY": 1200
            }
          }
        },
        "interactivity": {
          "detect_on": "canvas",
          "events": {
            "onhover": {
              "enable": true,
              "mode": "grab"
            },
            "onclick": {
              "enable": true,
              "mode": "push"
            },
            "resize": true
          },
          "modes": {
            "grab": {
              "distance": 140,
              "line_linked": {
                "opacity": 1
              }
            },
            "bubble": {
              "distance": 400,
              "size": 40,
              "duration": 2,
              "opacity": 8,
              "speed": 3
            },
            "repulse": {
              "distance": 200,
              "duration": 0.4
            },
            "push": {
              "particles_nb": 4
            },
            "remove": {
              "particles_nb": 2
            }
          }
        },
        "retina_detect": true
      });
      
      
    </script>
            
    

<script>
    var myVar;
    
    function myFunction() {
        myVar = setTimeout(showPage, 3000);
    }
    
    function showPage() {
      document.getElementById("myDiv").style.display = "block";
    }
</script>
  </div>
</body>
</main>
</html>
