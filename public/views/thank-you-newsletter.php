<?php
$title = 'Obrigado por se Inscrever!';
$description = 'Sua inscrição foi realizada com sucesso! Em breve, você receberá dicas incríveis de inglês no seu e-mail.';
$keywords = 'obrigado, inscrição confirmada, newsletter, English Tips';
?>

<?php $headExtra = section(function () { ?>
    <style>
        .thank-you-hero {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
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
            color: var(--accent-color);
            animation: successPulse 2s ease-in-out infinite;
            text-shadow: 0 4px 20px rgba(255, 217, 61, 0.4);
        }

        @keyframes successPulse {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.1);
            }
        }

        .floating-elements {
            position: absolute;
            width: 100%;
            height: 100%;
            pointer-events: none;
        }

        .floating-element {
            position: absolute;
            animation: floatAround 8s ease-in-out infinite;
            opacity: 0.6;
        }

        .floating-element:nth-child(1) {
            top: 20%;
            left: 10%;
            animation-delay: 0s;
        }

        .floating-element:nth-child(2) {
            top: 60%;
            right: 15%;
            animation-delay: 2s;
        }

        .floating-element:nth-child(3) {
            bottom: 30%;
            left: 20%;
            animation-delay: 4s;
        }

        .floating-element:nth-child(4) {
            top: 40%;
            right: 30%;
            animation-delay: 6s;
        }

        @keyframes floatAround {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            25% {
                transform: translateY(-20px) rotate(5deg);
            }

            50% {
                transform: translateY(-10px) rotate(-5deg);
            }

            75% {
                transform: translateY(-15px) rotate(3deg);
            }
        }

        .next-steps-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }

        .next-steps-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .step-number {
            width: 40px;
            height: 40px;
            background: var(--accent-color);
            color: var(--dark-color);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 1.2rem;
        }

        .countdown-timer {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
        }

        .timer-digit {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 8px;
            padding: 0.5rem;
            min-width: 50px;
            text-align: center;
            font-weight: bold;
            font-size: 1.5rem;
        }

        @media (max-width: 768px) {
            .success-icon {
                font-size: 5rem;
            }

            .floating-element {
                display: none;
            }

            .timer-digit {
                font-size: 1.2rem;
                min-width: 40px;
            }
        }
    </style>
<?php }); ?>

