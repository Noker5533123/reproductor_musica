<?php
// Lista los archivos de música en el directorio "musica"
$musica = array_diff(scandir('musica'), array('.', '..'));
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reproductor de Música</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="player-container">
        <!-- Canción actual -->
        <div class="current-song">
            <h2 id="current-song-title">Selecciona una canción para empezar</h2>
            <audio id="audio-player" controls>
                <source id="audio-source" src="" type="audio/mp3">
                Tu navegador no soporta el elemento de audio.
            </audio>
        </div>

        <!-- Lista de canciones -->
        <div class="song-list">
            <h3>Lista de Canciones</h3>
            <ul>
                <?php foreach ($musica as $cancion): ?>
                    <li>
                        <button class="song-button" onclick="playSong('musica/<?= $cancion ?>', '<?= pathinfo($cancion, PATHINFO_FILENAME) ?>')">
                            <?= pathinfo($cancion, PATHINFO_FILENAME) ?>
                        </button>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

    <script>
        function playSong(songPath, songName) {
            const audioPlayer = document.getElementById('audio-player');
            const audioSource = document.getElementById('audio-source');
            const songTitle = document.getElementById('current-song-title');

            // Actualiza la fuente del audio y el título de la canción
            audioSource.src = songPath;
            songTitle.textContent = 'Reproduciendo: ' + songName;

            // Reproduce la canción
            audioPlayer.load();
            audioPlayer.play();
        }
    </script>
</body>
</html>

