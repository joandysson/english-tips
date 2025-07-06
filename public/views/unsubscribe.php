<?php
$title = __('');
$description = __('');
$keywords = __('');
?>

<?php $headExtra = section(function () { ?>
    <style>
        .unsubscribe-hero {
            background: linear-gradient(135deg, #6c757d 0%, #495057 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .unsubscribe-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="75" cy="75" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="50" cy="10" r="0.5" fill="rgba(255,255,255,0.05)"/><circle cx="10" cy="60" r="0.5" fill="rgba(255,255,255,0.05)"/><circle cx="90" cy="40" r="0.5" fill="rgba(255,255,255,0.05)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
            opacity: 0.3;
        }

        .sad-icon {
            font-size: 8rem;
            color: #ffc107;
            animation: sadFloat 3s ease-in-out infinite;
            text-shadow: 0 4px 20px rgba(255, 193, 7, 0.4);
        }

        @keyframes sadFloat {

            0%,
            100% {
                transform: translateY(0px) rotate(-5deg);
            }

            50% {
                transform: translateY(-10px) rotate(5deg);
            }
        }

        .floating-emails {
            position: absolute;
            width: 100%;
            height: 100%;
            pointer-events: none;
        }

        .floating-email {
            position: absolute;
            animation: emailFloat 8s ease-in-out infinite;
            opacity: 0.4;
            color: rgba(255, 255, 255, 0.6);
        }

        .floating-email:nth-child(1) {
            top: 20%;
            left: 10%;
            animation-delay: 0s;
        }

        .floating-email:nth-child(2) {
            top: 60%;
            right: 15%;
            animation-delay: 2s;
        }

        .floating-email:nth-child(3) {
            bottom: 30%;
            left: 20%;
            animation-delay: 4s;
        }

        .floating-email:nth-child(4) {
            top: 40%;
            right: 30%;
            animation-delay: 6s;
        }

        @keyframes emailFloat {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
                opacity: 0.4;
            }

            25% {
                transform: translateY(-20px) rotate(5deg);
                opacity: 0.2;
            }

            50% {
                transform: translateY(-10px) rotate(-5deg);
                opacity: 0.6;
            }

            75% {
                transform: translateY(-15px) rotate(3deg);
                opacity: 0.3;
            }
        }

        .reason-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .reason-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border-color: var(--primary-color);
        }

        .reason-card.selected {
            border-color: var(--primary-color);
            background: rgba(108, 99, 255, 0.1);
        }

        .feedback-form {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .alternative-card {
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .alternative-card:hover {
            transform: translateY(-5px);
            border-color: var(--primary-color);
            box-shadow: 0 8px 25px rgba(108, 99, 255, 0.2);
        }

        .stats-counter {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary-color);
        }

        @media (max-width: 768px) {
            .sad-icon {
                font-size: 5rem;
            }

            .floating-email {
                display: none;
            }

            .stats-counter {
                font-size: 2rem;
            }
        }
    </style>
<?php }); ?>

