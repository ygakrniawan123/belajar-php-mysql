<?php
session_start();
include "koneksi.php";

if (isset($_GET['id'])) {
    $movie_id = $_GET['id'];

    $stmt = $conn->prepare("SELECT tittle,  FROM films WHERE id = ?");
    $stmt->bind_param('i', $movie_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($movie = $result->fetch_assoc()) {
        echo "<h1>" . htmlspecialchars($movie['tittle']) . "</h1>";
        echo "<video id='videoPlayer' width='640' height='360' controls>";
        echo "<source src='" . htmlspecialchars($movie['video_url']) . "' type='video/mp4'>";
        echo "Your browser does not support the video tag.";
        echo "</video>";
    }
}
?>
<script>
    const video = document.querySelector('#videoPlayer');
    video.addEventListener('timeupdate', () => {
        const lastPosition = Math.floor(video.currentTime);
        if (lastPosition % 5 === 0) { // Simpan setiap 5 detik
            fetch('save_history.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: `movie_id=<?php echo $_GET['id']; ?>&last_position=${lastPosition}`
            });
        }
    });
</script>
