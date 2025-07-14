<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title><?php echo $title ?></title>
</head>

<body style="margin: 0; padding: 0; background-color: #f1f1f1; font-family: Arial, sans-serif; color: #121212;">
    <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td style="padding: 25px 0px" role="module-content" bgcolor="#f5f5f5">
            </td>
        </tr>
        <!-- Header -->
        <tr>
            <td align="center">
                <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px; background-color: #6c63ff;">
                    <tr>
                        <td align="center" style="padding: 40px 30px;">
                            <h1 style="color: #ffffff; margin: 0; font-size: 26px;">English Tips ✨</h1>
                            <p style="color: #ffffff; margin: 0; font-size: 16px;">Aprenda inglês de forma leve, prática e gratuita</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <!-- Content container -->
        <tr>
            <td align="center" style="padding: 10px 15px 40px 15px;">
                <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px; background: #ffffff; border-radius: 10px; box-shadow: 0 0 15px rgba(0,0,0,0.05);">
                    <tr>
                        <td style="padding: 40px 30px;">
                            <h2 style="color: #2d2d2d; font-size: 22px; margin-top: 0; margin-bottom: 20px;"><?php echo $title ?></h2>
                            <div style="color: #121212; font-size: 16px; line-height: 1.6;">
                                <?php echo $content ?>
                            </div>

                            <!-- CTA Button -->
                            <div style="margin-top: 35px; text-align: center;">
                                <a href="<?php echo $blog_url ?>" style="display: inline-block; margin: 2px 0; background: #6c63ff; color: #ffffff; text-decoration: none; padding: 14px 24px; border-radius: 6px; font-size: 15px; font-weight: bold;">Leia mais no Blog</a>
                                <a href="<?php echo $telegram_url ?>" style="display: inline-block; margin: 2px 0; background: #e94c43; color: #ffffff; text-decoration: none; padding: 14px 24px; border-radius: 6px; font-size: 15px; font-weight: bold;">👉 Comunidade no telegram</a>
                            </div>
                        </td>
                    </tr>

                    <!-- Links de navegação -->
                    <tr>
                        <td style="padding: 25px 20px; background: #f5f5f5; text-align: center; font-size: 13px; color: #666; border-top: 1px solid #ddd;">
                            <p style="margin: 0;">
                                <a href="<?php echo $unsubscribe_url ?>" style="color: #6c63ff; text-decoration: none; margin-right: 20px;">Cancelar inscrição</a>
                                <a href="<?php echo $site_url ?>" style="color: #6c63ff; text-decoration: none; margin-right: 20px;">Visitar o site</a>
                                <a href="<?php echo $blog_url ?>" style="color: #6c63ff; text-decoration: none;">Ver blog</a>
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <!-- Footer -->
        <tr>
            <td align="center" style="padding: 20px; font-size: 12px; color: #999;">
                &copy; <?php echo $year ?> English Tips. Todos os direitos reservados.
            </td>
        </tr>
    </table>
</body>

</html>
