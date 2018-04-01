<?php
/* ===============================
 * Backend Authentication Redirect
 * =============================== */
$app->add(function ($request, $response, $next) {
	$uri = $uri = $request->getUri()->getPath();

	if (!isset($_SESSION['user'])) {
	    if ($uri != '/login') {
			$_SESSION['returnUrl'] = $uri;

			return $response->withHeader('Location', '/login');
		}
	}

	return $next($request, $response);
});

/* =================
 * Frontend Homepage
 * ================= */
$app->get('/', '\Dashboard:view');

/* ======================
 * Backend Authentication
 * ====================== */
$app->get('/login', '\User:login');
$app->post('/login', '\User:authenticate');
$app->post('/restore-cookie', '\User:restoreCookie');
$app->get('/logout', '\User:logout');

/* ===============
 * Backend Recipes
 * =============== */
$app->get('/recepten', '\Recipe:list');
$app->get('/recepten/wijzigen[/{id}]', '\Recipe:edit');
$app->post('/recepten/opslaan[/{id}]', '\Recipe:save');

/* ===================
 * Backend Ingredients
 * =================== */
$app->get('/ingredienten', '\Ingredient:list');
$app->get('/ingredienten/wijzigen[/{id}]', '\Ingredient:edit');
$app->post('/ingredienten/opslaan[/{id}]', '\Ingredient:save');

/* ==================
 * Backend Quantities
 * ================== */
$app->get('/hoeveelheden', '\Quantity:list');
$app->get('/hoeveelheden/wijzigen[/{id}]', '\Quantity:edit');
$app->post('/hoeveelheden/opslaan[/{id}]', '\Quantity:save');