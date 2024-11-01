<style>
  .navbar .navbar-brand.active {
    color: black !important;
    font-weight: bold;
}
</style>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
  <img src="../img/qrcode.png">
    <a class="navbar-brand <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>" href="index.php">Início  |</a>
    <a class="navbar-brand <?php echo basename($_SERVER['PHP_SELF']) == 'chamada.php' ? 'active' : ''; ?>" href="chamada.php">Chamada  |</a>
    <a class="navbar-brand <?php echo basename($_SERVER['PHP_SELF']) == 'logout.php' ? 'active' : ''; ?>" href="../login/logout.php">Sair</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
      </ul>
    </div>
  </div>
</nav>