<?php $content = section(function () { ?>

    <!-- Unsubscribe Hero -->
    <section class="unsubscribe-hero">
        <div class="floating-emails">
            <div class="floating-email">
                <i class="bi bi-envelope-x" style="font-size: 2rem;"></i>
            </div>
            <div class="floating-email">
                <i class="bi bi-envelope-slash" style="font-size: 1.5rem;"></i>
            </div>
            <div class="floating-email">
                <i class="bi bi-envelope-dash" style="font-size: 1.8rem;"></i>
            </div>
            <div class="floating-email">
                <i class="bi bi-envelope-exclamation" style="font-size: 1.6rem;"></i>
            </div>
        </div>

        <div class="container">
            <div class="row align-items-center min-vh-100">
                <div class="col-lg-8 mx-auto text-center">
                    <div class="unsubscribe-content position-relative">
                        <div class="sad-icon mb-4">
                            <i class="bi bi-emoji-frown"></i>
                        </div>

                        <h1 class="display-3 fw-bold text-white mb-4">
                            Que pena! 😢
                        </h1>

                        <h2 class="display-6 fw-semibold text-white mb-4">
                            Você foi descadastrado da nossa newsletter
                        </h2>

                        <p class="lead text-white-50 mb-5">
                            Sentimos muito em vê-lo partir. Sua inscrição foi cancelada com sucesso
                            e você não receberá mais emails da nossa newsletter.
                        </p>

                        <div class="unsubscribe-status p-4 bg-white bg-opacity-10 rounded-3 mb-5 d-inline-block">
                            <h5 class="text-white mb-3">
                                <i class="bi bi-check-circle me-2"></i>Status do Descadastro
                            </h5>
                            <div class="status-info text-start">
                                <p class="text-white mb-2">
                                    <i class="bi bi-envelope-x me-2"></i>
                                    <strong>Email removido:</strong> <span id="userEmail"> <?php echo $_GET['email'] ?></span>
                                </p>
                                <p class="text-white mb-2">
                                    <i class="bi bi-calendar-x me-2"></i>
                                <strong>Data:</strong> <span id="unsubscribeDate"> <?php echo intlFormatDate(date('Y-m-d H:i:s')); ?></span>
                                </p>
                                <p class="text-white mb-0">
                                    <i class="bi bi-shield-check me-2"></i>
                                    <strong>Status:</strong> Processado com sucesso
                                </p>
                            </div>
                        </div>

                        <div class="hero-actions">
                            <a href="/blog" class="btn btn-light btn-lg px-4 me-3 rounded-pill">
                                <i class="bi bi-book me-2"></i>Continuar Lendo
                            </a>
                            <a href="/" class="btn btn-outline-light btn-lg px-4 rounded-pill">
                                <i class="bi bi-house me-2"></i>Voltar ao Início
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Feedback Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold text-dark mb-3">Nos Ajude a Melhorar</h2>
                <p class="lead text-muted">Sua opinião é muito importante para nós. Por que você decidiu se descadastrar?</p>
            </div>

            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="feedback-form p-4 rounded-3">
                        <h5 class="fw-bold mb-4 text-center text-dark">
                            <i class="bi bi-chat-square-heart me-2"></i>Qual foi o motivo principal?
                        </h5>

                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <div class="reason-card p-3 rounded text-center h-100" data-reason="frequency">
                                    <i class="bi bi-clock text-warning mb-2" style="font-size: 2rem;"></i>
                                    <h6 class="fw-semibold text-muted mb-2">Muitos emails</h6>
                                    <p class="small text-muted mb-0">Recebia emails com muita frequência</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="reason-card p-3 rounded text-center h-100" data-reason="content">
                                    <i class="bi bi-file-text text-info mb-2" style="font-size: 2rem;"></i>
                                    <h6 class="fw-semibold text-muted mb-2">Conteúdo não relevante</h6>
                                    <p class="small text-muted mb-0">O conteúdo não atendia minhas necessidades</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="reason-card p-3 rounded text-center h-100" data-reason="level">
                                    <i class="bi bi-graph-up text-success mb-2" style="font-size: 2rem;"></i>
                                    <h6 class="fw-semibold text-muted mb-2">Nível inadequado</h6>
                                    <p class="small text-muted mb-0">Muito básico ou muito avançado para mim</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="reason-card p-3 rounded text-center h-100" data-reason="other">
                                    <i class="bi bi-three-dots text-secondary mb-2" style="font-size: 2rem;"></i>
                                    <h6 class="fw-semibold text-muted mb-2">Outro motivo</h6>
                                    <p class="small text-muted mb-0">Prefiro explicar em minhas palavras</p>
                                </div>
                            </div>
                        </div>

                        <div class="additional-feedback mb-4" style="display: none;">
                            <label for="feedbackText" class="form-label fw-medium">
                                Conte-nos mais sobre sua experiência:
                            </label>
                            <textarea class="form-control" id="feedbackText" rows="4"
                                placeholder="Sua opinião nos ajuda a criar um conteúdo melhor..."></textarea>
                        </div>

                        <div class="text-center">
                            <button type="button" class="btn btn-primary px-4 rounded-pill" id="submitFeedback">
                                <i class="bi bi-send me-2"></i>Enviar Feedback
                            </button>
                            <p class="small text-white-50 mt-2 mb-0">
                                <i class="bi bi-shield-check me-1"></i>
                                Seu feedback é anônimo e nos ajuda a melhorar
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Alternatives Section -->
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold mb-3">Outras Formas de Acompanhar</h2>
                <p class="lead text-white-50">Você ainda pode continuar aprendendo conosco de outras maneiras</p>
            </div>

            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="alternative-card p-4 rounded-3 h-100 text-center bg-white shadow-sm">
                        <div class="alternative-icon mb-3">
                            <i class="bi bi-journal-text text-primary" style="font-size: 3rem;"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Blog Gratuito</h5>
                        <p class="text-white-50 mb-4">
                            Acesse nossos mais de 150 artigos gratuitos sobre inglês,
                            organizados por categoria e nível de dificuldade.
                        </p>
                        <a href="blog" class="btn btn-outline-primary rounded-pill">
                            <i class="bi bi-arrow-right me-2"></i>Explorar Artigos
                        </a>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="alternative-card p-4 rounded-3 h-100 text-center bg-white shadow-sm">
                        <div class="alternative-icon mb-3">
                            <i class="bi bi-people text-success" style="font-size: 3rem;"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Redes Sociais</h5>
                        <p class="text-white-50 mb-4">
                            Siga-nos nas redes sociais para dicas diárias, posts motivacionais
                            e interação com nossa comunidade de estudantes.
                        </p>
                        <div class="social-buttons">
                            <a href="#" class="btn btn-outline-primary btn-sm me-2 mb-2 rounded-pill">
                                <i class="bi bi-facebook"></i> Facebook
                            </a>
                            <a href="#" class="btn btn-outline-info btn-sm me-2 mb-2 rounded-pill">
                                <i class="bi bi-instagram"></i> Instagram
                            </a>
                            <a href="#" class="btn btn-outline-danger btn-sm mb-2 rounded-pill">
                                <i class="bi bi-youtube"></i> YouTube
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="alternative-card p-4 rounded-3 h-100 text-center bg-white shadow-sm">
                        <div class="alternative-icon mb-3">
                            <i class="bi bi-chat-dots text-info" style="font-size: 3rem;"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Comunidade</h5>
                        <p class="text-white-50 mb-4">
                            Participe da nossa comunidade online para trocar experiências,
                            tirar dúvidas e praticar inglês com outros estudantes.
                        </p>
                        <a href="#" class="btn btn-outline-info rounded-pill">
                            <i class="bi bi-arrow-right-circle me-2"></i>Entrar na Comunidade
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistics -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-semibold text-dark mb-3">Você Vai Sentir Falta</h2>
                <p class="lead text-muted">Veja o que nossos leitores estão perdendo ao não receber nossa newsletter</p>
            </div>

            <div class="row text-center g-4">
                <div class="col-md-3 col-6">
                    <div class="stat-item">
                        <div class="stats-counter mb-2">1000+</div>
                        <p class="text-muted fw-semibold">Estudantes Ativos</p>
                        <small class="text-muted">Recebem dicas semanais</small>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-item">
                        <div class="stats-counter mb-2">95%</div>
                        <p class="text-muted fw-semibold">Taxa de Satisfação</p>
                        <small class="text-muted">Dos nossos assinantes</small>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-item">
                        <div class="stats-counter mb-2">50+</div>
                        <p class="text-muted fw-semibold">Dicas Exclusivas</p>
                        <small class="text-muted">Enviadas por ano</small>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-item">
                        <div class="stats-counter mb-2">24h</div>
                        <p class="text-muted fw-semibold">Suporte Rápido</p>
                        <small class="text-muted">Resposta garantida</small>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Resubscribe Section -->
    <section class="py-5 bg-primary text-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h3 class="fw-bold mb-2">
                        <i class="bi bi-arrow-clockwise me-2"></i>Mudou de Ideia?
                    </h3>
                    <p class="mb-0">
                        Se você quiser voltar a receber nossas dicas de inglês, pode se reinscrever
                        a qualquer momento. Prometemos melhorar baseado no seu feedback!
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                    <a href="newsletter" class="btn btn-warning btn-lg px-4 rounded-pill">
                        <i class="bi bi-envelope-heart me-2"></i>Reinscrever-se
                    </a>
                </div>
            </div>
        </div>
    </section>
<?php }); ?>

<?php include 'templates/main.php' ?>
