<?php
include('header.php');
$data_nascimento = DateTime::createFromFormat('Y-m-d', $_POST['data_nascimento']);

//se a data não for válida imprima para mim...
if (!$data_nascimento) {
    echo ("<p>Data é inválida</p> <a href='index.php'>Voltar</a>");
    exit;
}

//função que irá chamar o arquivo xml 
$signos = simplexml_load_file('signos.xml');
function verificar_signos($data, $inicio, $fim)
{
    $ano = $data->format('Y');
    $data_inicio = DateTime::createFromFormat('d/m/Y', "$inicio/$ano");
    $data_fim = DateTime::createFromFormat('d/m/Y', "$fim/$ano");
    if ($data_inicio > $data_fim) $data->format('m') == '01' ? $data_inicio->modify('-1 year') : $data_fim->modify('+1 year');
    return ($data >= $data_inicio && $data <= $data_fim);
}

$signo_encontrado = null;

foreach ($signos as $signo) {
    if (verificar_signos($data_nascimento, $signo->dataInicio, $signo->dataFim)) {
        $signo_encontrado = $signo;
        break;
    }
}

// Função para obter a classe CSS do signo
function obterClasseSigno($nomeSigno)
{
    $classes = [
        'Áries' => 'signo-aries',
        'Touro' => 'signo-touro',
        'Gêmeos' => 'signo-gemeos',
        'Câncer' => 'signo-cancer',
        'Leão' => 'signo-leao',
        'Virgem' => 'signo-virgem',
        'Libra' => 'signo-libra',
        'Escorpião' => 'signo-escorpiao',
        'Sagitário' => 'signo-sagitario',
        'Capricórnio' => 'signo-capricornio',
        'Aquário' => 'signo-aquario',
        'Peixes' => 'signo-peixes'
    ];

    return isset($classes[(string)$nomeSigno]) ? $classes[(string)$nomeSigno] : 'signo-default';
}

// Função para obter o ícone do signo
function obterIconeSigno($nomeSigno)
{
    $icones = [
        'Áries' => '♈',
        'Touro' => '♉',
        'Gêmeos' => '♊',
        'Câncer' => '♋',
        'Leão' => '♌',
        'Virgem' => '♍',
        'Libra' => '♎',
        'Escorpião' => '♏',
        'Sagitário' => '♐',
        'Capricórnio' => '♑',
        'Aquário' => '♒',
        'Peixes' => '♓'
    ];

    return isset($icones[(string)$nomeSigno]) ? $icones[(string)$nomeSigno] : '⭐';
}
?>

<body>
    <div class="container-fluid main-container d-flex align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="content-wrapper">
            <?php if ($signo_encontrado): ?>
                <?php
                $classeSigno = obterClasseSigno($signo_encontrado->signoNome);
                $iconeSigno = obterIconeSigno($signo_encontrado->signoNome);
                ?>
                <div class="signo-card <?= $classeSigno ?>">
                    <div class="signo-nome">
                        <?= $iconeSigno ?> <?= $signo_encontrado->signoNome ?>
                    </div>
                    <div class="signo-descricao">
                        <?= $signo_encontrado->descricao ?>
                    </div>
                    <div class="signo-data">
                        <small style="opacity: 0.8; font-size: 1rem;">
                            📅 <?= $signo_encontrado->dataInicio ?> - <?= $signo_encontrado->dataFim ?>
                        </small>
                    </div>
                    <div style="margin-top: 25px;">
                        <a href='index.php' class="btn btn-voltar">
                            ← Voltar para Consulta
                        </a>
                    </div>
                </div>
            <?php else: ?>
                <div class="signo-card" style="background: linear-gradient(135deg, #ff7675, #d63031); color: white;">
                    <div class="signo-nome">⚠️ Ops!</div>
                    <div class="signo-descricao">
                        Data inválida! Não foi possível encontrar um signo correspondente.
                    </div>
                    <div style="margin-top: 25px;">
                        <a href='index.php' class="btn btn-voltar">
                            ← Tentar Novamente
                        </a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>