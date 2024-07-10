<?php
function getSectionOptions($options)
{
    /*custom padding*/
    $opt = $options['padding_group']['padding_top'] ? htmlspecialchars($options['padding_group']['padding_top']) : '';
    $opb = $options['padding_group']['padding_bottom'] ? htmlspecialchars($options['padding_group']['padding_bottom']) : '';

    // Vérifier si 'position' est un tableau et le convertir en chaîne
    if (isset($options['bg_group']['position'])) {
        if (is_array($options['bg_group']['position'])) {
            $bg = htmlspecialchars(implode(' ', $options['bg_group']['position']));
        } else {
            $bg = htmlspecialchars($options['bg_group']['position']);
        }
    } else {
        $bg = '';
    }

    $oclasses = 'pt-' . $opt . ' pb-' . $opb . ' ' . $bg;

    $options = [
        'oclasses' => $oclasses,
    ];

    return $options;
}