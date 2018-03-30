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
$app->get('/', '\Home:view');

/* ================
 * Frontend Recipes
 * ================ */
$app->get('/recept/{path}', '\Recipe:view');

/* =================
 * Backend Dashboard
 * ================= */
$app->get('/achterkant', '\Dashboard:view');

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
$app->get('/achterkant/recepten', '\Recipe:admin_list');
$app->get('/achterkant/recepten/wijzigen[/{id}]', '\Recipe:admin_edit');
$app->post('/achterkant/recepten/opslaan[/{id}]', '\Recipe:admin_save');

/* ===================
 * Backend Ingredients
 * =================== */
$app->get('/achterkant/ingredienten', '\Ingredient:admin_list');
$app->get('/achterkant/ingredienten/wijzigen[/{id}]', '\Ingredient:admin_edit');
$app->post('/achterkant/ingredienten/opslaan[/{id}]', '\Ingredient:admin_save');

/* ==================
 * Backend Quantities
 * ================== */
$app->get('/achterkant/hoeveelheden', '\Quantity:admin_list');
$app->get('/achterkant/hoeveelheden/wijzigen[/{id}]', '\Quantity:admin_edit');
$app->post('/achterkant/hoeveelheden/opslaan[/{id}]', '\Quantity:admin_save');