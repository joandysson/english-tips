<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Novo contato</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style>
        body { font-family: Arial, sans-serif; color: #121212; }
        .container { max-width: 640px; margin: 0 auto; background: #ffffff; border: 1px solid #eee; border-radius: 8px; padding: 24px; }
        h1 { font-size: 20px; margin: 0 0 16px; }
        .item { margin: 8px 0; }
        .label { font-weight: bold; }
        .message { white-space: pre-wrap; }
    </style>
    <!-- Simple, inline-safe styles for better email client compatibility -->
    <!-- Keep structure minimal for broad support -->
    </head>
<body style="background:#f5f5f5; padding:20px;">
    <div class="container" style="background:#fff;border:1px solid #eee;border-radius:8px;padding:24px;max-width:640px;margin:0 auto;">
        <h1 style="font-size:20px;margin:0 0 16px;">Novo contato recebido</h1>
        <div class="item"><span class="label">Nome:</span> <?php echo htmlspecialchars($name ?? '', ENT_QUOTES, 'UTF-8'); ?></div>
        <div class="item"><span class="label">Email:</span> <?php echo htmlspecialchars($email ?? '', ENT_QUOTES, 'UTF-8'); ?></div>
        <div class="item"><span class="label">Mensagem:</span></div>
        <div class="message" style="margin-top:6px;">
            <?php echo $comment ?? ''; ?>
        </div>
        <hr style="border:none;border-top:1px solid #eee;margin:24px 0;"/>
        <div style="font-size:12px;color:#777;">Enviado em <?php echo date('d/m/Y H:i'); ?></div>
    </div>
</body>
</html>

