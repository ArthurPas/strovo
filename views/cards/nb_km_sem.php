<?php require_once('models/connect.php') ?>
<div class="card">
    <div class="card-body">
        <h4 class="card-title">courses</h4>
        <p class="card-description">
            Tableau des courses
        </p>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre kilométres</th>
                        <th>numéro semaine</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 1; $i < 53; $i++) {
                        $sqlDistance = 'SELECT ROUND(SUM(distance)) FROM courses where date_part(\'week\', date) =' . $i . '';
                        foreach ($pdo->query($sqlDistance) as $row) {
                            $distance = $row['round'] / 1000;
                        }
                        echo ('<tr>
            <td>' . $distance . '</td>
            <td>' . $i . '</td>
            </tr>');
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>