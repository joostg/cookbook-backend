{% extends 'layout/dashboard.tpl' %}

{% block title %}Recept editor{% endblock %}

{% block content %}
    <div class="container theme-showcase" role="main">
        <div class="col-md-12">
            <h1>Recept editor</h1>

            <form method="post" action="/achterkant/recepten/opslaan" id="recipe">
                <div class="col-md-6">
                    {% if id %}
                        <div class="form-group">
                            <input type="hidden" name="id" id="id" value="{{ id }}">
                        </div>
                    {% endif %}
                    <div class="form-group">
                        <label for="name">Naam</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Naam" value="{% if recipe.name %}{{ recipe.name }}{% endif %}" required="required">
                    </div>
                    <div class="form-group">
                        <label for="intro">Intro</label>
                        <textarea class="form-control" id="intro" name="intro" required="required" rows="3">{% if recipe.intro %}{{ recipe.intro }}{% endif %}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="description">Beschrijving</label>
                        <textarea class="form-control" id="description" name="description" required="required" rows="10">{% if recipe.description %}{{ recipe.description }}{% endif %}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Afbeelding</label>
                        <select class="form-control" id="image" name="image">
                            <option value=""></option>
                            <option value="1">Afbeelding 1</option>
                            <option value="2">Afbeelding 2</option>
                            <option value="3">Afbeelding 3</option>
                            <option value="4">Afbeelding 4</option>
                            <option value="5">Afbeelding 5</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-default" onclick="createHiddenDiv();">Opslaan</button>
                </div>

                <div class="col-md-6 list-group" id="ingredients">
                    {% if ingredients %}
                        {% for ingredientrow in ingredients %}
                            <div class="row list-group-item form-group-sm">
                                <div class="col-xs-1 col-sm-1">
                                    <span class="glyphicon glyphicon-move" aria-hidden="true"></span>
                                </div>
                                <div class="col-xs-4 col-sm-3">
                                    <label class="sr-only" for="quantity">Hoeveelheid</label>
                                    <input type="number" min="0.00" class="form-control quantity" value="{{ ingredientrow.quantity }}">
                                </div>
                                <div class="col-xs-6 col-sm-3">
                                    <label class="sr-only" for="quantity_id">Kwantiteit</label>
                                    <select class="form-control quantity_id">
                                        <option value=""></option>
                                        {% for quantity in quantity_list %}
                                            <option value="{{ quantity.id }}"
                                            {% if ingredientrow.quantity_id == quantity.id %}selected="selected"{% endif %}>
                                                {{ quantity.name }}
                                            </option>
                                        {% endfor %}
                                    </select>
                                </div>
                                <div class="col-xs-10 col-sm-4">
                                    <label class="sr-only" for="ingredient_id">Ingrediënt</label>
                                    <select class="form-control ingredient_id">
                                        <option value=""></option>
                                        {% for ingredient in ingredient_list %}
                                            <option value="{{ ingredient.id }}"
                                                    {% if ingredientrow.ingredient_id == ingredient.id %}selected="selected"{% endif %}>
                                                {{ ingredient.name }}
                                            </option>
                                        {% endfor %}
                                    </select>
                                </div>
                                <div class="col-xs-1 col-sm-1">
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                </div>
                            </div>
                        {% endfor %}
                    {% endif %}
                </div>

                <button type="button" class="btn btn-default add-ingredient" aria-label="Left Align">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Ingrediënt toevoegen
                </button>
            </form>
        </div>
    </div>

    {% set ingredientRow %}<div class="row list-group-item form-group-sm">
        <div class="col-xs-1 col-sm-1">
            <span class="glyphicon glyphicon-move" aria-hidden="true"></span>
        </div>
        <div class="col-xs-4 col-sm-3">
            <label class="sr-only" for="quantity">Hoeveelheid</label>
            <input type="number" min="0.00" class="form-control quantity">
        </div>
        <div class="col-xs-6 col-sm-3">
            <label class="sr-only" for="quantity_id">Kwantiteit</label>
            <select class="form-control quantity_id">
                <option value=""></option>
                {% for quantity in quantity_list %}
                    <option value="{{ quantity.id }}">{{ quantity.name }}</option>
                {% endfor %}
            </select>
        </div>
        <div class="col-xs-10 col-sm-4">
            <label class="sr-only" for="ingredient_id">Ingrediënt</label>
            <select class="form-control ingredient_id">
                <option value=""></option>
                {% for ingredient in ingredient_list %}
                    <option value="{{ ingredient.id }}">{{ ingredient.name }}</option>
                {% endfor %}
            </select>
        </div>
        <div class="col-xs-1 col-sm-1">
            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
        </div>
    </div>{% endset %}

    <script type="text/javascript">
        var ingredientRow = '{{ ingredientRow|e('js') }}';
    </script>
{% endblock %}