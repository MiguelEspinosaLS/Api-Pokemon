<?php

include 'includes/functions/Request.php';

if (isset($_GET['id'])) {
    $pokeID = $_GET['id'];
    $pokemon = json_decode(request("/pokemon/$pokeID"));
} else {
    header('Location: ../index.php');
}

$title = 'PokeStats - ' . $pokemon->forms[0]->name;
include 'includes/views/head.php';

if ($pokemon) { ?>
    <div class="wrapper">
        <div class="container">
            <div class="poke-head">
                <img src="<?= $pokemon->sprites->front_default ?>" class="poke-thumb"/>
                <div class="poke-name"><?= $pokemon->forms[0]->name ?></div>
            </div>
            <div class="poke-item-list">
                <div class="poke-item">
                    <div class="poke-content">
                        <div class="poke-name">Abilities</div>
                        <?php foreach ($pokemon->abilities as $ability): ?>
                            <p class="poke-detail"><?= $ability->ability->name ?></p>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="poke-item">
                    <div class="poke-content">
                        <div class="poke-name">Forms</div>
                        <?php foreach ($pokemon->forms as $form): ?>
                            <p class="poke-detail"><?= $form->name ?></p>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="poke-item">
                    <div class="poke-content">
                        <div class="poke-name">Moves</div>
                        <?php foreach ($pokemon->moves as $moves): ?>
                            <p class="poke-detail"><?= $moves->move->name ?></p>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
} else {
    include_once 'includes/views/networkerror.php';
} ?>
