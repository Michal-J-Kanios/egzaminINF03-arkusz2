<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hurtownia szkolna</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <div class="banner">
        <h1>Hurtownia z najlepszymi cenami</h1>
    </div>

    <section id="rizz">

    <div class="lewy">
        <h2>Nasze ceny:</h2>
        <table>
        <?php
        $polaczenie = mysqli_connect("localhost", "root", "", "sklep");
        $zapytanie = mysqli_query($polaczenie, "SELECT nazwa, cena FROM `towary` LIMIT 4");

        while($r = mysqli_fetch_row($zapytanie)) {
            echo "<tr>";
            echo "<td>";
            echo $r[0];
            echo "</td>";
            echo "<td>";
            echo $r[1];
            echo "</td>";
            echo "</tr>";
        }

        mysqli_close($polaczenie);
        //tu bedzie skrypt 1
        ?>
        </table>
    </div>

    <div class="srodek">
        <h2>Koszt zakupów</h2>
        <form action="" method="post">
            <p>wybierz artykuł: 
                <select name="nazwa">
                    <option value="Zeszyt 60 kartek">Zeszyt 60 kartek</option>
                    <option value="Zeszyt 32 kartki">Zeszyt 32 kartki</option>
                    <option value="Cyrkiel">Cyrkiel</option>
                    <option value="Linijka 30 cm">Linijka 30 cm</option>
                </select>
            </p>
                liczba sztuk: <input type="number" name="liczba" id=""> <br>


            <button type="submit">OBLICZ</button><br>
            <?php
            $polaczenie = mysqli_connect("localhost", "root", "", "sklep");

            $nazwa = $_POST['nazwa'];
            $liczba = $_POST['liczba'];

            $zapytanie2 = mysqli_query($polaczenie, "SELECT cena FROM `towary` WHERE nazwa LIKE '$nazwa'");

            while($i = mysqli_fetch_row($zapytanie2)) {
                echo "wartość zakupów: ";
                $wartosc = $i[0]*$liczba;
                echo $wartosc;
            }
            //SELECT cena FROM `towary` WHERE nazwa="Ekierka";

            mysqli_close($polaczenie);
                //Tu bedzie wynik skryptu 2
            ?>
            
        </form>
    </div>

    <div class="prawy">
        <h2>Kontakt</h2>
        <img src="zakupy.png" alt="hurtowania">
        <p>
            e-mail: <a href="mailto:hurt@poczta2.pl">hurt@poczta2.pl</a>
        </p>
    </div>
    </section>
    <div class="footer">
        <h4>Witrynę wykonał: 000000000000</h4>
    </div>
</body>
</html>