<?php

namespace Server;

function route_trim(string $route) : string {
	return trim($route, '/ ');
}

function route_split(string $route) : array {
	return explode('/', route_trim($route));
}

function route_arguments(string $route) : array {
	return array_map(
		function (string $r) : bool { return $r === "<argument>"; },
		route_split($route)
	);
}

/* Node constructor */
function Node($val = null, array $children = []) {
	return (object)[
		"val" => $val,
		"children" => $children
	];
}

/* Resolution constructor */
function Resolution($controller, array $args = [], bool $failed = false) {
	return (object)[
		"value" => $controller,
		"route_args" => $args,
		"failed" => $failed
	];
}

function not_resolved() {
	return Resolution("", [], true);
}

?>