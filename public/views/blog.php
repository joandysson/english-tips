<?php
$title = __('');
$description = __('');
$keywords = __('');
?>

<?php $headExtra = section(function () { ?>
<?php }); ?>

<?php $content = section(function () { ?>
    <!-- Header -->
    <section class="page-header py-5 mt-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h1 class="display-4 fw-bold mb-3">Blog English Tips</h1>
                    <p class="lead text-white-50">Todos os artigos sobre aprendizado de inglês em um só lugar</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Filters -->
    <section class="py-4 bg-white border-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="filter-buttons">
                        <button class="btn btn-outline-primary active me-2 mb-2" data-filter="all">Todos</button>
                        <button class="btn btn-outline-primary me-2 mb-2" data-filter="gramatica">Gramática</button>
                        <button class="btn btn-outline-primary me-2 mb-2" data-filter="vocabulario">Vocabulário</button>
                        <button class="btn btn-outline-primary me-2 mb-2" data-filter="viagem">Viagem</button>
                        <button class="btn btn-outline-primary me-2 mb-2" data-filter="trabalho">Trabalho</button>
                        <button class="btn btn-outline-primary me-2 mb-2" data-filter="estudo">Estudo</button>
                        <button class="btn btn-outline-primary me-2 mb-2" data-filter="curiosidades">Curiosidades</button>
                        <button class="btn btn-outline-primary me-2 mb-2" data-filter="avancado">Avançado</button>
                        <button class="btn btn-outline-primary me-2 mb-2" data-filter="exercicios">Exercícios</button>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="search-box">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Buscar artigos..." id="searchInput">
                            <button class="btn btn-outline-secondary" type="button">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog Posts -->
    <section class="py-5">
        <div class="container">
            <div class="row g-4" id="blogPosts">
                <!-- Gramática -->
                <div class="col-lg-4 col-md-6 blog-post" data-category="gramatica">
                    <article class="blog-card h-100">
                        <div class="blog-card-image">
                            <img src="https://images.pexels.com/photos/159846/books-student-study-education-159846.jpeg?auto=compress&cs=tinysrgb&w=800" alt="Gramática" class="w-100">
                        </div>
                        <div class="blog-card-content p-4">
                            <div class="blog-meta mb-2">
                                <span class="badge bg-primary">Gramática</span>
                                <span class="text-white-50 ms-2">15 Jan 2025</span>
                            </div>
                            <h5 class="fw-semibold mb-3">10 Erros de Gramática que Todo Brasileiro Comete</h5>
                            <p class="text-white-50 mb-3">Descubra os erros mais comuns que brasileiros cometem ao falar inglês e como evitá-los de uma vez por todas.</p>
                            <a href="article" class="btn btn-outline-primary btn-sm rounded-pill">Ler Mais</a>
                        </div>
                    </article>
                </div>

                <div class="col-lg-4 col-md-6 blog-post" data-category="gramatica">
                    <article class="blog-card h-100">
                        <div class="blog-card-image">
                            <img src="https://images.pexels.com/photos/289737/pexels-photo-289737.jpeg?auto=compress&cs=tinysrgb&w=800" alt="Present Perfect" class="w-100">
                        </div>
                        <div class="blog-card-content p-4">
                            <div class="blog-meta mb-2">
                                <span class="badge bg-primary">Gramática</span>
                                <span class="text-white-50 ms-2">13 Jan 2025</span>
                            </div>
                            <h5 class="fw-semibold mb-3">Present Perfect: Quando e Como Usar</h5>
                            <p class="text-white-50 mb-3">Guia completo sobre o Present Perfect com exemplos práticos e exercícios para você dominar esse tempo verbal.</p>
                            <a href="article" class="btn btn-outline-primary btn-sm rounded-pill">Ler Mais</a>
                        </div>
                    </article>
                </div>

                <!-- Vocabulário -->
                <div class="col-lg-4 col-md-6 blog-post" data-category="vocabulario">
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
                            <p class="text-white-50 mb-3">Lista completa com as palavras mais importantes para você se comunicar em inglês no dia a dia.</p>
                            <a href="article" class="btn btn-outline-primary btn-sm rounded-pill">Ler Mais</a>
                        </div>
                    </article>
                </div>

                <div class="col-lg-4 col-md-6 blog-post" data-category="vocabulario">
                    <article class="blog-card h-100">
                        <div class="blog-card-image">
                            <img src="https://images.pexels.com/photos/1181472/pexels-photo-1181472.jpeg?auto=compress&cs=tinysrgb&w=800" alt="Phrasal Verbs" class="w-100">
                        </div>
                        <div class="blog-card-content p-4">
                            <div class="blog-meta mb-2">
                                <span class="badge bg-success">Vocabulário</span>
                                <span class="text-white-50 ms-2">11 Jan 2025</span>
                            </div>
                            <h5 class="fw-semibold mb-3">20 Phrasal Verbs Mais Usados no Inglês</h5>
                            <p class="text-white-50 mb-3">Aprenda os phrasal verbs mais comuns com exemplos práticos e dicas de memorização.</p>
                            <a href="article" class="btn btn-outline-primary btn-sm rounded-pill">Ler Mais</a>
                        </div>
                    </article>
                </div>

                <!-- Viagem -->
                <div class="col-lg-4 col-md-6 blog-post" data-category="viagem">
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
                            <p class="text-white-50 mb-3">Aprenda as expressões mais importantes para se comunicar durante suas viagens internacionais.</p>
                            <a href="article" class="btn btn-outline-primary btn-sm rounded-pill">Ler Mais</a>
                        </div>
                    </article>
                </div>

                <div class="col-lg-4 col-md-6 blog-post" data-category="viagem">
                    <article class="blog-card h-100">
                        <div class="blog-card-image">
                            <img src="https://images.pexels.com/photos/1008155/pexels-photo-1008155.jpeg?auto=compress&cs=tinysrgb&w=800" alt="Hotel" class="w-100">
                        </div>
                        <div class="blog-card-content p-4">
                            <div class="blog-meta mb-2">
                                <span class="badge bg-warning">Viagem</span>
                                <span class="text-white-50 ms-2">09 Jan 2025</span>
                            </div>
                            <h5 class="fw-semibold mb-3">Como Fazer Check-in em Hotel em Inglês</h5>
                            <p class="text-white-50 mb-3">Diálogos e vocabulário essencial para se hospedar em hotéis no exterior sem complicações.</p>
                            <a href="article" class="btn btn-outline-primary btn-sm rounded-pill">Ler Mais</a>
                        </div>
                    </article>
                </div>

                <!-- Trabalho -->
                <div class="col-lg-4 col-md-6 blog-post" data-category="trabalho">
                    <article class="blog-card h-100">
                        <div class="blog-card-image">
                            <img src="https://images.pexels.com/photos/3184418/pexels-photo-3184418.jpeg?auto=compress&cs=tinysrgb&w=800" alt="Trabalho" class="w-100">
                        </div>
                        <div class="blog-card-content p-4">
                            <div class="blog-meta mb-2">
                                <span class="badge bg-info">Trabalho</span>
                                <span class="text-white-50 ms-2">08 Jan 2025</span>
                            </div>
                            <h5 class="fw-semibold mb-3">Inglês para Entrevistas de Emprego</h5>
                            <p class="text-white-50 mb-3">Prepare-se para entrevistas em inglês com perguntas comuns e respostas estratégicas.</p>
                            <a href="article" class="btn btn-outline-primary btn-sm rounded-pill">Ler Mais</a>
                        </div>
                    </article>
                </div>

                <div class="col-lg-4 col-md-6 blog-post" data-category="trabalho">
                    <article class="blog-card h-100">
                        <div class="blog-card-image">
                            <img src="https://images.pexels.com/photos/3184339/pexels-photo-3184339.jpeg?auto=compress&cs=tinysrgb&w=800" alt="Email" class="w-100">
                        </div>
                        <div class="blog-card-content p-4">
                            <div class="blog-meta mb-2">
                                <span class="badge bg-info">Trabalho</span>
                                <span class="text-white-50 ms-2">07 Jan 2025</span>
                            </div>
                            <h5 class="fw-semibold mb-3">Como Escrever E-mails Profissionais em Inglês</h5>
                            <p class="text-white-50 mb-3">Modelos e dicas para escrever e-mails formais e informais no ambiente de trabalho.</p>
                            <a href="article" class="btn btn-outline-primary btn-sm rounded-pill">Ler Mais</a>
                        </div>
                    </article>
                </div>

                <!-- Estudo -->
                <div class="col-lg-4 col-md-6 blog-post" data-category="estudo">
                    <article class="blog-card h-100">
                        <div class="blog-card-image">
                            <img src="https://images.pexels.com/photos/1181533/pexels-photo-1181533.jpeg?auto=compress&cs=tinysrgb&w=800" alt="Estudo" class="w-100">
                        </div>
                        <div class="blog-card-content p-4">
                            <div class="blog-meta mb-2">
                                <span class="badge bg-secondary">Estudo</span>
                                <span class="text-white-50 ms-2">06 Jan 2025</span>
                            </div>
                            <h5 class="fw-semibold mb-3">5 Métodos Eficazes para Memorizar Vocabulário</h5>
                            <p class="text-white-50 mb-3">Técnicas comprovadas para acelerar seu aprendizado e nunca mais esquecer palavras novas.</p>
                            <a href="article" class="btn btn-outline-primary btn-sm rounded-pill">Ler Mais</a>
                        </div>
                    </article>
                </div>
            </div>

            <!-- Load More Button -->
            <div class="text-center mt-5">
                <button class="btn btn-outline-primary btn-lg px-4 rounded-pill" id="loadMoreBtn">
                    <i class="bi bi-arrow-down-circle me-2"></i>Carregar Mais Artigos
                </button>
            </div>
        </div>
    </section>

    <!-- Newsletter CTA -->
    <section class="py-5 bg-primary text-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h3 class="fw-bold mb-2">Não perca nenhum artigo!</h3>
                    <p class="mb-0">Receba notificações sempre que publicarmos novo conteúdo.</p>
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

<?php $scriptsExtra = section(function () { ?>
    <script src="<?php echo asset('js/blog.js?v=0.1') ?>"></script>
<?php }); ?>


<?php include 'templates/main.php' ?>
