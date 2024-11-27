<style>
  .logo {
    width: 5%; 
    height: auto; 
    margin-right: 1rem; 
  }
  .navbar {
    background-color: #f8f9fa; 
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); 
  }

</style>
<nav class="navbar navbar-expand-lg navbar-light">
  <div class="container">
    <img src="https://i.pinimg.com/736x/ce/19/5b/ce195bddde85e38247c14be58e380c8f.jpg" class="navbar-brand logo" alt="JACCO Logo">  
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Profil
          </a>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <li><a class="dropdown-item" href="profil.php">Akun</a></li>
            <li><a class="dropdown-item" href="logout.php">Log Out</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Menu
          </a>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <li><a class="dropdown-item" href="wisata.php">Pariwisata</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="dashboard.php">Beranda</a>
        </li>

      </ul>
    </div>
  </div>
</nav>