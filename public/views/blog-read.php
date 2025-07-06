<?php
$title = $data['post']['title'];
$description = $data['post']['excerpt'];
$keywords = 'aprenda inglês, passado, presente, futuro, dicas de ingles, inglês para viagens, ingles para o dia a dia';
?>

<?php $headExtra = section(function () { ?>
<?php }); ?>

<?php $content = section(function () use ($data) { ?>
  <!-- Article Header -->
  <section class="article-header mt-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <!-- <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html" class="text-decoration-none">Home</a></li>
              <li class="breadcrumb-item"><a href="blog.html" class="text-decoration-none">Blog</a></li>
              <li class="breadcrumb-item active" aria-current="page">Gramática</li>
            </ol>
          </nav> -->

          <?php // dd($data['post']);
          ?>
          <div class="article-meta mb-3">
            <span class="badge bg-primary me-2"><?php echo $data['post']['category']; ?></span>
            <span class="text-white-50"><?php echo intlFormatDate($data['post']['published_at']); ?></span>
            <span class="text-white-50 mx-2">•</span>
            <span class="text-white-50">8 min de leitura</span>
          </div>

          <h1 class="display-4 fw-bold mb-4">
            <?php echo $data['post']['title']; ?>
          </h1>

          <p class="lead text-white-50 mb-4">
            <?php echo $data['post']['excerpt']; ?>
          </p>

          <!-- Social Share -->
          <div class="social-share mb-4">
            <span class="me-3">Compartilhar:</span>
            <a href="#" class="btn btn-outline-primary btn-sm me-2"><i class="bi bi-facebook"></i></a>
            <a href="#" class="btn btn-outline-info btn-sm me-2"><i class="bi bi-twitter"></i></a>
            <a href="#" class="btn btn-outline-success btn-sm me-2"><i class="bi bi-whatsapp"></i></a>
            <a href="#" class="btn btn-outline-primary btn-sm"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Article Image -->
  <!-- <section class="article-image mb-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 mx-auto">
          <img src="https://images.pexels.com/photos/159846/books-student-study-education-159846.jpeg?auto=compress&cs=tinysrgb&w=1200"
            alt="Estudante aprendendo gramática inglesa" class="img-fluid rounded shadow">
        </div>
      </div>
    </div>
  </section> -->

  <!-- Article Content -->
  <section class="article-content">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <div class="article-body">
            <?php echo $data['post']['content']; ?>
          </div>

          <!-- Article Tags -->
          <div class="article-tags mt-5 pt-4 border-top">
            <h6 class="fw-semibold mb-3">Tags:</h6>
            <a href="#" class="badge bg-light text-dark me-2 mb-2 text-decoration-none">gramática</a>
            <a href="#" class="badge bg-light text-dark me-2 mb-2 text-decoration-none">erros comuns</a>
            <a href="#" class="badge bg-light text-dark me-2 mb-2 text-decoration-none">dicas de inglês</a>
            <a href="#" class="badge bg-light text-dark me-2 mb-2 text-decoration-none">aprendizado</a>
            <a href="#" class="badge bg-light text-dark me-2 mb-2 text-decoration-none">brasileiros</a>
          </div>

          <!-- Social Share Bottom -->
          <div class="social-share-bottom mt-5 pt-4 border-top text-center">
            <h6 class="fw-semibold mb-3">Gostou do artigo? Compartilhe!</h6>
            <a href="#" class="btn btn-primary btn-lg me-3 mb-3">
              <i class="bi bi-facebook me-2"></i>Facebook
            </a>
            <a href="#" class="btn btn-info btn-lg me-3 mb-3">
              <i class="bi bi-twitter me-2"></i>Twitter
            </a>
            <a href="#" class="btn btn-success btn-lg me-3 mb-3">
              <i class="bi bi-whatsapp me-2"></i>WhatsApp
            </a>
            <a href="#" class="btn btn-primary btn-lg mb-3">
              <i class="bi bi-linkedin me-2"></i>LinkedIn
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Related Articles -->
  <section class="py-5 bg-dark">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h3 class="fw-bold mb-4">Artigos Relacionados</h3>
          <div class="row g-4">
            <div class="col-md-6">
              <article class="blog-card h-100">
                <div class="blog-card-image">
                  <img src="https://images.pexels.com/photos/289737/pexels-photo-289737.jpeg?auto=compress&cs=tinysrgb&w=800" alt="Present Perfect" class="w-100">
                </div>
                <div class="blog-card-content p-4">
                  <div class="blog-meta mb-2">
                    <span class="badge bg-primary">Gramática</span>
                    <span class="text-muted ms-2">13 Jan 2025</span>
                  </div>
                  <h6 class="fw-semibold mb-3">Present Perfect: Quando e Como Usar</h6>
                  <a href="article.html" class="btn btn-outline-primary btn-sm rounded-pill">Ler Mais</a>
                </div>
              </article>
            </div>
            <div class="col-md-6">
              <article class="blog-card h-100">
                <div class="blog-card-image">
                  <img src="https://images.pexels.com/photos/4175070/pexels-photo-4175070.jpeg?auto=compress&cs=tinysrgb&w=800" alt="Vocabulário" class="w-100">
                </div>
                <div class="blog-card-content p-4">
                  <div class="blog-meta mb-2">
                    <span class="badge bg-success">Vocabulário</span>
                    <span class="text-muted ms-2">12 Jan 2025</span>
                  </div>
                  <h6 class="fw-semibold mb-3">50 Palavras Essenciais para Conversação</h6>
                  <a href="article.html" class="btn btn-outline-primary btn-sm rounded-pill">Ler Mais</a>
                </div>
              </article>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Newsletter CTA -->
  <section class="py-5 bg-primary text-white">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-8">
          <h3 class="fw-bold mb-2">Quer mais dicas como esta?</h3>
          <p class="mb-0">Receba artigos exclusivos e exercícios práticos toda semana no seu email.</p>
        </div>
        <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
          <a href="newsletter.html" class="btn btn-warning btn-lg px-4 rounded-pill">
            <i class="bi bi-envelope-heart me-2"></i>Assinar Newsletter
          </a>
        </div>
      </div>
    </div>
  </section>

<?php }); ?>

<?php $scriptsExtra = section(function () { ?>
<?php }); ?>

<?php include 'templates/main.php' ?>
