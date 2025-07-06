<?php
$title = 'Fale Conosco';
$description = 'Quer tirar dúvidas, dar sugestões ou relatar algo? Fale com a equipe do English Tips. Adoramos ouvir você!';
$keywords = 'contato, fale conosco, suporte, ajuda, English Tips';
?>

<?php $headExtra = section(function () { ?>
<?php }); ?>

<?php $content = section(function () { ?>
    <!-- Header -->
    <section class="page-header py-5 bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h1 class="display-4 fw-bold mb-3">Entre em Contato</h1>
                    <p class="lead text-white-50">Tem alguma dúvida, sugestão ou feedback? Adoramos ouvir de você!</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Content -->
    <section class="py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-8">
                    <div class="contact-form">
                        <h3 class="fw-bold mb-4">Envie sua Mensagem</h3>
                        <form id="contactForm" method="post" action="/contact">
                            <div class="mb-3">
                                <label for="firstName" class="form-label fw-medium">Nome *</label>
                                <input type="text" class="form-control form-control-lg" id="firstName" name="name" value="" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label fw-medium">E-mail *</label>
                                <input type="email" class="form-control form-control-lg" id="email" name="email" value="" required>
                            </div>
                            <div class="mb-3">
                                <label for="subject" class="form-label fw-medium">Assunto *</label>
                                <select class="form-select form-select-lg" id="subject" name="category" required>
                                    <option value="">Selecione um assunto</option>
                                    <option value="duvida">Dúvida sobre conteúdo</option>
                                    <option value="sugestao">Sugestão de artigo</option>
                                    <option value="feedback">Feedback</option>
                                    <option value="parceria">Proposta de parceria</option>
                                    <option value="erro">Relatar erro no site</option>
                                    <option value="outro">Outro</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="message" class="form-label fw-medium">Mensagem *</label>
                                <textarea class="form-control form-control-lg" id="message" rows="6" name="comment"
                                    placeholder="Conte-nos como podemos ajudar..." required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg px-4 rounded-pill">
                                <i class="bi bi-send me-2"></i>Enviar Mensagem
                            </button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="contact-info">
                        <h3 class="fw-bold mb-4">Outras Formas de Contato</h3>

                        <div class="contact-item d-flex mb-4">
                            <div class="contact-icon me-3">
                                <i class="bi bi-envelope-fill text-primary" style="font-size: 1.5rem;"></i>
                            </div>
                            <div>
                                <h6 class="fw-semibold mb-1">E-mail</h6>
                                <p class="text-white-50 mb-0">contato@englishtips.com.br</p>
                                <small class="text-white-50">Respondemos em até 24h</small>
                            </div>
                        </div>

                        <div class="contact-item d-flex mb-4">
                            <div class="contact-icon me-3">
                                <i class="bi bi-clock-fill text-primary" style="font-size: 1.5rem;"></i>
                            </div>
                            <div>
                                <h6 class="fw-semibold mb-1">Horário de Atendimento</h6>
                                <p class="text-white-50 mb-0">Segunda a Sexta</p>
                                <small class="text-white-50">09:00 às 18:00</small>
                            </div>
                        </div>

                        <div class="contact-item d-flex mb-4">
                            <div class="contact-icon me-3">
                                <i class="bi bi-geo-alt-fill text-primary" style="font-size: 1.5rem;"></i>
                            </div>
                            <div>
                                <h6 class="fw-semibold mb-1">Localização</h6>
                                <p class="text-white-50 mb-0">São Paulo, SP</p>
                                <small class="text-white-50">Brasil</small>
                            </div>
                        </div>

                        <div class="social-section mt-5">
                            <h5 class="fw-bold mb-3">Siga-nos nas Redes Sociais</h5>
                            <div class="social-links">
                                <a href="#" class="btn btn-outline-primary btn-lg me-2 mb-2">
                                    <i class="bi bi-facebook"></i>
                                </a>
                                <a href="#" class="btn btn-outline-primary btn-lg me-2 mb-2">
                                    <i class="bi bi-instagram"></i>
                                </a>
                                <a href="#" class="btn btn-outline-primary btn-lg me-2 mb-2">
                                    <i class="bi bi-youtube"></i>
                                </a>
                                <a href="#" class="btn btn-outline-primary btn-lg me-2 mb-2">
                                    <i class="bi bi-linkedin"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-5 bg-dark">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold mb-3">Perguntas Frequentes</h2>
                <p class="lead text-white-50">Talvez sua dúvida já tenha sido respondida aqui</p>
            </div>
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="accordion" id="faqAccordion">
                        <div class="accordion-item mb-3 border-0 shadow-sm">
                            <h2 class="accordion-header" id="faq1">
                                <button class="accordion-button fw-semibold" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                                    Como posso sugerir um tópico para um artigo?
                                </button>
                            </h2>
                            <div id="collapse1" class="accordion-collapse collapse show" aria-labelledby="faq1"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Você pode sugerir tópicos através do formulário de contato acima, selecionando
                                    "Sugestão de artigo" como assunto. Adoramos receber sugestões da nossa comunidade
                                    e consideramos todas as ideias enviadas.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item mb-3 border-0 shadow-sm">
                            <h2 class="accordion-header" id="faq2">
                                <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                                    Como posso receber notificações de novos artigos?
                                </button>
                            </h2>
                            <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="faq2"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Você pode se inscrever na nossa newsletter clicando no botão "Newsletter" no menu
                                    ou visitando a página dedicada. Enviamos resumos semanais com os melhores conteúdos
                                    e dicas exclusivas.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item mb-3 border-0 shadow-sm">
                            <h2 class="accordion-header" id="faq3">
                                <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                                    Todo o conteúdo é realmente gratuito?
                                </button>
                            </h2>
                            <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="faq3"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Sim! Todo o nosso conteúdo é 100% gratuito. Nosso objetivo é democratizar o ensino
                                    de inglês no Brasil. Nunca cobramos pelo acesso aos artigos, dicas ou exercícios
                                    disponíveis no site.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item mb-3 border-0 shadow-sm">
                            <h2 class="accordion-header" id="faq4">
                                <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                                    Posso compartilhar os artigos nas redes sociais?
                                </button>
                            </h2>
                            <div id="collapse4" class="accordion-collapse collapse" aria-labelledby="faq4"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Claro! Incentivamos o compartilhamento do nosso conteúdo. Cada artigo possui
                                    botões de compartilhamento para as principais redes sociais. Quanto mais pessoas
                                    tiverem acesso ao conhecimento, melhor!
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item mb-3 border-0 shadow-sm">
                            <h2 class="accordion-header" id="faq5">
                                <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                                    Com que frequência vocês publicam novos conteúdos?
                                </button>
                            </h2>
                            <div id="collapse5" class="accordion-collapse collapse" aria-labelledby="faq5"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Publicamos pelo menos 2-3 artigos novos por semana, sempre focados em diferentes
                                    aspectos do aprendizado de inglês. Nosso cronograma inclui conteúdos de gramática,
                                    vocabulário, dicas de estudo e muito mais.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-5 bg-primary text-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h3 class="fw-bold mb-2">Não encontrou o que procurava?</h3>
                    <p class="mb-0">
                        Entre em nossa comunidade no WhatsApp e tire suas dúvidas diretamente
                        com outros estudantes e professores.
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                    <a href="#" class="btn btn-warning btn-lg px-4 rounded-pill">
                        <i class="bi bi-whatsapp me-2"></i>Entrar no Grupo
                    </a>
                </div>
            </div>
        </div>
    </section>

<?php }); ?>

<?php $scriptsExtra = section(function () { ?>
    <script src="<?php echo asset('js/contact.js?v=0.2') ?>"></script>
<?php }); ?>


<?php include 'templates/main.php' ?>
