<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Home | Lazzarin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 5 CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #1e3c72, #2a5298);
      color: #fff;
    }

    .navbar {
      background-color: rgba(0, 0, 0, 0.8);
    }

    .navbar-brand,
    .nav-link {
      color: #fff !important;
    }

    .hero-section {
      text-align: center;
      padding: 60px 20px;
    }

    .logo-home {
      max-width: 220px;
      margin-bottom: 20px;
    }

    .card {
      background-color: #f1f1f1;
      color: #333;
      border: none;
      border-radius: 12px;
      transition: transform 0.3s ease;
    }

    .card:hover {
      transform: scale(1.03);
    }

    footer {
      background-color: #fff9c4;
      padding: 30px 0;
      border-top-left-radius: 60px;
      border-top-right-radius: 60px;
      margin-top: 80px;
    }

    footer p {
      color: #333;
      margin: 0;
      text-align: center;
    }
  </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg fixed-top">
  <div class="container">
    <a class="navbar-brand" href="#">Empresa Fictícia</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="menu">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Produtos</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Serviços</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Contato</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- HERO SECTION -->
<div class="hero-section mt-5 pt-5">
  <img src="imagens/logodaempresa.png" alt="Logo da empresa" class="logo-home">
  <h1 class="mt-3">Soluções tecnológicas inteligentes</h1>
  <p class="lead">Assistência técnica confiável, profissional e moderna para todos os seus eletrônicos.</p>
</div>

<!-- SERVIÇOS EM CARDS -->
<div class="container my-5">
  <div class="row g-4">
    <div class="col-md-4">
      <div class="card p-4 text-center h-100">
        <h4>Reparo de Celulares</h4>
        <p>Troca de tela, bateria, software e mais. Profissionais especializados em smartphones.</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card p-4 text-center h-100">
        <h4>TVs e Monitores</h4>
        <p>Consertamos desde telas LED a sistemas eletrônicos de alta precisão.</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card p-4 text-center h-100">
        <h4>Consultoria Técnica</h4>
        <p>Precisa modernizar sua estrutura tecnológica? Nossa equipe pode ajudar.</p>
      </div>
    </div>
  </div>
</div>

<!-- FOOTER -->
<footer>
  <div class="container">
    <p>© 2025 Empresa Fictícia — Todos os direitos reservados.</p>
  </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
