<!doctype html>
<html>
<head>
    <script src="https://code.jquery.com/jquery-3.3.1.js"
            integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
</head>
<body>
<form id="terminal" method="post">
    <div>

        <?php
        require_once 'DB.php';
        $result1 = DataBase::f1();
        $result2 = DataBase::f2();
        ?>

        <select name="first" id="first">
            <?php
            foreach ($result1 as $key) {
                echo "<option>{$key['name']}</option>";
            }
            ?>
        </select>
        <select name="second" id="second">
            <?php
            foreach ($result2 as $key) {
                echo "<option>{$key['name']}</option>";
            }
            ?>
        </select>
        <select name="third" id="third">
            <option>21</option>
            <option>26</option>
            <option>31</option>
            <option>45</option>
        </select>

        <input type="submit" name="loginBtn" id="loginBtn" value="Заказать"/>
    </div>
</form>

<div id="parent1"></div>
<div id="parent2"></div>
<div id="parent3"></div>
<div id="parent4"></div>

<script src="script.js"></script>
</body>
</html>