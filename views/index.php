
<div class="container">

    <?php if (isset($_SESSION['ilmoitus'])): ?>
        <br>
        <div class="alert alert-success"><?php echo $_SESSION['ilmoitus']; ?></div>
        <?php unset($_SESSION['ilmoitus']); ?>
    <?php endif; ?>

    <h1>Hei, <?php echo $_SESSION['kirjautunut']; ?></h1>

    <p>Olet kirjautunut sisään.</p>


</div>
