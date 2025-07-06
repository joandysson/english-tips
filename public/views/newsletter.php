<?php
$title = __('');
$description = __('');
$keywords = __('');
?>

<?php $headExtra = section(function () { ?>

<?php }); ?>

<?php $content = section(function () { ?>

    <!-- Hero Section -->
    <section class="newsletter-hero py-5 mt-5">
        <div class="container">
            <div class="row align-items-center min-vh-75">
                <div class="col-lg-6">
                    <div class="hero-content">
                        <div class="newsletter-badge mb-3">
                            <span class="badge bg-warning px-3 py-2 rounded-pill fw-semibold">
                                <i class="bi bi-envelope-heart me-2"></i>Newsletter Gratuita
                            </span>
                        </div>
                        <h1 class="display-4 fw-bold mb-4">
                            Receba dicas de inglês <span class="text-primary">toda semana</span>
                            no seu email
                        </h1>
                        <p class="lead text-white-50 mb-4">
                            Junte-se a mais de <strong>1.000 estudantes</strong> que já recebem nosso
                            conteúdo exclusivo, exercícios práticos e dicas que realmente funcionam
                            para acelerar seu aprendizado.
                        </p>
                        <div class="newsletter-features mb-4">
                            <div class="feature-item d-flex align-items-center mb-2">
                                <i class="bi bi-check-circle-fill text-success me-3"></i>
                                <span>Conteúdo exclusivo toda semana</span>
                            </div>
                            <div class="feature-item d-flex align-items-center mb-2">
                                <i class="bi bi-check-circle-fill text-success me-3"></i>
                                <span>Exercícios práticos em PDF</span>
                            </div>
                            <div class="feature-item d-flex align-items-center mb-2">
                                <i class="bi bi-check-circle-fill text-success me-3"></i>
                                <span>Dicas de pronúncia e gramática</span>
                            </div>
                            <div class="feature-item d-flex align-items-center">
                                <i class="bi bi-check-circle-fill text-success me-3"></i>
                                <span>100% gratuito, sem spam</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="newsletter-form-container p-5 bg-white rounded-3 shadow-lg">
                        <div class="text-center mb-4">
                            <i class="bi bi-envelope-heart text-primary" style="font-size: 3rem;"></i>
                            <h3 class="fw-bold mt-3 mb-2">Quero Receber as Dicas!</h3>
                            <p class="text-white-50 mb-0">Preencha os dados abaixo e comece hoje mesmo</p>
                        </div>

                        <form id="newsletterForm" method="post" action="/newsletter">
                            <div class="mb-3">
                                <label for="firstName" class="form-label fw-medium">Nome *</label>
                                <input type="text" class="form-control form-control-lg" id="firstName"
                                    placeholder="Seu primeiro nome" name="name" value="" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label fw-medium">E-mail *</label>
                                <input type="email" class="form-control form-control-lg" id="email"
                                    placeholder="seu@email.com" name="email" value="" required>
                            </div>
                            <div class="mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="privacy" required>
                                    <label class="form-check-label text-white-50" for="privacy">
                                        Concordo em receber emails com dicas de inglês e aceito os
                                        <a href="/privacy-policy" class="text-primary">termos de privacidade</a>
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg w-100 rounded-pill fw-semibold">
                                <i class="bi bi-envelope-check me-2"></i>Quero Receber Dicas Grátis!
                            </button>
                        </form>

                        <div class="text-center mt-3">
                            <small class="text-white-50">
                                <i class="bi bi-shield-check me-1"></i>
                                Seus dados estão seguros conosco
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- What You'll Receive -->
    <section class="py-5 bg-dark">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold mb-3">O que você vai receber</h2>
                <p class="lead text-white-50">Conteúdo pensado especialmente para acelerar seu aprendizado</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="benefit-card text-center p-4 h-100 bg-white rounded shadow-sm">
                        <div class="benefit-icon mb-3">
                            <i class="bi bi-journal-text text-primary" style="font-size: 3rem;"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Artigos Exclusivos</h5>
                        <p class="text-white-50">
                            Conteúdo que você não encontra no blog, com dicas avançadas
                            e métodos de estudo testados e aprovados.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="benefit-card text-center p-4 h-100 bg-white rounded shadow-sm">
                        <div class="benefit-icon mb-3">
                            <i class="bi bi-file-earmark-pdf text-primary" style="font-size: 3rem;"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Exercícios em PDF</h5>
                        <p class="text-white-50">
                            Atividades práticas para você imprimir e praticar,
                            com gabarito comentado para tirar todas as dúvidas.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="benefit-card text-center p-4 h-100 bg-white rounded shadow-sm">
                        <div class="benefit-icon mb-3">
                            <i class="bi bi-mic text-primary" style="font-size: 3rem;"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Dicas de Pronúncia</h5>
                        <p class="text-white-50">
                            Guias de pronúncia com áudios e técnicas para você
                            falar inglês com mais confiança e naturalidade.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="benefit-card text-center p-4 h-100 bg-white rounded shadow-sm">
                        <div class="benefit-icon mb-3">
                            <i class="bi bi-calendar-week text-primary" style="font-size: 3rem;"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Planos de Estudo</h5>
                        <p class="text-white-50">
                            Cronogramas semanais personalizados para seu nível,
                            com metas claras e acompanhamento do progresso.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="benefit-card text-center p-4 h-100 bg-white rounded shadow-sm">
                        <div class="benefit-icon mb-3">
                            <i class="bi bi-book text-primary" style="font-size: 3rem;"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Listas de Vocabulário</h5>
                        <p class="text-white-50">
                            Palavras e expressões organizadas por tema,
                            com exemplos práticos e técnicas de memorização.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="benefit-card text-center p-4 h-100 bg-white rounded shadow-sm">
                        <div class="benefit-icon mb-3">
                            <i class="bi bi-lightning text-primary" style="font-size: 3rem;"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Dicas Rápidas</h5>
                        <p class="text-white-50">
                            Truques e macetes para acelerar seu aprendizado,
                            baseados em anos de experiência no ensino de inglês.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold mb-3">O que nossos leitores dizem</h2>
                <p class="lead text-white-50">Depoimentos reais de quem já faz parte da nossa comunidade</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="testimonial-card p-4 h-100 bg-dark rounded">
                        <div class="stars mb-3">
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                        </div>
                        <p class="mb-3">
                            "As dicas da newsletter são incríveis! Em 3 meses consegui melhorar muito
                            minha conversação. Os exercícios em PDF são um diferencial."
                        </p>
                        <div class="testimonial-author d-flex align-items-center">
                            <img src="https://images.pexels.com/photos/3184339/pexels-photo-3184339.jpeg?auto=compress&cs=tinysrgb&w=100"
                                alt="Maria Silva" class="rounded-circle me-3" style="width: 50px; height: 50px; object-fit: cover;">
                            <div>
                                <h6 class="fw-semibold mb-0">Maria Silva</h6>
                                <small class="text-white-50">Estudante de Administração</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="testimonial-card p-4 h-100 bg-dark rounded">
                        <div class="stars mb-3">
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                        </div>
                        <p class="mb-3">
                            "Finalmente encontrei conteúdo de qualidade e gratuito! Os planos de estudo
                            me ajudaram a organizar minha rotina e ver resultados reais."
                        </p>
                        <div class="testimonial-author d-flex align-items-center">
                            <img src="https://images.pexels.com/photos/3184418/pexels-photo-3184418.jpeg?auto=compress&cs=tinysrgb&w=100"
                                alt="João Santos" class="rounded-circle me-3" style="width: 50px; height: 50px; object-fit: cover;">
                            <div>
                                <h6 class="fw-semibold mb-0">João Santos</h6>
                                <small class="text-white-50">Desenvolvedor</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="testimonial-card p-4 h-100 bg-dark rounded">
                        <div class="stars mb-3">
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                        </div>
                        <p class="mb-3">
                            "As dicas de pronúncia mudaram minha forma de falar inglês. Agora tenho
                            muito mais confiança nas apresentações no trabalho."
                        </p>
                        <div class="testimonial-author d-flex align-items-center">
                            <img src="https://images.pexels.com/photos/3184460/pexels-photo-3184460.jpeg?auto=compress&cs=tinysrgb&w=100"
                                alt="Ana Costa" class="rounded-circle me-3" style="width: 50px; height: 50px; object-fit: cover;">
                            <div>
                                <h6 class="fw-semibold mb-0">Ana Costa</h6>
                                <small class="text-white-50">Gerente de Marketing</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ -->
    <section class="py-5 bg-dark">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold mb-3">Dúvidas Frequentes</h2>
                <p class="lead text-white-50">Tudo que você precisa saber sobre nossa newsletter</p>
            </div>
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="accordion" id="newsletterFAQ">
                        <div class="accordion-item mb-3 border-0 shadow-sm">
                            <h2 class="accordion-header" id="faq1">
                                <button class="accordion-button fw-semibold" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                                    Com que frequência vocês enviam emails?
                                </button>
                            </h2>
                            <div id="collapse1" class="accordion-collapse collapse show" aria-labelledby="faq1"
                                data-bs-parent="#newsletterFAQ">
                                <div class="accordion-body">
                                    Enviamos um email por semana, sempre às quartas-feiras pela manhã.
                                    Ocasionalmente, podemos enviar conteúdo extra especial, mas nunca
                                    mais que 2 emails por semana.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item mb-3 border-0 shadow-sm">
                            <h2 class="accordion-header" id="faq2">
                                <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                                    Posso cancelar a inscrição a qualquer momento?
                                </button>
                            </h2>
                            <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="faq2"
                                data-bs-parent="#newsletterFAQ">
                                <div class="accordion-body">
                                    Claro! Você pode cancelar sua inscrição a qualquer momento clicando
                                    no link "descadastrar" que está presente em todos os nossos emails.
                                    O processo é instantâneo e sem complicações.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item mb-3 border-0 shadow-sm">
                            <h2 class="accordion-header" id="faq3">
                                <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                                    Vocês compartilham meu email com terceiros?
                                </button>
                            </h2>
                            <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="faq3"
                                data-bs-parent="#newsletterFAQ">
                                <div class="accordion-body">
                                    Jamais! Seus dados são 100% seguros conosco. Não compartilhamos,
                                    vendemos ou cedemos informações pessoais para terceiros. Usamos
                                    seus dados apenas para enviar nosso conteúdo educacional.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item mb-3 border-0 shadow-sm">
                            <h2 class="accordion-header" id="faq4">
                                <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                                    O conteúdo é adequado para meu nível?
                                </button>
                            </h2>
                            <div id="collapse4" class="accordion-collapse collapse" aria-labelledby="faq4"
                                data-bs-parent="#newsletterFAQ">
                                <div class="accordion-body">
                                    Sim! Nosso conteúdo é pensado para todos os níveis. Sempre incluímos
                                    explicações básicas e dicas avançadas no mesmo email, para que
                                    iniciantes e avançados possam aproveitar.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Final CTA -->
    <section class="py-5 bg-primary text-white">
        <div class="container">
            <div class="text-center">
                <h2 class="display-5 fw-bold mb-3">Pronto para acelerar seu inglês?</h2>
                <p class="lead mb-4">
                    Junte-se a mais de 1.000 estudantes que já transformaram seu aprendizado
                    com nossas dicas exclusivas.
                </p>
                <a href="#newsletterForm" class="btn btn-warning btn-lg px-5 rounded-pill fw-semibold">
                    <i class="bi bi-envelope-heart me-2"></i>Quero Receber as Dicas Agora!
                </a>
                <div class="mt-3">
                    <small class="text-light">
                        <i class="bi bi-shield-check me-1"></i>
                        100% gratuito • Sem spam • Cancele quando quiser
                    </small>
                </div>
            </div>
        </div>
    </section>
<?php }); ?>

<?php include 'templates/main.php' ?>
