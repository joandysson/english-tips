<?php
$title = __('');
$description = __('');
$keywords = __('');
?>

<?php $headExtra = section(function () { ?>
<?php }); ?>

<?php $content = section(function () use ($data, $categories) { ?>
    <!-- Header -->
    <section class="page-header py-5 bg-dark">
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
                        <?php foreach($categories as $category) { ?>
                            <button class="btn btn-outline-primary me-2 mb-2" data-filter="<?php echo $category['slug']; ?>"><?php echo $category['name']; ?> </button>
                        <?php } ?>
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
                <?php foreach($data['data'] as $value) { ?>
                <div class="col-lg-4 col-md-6 blog-post" data-category="<?php echo $value['category_slug']?>">
                    <article class="blog-card h-100">
                        <!-- <div class="blog-card-image">
                            <img src="https://images.pexels.com/photos/159846/books-student-study-education-159846.jpeg?auto=compress&cs=tinysrgb&w=800" alt="Gramática" class="w-100">
                        </div> -->
                        <div class="blog-card-content p-4">
                            <div class="blog-meta mb-2">
                                <span class="badge bg-primary"><?php echo $value['category']?></span>
                                <span class="text-white-50 ms-2"><?php echo intlFormatDate($value['published_at']); ?></span>
                            </div>
                            <h5 class="fw-semibold mb-3"><?php echo $value['title']?></h5>
                            <p class="text-white-50 mb-3"><?php echo $value['excerpt']?></p>
                            <a href="/blog/<?php echo $value['id'] ?>/<?php echo $value['slug'] ?>" class="btn btn-outline-primary btn-sm rounded-pill">Ler Mais</a>
                        </div>
                    </article>
                </div>
                <?php } ?>
                <?php include 'paginate.php' ?>

                <!-- Vocabulário -->
                <!-- <div class="col-lg-4 col-md-6 blog-post" data-category="vocabulario">
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
                </div> -->

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
