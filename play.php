<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php include_once 'includes/head.php'; ?>
    <link rel="stylesheet" href="lib/chessboardjs/css/chessboard-0.3.0.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include_once 'includes/header.php'; ?>
    <div id="board" class="board"></div>
    <div class="info">
        Search depth:
        <select id="search-depth">
            <option value="1" selected>1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>

        <br>
        <span>Positions evaluated: <span id="position-count"></span></span>
        <br>
        <span>Time: <span id="time"></span></span>
        <br>
        <span>Positions/s: <span id="positions-per-s"></span> </span>
        <br>
        <br>
        <div id="move-history" class="move-history">
        </div>
    </div>
    <?php include_once 'includes/footer.php'; ?>

    <script src="lib/jquery/jquery-3.2.1.min.js"></script>
    <script src="lib/chessboardjs/js/chess.js"></script>
    <script src="lib/chessboardjs/js/chessboard-0.3.0.js"></script>
    <script src="script.js"></script>
    <?php include_once 'includes/scripts.php'; ?>
    
</body>
</html>