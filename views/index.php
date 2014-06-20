<h1>Hei, <?php echo $_SESSION['kirjautunut']; ?></h1>

<p>Olet kirjautunut sisään.</p>
<br>
<p>Debug:</p>

<p> 
    tunnus: <?php echo $_SESSION['kirjautunut']; ?>
    <br>
    id: <?php echo $_SESSION['kirjautuneenID']; ?>
    <br>
    tutortunnus: <?php echo $_SESSION['tutor']; ?>
    <br>
    fuksitunnus: <?php echo $_SESSION['fuksi']; ?>
</p>

