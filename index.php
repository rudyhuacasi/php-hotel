<?php
// variabile di un array multidimensionali
$hotels = [
    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],
];

// variabile per selezzionare il parcheggio
$filter_parking = isset($_GET['parking']) && $_GET['parking'] == 'si';

// variabile per selezzionare i voti
$filter_vote = isset($_GET['vote']) ? (int)$_GET['vote'] : 0;

$filtered_hotels = [];
// un ciclo foreach ($hotels)
foreach ($hotels as $hotel) {
    //filtro per il parcheggio 
    if ($filter_parking && !$hotel['parking']) {
        continue; 
    }
    //filtro per i voti 
    if ($filter_vote > 0 && $hotel['vote'] < $filter_vote) {
        continue; 
    }
    $filtered_hotels[] = $hotel;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- css bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <header class="bg-danger">
        <div class="container text-center p-3">
            <h2><em>HOTEL</em></h2>
        </div>
    </header>
    <main class="container">
        <form action="" method="get">
            <div class="form-check form-switch d-flex m-3">
                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" name="parking" value="si" <?php echo $filter_parking ? 'checked' : ''; ?>>
                <label class="form-check-label" for="flexSwitchCheckChecked">Parcheggio</label>

                <select class="form-select w-25 mx-3 form-select-sm" aria-label="Small select example" name="vote">
                    <option selected>Open this select menu</option>
                    <option value="1" <?php echo (isset($_GET['vote']) && $_GET['vote'] == '1') ? 'selected' : ''; ?>>1</option>
                    <option value="2" <?php echo (isset($_GET['vote']) && $_GET['vote'] == '2') ? 'selected' : ''; ?>>2</option>
                    <option value="3" <?php echo (isset($_GET['vote']) && $_GET['vote'] == '3') ? 'selected' : ''; ?>>3</option>
                    <option value="4" <?php echo (isset($_GET['vote']) && $_GET['vote'] == '4') ? 'selected' : ''; ?>>4</option>
                    <option value="5" <?php echo (isset($_GET['vote']) && $_GET['vote'] == '5') ? 'selected' : ''; ?>>5</option>
                </select>

                <button type="submit" class="btn btn-primary">Ricerca</button>
            </div>
        </form>

        <div>
            <table class="table m-3">
                <thead>
                    <tr class="table-primary">
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Parking</th>
                        <th scope="col">Vote</th>
                        <th scope="col">Distance to Center</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($filtered_hotels as $hotel) : ?>
                        <tr>
                            <th class="table-primary" scope="row"><?php echo $hotel['name']; ?></th>
                            <td><?php echo $hotel['description']; ?></td>
                            <td><?php echo $hotel['parking'] ? 'si' : 'no'; ?></td>
                            <td><?php echo $hotel['vote']; ?></td>
                            <td><?php echo $hotel['distance_to_center'] . 'km'; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </main>

</body>

</html>