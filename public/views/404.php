<?php
$title = 'Pagina não encontrada';
$description = 'Essa página não existe ou foi removida. Explore o English Tips e encontre dicas valiosas para melhorar seu inglês.';
$keywords = 'Pagina não encontrada';
?>

<?php $headExtra = section(function () { ?>

<?php }); ?>

<?php $content = section(function () { ?>

        <!-- 404 Error Section -->
    <section class="error-404">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 text-center text-lg-start">
                    <div class="error-content">
                        <div class="error-illustration position-relative mb-4">
                            <div class="error-number">404</div>
                            <div class="floating-icon">
                                <i class="bi bi-book text-primary" style="font-size: 2rem; opacity: 0.7;"></i>
                            </div>
                            <div class="floating-icon">
                                <i class="bi bi-lightbulb text-warning" style="font-size: 1.5rem; opacity: 0.7;"></i>
                            </div>
                            <div class="floating-icon">
                                <i class="bi bi-star text-success" style="font-size: 1.8rem; opacity: 0.7;"></i>
                            </div>
                        </div>

                        <h1 class="display-5 fw-bold mb-3">
                            Oops! Página não encontrada
                        </h1>

                        <p class="lead text-white-50 mb-4">
                            Parece que a página que você está procurando não existe ou foi movida.
                            Mas não se preocupe, temos muito conteúdo incrível para você descobrir!
                        </p>

                        <div class="error-message mb-4 p-3 bg-dark rounded">
                            <h6 class="fw-semibold text-primary mb-2">
                                <i class="bi bi-info-circle me-2"></i>O que pode ter acontecido?
                            </h6>
                            <ul class="small mb-0 text-white-50">
                                <li>A URL foi digitada incorretamente</li>
                                <li>A página foi movida ou removida</li>
                                <li>O link que você clicou está desatualizado</li>
                                <li>Você pode ter chegado aqui por engano</li>
                            </ul>
                        </div>

                        <div class="error-actions">
                            <a href="/" class="btn btn-primary btn-lg me-3 mb-3 rounded-pill">
                                <i class="bi bi-house me-2"></i>Voltar ao Início
                            </a>
                            <a href="blog" class="btn btn-outline-primary btn-lg mb-3 rounded-pill">
                                <i class="bi bi-journal-text me-2"></i>Ver Artigos
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="search-help">
                        <!-- Search Box -->
                        <div class="newsletter-form-container p-5 bg-white rounded-3 shadow-lg bg-white p-4 rounded-3 mb-4">
                            <h5 class="fw-bold mb-3">
                                <i class="bi bi-search me-2"></i>Procure por algo específico
                            </h5>
                            <div class="search-form">
                                <div class="input-group input-group-lg">
                                    <input type="text" class="form-control" placeholder="Ex: gramática, vocabulário..." id="searchInput404">
                                    <button class="btn btn-primary" type="button" onclick="performSearch404()">
                                        <i class="bi bi-search"></i>
                                    </button>
                                </div>
                                <small class="text-white-50 mt-2 d-block">
                                    Digite uma palavra-chave para encontrar artigos relacionados
                                </small>
                            </div>
                        </div>

                        <!-- Quick Links -->
                        <div class="quick-links">
                            <h5 class="fw-bold mb-3">
                                <i class="bi bi-lightning me-2"></i>Links Rápidos
                            </h5>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <a href="blog.html?category=gramatica" class="quick-link d-block p-3 bg-white rounded text-decoration-none">
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-journal-text text-primary me-3" style="font-size: 1.5rem;"></i>
                                            <div>
                                                <h6 class="fw-semibold mb-1">Gramática</h6>
                                                <small class="text-white-50">Regras e dicas</small>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <a href="blog.html?category=vocabulario" class="quick-link d-block p-3 bg-white rounded text-decoration-none">
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-book text-success me-3" style="font-size: 1.5rem;"></i>
                                            <div>
                                                <h6 class="fw-semibold mb-1">Vocabulário</h6>
                                                <small class="text-white-50">Palavras essenciais</small>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <a href="blog.html?category=viagem" class="quick-link d-block p-3 bg-white rounded text-decoration-none">
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-airplane text-warning me-3" style="font-size: 1.5rem;"></i>
                                            <div>
                                                <h6 class="fw-semibold mb-1">Viagem</h6>
                                                <small class="text-white-50">Inglês para turismo</small>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <a href="blog.html?category=trabalho" class="quick-link d-block p-3 bg-white rounded text-decoration-none">
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-briefcase text-info me-3" style="font-size: 1.5rem;"></i>
                                            <div>
                                                <h6 class="fw-semibold mb-1">Trabalho</h6>
                                                <small class="text-white-50">Inglês profissional</small>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Popular Articles -->
    <section class="py-5 bg-white">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-6 fw-bold mb-3">Artigos Mais Populares</h2>
                <p class="lead text-white-50">Já que você está aqui, que tal conferir nossos conteúdos mais acessados?</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <article class="blog-card h-100">
                        <div class="blog-card-image">
                            <img src="https://images.pexels.com/photos/159846/books-student-study-education-159846.jpeg?auto=compress&cs=tinysrgb&w=800" alt="Erros de Gramática" class="w-100">
                        </div>
                        <div class="blog-card-content p-4">
                            <div class="blog-meta mb-2">
                                <span class="badge bg-primary">Gramática</span>
                                <span class="text-white-50 ms-2">15 Jan 2025</span>
                            </div>
                            <h5 class="fw-semibold mb-3">10 Erros de Gramática que Todo Brasileiro Comete</h5>
                            <p class="text-white-50 mb-3">Descubra os erros mais comuns e como evitá-los...</p>
                            <a href="article" class="btn btn-outline-primary btn-sm rounded-pill">Ler Artigo</a>
                        </div>
                    </article>
                </div>
                <div class="col-lg-4 col-md-6">
                    <article class="blog-card h-100">
                        <div class="blog-card-image">
                            <img src="https://images.pexels.com/photos/4175070/pexels-photo-4175070.jpeg?auto=compress&cs=tinysrgb&w=800" alt="Vocabulário" class="w-100">
                        </div>
                        <div class="blog-card-content p-4">
                            <div class="blog-meta mb-2">
                                <span class="badge bg-success">Vocabulário</span>
                                <span class="text-white-50 ms-2">12 Jan 2025</span>
                            </div>
                            <h5 class="fw-semibold mb-3">50 Palavras Essenciais para Conversação</h5>
                            <p class="text-white-50 mb-3">Lista completa com as palavras mais importantes...</p>
                            <a href="article" class="btn btn-outline-primary btn-sm rounded-pill">Ler Artigo</a>
                        </div>
                    </article>
                </div>
                <div class="col-lg-4 col-md-6">
                    <article class="blog-card h-100">
                        <div class="blog-card-image">
                            <img src="https://images.pexels.com/photos/346885/pexels-photo-346885.jpeg?auto=compress&cs=tinysrgb&w=800" alt="Viagem" class="w-100">
                        </div>
                        <div class="blog-card-content p-4">
                            <div class="blog-meta mb-2">
                                <span class="badge bg-warning">Viagem</span>
                                <span class="text-white-50 ms-2">10 Jan 2025</span>
                            </div>
                            <h5 class="fw-semibold mb-3">Frases Essenciais para Viajar ao Exterior</h5>
                            <p class="text-white-50 mb-3">Aprenda as expressões mais importantes...</p>
                            <a href="article" class="btn btn-outline-primary btn-sm rounded-pill">Ler Artigo</a>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <!-- Help Section -->
    <section class="py-5 bg-dark">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h3 class="fw-bold mb-2">Ainda não encontrou o que procurava?</h3>
                    <p class="mb-0 text-white-50">
                        Nossa equipe está sempre pronta para ajudar. Entre em contato conosco
                        e teremos prazer em esclarecer suas dúvidas sobre inglês.
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                    <a href="contact" class="btn btn-primary btn-lg px-4 rounded-pill">
                        <i class="bi bi-chat-dots me-2"></i>Fale Conosco
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter CTA -->
    <section class="py-5 bg-primary text-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h3 class="fw-bold mb-2">Não perca nossos novos conteúdos!</h3>
                    <p class="mb-0">Receba dicas de inglês toda semana diretamente no seu email.</p>
                </div>
                <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                    <a href="newsletter" class="btn btn-warning btn-lg px-4 rounded-pill">
                        <i class="bi bi-envelope-heart me-2"></i>Assinar Newsletter
                    </a>
                </div>
            </div>
        </div>
    </section>

<?php }); ?>

<?php include 'templates/main.php' ?>
