<!DOCTYPE html>
<html>
<head>
<title>Масив в таблиці</title>
</head>
<body>

    <h1>Дані з масиву у таблиці</h1>

    <table border="1">
        <tr>
            <th>Ім'я</th>
            <th>Прізвище</th>
            <th>Вік</th>
            <th>Студент</th>
        </tr>
        <?php
        $people = [
            [
                "name" => "Bober",
                "surname" => "Kysko",
                "age" => 40,
                "student" => true
            ],
            [
                "name" => "Roberto",
                "surname" => "Petrov",
                "age" => 18,
                "student" => false
            ],
            [
                "name" => "Anton",
                "surname" => "Petrenko",
                "age" => 30,
                "student" => true
            ]
        ];

        foreach ($people as $person) {
            echo "<tr>";
            echo "<td>" . $person["name"] . "</td>";
            echo "<td>" . $person["surname"] . "</td>";
            echo "<td>" . $person["age"] . "</td>";
            echo "<td>" . ($person["student"] ? "Так" : "Ні") . "</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <h1>Перелік товарів магазину (за алфавітом)</h1>

    <?php
    $products = [
        "product1" => [
            "name" => "Компьютер",
            "price" => 1000,
            "category" => "Електроніка"
        ],
        "product2" => [
            "name" => "Фотокамера",
            "price" => 500,
            "category" => "Електроніка"
        ],
        "product3" => [
            "name" => "Журнал",
            "price" => 20,
            "category" => "Книги"
        ],
        "product4" => [
            "name" => "Пальто",
            "price" => 30,
            "category" => "Одяг"
        ]
    ];

    function sortProductsByName($products) {
        uasort($products, function ($a, $b) {
            return strcmp($a["name"], $b["name"]);
        });
        return $products;
    }

    $sortedProducts = sortProductsByName($products);
    
    echo "<table border='1'>";
    echo "<tr><th>Назва</th><th>Ціна</th><th>Категорія</th></tr>";
    foreach ($sortedProducts as $product) {
        echo "<tr>";
        echo "<td>" . $product["name"] . "</td>";
        echo "<td>" . $product["price"] . "</td>";
        echo "<td>" . $product["category"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    ?>

    <h1>Перелік товарів магазину (за ціною)</h1>

    <?php
    $products = [
        "product1" => [
            "name" => "Компьютер",
            "price" => 1000,
            "category" => "Електроніка"
        ],
        "product2" => [
            "name" => "Фотокамера",
            "price" => 500,
            "category" => "Електроніка"
        ],
        "product3" => [
            "name" => "Журнал",
            "price" => 20,
            "category" => "Книги"
        ],
        "product4" => [
            "name" => "Пальто",
            "price" => 30,
            "category" => "Одяг"
        ]
    ];

    function printProductsByPriceRange($products, $minPrice, $maxPrice) {
        echo "<table border='1'>";
        echo "<tr><th>Назва</th><th>Ціна</th><th>Категорія</th></tr>";
        foreach ($products as $product) {
            if ($product["price"] >= $minPrice && $product["price"] <= $maxPrice) {
                echo "<tr>";
                echo "<td>" . $product["name"] . "</td>";
                echo "<td>" . $product["price"] . "</td>";
                echo "<td>" . $product["category"] . "</td>";
                echo "</tr>";
            }
        }
        echo "</table>";
    }

    if (isset($_GET["minPrice"]) && isset($_GET["maxPrice"])) {
        $minPrice = $_GET["minPrice"];
        $maxPrice = $_GET["maxPrice"];
        echo "<h2>Товари в діапазоні цін від $minPrice до $maxPrice:</h2>";
        printProductsByPriceRange($products, $minPrice, $maxPrice);
    } else {
        printProductsByPriceRange($products, 0, PHP_INT_MAX);
    }
    ?>
    <h3>Фільтр за ціною:</h3>
    <form action="" method="get">
        Мінімальна ціна: <input type="text" name="minPrice">
        Максимальна ціна: <input type="text" name="maxPrice">
        <input type="submit" value="Фільтрувати">
    </form>

    <h1>Додавання та віднімання матриць</h1>

    <?php
    // Функція для створення і заповнення матриці
    function createMatrix($rows, $cols) {
        $matrix = array();
        for ($i = 0; $i < $rows; $i++) {
            for ($j = 0; $j < $cols; $j++) {
                $matrix[$i][$j] = rand(0, 100);
            }
        }
        return $matrix;
    }

    // Функція для додавання двох матриць
    function addMatrices($matrix1, $matrix2) {
        $result = array();
        for ($i = 0; $i < count($matrix1); $i++) {
            for ($j = 0; $j < count($matrix1[0]); $j++) {
                $result[$i][$j] = $matrix1[$i][$j] + $matrix2[$i][$j];
            }
        }
        return $result;
    }

    // Функція для віднімання двох матриць
    function subtractMatrices($matrix1, $matrix2) {
        $result = array();
        for ($i = 0; $i < count($matrix1); $i++) {
            for ($j = 0; $j < count($matrix1[0]); $j++) {
                $result[$i][$j] = $matrix1[$i][$j] - $matrix2[$i][$j];
            }
        }
        return $result;
    }

    // Створення і заповнення першої матриці
    $matrixA = createMatrix(10, 10);

    // Створення і заповнення другої матриці
    $matrixB = createMatrix(10, 10);

    // Вивід першої матриці
    echo "<h2>Перша матриця:</h2>";
    echo "<table border='1'>";
    foreach ($matrixA as $row) {
        echo "<tr>";
        foreach ($row as $cell) {
            echo "<td>" . $cell . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";

    // Вивід другої матриці
    echo "<h2>Друга матриця:</h2>";
    echo "<table border='1'>";
    foreach ($matrixB as $row) {
        echo "<tr>";
        foreach ($row as $cell) {
            echo "<td>" . $cell . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";

    // Додавання матриць
    $sumMatrix = addMatrices($matrixA, $matrixB);

    // Вивід результату додавання
    echo "<h2>Додавання:</h2>";
    echo "<table border='1'>";
    foreach ($sumMatrix as $row) {
        echo "<tr>";
        foreach ($row as $cell) {
            echo "<td>" . $cell . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";

    // Віднімання матриць
    $diffMatrix = subtractMatrices($matrixA, $matrixB);

    // Вивід результату віднімання
    echo "<h2>Віднімання:</h2>";
    echo "<table border='1'>";
    foreach ($diffMatrix as $row) {
        echo "<tr>";
        foreach ($row as $cell) {
            echo "<td>" . $cell . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
    ?>
</body>
</html>
