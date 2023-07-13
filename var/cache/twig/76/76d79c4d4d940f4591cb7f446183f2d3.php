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

/* /web/dashboard.html */
class __TwigTemplate_38e56681356160c819150f7ac1024ca0 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        $this->loadTemplate("topbar.html", "/web/dashboard.html", 1)->display($context);
        // line 2
        echo "
<div class=\"
    row-start-1 row-span-full col-start-3 col-end-13
    flex flex-row justify-start align-middle items-center
    h-full w-full\">

</div>";
    }

    public function getTemplateName()
    {
        return "/web/dashboard.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% include \"topbar.html\" %}

<div class=\"
    row-start-1 row-span-full col-start-3 col-end-13
    flex flex-row justify-start align-middle items-center
    h-full w-full\">

</div>", "/web/dashboard.html", "/var/www/templates/web/dashboard.html");
    }
}
