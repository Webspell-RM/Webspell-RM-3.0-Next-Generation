<?php
/**
 *¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯*
 *                  Webspell-RM      /                        /   /                                          *
 *                  -----------__---/__---__------__----__---/---/-----__---- _  _ -                         *
 *                   | /| /  /___) /   ) (_ `   /   ) /___) /   / __  /     /  /  /                          *
 *                  _|/_|/__(___ _(___/_(__)___/___/_(___ _/___/_____/_____/__/__/_                          *
 *                               Free Content / Management System                                            *
 *                                           /                                                               *
 *¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯*
 * @version         webspell-rm                                                                              *
 *                                                                                                           *
 * @copyright       2018-2025 by webspell-rm.de                                                              *
 * @support         For Support, Plugins, Templates and the Full Script visit webspell-rm.de                 *
 * @website         <https://www.webspell-rm.de>                                                             *
 * @forum           <https://www.webspell-rm.de/forum.html>                                                  *
 * @wiki            <https://www.webspell-rm.de/wiki.html>                                                   *
 *                                                                                                           *
 *¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯*
 * @license         Script runs under the GNU GENERAL PUBLIC LICENCE                                         *
 *                  It's NOT allowed to remove this copyright-tag                                            *
 *                  <http://www.fsf.org/licensing/licenses/gpl.html>                                         *
 *                                                                                                           *
 *¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯*
 * @author          Code based on WebSPELL Clanpackage (Michael Gruber - webspell.at)                        *
 * @copyright       2005-2011 by webspell.org / webspell.info                                                *
 *                                                                                                           *
 *¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯*
*/

$_language->readModule('db_stats', false, true);

use webspell\AccessControl;
// Admin-Zugriff prüfen
AccessControl::checkAdminAccess('ac_modrewrite');



global $_database;
$count_array = array();

// Tabellenliste (ohne Präfixe)
$tables_array = array(
    "plugins_about_us",
    "plugins_articles",
    "plugins_awards",
    "plugins_bannerrotation",
    "plugins_fight_us_challenge",
    "plugins_clanwars",
    "plugins_clan_rules",
    "contact",
    "plugins_faq",
    "plugins_faq_categories",
    "plugins_files",
    "plugins_files_categories",
    "plugins_forum_announcements",
    "plugins_forum_boards",
    "plugins_forum_categories",
    "plugins_forum_groups",
    "plugins_forum_moderators",
    "plugins_forum_posts",
    "plugins_forum_ranks",
    "plugins_forum_topics",
    "plugins_gallery",
    "plugins_gallery_categorys",
    "settings_games",
    "plugins_guestbook",
    "plugins_links",
    "plugins_links_categorys",
    "plugins_linkus",
    "plugins_messenger",
    "plugins_news",
    "plugins_news_rubrics",
    "plugins_news_comments",
    "plugins_partners",
    "plugins_poll",
    "plugins_servers",
    "plugins_shoutbox",
    "plugins_sponsors",
    "squads",
    "static",
    "users", // angepasst von `user` auf `users`
    "plugins_videos",
    "plugins_videos_categories",
    "plugins_videos_comments",
    "plugins_todo",
    "plugins_streams",
    "plugins_pic_update",
);

$db_size = 0;
$db_size_op = 0;

// Aktuellen Datenbanknamen ermitteln
if (!isset($db)) {
    $get = safe_query("SELECT DATABASE()");
    $ret = mysqli_fetch_array($get);
    $db = $ret[0];
}

// Gesamtanzahl Tabellen
$query = safe_query("SHOW TABLES");
$count_tables = mysqli_num_rows($query);

// Durchlaufe alle Tabellen
foreach ($tables_array as $table) {
    if (mysqli_num_rows(safe_query("SHOW TABLE STATUS FROM `$db` LIKE '$table'"))) {
        $check = mysqli_query($_database, "SELECT * FROM `$table`");
        if ($check) {
            $sql = safe_query("SHOW TABLE STATUS FROM `$db` LIKE '$table'");
            $data = mysqli_fetch_array($sql);
            $db_size += ($data['Data_length'] + $data['Index_length']);
            if (strtolower($data['Engine']) == "myisam") {
                $db_size_op += $data['Data_free'];
            }

            $table_name = isset($_language->module[$table]) ? $_language->module[$table] : ucfirst(str_replace("_", " ", $table));
            $count_array[] = array($table_name, $data['Rows']);
        }
    }
}
?>




<?php
$table_names = [];
$table_sizes = [];

// Durchlaufe alle Tabellen und berechne deren Größen
foreach ($tables_array as $table) {
    $sql_status = safe_query("SHOW TABLE STATUS FROM `$db` LIKE '$table'");
    if (mysqli_num_rows($sql_status)) {
        $data = mysqli_fetch_array($sql_status);
        
        // Berechnung der Datenbankgrößen
        $db_size += ($data['Data_length'] + $data['Index_length']);
        if (strtolower($data['Engine']) == "myisam") {
            $db_size_op += $data['Data_free'];
        }

        // Tabellenname und Größe speichern
        $table_names[] = isset($_language->module[$table]) ? $_language->module[$table] : ucfirst(str_replace("_", " ", $table));
        $table_sizes[] = (int)($data['Data_length'] + $data['Index_length']); // Umwandlung in int
    }
}

