<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/style.css">
    <script src="./js/jquery.js"></script>
    <script src="./js/jquery-ui.min.js"></script>
    <script src="./js/bootstrap.js"></script>
</head>

<body>
    <header>
        <h2 id="site-title">2025國際交響樂團演奏會(ISOC)</h2>
        <img src="./logo/logo.png" alt="logo" id="logo">
        <a class="web-link" href="home.html" id="home">Home</a>
        <a class="web-link" href="news.html" id="news">News</a>
        <a class="web-link" href="performance.html" id="prformance">Performance</a>
        <a class="web-link" href="tickets.html" id="tickets">Tickets</a>
        <a class="web-link" href="search.html" id="search">Search</a>
    </header>
    <main>
        <div>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Phone</th>
                        <th>Password</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $dsn = "mysql:host=localhost;charset=utf8;dbname=db01";
                        $conn = new PDO($dsn, "admin", "1234");
                        
                        $searchItem = $_GET['SearchItem'];
                        $item = $_GET['Item'];
                        
                        $sql = "SELECT * FROM tickets WHERE $searchItem = :item";
                        $stmt = $conn->prepare($sql);
                        $stmt->bindParam(':item', $item, PDO::PARAM_STR);
                        $stmt->execute();
                        
                        if ($stmt->rowCount() > 0) {
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo "<tr>";
                                echo "<td>{$row['id']}</td>";
                                echo "<td>{$row['firstname']}</td>";
                                echo "<td>{$row['lastname']}</td>";
                                echo "<td>{$row['phone']}</td>";
                                echo "<td>{$row['password']}</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5'>沒搜尋到任何項目</td></tr>";
                        }
                        
                    ?>
                </tbody>
            </table>
            <button id="back-button" onclick="location.href = 'search.html';">重新查詢</button>
        </div>
    </main>
    <footer>
        <div id="share-info">
            <img src="./img/facebook.png" alt="fb" id="fb">
            <img src="./img/google.png" alt="google" id="google">
        </div>
        <span id="footer">Copyright &copy; 2025 ISOC All Rights Reserved</span>
    </footer>
    <script>
    </script>
</body>

</html>