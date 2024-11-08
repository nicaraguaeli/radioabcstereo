<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Radio en vivo | Radio ABC Stereo 99.7fm</title>
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <meta name="description" content="Escucha Radio ABC Stereo ¡99.7, en las mejores calificaciones!">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background-image: linear-gradient(135deg, rgb(238, 238, 238) 0%, rgb(148, 148, 158) 100%);
            background-attachment: fixed;
            padding: 20px;
        }
        .player, .news-section {
            width: 350px;         
            text-align: center;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 16px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            overflow: hidden;
            margin-bottom: 0px;
        }
        .blue-section {
            background: linear-gradient(135deg, rgba(0, 96, 151, 0.9) 0%, rgba(0, 136, 204, 0.9) 100%);
            color: white;
            padding: 20px;
            position: relative;
        }
       

        .logo-text {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        .logo {
            width: 75px;
            height: 75px;
            margin-right: 15px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .logo img {
            max-width: 100%;
            max-height: 100%;
        }
        .text-content {
            text-align: left;
        }
        h1 {
            margin: 0 0 5px 0;
            font-size: 16px;
        }
        p {
            margin: 0;
            font-size: 14px;
        }
        .buffer {
            width: 100%;
            height: 5px;
            background-color: rgba(255, 255, 255, 0.3);
            margin-top: 10px;
            border-radius: 2px;
            overflow: hidden;
        }
        .buffer-progress {
            width: 0%;
            height: 100%;
            background-color: #ffffff;
            transition: width 0.3s ease;
        }
        .white-section {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            padding: 20px;
        }
        
        .controls {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        button {
            background: linear-gradient(135deg, #006097 0%, #0088cc 100%);
            border: none;
            color: white;
            width: 40px;
            height: 40px;
            text-align: center;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            cursor: pointer;
            border-radius: 50%;
            transition: all 0.3s ease;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }
        button:hover {
            background: linear-gradient(135deg, #005080 0%, #0077b3 100%);
            box-shadow: 0 4px 8px rgba(0,0,0,0.3);
        }
        .volume-control {
            display: flex;
            align-items: center;
            width: 80%;
        }
        .volume-control input {
            width: 100%;
            margin-left: 10px;
        }
        .volume-icon {
            font-size: 18px;
            color: #006097;
        }
       
    </style>
  
</head>
    <body>
    <div class="player">
        <div class="blue-section">
            <div class="antenna"></div>
            <div class="logo-text">
                <div class="logo">
                    <img src="https://radioabcstereo.com/img/brand.png" alt="ABC Stereo Logo">
                </div>
                <div class="text-content">
                    <h1>RADIO ABC STEREO <br> 99.7 FM </h1>
                    <p>Esteli-Nicaragua</p>
                </div>
            </div>
            <div class="buffer">
                <div class="buffer-progress" id="bufferBar"></div>
            </div>
        </div>
        <div class="white-section">
           
            <audio id="stream" src="https://ssl.aloncast.com:1669/"></audio>
            <div class="controls">
                <button onclick="togglePlay()"><i class="fas fa-play" id="playIcon"></i></button>
                <div class="volume-control">
                    <i class="fas fa-volume-up volume-icon"></i>
                    <input type="range" id="volume" min="0" max="1" step="0.1" value="1">
                </div>
            </div>

           


        </div>
      
    </div>

    

    <script>
        
        const audio = document.getElementById('stream');
        const button = document.querySelector('button');
        const playIcon = document.getElementById('playIcon');
        const bufferBar = document.getElementById('bufferBar');
        const volumeControl = document.getElementById('volume');
        
    



        function togglePlay() {
            console.log('Toggle play clicked');
            if (audio.paused) {
                audio.play();
                playIcon.className = 'fas fa-pause';
            } else {
                audio.pause();
                playIcon.className = 'fas fa-play';
            }
        }

        audio.addEventListener('timeupdate', updateBuffer);
        audio.addEventListener('waiting', showBuffering);
        audio.addEventListener('canplay', hideBuffering);

        function updateBuffer() {
            if (audio.buffered.length > 0) {
                var bufferedEnd = audio.buffered.end(audio.buffered.length - 1);
                var duration = audio.duration;
                
                if (duration > 0) {
                    bufferBar.style.width = ((bufferedEnd / duration) * 100) + "%";
                }
            }
        }

        function showBuffering() {
            bufferBar.style.width = "100%";
            bufferBar.style.opacity = "0.5";
        }

        function hideBuffering() {
            bufferBar.style.opacity = "1";
        }

        volumeControl.addEventListener('input', function() {
            audio.volume = this.value;
        });
        






        
    </script>
</body>
    

</html>
