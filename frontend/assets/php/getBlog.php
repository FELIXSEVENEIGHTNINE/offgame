<?php

while ($row = $request->fetch_assoc()) {
    echo "<div class='row'>";
        echo "<h2 class='text-info'>".$row['blog_title']."</h2><small>".$row['blog_date']."</small><br><br>";
        echo "<p>".$row['blog_text']."</p>";
    echo "</div><hr>";
    
}
?>