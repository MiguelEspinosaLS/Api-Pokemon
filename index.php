<?php

$title = 'PokeStats - Home';

include 'includes/views/head.php';
include 'includes/functions/Request.php';

$pcNext = 20;
$pcPrev = 0;

if (isset($_GET['offset'])) {
    $offset = $_GET['offset'];
    $pcNext = $offset + 20;
    $pcPrev = $offset - 20;
    $pokemons = json_decode(request("/pokemon?offset=$offset"));
} else {
    $pokemons = json_decode(request('/pokemon'));
}

?>
    <div class="wrapper">
        <div class="container homelist">
            <?php
                if ($pokemons) {
                    foreach ($pokemons->results as $pokemon):
            ?>
                <div class="item">
                    <div class="content">
                        <img src="<?= json_decode(request($pokemon->url, true))->sprites->front_default ?>" class="thumb"/>
                        <div class="name"><?= $pokemon->name ?></div>
                    </div>
                    <a href="pokemon.php/?id=<?= json_decode(request($pokemon->url, true))->id ?>" class="btnmore">En savoir plus</a>
                </div>
            <?php endforeach; ?>
        </div>
            <div class="container">
                <div class="page-control">
                    <?php if (isset($_GET['offset'])) { ?>
                        <a class="pc-btn" href="./?offset=<?= $pcPrev ?>">Previous</a>
                    <?php } ?>
                    <?php if ($pcNext < $pokemons->count) { ?>
                        <a class="pc-btn" href="./?offset=<?= $pcNext ?>">Next</a>
                    <?php } ?>
                </div>
            </div>
        <?php
            } else {
                include_once 'includes/views/networkerror.php';
            }
        ?>
    </div>
</body>
</html>