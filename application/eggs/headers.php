<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

$headers = array(
	'Think of how many stars, planets, and kinds of life there may by in this vast and awesome universe. -- Carl Sagan',
	'If you\'re scientifically literate the world looks very different to you, and that empowers you. -- Neil deGrasse Tyson',
	'Scientists love mysteries, they love not knowing. -- Lawrence Krauss',
	'Don\'t panic. -- Douglas Adams',
	'Question with boldness even the existence of God -- Thomas Jefferson',
	'God was invented to explain mystery. God is always invented to explain those things that you do not understand. -- Richard Feynman',
	'Any one whose disposition leads him to attach more weight to unexplained difficulties than to the explanation of a certain number of facts will certainly reject my theory. -- Charles Darwin',
	'Truth does not ask to be believed. It asks to be tested. -- Dan Barker',
	'There is no sharp line between humans and the rest of the animal kingdom -- it\'s a very wozzy line -- and it\'s getting wozzier all the time -- Jane Goodall',
);

header('X-Quote: ' . $headers[mt_rand(0, count($headers) - 1)]);