<?php $content = section(function () use ($data) { ?>
    <!-- Thank You Hero -->
    <section class="thank-you-hero">
        <div class="floating-elements">
            <div class="floating-element">
                <i class="bi bi-envelope-heart text-warning" style="font-size: 2rem;"></i>
            </div>
            <div class="floating-element">
                <i class="bi bi-star-fill text-warning" style="font-size: 1.5rem;"></i>
            </div>
            <div class="floating-element">
                <i class="bi bi-book text-warning" style="font-size: 1.8rem;"></i>
            </div>
            <div class="floating-element">
                <i class="bi bi-lightbulb text-warning" style="font-size: 1.6rem;"></i>
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
                            Parabéns! 🎉
                        </h1>

                        <h2 class="display-6 fw-semibold text-white mb-4">
                            Você agora faz parte da nossa comunidade!
                        </h2>

                        <p class="lead text-white-50 mb-5">
                            Sua inscrição na newsletter foi confirmada com sucesso. Em breve você receberá
                            nossa primeira dica de inglês diretamente no seu email.
                        </p>

                        <!-- Countdown Timer -->
                        <div class="countdown-timer p-4 rounded-3 mb-5 d-inline-block">
                            <h5 class="text-white mb-3">
                                <i class="bi bi-clock me-2"></i>Primeira dica chegará em:
                            </h5>
                            <div class="d-flex justify-content-center align-items-center gap-3">
                                <div class="timer-digit text-white" id="hours">24</div>
                                <span class="text-white">:</span>
                                <div class="timer-digit text-white" id="minutes">00</div>
                                <span class="text-white">:</span>
                                <div class="timer-digit text-white" id="seconds">00</div>
                            </div>
                            <div class="d-flex justify-content-center gap-4 mt-2">
                                <small class="text-white-50">Horas</small>
                                <small class="text-white-50">Minutos</small>
                                <small class="text-white-50">Segundos</small>
                            </div>
                        </div>

                        <div class="hero-actions">
                            <a href="blog" class="btn btn-warning btn-lg px-4 me-3 rounded-pill">
                                <i class="bi bi-book me-2"></i>Explorar Artigos
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

    <!-- Next Steps -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold text-dark mb-3">Próximos Passos</h2>
                <p class="lead text-muted">Vamos começar sua jornada de aprendizado agora mesmo!</p>
            </div>

            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="next-steps-card p-4 rounded-3 h-100 text-center">
                        <div class="step-number mx-auto mb-3">1</div>
                        <h5 class="fw-bold mb-3 text-dark">
                            <i class="bi bi-envelope-check text-primary me-2"></i>
                            Verifique seu Email
                        </h5>
                        <p class="text-muted mb-3">
                            Enviamos um email de confirmação. Se não encontrar na caixa de entrada,
                            verifique a pasta de spam ou promoções.
                        </p>
                        <div class="email-tip p-3 bg-light rounded">
                            <small class="text-muted">
                                <i class="bi bi-lightbulb me-1"></i>
                                <strong>Dica:</strong> Adicione nosso email aos seus contatos para
                                garantir que receba todas as dicas!
                            </small>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="next-steps-card p-4 rounded-3 h-100 text-center">
                        <div class="step-number mx-auto mb-3">2</div>
                        <h5 class="fw-bold mb-3 text-dark">
                            <i class="bi bi-book text-success me-2"></i>
                            Explore Nosso Conteúdo
                        </h5>
                        <p class="text-muted mb-3">
                            Enquanto aguarda a primeira newsletter, explore nossos artigos gratuitos
                            organizados por categoria e nível de dificuldade.
                        </p>
                        <a href="/blog" class="btn btn-outline-success rounded-pill">
                            <i class="bi bi-arrow-right me-2"></i>Ver Todos os Artigos
                        </a>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="next-steps-card p-4 rounded-3 h-100 text-center">
                        <div class="step-number mx-auto mb-3">3</div>
                        <h5 class="fw-bold mb-3 text-dark">
                            <i class="bi bi-people text-info me-2"></i>
                            Junte-se à Comunidade
                        </h5>
                        <p class="text-muted mb-3">
                            Siga-nos nas redes sociais para dicas diárias, interação com outros
                            estudantes e conteúdo exclusivo.
                        </p>
                        <div class="social-links">
                            <a href="#" class="btn btn-outline-primary btn-sm me-2 rounded-pill">
                                <i class="bi bi-facebook"></i>
                            </a>
                            <a href="#" class="btn btn-outline-info btn-sm me-2 rounded-pill">
                                <i class="bi bi-instagram"></i>
                            </a>
                            <a href="#" class="btn btn-outline-danger btn-sm rounded-pill">
                                <i class="bi bi-youtube"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- What to Expect -->
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold mb-3">O que Esperar da Newsletter</h2>
                <p class="lead text-white-50">Conteúdo exclusivo pensado especialmente para você</p>
            </div>

            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="expectation-item d-flex align-items-start mb-4">
                        <div class="expectation-icon me-3">
                            <i class="bi bi-calendar-week text-primary" style="font-size: 2rem;"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-2">Dicas Semanais</h5>
                            <p class="text-white-50 mb-0">
                                Toda quarta-feira você receberá uma dica prática de inglês,
                                com exemplos reais e exercícios para praticar.
                            </p>
                        </div>
                    </div>

                    <div class="expectation-item d-flex align-items-start mb-4">
                        <div class="expectation-icon me-3">
                            <i class="bi bi-file-earmark-pdf text-success" style="font-size: 2rem;"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-2">Materiais Exclusivos</h5>
                            <p class="text-white-50 mb-0">
                                PDFs com exercícios, listas de vocabulário e guias de gramática
                                que você não encontra no blog.
                            </p>
                        </div>
                    </div>

                    <div class="expectation-item d-flex align-items-start">
                        <div class="expectation-icon me-3">
                            <i class="bi bi-lightbulb text-warning" style="font-size: 2rem;"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-2">Dicas de Estudo</h5>
                            <p class="text-white-50 mb-0">
                                Métodos comprovados para acelerar seu aprendizado e
                                técnicas de memorização eficazes.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="newsletter-preview p-4 bg-light rounded-3">
                        <h6 class="fw-bold text-primary mb-3">
                            <i class="bi bi-envelope me-2"></i>Prévia da Newsletter
                        </h6>
                        <div class="email-mockup bg-white p-3 rounded border">
                            <div class="email-header mb-3 pb-2 border-bottom">
                                <small class="text-white-50">De: English Tips &lt;dicas@englishtips.com.br&gt;</small><br>
                                <strong>Assunto: 🚀 Sua primeira dica de inglês chegou!</strong>
                            </div>
                            <div class="email-body">
                                <p class="mb-2"><strong>Olá, [Seu Nome]!</strong></p>
                                <p class="small text-white-50 mb-2">
                                    Bem-vindo(a) à nossa comunidade! Hoje vamos aprender sobre...
                                </p>
                                <div class="tip-preview p-2 bg-primary text-white rounded small mb-2">
                                    💡 <strong>Dica da Semana:</strong> Como usar "make" vs "do"
                                </div>
                                <p class="small text-white-50 mb-0">
                                    + Exercício prático em PDF anexo
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Popular Articles -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold text-dark mb-3">Comece Agora com Nossos Artigos Populares</h2>
                <p class="lead text-muted">Enquanto aguarda a newsletter, que tal começar a estudar?</p>
            </div>

            <div class="row g-4">
                <?php foreach ($data['data'] as $value) { ?>
                    <div class="col-lg-4">
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
                                <a href="article.html" class="btn btn-outline-primary btn-sm rounded-pill">
                                    <i class="bi bi-arrow-right me-2"></i>Ler Agora
                                </a>
                            </div>
                        </article>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>

<?php }); ?>

<?php include 'templates/main.php' ?>
