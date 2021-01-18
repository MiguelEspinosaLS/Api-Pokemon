<div class="error">
    <h1>Error accessing data</h1>
    <p>Please try again later or check your network connection.</p>
    <a href="<?= (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" ?>">Retry</a>
</div>