/**
 * Formatierte Ausgabe der Größe
 */
function format_size($size) {
    if ($size < 1024) {
        return $size . ' B';
    } elseif ($size < 1048576) {
        return round($size / 1024, 2) . ' KB';
    } elseif ($size < 1073741824) {
        return round($size / 1048576, 2) . ' MB';
    } else {
        return round($size / 1073741824, 2) . ' GB';
    }
}



?>

<!-- Datenbankinformationen -->
<div class="card">
    <div class="card-header">
        <?php echo $_language->module['database']; ?>
    </div>
    <div class="card-body">
        <div class="container py-5">
            <h4 class="mb-3"><?php echo $_language->module['database']; ?></h4>

            <!-- Erste Reihe für MySQL Version und Größe -->
            <div class="row">
                <!-- Erste Tabelle: MySQL Version und Größe -->
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <thead class="table-light">
                            <tr>
                                <th><?php echo $_language->module['property']; ?></th>
                                <th><?php echo $_language->module['value']; ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $_language->module['mysql_version']; ?>:</td>
                                <td>
                                    <span class="pull-right text-muted small">
                                        <em><?php echo mysqli_get_server_info($_database); ?></em>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td><?php echo $_language->module['size']; ?>:</td>
                                <td>
                                    <span class="pull-right text-muted small">
                                        <em><?php echo $db_size; ?> Bytes (<?php echo round($db_size / 1024 / 1024, 2); ?> MB)</em>
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Zweite Tabelle: Overhead und Tabellenanzahl -->
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <thead class="table-light">
                            <tr>
                                <th><?php echo $_language->module['property']; ?></th>
                                <th><?php echo $_language->module['value']; ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $_language->module['overhead']; ?>:</td>
                                <td>
                                    <span class="pull-right text-muted small">
                                        <em><?php echo $db_size_op; ?> Bytes</em>
                                        <?php
                                        if ($db_size_op != 0) {
                                            echo '<a href="admincenter.php?site=database&amp;action=optimize&amp;back=page_statistic">
                                                    <font color="red"><b>' . $_language->module['optimize'] . '</b></font>
                                                  </a>';
                                        }
                                        ?>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td><?php echo $_language->module['tables']; ?>:</td>
                                <td>
                                    <span class="pull-right text-muted small">
                                        <em><?php echo $count_tables; ?></em>
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Statistiken für Tabellenzeilen -->
            <h4 class="mb-3"><?php echo $_language->module['page_stats']; ?></h4>
            <table class="table table-bordered table-striped">
                <thead class="table-light">
                    <tr>
                        <th><?php echo $_language->module['property']; ?></th>
                        <th><?php echo $_language->module['value']; ?></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        for ($i = 0; $i < count($count_array); $i += 2) {
                            ?>
                            <td class="col-md-6">
                                <div class="d-flex justify-content-between">
                                    <div><strong><?php echo $count_array[$i][0]; ?>:</strong></div>
                                    <div class="text-muted small"><em><?php echo $count_array[$i][1]; ?></em></div>
                                </div>
                            </td>
                            <?php if (isset($count_array[$i + 1])) { ?>
                                <td class="col-md-6">
                                    <div class="d-flex justify-content-between">
                                        <strong><?php echo $count_array[$i + 1][0]; ?>:</strong>
                                        <span class="text-muted small"><em><?php echo $count_array[$i + 1][1]; ?></em></span>
                                    </div>
                                </td>
                            <?php } ?>
                            <?php
                            if (($i + 2) % 2 == 0) { // Neue Zeile nach 2 Spalten
                                echo '</tr><tr>';
                            }
                        }
                        ?>
                    </tr>
                </tbody>
            </table>

            <!-- Diagramm zur Anzeige der Tabellen-Größe -->
            <h4 class="mb-3"><?php echo $_language->module['table_size_chart']; ?></h4>
            <table class="table table-bordered table-striped">
                <thead class="table-light">
                    <tr>
                        <th><?php echo $_language->module['table_size_chart']; ?></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <!-- Canvas für das Diagramm -->
                            <canvas id="tableSizeChart" width="400" height="200"></canvas>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>





<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Die Daten aus PHP in JavaScript übergeben
    var tableNames = <?php echo json_encode($table_names); ?>;
    var tableSizes = <?php echo json_encode($table_sizes); ?>;

    // Funktion zur Generierung einer zufälligen Farbe
    function getRandomColor() {
        var letters = '0123456789ABCDEF';
        var color = '#';
        for (var i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
    }

    // Generiere zufällige Farben für jedes Balken
    var colors = tableSizes.map(function() {
        return getRandomColor();
    });

    var ctx = document.getElementById('tableSizeChart').getContext('2d');
    var tableSizeChart = new Chart(ctx, {
        type: 'bar', // Diagrammtyp: Balkendiagramm
        data: {
            labels: tableNames, // Tabellen-Namen
            datasets: [{
                label: 'Tabellen-Größe (in Bytes)',
                data: tableSizes, // Tabellen-Größen
                backgroundColor: colors, // Zufällige Farben für Balken
                borderColor: 'rgba(75, 192, 192, 1)', // Rahmenfarbe für alle Balken
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

