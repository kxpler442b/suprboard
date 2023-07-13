<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* base.html.twig */
class __TwigTemplate_6526ab0c8a973b52347241bdecedd9b9 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <meta author=\"Benjamin Moss\">

    <!-- Tailwind CSS -->
    <link href=\"";
        // line 9
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["globals"] ?? null), "base_url", [], "any", false, false, false, 9), "html", null, true);
        echo "/css/output.css\" rel=\"stylesheet\" type=\"text/css\">

    <title>";
        // line 11
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "title", [], "any", false, false, false, 11), "html", null, true);
        echo "</title>
</head>
<body class=\"
    grid grid-rows-6 grid-cols-12
    min-h-screen bg-zinc-50\">
    
    <!-- Sidebar -->
    ";
        // line 18
        $this->loadTemplate("sidebar.html", "base.html.twig", 18)->display($context);
        // line 19
        echo "
    <!-- Main content area -->
    ";
        // line 21
        $this->displayBlock('content', $context, $blocks);
        // line 22
        echo "</body>

<!-- HTMX -->
<script src=\"https://unpkg.com/htmx.org@1.8.6\" integrity=\"sha384-Bj8qm/6B+71E6FQSySofJOUjA/gq330vEqjFx9LakWybUySyI1IQHwPtbTU7bNwx\" crossorigin=\"anonymous\"></script>

<!-- HTMX json-enc extension -->
<script src=\"https://unpkg.com/htmx.org/dist/ext/json-enc.js\"></script>

<!-- HyperScript -->
<script src=\"https://unpkg.com/hyperscript.org@0.9.8\"></script>

</html>";
    }

    // line 21
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo " ";
    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  86 => 21,  71 => 22,  69 => 21,  65 => 19,  63 => 18,  53 => 11,  48 => 9,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <meta author=\"Benjamin Moss\">

    <!-- Tailwind CSS -->
    <link href=\"{{ globals.base_url }}/css/output.css\" rel=\"stylesheet\" type=\"text/css\">

    <title>{{ page.title }}</title>
</head>
<body class=\"
    grid grid-rows-6 grid-cols-12
    min-h-screen bg-zinc-50\">
    
    <!-- Sidebar -->
    {% include \"sidebar.html\" %}

    <!-- Main content area -->
    {% block content %} {% endblock %}
</body>

<!-- HTMX -->
<script src=\"https://unpkg.com/htmx.org@1.8.6\" integrity=\"sha384-Bj8qm/6B+71E6FQSySofJOUjA/gq330vEqjFx9LakWybUySyI1IQHwPtbTU7bNwx\" crossorigin=\"anonymous\"></script>

<!-- HTMX json-enc extension -->
<script src=\"https://unpkg.com/htmx.org/dist/ext/json-enc.js\"></script>

<!-- HyperScript -->
<script src=\"https://unpkg.com/hyperscript.org@0.9.8\"></script>

</html>", "base.html.twig", "/var/www/templates/base.html.twig");
    }
}
