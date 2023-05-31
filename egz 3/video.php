<!DOCTYPE html>
<html lang="pl">
<head>
    <link rel="stylesheet" href="styl3.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="baner1">
        <h1>Internetowa wypożyczalnia filmów</h1>
    </div>
    <div class="baner2">
        <table>
            <tr>
                <td>
                    Kryminał
                </td>
                <td>
                    Horror
                </td>
                <td>
                    Przygodowy
                </td>
            </tr>
            <tr>
                <td>
                    20
                </td>
                <td>
                    30
                </td>
                <td>
                    20
                </td>
            </tr>
        </table>
    </div>
    <div class="lista1">
        <h3>Polecamy</h3>
        <?php
            $polaczenie = new mysqli("127.0.0.1","root","","dane3");
            $sql = "SELECT id,nazwa,opis,zdjecie FROm produkty WHERE id=18 OR id=22 OR id=23 OR ID=25;";
            $res = $polaczenie->query($sql);
            $rows = $res->fetch_all(MYSQLI_ASSOC);

            for($i=0;$i<count($rows);$i++)
            {
                echo "<div class='blok'><h4>".$rows[$i]["id"]." ".$rows[$i]["nazwa"]."</h4>";
                echo "<div class='img' style='background: url(".$rows[$i]["zdjecie"].")' alt='film'></div>";
                echo "".$rows[$i]["opis"]."</div>";
            }

            $polaczenie->close();
        ?>
    </div>
    <div class="lista1">
        <h3>Filmy fantastyczne</h3>
        <?php
            $polaczenie = new mysqli("127.0.0.1","root","","dane3");
            $sql = "SELECT id,nazwa,opis,zdjecie FROM produkty WHERE Rodzaje_id=12;";
            $res = $polaczenie->query($sql);
            $rows = $res->fetch_all(MYSQLI_ASSOC);

            for($i=0;$i<count($rows);$i++)
            {
                echo "<div class='blok'><h4>".$rows[$i]["id"]." ".$rows[$i]["nazwa"]."</h4>";
                echo "<div class='img' style='background: url(".$rows[$i]["zdjecie"].")' alt='film'></div>";
                echo "".$rows[$i]["opis"]."</div>";
            }

            $polaczenie->close();
        ?>
    </div>
    <div class="stopka">
        <form method="POST">
            Usuń film nr.:<input type="Number" name="usun">
            <input type="submit" value="Usuń film"><br>
            Stronę wykonal: <a href="mailto:ja@poczta.com">milosz.zielinski23@gmail.com</a>
        </form>
    </div>
        <?php
            $polaczenie = new mysqli("127.0.0.1","root","","dane3");
            if(isset($_POST["usun"]))
            {
                $id = $_POST["usun"];
                $sql = "DELETE FROM produkty WHERE `produkty`.`id` = ".$id.";";
                $polaczenie->query($sql);
            }

            $polaczenie->close();
        ?>
</body>
</html>