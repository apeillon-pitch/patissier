<?php
function get_section_options($options)
{
  /*custom padding*/
  $opt = $options['padding_group']['padding_top'] ? htmlspecialchars($options['padding_group']['padding_top']) : '';
  $opb = $options['padding_group']['padding_bottom'] ? htmlspecialchars($options['padding_group']['padding_bottom']) : '';

  $oclasses = 'pt-' . $opt . ' pb-' . $opb;

  $options = [
    'oclasses' => $oclasses,
  ];

  return $options;
}