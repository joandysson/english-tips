<?php
$title = __('');
$description = __('');
$keywords = __('');
?>

<?php $headExtra = section(function () { ?>
<?php }); ?>

<?php $content = section(function () use ($data) { ?>
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center min-vh-100">
                <div class="col-lg-6">
                    <div class="hero-content">
                        <h1 class="display-4 fw-bold text-white mb-4">
                            Aprenda inglês de forma <span class="text-warning">simples</span>,
                            <span class="text-warning">prática</span> e
                            <span class="text-warning">gratuita</span>
                        </h1>
                        <p class="lead text-white-50 mb-4">
                            Dicas, exercícios e conteúdo de qualidade para você dominar o inglês
                            do básico ao avançado. Junte-se a milhares de estudantes que já transformaram
                            suas vidas com nosso método.
                        </p>
                        <div class="hero-actions">
                            <a href="newsletter" class="btn btn-warning btn-lg px-4 me-3 rounded-pill">
                                <i class="bi bi-envelope-heart me-2"></i>Receber Dicas Grátis
                            </a>
                            <a href="blog" class="btn btn-outline-light btn-lg px-4 rounded-pill">
                                <i class="bi bi-book me-2"></i>Ver Artigos
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    <div class="hero-image">
                        <i class="bi bi-mortarboard-fill hero-icon"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-3 col-6 mb-4">
                    <div class="stat-item">
                        <h3 class="fw-bold text-primary mb-2">1000+</h3>
                        <p class="text-white-50">Alunos Impactados</p>
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-4">
                    <div class="stat-item">
                        <h3 class="fw-bold text-primary mb-2">150+</h3>
                        <p class="text-white-50">Artigos Publicados</p>
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-4">
                    <div class="stat-item">
                        <h3 class="fw-bold text-primary mb-2">8</h3>
                        <p class="text-white-50">Categorias</p>
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-4">
                    <div class="stat-item">
                        <h3 class="fw-bold text-primary mb-2">100%</h3>
                        <p class="text-white-50">Gratuito</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold mb-3">Categorias de Estudo</h2>
                <p class="lead text-white-50">Escolha o tópico que mais combina com seu objetivo</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="category-card text-center p-4 h-100">
                        <div class="category-icon mb-3">
                            <i class="bi bi-journal-text"></i>
                        </div>
                        <h5 class="fw-semibold mb-3">Gramática</h5>
                        <p class="text-white-50 mb-3">Domine as regras essenciais da gramática inglesa</p>
                        <a href="blog.html?category=gramatica" class="btn btn-outline-primary btn-sm rounded-pill">Ver Artigos</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="category-card text-center p-4 h-100">
                        <div class="category-icon mb-3">
                            <i class="bi bi-book"></i>
                        </div>
                        <h5 class="fw-semibold mb-3">Vocabulário</h5>
                        <p class="text-white-50 mb-3">Amplie seu vocabulário com palavras do dia a dia</p>
                        <a href="blog.html?category=vocabulario" class="btn btn-outline-primary btn-sm rounded-pill">Ver Artigos</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="category-card text-center p-4 h-100">
                        <div class="category-icon mb-3">
                            <i class="bi bi-airplane"></i>
                        </div>
                        <h5 class="fw-semibold mb-3">Inglês para Viagem</h5>
                        <p class="text-white-50 mb-3">Frases e expressões para suas aventuras</p>
                        <a href="blog.html?category=viagem" class="btn btn-outline-primary btn-sm rounded-pill">Ver Artigos</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="category-card text-center p-4 h-100">
                        <div class="category-icon mb-3">
                            <i class="bi bi-briefcase"></i>
                        </div>
                        <h5 class="fw-semibold mb-3">Inglês para Trabalho</h5>
                        <p class="text-white-50 mb-3">Profissionalize seu inglês para o mercado</p>
                        <a href="blog.html?category=trabalho" class="btn btn-outline-primary btn-sm rounded-pill">Ver Artigos</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="category-card text-center p-4 h-100">
                        <div class="category-icon mb-3">
                            <i class="bi bi-lightbulb"></i>
                        </div>
                        <h5 class="fw-semibold mb-3">Dicas de Estudo</h5>
                        <p class="text-white-50 mb-3">Métodos eficazes para acelerar seu aprendizado</p>
                        <a href="blog.html?category=estudo" class="btn btn-outline-primary btn-sm rounded-pill">Ver Artigos</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="category-card text-center p-4 h-100">
                        <div class="category-icon mb-3">
                            <i class="bi bi-star"></i>
                        </div>
                        <h5 class="fw-semibold mb-3">Curiosidades</h5>
                        <p class="text-white-50 mb-3">Fatos interessantes sobre a língua inglesa</p>
                        <a href="blog.html?category=curiosidades" class="btn btn-outline-primary btn-sm rounded-pill">Ver Artigos</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="category-card text-center p-4 h-100">
                        <div class="category-icon mb-3">
                            <i class="bi bi-trophy"></i>
                        </div>
                        <h5 class="fw-semibold mb-3">Inglês Avançado</h5>
                        <p class="text-white-50 mb-3">Conteúdo para quem quer fluência total</p>
                        <a href="blog.html?category=avancado" class="btn btn-outline-primary btn-sm rounded-pill">Ver Artigos</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="category-card text-center p-4 h-100">
                        <div class="category-icon mb-3">
                            <i class="bi bi-pencil-square"></i>
                        </div>
                        <h5 class="fw-semibold mb-3">Exercícios</h5>
                        <p class="text-white-50 mb-3">Pratique com exercícios interativos</p>
                        <a href="blog.html?category=exercicios" class="btn btn-outline-primary btn-sm rounded-pill">Ver Artigos</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Latest Posts -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold mb-3">Últimos Artigos</h2>
                <p class="lead text-white-50">Confira nossas publicações mais recentes</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <article class="blog-card h-100">
                        <div class="blog-card-image">
                            <img src="https://images.pexels.com/photos/159846/books-student-study-education-159846.jpeg?auto=compress&cs=tinysrgb&w=800" alt="Dicas de Gramática" class="w-100">
                        </div>
                        <div class="blog-card-content p-4">
                            <div class="blog-meta mb-2">
                                <span class="badge bg-primary">Gramática</span>
                                <span class="text-white-50 ms-2">15 Jan 2025</span>
                            </div>
                            <h5 class="fw-semibold mb-3">10 Erros de Gramática que Todo Brasileiro Comete</h5>
                            <p class="text-white-50 mb-3">Descubra os erros mais comuns que brasileiros cometem ao falar inglês e como evitá-los...</p>
                            <a href="article" class="btn btn-outline-primary btn-sm rounded-pill">Ler Mais</a>
                        </div>
                    </article>
                </div>
                <div class="col-lg-4 col-md-6">
                    <article class="blog-card h-100">
                        <div class="blog-card-image">
                            <img src="https://images.pexels.com/photos/4175070/pexels-photo-4175070.jpeg?auto=compress&cs=tinysrgb&w=800" alt="Vocabulário Essencial" class="w-100">
                        </div>
                        <div class="blog-card-content p-4">
                            <div class="blog-meta mb-2">
                                <span class="badge bg-success">Vocabulário</span>
                                <span class="text-white-50 ms-2">12 Jan 2025</span>
                            </div>
                            <h5 class="fw-semibold mb-3">50 Palavras Essenciais para Conversação</h5>
                            <p class="text-white-50 mb-3">Lista completa com as palavras mais importantes para você se comunicar em inglês...</p>
                            <a href="article" class="btn btn-outline-primary btn-sm rounded-pill">Ler Mais</a>
                        </div>
                    </article>
                </div>
                <div class="col-lg-4 col-md-6">
                    <article class="blog-card h-100">
                        <div class="blog-card-image">
                            <img src="https://images.pexels.com/photos/346885/pexels-photo-346885.jpeg?auto=compress&cs=tinysrgb&w=800" alt="Inglês para Viagem" class="w-100">
                        </div>
                        <div class="blog-card-content p-4">
                            <div class="blog-meta mb-2">
                                <span class="badge bg-warning">Viagem</span>
                                <span class="text-white-50 ms-2">10 Jan 2025</span>
                            </div>
                            <h5 class="fw-semibold mb-3">Frases Essenciais para Viajar ao Exterior</h5>
                            <p class="text-white-50 mb-3">Aprenda as expressões mais importantes para se comunicar durante suas viagens...</p>
                            <a href="article" class="btn btn-outline-primary btn-sm rounded-pill">Ler Mais</a>
                        </div>
                    </article>
                </div>
            </div>
            <div class="text-center mt-5">
                <a href="blog" class="btn btn-primary btn-lg px-4 rounded-pill">
                    <i class="bi bi-arrow-right me-2"></i>Ver Todos os Artigos
                </a>
            </div>
        </div>
    </section>

    <!-- Newsletter CTA -->
    <section class="py-5 bg-primary text-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h3 class="fw-bold mb-2">Receba dicas de inglês toda semana!</h3>
                    <p class="mb-0">Junte-se a mais de 1000 pessoas que já recebem nosso conteúdo exclusivo por email.</p>
                </div>
                <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                    <a href="newsletter" class="btn btn-warning btn-lg px-4 rounded-pill">
                        <i class="bi bi-envelope-heart me-2"></i>Quero Receber!
                    </a>
                </div>
            </div>
        </div>
    </section>
<?php }); ?>

<?php $scriptsExtra = section(function () { ?>
    <script src="<?php echo asset('js/home.js?v=0.1') ?>"></script>
<?php }); ?>


<?php include 'templates/main.php' ?>
