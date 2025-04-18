<?php

$pluginDir = dirname(__DIR__, 2); // Chemin vers la racine du plugin
$projectDir = getcwd(); // Répertoire de travail courant (racine du projet)

$patchFile = $pluginDir . 'src/Installer/majerome-workshop-plugin-sylius-1.13.patch';

echo "Application du patch Majerome Workshop Plugin...\n";

if (!file_exists($patchFile)) {
    echo "Erreur: Fichier patch non trouvé: {$patchFile}\n";
    exit(1);
}

$command = "git apply {$patchFile}";
$output = [];
$returnCode = 0;

exec($command, $output, $returnCode);

if ($returnCode === 0) {
    echo "Patch appliqué avec succès!\n";
} else {
    echo "Erreur lors de l'application du patch:\n";
    echo implode("\n", $output) . "\n";
    exit($returnCode);
}
