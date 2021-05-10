<div>
    <?php
        if ($metode == 'online') {
            echo '<h4 class="text-info">Anda dapat meminjam buku fisik ini ke perpustakaan</h3>';
        } else if ($metode == 'offline') {
            if (date('Y-m-d') > $batas_tanggal_kembali){
                $date = date("d-m-Y", strtotime($batas_tanggal_kembali));
                echo "<h4 class=\"text-warning\">Jangan lupa mengembalikan buku fisik sebelum batas tanggal pengembalian : $date</h3>";
            } else {
                echo '<h4 class="text-danger">Anda telat mengembalikan buku fisik, segera kembalikan ke perpustakaan!</h3>';
            }
        }
    ?>
    
</div>