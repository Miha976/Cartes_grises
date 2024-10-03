<?php
//Requête
$requete = "SHOW TABLES";
$tables = $db->query($requete)->fetchAll();
$colonnes = [];
foreach ($tables as $table) {
    $colonnes[$table[0]] = [];
    $cols = $db->query("SHOW COLUMNS FROM " . $table[0])->fetchAll();
    foreach ($cols as $col) {
        array_push($colonnes[$table[0]], $col['Field']);
    }
}
if ((isset($_POST['table']) && !empty($_POST['table'])) &&
    (isset($_POST['condition']) && !empty($_POST['condition']))
) {
    $cols = $db->query("SHOW COLUMNS FROM " . $_POST['table'])->fetchAll();
    if ((isset($_POST['colonne']) && !empty($_POST['colonne'])) &&
        (isset($_POST['op_comparaison']) && !empty($_POST['op_comparaison'])) &&
        (isset($_POST['valeur']) && !empty($_POST['valeur']))
    ) {
        if ($_POST['op_comparaison'] == "=") {
            $requete = "SELECT * FROM " . $_POST['table'] . " WHERE " . $_POST['colonne'] . " LIKE '" . $_POST['valeur'] . "%'";
        } else if ($_POST['op_comparaison'] == ">") {
            $requete = "SELECT * FROM " . $_POST['table'] . " WHERE " . $_POST['colonne'] . ">" . $_POST['valeur'];
        }
    } else {
        $requete = "SELECT * FROM " . $_POST['table'];
    }
    $result = $db->query($requete)->fetchAll();
    // $nbV=count($result);

    echo "<h1> Résultat de la requête</h1>
	<table border='1'>
	<thead>";
    foreach ($cols as $col) {
        echo "<th>" . $col['Field'] . "</th>";
    }
    echo "</thead>
	<tbody>";

    // Parcours du tableau $result
    for ($i = 0; $i < count($result); $i++) {
        $value = $result[$i];
        echo "<tr>";
        foreach ($cols as $col) {
            echo "<td>" . $value[$col['Field']] . "</td>";
        }
        echo "</tr>";
    }
    echo "</tbody></table>";
    echo "<a href=''>Lancer une nouvelle requête</a>";
} else {
?>
<h1 style="color: red;">Requêteur</h1>
<form action="" method="post">
    <fieldset>
        <legend>Formulez votre requête : </legend>
        <label for="table">Tables: </label>
        <select id="table" name="table">
            <option value="This is some <b>bold</b> text." default></option>
            <?php
            foreach ($tables as $table) {
            ?>
                <option value="<?= $table[0] ?>"><?= $table[0] ?></option>
            <?php } ?>
        </select>
        <label for="condition" style="color: #000;">condition ? : </label>
        <div style="justify-content : center;">
            <div class="" style="margin: 0;">
                <label for="condition_oui">oui</label>
                <input type="radio" name="condition" id="condition_oui" value="oui" />
            </div>
            <div class="" style="margin: 0;">
                <label for="condition_non">non</label>
                <input type="radio" name="condition" id="condition_non" value="non" />

            </div>
        </div>
    </fieldset>
    <fieldset hidden id="criteres">
        <legend>Choisir les critères</legend>
        <label for="colonne">Colonnes: </label>
        <select id="colonne" name="colonne">
        </select>
        <label for="">Opérateur de comparaison: </label>
        <select id="op_comparaison" name="op_comparaison">
            <option value=">">></option>
            <option value="=">=</option>
        </select>
        <label for="valeur">Valeur: </label>
        <input type="text" name="valeur" id="valeur" />
    </fieldset>
    <button name="valider" id="valider" hidden>Valider</button>
</form>

<script>
    $("#table").change(function(e) {
        $table = $(this).val()
        $("select#colonne").empty()
        if ($table.length > 0) {
            const cols = JSON.parse(JSON.stringify(<?= json_encode($colonnes) ?>))[$table];
            for (let i = 0; i < cols.length; i++) {
                $("select#colonne").append(new Option(cols[i], cols[i]))
            }
        }
    })
    $("input[name='condition']").change(function(e) {
        if ($(this).val() != '' && $("#table").val().length > 0) {
            $("#valider").show()
            if ($(this).val() == "oui") {
                $("#criteres").show()
            } else {
                $("#criteres").hide()
            }
        }
    })
</script>
<?php } ?>