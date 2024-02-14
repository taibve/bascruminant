<?php
//CARABAO
$sqlStatus = 'SELECT status, COUNT(*) as count FROM animal_tbl GROUP BY status';
$resultStatus = $connection->query($sqlStatus);

// Extract data for the status pie chart
$aliveCount = 0;
$deceasedCount = 0;

while ($row = $resultStatus->fetch_assoc()) {
    if ($row['status'] == 'alive') {
        $aliveCount = $row['count'];
    } elseif ($row['status'] == 'deceased') {
        $deceasedCount = $row['count'];
    }
}

// Fetch data from the database for Carabao's sex
$sqlSex = 'SELECT sex, COUNT(*) as count FROM carabao_tbl GROUP BY sex';
$resultSex = $connection->query($sqlSex);

// Extract data for the sex pie chart
$maleCount = 0;
$femaleCount = 0;

while ($row = $resultSex->fetch_assoc()) {
    if ($row['sex'] == 'male') {
        $maleCount = $row['count'];
    } elseif ($row['sex'] == 'female') {
        $femaleCount = $row['count'];
    }
}

//CATTLE
// Fetch data from the database for Cattle
$sqlStatusCattle = 'SELECT status, COUNT(*) as count FROM cattle_tbl GROUP BY status';
$resultStatusCattle = $connection->query($sqlStatusCattle);

// Extract data for the status pie chart for Cattle
$aliveCountCattle = 0;
$deceasedCountCattle = 0;

while ($row = $resultStatusCattle->fetch_assoc()) {
    if ($row['status'] == 'alive') {
        $aliveCountCattle = $row['count'];
    } elseif ($row['status'] == 'deceased') {
        $deceasedCountCattle = $row['count'];
    }
}

// Fetch data from the database for Cattle's sex
$sqlSexCattle = 'SELECT sex, COUNT(*) as count FROM cattle_tbl GROUP BY sex';
$resultSexCattle = $connection->query($sqlSexCattle);

// Extract data for the sex pie chart for Cattle
$maleCountCattle = 0;
$femaleCountCattle = 0;

while ($row = $resultSexCattle->fetch_assoc()) {
    if ($row['sex'] == 'male') {
        $maleCountCattle = $row['count'];
    } elseif ($row['sex'] == 'female') {
        $femaleCountCattle = $row['count'];
    }
}

//RABBIT
$sqlStatusRabbit = 'SELECT status, COUNT(*) as count FROM rabbit_tbl GROUP BY status';
$resultStatusRabbit = $connection->query($sqlStatusRabbit);

// Extract data for the status pie chart for Rabbit
$aliveCountRabbit = 0;
$deceasedCountRabbit = 0;

while ($row = $resultStatusRabbit->fetch_assoc()) {
    if ($row['status'] == 'alive') {
        $aliveCountRabbit = $row['count'];
    } elseif ($row['status'] == 'deceased') {
        $deceasedCountRabbit = $row['count'];
    }
}

// Fetch data from the database for Rabbit's sex
$sqlSexRabbit = 'SELECT sex, COUNT(*) as count FROM rabbit_tbl GROUP BY sex';
$resultSexRabbit = $connection->query($sqlSexRabbit);

// Extract data for the sex pie chart for Rabbit
$maleCountRabbit = 0;
$femaleCountRabbit = 0;

while ($row = $resultSexRabbit->fetch_assoc()) {
    if ($row['sex'] == 'male') {
        $maleCountRabbit = $row['count'];
    } elseif ($row['sex'] == 'female') {
        $femaleCountRabbit = $row['count'];
    }
}


//SHEEP
$sqlStatusSheep = 'SELECT status, COUNT(*) as count FROM sheep_tbl GROUP BY status';
$resultStatusSheep = $connection->query($sqlStatusSheep);

// Extract data for the status pie chart for Sheep
$aliveCountSheep = 0;
$deceasedCountSheep = 0;

while ($row = $resultStatusSheep->fetch_assoc()) {
    if ($row['status'] == 'alive') {
        $aliveCountSheep = $row['count'];
    } elseif ($row['status'] == 'deceased') {
        $deceasedCountSheep = $row['count'];
    }
}

// Fetch data from the database for sheep's sex
$sqlSexSheep = 'SELECT sex, COUNT(*) as count FROM sheep_tbl GROUP BY sex';
$resultSexSheep = $connection->query($sqlSexSheep);

// Extract data for the sex pie chart for sheep
$maleCountSheep = 0;
$femaleCountSheep  = 0;

while ($row = $resultSexSheep ->fetch_assoc()) {
    if ($row['sex'] == 'male') {
        $maleCountSheep  = $row['count'];
    } elseif ($row['sex'] == 'female') {
        $femaleCountSheep  = $row['count'];
    }
}


//HORSE
$sqlStatusHorse = 'SELECT status, COUNT(*) as count FROM horse_tbl GROUP BY status';
$resultStatusHorse = $connection->query($sqlStatusHorse);

// Extract data for the status pie chart for Horse
$aliveCountHorse = 0;
$deceasedCountHorse = 0;

while ($row = $resultStatusHorse->fetch_assoc()) {
    if ($row['status'] == 'alive') {
        $aliveCountHorse = $row['count'];
    } elseif ($row['status'] == 'deceased') {
        $deceasedCountHorse = $row['count'];
    }
}

// Fetch data from the database for Horse's sex
$sqlSexHorse = 'SELECT sex, COUNT(*) as count FROM horse_tbl GROUP BY sex';
$resultSexHorse = $connection->query($sqlSexHorse);

// Extract data for the sex pie chart for horse
$maleCountHorse = 0;
$femaleCountHorse  = 0;

while ($row = $resultSexHorse ->fetch_assoc()) {
    if ($row['sex'] == 'male') {
        $maleCountHorse  = $row['count'];
    } elseif ($row['sex'] == 'female') {
        $femaleCountHorse  = $row['count'];
    }
}


//GOAT
$sqlStatusGoat = 'SELECT status, COUNT(*) as count FROM goat_tbl GROUP BY status';
$resultStatusGoat = $connection->query($sqlStatusGoat);

// Extract data for the status pie chart for Horse
$aliveCountGoat = 0;
$deceasedCountGoat = 0;

while ($row = $resultStatusGoat->fetch_assoc()) {
    if ($row['status'] == 'alive') {
        $aliveCountGoat = $row['count'];
    } elseif ($row['status'] == 'deceased') {
        $deceasedCountGoat = $row['count'];
    }
}

// Fetch data from the database for Horse's sex
$sqlSexGoat = 'SELECT sex, COUNT(*) as count FROM goat_tbl GROUP BY sex';
$resultSexGoat = $connection->query($sqlSexGoat);

// Extract data for the sex pie chart for sheep
$maleCountGoat = 0;
$femaleCountGoat  = 0;

while ($row = $resultSexGoat ->fetch_assoc()) {
    if ($row['sex'] == 'male') {
        $maleCountGoat  = $row['count'];
    } elseif ($row['sex'] == 'female') {
        $femaleCountGoat  = $row['count'];
    }
}