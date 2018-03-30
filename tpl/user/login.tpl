{% extends 'layout/default.tpl' %}

{% block title %}Inloggen{% endblock %}

{% block menu %}{% endblock %}

{% block content %}
<div class="container theme-showcase" role="main">
    <div class="row">
        <div class="col-md-2">
            <h1>Inloggen</h1>

            <form method="post" action="/login">
                <p><input type="text" id="user" name="user" value="" placeholder="Email" required="required"></p>
                <p><input type="password" id="pass" name="pass" value="" placeholder="Wachtwoord" required="required"></p>

                <p class="submit"><input type="submit" name="commit" value="Login"></p>
            </form>
        </div>
    </div>
</div>

{% endblock %}