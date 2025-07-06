<?php
$title = 'Obrigado pelo contato!';
$description = 'Obrigado pelo contato!';
$keywords = 'obrigado, English Tips';
?>

<?php $headExtra = section(function () { ?>
    <style>
        .thank-you-hero {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .thank-you-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="75" cy="75" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="50" cy="10" r="0.5" fill="rgba(255,255,255,0.05)"/><circle cx="10" cy="60" r="0.5" fill="rgba(255,255,255,0.05)"/><circle cx="90" cy="40" r="0.5" fill="rgba(255,255,255,0.05)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
            opacity: 0.3;
        }

        .success-icon {
            font-size: 8rem;
            color: #ffffff;
            animation: successBounce 2s ease-in-out infinite;
            text-shadow: 0 4px 20px rgba(255, 255, 255, 0.3);
        }

        @keyframes successBounce {

            0%,
            100% {
                transform: scale(1) rotate(0deg);
            }

            50% {
                transform: scale(1.1) rotate(5deg);
            }
        }

        .floating-messages {
            position: absolute;
            width: 100%;
            height: 100%;
            pointer-events: none;
        }

        .floating-message {
            position: absolute;
            animation: messageFloat 6s ease-in-out infinite;
            opacity: 0.7;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            padding: 0.5rem 1rem;
            font-size: 0.8rem;
            color: white;
        }

        .floating-message:nth-child(1) {
            top: 20%;
            left: 10%;
            animation-delay: 0s;
        }

        .floating-message:nth-child(2) {
            top: 60%;
            right: 15%;
            animation-delay: 2s;
        }

        .floating-message:nth-child(3) {
            bottom: 30%;
            left: 20%;
            animation-delay: 4s;
        }

        @keyframes messageFloat {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            33% {
                transform: translateY(-15px) rotate(2deg);
            }

            66% {
                transform: translateY(-5px) rotate(-2deg);
            }
        }

        .response-timeline {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .timeline-item {
            position: relative;
            padding-left: 3rem;
        }

        .timeline-item::before {
            content: '';
            position: absolute;
            left: 1rem;
            top: 0;
            bottom: 0;
            width: 2px;
            background: linear-gradient(to bottom, #28a745, #20c997);
        }

        .timeline-item:last-child::before {
            display: none;
        }

        .timeline-icon {
            position: absolute;
            left: 0.5rem;
            top: 0.5rem;
            width: 2rem;
            height: 2rem;
            background: #28a745;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 0.8rem;
            z-index: 2;
        }

        .contact-info-card {
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .contact-info-card:hover {
            transform: translateY(-5px);
            border-color: #28a745;
            box-shadow: 0 10px 30px rgba(40, 167, 69, 0.2);
        }

        .pulse-animation {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(40, 167, 69, 0.7);
            }

            70% {
                box-shadow: 0 0 0 10px rgba(40, 167, 69, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(40, 167, 69, 0);
            }
        }

        @media (max-width: 768px) {
            .success-icon {
                font-size: 5rem;
            }

            .floating-message {
                display: none;
            }

            .timeline-item {
                padding-left: 2rem;
            }

            .timeline-icon {
                left: 0;
                width: 1.5rem;
                height: 1.5rem;
                font-size: 0.7rem;
            }
        }
    </style>
<?php }); ?>

<?php $content = section(function () use ($data) { ?>
    <!-- Thank You Hero -->
    <section class="thank-you-hero">
        <div class="floating-messages">
            <div class="floating-message">
                <i class="bi bi-envelope me-1"></i> Mensagem recebida!
            </div>
            <div class="floating-message">
                <i class="bi bi-clock me-1"></i> Resposta em 24h
            </div>
            <div class="floating-message">
                <i class="bi bi-heart me-1"></i> Obrigado pelo contato!
            </div>
        </div>

        <div class="container">
            <div class="row align-items-center min-vh-100">
                <div class="col-lg-8 mx-auto text-center">
                    <div class="success-content position-relative">
                        <div class="success-icon mb-4">
                            <i class="bi bi-check-circle-fill"></i>
                        </div>

                        <h1 class="display-3 fw-bold text-white mb-4">
                            Mensagem Enviada! ✉️
                        </h1>

                        <h2 class="display-6 fw-semibold text-white mb-4">
                            Obrigado por entrar em contato conosco!
                        </h2>

                        <p class="lead text-white mb-5">
                            Recebemos sua mensagem e nossa equipe irá analisá-la cuidadosamente.
                            Você receberá uma resposta personalizada em breve.
                        </p>

                        <!-- Response Timeline -->
                        <div class="response-timeline p-4 rounded-3 mb-5 d-inline-block text-start">
                            <h5 class="text-dark mb-4 text-center">
                                <i class="bi bi-clock-history me-2"></i>Cronograma de Resposta
                            </h5>

                            <div class="timeline-item mb-3">
                                <div class="timeline-icon">
                                    <i class="bi bi-check"></i>
                                </div>
                                <div>
                                    <h6 class="fw-semibold text-success mb-1">Agora</h6>
                                    <p class="small text-muted mb-0">Mensagem recebida e confirmada</p>
                                </div>
                            </div>

                            <div class="timeline-item mb-3">
                                <div class="timeline-icon pulse-animation">
                                    <i class="bi bi-eye"></i>
                                </div>
                                <div>
                                    <h6 class="fw-semibold text-primary mb-1">Próximas 2 horas</h6>
                                    <p class="small text-muted mb-0">Nossa equipe irá analisar sua mensagem</p>
                                </div>
                            </div>

                            <div class="timeline-item">
                                <div class="timeline-icon">
                                    <i class="bi bi-reply"></i>
                                </div>
                                <div>
                                    <h6 class="fw-semibold text-info mb-1">Até 24 horas</h6>
                                    <p class="small text-muted mb-0">Você receberá nossa resposta por email</p>
                                </div>
                            </div>
                        </div>

                        <div class="hero-actions">
                            <a href="blog.html" class="btn btn-light btn-lg px-4 me-3 rounded-pill">
                                <i class="bi bi-book me-2"></i>Explorar Artigos
                            </a>
                            <a href="index.html" class="btn btn-outline-light btn-lg px-4 rounded-pill">
                                <i class="bi bi-house me-2"></i>Voltar ao Início
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Information -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold text-dark mb-3">Outras Formas de Contato</h2>
                <p class="lead text-muted">Precisa de uma resposta mais rápida? Tente estes canais</p>
            </div>

            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="contact-info-card p-4 rounded-3 h-100 text-center bg-white">
                        <div class="contact-icon mb-3">
                            <i class="bi bi-envelope-fill text-primary" style="font-size: 3rem;"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Email Direto</h5>
                        <p class="text-white-50 mb-3">
                            Para dúvidas urgentes ou questões específicas sobre nosso conteúdo.
                        </p>
                        <a href="mailto:contato@englishtips.com.br" class="btn btn-outline-primary rounded-pill">
                            <i class="bi bi-envelope me-2"></i>contato@englishtips.com.br
                        </a>
                        <div class="response-time mt-2">
                            <small class="text-success">
                                <i class="bi bi-clock me-1"></i>Resposta em até 12h
                            </small>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="contact-info-card p-4 rounded-3 h-100 text-center bg-white">
                        <div class="contact-icon mb-3">
                            <i class="bi bi-chat-dots-fill text-success" style="font-size: 3rem;"></i>
                        </div>
                        <h5 class="fw-bold mb-3">WhatsApp</h5>
                        <p class="text-white-50 mb-3">
                            Para dúvidas rápidas sobre estudos ou sugestões de conteúdo.
                        </p>
                        <a href="#" class="btn btn-outline-success rounded-pill">
                            <i class="bi bi-whatsapp me-2"></i>Enviar Mensagem
                        </a>
                        <div class="response-time mt-2">
                            <small class="text-success">
                                <i class="bi bi-clock me-1"></i>Resposta em até 4h
                            </small>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="contact-info-card p-4 rounded-3 h-100 text-center bg-white">
                        <div class="contact-icon mb-3">
                            <i class="bi bi-people-fill text-info" style="font-size: 3rem;"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Redes Sociais</h5>
                        <p class="text-white-50 mb-3">
                            Siga-nos para dicas diárias e interação com nossa comunidade.
                        </p>
                        <div class="social-buttons">
                            <a href="#" class="btn btn-outline-primary btn-sm me-2 mb-2 rounded-pill">
                                <i class="bi bi-facebook"></i>
                            </a>
                            <a href="#" class="btn btn-outline-info btn-sm me-2 mb-2 rounded-pill">
                                <i class="bi bi-instagram"></i>
                            </a>
                            <a href="#" class="btn btn-outline-danger btn-sm mb-2 rounded-pill">
                                <i class="bi bi-youtube"></i>
                            </a>
                        </div>
                        <div class="response-time mt-2">
                            <small class="text-info">
                                <i class="bi bi-clock me-1"></i>Resposta em até 2h
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Quick Help -->
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold mb-3">Enquanto Aguarda...</h2>
                <p class="lead text-white-50">Talvez sua dúvida já tenha sido respondida aqui</p>
            </div>

            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="accordion" id="quickFAQ">
                        <div class="accordion-item mb-3 border-0 shadow-sm">
                            <h3 class="accordion-header" id="faq1">
                                <button class="accordion-button fw-semibold" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                                    <i class="bi bi-question-circle me-2"></i>
                                    Como posso acelerar meu aprendizado de inglês?
                                </button>
                            </h3>
                            <div id="collapse1" class="accordion-collapse collapse show" aria-labelledby="faq1"
                                data-bs-parent="#quickFAQ">
                                <div class="accordion-body">
                                    <p class="mb-3">Para acelerar seu aprendizado, recomendamos:</p>
                                    <ul class="mb-3">
                                        <li>Pratique pelo menos 30 minutos por dia</li>
                                        <li>Assine nossa newsletter para dicas semanais</li>
                                        <li>Leia nossos artigos organizados por nível</li>
                                        <li>Pratique conversação sempre que possível</li>
                                    </ul>
                                    <a href="/newsletter" class="btn btn-primary btn-sm rounded-pill">
                                        <i class="bi bi-envelope me-2"></i>Assinar Newsletter
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item mb-3 border-0 shadow-sm">
                            <h3 class="accordion-header" id="faq2">
                                <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                                    <i class="bi bi-book me-2"></i>
                                    Qual categoria devo estudar primeiro?
                                </button>
                            </h3>
                            <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="faq2"
                                data-bs-parent="#quickFAQ">
                                <div class="accordion-body">
                                    <p class="mb-3">Depende do seu nível atual:</p>
                                    <ul class="mb-3">
                                        <li><strong>Iniciante:</strong> Comece com Vocabulário e Gramática básica</li>
                                        <li><strong>Intermediário:</strong> Foque em Conversação e Inglês para Trabalho</li>
                                        <li><strong>Avançado:</strong> Explore Curiosidades e Inglês Avançado</li>
                                    </ul>
                                    <a href="/blog" class="btn btn-success btn-sm rounded-pill">
                                        <i class="bi bi-arrow-right me-2"></i>Ver Todas as Categorias
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item border-0 shadow-sm">
                            <h3 class="accordion-header" id="faq3">
                                <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                                    <i class="bi bi-gift me-2"></i>
                                    Vocês oferecem materiais gratuitos?
                                </button>
                            </h3>
                            <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="faq3"
                                data-bs-parent="#quickFAQ">
                                <div class="accordion-body">
                                    <p class="mb-3">Sim! Todo nosso conteúdo é 100% gratuito:</p>
                                    <ul class="mb-3">
                                        <li>Mais de 150 artigos no blog</li>
                                        <li>Newsletter semanal com dicas exclusivas</li>
                                        <li>Exercícios práticos em PDF</li>
                                        <li>Guias de gramática e vocabulário</li>
                                    </ul>
                                    <div class="d-flex gap-2 flex-wrap">
                                        <a href="/blog" class="btn btn-outline-primary btn-sm rounded-pill">
                                            <i class="bi bi-journal-text me-2"></i>Ver Artigos
                                        </a>
                                        <a href="/newsletter" class="btn btn-outline-warning btn-sm rounded-pill">
                                            <i class="bi bi-envelope-heart me-2"></i>Newsletter Grátis
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Recommended Articles -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold text-dark mb-3">Continue Aprendendo</h2>
                <p class="lead text-muted">Artigos recomendados enquanto aguarda nossa resposta</p>
            </div>

            <div class="row g-4">
                <?php foreach ($data['data'] as $value) { ?>
                    <div class="col-lg-6">
                        <article class="blog-card h-100">
                            <!-- <div class="blog-card-image">
                                <img src="https://images.pexels.com/photos/159846/books-student-study-education-159846.jpeg?auto=compress&cs=tinysrgb&w=800" alt="Gramática" class="w-100">
                            </div> -->
                            <div class="blog-card-content p-4">
                                <div class="blog-meta mb-2">
                                    <span class="badge bg-primary"><?php echo $value['category']?></span>
                                    <!-- <span class="text-white-50 ms-2">Mais lido</span> -->
                                </div>
                                <h5 class="fw-semibold mb-3"><?php echo $value['title']?></h5>
                                <p class="text-white-50 mb-3"><?php echo $value['excerpt']?></p>
                                <a href="/blog" class="btn btn-outline-primary btn-sm rounded-pill">
                                    <i class="bi bi-arrow-right me-2"></i>Ler Agora
                                </a>
                            </div>
                        </article>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <!-- Newsletter CTA -->
    <section class="py-5 bg-primary text-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h3 class="fw-bold mb-2">
                        <i class="bi bi-lightbulb me-2"></i>Não perca nenhuma dica!
                    </h3>
                    <p class="mb-0">
                        Enquanto aguarda nossa resposta, que tal se inscrever na newsletter para
                        receber dicas exclusivas de inglês toda semana?
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                    <a href="/newsletter" class="btn btn-warning btn-lg px-4 rounded-pill">
                        <i class="bi bi-envelope-heart me-2"></i>Quero Receber Dicas!
                    </a>
                </div>
            </div>
        </div>
    </section>

<?php }); ?>

<?php include 'templates/main.php' ?>
